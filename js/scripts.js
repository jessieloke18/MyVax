//datepicker
$('#datepicker').datepicker({
    weekStart: 1,
    daysOfWeekHighlighted: "6,0",
    autoclose: true,
    todayHighlight: true,
});
$('#datepicker').datepicker("setDate", new Date());

function selectCentre(){
    if(document.getElementById('existingCentre').checked) {
        document.getElementById('addCentre').style.display="none";
        document.getElementById('listOfCentres').style.display="block";
        document.getElementById("selectExistingCentre").style.display="block";
    }
    
    else if(document.getElementById('newCentre').checked){
        document.getElementById('addCentre').style.display="block";
        document.getElementById('listOfCentres').style.display="none";
        document.getElementById("selectExistingCentre").style.display="none";
    }
}

function patientSelected(){
    document.getElementById('centre').style.display="none";
    document.getElementById('ic-passport').style.display="block";
    document.getElementById('signup-pic').style.backgroundImage="url(../images/maskwearer.jpg)";
}


function adminSelected(){
    document.getElementById('centre').style.display="block";
    document.getElementById('ic-passport').style.display="none";
    document.getElementById('signup-pic').style.backgroundImage="url(../images/nursebg.jpg)";
    
}

function changeAddress(){

    var myselect = document.getElementById("listOfCentres");
    var address = document.getElementById("selected-centre-address");
    address.innerHTML = "";
    if(address.innerHTML.length<1){
        if(myselect.options[myselect.selectedIndex].value == 1){
            address.innerHTML += 
                   "<small style='margin-left:10px'>126, Jln Jalil Perkasa 19, Bukit Jalil, 57000 Kuala Lumpur</small>";
         }
         else if(myselect.options[myselect.selectedIndex].value == 2){
             address.innerHTML += 
                   "<small style='margin-left:10px'>88, Jalan Sunway, 57000 Kuala Lumpur </small>";
         }
         else{
            address.innerHTML += 
            "<small style='margin-left:10px'>100, Jalan Pantai, 47300 Petaling Jaya </small>";
         }


    }
 
}
//Make hospital name bold when hovered
function hospitalNameBold(){
     $(document).ready(function(){
        $(".hospital-block").mouseover(function(){
          $(".hospital-name", this).css("font-weight", "bold");
        });
        $(".hospital-block").mouseout(function(){
          $(".hospital-name", this).css("font-weight", "100");
        });
      });
}

//Account success alert
function accountSuccessMessage(){
    document.getElementById("account-success").style.display="block";
}

//display alert if user is not logged in when choosing a batch
function signInAlert(){
    document.querySelector(".sign-in-alert").style.display="block";
}

//redirect to different pages depending on type of user
function loginRedirect(){
    if(document.getElementById("username").value=="admin123"){
        document.getElementById("redirect-login").href="administrator_dashboard.html"
    }
    else
    document.getElementById("redirect-login").href="javascript:history.back()"
    
}

//compare dates
function compareDates(){

    var dateParts;

    var batchExpiryDate = document.getElementById("batch-expiry-date").getAttribute("data-value");
 
    var selectedDate = document.getElementById("datepicker").value;

    dateParts= batchExpiryDate.split("/");
    batchExpiryDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);

    dateParts = selectedDate.split("/");
    selectedDate = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);

    if(selectedDate>batchExpiryDate){
        document.getElementById("date-alert").style.display="block";
    }
       
    else
        window.location.href = "afterbooking.html";
}
