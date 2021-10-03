//Datepicker
$('#datepicker').datepicker({
    weekStart: 1,
    daysOfWeekHighlighted: "6,0",
    autoclose: true,
    todayHighlight: true,
});

$('#datepicker').datepicker("setDate", new Date());

//Change vaccine information when admin choose a different vaccine
function changeVaccine() {

    var selectedVac = document.getElementById("inputVacID");
    var vacInfo = document.getElementById("vacInfo");

    vacInfo.innerHTML = "";

    if (selectedVac.options[selectedVac.selectedIndex].value == 1) {
        vacInfo.innerHTML =
            "<small id='vacMaker' class='form-text text-muted'>Manufacturer: Pfizer-BioNTech</small> <small id='vacName' class='form-text text-muted'>Name: Comirnaty</small>";
    }
    else if (selectedVac.options[selectedVac.selectedIndex].value == 2) {
        vacInfo.innerHTML =
            "<small id='vacMaker' class='form-text text-muted'>Manufacturer: Oxford</small> <small id='vacName' class='form-text text-muted'>Name: AstraZeneca</small>";
    }
    else if (selectedVac.options[selectedVac.selectedIndex].value == 0) {
        vacInfo.innerHTML =
            "<small id='vacMaker' class='form-text text-muted'>Please select a vaccineID.</small>";
    }
    else {
        vacInfo.innerHTML =
            "<small id='vacMaker' class='form-text text-muted'>Manufacturer: Sinovac Biotech Ltd.</small> <small id='vacName' class='form-text text-muted'>Name: Sinovac</small>";
    }

}


