<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\ChairmanMessage;
use Illuminate\Http\Request;

class ChairmanMessageController extends Controller
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
            $chairmanmessage = ChairmanMessage::where('en_title', 'LIKE', "%$keyword%")
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
            $chairmanmessage = ChairmanMessage::latest()->paginate($perPage);
        }

        return view('admin.chairman-message.index', compact('chairmanmessage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.chairman-message.create');
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

        ChairmanMessage::create($requestData);

        return redirect('/admin/chairman-message')->with('flash_message', 'ChairmanMessage added!');
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
        $chairmanmessage = ChairmanMessage::findOrFail($id);

        return view('admin.chairman-message.show', compact('chairmanmessage'));
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
        $chairmanmessage = ChairmanMessage::findOrFail($id);

        return view('admin.chairman-message.edit', compact('chairmanmessage'));
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

        $chairmanmessage = ChairmanMessage::findOrFail($id);
        $chairmanmessage->update($requestData);

        return redirect('/admin/chairman-message')->with('flash_message', 'ChairmanMessage updated!');
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

        $chairmanmessage = ChairmanMessage::where('id', $id)->first();
        if (isset($chairmanmessage)){
            delete_image($chairmanmessage->image);
            $chairmanmessage->delete();
        }
        if (isset($chairmanmessage)){
            delete_image($chairmanmessage->signature_img);
            $chairmanmessage->delete();
        }
        if (isset($chairmanmessage)){
            delete_image($chairmanmessage->arabic_img);
            $chairmanmessage->delete();
        }

        return redirect('/admin/chairman-message')->with('flash_message', 'ChairmanMessage deleted!');
    }
}
