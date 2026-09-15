<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MediaVideoList;
use Illuminate\Http\Request;

class MediaVideoListController extends Controller
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
            $mediavideolist = MediaVideoList::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('video', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mediavideolist = MediaVideoList::latest()->paginate($perPage);
        }

        return view('admin.media-video-list.index', compact('mediavideolist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.media-video-list.create');
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

        if ($request->hasFile('video')) {
            $requestData['video'] = image_upload($request->video);
        }
        if ($request->hasFile('image')) {
            $requestData['image'] = image_upload($request->image);
        }

        MediaVideoList::create($requestData);

        return redirect('/admin/media-video-list')->with('flash_message', 'MediaVideoList added!');
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
        $mediavideolist = MediaVideoList::findOrFail($id);

        return view('admin.media-video-list.show', compact('mediavideolist'));
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
        $mediavideolist = MediaVideoList::findOrFail($id);

        return view('admin.media-video-list.edit', compact('mediavideolist'));
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
        if ($request->hasFile('video')) {
            $requestData['video'] = image_upload($request->video);
        }
        if ($request->hasFile('image')) {
            $requestData['image'] = image_upload($request->image);
        }

        $mediavideolist = MediaVideoList::findOrFail($id);
        $mediavideolist->update($requestData);

        return redirect('/admin/media-video-list')->with('flash_message', 'MediaVideoList updated!');
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

        $mediavideolist = MediaVideoList::where('id', $id)->first();
        if (isset($mediavideolist)){
            delete_image($mediavideolist->video);
            $mediavideolist->delete();
        }
        if (isset($mediavideolist)){
            delete_image($mediavideolist->image);
            $mediavideolist->delete();
        }


        return redirect('/admin/media-video-list')->with('flash_message', 'MediaVideoList deleted!');
    }
}
