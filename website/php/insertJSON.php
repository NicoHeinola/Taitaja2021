<?php

require_once "./connection.php";
require_once "./Device.php";


$pdo = connectDB();

$JSON_PATH = "../testilaitteet_pieni.json";

function JSONIntoDB($path)
{
    $string = file_get_contents($path);
    if ($string !== false) {

        $json_a = json_decode($string, true);
        if ($json_a !== null) {


            foreach ($json_a as $data) {
                $school = $data["school"];
                $hostname = $data["hostname"];
                $type = $data["type"];
                $timestamp = $data["timestamp"];
                $image = $data["image"];
                $release_ = $data["release"];
                $kernel_version = $data["kernel_version"];
                $kernel_args = $data["kernel_args"];
                $manufacturer = $data["manufacturer"];
                $product = $data["product"];
                $serial = $data["serial"];
                $mainboard_serial = $data["mainboard_serial"];
                $bios_vendor = $data["bios_vendor"];
                $bios_version = $data["bios_version"];
                $bios_release_date = $data["bios_release_date"];
                $cpu = $data["cpu"];
                $cpu_count = $data["cpu_count"];
                $memory_mib = $data["memory_mib"];
                $hdd_model = $data["hdd_model"];
                $hdd_size_bytes = $data["hdd_size_bytes"];
                $hdd_is_ssd = $data["hdd_is_ssd"];
                $wifi_adapter = $data["wifi_adapter"];
                $purchase_date = $data["purchase_date"];
                $purchase_location = $data["purchase_location"];
                $warranty_ends = $data["warranty_ends"];
                $personally_administered = $data["personally_administered"];
                $xrandr_output = $data["xrandr_output"];
                $automatic_shutdown = $data["automatic_shutdown"];

                addDevice($school, $hostname, $type, $timestamp, $image, $release_, $kernel_version, $kernel_args, $manufacturer, $product, $serial, $mainboard_serial, $bios_vendor, $bios_version, $bios_release_date, $cpu, $cpu_count, $memory_mib, $hdd_model, $hdd_size_bytes, $hdd_is_ssd, $wifi_adapter, $purchase_date, $purchase_location, $warranty_ends, $personally_administered, $xrandr_output, $automatic_shutdown);

                $latestDeviceID = getLatestDevice()["deviceID"];

                // Array
                $mac = $data["mac"];
                foreach($mac as $command){
                    addMac($latestDeviceID, [$command]);
                }
                $lspci = $data["lspci"];
                foreach($lspci as $command){
                    addLspci($latestDeviceID, [$command]);
                }
                $lsusb = $data["lsusb"];
                foreach($lsusb as $command){
                    addLsusb($latestDeviceID, [$command]);
                }
                $xrandr_commands = $data["xrandr_commands"];
                foreach($xrandr_commands as $command){
                    addXrandrCommands($latestDeviceID, $command);
                }
                $battery = $data["battery"];
                if ($battery != null) {
                    addBattery($latestDeviceID, $battery);
                }
                $memory_slots = $data["memory_slots"];
                foreach($memory_slots as $command){
                    addMemorySlot($latestDeviceID, $command);
                }
            }
        }
    }
}

JSONIntoDB($JSON_PATH);
