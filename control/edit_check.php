<?php

require_once("../model/crudop.php");
$obj = new users();
if(!isset($_POST["save"]))
{
    
    echo "something wrong!";
}

$userinfo = [

    "id"=>$_POST["id"],
    "fname"=>$_POST["fname"],
    "lname"=>$_POST["lname"],
    "age"=>$_POST["age"],
    "gender"=>$_POST["gender"],
    "photo"=>$_POST["photo"]
];

$data = $obj->update_user($userinfo);
?>