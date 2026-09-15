<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MujibCorner;
use Illuminate\Http\Request;

class MujibCornerController extends Controller
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
            $mujibcorner = MujibCorner::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('mujib_image', 'LIKE', "%$keyword%")
                ->orWhere('en_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_details', 'LIKE', "%$keyword%")
                ->orWhere('en_gallery_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_gallery_title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mujibcorner = MujibCorner::latest()->paginate($perPage);
        }

        return view('admin.mujib-corner.index', compact('mujibcorner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.mujib-corner.create');
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
        if ($request->hasFile('mujib_image')) {
            $requestData['mujib_image'] = image_upload($request->mujib_image);
        }


        MujibCorner::create($requestData);

        return redirect('/admin/mujib-corner')->with('flash_message', 'MujibCorner added!');
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
        $mujibcorner = MujibCorner::findOrFail($id);

        return view('admin.mujib-corner.show', compact('mujibcorner'));
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
        $mujibcorner = MujibCorner::findOrFail($id);

        return view('admin.mujib-corner.edit', compact('mujibcorner'));
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
        if ($request->hasFile('mujib_image')) {
            $requestData['mujib_image'] = image_upload($request->mujib_image);
        }

        $mujibcorner = MujibCorner::findOrFail($id);
        $mujibcorner->update($requestData);

        return redirect('/admin/mujib-corner')->with('flash_message', 'MujibCorner updated!');
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
        $mujibcorner = MujibCorner::where('id', $id)->first();
        if (isset($mujibcorner)){
            delete_image($mujibcorner->mujib_image);
            $mujibcorner->delete();
        }

        return redirect('/admin/mujib-corner')->with('flash_message', 'MujibCorner deleted!');
    }
}
