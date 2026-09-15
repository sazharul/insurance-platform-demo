<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DirectorReportList;
use Illuminate\Http\Request;

class DirectorReportListController extends Controller
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
            $directorreportlist = DirectorReportList::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_year', 'LIKE', "%$keyword%")
                ->orWhere('bn_year', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->orWhere('en_published_date', 'LIKE', "%$keyword%")
                ->orWhere('bn_published_date', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $directorreportlist = DirectorReportList::latest()->paginate($perPage);
        }

        return view('admin.director-report-list.index', compact('directorreportlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.director-report-list.create');
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

        DirectorReportList::create($requestData);

        return redirect('/admin/director-report-list')->with('flash_message', 'DirectorReportList added!');
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
        $directorreportlist = DirectorReportList::findOrFail($id);

        return view('admin.director-report-list.show', compact('directorreportlist'));
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
        $directorreportlist = DirectorReportList::findOrFail($id);

        return view('admin.director-report-list.edit', compact('directorreportlist'));
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
        $directorreportlist = DirectorReportList::findOrFail($id);
        $directorreportlist->update($requestData);

        return redirect('/admin/director-report-list')->with('flash_message', 'DirectorReportList updated!');
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
        $directorreportlist = DirectorReportList::where('id', $id)->first();
        if (isset($directorreportlist)){
            delete_image($directorreportlist->image);
            $directorreportlist->delete();
        }

        return redirect('/admin/director-report-list')->with('flash_message', 'DirectorReportList deleted!');
    }
}
