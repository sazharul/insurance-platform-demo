<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\CeoProfile;
use Illuminate\Http\Request;

class CeoProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        //upload final view
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $ceoprofile = CeoProfile::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('en_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_name', 'LIKE', "%$keyword%")
                ->orWhere('en_designation', 'LIKE', "%$keyword%")
                ->orWhere('bn_designation', 'LIKE', "%$keyword%")
                ->orWhere('en_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_details', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ceoprofile = CeoProfile::latest()->paginate($perPage);
        }

        return view('admin.ceo-profile.index', compact('ceoprofile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.ceo-profile.create');
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
        if ($request->hasFile('image')) {
            $requestData['image'] = image_upload($request->image);
        }

        CeoProfile::create($requestData);

        return redirect('/admin/ceo-profile')->with('flash_message', 'CeoProfile added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $ceoprofile = CeoProfile::findOrFail($id);

        return view('admin.ceo-profile.show', compact('ceoprofile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $ceoprofile = CeoProfile::findOrFail($id);

        return view('admin.ceo-profile.edit', compact('ceoprofile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $requestData['image'] = image_upload($request->image);
        }

        $ceoprofile = CeoProfile::findOrFail($id);
        $ceoprofile->update($requestData);

        return redirect('/admin/ceo-profile')->with('flash_message', 'CeoProfile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $ceo_profile = CeoProfile::where('id', $id)->first();
        if (isset($ceo_profile)){
            delete_image($ceo_profile->image);
            $ceo_profile->delete();
        }
        return redirect('/admin/ceo-profile')->with('flash_message', 'CeoProfile deleted!');
    }
}
