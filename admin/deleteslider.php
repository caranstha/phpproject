<?php
session_start();
include '../include/user.inc.php';//end
$obj=new User();

if (!$obj->getsession()){
 header("location:login.php");
}
else
{
$id=$_GET['id'];
$res=$obj->deleteslider($id);
if($res)
{
header('location:addsliderimage.php');
}
}
?>