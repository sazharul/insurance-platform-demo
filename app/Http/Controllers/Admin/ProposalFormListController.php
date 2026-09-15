<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProposalFormList;
use Illuminate\Http\Request;

class ProposalFormListController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $proposalformlist = ProposalFormList::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $proposalformlist = ProposalFormList::latest()->paginate($perPage);
        }

        return view('admin.proposal-form-list.index', compact('proposalformlist'));
    }
    public function create()
    {
        return view('admin.proposal-form-list.create');
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


        ProposalFormList::create($requestData);

        return redirect('/admin/proposal-form-list')->with('flash_message', 'ProposalFormList added!');
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
        $proposalform = ProposalFormList::findOrFail($id);

        return view('admin.proposal-form-list.show', compact('proposalformlist'));
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
        $proposalformlist = ProposalFormList::findOrFail($id);

        return view('admin.proposal-form-list.edit', compact('proposalformlist'));
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


        $proposalformlist = ProposalFormList::findOrFail($id);
        $proposalformlist->update($requestData);

        return redirect('/admin/proposal-form-list')->with('flash_message', 'ProposalFormList updated!');
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
        ProposalFormList::destroy($id);

        $proposalformlist = ProposalFormList::where('id', $id)->first();
        if (isset($proposalformlist)){
            delete_image($proposalformlist->pdf_file);
            $proposalformlist->delete();
        }

        return redirect('/admin/proposal-form-list')->with('flash_message', 'ProposalFormList deleted!');
    }
}
