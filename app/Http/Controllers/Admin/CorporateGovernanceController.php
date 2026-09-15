<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CorporateGovernance;
use Illuminate\Http\Request;

class CorporateGovernanceController extends Controller
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
            $corporategovernance = CorporateGovernance::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('en_subject', 'LIKE', "%$keyword%")
                ->orWhere('bn_subject', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $corporategovernance = CorporateGovernance::latest()->paginate($perPage);
        }

        return view('admin.corporate-governance.index', compact('corporategovernance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.corporate-governance.create');
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

        CorporateGovernance::create($requestData);

        return redirect('/admin/corporate-governance')->with('flash_message', 'CorporateGovernance added!');
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
        $corporategovernance = CorporateGovernance::findOrFail($id);

        return view('admin.corporate-governance.show', compact('corporategovernance'));
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
        $corporategovernance = CorporateGovernance::findOrFail($id);

        return view('admin.corporate-governance.edit', compact('corporategovernance'));
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

        $corporategovernance = CorporateGovernance::findOrFail($id);
        $corporategovernance->update($requestData);

        return redirect('/admin/corporate-governance')->with('flash_message', 'CorporateGovernance updated!');
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

        $corporategovernance = CorporateGovernance::where('id', $id)->first();
        if (isset($corporategovernance)){
            delete_image($corporategovernance->pdf_file);
            $corporategovernance->delete();
        }

        return redirect('/admin/corporate-governance')->with('flash_message', 'CorporateGovernance deleted!');
    }
}
