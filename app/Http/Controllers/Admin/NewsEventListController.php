<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\NewsEventList;
use Illuminate\Http\Request;

class NewsEventListController extends Controller
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
            $newseventlist = NewsEventList::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('en_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_details', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $newseventlist = NewsEventList::latest()->paginate($perPage);
        }

        return view('admin.news-event-list.index', compact('newseventlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.news-event-list.create');
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

        NewsEventList::create($requestData);

        return redirect('/admin/news-event-list')->with('flash_message', 'NewsEventList added!');
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
        $newseventlist = NewsEventList::findOrFail($id);

        return view('admin.news-event-list.show', compact('newseventlist'));
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
        $newseventlist = NewsEventList::findOrFail($id);

        return view('admin.news-event-list.edit', compact('newseventlist'));
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

        $newseventlist = NewsEventList::findOrFail($id);
        $newseventlist->update($requestData);

        return redirect('/admin/news-event-list')->with('flash_message', 'NewsEventList updated!');
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

        $newseventlist = NewsEventList::where('id', $id)->first();
        if (isset($newseventlist)){
            delete_image($newseventlist->image);
            $newseventlist->delete();
        }

        return redirect('/admin/news-event-list')->with('flash_message', 'NewsEventList deleted!');
    }
}
