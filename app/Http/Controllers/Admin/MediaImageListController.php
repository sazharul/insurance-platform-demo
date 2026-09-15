<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MediaImageList;
use App\Models\MedialImageGroup;
use Illuminate\Http\Request;

class MediaImageListController extends Controller
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
            $mediaimagelist = MediaImageList::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mediaimagelist = MediaImageList::latest()->paginate($perPage);
        }

        return view('admin.media-image-list.index', compact('mediaimagelist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.media-image-list.create');
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

        $requestData = $request->except('image');

        $files = [];
        if ($request->file('image')){
            foreach($request->file('image') as $key => $file)
            {
                $files[]['name'] = image_upload($file);
            }
        }

        $media_list = MediaImageList::create($requestData);
        $group['group_id'] = $media_list->id;

        foreach ($files as $key => $file) {
            $group['name'] = $file['name'];
            MedialImageGroup::create($group);
        }

        return redirect('/admin/media-image-list')->with('flash_message', 'MediaImageList added!');
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
        $mediaimagelist = MediaImageList::findOrFail($id);

        return view('admin.media-image-list.show', compact('mediaimagelist'));
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
        $mediaimagelist = MediaImageList::findOrFail($id);

        return view('admin.media-image-list.edit', compact('mediaimagelist'));
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

        $requestData = $request->except('image');

        $files = [];
        if ($request->file('image')){
            foreach($request->file('image') as $key => $file)
            {
                $files[]['name'] = image_upload($file);
            }
        }

        // $media_list = MediaImageList::create($requestData);

        $mediaimagelist = MediaImageList::findOrFail($id);
        $mediaimagelist->update($requestData);

        $group['group_id'] = $mediaimagelist->id;

        foreach ($files as $key => $file) {
            $group['name'] = $file['name'];
            MedialImageGroup::create($group);
        }



        return redirect()->back()->with('flash_message', 'MediaImageList updated!');
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

        $mediaimagelist = MediaImageList::where('id', $id)->first();
        if (isset($mediaimagelist)){
            delete_image($mediaimagelist->image);
            $mediaimagelist->delete();
        }

        return redirect('/admin/media-image-list')->with('flash_message', 'MediaImageList deleted!');
    }

    public function delete_single_image($id)
    {

        $mediaimagelist = MedialImageGroup::where('id', $id)->first();
        if (isset($mediaimagelist)){
            delete_image($mediaimagelist->image);
            $mediaimagelist->delete();
        }
        return redirect()->back()->with('flash_message', 'MediaImage deleted!');
    }
}
