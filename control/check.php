<?php
 
include "crudop.php";

$obj = new users();

if(!isset($_POST["submit"])){

    echo "something wrong!";
}

//print_r($_FILES);

$fileName=$_FILES['profilePic']['name']; 
$file_dir="asset/".basename($fileName);



if(move_uploaded_file($_FILES['profilePic']['tmp_name'], $file_dir))
{
    $obj->insert_data($fileName);
}

else{

    echo "no photo uploaded";
}








        

?>