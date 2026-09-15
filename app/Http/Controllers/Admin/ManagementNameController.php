<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ManagementName;
use Illuminate\Http\Request;

class ManagementNameController extends Controller
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
            $managementname = ManagementName::where('en_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_name', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orderBy('position', 'asc')
                ->paginate($perPage);
        } else {
            $managementname = ManagementName::orderBy('position', 'asc')->paginate($perPage);
        }

        return view('admin.management-name.index', compact('managementname'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.management-name.create');
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

        ManagementName::create($requestData);

        return redirect('/admin/management-name')->with('flash_message', 'ManagementName added!');
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
        $managementname = ManagementName::findOrFail($id);

        return view('admin.management-name.show', compact('managementname'));
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
        $managementname = ManagementName::findOrFail($id);

        return view('admin.management-name.edit', compact('managementname'));
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

        $managementname = ManagementName::findOrFail($id);
        $managementname->update($requestData);

        return redirect('/admin/management-name')->with('flash_message', 'ManagementName updated!');
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
        ManagementName::destroy($id);

        return redirect('/admin/management-name')->with('flash_message', 'ManagementName deleted!');
    }
}
