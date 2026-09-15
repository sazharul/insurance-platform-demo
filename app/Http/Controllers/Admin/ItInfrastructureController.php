<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ItInfrastructure;
use Illuminate\Http\Request;

class ItInfrastructureController extends Controller
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
            $itinfrastructure = ItInfrastructure::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('en_heading', 'LIKE', "%$keyword%")
                ->orWhere('bn_heading', 'LIKE', "%$keyword%")
                ->orWhere('en_description', 'LIKE', "%$keyword%")
                ->orWhere('bn_description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $itinfrastructure = ItInfrastructure::latest()->paginate($perPage);
        }

        return view('admin.it-infrastructure.index', compact('itinfrastructure'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.it-infrastructure.create');
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


        ItInfrastructure::create($requestData);

        return redirect('/admin/it-infrastructure')->with('flash_message', 'ItInfrastructure added!');
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
        $itinfrastructure = ItInfrastructure::findOrFail($id);

        return view('admin.it-infrastructure.show', compact('itinfrastructure'));
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
        $itinfrastructure = ItInfrastructure::findOrFail($id);

        return view('admin.it-infrastructure.edit', compact('itinfrastructure'));
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

        $itinfrastructure = ItInfrastructure::findOrFail($id);
        $itinfrastructure->update($requestData);

        return redirect('/admin/it-infrastructure')->with('flash_message', 'ItInfrastructure updated!');
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
        $itinfrastructure = ItInfrastructure::where('id', $id)->first();
        if (isset($itinfrastructure)){
            delete_image($itinfrastructure->pdf_file);
            $itinfrastructure->delete();
        }

        return redirect('/admin/it-infrastructure')->with('flash_message', 'ItInfrastructure deleted!');
    }
}
