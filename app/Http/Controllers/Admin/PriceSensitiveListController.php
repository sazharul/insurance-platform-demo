<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PriceSensitiveList;
use Illuminate\Http\Request;

class PriceSensitiveListController extends Controller
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
            $pricesensitivelist = PriceSensitiveList::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_year', 'LIKE', "%$keyword%")
                ->orWhere('bn_year', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pricesensitivelist = PriceSensitiveList::latest()->paginate($perPage);
        }

        return view('admin.price-sensitive-list.index', compact('pricesensitivelist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.price-sensitive-list.create');
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

        PriceSensitiveList::create($requestData);

        return redirect('/admin/price-sensitive-list')->with('flash_message', 'PriceSensitiveList added!');
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
        $pricesensitivelist = PriceSensitiveList::findOrFail($id);

        return view('admin.price-sensitive-list.show', compact('pricesensitivelist'));
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
        $pricesensitivelist = PriceSensitiveList::findOrFail($id);

        return view('admin.price-sensitive-list.edit', compact('pricesensitivelist'));
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

        $pricesensitivelist = PriceSensitiveList::findOrFail($id);
        $pricesensitivelist->update($requestData);

        return redirect('/admin/price-sensitive-list')->with('flash_message', 'PriceSensitiveList updated!');
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
        $pricesensitivelist = PriceSensitiveList::where('id', $id)->first();
        if (isset($pricesensitivelist)){
            delete_image($pricesensitivelist->pdf_file);
            $pricesensitivelist->delete();
        }
        return redirect('/admin/price-sensitive-list')->with('flash_message', 'PriceSensitiveList deleted!');
    }
}
