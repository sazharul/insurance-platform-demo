<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClaimFormList;
use Illuminate\Http\Request;

class claimformlistController extends Controller
{

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $claimformlist = claimformlist::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $claimformlist = claimformlist::latest()->paginate($perPage);
        }

        return view('admin.claim-form-list.index', compact('claimformlist'));
    }
    public function create()
    {
        return view('admin.claim-form-list.create');
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


        claimformlist::create($requestData);

        return redirect('/admin/claim-form-list')->with('flash_message', 'claimformlist added!');
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
        $proposalform = claimformlist::findOrFail($id);

        return view('admin.claim-form-list.show', compact('claimformlist'));
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
        $claimformlist = claimformlist::findOrFail($id);

        return view('admin.claim-form-list.edit', compact('claimformlist'));
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


        $claimformlist = claimformlist::findOrFail($id);
        $claimformlist->update($requestData);

        return redirect('/admin/claim-form-list')->with('flash_message', 'claimformlist updated!');
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
        claimformlist::destroy($id);

        $claimformlist = claimformlist::where('id', $id)->first();
        if (isset($claimformlist)){
            delete_image($claimformlist->pdf_file);
            $claimformlist->delete();
        }

        return redirect('/admin/claim-form-list')->with('flash_message', 'claimformlist deleted!');
    }
}

