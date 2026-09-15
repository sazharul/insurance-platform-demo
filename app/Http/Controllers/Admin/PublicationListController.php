<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PublicationList;
use Illuminate\Http\Request;

class PublicationListController extends Controller
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
            $publicationlist = PublicationList::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('en_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_details', 'LIKE', "%$keyword%")
                ->orWhere('en_newspaper_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_newspaper_name', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $publicationlist = PublicationList::latest()->paginate($perPage);
        }

        return view('admin.publication-list.index', compact('publicationlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.publication-list.create');
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

        PublicationList::create($requestData);

        return redirect('/admin/publication-list')->with('flash_message', 'PublicationList added!');
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
        $publicationlist = PublicationList::findOrFail($id);

        return view('admin.publication-list.show', compact('publicationlist'));
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
        $publicationlist = PublicationList::findOrFail($id);

        return view('admin.publication-list.edit', compact('publicationlist'));
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

        $publicationlist = PublicationList::findOrFail($id);
        $publicationlist->update($requestData);

        return redirect('/admin/publication-list')->with('flash_message', 'PublicationList updated!');
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

        $publicationlist = PublicationList::where('id', $id)->first();
        if (isset($publicationlist)){
            delete_image($publicationlist->image);
            $publicationlist->delete();
        }

        return redirect('/admin/publication-list')->with('flash_message', 'PublicationList deleted!');
    }
}
