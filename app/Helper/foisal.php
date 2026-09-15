<?php

use App\Models\Calculator;
use App\Models\Order;

function GET_VAT_AMOUNT($total, $vat) {
    return ($vat * $total) / 100;
}

function GET_DOB($dob) {
    $dob  = new DateTime($dob);
    $now  = new DateTime();
    $diff = $now->diff($dob);

    return $diff->y;
}

function GET_PERCENTAGE($total, $percentage) {
    return ($percentage * $total) / 100;
}

function calculator_details($id) {
    return Calculator::find($id);
}

function total_insurance_by_cal($id) {
    return Order::where('calculator_id', $id)->count();
}

function total_amount_by_cal($id) {
    return Order::where('calculator_id', $id)->sum('amount');
}

function todays_insurance_by_cal($id) {
    return Order::where('calculator_id', $id)->whereDate('created_at', date("Y-m-d"))->count();
}

function uncheck_insurance_by_cal($id) {
    return Order::where('calculator_id', $id)->where('mark_as', 0)->count();
}
