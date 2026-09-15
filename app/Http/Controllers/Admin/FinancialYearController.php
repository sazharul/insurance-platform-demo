<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialParticular;
use App\Models\FinancialYear;
use Illuminate\Http\Request;

class FinancialYearController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $financial_particular = FinancialYear::where('en_particulars', 'LIKE', "%$keyword%")
                ->orWhere('bn_particulars', 'LIKE', "%$keyword%")
                ->orWhere('position', 'LIKE', "%$keyword%")->get();
        } else {
            $financial_particular = FinancialYear::get();
        }

        return view('admin.financial-list.year-list.year_list', compact('financial_particular'));

    }

    public function create(Request $request)
    {
        return view('admin.financial-list.year-list.add_new_year');
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        FinancialYear::create($requestData);
        return redirect()->route('financial-year-list.index')->with('flash_message', 'FinancialList added!');
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $financiallist = FinancialYear::findOrFail($id);
        $financiallist->update($requestData);
        return redirect()->route('financial-year-list.index')->with('flash_message', 'FinancialList updated!');
    }

    public function edit($id)
    {
        $financial_year = FinancialYear::findOrFail($id);
        return view('admin.financial-list.year-list.edit_year', compact('financial_year'));
    }

    public function destroy($id)
    {
        FinancialYear::destroy($id);
        return redirect()->route('financial-year-list.index')->with('flash_message', 'FinancialList deleted!');
    }
}
