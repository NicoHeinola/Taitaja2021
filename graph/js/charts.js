var batteryCapacities = null;
var deviceVersions = null;

function loadBatteryCapacities() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        batteryCapacities = JSON.parse(this.responseText);
    }
    xhttp.open("GET", "./js/ajax/getBatteryData.php", false);
    xhttp.send();
}

function loadDeviceVersions() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        deviceVersions = JSON.parse(this.responseText);
    }
    xhttp.open("GET", "./js/ajax/getDeviceVersionData.php", false);
    xhttp.send();
}

loadBatteryCapacities();
loadDeviceVersions();

var ctxBattery = document.getElementById('battery').getContext('2d');
var ctxVersion = document.getElementById('version').getContext('2d');

function createBatteryData(json_data) {
    let data = [{ x: "10%", count: 0 }, { x: "20%", count: 0 }, { x: "30%", count: 0 }, { x: "40%", count: 0 }, { x: "50%", count: 0 }, { x: "60%", count: 0 }, { x: "70%", count: 0 }, { x: "80%", count: 0 }, { x: "90%", count: 0 }, { x: "100%", count: 0 }]
    for (let i = 0; i < json_data.length; i++) {
        let percentage = json_data[i];
        let asNumber = parseInt(percentage.replace("%", ""));
        let rounded = Math.ceil(asNumber / 10) * 10;
        let index = rounded / 10 - 1;
        if (index == -1) {
            index = 0;
        }
        data[index]["count"] += 1;
    }
    return data;
}

const batteryData = createBatteryData(batteryCapacities);
const batteryConfig = {
    type: 'bar',
    data: {
        labels: ['10%', '20%', '30%', '40%', '50%', '60%', '70%', '80%', '90%', '100%'],
        datasets: [{
            label: "Akkujen määrä",
            data: batteryData,
            parsing: {
                yAxisKey: 'count'
            }
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Akut'
            }
        }
    },
};
var batteryChart = new Chart(ctxBattery, batteryConfig);



/* ------ VERSIONS ------ */

function createVersionData(json_data) {
    let versionLabels = [];
    let versionData = [];

    let indexes = {}; // dataname: index

    for (let i = 0; i < json_data.length; i++) {
        let version = json_data[i];
        // version = version.split(" ")[1];

        // Check if version doesn't already exist
        if (versionLabels.indexOf(version) == -1) {
            versionLabels.push(version);
            // let dataDict = { x: version, count: 0 };
            versionData.push(0);
            indexes[version] = versionData.length - 1;
        }
        versionData[indexes[version]] += 1;

        // versionDict = {};
        // versionData.push(versionDict);
    }

    let returnList = { versionData: versionData, versionLabels: versionLabels };
    return returnList;
}

var data = createVersionData(deviceVersions);
const versionData = data["versionData"];
const versionLabels = data["versionLabels"];
const versionConfig = {
    type: 'pie',
    data: {
        labels: versionLabels,
        datasets: [{
            label: "Laitteet",
            data: versionData,
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Versio'
            }
        }
    },
};
var versionChart = new Chart(ctxVersion, versionConfig);