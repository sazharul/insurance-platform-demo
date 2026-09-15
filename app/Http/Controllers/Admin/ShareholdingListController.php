<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ShareholdingList;
use Illuminate\Http\Request;

class ShareholdingListController extends Controller
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
            $shareholdinglist = ShareholdingList::where('en_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_name', 'LIKE', "%$keyword%")
                ->orWhere('en_status', 'LIKE', "%$keyword%")
                ->orWhere('bn_status', 'LIKE', "%$keyword%")
                ->orWhere('en_shares_no', 'LIKE', "%$keyword%")
                ->orWhere('bn_shares_no', 'LIKE', "%$keyword%")
                ->orWhere('en_shares_percentage', 'LIKE', "%$keyword%")
                ->orWhere('bn_shares_percentage', 'LIKE', "%$keyword%")
                ->orderBy('position','asc')->paginate($perPage);
        } else {
            $shareholdinglist = ShareholdingList::orderBy('position','asc')->paginate($perPage);
        }

        return view('admin.shareholding-list.index', compact('shareholdinglist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.shareholding-list.create');
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

        ShareholdingList::create($requestData);

        return redirect('/admin/shareholding-list')->with('flash_message', 'ShareholdingList added!');
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
        $shareholdinglist = ShareholdingList::findOrFail($id);

        return view('admin.shareholding-list.show', compact('shareholdinglist'));
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
        $shareholdinglist = ShareholdingList::findOrFail($id);

        return view('admin.shareholding-list.edit', compact('shareholdinglist'));
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

        $shareholdinglist = ShareholdingList::findOrFail($id);
        $shareholdinglist->update($requestData);

        return redirect('/admin/shareholding-list')->with('flash_message', 'ShareholdingList updated!');
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
        ShareholdingList::destroy($id);

        return redirect('/admin/shareholding-list')->with('flash_message', 'ShareholdingList deleted!');
    }
}
