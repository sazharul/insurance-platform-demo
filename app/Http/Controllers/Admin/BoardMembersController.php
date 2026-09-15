<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BoardMember;
use Illuminate\Http\Request;

class BoardMembersController extends Controller
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
            $boardmembers = BoardMember::where('board_cat_id', 'LIKE', "%$keyword%")
                ->orWhere('designation_id', 'LIKE', "%$keyword%")
                ->orWhere('en_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_name', 'LIKE', "%$keyword%")
                ->orWhere('en_details', 'LIKE', "%$keyword%")
                ->orWhere('en_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_details', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->with('designation', 'boardCategory')
                ->orderBy('position','asc')->paginate($perPage);
        } else {
            $boardmembers = BoardMember::orderBy('position','asc')->paginate($perPage);
        }

        return view('admin.board-members.index', compact('boardmembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.board-members.create');
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
        BoardMember::create($requestData);

        return redirect('/admin/board-members')->with('flash_message', 'BoardMember added!');
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
        $boardmember = BoardMember::findOrFail($id);

        return view('admin.board-members.show', compact('boardmember'));
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
        $boardmember = BoardMember::findOrFail($id);

        return view('admin.board-members.edit', compact('boardmember'));
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
        $boardmember = BoardMember::findOrFail($id);
        $boardmember->update($requestData);

        return redirect('/admin/board-members')->with('flash_message', 'BoardMember updated!');
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
        $boardmember = BoardMember::where('id', $id)->first();
        if (isset($boardmember)){
            delete_image($boardmember->image);
            $boardmember->delete();
        }
        return redirect('/admin/board-members')->with('flash_message', 'BoardMember deleted!');
    }
}
