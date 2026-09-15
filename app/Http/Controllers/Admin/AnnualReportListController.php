<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AnnualReportList;
use Illuminate\Http\Request;

class AnnualReportListController extends Controller
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
            $annualreportlist = AnnualReportList::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_year', 'LIKE', "%$keyword%")
                ->orWhere('bn_year', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $annualreportlist = AnnualReportList::latest()->paginate($perPage);
        }

        return view('admin.annual-report-list.index', compact('annualreportlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.annual-report-list.create');
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

        if ($request->hasFile('pdf_file')) {
            $title = $request->en_title;
            $requestData['pdf_file'] = image_upload($request->pdf_file, $title);
        }
        if ($request->hasFile('image')) {
            $requestData['image'] = image_upload($request->image);
        }

        AnnualReportList::create($requestData);

        return redirect('/admin/annual-report-list')->with('flash_message', 'AnnualReportList added!');
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
        $annualreportlist = AnnualReportList::findOrFail($id);

        return view('admin.annual-report-list.show', compact('annualreportlist'));
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
        $annualreportlist = AnnualReportList::findOrFail($id);

        return view('admin.annual-report-list.edit', compact('annualreportlist'));
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
        if ($request->hasFile('pdf_file')) {
            $title = $request->en_title;
            $requestData['pdf_file'] = image_upload($request->pdf_file, $title);
        }
        if ($request->hasFile('image')) {
            $requestData['image'] = image_upload($request->image);
        }

        $annualreportlist = AnnualReportList::findOrFail($id);
        $annualreportlist->update($requestData);

        return redirect('/admin/annual-report-list')->with('flash_message', 'AnnualReportList updated!');
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

        $annualreportlist = AnnualReportList::where('id', $id)->first();
        if (isset($annualreportlist)){
            delete_image($annualreportlist->pdf_file);
            $annualreportlist->delete();
        }
        if (isset($annualreportlist)){
            delete_image($annualreportlist->image);
            $annualreportlist->delete();
        }

        return redirect('/admin/annual-report-list')->with('flash_message', 'AnnualReportList deleted!');
    }
}
