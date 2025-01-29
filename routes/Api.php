<?php

// API endpoints
$routes = array(
    "GET /vehicles" => function() use ($vehicles) {
        return custom_json_encode($vehicles);
    },
    "POST /vehicles" => function() use ($vehicles) {
        $new_vehicle = array(
            "id" => uniqid(),
            "make" => filter_input(INPUT_POST, "make"),
            "model" => filter_input(INPUT_POST, "model"),
            "license_plate" => filter_input(INPUT_POST, "license_plate"),
            "axles" => filter_input(INPUT_POST, "axles", FILTER_VALIDATE_INT)
        );
        $vehicles[] = $new_vehicle;
        return custom_json_encode($new_vehicle);
    },
    "GET /tolls" => function() use ($tolls) {
        return custom_json_encode($tolls);
    },
    "POST /tolls" => function() use ($tolls) {
        $new_toll = array(
            "id" => uniqid(),
            "name" => filter_input(INPUT_POST, "name"),
            "rate" => filter_input(INPUT_POST, "rate", FILTER_VALIDATE_FLOAT)
        );
        $tolls[] = $new_toll;
        return custom_json_encode($new_toll);
    },
    "GET /toll-payments" => function() use ($toll_payments) {
        return custom_json_encode($toll_payments);
    },
    "POST /toll-payments" => function() use ($toll_payments, &$vehicles, &$tolls) {
        $new_toll_payment = array(
            "id" => uniqid(),
            "toll_id" => filter_input(INPUT_POST, 'toll_id'),
            "vehicle_id" => filter_input(INPUT_POST, 'vehicle_id'),
            "payment_date" => filter_input(INPUT_POST, 'payment_date'),
            "amount" => function() use ($vehicles, $tolls) {
                $vehicle_id = filter_input(INPUT_POST, 'vehicle_id');
                $toll_id = filter_input(INPUT_POST, 'toll_id');
                $vehicle = array_filter($vehicles, function($v) use ($vehicle_id) {
                    return $v["id"] == $vehicle_id;
                });
                $toll = array_filter($tolls, function($t) use ($toll_id) {
                    return $t["id"] == $toll_id;
                });
                return reset($vehicle)["axles"] * reset($toll)["rate"];
         }
        );
        $toll_payments[] = $new_toll_payment;
                $toll_payments[] = $new_toll_payment;
                return custom_json_encode($new_toll_payment);
            }
        );
        
        try {
            if (isset($_GET["endpoint"])) {
                $endpoint = $_GET["endpoint"];
                if (isset($routes[$endpoint])) {
                    echo $routes[$endpoint]();
                } else {
                    echo "Invalid endpoint: " . htmlspecialchars($endpoint);
                }
            } else {
                echo custom_json_encode(array("error" => "Invalid request. Please specify a valid endpoint."));
            }
        } catch (Exception $e) {
            echo custom_json_encode(array("error" => $e->getMessage()));
        }

// API endpoint
if (isset($_GET["endpoint"])) {
    $endpoint = $_GET["endpoint"];
        echo "Invalid endpoint: " . htmlspecialchars($endpoint);
    if (isset($routes[$endpoint])) {
        echo $routes[$endpoint]();
    } else {
        echo "Invalid endpoint";
    }
} else {
    echo custom_json_encode(array("error" => "Invalid request. Please specify a valid endpoint."));
}