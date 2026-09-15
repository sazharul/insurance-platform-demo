<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\InvestorRelationDepartment;
use Illuminate\Http\Request;

class InvestorRelationDepartmentController extends Controller
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
            $investorrelationdepartment = InvestorRelationDepartment::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('en_heading', 'LIKE', "%$keyword%")
                ->orWhere('bn_heading', 'LIKE', "%$keyword%")
                ->orWhere('en_description', 'LIKE', "%$keyword%")
                ->orWhere('bn_description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $investorrelationdepartment = InvestorRelationDepartment::latest()->paginate($perPage);
        }

        return view('admin.investor-relation-department.index', compact('investorrelationdepartment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.investor-relation-department.create');
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


        InvestorRelationDepartment::create($requestData);

        return redirect('/admin/investor-relation-department')->with('flash_message', 'InvestorRelationDepartment added!');
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
        $investorrelationdepartment = InvestorRelationDepartment::findOrFail($id);

        return view('admin.investor-relation-department.show', compact('investorrelationdepartment'));
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
        $investorrelationdepartment = InvestorRelationDepartment::findOrFail($id);

        return view('admin.investor-relation-department.edit', compact('investorrelationdepartment'));
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

        $investorrelationdepartment = InvestorRelationDepartment::findOrFail($id);
        $investorrelationdepartment->update($requestData);

        return redirect('/admin/investor-relation-department')->with('flash_message', 'InvestorRelationDepartment updated!');
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

        $investorrelationdepartment = InvestorRelationDepartment::where('id', $id)->first();
        if (isset($investorrelationdepartment)){
            delete_image($investorrelationdepartment->pdf_file);
            $investorrelationdepartment->delete();
        }

        return redirect('/admin/investor-relation-department')->with('flash_message', 'InvestorRelationDepartment deleted!');
    }
}
