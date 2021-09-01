<?php
function connectDB()
{
        static $connection;
        if (!isset($connection)) {
                $connection = connect();
        }
        return $connection;
}

function connect()
{
        $host = getenv('DB_HOST', true) ?: "localhost";
        $port = getenv('DB_PORT', true) ?: 3306;
        $dbname = getenv('DB_NAME', true) ?: "TA2021001_DB"; // TA2021001_DB
        $user = getenv('DB_USERNAME', true) ?: "root"; // TA2021001_user
        $password = getenv('DB_PASSWORD', true) ?: ""; // TA2021001_user
        $connectionString = "mysql:host=$host;dbname=$dbname;charset=utf8";

        try {
                $pdo = new PDO($connectionString, $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
        } catch (PDOException $e) {
                echo "Virhe tietokantayhteydessä: " . $e->getMessage();
                die();
        }
}
