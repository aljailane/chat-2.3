<?php

/*
Project: PBNL Forum v2.3.5

Coded By: Adegboye Joshua (JOSHUAEASY)

Facebook: http://facebook.com/JOSHUAEASY

Email: (adegboyejoshua@gmail.com)

CellPhone +2348137536702

Twitter: @herdaywhaley

WebSite: http://www.9jatech.tk
*/
ob_start();
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/moduls/settings.php');
include($_SERVER['DOCUMENT_ROOT'].'/moduls/connect.php');
include($_SERVER['DOCUMENT_ROOT'].'/moduls/header.php');
include($_SERVER['DOCUMENT_ROOT'].'/moduls/func.php');
?>
<div class="body_width">
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/topnav.php');
if(!isloggedin())
{
header('location: index.php');
}
else
{
$user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==1)
{
header("location: logout.php");
exit();
}
else

$user=$_SESSION["user"];
$level=user_info($user, level);
if($level==2)

{
updateonline();
}
}
?>