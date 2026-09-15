<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CommitteeBoardMember;
use Illuminate\Http\Request;

class CommitteeBoardMemberController extends Controller
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
            $committeeboardmember = CommitteeBoardMember::where('committee_name_id', 'LIKE', "%$keyword%")
                ->orWhere('profile_image', 'LIKE', "%$keyword%")
                ->orWhere('en_designation', 'LIKE', "%$keyword%")
                ->orWhere('bn_designation', 'LIKE', "%$keyword%")
                ->orWhere('en_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_name', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->with('commiteeInfo')
                ->orderBy('position','asc')->paginate($perPage);
        } else {
            $committeeboardmember = CommitteeBoardMember::orderBy('position','asc')->paginate($perPage);
        }

        return view('admin.committee-board-member.index', compact('committeeboardmember'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.committee-board-member.create');
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

        CommitteeBoardMember::create($requestData);

        return redirect('/admin/committee-board-member')->with('flash_message', 'CommitteeBoardMember added!');
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
        $committeeboardmember = CommitteeBoardMember::findOrFail($id);

        return view('admin.committee-board-member.show', compact('committeeboardmember'));
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
        $committeeboardmember = CommitteeBoardMember::findOrFail($id);

        return view('admin.committee-board-member.edit', compact('committeeboardmember'));
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


        $committeeboardmember = CommitteeBoardMember::findOrFail($id);
        $committeeboardmember->update($requestData);

        return redirect('/admin/committee-board-member')->with('flash_message', 'CommitteeBoardMember updated!');
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
        $committeeboardmember = CommitteeBoardMember::where('id', $id)->first();
        if (isset($committeeboardmember)){
            delete_image($committeeboardmember->profile_image);
            $committeeboardmember->delete();
        }
        return redirect('/admin/committee-board-member')->with('flash_message', 'CommitteeBoardMember deleted!');
    }
}
