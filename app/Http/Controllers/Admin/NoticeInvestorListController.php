<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\NoticeInvestorList;
use Illuminate\Http\Request;

class NoticeInvestorListController extends Controller
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
            $noticeinvestorlist = NoticeInvestorList::where('icon', 'LIKE', "%$keyword%")
                ->orWhere('en_year', 'LIKE', "%$keyword%")
                ->orWhere('bn_year', 'LIKE', "%$keyword%")
                ->orWhere('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_details', 'LIKE', "%$keyword%")
                ->orWhere('uploaded_date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $noticeinvestorlist = NoticeInvestorList::latest()->paginate($perPage);
        }

        return view('admin.notice-investor-list.index', compact('noticeinvestorlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.notice-investor-list.create');
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
        if ($request->hasFile('icon')) {
            $requestData['icon'] = image_upload($request->icon);
        }
        if ($request->hasFile('notice_file')) {
            $requestData['notice_file'] = image_upload($request->notice_file);
        }

        NoticeInvestorList::create($requestData);

        return redirect('/admin/notice-investor-list')->with('flash_message', 'NoticeInvestorList added!');
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
        $noticeinvestorlist = NoticeInvestorList::findOrFail($id);

        return view('admin.notice-investor-list.show', compact('noticeinvestorlist'));
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
        $noticeinvestorlist = NoticeInvestorList::findOrFail($id);

        return view('admin.notice-investor-list.edit', compact('noticeinvestorlist'));
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
        if ($request->hasFile('icon')) {
            $requestData['icon'] = image_upload($request->icon);
        }
        if ($request->hasFile('notice_file')) {
            $requestData['notice_file'] = image_upload($request->notice_file);
        }

        $noticeinvestorlist = NoticeInvestorList::findOrFail($id);
        $noticeinvestorlist->update($requestData);

        return redirect('/admin/notice-investor-list')->with('flash_message', 'NoticeInvestorList updated!');
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
        $noticeinvestorlist = NoticeInvestorList::where('id', $id)->first();
        if (isset($noticeinvestorlist)){
            delete_image($noticeinvestorlist->icon);
            $noticeinvestorlist->delete();
        }
        if (isset($noticeinvestorlist)){
            delete_image($noticeinvestorlist->notice_file);
            $noticeinvestorlist->delete();
        }
        return redirect('/admin/notice-investor-list')->with('flash_message', 'NoticeInvestorList deleted!');
    }
}
