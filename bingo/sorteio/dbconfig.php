<?php
$server = "localhost";
$user = "admin";
$pass = "mu125030";
$db = "mu_campanhaverao";
$con = mysql_connect($server, $user, $pass);
if (!$con)
{die('Could not connect: ' . mysql_error());
}
mysql_select_db($db, $con);
?>
