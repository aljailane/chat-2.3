<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php"); if(!isloggedin()) { header("location: index.php"); } else { $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo; Change Password</title>";
echo"<div class='body_width'>";
include "../topnav.php";
echo"<div class='breadcrumb'></div>";
echo"<center>";
include "../ads.php";
echo"</center>";
echo"<div class='grid3 middle'>
<div class='b_head'>تغيير كلمة المرور</div><br/>";
if(isset($_POST["submit"]))
{
//Retrieve values
$errors=array();
$newpassword=$_POST["newpassword"];
$newpassword2=$_POST["newpassword2"];
$oldpassword=md5($_POST["oldpassword"]);
//clean values
$oldpassword=cleanvalues($oldpassword);
$newpassword=cleanvalues($newpassword);
$newpassword2=cleanvalues($newpassword2);
if(strlen($newpassword)<4||empty($newpassword))
{
$errors[]="كلمة المرور غير قصيرة جداً";
}
$num=get_row("SELECT * FROM b_users WHERE username='$user' AND password='$oldpassword'");
if($num==0)
{
$errors[]="كلمة مرور خاطئة";
}
if($newpassword!==$newpassword2)
{
$errors[]="تأكيد كلمة المرور لا يطابق كلمة المرور الجديدة";
}
if(count($errors)==0)
{
$user=$_SESSION["user"];
$password=md5($newpassword);
$insert=mysql_query("UPDATE b_users SET password='$password' WHERE username='$user'") or mysql_error();
if(!$insert)
{
$pmsg="حدث خطأ";
}
else
{
$pmsg="تم تغيير كلمة المرور بنجاح";
}
header("location: settings.php?msg=$pmsg");
exit();
}
else
{
foreach($errors as $error)
{
$string.="*$error<br/>";
}
}
}
//ERROR
if($string!=" "); echo"<div class='msg'>$string</div>";
echo"<form action='#' method='POST'>
كلمة المرور القديمة:<br/><input type='text' name='oldpassword'><br/>كلمة المرور الجديدة:<br/><input type='text' name='newpassword'><br/>اعد كتابة كلمة المرور الجديدة:<br/><input type='text' name='newpassword2'><br/><br><center><input type='submit' name='submit' class='button' value='تحديث'></center><br><div class='link_button'><a href='settings.php'>رجوع</a></div>";
include "../footer.php";
?>
