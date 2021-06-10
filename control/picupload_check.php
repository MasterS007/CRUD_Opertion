<?php
require_once("../model/crudop.php");
$obj = new users();
$pflag = true;  
if(isset($_POST["upload"])){
    echo "something wrong!";
}
$id = $_POST["id"];
$fileName=$_FILES["profilePic"]['name']; 
$file_dir="../asset/".basename($fileName);
$user = $obj->display_userby_id($id);
if(!move_uploaded_file($_FILES["profilePic"]['tmp_name'], $file_dir)){
    $fileName=$user["photo"]; 
 }
 $userinfo = [
    "id"=>$id,
    "photo"=>$fileName
 ];
 $result = $obj->profilepic_change($userinfo);
    if($result==true){
        header("location:../views/alluser.php?Message="."Update Successful");
        
    }
    else{
        echo "something went wrong";
    }
 

