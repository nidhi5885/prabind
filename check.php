<?php

include("conn.php");

$liferay_id=$_GET['id'];

$query1="SELECT * FROM user_erp WHERE Liferay_Id='$liferay_id'";
$res1=mysql_query($query1);
$result1=mysql_fetch_array($res1);
$empid="001043";

/*$query_check="SELECT * FROM user_directory WHERE empid='$empid'";
$res5=mysql_query($query_check);
$num_rows=mysql_num_rows($res5);*/

$manager_check="SELECT manager FROM user_directory WHERE  manager='$empid'"; 
$res_check=mysql_query($manager_check);
$num_rows_check=mysql_num_rows($res_check);

session_start();

if($num_rows_check>=1)
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
