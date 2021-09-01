<?php

require_once "../../database/connection.php";
require_once "../../database/models/Laitteet.php";
require_once "../../helpers/helper.php";

$startDate = $_GET["start_date"];
$endDate = $_GET["end_date"];

if ($startDate == "-1" || $endDate == "-1") {
    $devices = getDevices();
} else {
    $devices = getDeviceNotBetweenDate($startDate, $endDate, "hostname,type,manufacturer,product");
}
$table = tableFromData($devices, ["hostname", "type", "manufacturer", "product"], ["Verkkonimi", "Tyyppi", "Valmistaja", "Malli"]);

// Return
print_r($table);
