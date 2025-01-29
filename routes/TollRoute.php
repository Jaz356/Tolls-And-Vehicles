<?php

use Illuminate\Support\Facades\Route;

$tolls = array(
    array("id" => 1, "name" => "Golden Gate Bridge", "rate" => 50)
);

// GET /tolls
Route::get('/tolls', function() {
    global $tolls;
    return custom_json_encode($tolls);
});

// POST /tolls
Route::post('/tolls', function() {
    global $tolls;
    $new_toll = array(
        "id" => count($tolls) + 1,
        "name" => $_POST["name"],
        "rate" => $_POST["rate"]
    );
    $tolls[] = $new_toll;
    return custom_json_encode($new_toll);
});