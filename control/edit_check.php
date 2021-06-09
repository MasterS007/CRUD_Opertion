<?php

require_once("../model/crudop.php");
$obj = new users();
if(!isset($_POST["save"]))
{
    
    echo "something wrong!";
}

//print_r($_FILES);
$fileName=$_FILES['profilePic']['name']; 
$file_dir="../asset/".basename($fileName);



if(move_uploaded_file($_FILES['profilePic']['tmp_name'], $file_dir))
{
    $userinfo = [

        "id"=>$_POST["id"],
        "fname"=>$_POST["fname"],
        "lname"=>$_POST["lname"],
        "age"=>$_POST["age"],
        "gender"=>$_POST["gender"],
        "photo"=>$fileName
    ];
    
    $result = $obj->update_user($userinfo);

    if($result==true)
    {
    header("location:../views/alluser.php?Message="."Update Successful");
    }
}

else{

    echo "no photo uploaded";
}


?>