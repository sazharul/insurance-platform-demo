<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\LinkWebsiteList;
use Illuminate\Http\Request;

class LinkWebsiteListController extends Controller
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
            $linkwebsitelist = LinkWebsiteList::where('image', 'LIKE', "%$keyword%")
                ->orWhere('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('url', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $linkwebsitelist = LinkWebsiteList::latest()->paginate($perPage);
        }

        return view('admin.link-website-list.index', compact('linkwebsitelist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.link-website-list.create');
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

        LinkWebsiteList::create($requestData);

        return redirect('/admin/link-website-list')->with('flash_message', 'LinkWebsiteList added!');
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
        $linkwebsitelist = LinkWebsiteList::findOrFail($id);

        return view('admin.link-website-list.show', compact('linkwebsitelist'));
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
        $linkwebsitelist = LinkWebsiteList::findOrFail($id);

        return view('admin.link-website-list.edit', compact('linkwebsitelist'));
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

        $linkwebsitelist = LinkWebsiteList::findOrFail($id);
        $linkwebsitelist->update($requestData);

        return redirect('/admin/link-website-list')->with('flash_message', 'LinkWebsiteList updated!');
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

        $linkwebsitelist = LinkWebsiteList::where('id', $id)->first();
        if (isset($linkwebsitelist)){
            delete_image($linkwebsitelist->image);
            $linkwebsitelist->delete();
        }

        return redirect('/admin/link-website-list')->with('flash_message', 'LinkWebsiteList deleted!');
    }
}
