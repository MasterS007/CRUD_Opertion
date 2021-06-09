<?php
require_once("../model/crudop.php");
$obj = new users();
if(!isset($_GET["id"]))
{
    
    echo "something wrong!";
}

$id = $_GET["id"];

//echo $id;

$result = $obj->delete_user($id);

if($result==true)
{
    header("location:../views/alluser.php");
}
?>