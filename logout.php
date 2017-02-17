<?php 
ERROR_REPORTING(0);
/*
Project: PBNL Forum v2.3.5

Coded By: Adegboye Joshua (JOSHUAEASY)

Facebook: http://facebook.com/JOSHUAEASY

Email: (adegboyejoshua@gmail.com)

CellPhone +2348137536702

Twitter: @herdaywhaley

WebSite: http://www.9jatech.tk
*/
require("init.php");
$user=$_SESSION["user"];
mysql_query("UPDATE b_users SET lasttime=0 WHERE username='$user'");
unset($_SESSION["user"]);
session_destroy();
header("location: index.php?msg=$config->lome");
exit();
?>
