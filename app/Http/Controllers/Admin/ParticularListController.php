<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialParticular;
use Illuminate\Http\Request;

class ParticularListController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $financial_particular = FinancialParticular::where('en_particulars', 'LIKE', "%$keyword%")
                ->orWhere('bn_particulars', 'LIKE', "%$keyword%")
                ->orWhere('position', 'LIKE', "%$keyword%")
                ->orderBy('position', 'asc')->get();
        } else {
            $financial_particular = FinancialParticular::orderBy('position', 'asc')->get();
        }

        return view('admin.financial-list.particular-list.particular_list', compact('financial_particular'));

    }

    public function create(Request $request)
    {
        return view('admin.financial-list.particular-list.create');
    }

    public function store(Request $request)
    {
        $requestData = $request->all();
        FinancialParticular::create($requestData);
        return redirect()->route('particular-list.index')->with('flash_message', 'FinancialList added!');
    }

    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $financiallist = FinancialParticular::findOrFail($id);
        $financiallist->update($requestData);

        return redirect()->route('particular-list.index')->with('flash_message', 'FinancialList updated!');

    }

    public function edit($id)
    {
        $particular_list = FinancialParticular::findOrFail($id);
        return view('admin.financial-list.particular-list.edit', compact('particular_list'));

    }

    public function destroy($id)
    {
        FinancialParticular::destroy($id);
        return redirect()->route('particular-list.index')->with('flash_message', 'FinancialList deleted!');
    }
}
