<?php

function getDevice(){
    $pdo = connectDB();
    $sql = "SELECT * FROM device";
    $stmt = $pdo->query($sql);
    return $stmt->fetch();
}

function getLatestDevice(){
    $pdo = connectDB();
    $sql = "SELECT * FROM device ORDER BY deviceID DESC LIMIT 1";
    $stmt = $pdo->query($sql);
    return $stmt->fetch();
}

function addDevice($school, $hostname, $type, $timestamp, $image, $release_, $kernel_version, $kernel_args, $manufacturer, $product, $serial, $mainboard_serial, $bios_vendor, $bios_version, $bios_release_date, $cpu, $cpu_count, $memory_mib, $hdd_model, $hdd_size_bytes, $hdd_is_ssd, $wifi_adapter, $purchase_date, $purchase_location, $warranty_ends, $personally_administered, $xrandr_output, $automatic_shutdown)
{
    $pdo = connectDB();
    $data = [$school, $hostname, $type, $timestamp, $image, $release_, $kernel_version, $kernel_args, $manufacturer, $product, $serial, $mainboard_serial, $bios_vendor, $bios_version, $bios_release_date, $cpu, $cpu_count, $memory_mib, $hdd_model, $hdd_size_bytes, $hdd_is_ssd, $wifi_adapter, $purchase_date, $purchase_location, $warranty_ends, $personally_administered, $xrandr_output, $automatic_shutdown];
    $sql = "INSERT INTO device (school, hostname, `type`, `timestamp`, `image`, release_, kernel_version, kernel_args, manufacturer, product, `serial`, mainboard_serial, bios_vendor, bios_version, bios_release_date, cpu, cpu_count, memory_mib, hdd_model, hdd_size_bytes, hdd_is_ssd, wifi_adapter, purchase_date, purchase_location, warranty_ends, personally_administered, xrandr_output, automatic_shutdown) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}

function addBattery($deviceID, $data)
{
    $trueData = [$deviceID];
    foreach($data as $key){
        array_push($trueData, $key);
    }
    $pdo = connectDB();
    $sql = "INSERT INTO battery (deviceID, vendor, `model`, `serial`, `state`,`warning-level`,`energy`,`energy-empty`,`energy-full`,`energy-full-design`,`voltage`,`percentage`,capacity,technology) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stm = $pdo->prepare($sql);
    return $stm->execute($trueData);
}

function addXrandrCommands($deviceID, $data)
{
    $trueData = [$deviceID];
    foreach($data as $key){
        array_push($trueData, $key);
    }
    $pdo = connectDB();
    $sql = "INSERT INTO xrandr_command (deviceID, command) VALUES(?,?)";
    $stm = $pdo->prepare($sql);
    return $stm->execute($trueData);
}

function addLsusb($deviceID, $data)
{
    $trueData = [$deviceID];
    foreach($data as $key){
        array_push($trueData, $key);
    }
    $pdo = connectDB();
    $sql = "INSERT INTO lsusb (deviceID, `data`) VALUES(?,?)";
    $stm = $pdo->prepare($sql);
    return $stm->execute($trueData);
}

function addLspci($deviceID, $data)
{
    $trueData = [$deviceID];
    foreach($data as $key){
        array_push($trueData, $key);
    }
    $pdo = connectDB();
    $sql = "INSERT INTO lspci (deviceID, `data`) VALUES(?,?)";
    $stm = $pdo->prepare($sql);
    return $stm->execute($trueData);
}

function addMac($deviceID, $data)
{
    $trueData = [$deviceID];
    foreach($data as $key){
        array_push($trueData, $key);
    }
    $pdo = connectDB();
    $sql = "INSERT INTO mac (deviceID, `address`) VALUES(?,?)";
    $stm = $pdo->prepare($sql);
    return $stm->execute($trueData);
}

function addMemorySlot($deviceID, $data)
{
    $trueData = [$deviceID];
    foreach($data as $key){
        array_push($trueData, $key);
    }
    while(count($trueData) < 5){
        array_push($trueData, null);
    }
    $pdo = connectDB();
    $sql = "INSERT INTO memory_slot (deviceID, `size`,slot,vendor,product) VALUES(?,?,?,?,?)";
    $stm = $pdo->prepare($sql);
    return $stm->execute($trueData);
}