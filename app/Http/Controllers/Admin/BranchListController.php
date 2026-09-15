<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BranchList;
use Illuminate\Http\Request;

class BranchListController extends Controller
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
            $branchlist = BranchList::where('branch_location_id', 'LIKE', "%$keyword%")
                ->orWhere('en_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_name', 'LIKE', "%$keyword%")
                ->orWhere('en_address', 'LIKE', "%$keyword%")
                ->orWhere('bn_address', 'LIKE', "%$keyword%")
                ->orWhere('branch_map_url', 'LIKE', "%$keyword%")
                ->orWhere('en_employee_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_employee_name', 'LIKE', "%$keyword%")
                ->orWhere('en_employee_designation', 'LIKE', "%$keyword%")
                ->orWhere('bn_employee_designation', 'LIKE', "%$keyword%")
                ->orWhere('en_contact_number', 'LIKE', "%$keyword%")
                ->orWhere('bn_contact_number', 'LIKE', "%$keyword%")
                ->orWhere('en_contact_number2', 'LIKE', "%$keyword%")
                ->orWhere('bn_contact_number2', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->with('branchLocation')
                ->latest()->paginate($perPage);
        } else {
            $branchlist = BranchList::latest()->paginate($perPage);
        }

        return view('admin.branch-list.index', compact('branchlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.branch-list.create');
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

        BranchList::create($requestData);

        return redirect('/admin/branch-list')->with('flash_message', 'BranchList added!');
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
        $branchlist = BranchList::findOrFail($id);

        return view('admin.branch-list.show', compact('branchlist'));
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
        $branchlist = BranchList::findOrFail($id);

        return view('admin.branch-list.edit', compact('branchlist'));
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
        $branchlist = BranchList::findOrFail($id);
        $branchlist->update($requestData);

        return redirect('/admin/branch-list')->with('flash_message', 'BranchList updated!');
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

        $branchlist = BranchList::where('id', $id)->first();
        if (isset($branchlist)){
            delete_image($branchlist->image);
            $branchlist->delete();
        }

        return redirect('/admin/branch-list')->with('flash_message', 'BranchList deleted!');
    }
}
