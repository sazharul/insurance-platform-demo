<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PendingDividendList;
use Illuminate\Http\Request;

class PendingDividendListController extends Controller
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
            $pendingdividendlist = PendingDividendList::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_year', 'LIKE', "%$keyword%")
                ->orWhere('bn_year', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pendingdividendlist = PendingDividendList::latest()->paginate($perPage);
        }

        return view('admin.pending-dividend-list.index', compact('pendingdividendlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pending-dividend-list.create');
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

        PendingDividendList::create($requestData);

        return redirect('/admin/pending-dividend-list')->with('flash_message', 'PendingDividendList added!');
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
        $pendingdividendlist = PendingDividendList::findOrFail($id);

        return view('admin.pending-dividend-list.show', compact('pendingdividendlist'));
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
        $pendingdividendlist = PendingDividendList::findOrFail($id);

        return view('admin.pending-dividend-list.edit', compact('pendingdividendlist'));
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

        $pendingdividendlist = PendingDividendList::findOrFail($id);
        $pendingdividendlist->update($requestData);

        return redirect('/admin/pending-dividend-list')->with('flash_message', 'PendingDividendList updated!');
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
        $pendingdividendlist = PendingDividendList::where('id', $id)->first();
        if (isset($pendingdividendlist)){
            delete_image($pendingdividendlist->pdf_file);
            $pendingdividendlist->delete();
        }
        return redirect('/admin/pending-dividend-list')->with('flash_message', 'PendingDividendList deleted!');
    }
}
