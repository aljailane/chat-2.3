<?php
/*
Project: Aljbook 1.0
*/
require("monit.php");
if(isset($_GET["action"]))
{
$action=$_GET["action"];
}
else
{
$action=" ";
}
if($action=="Add")
{
echo"<div class='msg'>جميع الحقول مطلوبة</div>";
if(isset($_POST["submit"]))
{
$name=$_POST["name"];
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'><b>الرجاء اسم  لـ غرف الدردشة الخاصة  بك</b></font></div>";
}
else
{
$name=cleanvalues($name);
$insert=mysql_query("INSERT INTO b_chatroom SET name='$name'");
if(!$insert)
{
$msg="حدث خطأ".mysql_error();
}
else
{
$msg="تم بنجاح إنشاء غرفة";
}
header("location: ?msg=$msg");
exit();
}
}
echo"<form action='?action=Add' method='POST'>";
echo"<ul><li><b>اسم الغرفة</b><br/><input type='text' name='name'></li><li><center><input type='submit' name='submit' class='button' value='انشاء'></center></li></ul></form>";
echo"<div class='title'><a href='c.php'>رجوع</a></div>";
exit();
}
elseif($action=="Edit")
{
//if submit
if(isset($_POST["submit"]))
{
$id=(int)$_POST["id"];
$name=$_POST["name"];
//check values
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'>يتعذر أن يكون اسم الغرفة فارغة</font></div>";
}
else
{
$name=cleanvalues($name);
$insert=mysql_query("UPDATE b_chatroom SET name='$name' WHERE id=$id");
if(!$insert)
{
$msg=mysql_error();
}
else
{
$msg="التغييرات تم حفظها بنجاح";
}
header("location: ?msg=$msg");
exit();
}
}
$id=(int)$_GET["id"];
$query=mysql_query("SELECT * FROM b_chatroom WHERE id=$id");
$info=mysql_fetch_array($query);
$name=$info["name"];
$id=$info["id"];
echo"<form action='?action=Edit' method='POST'>";
echo"<ul><li><b>اسم غرفة الدردشة<b><br/><input type='text' value='$name' name='name'></li><li><input type='hidden' value='$id' name='id'></li><li><center><input type='submit' name='submit' class='button' value='حفظ التغييرات'></center></li></ul></form>";
echo"<div class='title'><a href='c.php'>رجوع </a></div>";
exit();
}
elseif($action=="Delete")
{
if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_chatroom WHERE id=$id");
if($query)
{
$msg="تم حذف غرفة الدردشه بنجاح";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
exit();
}
$id=(int)$_GET["id"];
echo"<div class='topnav'>نظام الانذار</div><div class='msg'>هل تريد حذف هذي الغرفة </div><div class='gap'></div><div class='button'><a href='?action=Delete&yes=true&id=$id'><font color='red'>نعم</font></a> | <div class='right'><a href='c.php'>لا</a></div></div>";
}
else
{
echo"<div class='topnav'><div class='left'><a href='c.php?action=Add'>انشاء غرفة جديدة</a></div><div class='right'><a href='index.php'>الرئيسية</a></div></div><div class='gap'></div><div class='a5'><ul>هنا يمكنك أن غرف جديدة إنشاء، حذف أو تحرير القائمة غرف الدردشة</ul></div>";
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}

echo"<div class='topnav'>غرف الدردشة الموجودة</div>";
$query=mysql_query("SELECT * FROM b_chatroom ORDER BY id ASC") or mysql_error();
while($info=mysql_fetch_assoc($query))
{
$name=$info["name"];
$id=$info["id"];
echo"<ul><li><b>غرفة:$id </b>$name</li><li><a href='?action=Edit&id=$id'>تعديل</a> | <a href='?action=Delete&id=$id'>حذف</a></li></ul>";
}
}
include"../footer.php";

?>
