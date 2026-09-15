<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ComplainFeedback;
use Illuminate\Http\Request;

class ComplainFeedbackController extends Controller
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
            $complainfeedback = ComplainFeedback::where('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('message', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $complainfeedback = ComplainFeedback::latest()->paginate($perPage);
        }

        return view('admin.complain-feedback.index', compact('complainfeedback'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.complain-feedback.create');
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

        ComplainFeedback::create($requestData);

        return redirect('/admin/complain-feedback')->with('flash_message', 'ComplainFeedback added!');
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
        $complainfeedback = ComplainFeedback::findOrFail($id);

        return view('admin.complain-feedback.show', compact('complainfeedback'));
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
        $complainfeedback = ComplainFeedback::findOrFail($id);

        return view('admin.complain-feedback.edit', compact('complainfeedback'));
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

        $complainfeedback = ComplainFeedback::findOrFail($id);
        $complainfeedback->update($requestData);

        return redirect('/admin/complain-feedback')->with('flash_message', 'ComplainFeedback updated!');
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
        $complainfeedback = ComplainFeedback::where('id', $id)->first();
        $complainfeedback->delete();

        return redirect('/admin/complain-feedback')->with('flash_message', 'ComplainFeedback deleted!');
    }
}
