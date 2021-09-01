<?php

require_once "../../database/connection.php";
require_once "../../database/models/Laitteet.php";

$versions = getDeviceVersions();
$version_array = [];

// Clean the array
foreach ($versions as $version) {
    //if ($version[0] != null) {
    array_push($version_array, $version[0]);
    //}
}

// Convert to JSON so it can be read in js.
$JSON = json_encode($version_array);

// Return
print_r($JSON);
