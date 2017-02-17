<?php
/*
Project: Aljbook 1.0
*/
include('monit.php');
echo "<title>$config->title &raquo; تحكم بـ مركز التحميل</title>";
if(isset($_GET["action"]))
{
$action=$_GET["action"];
}
else
{
$action=" ";
}
if($action=="Delete")
{
if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_uploadcat WHERE id=$id");
if($query)
{
$msg="فئة المحذوفة بنجاح";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
exit();
}
$id=(int)$_GET["id"];
echo"<div class='b_head'>نظام الانذار</div><div class='msg'>هل تريد حذف هذا القسم</div><div class='gap'></div><div class='button'><a href='?action=Delete&yes=true&id=$id'><font color='red'>نعم</font></a> | <a href='uploads.php'>لا</a></div>"; 
}
elseif($action=="Edit")
{
$id=(int)$_GET["id"];
if(isset($_POST["submit"]))
{
$name=cleanvalues2($_POST["name"]);
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'>هو اسم حقل القسم فارغة أو أقل من 4</font></div>";
}
else
{
if(empty($_POST["img"]))
{
mysql_query("UPDATE b_uploadcat SET name='$name' WHERE id=$id") or die(mysql_error());
$msg="تم حفظ الضبط";
header("location: ?msg=$msg");
include "../footer.php"; exit(); 
}
else
{ $img=$_POST["img"];
mysql_query("UPDATE b_uploadcat SET name='$name', img='$img' WHERE id=$id");
$msg="تم حفظ التغييرات";
header("location: ?msg=$msg");
}
}
}
$query=mysql_query("SELECT * FROM b_uploadcat WHERE id='$id'");
$info=mysql_fetch_array($query);
$name=$info["name"];
$img=$info["img"];
echo"<form action='?action=Edit&id=$id' method='POST'><div class='b_head'>تحرير قسم...</div><br><ul><li>اسم القسم</br><input type='text' name='name' value='$name'></li><li><br> رابط صورة القسم<br/> http://c.aflams.ga/icons.png<br/><input type='text' name='img' value='$img'></li><li><center><input type='submit' name='submit' class='button' value='انشاء'></center></li></ul></form>";
echo"<br><div class='link_button'><a href='uploads.php'>رجوع</a></div>";
include "../footer.php"; exit(); }
elseif($action=="Add")
{
if(isset($_POST["submit"]))
{
$name=cleanvalues2($_POST["name"]);
$checkname=mysql_num_rows(mysql_query("SELECT * FROM b_uploadcat WHERE name='$name'"));
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'>هو اسم حقل القسم فارغة أو أقل من 4</font></div>";
}
elseif($checkname>0) {
echo"<div class='msg'>الرجاء اختيار اسم آخر</div>"; }
else
{
if(empty($_POST["img"]))
{
mysql_query("INSERT INTO b_uploadcat SET name='$name', img='$img'") or die(mysql_error());
$msg="القسم التي تم إنشاؤها بنجاح";
header("location: ?msg=$msg");
exit();
}
else
{ $img=$_POST["img"];
mysql_query("INSERT INTO b_uploadcat SET name='$name', img='$img' WHERE id=$id");
$msg="القسم مكون بنجاح";
header("location: ?msg=$msg");
}
}
}
echo"<form action='?action=Add' method='POST'><div class='b_head'>إنشاء قسم...</div><br><ul><li>اسم القسم</br><input type='text' name='name'></li><li><br>رابط صورة القسم:<br/> http://c.aflams.ga/icons.png<br/><input type='text' name='img'></li><li><center><input type='submit' name='submit' class='button' value='انشاء'></center></li></ul></form>";
echo"<br><div class='link_button'><a href='uploads.php'>رجوع</a></div>";
include "../footer.php"; exit();
}
else
{
echo"<br/><div class='topnav'><div class='left'><b><a href='?action=Add'>اضافة قسم</a> &raquo; <a href='files.php'>رفع الملفات</a></b></div><br/><div class='center'><ul>هنا يمكنك إنشاء اقسام جديدة أو حذف أو تعديل اقسام او قسم موجودة</ul></div><br>";
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}
$query=mysql_query("SELECT * FROM b_uploadcat ORDER BY id DESC") or mysql_error();
$count=mysql_num_rows($query);
echo "<div class='b_head'><b> جميع الاقسام </b>($count)</div><br/>";
if($count>0)
{
while($row=mysql_fetch_array($query))
{
$name=cleanvalues2($row["name"]);
$id=$row["id"];
$img=$row["img"];
if(!empty($img))
{
$img="<img src='$img' height='20' width='20' alt='$img' />";
}
else
{
$img="<img src='../images/folder.png' height='20' width='20' alt='$img' />";
}
echo "<div class='user-info'><ul><li>$img $name<br/><a href='?action=Edit&id=$id'>تعديل</a> - <a href='?action=Delete&id=$id'><font color='red'>حذف</font></a></li></ul></div>";
}
}
else
{
echo"<font color='red'><center>لا يوجد قسم created yet</center></font><div class='gap'></div>";
}
echo "<br/><div class='link_button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
}
?>