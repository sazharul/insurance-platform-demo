<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\InvolvementList;
use Illuminate\Http\Request;

class InvolvementListController extends Controller
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
            $involvementlist = InvolvementList::where('chairman_profile_id', 'LIKE', "%$keyword%")
                ->orWhere('en_designation', 'LIKE', "%$keyword%")
                ->orWhere('bn_designation', 'LIKE', "%$keyword%")
                ->orWhere('en_company_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_company_name', 'LIKE', "%$keyword%")
                ->orWhere('en_details_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_details_name', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $involvementlist = InvolvementList::latest()->paginate($perPage);
        }

        return view('admin.involvement-list.index', compact('involvementlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.involvement-list.create');
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
        
        InvolvementList::create($requestData);

        return redirect('/admin/involvement-list')->with('flash_message', 'InvolvementList added!');
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
        $involvementlist = InvolvementList::findOrFail($id);

        return view('admin.involvement-list.show', compact('involvementlist'));
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
        $involvementlist = InvolvementList::findOrFail($id);

        return view('admin.involvement-list.edit', compact('involvementlist'));
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
        
        $involvementlist = InvolvementList::findOrFail($id);
        $involvementlist->update($requestData);

        return redirect('/admin/involvement-list')->with('flash_message', 'InvolvementList updated!');
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
        InvolvementList::destroy($id);

        return redirect('/admin/involvement-list')->with('flash_message', 'InvolvementList deleted!');
    }
}
