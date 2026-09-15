<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ClaimsForm;
use Illuminate\Http\Request;

class ClaimsFormController extends Controller
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
            $claimsform = ClaimsForm::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('en_heading', 'LIKE', "%$keyword%")
                ->orWhere('bn_heading', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->orWhere('en_btn_text', 'LIKE', "%$keyword%")
                ->orWhere('bn_btn_text', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $claimsform = ClaimsForm::latest()->paginate($perPage);
        }

        return view('admin.claims-form.index', compact('claimsform'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.claims-form.create');
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

        ClaimsForm::create($requestData);

        return redirect('/admin/claims-form')->with('flash_message', 'ClaimsForm added!');
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
        $claimsform = ClaimsForm::findOrFail($id);

        return view('admin.claims-form.show', compact('claimsform'));
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
        $claimsform = ClaimsForm::findOrFail($id);

        return view('admin.claims-form.edit', compact('claimsform'));
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

        $claimsform = ClaimsForm::findOrFail($id);
        $claimsform->update($requestData);

        return redirect('/admin/claims-form')->with('flash_message', 'ClaimsForm updated!');
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

        $claimsform = ClaimsForm::where('id', $id)->first();
        if (isset($claimsform)){
            delete_image($claimsform->pdf_file);
            $claimsform->delete();
        }

        return redirect('/admin/claims-form')->with('flash_message', 'ClaimsForm deleted!');
    }
}
