<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\BoardOfDirector;
use Illuminate\Http\Request;

class BoardOfDirectorsController extends Controller
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
            $boardofdirectors = BoardOfDirector::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_3', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_3', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $boardofdirectors = BoardOfDirector::latest()->paginate($perPage);
        }

        return view('admin.board-of-directors.index', compact('boardofdirectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.board-of-directors.create');
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

        BoardOfDirector::create($requestData);

        return redirect('/admin/board-of-directors')->with('flash_message', 'BoardOfDirector added!');
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
        $boardofdirector = BoardOfDirector::findOrFail($id);

        return view('admin.board-of-directors.show', compact('boardofdirector'));
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
        $boardofdirector = BoardOfDirector::findOrFail($id);

        return view('admin.board-of-directors.edit', compact('boardofdirector'));
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

        $boardofdirector = BoardOfDirector::findOrFail($id);
        $boardofdirector->update($requestData);

        return redirect('/admin/board-of-directors')->with('flash_message', 'BoardOfDirector updated!');
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
        BoardOfDirector::destroy($id);

        return redirect('/admin/board-of-directors')->with('flash_message', 'BoardOfDirector deleted!');
    }
}
