<?php
require_once("../model/crudop.php");
$obj = new users();
$flag=true;
$pflag = true;
if(!isset($_POST["submit"])){

    echo "something wrong!";
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$fileName=$_FILES['profilePic']['name']; 
$file_dir="../asset/".basename($fileName);

//$d = !preg_match("/^[a-zA-Z-' ]*$/", $fname);

//echo $d;

if(empty($fname)||empty($lname)||empty($age)||empty($gender)||empty($fileName)){

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
   $pflag= false;
   echo "</br> no photo uploaded";
    
}

if($flag == true && $pflag == true){

    $users =[
        "fname" => $fname,
        "lname" => $lname,
        "age" => $age,
        "gender" => $gender,
        "filename" => $filename

    ];
    $result = $obj->insert_data($users);

    if($result==true)
        header("location:../views/alluser.php?Message="."User successfully added");
    
    else
        echo "failed to insert";

}


        

    









        

?>