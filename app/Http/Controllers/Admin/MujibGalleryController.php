<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MujibGallery;
use Illuminate\Http\Request;

class MujibGalleryController extends Controller
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
            $mujibgallery = MujibGallery::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mujibgallery = MujibGallery::latest()->paginate($perPage);
        }

        return view('admin.mujib-gallery.index', compact('mujibgallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.mujib-gallery.create');
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

        MujibGallery::create($requestData);

        return redirect('/admin/mujib-gallery')->with('flash_message', 'MujibGallery added!');
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
        $mujibgallery = MujibGallery::findOrFail($id);

        return view('admin.mujib-gallery.show', compact('mujibgallery'));
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
        $mujibgallery = MujibGallery::findOrFail($id);

        return view('admin.mujib-gallery.edit', compact('mujibgallery'));
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
        if ($request->hasFile('image')) {
            $requestData['image'] = image_upload($request->image);
        }

        $mujibgallery = MujibGallery::findOrFail($id);
        $mujibgallery->update($requestData);

        return redirect('/admin/mujib-gallery')->with('flash_message', 'MujibGallery updated!');
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
        $mujibgallery = MujibGallery::where('id', $id)->first();
        if (isset($mujibgallery)){
            delete_image($mujibgallery->image);
            $mujibgallery->delete();
        }

        return redirect('/admin/mujib-gallery')->with('flash_message', 'MujibGallery deleted!');
    }
}
