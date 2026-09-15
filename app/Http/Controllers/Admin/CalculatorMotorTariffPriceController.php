<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalculatorMotorTariffPrice;
use Illuminate\Http\Request;

class CalculatorMotorTariffPriceController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $calculatormotortariffprice = CalculatorMotorTariffPrice::where('vehicle_category_id', 'LIKE', "%$keyword%")
                ->orWhere('vehicle_type_id', 'LIKE', "%$keyword%")
                ->orWhere('engine_capacity_id', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $calculatormotortariffprice = CalculatorMotorTariffPrice::latest()->paginate($perPage);
        }

        return view('admin.calculator-motor-tariff-price.index', compact('calculatormotortariffprice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('admin.calculator-motor-tariff-price.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {

        $requestData = $request->all();

        CalculatorMotorTariffPrice::create($requestData);

        return redirect('/admin/calculator-motor-tariff-price')->with('flash_message', 'CalculatorMotorTariffPrice added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $calculatormotortariffprice = CalculatorMotorTariffPrice::findOrFail($id);

        return view('admin.calculator-motor-tariff-price.show', compact('calculatormotortariffprice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $calculatormotortariffprice = CalculatorMotorTariffPrice::findOrFail($id);

        return view('admin.calculator-motor-tariff-price.edit', compact('calculatormotortariffprice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {

        $requestData                = $request->all();
        $calculatormotortariffprice = CalculatorMotorTariffPrice::findOrFail($id);
        $calculatormotortariffprice->update($requestData);

        return redirect('/admin/calculator-motor-tariff-price')->with('flash_message', 'CalculatorMotorTariffPrice updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        CalculatorMotorTariffPrice::destroy($id);

        return redirect('/admin/calculator-motor-tariff-price')->with('flash_message', 'CalculatorMotorTariffPrice deleted!');
    }

}
