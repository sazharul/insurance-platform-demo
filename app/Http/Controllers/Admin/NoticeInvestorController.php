<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\NoticeInvestor;
use Illuminate\Http\Request;

class NoticeInvestorController extends Controller
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
            $noticeinvestor = NoticeInvestor::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $noticeinvestor = NoticeInvestor::latest()->paginate($perPage);
        }

        return view('admin.notice-investor.index', compact('noticeinvestor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.notice-investor.create');
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
        
        NoticeInvestor::create($requestData);

        return redirect('/admin/notice-investor')->with('flash_message', 'NoticeInvestor added!');
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
        $noticeinvestor = NoticeInvestor::findOrFail($id);

        return view('admin.notice-investor.show', compact('noticeinvestor'));
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
        $noticeinvestor = NoticeInvestor::findOrFail($id);

        return view('admin.notice-investor.edit', compact('noticeinvestor'));
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
        
        $noticeinvestor = NoticeInvestor::findOrFail($id);
        $noticeinvestor->update($requestData);

        return redirect('/admin/notice-investor')->with('flash_message', 'NoticeInvestor updated!');
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
        NoticeInvestor::destroy($id);

        return redirect('/admin/notice-investor')->with('flash_message', 'NoticeInvestor deleted!');
    }
}
