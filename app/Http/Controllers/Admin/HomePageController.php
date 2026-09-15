<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function section_1(Request $request)
    {
        $homepage = HomePage::first();
        return view('admin.home-page.section1', compact('homepage'));
    }

    public function section_2(Request $request)
    {
        $homepage = HomePage::first();
        return view('admin.home-page.section2', compact('homepage'));
    }
    public function section_3(Request $request)
    {
        $homepage = HomePage::first();
        return view('admin.home-page.section3', compact('homepage'));
    }
    public function section_4(Request $request)
    {
        $homepage = HomePage::first();
        return view('admin.home-page.section4', compact('homepage'));
    }
    public function section_5(Request $request)
    {
        $homepage = HomePage::first();
        return view('admin.home-page.section5', compact('homepage'));
    }

    public function section_6(Request $request)
    {
        return view('admin.home-page.section6');
    }
    public function section_7(Request $request)
    {
        $homepage = HomePage::first();
        return view('admin.home-page.section7', compact('homepage'));
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $homepage = HomePage::where('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('mobile', 'LIKE', "%$keyword%")
                ->orWhere('facebook_link', 'LIKE', "%$keyword%")
                ->orWhere('youtube_link', 'LIKE', "%$keyword%")
                ->orWhere('year_log', 'LIKE', "%$keyword%")
                ->orWhere('location_icon', 'LIKE', "%$keyword%")
                ->orWhere('en_location', 'LIKE', "%$keyword%")
                ->orWhere('bn_location', 'LIKE', "%$keyword%")
                ->orWhere('main_logo', 'LIKE', "%$keyword%")
                ->orWhere('en_motto', 'LIKE', "%$keyword%")
                ->orWhere('bn_motto', 'LIKE', "%$keyword%")
                ->orWhere('en_hot_line', 'LIKE', "%$keyword%")
                ->orWhere('bn_hot_line', 'LIKE', "%$keyword%")
                ->orWhere('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_description', 'LIKE', "%$keyword%")
                ->orWhere('bn_description', 'LIKE', "%$keyword%")
                ->orWhere('slider1', 'LIKE', "%$keyword%")
                ->orWhere('slider2', 'LIKE', "%$keyword%")
                ->orWhere('slider3', 'LIKE', "%$keyword%")
                ->orWhere('en_online_calculator_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_online_calculator_title', 'LIKE', "%$keyword%")
                ->orWhere('en_online_calculator_description', 'LIKE', "%$keyword%")
                ->orWhere('bn_online_calculator_description', 'LIKE', "%$keyword%")
                ->orWhere('en_work_process_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_work_process_title', 'LIKE', "%$keyword%")
                ->orWhere('en_work_process_description', 'LIKE', "%$keyword%")
                ->orWhere('bn_work_process_description', 'LIKE', "%$keyword%")
                ->orWhere('en_work_process_list', 'LIKE', "%$keyword%")
                ->orWhere('bn_work_process_list', 'LIKE', "%$keyword%")
                ->orWhere('en_about_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_about_title', 'LIKE', "%$keyword%")
                ->orWhere('en_about_description', 'LIKE', "%$keyword%")
                ->orWhere('bn_about_description', 'LIKE', "%$keyword%")
                ->orWhere('en_about_text', 'LIKE', "%$keyword%")
                ->orWhere('bn_about_text', 'LIKE', "%$keyword%")
                ->orWhere('en_about_slider_list', 'LIKE', "%$keyword%")
                ->orWhere('bn_about_slider_list', 'LIKE', "%$keyword%")
                ->orWhere('en_view_all_notice', 'LIKE', "%$keyword%")
                ->orWhere('bn_view_all_notice', 'LIKE', "%$keyword%")
                ->orWhere('footer_logo', 'LIKE', "%$keyword%")
                ->orWhere('en_footer_logo_description', 'LIKE', "%$keyword%")
                ->orWhere('bn_footer_logo_description', 'LIKE', "%$keyword%")
                ->orWhere('play_store_icon', 'LIKE', "%$keyword%")
                ->orWhere('play_store_link', 'LIKE', "%$keyword%")
                ->orWhere('footer_pabx', 'LIKE', "%$keyword%")
                ->orWhere('footer_hotline', 'LIKE', "%$keyword%")
                ->orWhere('en_foot_product', 'LIKE', "%$keyword%")
                ->orWhere('bn_foot_product', 'LIKE', "%$keyword%")
                ->orWhere('en_foot_product_list', 'LIKE', "%$keyword%")
                ->orWhere('bn_foot_product_list', 'LIKE', "%$keyword%")
                ->orWhere('en_foot_about', 'LIKE', "%$keyword%")
                ->orWhere('bn_foot_about', 'LIKE', "%$keyword%")
                ->orWhere('en_foot_about_list', 'LIKE', "%$keyword%")
                ->orWhere('bn_foot_about_list', 'LIKE', "%$keyword%")
                ->orWhere('en_foot_legal', 'LIKE', "%$keyword%")
                ->orWhere('bn_foot_legal', 'LIKE', "%$keyword%")
                ->orWhere('en_foot_legal_list', 'LIKE', "%$keyword%")
                ->orWhere('bn_foot_legal_list', 'LIKE', "%$keyword%")
                ->orWhere('en_all_rights_reserved', 'LIKE', "%$keyword%")
                ->orWhere('bn_all_rights_reserved', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $homepage = HomePage::latest()->paginate($perPage);
        }

        return view('admin.home-page.index', compact('homepage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.home-page.create');
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
        if ($request->hasFile('year_log')) {
            $requestData['year_log'] = image_upload($request->year_log);
        }

        if ($request->hasFile('location_icon')) {
            $requestData['location_icon'] = image_upload($request->location_icon);
        }

        if ($request->hasFile('main_logo')) {
            $requestData['main_logo'] = image_upload($request->main_logo);
        }

        if ($request->hasFile('slider1')) {
            $requestData['slider1'] = image_upload($request->slider1);
        }

        if ($request->hasFile('slider2')) {
            $requestData['slider2'] = image_upload($request->slider2);
        }

        if ($request->hasFile('slider3')) {
            $requestData['slider3'] = image_upload($request->slider3);
        }

        if ($request->hasFile('play_store_icon')) {
            $requestData['play_store_icon'] = image_upload($request->play_store_icon);
        }
        if ($request->hasFile('footer_logo')) {
            $requestData['footer_logo'] = image_upload($request->footer_logo);
        }

        HomePage::create($requestData);

        return redirect('/admin/home-page')->with('flash_message', 'HomePage added!');
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
        $homepage = HomePage::findOrFail($id);

        return view('admin.home-page.show', compact('homepage'));
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
        $homepage = HomePage::findOrFail($id);

        return view('admin.home-page.edit', compact('homepage'));
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
        $requestData = $request->all();
        if ($request->hasFile('year_log')) {
            $requestData['year_log'] = image_upload($request->year_log);
        }

        if ($request->hasFile('location_icon')) {
            $requestData['location_icon'] = image_upload($request->location_icon);
        }

        if ($request->hasFile('main_logo')) {
            $requestData['main_logo'] = image_upload($request->main_logo);
        }

        if ($request->hasFile('slider1')) {
            $requestData['slider1'] = image_upload($request->slider1);
        }

        if ($request->hasFile('slider2')) {
            $requestData['slider2'] = image_upload($request->slider2);
        }

        if ($request->hasFile('slider3')) {
            $requestData['slider3'] = image_upload($request->slider3);
        }

        if ($request->hasFile('play_store_icon')) {
            $requestData['play_store_icon'] = image_upload($request->play_store_icon);
        }
        if ($request->hasFile('footer_logo')) {
            $requestData['footer_logo'] = image_upload($request->footer_logo);
        }

        $homepage = HomePage::findOrFail($id);
        $homepage->update($requestData);

        return redirect('/admin/home-page')->with('flash_message', 'HomePage updated!');
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

        $homepage = HomePage::where('id', $id)->first();
        if (isset($homepage)){
            delete_image($homepage->image);
            $homepage->delete();
        }
        return redirect('/admin/home-page')->with('flash_message', 'HomePage deleted!');
    }
}
