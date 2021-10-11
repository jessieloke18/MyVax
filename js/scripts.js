// //datepicker
// $('#datepicker').datepicker({
//     weekStart: 1,
//     daysOfWeekHighlighted: "6,0",
//     autoclose: true,
//     todayHighlight: true,
// });
// $('#datepicker').datepicker("setDate", new Date());

//if existing centre radio button is chosen, hide add centre option and unhide select centre option
//if new centre radio button is chosen, unhide add centre option and hide select centre option
function selectCentre() {
    if (document.getElementById('existingCentre').checked) {
        document.getElementById('addCentre').style.display = "none";
        document.getElementById('listOfCentres').style.display = "block";
        document.getElementById("selectExistingCentre").style.display = "block";
        document.getElementById("listOfCentres").required = true;
        document.getElementById("newCentreName").required = false;
        document.getElementById("newCentreAddress").required = false;
    }

    else if (document.getElementById('newCentre').checked) {
        document.getElementById('addCentre').style.display = "block";
        document.getElementById('listOfCentres').style.display = "none";
        document.getElementById("selectExistingCentre").style.display = "none";
        document.getElementById("newCentreName").required = true;
        document.getElementById("newCentreAddress").required = true;
        document.getElementById("listOfCentres").required = false;
    }
}

//if user wants to register as patient
function patientSelected() {
    document.querySelector('.signup-form-patient').style.display = "block";
    document.querySelector('.signup-form-admin').style.display = "none";
    document.getElementById('signup-pic').style.backgroundImage = "url(images/maskwearer.jpg)";
}

//if user wants to register as admin
function adminSelected() {
    document.querySelector('.signup-form-patient').style.display = "none";
    document.querySelector('.signup-form-admin').style.display = "block";
    document.getElementById('signup-pic').style.backgroundImage = "url(images/nursebg.jpg)";
}

//validate sign up form
function signUpValidation() {
    var email = document.getElementById("email");
    var emailP = document.getElementById("emailP");

    var arrayInput = document.querySelectorAll(".form-control");
    for (let i = 0; i < arrayInput.length; i++) {
        if (arrayInput[i].value == "" || arrayInput[i].value.length < 5) {
            arrayInput[i].className += " is-invalid";
        }
        else {
            arrayInput[i].classList.remove("is-invalid");
            arrayInput[i].className += " is-valid";
        }
    }

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    //check email format admin
    if (!email.value.match(validRegex)) {
        email.className += " is-invalid";
    }
    else {
        email.classList.remove("is-invalid");
        email.className += " is-valid";
    }

    //check email format patient
    if (!email.value.match(validRegex)) {
        emailP.className += " is-invalid";
    }
    else {
        emailP.classList.remove("is-invalid");
        emailP.className += " is-valid";
    }
}

//change the displayed address according to the selection
function changeAddress() {
    var selectedCentre = document.getElementById("listOfCentres");
    var address = document.getElementById("selected-centre-address");
    address.innerHTML = "<small> Address: </small>";
    var addr = selectedCentre.options[selectedCentre.selectedIndex].getAttribute("data-address");
    if (addr != null)
        address.innerHTML += "<small>" + addr + "</small>";
    else
        address.innerHTML = "";
}

//Make hospital name bold when hovered
function hospitalNameBold() {
    $(document).ready(function () {
        $(".hospital-block").mouseover(function () {
            $(".hospital-name", this).css("font-weight", "bold");
        });
        $(".hospital-block").mouseout(function () {
            $(".hospital-name", this).css("font-weight", "100");
        });
    });
}

//Make batchNo bold when hovered
function batchNoBold() {
    $(document).ready(function () {
        $(".batch-card").mouseover(function () {
            $(".card-title", this).css("font-weight", "bold");
        });
        $(".batch-card").mouseout(function () {
            $(".card-title", this).css("font-weight", "100");
        });
    });
}

//Account success alert
function accountSuccessMessage() {
    document.getElementById("account-success").style.display = "block";
}


//Invalid username/password alert
function duplicateUsername() {
    document.getElementById("duplicate-username").style.display = "block";
}

//Invalid username/password alert
function invalidLoginMessage() {
    document.getElementById("invalid-login").style.display = "block";
}

//display alert if user is not logged in when choosing a batch
function signInAlert() {
    document.querySelector(".sign-in-alert").style.display = "block";
}

//perform input validation and redirect to different pages depending on type of user
function loginValidation() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    if (username.value == "" || password.value == "") {
        if (username.value == "")
            username.className += " is-invalid";
        else
            username.classList.remove("is-invalid");

        if (password.value == "")
            password.className += " is-invalid";
        else
            password.classList.remove("is-invalid");
    }
}

//check to see if vaccine ID exists
function searchVaccine() {
    var enteredVaccineID = document.getElementById("enteredVaccine").value;
    var vaccines = ['V00001', 'V00002', 'V00003', 'V00004'];
    for (let i = 0; i < vaccines.length; i++) {
        //if both values match, direct patient to the next page
        if (enteredVaccineID.toLowerCase() == vaccines[i].toLowerCase()) {
            window.location.href = "selectCentre.html";
        }

        else {
            //display alert if user enters a vaccine ID that doesn not exist
            document.getElementById("search-alert").style.display = "block";
        }

    }
}

//compare dates
function compareDates() {

    var dateParts;

    var batchExpiryDate = document.getElementById("batch-expiry-date").getAttribute("data-value");

    var selectedDate = document.getElementById("datepicker").value;

    dateParts = batchExpiryDate.split("/");
    batchExpiryDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);

    dateParts = selectedDate.split("/");
    selectedDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);

    if (selectedDate > batchExpiryDate) {
        document.getElementById("date-alert").style.display = "block";
    }

    else
        window.location.href = "afterbooking.html";
}
