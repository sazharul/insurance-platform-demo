<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use function Ramsey\Uuid\Codec\encode;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function section_1(Request $request)
    {
        $companyprofile = CompanyProfile::first();

        return view('admin.company-profile.section_1', compact('companyprofile'));
    }

    public function section_2(Request $request)
    {
        $companyprofile = CompanyProfile::first();

        return view('admin.company-profile.section_2', compact('companyprofile'));
    }

    public function section_3(Request $request)
    {
        $companyprofile = CompanyProfile::first();

        return view('admin.company-profile.section_3', compact('companyprofile'));
    }

    public function section_4(Request $request)
    {
        $companyprofile = CompanyProfile::first();

        return view('admin.company-profile.section_4', compact('companyprofile'));
    }

    public function section_5(Request $request)
    {
        $companyprofile = CompanyProfile::first();

        return view('admin.company-profile.section_5', compact('companyprofile'));
    }

    public function section_6(Request $request)
    {
        $companyprofile = CompanyProfile::first();

        return view('admin.company-profile.section_6', compact('companyprofile'));
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $companyprofile = CompanyProfile::where('company_image', 'LIKE', "%$keyword%")
                ->orWhere('en_company_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_company_details', 'LIKE', "%$keyword%")
                ->orWhere('en_maintain_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_maintain_title', 'LIKE', "%$keyword%")
                ->orWhere('en_maintaining_list', 'LIKE', "%$keyword%")
                ->orWhere('bn_maintaining_list', 'LIKE', "%$keyword%")
                ->orWhere('building_img', 'LIKE', "%$keyword%")
                ->orWhere('en_register_name', 'LIKE', "%$keyword%")
                ->orWhere('bn_register_name', 'LIKE', "%$keyword%")
                ->orWhere('en_register_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_register_title', 'LIKE', "%$keyword%")
                ->orWhere('en_register_office', 'LIKE', "%$keyword%")
                ->orWhere('bn_register_office', 'LIKE', "%$keyword%")
                ->orWhere('en_register_address', 'LIKE', "%$keyword%")
                ->orWhere('bn_register_address', 'LIKE', "%$keyword%")
                ->orWhere('incorporation_icon', 'LIKE', "%$keyword%")
                ->orWhere('en_incorporation_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_incorporation_title', 'LIKE', "%$keyword%")
                ->orWhere('en_incorporation_date', 'LIKE', "%$keyword%")
                ->orWhere('bn_incorporation_date', 'LIKE', "%$keyword%")
                ->orWhere('en_commencement_of_business', 'LIKE', "%$keyword%")
                ->orWhere('bn_commencement_of_business', 'LIKE', "%$keyword%")
                ->orWhere('en_commencement_of_date', 'LIKE', "%$keyword%")
                ->orWhere('bn_commencement_of_date', 'LIKE', "%$keyword%")
                ->orWhere('en_listing_stock_dh', 'LIKE', "%$keyword%")
                ->orWhere('bn_listing_stock_dh', 'LIKE', "%$keyword%")
                ->orWhere('en_listing_stock_dh_date', 'LIKE', "%$keyword%")
                ->orWhere('bn_listing_stock_dh_date', 'LIKE', "%$keyword%")
                ->orWhere('en_listing_stock_ch_date', 'LIKE', "%$keyword%")
                ->orWhere('bn_listing_stock_ch_date', 'LIKE', "%$keyword%")
                ->orWhere('en_allotment_of_public', 'LIKE', "%$keyword%")
                ->orWhere('bn_allotment_of_public', 'LIKE', "%$keyword%")
                ->orWhere('en_allotment_of_public_date', 'LIKE', "%$keyword%")
                ->orWhere('bn_allotment_of_public_date', 'LIKE', "%$keyword%")
                ->orWhere('capital_icon', 'LIKE', "%$keyword%")
                ->orWhere('en_paid_capital_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_paid_capital_title', 'LIKE', "%$keyword%")
                ->orWhere('en_paid_capital_info', 'LIKE', "%$keyword%")
                ->orWhere('bn_paid_capital_info', 'LIKE', "%$keyword%")
                ->orWhere('en_authorized_capital_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_authorized_capital_title', 'LIKE', "%$keyword%")
                ->orWhere('en_authorized_capital_info', 'LIKE', "%$keyword%")
                ->orWhere('bn_authorized_capital_info', 'LIKE', "%$keyword%")
                ->orWhere('en_value_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_value_details', 'LIKE', "%$keyword%")
                ->orWhere('en_asset_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_asset_details', 'LIKE', "%$keyword%")
                ->orWhere('sponsor_image_thumbnail', 'LIKE', "%$keyword%")
                ->orWhere('sponsor_title', 'LIKE', "%$keyword%")
                ->orWhere('sponsor_details', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $companyprofile = CompanyProfile::latest()->paginate($perPage);
        }

        return view('admin.company-profile.index', compact('companyprofile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.company-profile.create');
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

        if ($request->hasFile('company_image')) {
            $requestData['company_image'] = image_upload($request->company_image);
        }

        if ($request->hasFile('building_img')) {
            $requestData['building_img'] = image_upload($request->building_img);
        }

        if ($request->hasFile('incorporation_icon')) {
            $requestData['incorporation_icon'] = image_upload($request->incorporation_icon);
        }

        if ($request->hasFile('capital_icon')) {
            $requestData['capital_icon'] = image_upload($request->capital_icon);
        }

        if ($request->hasFile('sponsor_image_thumbnail')) {
            $requestData['sponsor_image_thumbnail'] = image_upload($request->sponsor_image_thumbnail);
        }

        CompanyProfile::create($requestData);

        return redirect('/admin/company-profile')->with('flash_message', 'CompanyProfile added!');
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
        $companyprofile = CompanyProfile::findOrFail($id);

        return view('admin.company-profile.show', compact('companyprofile'));
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
        $companyprofile = CompanyProfile::findOrFail($id);

        return view('admin.company-profile.edit', compact('companyprofile'));
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
            'en_maintain_list',
            'bn_maintain_list',
            'en_value',
            'bn_value',
            'en_description',
            'bn_description',
            'icon',
            'en_asset',
            'bn_asset',
            'en_asset_text',
            'bn_asset_text',
            'sponsor_company_image',
            'en_company_title',
            'en_short_description',
            'bn_company_title',
            'bn_short_description',
        ]);

        $companyprofile = CompanyProfile::findOrFail($id);

        if (isset($request->en_maintain_list)) {
            $requestData['en_maintaining_list'] = json_encode($request->en_maintain_list);
        }

        if (isset($request->bn_maintain_list)) {
            $requestData['bn_maintaining_list'] = json_encode($request->bn_maintain_list);
        }


        //company profile value information
        if (isset($request->en_value)) {
            $en_value_details = [];
            $bn_value_details = [];

            for ($x = 0; $x <= 3; $x++) {
                $value = [
                    'en_value' => $request->en_value[$x],
                    'en_description' => $request->en_description[$x],
                ];
                array_push($en_value_details, $value);
            }

            for ($x = 0; $x <= 3; $x++) {
                $value = [
                    'bn_value' => $request->bn_value[$x],
                    'bn_description' => $request->bn_description[$x],
                ];

                array_push($bn_value_details, $value);
            }

            if (isset($request->en_value)) {
                $requestData['en_value_details'] = json_encode($en_value_details);
            }

            if (isset($request->bn_value)) {
                $requestData['bn_value_details'] = json_encode($bn_value_details);
            }
        }

        //company profile asset information

        if (isset($request->en_asset)) {
            $en_asset_details = [];
            $bn_asset_details = [];

            $icon_list_path = [];
            if($request->icon){
                foreach ($request->icon as $icon){
                    $icon_list = image_upload($icon);
                    array_push($icon_list_path, $icon_list);
                }
            }

            for ($x = 0; $x <= 2; $x++) {
                if (isset($icon_list_path[$x])){
                    $icon_path = $icon_list_path[$x];
                }else {
                    $icon_path = $companyprofile->en_asset_details[$x]->icon;
                }
                $asset = [
                    'icon' => $icon_path,
                    'asset' => $request->en_asset[$x],
                    'description' => $request->en_asset_text[$x],
                ];
                array_push($en_asset_details, $asset);
            }

            for ($x = 0; $x <= 2; $x++) {
                if (isset($icon_list_path[$x])){
                    $icon_path = $icon_list_path[$x];
                }else {
                    $icon_path = $companyprofile->bn_asset_details[$x]->icon;
                }

                $asset = [
                    'icon' => $icon_path,
                    'asset' => $request->en_asset[$x],
                    'description' => $request->bn_asset_text[$x],
                ];

                array_push($bn_asset_details, $asset);
            }

            if (isset($request->en_asset)) {
                $requestData['en_asset_details'] = json_encode($en_asset_details);
            }

            if (isset($request->bn_asset)) {
                $requestData['bn_asset_details'] = json_encode($bn_asset_details);
            }
        }




        //company profile Sponsor details
        if (isset($request->en_company_title)) {
            $en_sponsor_details = [];
            $bn_sponsor_details = [];


            $company_image = [];
            if($request->sponsor_company_image1){
                $com_image_path = image_upload($request->sponsor_company_image1);
                array_push($company_image, $com_image_path);
            }

            if($request->sponsor_company_image2){
                $com_image_path = image_upload($request->sponsor_company_image2);
                array_push($company_image, $com_image_path);
            }


            for ($x = 0; $x <= 1; $x++) {
                if (isset($company_image[$x])){
                    $company_img_path = $company_image[$x];
                }else {
                    $company_img_path = $companyprofile->bn_asset_details[$x]->icon;
                }
                $asset_com = [
                    'image' => $company_img_path,
                    'title' => $request->en_company_title[$x],
                    'description' => $request->en_short_description[$x],
                ];
                array_push($en_sponsor_details, $asset_com);
            }

            for ($x = 0; $x <= 1; $x++) {
                if (isset($company_image[$x])){
                    $company_img_path = $company_image[$x];
                }else {
                    $company_img_path = null;
                }
                $asset = [
                    'image' => $company_img_path,
                    'title' => $request->bn_company_title[$x],
                    'description' => $request->bn_short_description[$x],
                ];
                array_push($bn_sponsor_details, $asset);
            }
            if (isset($request->en_company_title)) {
                $requestData['en_sponsor_details'] = json_encode($en_sponsor_details);
            }

            if (isset($request->bn_company_title)) {
                $requestData['bn_sponsor_details'] = json_encode($bn_sponsor_details);
            }
        }


        if ($request->hasFile('company_image')) {
            $requestData['company_image'] = image_upload($request->company_image);
        }

        if ($request->hasFile('building_img')) {
            $requestData['building_img'] = image_upload($request->building_img);
        }

        if ($request->hasFile('incorporation_icon')) {
            $requestData['incorporation_icon'] = image_upload($request->incorporation_icon);
        }

        if ($request->hasFile('capital_icon')) {
            $requestData['capital_icon'] = image_upload($request->capital_icon);
        }

        if ($request->hasFile('sponsor_image_thumbnail')) {
            $requestData['sponsor_image_thumbnail'] = image_upload($request->sponsor_image_thumbnail);
        }



        $companyprofile->update($requestData);

        return redirect('/admin/company-profile')->with('flash_message', 'CompanyProfile updated!');
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
        CompanyProfile::destroy($id);

        return redirect('/admin/company-profile')->with('flash_message', 'CompanyProfile deleted!');
    }
}
