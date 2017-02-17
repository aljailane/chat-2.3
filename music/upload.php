<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php");
if(!isloggedin())
{
header("location: ../index.php");
}
else
{
$user=$_SESSION["user"];
}
echo"<title>$config->title &raquo; اضافة موسيقى</title>";
echo"<style type='text/css'>
<!--
.style3 {
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
}
.style4 {
color: #FF0000;
font-weight: ;
}
-->
</style>

<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>الصفحة الرئيسية</a>&raquo; <a href='index.php'>صفحة الموسيقى</a> &raquo; إضافة الموسيقى</div>";
echo"<center>";
include"../ads.php";


echo"</center>";
echo"
<div class='grid3 middle'>   <div class='b_head'> رفع الموسيقى</div>";
$errors=array();
if(isset($_POST["submit"]))
{$link=cleanvalues($_POST["link"]);
$cat=cleanvalues($_POST["cat"]);
$img=cleanvalues($_POST["img"]);
$comment=cleanvalues($_POST["comment"]);
$title=cleanvalues($_POST["title"]);
if(empty($title) || strlen($title)<4)
{
$errors[]="العنوان الخاص بك قصيرة جداً";
}
if(empty($comment) || strlen($comment)<4)
{
$errors[]="التعليق الخاص بك قصيرة جداً";
}
if(empty($cat))
{
$errors[]="يجب عليك تحديد قسم";
}
if(substr($link, -3)=="mp3")
{
$format=substr($link, -3);
}
else
{
$errors[]="ارتباط غير صالح Mp3";
}
$check=mysql_num_rows(mysql_query("SELECT * FROM b_music WHERE title='$title'"));
if($check>0)
{
$errors[]="الموسيقى موجود بالفعل";
}
if(count($errors)==0)
{
$user=$user;
$date=time();
$insert=mysql_query("INSERT INTO b_music SET `title`='$title', `comment`='$comment', `catid`='$cat', `link`='$link', `img`='$img', `by`='$user', `time`='$date'");
if(!$insert)
{
$msg=mysql_error();
}
else
{
$msg="تم اضافة الملف بنجاح";
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
echo"<div class='msg'>$string</div>";
}
}
echo"<div class='a5'><ul><span class='style4'>دائماً قم بإدخال اسم الفنان الصحيح أو عنوان الموسيقى على سبيل المثال، D'banj فورنت سنوب-هبت</span></ul></div><br>";
//ERRORS
echo"<form action='#' method='POST'><ul><li>الفنان الموسيقى & اسم العنوان<br/><input type='text' name='title'></li><li><center>تحديد قسم<br/><select name='cat'><option value='0'>اختر قسم الان</option>";
$query=mysql_query("SELECT * FROM b_musiccat");
while($cinfo=mysql_fetch_array($query))
{
$cid=$cinfo["id"];
$cname=$cinfo["name"];
echo"<option value='$cid'>$cname</option>";
}
echo"</select></center></li><li>رابط تحميل الموسيقى<br/><input type='text' name='link'></li>
<li>التعليق الموسيقى<br/><input type='text' name='comment'></li>
<li>صورة الموسيقى<br/><input type='text' name='img'></li><li><center><input type='submit' name='submit' value='اضافة الان' class='button'></center></li></ul></form>";
echo"<div class='center'><ul><span class='style4'>إذا كنت لا تعرف كيفية تحميل الموسيقى إلى الموقع يرجى الاطلاع أدناه لطريقة الرفع أو عدم تحميل أي موسيقى!</span></ul></div>";
echo"<br><div class='link_button'><a href='index.php'>الرجوع للخلف</a></div>";
include"../footer.php";
