<?php

// TollPayment.php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$toll_payments = array(
    array("id" => 1, "toll_id" => 1, "vehicle_id" => 1, "payment_date" => "2022-01-01", "amount" => 200)
);

// GET /toll-payments
Route::get('/toll-payments', function() use (&$toll_payments) {
    return response()->json($toll_payments);
});

// POST /toll-payments
Route::post('/toll-payments', function(Request $request) use (&$toll_payments) {
    $new_toll_payment = array(
        "id" => count($toll_payments) + 1,
        "toll_id" => $request->input('toll_id'),
        "vehicle_id" => $request->input('vehicle_id'),
        "payment_date" => $request->input('payment_date'),
        "amount" => $request->input('vehicle_id')['axles'] * $request->input('toll_id')['rate']
    );
    $toll_payments[] = $new_toll_payment;
    return response()->json($new_toll_payment);
});