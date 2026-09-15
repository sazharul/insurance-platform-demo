<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ValueAddedStatementList;
use Illuminate\Http\Request;

class ValueAddedStatementListController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $valueaddedstatementlist = ValueAddedStatementList::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $valueaddedstatementlist = ValueAddedStatementList::latest()->paginate($perPage);
        }

        return view('admin.value-added-statement-list.index', compact('valueaddedstatementlist'));
    }
    public function create()
    {
        return view('admin.value-added-statement-list.create');
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
        if ($request->hasFile('image')) {
            $requestData['image'] = image_upload($request->image);
        }


        ValueAddedStatementList::create($requestData);

        return redirect('/admin/value-added-statement-list')->with('flash_message', 'ValueAddedStatementList added!');
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
        $valueaddedstatementlist = ValueAddedStatementList::findOrFail($id);

        return view('admin.value-added-statement-list.show', compact('valueaddedstatementlist'));
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
        $valueaddedstatementlist = ValueAddedStatementList::findOrFail($id);

        return view('admin.value-added-statement-list.edit', compact('valueaddedstatementlist'));
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
        if ($request->hasFile('image')) {
            $requestData['image'] = image_upload($request->image);
        }
        if ($request->hasFile('pdf_file')) {
            $title = $request->en_title;
            $requestData['pdf_file'] = image_upload($request->pdf_file, $title);
        }


        $valueaddedstatementlist = ValueAddedStatementList::findOrFail($id);
        $valueaddedstatementlist->update($requestData);

        return redirect('/admin/value-added-statement-list')->with('flash_message', 'ValueAddedStatementList updated!');
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
        ValueAddedStatementList::destroy($id);

        $valueaddedstatementlist = ValueAddedStatementList::where('id', $id)->first();
        if (isset($valueaddedstatementlist)){
            delete_image($valueaddedstatementlist->pdf_file);
            $valueaddedstatementlist->delete();
        }
        if (isset($valueaddedstatementlist)){
            delete_image($valueaddedstatementlist->image);
            $valueaddedstatementlist->delete();
        }

        return redirect('/admin/value-added-statement-list')->with('flash_message', 'ValueAddedStatementList deleted!');
    }
}

