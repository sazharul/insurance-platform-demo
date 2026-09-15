<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BranchLocation;
use Illuminate\Http\Request;

class BranchLocationController extends Controller
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
            $branchlocation = BranchLocation::where('en_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_name', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orderBy('position','asc')->paginate($perPage);
        } else {
            $branchlocation = BranchLocation::orderBy('position','asc')->paginate($perPage);
        }

        return view('admin.branch-location.index', compact('branchlocation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.branch-location.create');
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

        BranchLocation::create($requestData);

        return redirect('/admin/branch-location')->with('flash_message', 'BranchLocation added!');
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
        $branchlocation = BranchLocation::findOrFail($id);

        return view('admin.branch-location.show', compact('branchlocation'));
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
        $branchlocation = BranchLocation::findOrFail($id);

        return view('admin.branch-location.edit', compact('branchlocation'));
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

        $branchlocation = BranchLocation::findOrFail($id);
        $branchlocation->update($requestData);

        return redirect('/admin/branch-location')->with('flash_message', 'BranchLocation updated!');
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
        BranchLocation::destroy($id);

        return redirect('/admin/branch-location')->with('flash_message', 'BranchLocation deleted!');
    }
}
