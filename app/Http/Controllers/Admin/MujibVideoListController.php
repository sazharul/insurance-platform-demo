<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MujibVideoList;
use Illuminate\Http\Request;

class MujibVideoListController extends Controller
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
            $mujibvideolist = MujibVideoList::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mujibvideolist = MujibVideoList::latest()->paginate($perPage);
        }

        return view('admin.mujib-video-list.index', compact('mujibvideolist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.mujib-video-list.create');
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

        MujibVideoList::create($requestData);

        return redirect('/admin/mujib-video-list')->with('flash_message', 'MujibVideoList added!');
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
        $mujibvideolist = MujibVideoList::findOrFail($id);

        return view('admin.mujib-video-list.show', compact('mujibvideolist'));
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
        $mujibvideolist = MujibVideoList::findOrFail($id);

        return view('admin.mujib-video-list.edit', compact('mujibvideolist'));
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

        $mujibvideolist = MujibVideoList::findOrFail($id);
        $mujibvideolist->update($requestData);

        return redirect('/admin/mujib-video-list')->with('flash_message', 'MujibVideoList updated!');
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
        $mujibvideolist = MujibVideoList::where('id', $id)->first();
        $mujibvideolist->delete();


        return redirect('/admin/mujib-video-list')->with('flash_message', 'MujibVideoList deleted!');
    }
}
