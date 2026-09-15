<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DetailsOfShareholding;
use Illuminate\Http\Request;

class DetailsOfShareholdingController extends Controller
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
            $detailsofshareholding = DetailsOfShareholding::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('en_heading', 'LIKE', "%$keyword%")
                ->orWhere('bn_heading', 'LIKE', "%$keyword%")
                ->orWhere('en_sub_heading', 'LIKE', "%$keyword%")
                ->orWhere('bn_sub_heading', 'LIKE', "%$keyword%")
                ->orWhere('en_table_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_table_name', 'LIKE', "%$keyword%")
                ->orWhere('en_table_status', 'LIKE', "%$keyword%")
                ->orWhere('bn_table_status', 'LIKE', "%$keyword%")
                ->orWhere('en_table_of_shares', 'LIKE', "%$keyword%")
                ->orWhere('bn_table_of_shares', 'LIKE', "%$keyword%")
                ->orWhere('en_table_of_share_in', 'LIKE', "%$keyword%")
                ->orWhere('bn_table_of_share_in', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $detailsofshareholding = DetailsOfShareholding::latest()->paginate($perPage);
        }

        return view('admin.details-of-shareholding.index', compact('detailsofshareholding'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.details-of-shareholding.create');
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
        
        DetailsOfShareholding::create($requestData);

        return redirect('/admin/details-of-shareholding')->with('flash_message', 'DetailsOfShareholding added!');
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
        $detailsofshareholding = DetailsOfShareholding::findOrFail($id);

        return view('admin.details-of-shareholding.show', compact('detailsofshareholding'));
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
        $detailsofshareholding = DetailsOfShareholding::findOrFail($id);

        return view('admin.details-of-shareholding.edit', compact('detailsofshareholding'));
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
        
        $detailsofshareholding = DetailsOfShareholding::findOrFail($id);
        $detailsofshareholding->update($requestData);

        return redirect('/admin/details-of-shareholding')->with('flash_message', 'DetailsOfShareholding updated!');
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
        DetailsOfShareholding::destroy($id);

        return redirect('/admin/details-of-shareholding')->with('flash_message', 'DetailsOfShareholding deleted!');
    }
}
