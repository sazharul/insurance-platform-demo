<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ChairmanAwardList;
use Illuminate\Http\Request;

class ChairmanAwardListController extends Controller
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
            $chairmanawardlist = ChairmanAwardList::where('chairman_profile_id', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('en_year', 'LIKE', "%$keyword%")
                ->orWhere('bn_year', 'LIKE', "%$keyword%")
                ->orWhere('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_description', 'LIKE', "%$keyword%")
                ->orWhere('bn_description', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $chairmanawardlist = ChairmanAwardList::latest()->paginate($perPage);
        }

        return view('admin.chairman-award-list.index', compact('chairmanawardlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.chairman-award-list.create');
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

        ChairmanAwardList::create($requestData);

        return redirect('/admin/chairman-award-list')->with('flash_message', 'ChairmanAwardList added!');
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
        $chairmanawardlist = ChairmanAwardList::findOrFail($id);

        return view('admin.chairman-award-list.show', compact('chairmanawardlist'));
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
        $chairmanawardlist = ChairmanAwardList::findOrFail($id);

        return view('admin.chairman-award-list.edit', compact('chairmanawardlist'));
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

        $chairmanawardlist = ChairmanAwardList::findOrFail($id);
        $chairmanawardlist->update($requestData);

        return redirect('/admin/chairman-award-list')->with('flash_message', 'ChairmanAwardList updated!');
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

        $chairmanawardlist = ChairmanAwardList::where('id', $id)->first();
        if (isset($chairmanawardlist)){
            delete_image($chairmanawardlist->image);
            $chairmanawardlist->delete();
        }
        return redirect('/admin/chairman-award-list')->with('flash_message', 'ChairmanAwardList deleted!');
    }
}
