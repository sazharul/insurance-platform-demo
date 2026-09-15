<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PendingDividend;
use Illuminate\Http\Request;

class PendingDividendController extends Controller
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
            $pendingdividend = PendingDividend::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->orWhere('en_btn_text', 'LIKE', "%$keyword%")
                ->orWhere('bn_btn_text', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pendingdividend = PendingDividend::latest()->paginate($perPage);
        }

        return view('admin.pending-dividend.index', compact('pendingdividend'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pending-dividend.create');
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
        PendingDividend::create($requestData);

        return redirect('/admin/pending-dividend')->with('flash_message', 'PendingDividend added!');
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
        $pendingdividend = PendingDividend::findOrFail($id);

        return view('admin.pending-dividend.show', compact('pendingdividend'));
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
        $pendingdividend = PendingDividend::findOrFail($id);

        return view('admin.pending-dividend.edit', compact('pendingdividend'));
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

        $pendingdividend = PendingDividend::findOrFail($id);
        $pendingdividend->update($requestData);

        return redirect('/admin/pending-dividend')->with('flash_message', 'PendingDividend updated!');
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
        PendingDividend::destroy($id);

        return redirect('/admin/pending-dividend')->with('flash_message', 'PendingDividend deleted!');
    }
}
