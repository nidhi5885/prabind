<?php
/*Configuration File*/

$servername = "my-sql-server01.mysql.database.azure.com";
$username = "nidhisharma@my-sql-server01";
$password = "password@123";
//$password = "";
$database="lportal";
$base_url='portal.progressive.in/web/procare/arf';

$conn = mysql_connect($servername, $username, $password);
$dbcon=mysql_select_db($database);
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}
/*Configuration File*/
?>
