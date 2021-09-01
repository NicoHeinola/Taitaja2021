function getFilter() {
    return document.getElementById("filter-select");
}

function getTableDiv(){
    return document.getElementById("table-div");
}

function getTable(){
    return getTableDiv().getElementsByTagName("table")[0];
}

function filterDevices() {

    let filter = getFilter();
    let option = filter.value;

    let startDate = "-1";
    let endDate = "-1";

    if (option == "3") {
        startDate = "2020-1-1";
        endDate = "2021-1-1";
    } else if (option == "2") {
        startDate = "2021-1-1";
        endDate = "2022-1-1";
    }

    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        getTableDiv().innerHTML = this.responseText;
        let count = getTable().getElementsByTagName("tr").length;
        document.getElementById("device-count").textContent = count;
    }
    xhttp.open("GET", "./js/ajax/filterDevices.php?start_date=" + startDate + "&end_date=" + endDate, true);
    xhttp.send();
}