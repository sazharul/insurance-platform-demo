<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ManagementMember;
use Illuminate\Http\Request;

class ManagementMemberController extends Controller
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
            $managementmember = ManagementMember::where('image', 'LIKE', "%$keyword%")
                ->orWhere('en_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_name', 'LIKE', "%$keyword%")
                ->orWhere('en_designation', 'LIKE', "%$keyword%")
                ->orWhere('bn_designation', 'LIKE', "%$keyword%")
                ->orWhere('en_department', 'LIKE', "%$keyword%")
                ->orWhere('bn_department', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orderBy('position', 'asc')
                ->paginate($perPage);
        } else {
            $managementmember = ManagementMember::orderBy('position', 'asc')->paginate($perPage);
        }

        return view('admin.management-member.index', compact('managementmember'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.management-member.create');
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
        ManagementMember::create($requestData);

        return redirect('/admin/management-member')->with('flash_message', 'ManagementMember added!');
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
        $managementmember = ManagementMember::findOrFail($id);

        return view('admin.management-member.show', compact('managementmember'));
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
        $managementmember = ManagementMember::findOrFail($id);

        return view('admin.management-member.edit', compact('managementmember'));
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
        $managementmember = ManagementMember::findOrFail($id);
        $managementmember->update($requestData);

        return redirect('/admin/management-member')->with('flash_message', 'ManagementMember updated!');
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
        $managementmember = ManagementMember::where('id', $id)->first();
        if (isset($managementmember)){
            delete_image($managementmember->image);
            $managementmember->delete();
        }
        return redirect('/admin/management-member')->with('flash_message', 'ManagementMember deleted!');
    }
}
