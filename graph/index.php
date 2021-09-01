<!DOCTYPE html>
<html>

<head>
    <title>Graphs</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/style.css" rel="stylesheet">
    <script src="./js/node_modules/chart.js/dist/chart.js"></script>
</head>

<body>
    <h1 style="margin: auto;">Graphs</h1>
    <div class="canvas-div" style="width: 40%;">
        <canvas id="battery" width="400" height="400"></canvas>
    </div>
    <div class="canvas-div" style="width: 50%;">
        <canvas id="version" width="400" height="400"></canvas>
    </div>
    <script src="./js/charts.js"></script>
    <h1>Laitelista</h1>
    <select id="filter-select" onchange="filterDevices()" class="filter">
        <option selected value="1">Kaikki koneet</option>
        <option value="2">Koneet, joita ei ole käynnistetty vuoden 2021 aikana</option>
        <option value="3">Koneet, joita ei ole käynnistetty vuoden 2020 aikana</option>
    </select>
        <?php
        require_once "./database/connection.php";
        require_once "./database/models/Laitteet.php";
        require_once "./helpers/helper.php";

        // $devices = getDeviceBetweenDate("2021/1/1", "2022/1/1", "hostname,type,manufacturer,product");
        $devices = getDevices();
        $table = tableFromData($devices, ["hostname", "type", "manufacturer", "product"], ["Verkkonimi", "Tyyppi", "Valmistaja", "Malli"]);
        
        echo "<h2>Laitteet ja niistä tietoa:</h2>";
        echo '<p>Lukumäärä: <span id="device-count">' . count($devices) . '</span> </p>';
        echo '<div class="table-div" id="table-div">';
        echo $table;
        echo '</div>';
        ?>
    <script src="./js/deviceFilter.js"></script>
</body>

</html>