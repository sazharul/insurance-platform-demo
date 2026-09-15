<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DistributionPolicy;
use Illuminate\Http\Request;

class DistributionPolicyController extends Controller
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
            $distributionpolicy = DistributionPolicy::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('en_heading', 'LIKE', "%$keyword%")
                ->orWhere('bn_heading', 'LIKE', "%$keyword%")
                ->orWhere('pdf_file', 'LIKE', "%$keyword%")
                ->orWhere('en_btn_text', 'LIKE', "%$keyword%")
                ->orWhere('bn_btn_text', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $distributionpolicy = DistributionPolicy::latest()->paginate($perPage);
        }

        return view('admin.distribution-policy.index', compact('distributionpolicy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.distribution-policy.create');
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
        if ($request->hasFile('pdf_file')) {
            $title = $request->en_title;
            $requestData['pdf_file'] = image_upload($request->pdf_file, $title);
        }

        DistributionPolicy::create($requestData);

        return redirect('/admin/distribution-policy')->with('flash_message', 'DistributionPolicy added!');
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
        $distributionpolicy = DistributionPolicy::findOrFail($id);

        return view('admin.distribution-policy.show', compact('distributionpolicy'));
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
        $distributionpolicy = DistributionPolicy::findOrFail($id);

        return view('admin.distribution-policy.edit', compact('distributionpolicy'));
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
        if ($request->hasFile('pdf_file')) {
            $title = $request->en_title;
            $requestData['pdf_file'] = image_upload($request->pdf_file, $title);
        }

        $distributionpolicy = DistributionPolicy::findOrFail($id);
        $distributionpolicy->update($requestData);

        return redirect('/admin/distribution-policy')->with('flash_message', 'DistributionPolicy updated!');
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
        DistributionPolicy::destroy($id);

        $distributionpolicy = DistributionPolicy::where('id', $id)->first();
        if (isset($distributionpolicy)){
            delete_image($distributionpolicy->pdf_file);
            $distributionpolicy->delete();
        }

        return redirect('/admin/distribution-policy')->with('flash_message', 'DistributionPolicy deleted!');
    }
}
