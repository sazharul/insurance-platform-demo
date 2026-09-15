<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ContactU;
use Illuminate\Http\Request;

class ContactUsController extends Controller
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
            $contactus = ContactU::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('en_heading', 'LIKE', "%$keyword%")
                ->orWhere('bn_heading', 'LIKE', "%$keyword%")
                ->orWhere('location_icon', 'LIKE', "%$keyword%")
                ->orWhere('en_location_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_location_title', 'LIKE', "%$keyword%")
                ->orWhere('en_location_address', 'LIKE', "%$keyword%")
                ->orWhere('bn_location_address', 'LIKE', "%$keyword%")
                ->orWhere('email_icon', 'LIKE', "%$keyword%")
                ->orWhere('en_email_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_email_title', 'LIKE', "%$keyword%")
                ->orWhere('en_email_address', 'LIKE', "%$keyword%")
                ->orWhere('bn_email_address', 'LIKE', "%$keyword%")
                ->orWhere('hotline_icon', 'LIKE', "%$keyword%")
                ->orWhere('en_hotline_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_hotline_title', 'LIKE', "%$keyword%")
                ->orWhere('en_hotline_address', 'LIKE', "%$keyword%")
                ->orWhere('bn_hotline_address', 'LIKE', "%$keyword%")
                ->orWhere('en_btn_text', 'LIKE', "%$keyword%")
                ->orWhere('bn_btn_text', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contactus = ContactU::latest()->paginate($perPage);
        }

        return view('admin.contact-us.index', compact('contactus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.contact-us.create');
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
        if ($request->hasFile('location_icon')) {
            $requestData['location_icon'] = image_upload($request->location_icon);
        }
        if ($request->hasFile('email_icon')) {
            $requestData['email_icon'] = image_upload($request->email_icon);
        }
        if ($request->hasFile('hotline_icon')) {
            $requestData['hotline_icon'] = image_upload($request->hotline_icon);
        }

        ContactU::create($requestData);

        return redirect('/admin/contact-us')->with('flash_message', 'ContactU added!');
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
        $contactu = ContactU::findOrFail($id);

        return view('admin.contact-us.show', compact('contactu'));
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
        $contactu = ContactU::findOrFail($id);

        return view('admin.contact-us.edit', compact('contactu'));
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
        if ($request->hasFile('location_icon')) {
            $requestData['location_icon'] = image_upload($request->location_icon);
        }
        if ($request->hasFile('email_icon')) {
            $requestData['email_icon'] = image_upload($request->email_icon);
        }
        if ($request->hasFile('hotline_icon')) {
            $requestData['hotline_icon'] = image_upload($request->hotline_icon);
        }

        $contactu = ContactU::findOrFail($id);
        $contactu->update($requestData);

        return redirect('/admin/contact-us')->with('flash_message', 'ContactU updated!');
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
        $contactu = ContactU::where('id', $id)->first();
        if (isset($contactu)){
            delete_image($contactu->location_icon);
            $contactu->delete();
        }
        if (isset($contactu)){
            delete_image($contactu->email_icon);
            $contactu->delete();
        }
        if (isset($contactu)){
            delete_image($contactu->hotline_icon);
            $contactu->delete();
        }

        return redirect('/admin/contact-us')->with('flash_message', 'ContactU deleted!');
    }
}
