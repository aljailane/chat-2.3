<?php
/*
Project: PBNL Aljbook 1.0
*/
include('monit.php');
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
$query=mysql_query("DELETE FROM b_forums WHERE id=$id");
if($query)
{
$msg=" تم الحذف بنجاح";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
exit();
}
$id=(int)$_GET["id"];
echo"<div class='topnav'>نظام الإنذار</div><div class='msg'>هل تريد الحذف فعلا</div><div class='gap'></div><div class='link_button'><a href='?action=Delete&yes=true&id=$id'><font color='red'>نعم</font></a> | <div class='right'><a href='forum.php'>لا</a></div></div>";
}
elseif($action=="Edit")
{
$id=(int)$_GET["id"];
if(isset($_POST["submit"]))
{
$name=cleanvalues2($_POST["name"]);
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'>اسم الحقل فئة فارغ أو أقل من 4</font></div>";
}
else
{
if(empty($_POST["img"]))
{
mysql_query("UPDATE b_forums SET name='$name' WHERE id=$id") or die(mysql_error());
$msg="التغييرات تم حفظها بنجاح";
header("location: ?msg=$msg");
exit();
}
else
{
$img=$_POST["img"];mysql_query("UPDATE b_forums SET name='$name', img='$img' WHERE id=$id");
$msg="التغييرات تم حفظها بنجاح";
header("location: ?msg=$msg");
}
}
}
$query=mysql_query("SELECT * FROM b_forums WHERE id='$id'");
$info=mysql_fetch_array($query);
$name=$info["name"];
$img=$info["img"];
echo"<form action='?action=Edit&id=$id' method='POST'><div class='b_head'>تحرير الفئة...</div><br><ul><li>اسم المنتدئ</br><input type='text' name='name' value='$name'></li><li><br> رابط الصورة منتدئ:<br/> http://c.aflams.ga/icons.png<br/><input type='text' name='img' value='$img'></li><li><center><input type='submit' name='submit' class='button' value='انشاء منتدى'></center></li></ul></form>";
echo"<div class='link_button'><a href='forum.php'>رجوع</a></div>";
include "../footer.php"; exit(); 
}
elseif($action=="Add")
{
if(isset($_POST["submit"]))
{
$name=cleanvalues2($_POST["name"]);
$checkname=mysql_num_rows(mysql_query("SELECT * FROM b_forums WHERE name='$name'"));
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'>هو اسم حقل الفئة فارغة أو أقل من 4</font></div>";
}
elseif($checkname>0) {
echo"<div class='msg'>الرجاء اختيار اسم آخر</div>"; }
else
{
if(empty($_POST["img"]))
{
mysql_query("INSERT INTO b_forums SET name='$name'") or die(mysql_error());
$msg="تم انشاء المنتدى بنجاح";
header("location: ?msg=$msg");
include "../footer.php"; exit(); 
}
else
{
$img=$_POST["img"];
mysql_query("INSERT INTO b_forums SET name='$name', img='$img' WHERE id=$id");
$msg="تم انشاء المنتدى بنجاح";
header("location: ?msg=$msg");
}
}
}
echo"<form action='?action=Add' method='POST'><div class='b_head'>انشاء المنتدى</div><br><ul><li>اسم المنتدى</br><input type='text' name='name'></li><li><br>رابط الصورة للمنتدى:<br/> http://c.aflams.ga/icons.png<br/><input type='text' name='img'></li><li><center><input type='submit' name='submit' class='link_button' value='انشاء'></center></li></ul></form>";
echo"<div class='link_button'><a href='forum.php'>رجوع</a></div>";
include "../footer.php"; exit(); 
}
else
{
echo"<div class='topnav'><div class='left'><a href='forum.php?action=Add'>انشاء منتدى جديد</a></div><div class='right'><a href='topics.php'>مواضيع المنتدى</a></div></div><div class='gap'></div><div class='center'><ul>هنا يمكنك إنشاء منتديات جديدة أو حذف أو تعديل  منتدياتك الحالية</ul></div>";
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}
$query=mysql_query("SELECT * FROM b_forums ORDER BY id DESC") or mysql_error();
$count=mysql_num_rows($query);
echo"<div class='topnav'><b>المنتديات الموجوده</b>($count)</div>";
if($count>0)
{
while($row=mysql_fetch_array($query))
{
$name=cleanvalues2($row["name"]);
$id=$row["id"];
$img=$row["img"];
if(!empty($img))
{
$img="<img src='$img' height='20' width='20' alt='img' />";
}
else
{
$img="<img src='../images/general_news.png' height='20' width='20' alt='$img' />";
}
echo "<div class='user-info'><ul><li>$img $name<br/><a href='?action=Edit&id=$id'>تعديل</a> - <a href='?action=Delete&id=$id'><font color='red'>حذف</font></a></li></ul></div>";
}
}
else
{
echo"<font color='red'><center>لا يوجد منتدى انشئ حتى الآن</center></font><div class='gap'></div>";
}
echo"<div class='link_button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
}
?>