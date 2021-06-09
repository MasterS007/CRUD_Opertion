
// function isEmpty()
// {
//     var fname = $("input[name*='fname']").val();
//     var lname = $("input[name*='lname']").val();
//     var age = $("input[name*='age']").val();
//     var gender = $("input[name*='gender']").val();
//     var photo = $("input[name*='photo']").val();

//     if(fname==""|| lname == "" || age == "" || gender == "" || photo == "" )
//     {

//     }

// }

function fname_wrong_pattern()
{
    var fname = $("input[name*='fname']").val();
    var pattern = /^[a-zA-Z\s]*$/;

    if(!pattern.test(fname))
    {
        document.getElementById("fmsg").innerHTML ="Name is in wrong pattern!";
    }

}

function lname_wrong_pattern()
{
    var lname = $("input[name*='lname']").val();
    var pattern = /^[a-zA-Z\s]*$/;

    if(!pattern.test(lname))
    {
        document.getElementById("lmsg").innerHTML ="Name is in wrong pattern!";

    }

}

function fmsg_remove()
{
    var fname = $("input[name*='fname']").val();
    var pattern = /^[a-zA-Z\s]*$/;
    if(pattern.test(fname))
    {
        document.getElementById("fmsg").innerHTML ="";
    }
        
}



function lmsg_remove()
{
    
    var fname = $("input[name*='lname']").val();
    var pattern = /^[a-zA-Z\s]*$/;
    if(pattern.test(lname))
    {
        document.getElementById("lmsg").innerHTML ="";
    }
}