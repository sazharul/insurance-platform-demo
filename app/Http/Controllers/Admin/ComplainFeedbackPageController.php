<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ComplainFeedbackPage;
use Illuminate\Http\Request;

class ComplainFeedbackPageController extends Controller
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
            $complainfeedbackpage = ComplainFeedbackPage::where('en_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_title', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_1', 'LIKE', "%$keyword%")
                ->orWhere('en_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('bn_breadcrumb_2', 'LIKE', "%$keyword%")
                ->orWhere('en_heading', 'LIKE', "%$keyword%")
                ->orWhere('bn_heading', 'LIKE', "%$keyword%")
                ->orWhere('en_details', 'LIKE', "%$keyword%")
                ->orWhere('bn_details', 'LIKE', "%$keyword%")
                ->orWhere('en_form_title', 'LIKE', "%$keyword%")
                ->orWhere('bn_form_title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $complainfeedbackpage = ComplainFeedbackPage::latest()->paginate($perPage);
        }

        return view('admin.complain-feedback-page.index', compact('complainfeedbackpage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.complain-feedback-page.create');
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
        
        ComplainFeedbackPage::create($requestData);

        return redirect('/admin/complain-feedback-page')->with('flash_message', 'ComplainFeedbackPage added!');
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
        $complainfeedbackpage = ComplainFeedbackPage::findOrFail($id);

        return view('admin.complain-feedback-page.show', compact('complainfeedbackpage'));
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
        $complainfeedbackpage = ComplainFeedbackPage::findOrFail($id);

        return view('admin.complain-feedback-page.edit', compact('complainfeedbackpage'));
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
        
        $complainfeedbackpage = ComplainFeedbackPage::findOrFail($id);
        $complainfeedbackpage->update($requestData);

        return redirect('/admin/complain-feedback-page')->with('flash_message', 'ComplainFeedbackPage updated!');
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
        ComplainFeedbackPage::destroy($id);

        return redirect('/admin/complain-feedback-page')->with('flash_message', 'ComplainFeedbackPage deleted!');
    }
}
