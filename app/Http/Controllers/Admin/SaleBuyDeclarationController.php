<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\SaleBuyDeclaration;
use Illuminate\Http\Request;

class SaleBuyDeclarationController extends Controller
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
            $salebuydeclaration = SaleBuyDeclaration::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('en_heading', 'LIKE', "%$keyword%")
                ->orWhere('bn_heading', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $salebuydeclaration = SaleBuyDeclaration::latest()->paginate($perPage);
        }

        return view('admin.sale-buy-declaration.index', compact('salebuydeclaration'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.sale-buy-declaration.create');
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
        
        SaleBuyDeclaration::create($requestData);

        return redirect('/admin/sale-buy-declaration')->with('flash_message', 'SaleBuyDeclaration added!');
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
        $salebuydeclaration = SaleBuyDeclaration::findOrFail($id);

        return view('admin.sale-buy-declaration.show', compact('salebuydeclaration'));
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
        $salebuydeclaration = SaleBuyDeclaration::findOrFail($id);

        return view('admin.sale-buy-declaration.edit', compact('salebuydeclaration'));
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
        
        $salebuydeclaration = SaleBuyDeclaration::findOrFail($id);
        $salebuydeclaration->update($requestData);

        return redirect('/admin/sale-buy-declaration')->with('flash_message', 'SaleBuyDeclaration updated!');
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
        SaleBuyDeclaration::destroy($id);

        return redirect('/admin/sale-buy-declaration')->with('flash_message', 'SaleBuyDeclaration deleted!');
    }
}
