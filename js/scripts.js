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

