<?php
ob_start();
session_start();
include "moduls/settings.php"; include "moduls/connect.php"; include "moduls/func.php";
if(isset($_POST["submit"])) {
//STEP DOWN VALUES
$username=$_POST["username"];
$password=$_POST["password"];
//CLEANUP VALUES
$username=cleanvalues($username);
$password=cleanvalues($password);
$password=md5($password);
$checkuser=mysql_query("SELECT username FROM b_users WHERE username='$username' AND validated=0");
$checknum=mysql_num_rows($checkuser); if($checknum>0)
{ header("Location:activate.php");
exit(); } else
{ $checkquery=mysql_query("SELECT username, password, validated FROM b_users WHERE username='$username' AND password='$password' AND validated=1") or die(mysql_error());
$num=mysql_num_rows($checkquery);
if($num>0) { if(mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE username='$username' AND banned=1"))>0)
{ $regmsg=" قد تم حجبك من قبل المسؤول! . كيف  تشعر ..... الان";
header("location:index.php?msg=$regmsg");
exit(); } $_SESSION["user"]=$username;
header("location:member/index.php");
} else
{ $regmsg="اسم المستخدم غير صحيح أو كلمة المرور، تأكد من كتابة اسم المستخدم الخاص بك آند كلمة المرور بشكل صحيح!";
header("location:index.php?msg=$regmsg"); } } } ?>
