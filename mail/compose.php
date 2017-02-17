<?php
ERROR_REPORTING(0);
require("../init.php");
/*
Project: PBNL Forum v2.3.5

Coded By: Adegboye Joshua (JOSHUAEASY)

Facebook: http://facebook.com/JOSHUAEASY

Email: (adegboyejoshua@gmail.com)

CellPhone +2348137536702

Twitter: @herdaywhaley

WebSite: http://www.9jatech.tk
*/
if(!isloggedin())
{ header("location: ../index.php"); }
else {
$user=$_SESSION["user"];
}
echo"<title>$config->title &raquo; كتابة رسالة</title>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../mail/index.php'>المراسلة</a></div><br>";
echo"<center>";
include"../ads.php";
fblike();

echo"</center>";
echo"<center>

<div class='public_message'><div class='success'></div></div>

</center>



<div style='margin-top: 5px;' class='grid3'>




</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>إنشاء رسالة</div>";
if(isset($_POST["submit"]))
{
$date=time();
$rname=cleanvalues($_POST["rname"]);
$sname=cleanvalues($_POST["sname"]);
$subject=cleanvalues($_POST["subject"]);
$message=cleanvalues($_POST["message"]);
$errors=array();
$checkreciever=get_row("SELECT * FROM b_users WHERE username='$rname'");
echo"<b>$checkreciever</b>";
if(empty($rname))
{
$errors[]="توفير أحد المستلمين";
}
if($checkreciever==0)
{
$errors[]="توفير مستخدم صالح";
}
if(empty($subject))
{
$errors[]="يوفر هذا الموضوع";
}
if(empty($message)||strlen($message)<4)
{
$errors[]="حدث خطأ";
}
if(count($errors)==0)
{
//INSERT
$insert=mysql_query("INSERT INTO b_pms SET `reciever`='$rname', `sender`='$sname',
`subject`='$subject', `message`='$message', `date`='$date'") or mysql_erro();
if(!$insert)
{ $msg="An error occured";
}
else
{
$msg="الرسالة التي تم إرسالها بنجاح";
}
header("location: index.php?msg=$msg");
exit();
}
else
{
foreach($errors as $error)
{
$string.="$error<br/>";
}
}
}
if($string!=" ")
{ echo"<div class='msg'>$string</div>";
}
echo"<form action='#' method='Post'>";
if(isset($_GET["rname"]))
{
$rname=$_GET["rname"];
echo"<center>إلى</center><li><input type='text' name='rname' value='$rname'></li><li>";
}
else
{
echo"<center>إلى</center><li><input type='text' name='rname'></li>";
}
echo"<center>عنوان رسالتك</center><li><input type='text' name='subject'></li>";
echo"<center>الرسالة</center><li><textarea rows='5' cols='25' name='message'></textarea></li>";
echo"<br><input type='hidden' name='sname' value='$user'><center><input type='submit' class='button' name='submit' value='ارسال'></center><br><div class='link_button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
?>
