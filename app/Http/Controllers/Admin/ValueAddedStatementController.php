<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\ValueAddedStatement;
use Illuminate\Http\Request;

class ValueAddedStatementController extends Controller
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
            $valueaddedstatement = ValueAddedStatement::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $valueaddedstatement = ValueAddedStatement::latest()->paginate($perPage);
        }

        return view('admin.value-added-statement.index', compact('valueaddedstatement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.value-added-statement.create');
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


        ValueAddedStatement::create($requestData);

        return redirect('/admin/value-added-statement')->with('flash_message', 'ValueAddedStatement added!');
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
        $valueaddedstatement = ValueAddedStatement::findOrFail($id);

        return view('admin.value-added-statement.show', compact('valueaddedstatement'));
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
        $valueaddedstatement = ValueAddedStatement::findOrFail($id);

        return view('admin.value-added-statement.edit', compact('valueaddedstatement'));
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

        $valueaddedstatement = ValueAddedStatement::findOrFail($id);
        $valueaddedstatement->update($requestData);

        return redirect('/admin/value-added-statement')->with('flash_message', 'ValueAddedStatement updated!');
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

        $valueaddedstatement = ValueAddedStatement::where('id', $id)->first();
        if (isset($valueaddedstatement)){
            delete_image($valueaddedstatement->pdf_file);
            $valueaddedstatement->delete();
        }


        return redirect('/admin/value-added-statement')->with('flash_message', 'ValueAddedStatement deleted!');
    }
}
