<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PassengerPrice;
use Illuminate\Http\Request;

class PassengerPriceController extends Controller
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
            $passengerprice = PassengerPrice::where('passenger_price', 'LIKE', "%$keyword%")
                ->orWhere('driver_price', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $passengerprice = PassengerPrice::latest()->paginate($perPage);
        }

        return view('admin.passenger-price.index', compact('passengerprice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.passenger-price.create');
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
        
        PassengerPrice::create($requestData);

        return redirect('/admin/passenger-price')->with('flash_message', 'PassengerPrice added!');
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
        $passengerprice = PassengerPrice::findOrFail($id);

        return view('admin.passenger-price.show', compact('passengerprice'));
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
        $passengerprice = PassengerPrice::findOrFail($id);

        return view('admin.passenger-price.edit', compact('passengerprice'));
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
        
        $passengerprice = PassengerPrice::findOrFail($id);
        $passengerprice->update($requestData);

        return redirect('/admin/passenger-price')->with('flash_message', 'PassengerPrice updated!');
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
        PassengerPrice::destroy($id);

        return redirect('/admin/passenger-price')->with('flash_message', 'PassengerPrice deleted!');
    }
}
