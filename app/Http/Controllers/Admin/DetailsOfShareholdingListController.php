<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DetailsOfShareholdingList;
use Illuminate\Http\Request;

class DetailsOfShareholdingListController extends Controller
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
            $detailsofshareholdinglist = DetailsOfShareholdingList::where('en_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_name', 'LIKE', "%$keyword%")
                ->orWhere('en_shares_no', 'LIKE', "%$keyword%")
                ->orWhere('bn_shares_no', 'LIKE', "%$keyword%")
                ->orWhere('en_shares_percentage', 'LIKE', "%$keyword%")
                ->orWhere('bn_shares_percentage', 'LIKE', "%$keyword%")
                ->orderBy('position','asc')->paginate($perPage);
        } else {
            $detailsofshareholdinglist = DetailsOfShareholdingList::orderBy('position','asc')->paginate($perPage);
        }

        return view('admin.details-of-shareholding-list.index', compact('detailsofshareholdinglist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.details-of-shareholding-list.create');
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

        DetailsOfShareholdingList::create($requestData);

        return redirect('/admin/details-of-shareholding-list')->with('flash_message', 'DetailsOfShareholdingList added!');
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
        $detailsofshareholdinglist = DetailsOfShareholdingList::findOrFail($id);

        return view('admin.details-of-shareholding-list.show', compact('detailsofshareholdinglist'));
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
        $detailsofshareholdinglist = DetailsOfShareholdingList::findOrFail($id);

        return view('admin.details-of-shareholding-list.edit', compact('detailsofshareholdinglist'));
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

        $detailsofshareholdinglist = DetailsOfShareholdingList::findOrFail($id);
        $detailsofshareholdinglist->update($requestData);

        return redirect('/admin/details-of-shareholding-list')->with('flash_message', 'DetailsOfShareholdingList updated!');
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
        DetailsOfShareholdingList::destroy($id);

        return redirect('/admin/details-of-shareholding-list')->with('flash_message', 'DetailsOfShareholdingList deleted!');
    }
}
