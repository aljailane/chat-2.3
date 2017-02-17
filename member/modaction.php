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
include('../moduls/settings.php');
include('../moduls/connect.php');
include('../moduls/header.php');
include('../moduls/func.php'); echo "<title>$config->title &raquo; Moderat0r Menu</title>";  ?><div class="body_width">
<?php
include('../topnav.php');  if(!isloggedin())
{ header('location: index.php'); }
else {
$user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==1)
{ header("location: logout.php");
exit();
} else
$user=$_SESSION["user"];
$level=user_info($user, level);
if($level>0)
{ updateonline(); } else { header("location:../member/index.php");
exit();
} } if(isset($_GET["action"])) { $action=$_GET["action"]; }
else { $action=" "; }
if($action=="UnBan")
{ if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("UPDATE b_users SET banned='0' WHERE userID=$id"); if($query) { $msg="User Has Been UnBanned Successfuly"; } else
{ $msg=mysql_error(); } header("location: ../profile.php?uid=$id&msg=$msg");
exit();
} $id=(int)$_GET["id"];
echo"<div class='topnav'>System Warning</div><div class='msg'>Are You Sure You want to UNBan This User ?</div><div class='gap'></div><div class='button'><a href='?action=UnBan&yes=true&id=$id'><font color='red'>Yes</font></a> | <a href='../profile.php?uid=$id'>No</a></div>";
}
elseif($action=="Ban")
{ if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("UPDATE b_users SET banned='1' WHERE userID=$id"); if($query) { $msg="User Has Been Banned Successfuly"; } else { $msg=mysql_error(); } header("location: ../profile.php?uid=$id&msg=$msg"); exit(); } $id=(int)$_GET["id"];
echo "<div class='topnav'>System Warning</div><div class='msg'>Are You Sure You want to Banish This User ?</div><div class='gap'></div><div class='button'><a href='?action=Ban&yes=true&id=$id'><font color='red'>Yes</font></a> | <a href='../profile.php?uid=$id'>No</a></div>"; } else { header ("location: ../member/index.php"); } echo"<br/><br><div class='link_button'><a href='../profile.php?uid=$id'>Back To Profile</a></div>";
include "../footer.php";
?>
