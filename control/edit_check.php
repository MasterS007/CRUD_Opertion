<?php
require_once("../model/crudop.php");
$obj = new users();
$flag = false;

if(!isset($_POST['check_info'])){
    echo "something wrong!";
}
$id=$_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$gender = $_POST['gender'];

if(empty($fname)||empty($lname)||empty($age)||empty($gender)){
    echo "null submission";
    $flag = false;
}

else if(!preg_match("/^[a-zA-Z-' ]*$/",$fname)||!preg_match("/^[a-zA-Z-' ]*$/", $lname)){
    echo "Name is in wrong pattern";
    $flag = false;
}

else{
    $flag = true;
}

if($flag == true){
    $userinfo = [
        "id"=>$id,
        "fname"=>$fname,
        "lname"=>$lname,
        "age"=>$age,
        "gender"=>$gender,
    ];
     $result = $obj->update_user($userinfo);
    if($result){
        header("location:../views/alluser.php?Message="."Update Successful");
        
    }
    else{
        echo "something went wrong";
    } 
}
?>

