<?php

require_once("../model/crudop.php");
$obj = new users();
$flag = false;
$pflag = true;

if(!isset($_POST["save"]))
{
    
    echo "something wrong!";
}

//print_r($_FILES);
$id=$_POST["id"];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$fileName=$_FILES['profilePic']['name']; 
$file_dir="../asset/".basename($fileName);

$user = $obj->display_userby_id($id);

if(empty($fname)||empty($lname)||empty($age)||empty($gender)){

    echo "null submission";
    $flag = false;

}

else if(!preg_match("/^[a-zA-Z-' ]*$/",$fname)||!preg_match("/^[a-zA-Z-' ]*$/", $lname)
){

    echo "Name is in wrong pattern";
    $flag = false;

   
}

else
    $flag = true;


//print_r($_FILES);

if(!move_uploaded_file($_FILES['profilePic']['tmp_name'], $file_dir))
{
   $fileName=$user["photo"];
   $pflag = true;
    
}

if($flag == true && $pflag == true)
{
    $userinfo = [

        "id"=>$id,
        "fname"=>$fname,
        "lname"=>$lname,
        "age"=>$age,
        "gender"=>$gender,
        "photo"=>$fileName
    ];
    
    $result = $obj->update_user($userinfo);

    if($result==true)
        header("location:../views/alluser.php?Message="."Update Successful");

    else
        echo "something went wrong";
    
}




?>