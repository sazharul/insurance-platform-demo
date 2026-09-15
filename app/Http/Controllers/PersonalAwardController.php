<?php

namespace App\Http\Controllers;

use App\Helper\ImageUpload;
use App\Models\Employee;
use App\Models\PersonalAward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PersonalAwardController extends Controller
{
    public function create()
    {
        $data = [];
        $data['employees'] = Employee::all();
        return view('backend.personal-awards.create', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $awards = new PersonalAward();
        $awards->employee_id = $request->employee_id;
        $awards->en_name = $request->en_name;
        $awards->bn_name = $request->bn_name;
        $awards->en_year = $request->en_year;
        $awards->bn_year = $request->bn_year;
        $awards->en_recognition = $request->en_recognition;
        $awards->bn_recognition = $request->bn_recognition;
        $awards->image = ImageUpload::imageUpload($request->file('image'), 'backend/img/personal-awards/');
        $awards->save();
        return redirect(route('admin.awards.index'))->with('message', 'Awards Data Created Successfully');
    }


    public function index()
    {
        $data = [];
        $data['awards'] = PersonalAward::all();
        return view('backend.personal-awards.index', $data);
    }


    public function edit($id)
    {
        $data = [];
        $data['employees'] = Employee::all();
        $data['award'] = PersonalAward::find($id);
        return view('backend.personal-awards.edit', $data);
    }



    public function delete(Request $request, $id)
    {
        $awards = PersonalAward::where('id', $id)->first();
        $image = public_path($awards->image);
        if (File::exists($image))
        {
            File::delete($image);
        }
        $awards->delete();
        return redirect(route('admin.awards.index'))->with('message', 'Awards Data Deleted Successfully');
    }

    public function update(Request $request, $id)
    {
        $awards = PersonalAward::find($id);
        $awards->employee_id = $request->employee_id;
        $awards->en_name = $request->en_name;
        $awards->bn_name = $request->bn_name;
        $awards->en_year = $request->en_year;
        $awards->bn_year = $request->bn_year;
        $awards->en_recognition = $request->en_recognition;
        $awards->bn_recognition = $request->bn_recognition;
        $awards->image = ImageUpload::imageUpload($request->file('image'), 'backend/img/personal-awards/', isset($id) ? PersonalAward::find($id)->image : null);
        $awards->save();
        return redirect(route('admin.awards.index'))->with('message', 'Awards Data Updated Successfully');

    }
}
