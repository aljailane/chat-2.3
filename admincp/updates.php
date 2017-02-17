<?php
/*
Project: Aljbook 1.0

*/require("monit.php");
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
echo"<div class='msg'>الرجاء جميع الحقول مطلوبة</div>";
if(isset($_POST["submit"]))
{
$prefix=$_POST["prefix"];
$title=$_POST["title"];
$url=$_POST["url"];
if(empty($prefix) || empty($title) || empty($url) || strlen($prefix)<4 || strlen($title)<4  || strlen($url)<4)
{
echo"<div class='center'><font color='red'><b>حقل العنوان أو عنوان url الخاص بك فارغ</b></font></div>";
}
else
{
$prefix=cleanvalues($prefix);
$title=cleanvalues($title);
$url=cleanvalues($url);
$insert=mysql_query("INSERT INTO b_updates SET prefix='$prefix', title='$title', url='$url'");
if(!$insert)
{
$msg="An error occured".mysql_error();
}
else
{
$msg="تم اضافة التحديث بنجاح";
}
header("location: ?msg=$msg");
exit();
}
}
echo"<form action='?action=Add' method='POST'>";
echo"<ul>><li><b>بادئة التحديث:</b><br/><textarea name='prefix'></textarea></li>
<li><b>عنوان التحديث:</b><br/><textarea name='title'></textarea></li><li><b>رابط التحديث:</b><br/><input type='text' name='url'></li><li><center><input type='submit' name='submit' class='button' value='اضافة تحديث'></center></li></ul></form>";
echo"<div class='title'><a href='updates.php'>العودة إلى التحديثات</a></div>";
exit();
}
elseif($action=="Edit")
{
//if submit
if(isset($_POST["submit"]))
{
$id=(int)$_POST["id"];
$prefix=$_POST["prefix"];
$title=$_POST["title"];
$url=$_POST["url"];
//check values
if(empty($prefix) || empty($title) || empty($url) || strlen($url)<4 || strlen($prefix)<4  || strlen($title)<4)
{
echo"<div class='center'><font color='red'>العنوان أو عنوان url الخاص بك فارغ</font></div>";
}
else
{
$prefix=cleanvalues($prefix);
$title=cleanvalues($title);
$url=cleanvalues($url);
$insert=mysql_query("UPDATE b_updates SET prefix='$prefix', title='$title', url='$url' WHERE id=$id");
if(!$insert)
{
$msg=mysql_error();
}
else
{
$msg="التغييرات التي تم حفظها بنجاح";
}
header("location: ?msg=$msg");
exit();
}
}
$id=(int)$_GET["id"];
$query=mysql_query("SELECT * FROM b_updates WHERE id=$id");
$info=mysql_fetch_array($query);
$prefix=$info["prefix"];
$title=$info["title"];
$url=$info["url"];
$id=$info["id"];
echo"<form action='?action=Edit' method='POST'>";
echo"<ul><li><b>Update prefix<b><br/><textarea name='prefix'>$prefix</textarea></li>
<li><b>Update Title<b><br/><textarea name='title'>$title</textarea></li><li>Update Url<br/><input type='text' name='url' value='$url'></li><li><input type='hidden' value='$id' name='id'></li><li><center><input type='submit' name='submit' class='button' value='حفظ التغييرات'></center></li></ul></form>";
echo"<div class='title'><a href='updates.php'>التحديثات</a></div>";
exit();
}
elseif($action=="Delete")
{
$id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_updates WHERE id=$id");
if($query)
{
$msg="تم الحذف بنجاح";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
exit();
}
else
{
echo"<div class='topnav'><div class='left'><a href='updates.php?action=Add'>اضافة تحديث</a></div><div class='right'><a href='index.php'>الرئيسية</a></div></div><div><ul>هنا يمكنك إضافة جديد تحديث أو حذف أو تحرير القائمة التحديثات</ul></div>";
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}

echo"<div class='topnav'>التحديثات الموجودة</div>";
$query=mysql_query("SELECT * FROM b_updates ORDER BY id DESC") or mysql_error();
while($info=mysql_fetch_assoc($query))
{
//BBCODE
$prefix=smiley(cleanvalues2($prefix));
$prefix=bbcode($prefix);
$prefix=$info["prefix"];
$title=$info["title"];
$url=$info["url"];
$id=$info["id"];
echo"<ul><li><b>بادئة: </b>$prefix</li>
<li><b>Title: </b>$title</li><li><b>URL:</b> $url</li><li><a href='?action=Edit&id=$id'>تحرير</a> <br/><a href='?action=Delete&id=$id' style='align:right'>حذف</a></li></ul><br /> <br />";
}
}
include"../footer.php";

?>
