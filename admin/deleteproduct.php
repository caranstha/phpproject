<?php
session_start();
include '../include/user.inc.php';//end
$obj=new User();

if (!$obj->getsession()){
 header("location:login.php");
}
$id=$_GET['id'];
$res=$obj->deleteproduct($id);
if($res)
{
header('location:showproduct.php');
}
?>