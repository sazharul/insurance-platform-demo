<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\KycProfileForm;
use Illuminate\Http\Request;

class KycProfileFormController extends Controller
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
            $kycprofileform = KycProfileForm::where('en_title', 'LIKE', "%$keyword%")
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
            $kycprofileform = KycProfileForm::latest()->paginate($perPage);
        }

        return view('admin.kyc-profile-form.index', compact('kycprofileform'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.kyc-profile-form.create');
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

        KycProfileForm::create($requestData);

        return redirect('/admin/kyc-profile-form')->with('flash_message', 'KycProfileForm added!');
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
        $kycprofileform = KycProfileForm::findOrFail($id);

        return view('admin.kyc-profile-form.show', compact('kycprofileform'));
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
        $kycprofileform = KycProfileForm::findOrFail($id);

        return view('admin.kyc-profile-form.edit', compact('kycprofileform'));
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

        $kycprofileform = KycProfileForm::findOrFail($id);
        $kycprofileform->update($requestData);

        return redirect('/admin/kyc-profile-form')->with('flash_message', 'KycProfileForm updated!');
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

        $kycprofileform = KycProfileForm::where('id', $id)->first();
        if (isset($kycprofileform)){
            delete_image($kycprofileform->pdf_file);
            $kycprofileform->delete();
        }

        return redirect('/admin/kyc-profile-form')->with('flash_message', 'KycProfileForm deleted!');
    }
}
