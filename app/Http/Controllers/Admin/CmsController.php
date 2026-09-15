<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BranchList;
use App\Models\ContactUS;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function cms(){
        return view('admin.cms');
    }
    public function home(){
        return view('admin.cms.home');
    }
    public function popup(){
        return view('admin.cms.popup');
    }
    public function whoWeAre(){
        return view('admin.cms.who-we-are');
    }
    public function productServices(){
        return view('admin.cms.product-services');
    }
    public function financialIndicators(){
        return view('admin.cms.financial-indicators');
    }
    public function investorsRelation(){
        return view('admin.cms.investors-relation');
    }
    public function more(){
        return view('admin.cms.more');
    }
    public function Contact(){
        return view('admin.cms.contact');
    }
    public function contactMessages(){
        return view('admin.cms.contact_messages');
    }

    public function get_branch_list($id){

        $branch_list = BranchList::where(function($query) use($id) {
            if ($id != 'all'){
                $query->where('branch_location_id', $id);
            }
        })->where('status',1)->get();

        return view('frontend.more.branch_single', compact('branch_list'));
    }
}
