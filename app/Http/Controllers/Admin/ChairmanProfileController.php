<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ChairmanProfile;
use Illuminate\Http\Request;

class ChairmanProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $chairmanprofile = ChairmanProfile::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('chairman_image', 'LIKE', "%$keyword%")
                ->orWhere('en_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_name', 'LIKE', "%$keyword%")
                ->orWhere('en_designation', 'LIKE', "%$keyword%")
                ->orWhere('bn_designation', 'LIKE', "%$keyword%")
                ->orWhere('en_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_details', 'LIKE', "%$keyword%")
                ->orWhere('en_involvement_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_involvement_title', 'LIKE', "%$keyword%")
                ->orWhere('en_awards_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_awards_title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $chairmanprofile = ChairmanProfile::latest()->paginate($perPage);
        }

        return view('admin.chairman-profile.index', compact('chairmanprofile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.chairman-profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();
        if ($request->hasFile('chairman_image')) {
            $requestData['chairman_image'] = image_upload($request->chairman_image);
        }

        ChairmanProfile::create($requestData);

        return redirect('/admin/chairman-profile')->with('flash_message', 'ChairmanProfile added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $chairmanprofile = ChairmanProfile::findOrFail($id);

        return view('admin.chairman-profile.show', compact('chairmanprofile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $chairmanprofile = ChairmanProfile::findOrFail($id);

        return view('admin.chairman-profile.edit', compact('chairmanprofile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();
        if ($request->hasFile('chairman_image')) {
            $requestData['chairman_image'] = image_upload($request->chairman_image);
        }

        $chairmanprofile = ChairmanProfile::findOrFail($id);
        $chairmanprofile->update($requestData);

        return redirect('/admin/chairman-profile')->with('flash_message', 'ChairmanProfile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $chairmanprofile = ChairmanProfile::where('id', $id)->first();
        if (isset($chairmanprofile)){
            delete_image($chairmanprofile->chairman_image);
            $chairmanprofile->delete();
        }

        return redirect('/admin/chairman-profile')->with('flash_message', 'ChairmanProfile deleted!');
    }
}
