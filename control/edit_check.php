<?php
require_once("../model/crudop.php");

$obj = new users();
$flag = false;
$patternflag =false;
$patternError="";

if(isset($_POST['check_info'])){
    $id=$_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    
    if(empty($fname) || empty($lname) || empty($age) || empty($gender)){
        $flag = false;
    }
    else if(!ctype_alpha($fname) || !ctype_alpha($lname)){
        $patternflag = false;
        $patternError = "Name is not in pattern!";
            //header("location:../views/edit.php?errorMessage="." Name is in wrong pattern");
    }
    
    // else if(!preg_match("/^[a-zA-Z-' ]*$/",$fname)||!preg_match("/^[a-zA-Z-' ]*$/", $lname)){
         
    //     $patternflag = false;
    // }
    
    else{
          $flag = true;
          $patternflag =true;   
    }
    
    if($flag == true && $patternflag==true){
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
