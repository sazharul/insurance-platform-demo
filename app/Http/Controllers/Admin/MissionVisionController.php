<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\MissionVision;
use Illuminate\Http\Request;

class MissionVisionController extends Controller
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
            $missionvision = MissionVision::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('main_image', 'LIKE', "%$keyword%")
                ->orWhere('en_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_details', 'LIKE', "%$keyword%")
                ->orWhere('mission_image', 'LIKE', "%$keyword%")
                ->orWhere('en_mission_info_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_mission_info_1', 'LIKE', "%$keyword%")
                ->orWhere('en_mission_info_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_mission_info_2', 'LIKE', "%$keyword%")
                ->orWhere('vision_image', 'LIKE', "%$keyword%")
                ->orWhere('en_vision_info_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_vision_info_1', 'LIKE', "%$keyword%")
                ->orWhere('en_vision_info_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_vision_info_2', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $missionvision = MissionVision::latest()->paginate($perPage);
        }

        return view('admin.mission-vision.index', compact('missionvision'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.mission-vision.create');
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
        if ($request->hasFile('main_image')) {
            $requestData['main_image'] = image_upload($request->main_image);
        }

        if ($request->hasFile('mission_image')) {
            $requestData['mission_image'] = image_upload($request->mission_image);
        }
        if ($request->hasFile('vision_image')) {
            $requestData['vision_image'] = image_upload($request->vision_image);
        }

        MissionVision::create($requestData);

        return redirect('/admin/mission-vision')->with('flash_message', 'MissionVision added!');
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
        $missionvision = MissionVision::findOrFail($id);

        return view('admin.mission-vision.show', compact('missionvision'));
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
        $missionvision = MissionVision::findOrFail($id);

        return view('admin.mission-vision.edit', compact('missionvision'));
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
        if ($request->hasFile('main_image')) {
            $requestData['main_image'] = image_upload($request->main_image);
        }
        if ($request->hasFile('mission_image')) {
            $requestData['mission_image'] = image_upload($request->mission_image);
        }
        if ($request->hasFile('vision_image')) {
            $requestData['vision_image'] = image_upload($request->vision_image);
        }

        $missionvision = MissionVision::findOrFail($id);
        $missionvision->update($requestData);

        return redirect('/admin/mission-vision')->with('flash_message', 'MissionVision updated!');
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

        $missionvision = MissionVision::where('id', $id)->first();
        if (isset($missionvision)){
            delete_image($missionvision->main_image);
            $missionvision->delete();
        }
        if (isset($missionvision)){
            delete_image($missionvision->mission_image);
            $missionvision->delete();
        }
        if (isset($missionvision)){
            delete_image($missionvision->vision_image);
            $missionvision->delete();
        }

        return redirect('/admin/mission-vision')->with('flash_message', 'MissionVision deleted!');
    }
}
