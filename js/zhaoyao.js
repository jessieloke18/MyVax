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

//Change batch information when admin choose a different batch
function changeBatch() {
    
    var selectedBatch = document.getElementById("selectedBatch");
    var batchExDate = document.getElementById("batchExDate");
    var pending = document.getElementById("pending");
    var administered = document.getElementById("administered");
    var available = document.getElementById("available");

    if (selectedBatch.options[selectedBatch.selectedIndex].value == 1) {
        batchExDate.innerHTML = "15/12/2021";
        pending.innerHTML = "48";
        administered.innerHTML = "66";
        available.innerHTML = "70";
    }
    else if (selectedBatch.options[selectedBatch.selectedIndex].value == 2){
        batchExDate.innerHTML = "29/05/2022";
        pending.innerHTML = "50";
        administered.innerHTML = "31";
        available.innerHTML = "62";
    }
    else if (selectedBatch.options[selectedBatch.selectedIndex].value == 3){
        batchExDate.innerHTML = "08/01/2022";
        pending.innerHTML = "39";
        administered.innerHTML = "14";
        available.innerHTML = "100";
    }
    else if (selectedBatch.options[selectedBatch.selectedIndex].value == 4){
        batchExDate.innerHTML = "05/11/2021";
        pending.innerHTML = "39";
        administered.innerHTML = "56";
        available.innerHTML = "29";
    }
    else {
        batchExDate.innerHTML = "";
        pending.innerHTML = "";
        administered.innerHTML = "";
        available.innerHTML = "";
    }
}

//Change vaccination information when admin choose a diffenrent vaccination
function changeVax() {
    
    var selectedVax = document.getElementById("selectedVax");
    var pname = document.getElementById("pname");
    var vicpass = document.getElementById("vicpass");
    var vbatchno = document.getElementById("vbatchno");
    var vname = document.getElementById("vname");
    var vstatus = document.getElementById("vstatus");

    if (selectedVax.options[selectedVax.selectedIndex].value == 1){
        pname.innerHTML = "Lim Jia Yi";
        vicpass.innerHTML = "P10000";
        vbatchno.innerHTML = "00001";
        vname.innerHTML = "Comirnaty";
        vstatus.innerHTML = "Pending";
    } else if (selectedVax.options[selectedVax.selectedIndex].value == 2){
        pname.innerHTML = "Lim Yi Jui";
        vicpass.innerHTML = "P10001";
        vbatchno.innerHTML = "00002";
        vname.innerHTML = "Sinovac";
        vstatus.innerHTML = "Pending";
    } else if (selectedVax.options[selectedVax.selectedIndex].value == 3) {
        pname.innerHTML = "Wong Yi Han";
        vicpass.innerHTML = "P10002";
        vbatchno.innerHTML = "00003";
        vname.innerHTML = "AstraZeneca";
        vstatus.innerHTML = "Confirmed";
    } else if (selectedVax.options[selectedVax.selectedIndex].value == 4) {
        pname.innerHTML = "Li Xu Duo";
        vicpass.innerHTML = "P10003";
        vbatchno.innerHTML = "00004";
        vname.innerHTML = "Cansino";
        vstatus.innerHTML = "Confirmed";
    } else {
        pname.innerHTML = "";
        vicpass.innerHTML = "";
        vbatchno.innerHTML = "";
        vname.innerHTML = "";
        vstatus.innerHTML = "";
    }

}

//Bold card text when hovered 
function boldCardText() {
    $(document).ready(function () {
        $(".card-links").mouseover(function () {
            $(".card-text", this).css("font-weight", "bolder");
        });
        $(".card-links").mouseout(function () {
            $(".card-text", this).css("font-weight", "100");
        });
    });
}

