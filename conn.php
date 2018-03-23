<?php
/*Configuration File*/

$servername = "my-sql-server01.mysql.database.azure.com";
$username = "nidhisharma@my-sql-server01";
$password = "password@123";
//$password = "";
$database="lportal";
$base_url='portal.azure.com';


$conn = mysqli_init();
mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/BaltimoreCyberTrustRoot.crt.pem", NULL, NULL) ; 
mysqli_real_connect($conn, $servername, $username, $password, 'quickstartdb', 3306, MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

// $conn = mysql_connect($servername, $username, $password);
// $dbcon=mysql_select_db($database);
// if (function_exists('date_default_timezone_set'))
// {
//   date_default_timezone_set('Asia/Kolkata');
// }
/*Configuration File*/
?>
