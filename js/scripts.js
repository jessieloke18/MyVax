 function selectCentre(){
    if(document.getElementById('existingCentre').checked) {
    document.getElementById('newCentreName').disabled=true;
    document.getElementById('newCentreAddress').disabled=true;
    document.getElementById('listOfCentres').disabled=false;
    }
    
    else if(document.getElementById('newCentre').checked){
        document.getElementById('newCentreName').disabled=false;
        document.getElementById('newCentreAddress').disabled=false;
        document.getElementById('listOfCentres').disabled=true;
    
    }
}


var patient = document.getElementById('patient-signup');

patient.onclick = (function(){
    document.getElementById('centre').style.display="none";
    document.getElementById('ic-passport').style.display="block";
    document.getElementById('signup-pic').style.backgroundImage="url(../images/maskwearer.jpg)";
})

var admin = document.getElementById('admin-signup');
    admin.onclick = (function(){
    document.getElementById('centre').style.display="block";
    document.getElementById('ic-passport').style.display="none";
    document.getElementById('signup-pic').style.backgroundImage="url(../images/nursebg.jpg)";
    
})
