<?php

namespace App\Http\Controllers;

use App\Mail\ComplainMail;
use App\Mail\ContactMail;
use App\Models\Award;
use App\Models\CalculationPersonalInfoValidation;
use App\Models\CalculatorFeature;
use App\Models\Claim;
use App\Models\ClaimMoney;
use App\Models\ComplainFeedback;
use App\Models\ContactInfo;
use App\Models\ContactUS;
use App\Models\Footer;
use App\Models\HeaderContent;
use App\Models\HomeHeader;
use App\Models\HomeTestimonial;
use App\Models\HomeTestimonialInfo;
use App\Models\NewsEvent;
use App\Models\Notice;
use App\Models\Order;
use App\Models\Reinsurance;
use App\Models\ReinsuranceBroker;
use App\Models\ReinsuranceCoverage;
use App\Models\ReinsuranceType;
use App\Models\ServiceMenu;
use App\Models\Underwriting;
use App\Models\WorkProcess;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class BackendController extends Controller {
    public function index() {
        $data              = [];
        $data['checked']   = Order::where('mark_as', 1)->count();
        $data['unchecked'] = Order::where('mark_as', 0)->count();

        $data['todays_insurance'] = Order::whereDate('created_at', date("Y-m-d"))->count();
        $data['total_insurance']  = Order::count();

        $data['todays_amount'] = Order::whereDate('created_at', date("Y-m-d"))->sum('amount');
        $data['total_amount']  = Order::sum('amount');

        $data['motor']     = Order::where('calculator_id', 3)->count();
        $data['mediclaim'] = Order::where('calculator_id', 4)->count();
        $data['personal']  = Order::where('calculator_id', 5)->count();
        $data['people']    = Order::where('calculator_id', 6)->count();
        $data['bongo']     = Order::where('calculator_id', 7)->count();
        $data['flat']      = Order::where('calculator_id', 8)->count();

        return view('backend.index', $data);
    }

    public function homePage() {
        return view('backend.manage_pages.home_page', [
            'card_menus'        => ServiceMenu::all(),
            'testimonials'      => HomeTestimonial::all(),
            'testimonial_infos' => HomeTestimonialInfo::all(),
            'work_processes'    => WorkProcess::all(),
        ]);
    }

    public function saveHomeHeader(Request $request) {
        $hh_info                   = new HomeHeader();
        $hh_info->header_first_img = $this->saveImg($request, 'header_first_img');
        $hh_info->header_sec_img   = $this->saveImg($request, 'header_sec_img');
        $hh_info->header_third_img = $this->saveImg($request, 'header_third_img');
        $hh_info->save();

        return redirect(route('home_page_manage'))->with('message', 'Data Inserted Successfully');
    }

    private function saveImg($request, $imageField) {
        $image     = $request->file($imageField);
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $directory = 'backend/upload/images/';
        $imgUrl    = $directory . $imageName;
        $image->move($directory, $imageName);

        return $imgUrl;
    }

    public function manageHomeHeader() {
        return view('backend.manage_pages.home_page', [
            'hh_infos' => HomeHeader::all(),
        ]);
    }

    public function editHomeHeader($id) {
        $hh_info = HomeHeader::find($id);

        return view('backend.manage_pages.edit_home_header', [
            'hh_info' => $hh_info,
        ]);
    }

    public function updateHomeHeader(Request $request) {
        $hh_info = HomeHeader::find($request->hh_info_id);

        if ($request->file('header_first_img')) {

            if (isset($hh_info->header_first_img)) {
                unlink($hh_info->header_first_img);
            }

            $hh_info->header_first_img = $this->saveImg($request, 'header_first_img');
        }

        if ($request->file('header_sec_img')) {

            if (isset($hh_info->header_sec_img)) {
                unlink($hh_info->header_sec_img);
            }

            $hh_info->header_sec_img = $this->saveImg($request, 'header_sec_img');
        }

        if ($request->file('header_third_img')) {

            if (isset($hh_info->header_third_img)) {
                unlink($hh_info->header_third_img);
            }

            $hh_info->header_third_img = $this->saveImg($request, 'header_third_img');
        }

        $hh_info->save();

        return redirect(route('home_page_manage'))->with('message', 'Successfully Updated');
    }

    public function deleteHomeHeader(Request $request) {
        $hh_info = HomeHeader::find($request->hh_info_id);

        if ($hh_info->header_first_img) {
            unlink($hh_info->header_first_img);
        }

        if ($hh_info->header_sec_img) {
            unlink($hh_info->header_sec_img);
        }

        if ($hh_info->header_logo) {
            unlink($hh_info->header_logo);
        }

        if ($hh_info->header_third_img) {
            unlink($hh_info->header_third_img);
        }

        $hh_info->delete();

        return redirect(route('home_page_manage'))->with('message', 'Successfully Deleted');
    }

    public function saveCalculatorFeature(Request $request) {
        $calculator_feature              = new CalculatorFeature();
        $calculator_feature->en_pcf_menu = $request->en_pcf_menu;
        $calculator_feature->bn_pcf_menu = $request->bn_pcf_menu;
        $calculator_feature->pcf_icon    = $this->saveImg($request, 'pcf_icon');
        $calculator_feature->save();

        return redirect(route('home_page_manage'))->with('message', 'Data Inserted Successfully');
    }

    public function manageCalculatorFeature() {
        return view('backend.manage_pages.home_page', [
            'calculator_features' => CalculatorFeature::all(),
        ]);
    }

    public function editCalculatorFeature($id) {
        $calculator_feature = CalculatorFeature::find($id);

        return view('backend.manage_pages.edit_calculator_feature', [
            'calculator_feature' => $calculator_feature,
        ]);
    }

    public function updateCalculatorFeature(Request $request) {
        $calculator_feature              = CalculatorFeature::find($request->calculator_feature_id);
        $calculator_feature->en_pcf_menu = $request->en_pcf_menu;
        $calculator_feature->bn_pcf_menu = $request->bn_pcf_menu;

        if ($request->file('pcf_icon')) {

            if (isset($calculator_feature->pcf_icon)) {
                unlink($calculator_feature->pcf_icon);
            }

            $calculator_feature->pcf_icon = $this->saveImg($request, 'pcf_icon');
        }

        $calculator_feature->save();

        return redirect(route('home_page_manage'))->with('message', 'Successfully Updated');
    }

    public function deleteCalculatorFeature(Request $request) {
        $calculator_feature = CalculatorFeature::find($request->calculator_feature_id);

        if ($calculator_feature->pcf_icon) {
            unlink($calculator_feature->pcf_icon);
        }

        $calculator_feature->delete();

        return redirect(route('home_page_manage'))->with('message', 'Successfully Deleted');
    }

    public function saveCardMenu(Request $request) {
        $card_menu               = new ServiceMenu();
        $card_menu->en_hhcm_menu = $request->en_hhcm_menu;
        $card_menu->bn_hhcm_menu = $request->bn_hhcm_menu;
        $card_menu->hhcm_icon    = $this->saveImg($request, 'hhcm_icon');
        $card_menu->save();

        return redirect(route('home_page_manage'))->with('message', 'Data Inserted Successfully');
    }

    public function manageCardMenu() {
        return view('backend.manage_pages.home_page', [
            'card_menus' => ServiceMenu::all(),
        ]);
    }

    public function editCardMenu($id) {
        $card_menu = ServiceMenu::find($id);

        return view('backend.manage_pages.edit_card_menu', [
            'card_menu' => $card_menu,
        ]);
    }

    public function updateCardMenu(Request $request) {
        $card_menu               = ServiceMenu::find($request->card_menu_id);
        $card_menu->en_hhcm_menu = $request->en_hhcm_menu;
        $card_menu->bn_hhcm_menu = $request->bn_hhcm_menu;

        if ($request->file('hhcm_icon')) {

            if (isset($card_menu->hhcm_icon)) {
                unlink($card_menu->hhcm_icon);
            }

            $card_menu->hhcm_icon = $this->saveImg($request, 'hhcm_icon');
        }

        $card_menu->save();

        return redirect(route('home_page_manage'))->with('message', 'Successfully Updated');
    }

    public function deleteCardMenu(Request $request) {
        $card_menu = ServiceMenu::find($request->card_menu_id);

        if ($card_menu->hhcm_icon) {
            unlink($card_menu->hhcm_icon);
        }

        $card_menu->delete();

        return redirect(route('home_page_manage'))->with('message', 'Successfully Deleted');
    }

    public function savefooter(Request $request) {
        $footer                      = new Footer();
        $footer->en_footer_copyright = $request->en_footer_copyright;
        $footer->bn_footer_copyright = $request->bn_footer_copyright;
        $footer->en_newsletter       = $request->en_newsletter;
        $footer->bn_newsletter       = $request->bn_newsletter;
        $footer->en_newsletter_des   = $request->en_newsletter_des;
        $footer->bn_newsletter_des   = $request->bn_newsletter_des;
        $footer->save();

        return redirect(route('home_page_manage'))->with('message', 'Data Inserted Successfully');
    }

    public function manageFooter() {
        return view('backend.manage_pages.home_page', [
            'footers' => Footer::all(),
        ]);
    }

    public function editFooter($id) {
        $footer = Footer::find($id);

        return view('backend.manage_pages.edit_footer', [
            'footer' => $footer,
        ]);
    }

    public function updateFooter(Request $request) {
        $footer                      = Footer::find($request->footer_id);
        $footer->en_footer_copyright = $request->en_footer_copyright;
        $footer->bn_footer_copyright = $request->bn_footer_copyright;
        $footer->en_newsletter       = $request->en_newsletter;
        $footer->bn_newsletter       = $request->bn_newsletter;
        $footer->en_newsletter_des   = $request->en_newsletter_des;
        $footer->bn_newsletter_des   = $request->bn_newsletter_des;
        $footer->save();

        return redirect('/admin/home-page-manage')->with('message', 'Successfully Updated');
    }

    public function saveHeaderContent(Request $request) {
        $header_content                       = new HeaderContent();
        $header_content->en_header_title      = $request->en_header_title;
        $header_content->bn_header_title      = $request->bn_header_title;
        $header_content->en_short_description = $request->en_short_description;
        $header_content->bn_short_description = $request->bn_short_description;
        $header_content->header_img_one       = $this->saveImg($request, 'header_img_one');
        $header_content->header_img_two       = $this->saveImg($request, 'header_img_two');
        $header_content->header_img_three     = $this->saveImg($request, 'header_img_three');
        $header_content->save();

        return redirect(route('home_page_manage'))->with('message', 'Data Inserted Successfully');
    }

    public function manageHeaderContent() {
        return view('backend.manage_pages.home_page', [
            'header_contents' => HeaderContent::all(),
        ]);
    }

    public function editHeaderContent($id) {
        $header_content = HeaderContent::find($id);

        return view('backend.manage_pages.edit_header_content', [
            'header_content' => $header_content,
        ]);
    }

    public function updateHeaderContent(Request $request) {
        $header_content                       = HeaderContent::find($request->header_content_id);
        $header_content->en_header_title      = $request->en_header_title;
        $header_content->bn_header_title      = $request->bn_header_title;
        $header_content->en_short_description = $request->en_short_description;
        $header_content->bn_short_description = $request->bn_short_description;

        if ($request->file('header_img_one')) {

            if (isset($header_content->header_img_one)) {
                unlink($header_content->header_img_one);
            }

            $header_content->header_img_one = $this->saveImg($request, 'header_img_one');
        }

        if ($request->file('header_img_two')) {

            if (isset($header_content->header_img_two)) {
                unlink($header_content->header_img_two);
            }

            $header_content->header_img_two = $this->saveImg($request, 'header_img_two');
        }

        if ($request->file('header_img_three')) {

            if (isset($header_content->header_img_three)) {
                unlink($header_content->header_img_three);
            }

            $header_content->header_img_three = $this->saveImg($request, 'header_img_three');
        }

        $header_content->save();

        return redirect(route('home_page_manage'))->with('message', 'Successfully Updated');
    }

    public function saveTestimonial(Request $request) {
        $testimonial                        = new HomeTestimonial();
        $testimonial->en_client_name        = $request->en_client_name;
        $testimonial->bn_client_name        = $request->bn_client_name;
        $testimonial->en_client_designation = $request->en_client_designation;
        $testimonial->bn_client_designation = $request->bn_client_designation;
        $testimonial->en_client_feedback    = $request->en_client_feedback;
        $testimonial->bn_client_feedback    = $request->bn_client_feedback;
        $testimonial->save();

        return redirect()->route('home_page_section_6')->with('message', 'Data Inserted Successfully');
    }

    public function manageTestimonial() {
        return view('backend.manage_pages.home_page', [
            'testimonials' => HomeTestimonial::all(),
        ]);
    }

    public function editTestimonial($id) {
        $testimonial = HomeTestimonial::find($id);

        return view('backend.manage_pages.edit_testimonial', [
            'testimonial' => $testimonial,
        ]);
    }

    public function updateTestimonial(Request $request) {
        $testimonial                        = HomeTestimonial::find($request->testimonial_id);
        $testimonial->en_client_name        = $request->en_client_name;
        $testimonial->bn_client_name        = $request->bn_client_name;
        $testimonial->en_client_designation = $request->en_client_designation;
        $testimonial->bn_client_designation = $request->bn_client_designation;
        $testimonial->en_client_feedback    = $request->en_client_feedback;
        $testimonial->bn_client_feedback    = $request->bn_client_feedback;
        $testimonial->save();

        return redirect(url('/admin/home-page'))->with('message', 'Successfully Updated');
    }

    public function deleteTestimonial(Request $request) {
        $testimonial = HomeTestimonial::find($request->testimonial_id);
        $testimonial->delete();

        return redirect(url('/admin/home-page'))->with('message', 'Successfully Deleted');
    }

    public function saveTestimonialInfo(Request $request) {
        $testimonial_info                             = new HomeTestimonialInfo();
        $testimonial_info->en_testimonial_title       = $request->en_testimonial_title;
        $testimonial_info->bn_testimonial_title       = $request->bn_testimonial_title;
        $testimonial_info->en_testimonial_description = $request->en_testimonial_description;
        $testimonial_info->bn_testimonial_description = $request->bn_testimonial_description;
        $testimonial_info->save();

        return redirect(route('home_page_manage'))->with('message', 'Data Inserted Successfully');
    }

    public function manageTestimonialInfo() {
        return view('backend.manage_pages.home_page', [
            'testimonial_infos' => HomeTestimonialInfo::all(),
        ]);
    }

    public function editTestimonialInfo($id) {
        $testimonial_info = HomeTestimonialInfo::find($id);

        return view('backend.manage_pages.edit_testimonial_info', [
            'testimonial_info' => $testimonial_info,
        ]);
    }

    public function updateTestimonialInfo(Request $request) {
        $testimonial_info                             = HomeTestimonialInfo::find($request->testimonial_info_id);
        $testimonial_info->en_testimonial_title       = $request->en_testimonial_title;
        $testimonial_info->bn_testimonial_title       = $request->bn_testimonial_title;
        $testimonial_info->en_testimonial_description = $request->en_testimonial_description;
        $testimonial_info->bn_testimonial_description = $request->bn_testimonial_description;
        $testimonial_info->save();

        return redirect(route('home_page_manage'))->with('message', 'Successfully Updated');
    }

    public function saveWorkProcess(Request $request) {
        $work_process                          = new WorkProcess();
        $work_process->en_wp_first_title       = $request->en_wp_first_title;
        $work_process->bn_wp_first_title       = $request->bn_wp_first_title;
        $work_process->en_wp_first_description = $request->en_wp_first_description;
        $work_process->bn_wp_first_description = $request->bn_wp_first_description;
        $work_process->wp_first_icon           = $this->saveImg($request, 'wp_first_icon');
        $work_process->en_wp_sec_title         = $request->en_wp_sec_title;
        $work_process->bn_wp_sec_title         = $request->bn_wp_sec_title;
        $work_process->en_wp_sec_description   = $request->en_wp_sec_description;
        $work_process->bn_wp_sec_description   = $request->bn_wp_sec_description;
        $work_process->wp_sec_icon             = $this->saveImg($request, 'wp_sec_icon');
        $work_process->en_wp_third_title       = $request->en_wp_third_title;
        $work_process->bn_wp_third_title       = $request->bn_wp_third_title;
        $work_process->en_wp_third_description = $request->en_wp_third_description;
        $work_process->bn_wp_third_description = $request->bn_wp_third_description;
        $work_process->wp_third_icon           = $this->saveImg($request, 'wp_third_icon');
        $work_process->en_wp_forth_title       = $request->en_wp_forth_title;
        $work_process->bn_wp_forth_title       = $request->bn_wp_forth_title;
        $work_process->en_wp_forth_description = $request->en_wp_forth_description;
        $work_process->bn_wp_forth_description = $request->bn_wp_forth_description;
        $work_process->wp_forth_icon           = $this->saveImg($request, 'wp_forth_icon');
        $work_process->save();

        return redirect(route('home_page_manage'))->with('message', 'Data Inserted Successfully');
    }

    public function manageWorkProcess() {
        return view('backend.manage_pages.home_page', [
            'work_processes' => WorkProcess::all(),
        ]);
    }

    public function editWorkProcess($id) {
        $work_process = WorkProcess::find($id);

        return view('backend.manage_pages.edit_work_process', [
            'work_process' => $work_process,
        ]);
    }

    public function updateWorkProcess(Request $request) {
        $work_process                          = WorkProcess::find($request->work_process_id);
        $work_process->en_wp_first_title       = $request->en_wp_first_title;
        $work_process->bn_wp_first_title       = $request->bn_wp_first_title;
        $work_process->en_wp_first_description = $request->en_wp_first_description;
        $work_process->bn_wp_first_description = $request->bn_wp_first_description;
        $work_process->en_wp_sec_title         = $request->en_wp_sec_title;
        $work_process->bn_wp_sec_title         = $request->bn_wp_sec_title;
        $work_process->en_wp_sec_description   = $request->en_wp_sec_description;
        $work_process->bn_wp_sec_description   = $request->bn_wp_sec_description;
        $work_process->en_wp_third_title       = $request->en_wp_third_title;
        $work_process->bn_wp_third_title       = $request->bn_wp_third_title;
        $work_process->en_wp_third_description = $request->en_wp_third_description;
        $work_process->bn_wp_third_description = $request->bn_wp_third_description;
        $work_process->en_wp_forth_title       = $request->en_wp_forth_title;
        $work_process->bn_wp_forth_title       = $request->bn_wp_forth_title;
        $work_process->en_wp_forth_description = $request->en_wp_forth_description;
        $work_process->bn_wp_forth_description = $request->bn_wp_forth_description;

        if ($request->file('wp_first_icon')) {

            if (isset($work_process->wp_first_icon)) {
                unlink($work_process->wp_first_icon);
            }

            $work_process->wp_first_icon = $this->saveImg($request, 'wp_first_icon');
        }

        if ($request->file('wp_sec_icon')) {

            if (isset($work_process->wp_sec_icon)) {
                unlink($work_process->wp_sec_icon);
            }

            $work_process->wp_sec_icon = $this->saveImg($request, 'wp_sec_icon');
        }

        if ($request->file('wp_third_icon')) {

            if (isset($work_process->wp_third_icon)) {
                unlink($work_process->wp_third_icon);
            }

            $work_process->wp_third_icon = $this->saveImg($request, 'wp_third_icon');
        }

        if ($request->file('wp_forth_icon')) {

            if (isset($work_process->wp_forth_icon)) {
                unlink($work_process->wp_forth_icon);
            }

            $work_process->wp_forth_icon = $this->saveImg($request, 'wp_forth_icon');
        }

        $work_process->save();

        // return redirect(route('home_page_manage'))->with('message', 'Successfully Updated');

        return redirect(url('/admin/home-page'))->with('message', 'Successfully Updated');
        // return back()->with('message', 'Successfully Updated');
    }

    public function contactInfo() {
        return view('backend.manage_pages.add_contact_info');
    }

    public function saveContactInfo(Request $request) {
        $contact_info                  = new ContactInfo();
        $contact_info->en_company_name = $request->en_company_name;
        $contact_info->bn_company_name = $request->bn_company_name;
        $contact_info->email           = $request->email;
        $contact_info->en_about        = $request->en_about;
        $contact_info->bn_about        = $request->bn_about;
        $contact_info->en_address      = $request->en_address;
        $contact_info->bn_address      = $request->bn_address;
        $contact_info->en_phone_one    = $request->en_phone_one;
        $contact_info->bn_phone_one    = $request->bn_phone_one;
        $contact_info->en_phone_two    = $request->en_phone_two;
        $contact_info->bn_phone_two    = $request->bn_phone_two;
        $contact_info->en_hotline      = $request->en_hotline;
        $contact_info->bn_hotline      = $request->bn_hotline;
        $contact_info->play_link       = $request->play_link;
        $contact_info->i_link          = $request->i_link;
        $contact_info->facebook        = $request->facebook;
        $contact_info->twitter         = $request->twitter;
        $contact_info->linkedin        = $request->linkedin;
        $contact_info->youtube         = $request->youtube;
        $contact_info->instagram       = $request->instagram;
        $contact_info->pinterest       = $request->pinterest;
        $contact_info->logo            = $this->saveImg($request, 'logo');
        $contact_info->favicon         = $this->saveImg($request, 'favicon');
        $contact_info->play_small_icon = $this->saveImg($request, 'play_small_icon');
        $contact_info->i_small_icon    = $this->saveImg($request, 'i_small_icon');

        $contact_info->save();

        return redirect(route('contact_info'))->with('message', 'Data Inserted Successfully');
    }

    public function personalInfo() {
        $data = CalculationPersonalInfoValidation::find(1);

        return view('frontend.product-and-service.add_personal_info_validation', compact('data'));
    }

    public function savePersonalInfo(Request $request) {
        CalculationPersonalInfoValidation::updateOrCreate([
            'id' => 1,
        ], [
            'minimum' => $request->minimum,
            'maximum' => $request->maximum,
            'age'     => $request->age,
        ]);

        return back()->with('message', 'Data Inserted Successfully');
    }

    public function manageContactInfo() {
        return view('backend.manage_pages.contact_info', [
            'contact_infos' => ContactInfo::all(),
        ]);
    }

    public function editContactInfo($id) {
        $contact_info = ContactInfo::find($id);

        return view('backend.manage_pages.edit_contact_info', [
            'contact_info' => $contact_info,
        ]);
    }

    public function updateContactInfo(Request $request) {
        $contact_info                  = ContactInfo::find($request->contact_info_id);
        $contact_info->en_company_name = $request->en_company_name;
        $contact_info->bn_company_name = $request->bn_company_name;
        $contact_info->email           = $request->email;
        $contact_info->en_about        = $request->en_about;
        $contact_info->bn_about        = $request->bn_about;
        $contact_info->en_address      = $request->en_address;
        $contact_info->bn_address      = $request->bn_address;
        $contact_info->en_phone_one    = $request->en_phone_one;
        $contact_info->bn_phone_one    = $request->bn_phone_one;
        $contact_info->en_phone_two    = $request->en_phone_two;
        $contact_info->bn_phone_two    = $request->bn_phone_two;
        $contact_info->en_hotline      = $request->en_hotline;
        $contact_info->bn_hotline      = $request->bn_hotline;
        $contact_info->play_link       = $request->play_link;
        $contact_info->i_link          = $request->i_link;
        $contact_info->facebook        = $request->facebook;
        $contact_info->twitter         = $request->twitter;
        $contact_info->linkedin        = $request->linkedin;
        $contact_info->youtube         = $request->youtube;
        $contact_info->instagram       = $request->instagram;
        $contact_info->pinterest       = $request->pinterest;

        if ($request->file('logo')) {

            if (isset($contact_info->logo)) {
                unlink($contact_info->logo);
            }

            $contact_info->logo = $this->saveImg($request, 'logo');
        }

        if ($request->file('favicon')) {

            if (isset($contact_info->favicon)) {
                unlink($contact_info->favicon);
            }

            $contact_info->favicon = $this->saveImg($request, 'favicon');
        }

        if ($request->file('play_small_icon')) {

            if (isset($contact_info->play_small_icon)) {
                unlink($contact_info->play_small_icon);
            }

            $contact_info->play_small_icon = $this->saveImg($request, 'play_small_icon');
        }

        if ($request->file('i_small_icon')) {

            if (isset($contact_info->i_small_icon)) {
                unlink($contact_info->i_small_icon);
            }

            $contact_info->i_small_icon = $this->saveImg($request, 'i_small_icon');
        }

        $contact_info->save();

        return redirect('/manage-contact-info')->with('message', 'Successfully Updated');
    }

    public function claim() {
        return view('backend.manage_pages.add_claim');
    }

    public function saveclaim(Request $request) {
        $claim                       = new Claim();
        $claim->en_title             = $request->en_title;
        $claim->bn_title             = $request->bn_title;
        $claim->en_breadcrumb1       = $request->en_breadcrumb1;
        $claim->bn_breadcrumb1       = $request->bn_breadcrumb1;
        $claim->en_breadcrumb2       = $request->en_breadcrumb2;
        $claim->bn_breadcrumb2       = $request->bn_breadcrumb2;
        $claim->en_claim_heading     = $request->en_claim_heading;
        $claim->bn_claim_heading     = $request->bn_claim_heading;
        $claim->en_claim_description = $request->en_claim_description;
        $claim->bn_claim_description = $request->bn_claim_description;
        $claim->en_statement_head    = $request->en_statement_head;
        $claim->bn_statement_head    = $request->bn_statement_head;
        $claim->en_claim_state_des   = $request->en_claim_state_des;
        $claim->bn_claim_state_des   = $request->bn_claim_state_des;
        $claim->claim_img            = $this->saveImg($request, 'claim_img');
        $claim->save();

        return redirect(route('claim'))->with('message', 'Data Inserted Successfully');
    }

    public function manageclaim() {
        return view('backend.manage_pages.claim', [
            'claims' => Claim::all(),
        ]);
    }

    public function editclaim($id) {
        $claim = Claim::find($id);

        return view('backend.manage_pages.edit_claim', [
            'claim' => $claim,
        ]);
    }

    public function updateclaim(Request $request) {
        $claim                       = Claim::find($request->claim_id);
        $claim->en_title             = $request->en_title;
        $claim->bn_title             = $request->bn_title;
        $claim->en_breadcrumb1       = $request->en_breadcrumb1;
        $claim->bn_breadcrumb1       = $request->bn_breadcrumb1;
        $claim->en_breadcrumb2       = $request->en_breadcrumb2;
        $claim->bn_breadcrumb2       = $request->bn_breadcrumb2;
        $claim->en_claim_heading     = $request->en_claim_heading;
        $claim->bn_claim_heading     = $request->bn_claim_heading;
        $claim->en_claim_description = $request->en_claim_description;
        $claim->bn_claim_description = $request->bn_claim_description;
        $claim->en_statement_head    = $request->en_statement_head;
        $claim->bn_statement_head    = $request->bn_statement_head;
        $claim->en_claim_state_des   = $request->en_claim_state_des;
        $claim->bn_claim_state_des   = $request->bn_claim_state_des;

        if ($request->file('claim_img')) {

            if (isset($claim->claim_img)) {
                unlink($claim->claim_img);
            }

            $claim->claim_img = $this->saveImg($request, 'claim_img');
        }

        $claim->save();

        return redirect(route('manage_claim'))->with('message', 'Successfully Updated');
    }

    public function claimMoney() {
        return view('backend.manage_pages.add_claim_money');
    }

    public function saveclaimMoney(Request $request) {
        $claim_money                 = new ClaimMoney();
        $claim_money->en_claim_year  = $request->en_claim_year;
        $claim_money->bn_claim_year  = $request->bn_claim_year;
        $claim_money->en_claim_money = $request->en_claim_money;
        $claim_money->bn_claim_money = $request->bn_claim_money;
        $claim_money->save();

        return redirect(route('manage_claim_money'))->with('message', 'Data Inserted Successfully');
    }

    public function manageclaimMoney() {
        return view('backend.manage_pages.claim_money', [
            'claim_money' => ClaimMoney::all(),
        ]);
    }

    public function editclaimMoney($id) {
        $claim_money = ClaimMoney::find($id);

        return view('backend.manage_pages.edit_claim_money', [
            'claim_money' => $claim_money,
        ]);
    }

    public function updateclaimMoney(Request $request) {
        $claim_money                 = ClaimMoney::find($request->claim_money_id);
        $claim_money->en_claim_year  = $request->en_claim_year;
        $claim_money->bn_claim_year  = $request->bn_claim_year;
        $claim_money->en_claim_money = $request->en_claim_money;
        $claim_money->bn_claim_money = $request->bn_claim_money;
        $claim_money->save();

        return redirect(route('manage_claim_money'))->with('message', 'Successfully Updated');
    }

    public function deleteclaimMoney(Request $request) {
        $claim_money = ClaimMoney::find($request->claim_money_id);

        $claim_money->delete();

        return redirect(route('manage_claim_money'))->with('message', 'Successfully Deleted');
    }

    public function reinsurance() {
        return view('backend.manage_pages.add_reinsurance');
    }

    public function saveReinsurance(Request $request) {
        $reinsurance                                = new Reinsurance();
        $reinsurance->en_title                      = $request->en_title;
        $reinsurance->bn_title                      = $request->bn_title;
        $reinsurance->en_breadcrumb1                = $request->en_breadcrumb1;
        $reinsurance->bn_breadcrumb1                = $request->bn_breadcrumb1;
        $reinsurance->en_breadcrumb2                = $request->en_breadcrumb2;
        $reinsurance->bn_breadcrumb2                = $request->bn_breadcrumb2;
        $reinsurance->reinsurance_hero_img          = $this->saveImg($request, 'reinsurance_hero_img');
        $reinsurance->en_reinsurance_description    = $request->en_reinsurance_description;
        $reinsurance->bn_reinsurance_description    = $request->bn_reinsurance_description;
        $reinsurance->en_reinsurance_type_details   = $request->en_reinsurance_type_details;
        $reinsurance->bn_reinsurance_type_details   = $request->bn_reinsurance_type_details;
        $reinsurance->en_reinsurance_type_details2  = $request->en_reinsurance_type_details2;
        $reinsurance->bn_reinsurance_type_details2  = $request->bn_reinsurance_type_details2;
        $reinsurance->en_reinsurance_percentage     = $request->en_reinsurance_percentage;
        $reinsurance->bn_reinsurance_percentage     = $request->bn_reinsurance_percentage;
        $reinsurance->en_percentage_description     = $request->en_percentage_description;
        $reinsurance->bn_percentage_description     = $request->bn_percentage_description;
        $reinsurance->en_reinsurance_type_details3  = $request->en_reinsurance_type_details3;
        $reinsurance->bn_reinsurance_type_details3  = $request->bn_reinsurance_type_details3;
        $reinsurance->en_reinsurance_coverage_title = $request->en_reinsurance_coverage_title;
        $reinsurance->bn_reinsurance_coverage_title = $request->bn_reinsurance_coverage_title;
        $reinsurance->en_reinsurance_broker_title   = $request->en_reinsurance_broker_title;
        $reinsurance->bn_reinsurance_broker_title   = $request->bn_reinsurance_broker_title;

        if ($request->file('reinsurance_coverage_img')) {

            if (isset($reinsurance->reinsurance_coverage_img)) {
                unlink($reinsurance->reinsurance_coverage_img);
            }

            $reinsurance->reinsurance_coverage_img = $this->saveImg($request, 'reinsurance_coverage_img');
        }

        if ($request->file('reinsurance_broker_img')) {

            if (isset($reinsurance->reinsurance_broker_img)) {
                unlink($reinsurance->reinsurance_broker_img);
            }

            $reinsurance->reinsurance_broker_img = $this->saveImg($request, 'reinsurance_broker_img');
        }

        $reinsurance->save();

        return redirect(route('manage_reinsurance'))->with('message', 'Data updated Successfully');
    }

    public function editReinsurance($id) {
        $reinsurance = Reinsurance::find($id);

        return view('backend.manage_pages.edit_reinsurance', [
            'reinsurance' => $reinsurance,
        ]);
    }

    public function updateReinsurance(Request $request) {
        $reinsurance                                = Reinsurance::find($request->reinsurance_id);
        $reinsurance->en_title                      = $request->en_title;
        $reinsurance->bn_title                      = $request->bn_title;
        $reinsurance->en_breadcrumb1                = $request->en_breadcrumb1;
        $reinsurance->bn_breadcrumb1                = $request->bn_breadcrumb1;
        $reinsurance->en_breadcrumb2                = $request->en_breadcrumb2;
        $reinsurance->bn_breadcrumb2                = $request->bn_breadcrumb2;
        $reinsurance->en_reinsurance_description    = $request->en_reinsurance_description;
        $reinsurance->bn_reinsurance_description    = $request->bn_reinsurance_description;
        $reinsurance->en_reinsurance_type_details   = $request->en_reinsurance_type_details;
        $reinsurance->bn_reinsurance_type_details   = $request->bn_reinsurance_type_details;
        $reinsurance->en_reinsurance_type_details2  = $request->en_reinsurance_type_details2;
        $reinsurance->bn_reinsurance_type_details2  = $request->bn_reinsurance_type_details2;
        $reinsurance->en_reinsurance_percentage     = $request->en_reinsurance_percentage;
        $reinsurance->bn_reinsurance_percentage     = $request->bn_reinsurance_percentage;
        $reinsurance->en_percentage_description     = $request->en_percentage_description;
        $reinsurance->bn_percentage_description     = $request->bn_percentage_description;
        $reinsurance->en_reinsurance_type_details3  = $request->en_reinsurance_type_details3;
        $reinsurance->bn_reinsurance_type_details3  = $request->bn_reinsurance_type_details3;
        $reinsurance->en_reinsurance_coverage_title = $request->en_reinsurance_coverage_title;
        $reinsurance->bn_reinsurance_coverage_title = $request->bn_reinsurance_coverage_title;
        $reinsurance->en_reinsurance_broker_title   = $request->en_reinsurance_broker_title;
        $reinsurance->bn_reinsurance_broker_title   = $request->bn_reinsurance_broker_title;

        if ($request->file('reinsurance_hero_img')) {

            if (isset($reinsurance->reinsurance_hero_img)) {
                unlink($reinsurance->reinsurance_hero_img);
            }

            $reinsurance->reinsurance_hero_img = $this->saveImg($request, 'reinsurance_hero_img');
        }

        if ($request->file('reinsurance_coverage_img')) {

            if (isset($reinsurance->reinsurance_coverage_img)) {
                unlink($reinsurance->reinsurance_coverage_img);
            }

            $reinsurance->reinsurance_coverage_img = $this->saveImg($request, 'reinsurance_coverage_img');
        }

        if ($request->file('reinsurance_broker_img')) {

            if (isset($reinsurance->reinsurance_broker_img)) {
                unlink($reinsurance->reinsurance_broker_img);
            }

            $reinsurance->reinsurance_broker_img = $this->saveImg($request, 'reinsurance_broker_img');
        }

        $reinsurance->save();

        return redirect(route('manage_reinsurance'))->with('message', 'Successfully Updated');
    }

    public function manageReinsurance() {
        return view('backend.manage_pages.reinsurance', [
            'reinsurances' => Reinsurance::all(),
        ]);
    }

    public function reinsuranceType() {
        return view('backend.manage_pages.add_reinsurance_type');
    }

    public function saveReinsuranceType(Request $request) {
        $reinsurance_type                           = new ReinsuranceType();
        $reinsurance_type->en_reinsurance_type_name = $request->en_reinsurance_type_name;
        $reinsurance_type->bn_reinsurance_type_name = $request->bn_reinsurance_type_name;

        $reinsurance_type->save();

        return redirect(route('manage_reinsurance_type'))->with('message', 'Data Inserted Successfully');
    }

    public function manageReinsuranceType() {
        return view('backend.manage_pages.reinsurance_type', [
            'reinsurance_type' => ReinsuranceType::all(),
        ]);
    }

    public function editReinsuranceType($id) {
        $reinsurance_type = ReinsuranceType::find($id);

        return view('backend.manage_pages.edit_reinsurance_type', [
            'reinsurance_type' => $reinsurance_type,
        ]);
    }

    public function updateReinsuranceType(Request $request) {
        $reinsurance_type                           = ReinsuranceType::find($request->reinsurance_type_id);
        $reinsurance_type->en_reinsurance_type_name = $request->en_reinsurance_type_name;
        $reinsurance_type->bn_reinsurance_type_name = $request->bn_reinsurance_type_name;

        $reinsurance_type->save();

        return redirect(route('manage_reinsurance_type'))->with('message', 'Successfully Updated');
    }

    public function deleteReinsuranceType(Request $request) {
        $reinsurance_type = ReinsuranceType::find($request->reinsurance_type_id);

        $reinsurance_type->delete();

        return redirect(route('manage_reinsurance_type'))->with('message', 'Successfully Deleted');
    }

    public function reinsuranceCoverage() {
        return view('backend.manage_pages.add_reinsurance_coverage');
    }

    public function saveReinsuranceCoverage(Request $request) {
        $reinsurance_coverage                               = new ReinsuranceCoverage();
        $reinsurance_coverage->en_reinsurance_coverage_name = $request->en_reinsurance_coverage_name;
        $reinsurance_coverage->bn_reinsurance_coverage_name = $request->bn_reinsurance_coverage_name;

        $reinsurance_coverage->save();

        return redirect(route('manage_reinsurance_coverage'))->with('message', 'Data Inserted Successfully');
    }

    public function manageReinsuranceCoverage() {
        return view('backend.manage_pages.reinsurance_coverage', [
            'reinsurance_coverage' => ReinsuranceCoverage::all(),
        ]);
    }

    public function editReinsuranceCoverage($id) {
        $reinsurance_coverage = ReinsuranceCoverage::find($id);

        return view('backend.manage_pages.edit_reinsurance_coverage', [
            'reinsurance_coverage' => $reinsurance_coverage,
        ]);
    }

    public function updateReinsuranceCoverage(Request $request) {
        $reinsurance_coverage                               = ReinsuranceCoverage::find($request->reinsurance_coverage_id);
        $reinsurance_coverage->en_reinsurance_coverage_name = $request->en_reinsurance_coverage_name;
        $reinsurance_coverage->bn_reinsurance_coverage_name = $request->bn_reinsurance_coverage_name;

        $reinsurance_coverage->save();

        return redirect(route('manage_reinsurance_coverage'))->with('message', 'Successfully Updated');
    }

    public function deleteReinsuranceCoverage(Request $request) {
        $reinsurance_coverage = ReinsuranceCoverage::find($request->reinsurance_coverage_id);

        $reinsurance_coverage->delete();

        return redirect(route('manage_reinsurance_coverage'))->with('message', 'Successfully Deleted');
    }

    public function reinsuranceBroker() {
        return view('backend.manage_pages.add_reinsurance_broker');
    }

    public function saveReinsuranceBroker(Request $request) {
        $reinsurance_broker                             = new ReinsuranceBroker();
        $reinsurance_broker->en_reinsurance_broker_name = $request->en_reinsurance_broker_name;
        $reinsurance_broker->bn_reinsurance_broker_name = $request->bn_reinsurance_broker_name;

        $reinsurance_broker->save();

        return redirect(route('manage_reinsurance_broker'))->with('message', 'Data Inserted Successfully');
    }

    public function manageReinsuranceBroker() {
        return view('backend.manage_pages.reinsurance_broker', [
            'reinsurance_broker' => ReinsuranceBroker::all(),
        ]);
    }

    public function editReinsuranceBroker($id) {
        $reinsurance_broker = ReinsuranceBroker::find($id);

        return view('backend.manage_pages.edit_reinsurance_broker', [
            'reinsurance_broker' => $reinsurance_broker,
        ]);
    }

    public function updateReinsuranceBroker(Request $request) {
        $reinsurance_broker                             = ReinsuranceBroker::find($request->reinsurance_broker_id);
        $reinsurance_broker->en_reinsurance_broker_name = $request->en_reinsurance_broker_name;
        $reinsurance_broker->bn_reinsurance_broker_name = $request->bn_reinsurance_broker_name;

        $reinsurance_broker->save();

        return redirect(route('manage_reinsurance_broker'))->with('message', 'Successfully Updated');
    }

    public function deleteReinsuranceBroker(Request $request) {
        $reinsurance_broker = ReinsuranceBroker::find($request->reinsurance_broker_id);

        $reinsurance_broker->delete();

        return redirect(route('manage_reinsurance_broker'))->with('message', 'Successfully Deleted');
    }

    public function underwriting() {
        return view('backend.manage_pages.add_underwriting');
    }

    public function saveUnderwriting(Request $request) {
        $underwriting                    = new Underwriting();
        $underwriting->en_title          = $request->en_title;
        $underwriting->bn_title          = $request->bn_title;
        $underwriting->en_breadcrumb1    = $request->en_breadcrumb1;
        $underwriting->bn_breadcrumb1    = $request->bn_breadcrumb1;
        $underwriting->en_breadcrumb2    = $request->en_breadcrumb2;
        $underwriting->bn_breadcrumb2    = $request->bn_breadcrumb2;
        $underwriting->en_under_des      = $request->en_under_des;
        $underwriting->bn_under_des      = $request->bn_under_des;
        $underwriting->en_exp_num        = $request->en_exp_num;
        $underwriting->bn_exp_num        = $request->bn_exp_num;
        $underwriting->en_under_des_last = $request->en_under_des_last;
        $underwriting->bn_under_des_last = $request->bn_under_des_last;
        $underwriting->underwriting_img  = $this->saveImg($request, 'underwriting_img');
        $underwriting->save();

        return redirect(route('underwriting'))->with('message', 'Successfully Inserted');
    }

    public function manageUnderwriting() {
        return view('backend.manage_pages.underwriting', [
            'underwritings' => Underwriting::all(),
        ]);
    }

    public function editUnderwriting($id) {
        $underwriting = Underwriting::find($id);

        return view('backend.manage_pages.edit_underwriting', [
            'underwriting' => $underwriting,
        ]);
    }

    public function updateUnderwriting(Request $request) {
        $underwriting                    = Underwriting::find($request->underwriting_id);
        $underwriting->en_title          = $request->en_title;
        $underwriting->bn_title          = $request->bn_title;
        $underwriting->en_breadcrumb1    = $request->en_breadcrumb1;
        $underwriting->bn_breadcrumb1    = $request->bn_breadcrumb1;
        $underwriting->en_breadcrumb2    = $request->en_breadcrumb2;
        $underwriting->bn_breadcrumb2    = $request->bn_breadcrumb2;
        $underwriting->en_under_des      = $request->en_under_des;
        $underwriting->bn_under_des      = $request->bn_under_des;
        $underwriting->en_exp_num        = $request->en_exp_num;
        $underwriting->bn_exp_num        = $request->bn_exp_num;
        $underwriting->en_under_des_last = $request->en_under_des_last;
        $underwriting->bn_under_des_last = $request->bn_under_des_last;

        if ($request->file('underwriting_img')) {

            if (isset($underwriting->underwriting_img)) {
                unlink($underwriting->underwriting_img);
            }

            $underwriting->underwriting_img = $this->saveImg($request, 'underwriting_img');
        }

        $underwriting->save();

        return redirect(route('manage_underwriting'))->with('message', 'Successfully Updated');
    }

    public function award() {
        return view('backend.manage_pages.add_award');
    }

    public function saveAward(Request $request) {
        $award                = new Award();
        $award->en_award_name = $request->en_award_name;
        $award->bn_award_name = $request->bn_award_name;
        $award->award_icon    = $this->saveImg($request, 'award_icon');
        $award->award_img     = $this->saveImg($request, 'award_img');
        $award->save();

        return redirect(route('award'))->with('message', 'Successfully Inserted');
    }

    public function manageAward() {
        return view('backend.manage_pages.award', [
            'awards' => Award::all(),
        ]);
    }

    public function editAward($id) {
        $award = Award::find($id);

        return view('backend.manage_pages.edit_award', [
            'award' => $award,
        ]);
    }

    public function updateAward(Request $request) {
        $award                = Award::find($request->award_id);
        $award->en_award_name = $request->en_award_name;
        $award->bn_award_name = $request->bn_award_name;

        if ($request->file('award_icon')) {

            if (isset($award->award_icon)) {
                unlink($award->award_icon);
            }

            $award->award_icon = $this->saveImg($request, 'award_icon');
        }

        if ($request->file('award_img')) {

            if (isset($award->award_img)) {
                unlink($award->award_img);
            }

            $award->award_img = $this->saveImg($request, 'award_img');
        }

        $award->save();

        return redirect(route('award'))->with('message', 'Successfully Updated');
    }

    public function deleteAward(Request $request) {
        $award = Award::find($request->award_id);

        if ($award->award_icon) {
            unlink($award->award_icon);
        }

        if ($award->award_img) {
            unlink($award->award_img);
        }

        $award->delete();

        return redirect(route('award'))->with('message', 'Successfully Deleted');
    }

    public function getContactMessage(Request $request) {
        $request->validate([
            'contacter_name'  => 'required',
            'contacter_email' => 'required',
            'contacter_msg'   => 'required',
        ], [
            'contacter_name.required'  => 'Name is required',
            'contacter_email.required' => 'Email is required',
            'contacter_msg.required'   => 'Message is required',
        ]);

        $contact_us                  = new ContactUS();
        $contact_us->contacter_name  = $request->contacter_name;
        $contact_us->contacter_email = $request->contacter_email;
        $contact_us->contacter_msg   = $request->contacter_msg;
        $contact_us->save();

        $mailData = $contact_us;
        Mail::to('ahamedsohan592@gmail.com')->send(new ContactMail($mailData));

        Alert::success('Mail Sent Successfully', 'We will contact with you shortly');

        return redirect('/contact-us');
    }

    public function deleteContactMessage(Request $request) {
        $contact_us = ContactUS::find($request->contact_us_id);
        $contact_us->delete();

        return redirect(route('admin.cms.contact_messages'))->with('message', 'Successfully Deleted');
    }

    public function getComplainMessage(Request $request) {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required',
            'message' => 'required',
        ], [
            'name.required'    => 'Name is required',
            'email.required'   => 'Email is required',
            'message.required' => 'Message is required',
        ]);
        $complain          = new ComplainFeedback();
        $complain->name    = $request->name;
        $complain->email   = $request->email;
        $complain->message = $request->message;
        $complain->save();

        $mailData = $complain;
        Mail::to('ahamedsohan592@gmail.com')->send(new ComplainMail($mailData));

        Alert::success('Complain Submitted Successfully', 'We will contact with you shortly');

        return redirect('/report-complains');
    }

    public function notice() {
        return view('backend.manage_pages.add_notice');
    }

    public function saveNotice(Request $request) {
        $notice                  = new Notice();
        $notice->en_notice_title = $request->en_notice_title;
        $notice->bn_notice_title = $request->bn_notice_title;
        $notice->en_notice_des   = $request->en_notice_des;
        $notice->bn_notice_des   = $request->bn_notice_des;
        $notice->notice_status   = $request->notice_status;
        $notice->save();

        return redirect(route('notice'))->with('message', 'Successfully Inserted');
    }

    public function manageNotice() {
        return view('backend.manage_pages.notice', [
            'notices' => Notice::all(),
        ]);
    }

    public function editNotice($id) {
        $notice = Notice::find($id);

        return view('backend.manage_pages.edit_notice', [
            'notice' => $notice,
        ]);
    }

    public function updateNotice(Request $request) {
        $notice                  = Notice::find($request->notice_id);
        $notice->en_notice_title = $request->en_notice_title;
        $notice->bn_notice_title = $request->bn_notice_title;
        $notice->en_notice_des   = $request->en_notice_des;
        $notice->bn_notice_des   = $request->bn_notice_des;
        $notice->notice_status   = $request->notice_status;
        $notice->save();

        return redirect(route('notice'))->with('message', 'Successfully Updated');
    }

    public function deleteNotice(Request $request) {
        $notice = Notice::find($request->notice_id);
        $notice->delete();

        return redirect(route('notice'))->with('message', 'Successfully Deleted');
    }

    public function noticeStatus($id) {
        $notice = Notice::find($id);

        if ($notice->notice_status == 1) {
            $notice->notice_status = 0;
            $notice->save();

            return back();
        } else {
            $notice->notice_status = 0;
            $notice->save();

            return back();
        }

    }

    public function newsEvent() {
        return view('backend.manage_pages.add_news_event');
    }

    public function saveNewsEvent(Request $request) {
        $news_event                 = new NewsEvent();
        $news_event->en_news_title  = $request->en_news_title;
        $news_event->bn_news_title  = $request->bn_news_title;
        $news_event->news_event_img = $this->saveImg($request, 'news_event_img');
        $news_event->en_news_des    = $request->en_news_des;
        $news_event->bn_news_des    = $request->bn_news_des;
        $news_event->news_status    = $request->news_status;
        $news_event->save();

        return redirect(route('news_event'))->with('message', 'Successfully Inserted');
    }

    public function manageNewsEvent() {
        return view('backend.manage_pages.news_event', [
            'news_events' => NewsEvent::all(),
        ]);
    }

    public function editNewsEvent($id) {
        $news_event = NewsEvent::find($id);

        return view('backend.manage_pages.edit_news_event', [
            'news_event' => $news_event,
        ]);
    }

    public function updateNewsEvent(Request $request) {
        $news_event                = NewsEvent::find($request->news_event_id);
        $news_event->en_news_title = $request->en_news_title;
        $news_event->bn_news_title = $request->bn_news_title;
        $news_event->en_news_des   = $request->en_news_des;
        $news_event->bn_news_des   = $request->bn_news_des;
        $news_event->news_status   = $request->news_status;

        if ($request->file('news_event_img')) {

            if (isset($news_event->news_event_img)) {
                unlink($news_event->news_event_img);
            }

            $news_event->news_event_img = $this->saveImg($request, 'news_event_img');
        }

        $news_event->save();

        return redirect(route('news_event'))->with('message', 'Successfully Updated');
    }

    public function deleteNewsEvent(Request $request) {
        $news_event = NewsEvent::find($request->news_event_id);

        if ($news_event->news_event_img) {
            unlink($news_event->news_event_img);
        }

        $news_event->delete();

        return redirect(route('news_event'))->with('message', 'Successfully Deleted');
    }

    public function newsStatus($id) {
        $news_event = NewsEvent::find($id);

        if ($news_event->news_status == 1) {
            $news_event->news_status = 0;
            $news_event->save();

            return back();
        } else {
            $news_event->news_status = 0;
            $news_event->save();

            return back();
        }

    }

}
