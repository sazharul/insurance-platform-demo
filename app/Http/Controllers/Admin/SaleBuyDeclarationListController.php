<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\SaleBuyDeclarationList;
use Illuminate\Http\Request;

class SaleBuyDeclarationListController extends Controller
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
            $salebuydeclarationlist = SaleBuyDeclarationList::where('icon', 'LIKE', "%$keyword%")
                ->orWhere('en_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_name', 'LIKE', "%$keyword%")
                ->orWhere('en_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_details', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $salebuydeclarationlist = SaleBuyDeclarationList::latest()->paginate($perPage);
        }

        return view('admin.sale-buy-declaration-list.index', compact('salebuydeclarationlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.sale-buy-declaration-list.create');
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

        SaleBuyDeclarationList::create($requestData);

        return redirect('/admin/sale-buy-declaration-list')->with('flash_message', 'SaleBuyDeclarationList added!');
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
        $salebuydeclarationlist = SaleBuyDeclarationList::findOrFail($id);

        return view('admin.sale-buy-declaration-list.show', compact('salebuydeclarationlist'));
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
        $salebuydeclarationlist = SaleBuyDeclarationList::findOrFail($id);

        return view('admin.sale-buy-declaration-list.edit', compact('salebuydeclarationlist'));
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

        $salebuydeclarationlist = SaleBuyDeclarationList::findOrFail($id);
        $salebuydeclarationlist->update($requestData);

        return redirect('/admin/sale-buy-declaration-list')->with('flash_message', 'SaleBuyDeclarationList updated!');
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
        $salebuydeclarationlist = SaleBuyDeclarationList::where('id', $id)->first();
        if (isset($salebuydeclarationlist)){
            delete_image($salebuydeclarationlist->image);
            $salebuydeclarationlist->delete();
        }

        return redirect('/admin/sale-buy-declaration-list')->with('flash_message', 'SaleBuyDeclarationList deleted!');
    }
}
