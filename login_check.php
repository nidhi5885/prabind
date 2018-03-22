<?php
include("conn.php");

$empid=$_POST['id'];
trim($empid);
$password=$_POST['password'];
$manager_check="SELECT manager FROM user_directory WHERE  manager='$empid'"; 
$res_check=mysql_query($manager_check);
$num_rows_check=mysql_num_rows($res_check);



session_start();

if($num_rows_check>=1 && $password=="pipl?12")

{
	$url="location:requestor_view.php";
	$_SESSION["id"] = $empid;
}
else 
{
	$url="location:check_statusnow.php"; 
 	$_SESSION["id"] = "";

 }	


header($url);

?>