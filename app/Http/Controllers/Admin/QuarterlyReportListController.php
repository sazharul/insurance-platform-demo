<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\QuarterlyReportList;
use Illuminate\Http\Request;

class QuarterlyReportListController extends Controller
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
            $quarterlyreportlist = QuarterlyReportList::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_year', 'LIKE', "%$keyword%")
                ->orWhere('bn_year', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $quarterlyreportlist = QuarterlyReportList::latest()->paginate($perPage);
        }

        return view('admin.quarterly-report-list.index', compact('quarterlyreportlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.quarterly-report-list.create');
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

        QuarterlyReportList::create($requestData);

        return redirect('/admin/quarterly-report-list')->with('flash_message', 'QuarterlyReportList added!');
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
        $quarterlyreportlist = QuarterlyReportList::findOrFail($id);

        return view('admin.quarterly-report-list.show', compact('quarterlyreportlist'));
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
        $quarterlyreportlist = QuarterlyReportList::findOrFail($id);

        return view('admin.quarterly-report-list.edit', compact('quarterlyreportlist'));
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

        $quarterlyreportlist = QuarterlyReportList::findOrFail($id);
        $quarterlyreportlist->update($requestData);

        return redirect('/admin/quarterly-report-list')->with('flash_message', 'QuarterlyReportList updated!');
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

        $quarterlyreportlist = QuarterlyReportList::where('id', $id)->first();
        if (isset($quarterlyreportlist)){
            delete_image($quarterlyreportlist->pdf_file);
            $quarterlyreportlist->delete();
        }
        if (isset($quarterlyreportlist)){
            delete_image($quarterlyreportlist->image);
            $quarterlyreportlist->delete();
        }

        return redirect('/admin/quarterly-report-list')->with('flash_message', 'QuarterlyReportList deleted!');
    }
}
