<?php

use Illuminate\Support\Facades\Route;
// vehicles.php

$vehicles = array(
    array("id" => 1, "make" => "Toyota", "model" => "Camry", "license_plate" => "ABC123", "axles" => 4)
);

// GET /vehicles
Route::get('/vehicles', function() {
    return view('vehicles');
});

// POST /vehicles
Route::post('/vehicles', function() {
    global $vehicles;
    $new_vehicle = array(
        "id" => count($vehicles) + 1,
        "make" => $_POST["make"],
        "model" => $_POST["model"],
        "license_plate" => $_POST["license_plate"],
        "axles" => $_POST["axles"]
    );
    $vehicles[] = $new_vehicle;
    return custom_json_encode($new_vehicle);
});

// DELETE /vehicles
Route::delete('/vehicles', function() {
    global $vehicles;
    // Assuming you have logic to delete a vehicle
    // This is just a placeholder
    return custom_json_encode(["message" => "Vehicle deleted"]);
});