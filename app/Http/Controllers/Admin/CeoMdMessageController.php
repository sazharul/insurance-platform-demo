<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CeoMdMessage;
use Illuminate\Http\Request;

class CeoMdMessageController extends Controller
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
            $ceomdmessage = CeoMdMessage::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('en_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_name', 'LIKE', "%$keyword%")
                ->orWhere('en_designation', 'LIKE', "%$keyword%")
                ->orWhere('bn_designation', 'LIKE', "%$keyword%")
                ->orWhere('en_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_details', 'LIKE', "%$keyword%")
                ->orWhere('signature_img', 'LIKE', "%$keyword%")
                ->orWhere('arabic_img', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ceomdmessage = CeoMdMessage::latest()->paginate($perPage);
        }

        return view('admin.ceo-md-message.index', compact('ceomdmessage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.ceo-md-message.create');
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

        if ($request->hasFile('image')) {
            $requestData['image'] = image_upload($request->image);
        }
        if ($request->hasFile('signature_img')) {
            $requestData['signature_img'] = image_upload($request->signature_img);
        }
        if ($request->hasFile('arabic_img')) {
            $requestData['arabic_img'] = image_upload($request->arabic_img);
        }

        CeoMdMessage::create($requestData);

        return redirect('/admin/ceo-md-message')->with('flash_message', 'CeoMdMessage added!');
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
        $ceomdmessage = CeoMdMessage::findOrFail($id);

        return view('admin.ceo-md-message.show', compact('ceomdmessage'));
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
        $ceomdmessage = CeoMdMessage::findOrFail($id);

        return view('admin.ceo-md-message.edit', compact('ceomdmessage'));
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

        if ($request->hasFile('image')) {
            $requestData['image'] = image_upload($request->image);
        }
        if ($request->hasFile('signature_img')) {
            $requestData['signature_img'] = image_upload($request->signature_img);
        }
        if ($request->hasFile('arabic_img')) {
            $requestData['arabic_img'] = image_upload($request->arabic_img);
        }

        $ceomdmessage = CeoMdMessage::findOrFail($id);
        $ceomdmessage->update($requestData);

        return redirect('/admin/ceo-md-message')->with('flash_message', 'CeoMdMessage updated!');
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
        CeoMdMessage::destroy($id);

        return redirect('/admin/ceo-md-message')->with('flash_message', 'CeoMdMessage deleted!');
    }
}
