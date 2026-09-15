<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\AboutUsPage;
use Illuminate\Http\Request;

class AboutUsPageController extends Controller
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
            $aboutuspage = AboutUsPage::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('image1', 'LIKE', "%$keyword%")
                ->orWhere('image2', 'LIKE', "%$keyword%")
                ->orWhere('en_description', 'LIKE', "%$keyword%")
                ->orWhere('bn_description', 'LIKE', "%$keyword%")
                ->orWhere('en_core_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_core_title', 'LIKE', "%$keyword%")
                ->orWhere('en_left_core_description', 'LIKE', "%$keyword%")
                ->orWhere('bn_left_core_description', 'LIKE', "%$keyword%")
                ->orWhere('core_image', 'LIKE', "%$keyword%")
                ->orWhere('bn_right_core_description', 'LIKE', "%$keyword%")
                ->orWhere('en_process_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_process_title', 'LIKE', "%$keyword%")
                ->orWhere('en_process_description', 'LIKE', "%$keyword%")
                ->orWhere('bn_process_description', 'LIKE', "%$keyword%")
                ->orWhere('process_image', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $aboutuspage = AboutUsPage::latest()->paginate($perPage);
        }

        return view('admin.about-us-page.index', compact('aboutuspage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.about-us-page.create');
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

        if ($request->hasFile('image1')) {
            $requestData['image1'] = $request->file('image1')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('image2')) {
            $requestData['image2'] = $request->file('image2')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('core_image')) {
            $requestData['core_image'] = $request->file('core_image')
                ->store('uploads', 'public');
        }

        AboutUsPage::create($requestData);

        return redirect('/admin/about-us-page')->with('flash_message', 'AboutUsPage added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $aboutuspage = AboutUsPage::findOrFail($id);

        return view('admin.about-us-page.show', compact('aboutuspage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $aboutuspage = AboutUsPage::findOrFail($id);

        return view('admin.about-us-page.edit', compact('aboutuspage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->except([
            'en_left_core_list',
            'bn_left_core_list',
            'en_right_core_list',
            'bn_right_core_list',
            'en_process_list',
            'bn_process_list',
        ]);

        if (isset($request->en_left_core_list)) {
            $requestData['en_left_core_description'] = json_encode($request->en_left_core_list);
        }
        if (isset($request->bn_left_core_list)) {
            $requestData['bn_left_core_description'] = json_encode($request->bn_left_core_list);
        }


        if (isset($request->en_right_core_list)) {
            $requestData['en_right_core_description'] = json_encode($request->en_right_core_list);
        }
        if (isset($request->bn_right_core_list)) {
            $requestData['bn_right_core_description'] = json_encode($request->bn_right_core_list);
        }

        if (isset($request->en_process_list)) {
            $requestData['en_process_description'] = json_encode($request->en_process_list);
        }
        if (isset($request->bn_process_list)) {
            $requestData['bn_process_description'] = json_encode($request->bn_process_list);
        }


        if ($request->hasFile('image1')) {
            $requestData['image1'] = image_upload($request->image1);
        }

        if ($request->hasFile('image2')) {
            $requestData['image2'] = image_upload($request->image2);
        }

        if ($request->hasFile('core_image')) {
            $requestData['core_image'] = image_upload($request->core_image);
        }

        $aboutuspage = AboutUsPage::findOrFail($id);
        $aboutuspage->update($requestData);

        return redirect('/admin/about-us-page')->with('flash_message', 'AboutUsPage updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        AboutUsPage::destroy($id);

        return redirect('/admin/about-us-page')->with('flash_message', 'AboutUsPage deleted!');
    }
}
