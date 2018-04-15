
<?php session_start();
include '../include/user.inc.php';
$obj=new User();

if (!$obj->getsession()){
 header("location:login.php");
}
$obj->logout();
header('location:login.php');
?>


