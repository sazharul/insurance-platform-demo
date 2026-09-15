<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MujibCorner;
use App\Models\MujibGallery;
use App\Models\BranchList;
use App\Models\MujibVideoList;

class BranchController extends Controller
{
    public function Branch()
    {
        $data['branch_list'] = BranchList::where('status',1)->get();
        return view('frontend.more.branch' ,$data);
    }


    public function mujibCorner ()
    {
        $data['mujib_corner'] = MujibCorner::first();
        $data['mujib_gallery'] = MujibGallery::where('status',1)->get();
        $data['mujib_video_list'] = MujibVideoList::where('status',1)->orderBy('id','desc')->get();
        return view('frontend.more.mujib-corner', $data);
    }
}
