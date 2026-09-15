<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\FinancialHighlight;
use App\Models\FinancialList;
use App\Models\FinancialParticular;
use App\Models\FinancialYear;
use Illuminate\Http\Request;

class FinancialListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function multiple_update(Request $request)
    {

        $value = $request->value;
        $is_english = $request->is_english;
        $particulars = $request->particulars;
        $year = $request->year;

        if ($is_english == 'en') {
            $findList = FinancialList::where('financial_particulars_id', $particulars)->where('financial_years_id', $year)->first();
            if (isset($findList)) {
                $findList->update([
                    'en_value' => $value
                ]);
            } else {
                FinancialList::create([
                    'financial_particulars_id' => $particulars,
                    'financial_years_id' => $year,
                    'en_value' => $value,
                ]);
            }

        } else {
            $findList = FinancialList::where('financial_particulars_id', $particulars)->where('financial_years_id', $year)->first();
            if (isset($findList)) {
                $findList->update([
                    'bn_value' => $value
                ]);
            }else {
                FinancialList::create([
                    'financial_particulars_id' => $particulars,
                    'financial_years_id' => $year,
                    'bn_value' => $value,
                ]);
            }
        }

        return $value;

    }


    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $financial_particular = FinancialParticular::where('en_particulars', 'LIKE', "%$keyword%")
                ->orWhere('bn_particulars', 'LIKE', "%$keyword%")
                ->orderBy('position', 'asc')->get();
        } else {
            $financial_particular = FinancialParticular::orderBy('position', 'asc')->get();
        }

        $financial_highlight = FinancialHighlight::first();
        $financial_year = FinancialYear::orderBy('en_year', 'desc')->paginate(5);

        return view('admin.financial-list.index', compact('financial_particular', 'financial_year', 'financial_highlight'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.financial-list.particular-list.create');
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

        FinancialParticular::create($requestData);

        return redirect('/admin/financial-list')->with('flash_message', 'FinancialList added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $financiallist = FinancialList::findOrFail($id);

        return view('admin.financial-list.show', compact('financiallist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $financiallist = FinancialList::findOrFail($id);

        return view('admin.financial-list.edit', compact('financiallist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $financiallist = FinancialList::findOrFail($id);
        $financiallist->update($requestData);

        return redirect('/admin/financial-list')->with('flash_message', 'FinancialList updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        FinancialList::destroy($id);

        return redirect('/admin/financial-list')->with('flash_message', 'FinancialList deleted!');
    }
}
