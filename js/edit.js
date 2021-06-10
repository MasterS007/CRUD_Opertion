
function ageEmpty(){
    var age = $("input[name*='age']").val();
    if(age == ""){
        document.getElementById("amsg").innerHTML = "Field cannot empty!";
        window.nflag = false;
    }
   
}

function agenotempty(){
    var age = $("input[name*='age']").val();
    if(age != ""){
        document.getElementById("amsg").innerHTML ="";
        window.aflag = true;
    }
}

function fname_wrong_pattern(){
    var fname = $("input[name*='fname']").val();
    var pattern = /^[a-zA-Z\s]*$/;

    if(!pattern.test(fname)){
        document.getElementById("fmsg").innerHTML ="Name is in wrong pattern!";
        window.fflag = false;
    }
    if(fname==""){
        document.getElementById("fmsg").innerHTML = "Field cannot empty!";
        window.fflag = false;
    }
}

function lname_wrong_pattern(){
    var lname = $("input[name*='lname']").val();
    var pattern = /^[a-zA-Z\s]*$/;

    if(!pattern.test(lname)){
        document.getElementById("lmsg").innerHTML ="Name is in wrong pattern!";
        window.lflag = false;
     }
    if(lname==""){
        document.getElementById("lmsg").innerHTML = "Field cannot empty!";
        window.lflag = false;
    }
}

function lmsg_remove(){  
    var lname = $("input[name*='lname']").val();
    var pattern = /^[a-zA-Z\s]*$/;
    if(pattern.test(lname)){
        document.getElementById("lmsg").innerHTML ="";
        window.lflag = true;  
    }
    if(lname!=""){
        document.getElementById("lmsg").innerHTML ="";
        window.lflag = true
    }
}

function fmsg_remove(){
    var fname = $("input[name*='fname']").val();
    var pattern = /^[a-zA-Z\s]*$/;
    if(pattern.test(fname)){
        document.getElementById("fmsg").innerHTML ="";
        window.fflag = true;
    }
    if(fname!=""){
        document.getElementById("fmsg").innerHTML ="";
        window.fflag = true
    }    
}

function forPostForm(){
    var id = $("input[name*='id']").val();
    var fname = $("input[name*='fname']").val();
    var lname = $("input[name*='lname']").val();
    var age = $("input[name*='age']").val();
    var gender = $("input[name*='gender']").val();

    if(window.fflag != true && window.lflag != true && window.nflag != true && window.aflag != true ){
        return false;
    }
    // var allInfo ={
    //      id :id,
    //      fname: fname,
    //      lname : lname,
    //      age : age,
    //      gender: gender
    // };

    else
    {
        var allInfo = '' +
        'check_info=' + window.encodeURIComponent('ON') +
        '&id=' + window.encodeURIComponent(id) +
        '&fname=' + window.encodeURIComponent(fname)+
        '&lname=' + window.encodeURIComponent(lname) +
        '&age=' + window.encodeURIComponent(age) +
        '&gender=' + window.encodeURIComponent(gender);

    //var udata= JSON.stringify(allInfo);
    var xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../control/edit_check.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(allInfo);
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200){
            //alert(this.responseText);
            window.location.href="../views/alluser.php";
             }
        }
    }
    
        return true;
} 



