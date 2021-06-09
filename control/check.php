<?php
 
require_once("../model/crudop.php");

$obj = new users();

if(!isset($_POST["submit"])){

    echo "something wrong!";
}

//print_r($_FILES);

$fileName=$_FILES['profilePic']['name']; 
$file_dir="../asset/".basename($fileName);



if(move_uploaded_file($_FILES['profilePic']['tmp_name'], $file_dir))
{
    $result = $obj->insert_data($fileName);

    if($result==TRUE) 
        header("location:../views/alluser.php");
      
}

else echo "no photo uploaded";

    









        

?>