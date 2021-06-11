<?php
require_once("../model/crudop.php");
$obj = new users();
$anullflag = true;
$fflag = true;
$lflag = true;
$ferrorMsg = "";
$lerrorMsg = "";
$ageError = "";

if(isset($_POST['save'])){
    $id=$_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    if(empty($age) || empty($gender)){
        $anullflag = false; //age or gender null
        $ageError = "Field cannot be empty!";
        $obj->set_message($ferrorMsg, $lerrorMsg, $ageError );
        header("location:../views/edit.php?id=".$id);
    }

    if(!ctype_alpha($fname) || empty($fname) ){
        $fflag = false;   
        $ferrorMsg = "Name is not in pattern or Field is empty!";
        $obj->set_message($ferrorMsg, $lerrorMsg, $ageError );
        header("location:../views/edit.php?id=".$id);
    }

    if(!ctype_alpha($lname) || empty($lname) ){
        $lflag = false;
        $lerrorMsg = "Name is not in pattern or Field is empty!";
        $obj->set_message($ferrorMsg, $lerrorMsg, $ageError );
        header("location:../views/edit.php?id=".$id);
    }

    if($fflag == true && $lflag == true && $anullflag == true){
        $userinfo = [
            "id"=>$id,
            "fname"=>$fname,
            "lname"=>$lname,
            "age"=>$age,
            "gender"=>$gender
        ];
        $result = $obj->update_user($userinfo);
        if($result==true){
                 header("location:../views/alluser.php?Message=Update Successful");  
        }

    }
}