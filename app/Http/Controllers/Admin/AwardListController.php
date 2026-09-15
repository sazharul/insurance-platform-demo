<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AwardList;
use Illuminate\Http\Request;

class AwardListController extends Controller
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
            $awardlist = AwardList::where('icon', 'LIKE', "%$keyword%")
                ->orWhere('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $awardlist = AwardList::latest()->paginate($perPage);
        }

        return view('admin.award-list.index', compact('awardlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.award-list.create');
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
        if ($request->hasFile('image')) {
            $requestData['image'] = image_upload($request->image);
        }

        AwardList::create($requestData);

        return redirect('/admin/award-list')->with('flash_message', 'AwardList added!');
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
        $awardlist = AwardList::findOrFail($id);

        return view('admin.award-list.show', compact('awardlist'));
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
        $awardlist = AwardList::findOrFail($id);

        return view('admin.award-list.edit', compact('awardlist'));
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
        if ($request->hasFile('image')) {
            $requestData['image'] = image_upload($request->image);
        }

        $awardlist = AwardList::findOrFail($id);
        $awardlist->update($requestData);

        return redirect('/admin/award-list')->with('flash_message', 'AwardList updated!');
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
        $awardlist = AwardList::where('id', $id)->first();
        if (isset($awardlist)){
            delete_image($awardlist->icon);
            $awardlist->delete();
        }
        if (isset($awardlist)){
            delete_image($awardlist->image);
            $awardlist->delete();
        }

        return redirect('/admin/award-list')->with('flash_message', 'AwardList deleted!');
    }
}
