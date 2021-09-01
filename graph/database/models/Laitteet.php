<?php

function getDevices()
{
    $pdo = connectDB();
    $sql = "SELECT * FROM laitteet WHERE `type`='laptop'";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getBatteryCapacities()
{
    $pdo = connectDB();
    $sql = "SELECT `battery.capacity` FROM laitteet";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getDeviceVersions()
{
    $pdo = connectDB();
    $sql = "SELECT `release` FROM laitteet";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getUnixTimestamps()
{
    $pdo = connectDB();
    $sql = "SELECT `Timestamp` FROM laitteet WHERE `type`='laptop'";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getDeviceBetweenDate($startDate, $endDate, $selectedData="*")
{
    $pdo = connectDB();
    $sql = "SELECT $selectedData FROM laitteet WHERE `type`=\"laptop\" AND FROM_UNIXTIME(Timestamp) BETWEEN ? AND ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$startDate,$endDate]);
    return $stmt->fetchAll();
}

function getDeviceNotBetweenDate($lowestDate, $highestDate, $selectedData="*")
{
    $pdo = connectDB();
    $sql = "SELECT $selectedData FROM laitteet WHERE `type`=\"laptop\" AND FROM_UNIXTIME(Timestamp) NOT BETWEEN ? AND ?"; // AND FROM_UNIXTIME(Timestamp) < ? OR FROM_UNIXTIME(Timestamp) > ?
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$lowestDate,$highestDate]);
    return $stmt->fetchAll();
}
