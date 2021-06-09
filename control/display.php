<?php
require_once("../model/crudop.php");
$obj = new users();
$data =[];
$data = $obj->display_alldata();

 
   // print_r($data);



?>