<?php
session_start();
include '../include/user.inc.php';//end
$obj=new User();

if (!$obj->getsession()){
 header("location:login.php");
}
else if($_SESSION['role']=='editor')
{
  header('location:showuser.php');
}
else
{
$id=$_GET['id'];
$res=$obj->deleteuser($id);
if($res)
{
header('location:showuser.php');
}
}
?>