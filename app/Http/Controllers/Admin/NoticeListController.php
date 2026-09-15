<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\NoticeList;
use Illuminate\Http\Request;

class NoticeListController extends Controller
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
            $noticelist = NoticeList::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_details', 'LIKE', "%$keyword%")
                ->orWhere('en_year', 'LIKE', "%$keyword%")
                ->orWhere('bn_year', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $noticelist = NoticeList::latest()->paginate($perPage);
        }

        return view('admin.notice-list.index', compact('noticelist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.notice-list.create');
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

        NoticeList::create($requestData);

        return redirect('/admin/notice-list')->with('flash_message', 'NoticeList added!');
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
        $noticelist = NoticeList::findOrFail($id);

        return view('admin.notice-list.show', compact('noticelist'));
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
        $noticelist = NoticeList::findOrFail($id);

        return view('admin.notice-list.edit', compact('noticelist'));
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
        $noticelist = NoticeList::findOrFail($id);
        $noticelist->update($requestData);

        return redirect('/admin/notice-list')->with('flash_message', 'NoticeList updated!');
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

        $noticelist = NoticeList::where('id', $id)->first();
        if (isset($noticelist)){
            delete_image($noticelist->icon);
            $noticelist->delete();
        }
        if (isset($noticelist)){
            delete_image($noticelist->notice_file);
            $noticelist->delete();
        }

        return redirect('/admin/notice-list')->with('flash_message', 'NoticeList deleted!');
    }
}
