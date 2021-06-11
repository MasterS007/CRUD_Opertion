<?php
require_once("../model/crudop.php");
$obj = new users();
$anullflag = true;
$fflag = true;
$lflag = true;
$pflag = true;
$ferrorMsg = "";
$lerrorMsg = "";
$ageError = "";
$photError = "";

if(isset($_POST["submit"])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $fileName=$_FILES['profilePic']['name']; 
    $file_dir="../asset/".basename($fileName);

    if(empty($age) || empty($gender)){
        $anullflag = false; //age or gender null
        $ageError = "Field cannot be empty!";
        $obj->set_message($ferrorMsg, $lerrorMsg, $ageError );
        header("location:../index.php?");
    }
    if(!ctype_alpha($fname) || empty($fname) ){
        $fflag = false;   
        $ferrorMsg = "Name is not in pattern or Field is empty!";
        $obj->set_message($ferrorMsg, $lerrorMsg, $ageError );
        header("location:../index.php?");
    }
    if(!ctype_alpha($lname) || empty($lname) ){
        $lflag = false;
        $lerrorMsg = "Name is not in pattern or Field is empty!";
        $obj->set_message($ferrorMsg, $lerrorMsg, $ageError );
        header("location:../index.php?");
    }
    if(!move_uploaded_file($_FILES['profilePic']['tmp_name'], $file_dir)){
        $pflag= false;
        $photError = "no photo has been uploaded";
        $obj->set_photoMessage($photError);
        header("location:../index.php?"); 
    }
    if($fflag == true && $lflag == true && $anullflag == true && $pflag == true){
        $users =[
            "fname" => $fname,
            "lname" => $lname,
            "age" => $age,
            "gender" => $gender,
            "filename" => $filename
        ];
        $result = $obj->insert_data($users);
    
        if($result!=true){
            $msg = "Insert Unsucessfull!";
            $obj->set_insertError( $msg);
            header("location: ../index.php");
        }
        header("location:../views/alluser.php?Message="."User successfully added");
    }
}
