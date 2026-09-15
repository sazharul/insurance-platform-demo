<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\FinancialHighlight;
use Illuminate\Http\Request;

class FinancialHighlightController extends Controller
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
            $financialhighlight = FinancialHighlight::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('en_financial_highlights_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_financial_highlights_title', 'LIKE', "%$keyword%")
                ->orWhere('en_short_info', 'LIKE', "%$keyword%")
                ->orWhere('bn_short_info', 'LIKE', "%$keyword%")
                ->orWhere('en_particulars', 'LIKE', "%$keyword%")
                ->orWhere('bn_particulars', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $financialhighlight = FinancialHighlight::latest()->paginate($perPage);
        }

        return view('admin.financial-highlight.index', compact('financialhighlight'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.financial-highlight.create');
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
        
        FinancialHighlight::create($requestData);

        return redirect('/admin/financial-highlight')->with('flash_message', 'FinancialHighlight added!');
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
        $financialhighlight = FinancialHighlight::findOrFail($id);

        return view('admin.financial-highlight.show', compact('financialhighlight'));
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
        $financialhighlight = FinancialHighlight::findOrFail($id);

        return view('admin.financial-highlight.edit', compact('financialhighlight'));
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
        
        $financialhighlight = FinancialHighlight::findOrFail($id);
        $financialhighlight->update($requestData);

        return redirect('/admin/financial-highlight')->with('flash_message', 'FinancialHighlight updated!');
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
        FinancialHighlight::destroy($id);

        return redirect('/admin/financial-highlight')->with('flash_message', 'FinancialHighlight deleted!');
    }
}
