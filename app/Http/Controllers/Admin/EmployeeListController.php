<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\EmployeeList;
use Illuminate\Http\Request;

class EmployeeListController extends Controller
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
            $employeelist = EmployeeList::where('en_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_name', 'LIKE', "%$keyword%")
                ->orWhere('designation_id', 'LIKE', "%$keyword%")
                ->orWhere('en_address', 'LIKE', "%$keyword%")
                ->orWhere('bn_address', 'LIKE', "%$keyword%")
                ->orWhere('department_id', 'LIKE', "%$keyword%")
                ->orWhere('en_phone_number', 'LIKE', "%$keyword%")
                ->orWhere('bn_phone_number', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('profile_image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->with('designation')
                ->orderBy('position','asc')->paginate($perPage);
        } else {
            $employeelist = EmployeeList::orderBy('position','asc')->paginate($perPage);
        }

        return view('admin.employee-list.index', compact('employeelist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.employee-list.create');
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
        if ($request->hasFile('profile_image')) {
            $requestData['profile_image'] = image_upload($request->profile_image);
        }

        EmployeeList::create($requestData);

        return redirect('/admin/employee-list')->with('flash_message', 'EmployeeList added!');
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
        $employeelist = EmployeeList::findOrFail($id);

        return view('admin.employee-list.show', compact('employeelist'));
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
        $employeelist = EmployeeList::findOrFail($id);

        return view('admin.employee-list.edit', compact('employeelist'));
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
        if ($request->hasFile('profile_image')) {
            $requestData['profile_image'] = image_upload($request->profile_image);
        }
        $employeelist = EmployeeList::findOrFail($id);
        $employeelist->update($requestData);

        return redirect('/admin/employee-list')->with('flash_message', 'EmployeeList updated!');
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

        $employeelist = EmployeeList::where('id', $id)->first();
        if (isset($employeelist)){
            delete_image($employeelist->profile_image);
            $employeelist->delete();
        }

        return redirect('/admin/employee-list')->with('flash_message', 'EmployeeList deleted!');
    }
}
