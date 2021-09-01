<?php

require_once "../../database/connection.php";
require_once "../../database/models/Laitteet.php";

$capacities = getBatteryCapacities();

$capacity_array = [];

// filter array so it doesn't contain null elements
foreach ($capacities as $capacity) {
    if ($capacity[0] != null) {
        // print_r($capacity[0]);
        array_push($capacity_array, $capacity[0]);
    }
}

// Convert to JSON so it can be read in js.
$JSON = json_encode($capacity_array);

// Return
print_r($JSON);
