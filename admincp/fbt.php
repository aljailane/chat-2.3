<?php 
/*
Project: Aljbook 1.0
*/
require("admit.php");
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
$query=mysql_query("DELETE FROM b_fbtcat WHERE id=$id");
if($query)
{
$msg="تم حذف القسم بنجاح";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
exit();
}
$id=(int)$_GET["id"];
echo"<div class='topnav'>نظام الانذار</div><div class='msg'>هل تريد حذف القسم؟</div><div class='gap'></div><div class='button'><a href='?action=Delete&yes=true&id=$id'><font color='red'>نعم</font></a> | <div class='right'><a href='fbt.php'>لا</a></div></div>";
}
elseif($action=="Edit")
{
$id=(int)$_GET["id"];
if(isset($_POST["submit"]))
{
$name=cleanvalues2($_POST["name"]);
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'>هو اسم حقل قسم فارغة أو أقل من 4</font></div>";
}
else
{
if(empty($_FILES["file"]) || $_FILES["file"]["size"]==0)
{
mysql_query("UPDATE b_fbtcat SET name='$name' WHERE id=$id") or die(mysql_error());
$msg="التغييرات تم حفظها بنجاح";
header("location: ?msg=$msg");
exit();
}
else
{
$folder="../images/";
$types=array('.jpg', '.gif', '.png', '.jpeg');
$img=$_FILES["file"]["name"];
$checkimg="../images/$img";
$ext=substr($img, strpos($img, '.'), strlen($img)-1);
if(!in_array($ext, $types))
{
echo"<div class='msg'>$ext ليس من نوع صورة صالحة</div>";
}
elseif(!file_exists($folder))
{
echo"<div class='msg'>المجلد غير موجود</div>";
}
elseif(file_exists($checkimg))
{
echo"<div class='msg'>صورة قيد الاستخدام بالفعل!</div>";
}
elseif(!is_writable($folder))
{
echo"<div class='msg'>المجلد غير قابل للكتابة</div>";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"], $folder.$img);
mysql_query("UPDATE b_fbtcat SET name='$name', img='$img' WHERE id=$id");
$msg="التغييرات محفوظة بنجاح";
header("location: ?msg=$msg");
}
}
}
}
$query=mysql_query("SELECT * FROM b_fbtcat WHERE id='$id'");
$info=mysql_fetch_array($query);
$name=$info["name"];
echo"<form action='?action=Edit&id=$id' method='POST' enctype='multipart/form-data'><div class='title'>تحرير قسم</div><ul><li>اسم القسم</br><input type='text' name='name' value='$name'></li><li>صورة القسم<br/><input type='file' name='file'></li><li><center><input type='submit' name='submit' class='button' value='حفظ'></center></li></ul></form>";
echo"<div class='button'><a href='fbt.php'>رجوع</a></div>";
exit();
}
elseif($action=="Add")
{
if(isset($_POST["submit"]))
{
$name=cleanvalues2($_POST["name"]);
$checkname=mysql_num_rows(mysql_query("SELECT * FROM b_fbtcat WHERE name='$name'"));
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'>هو اسم حقل الفئة فارغة أو أقل من 4</font></div>";
}
elseif($checkname>0) {
echo"<div class='msg'>يرجى اختيار اسم آخر</div>"; }
else
{
if(empty($_FILES["file"]) || $_FILES["file"]["size"]==0)
{
mysql_query("INSERT INTO b_fbtcat SET name='$name'") or die(mysql_error());
$msg="الفئة مكون بنجاح";
header("location: ?msg=$msg");
exit();
}
else
{
$folder="../images/";
$types=array('.jpg', '.gif', '.png', '.jpeg');
$img=$_FILES["file"]["name"];
$checkimg="../images/$img";
$ext=substr($img, strpos($img, '.'), strlen($img)-1);
if(!in_array($ext, $types))
{
echo"<div class='msg'>$ext ليس من نوع صورة صالحة</div>";
}
elseif(!file_exists($folder))
{
echo"<div class='msg'>المجلد غير موجود</div>";
}
elseif(file_exists($checkimg))
{
echo"<div class='msg'>صورة قيد الاستخدام بالفعل!</div>";
}
elseif(!is_writable($folder))
{
echo"<div class='msg'>المجلد غير قابل للكتابة</div>";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"], $folder.$img);
mysql_query("INSERT INTO b_fbtcat SET name='$name', img='$img' WHERE id=$id");
$msg="الفئة تم إنشاؤها بنجاح";
header("location: ?msg=$msg");
}
}
}
}
echo"<form action='?action=Add' method='POST' enctype='multipart/form-data'><div class='title'>إنشاء فئة</div><ul><li>اسم الفئة</br><input type='text' name='name'></li><li>صورة الفئة<br/><input type='file' name='file'></li><li><center><input type='submit' name='submit' class='button' value='إنشاء'></center></li></ul></form>";
echo"<div class='button'><a href='fbt.php'>Back</a></div>";
exit();
}
else
{
echo"<div class='topnav'><div class='left'><a href='fbt.php?action=Add'>إنشاء</a></div><div class='right'><a href='ftopics.php'>المواضيع Fbt</a></div></div><div class='gap'></div><div class='center'><ul>هنا يمكنك إنشاء فئات جديدة أو حذف أو تعديل فئات العلاج الأسري القائمة</ul></div>";
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}
$query=mysql_query("SELECT * FROM b_fbtcat ORDER BY id DESC") or mysql_error();
$count=mysql_num_rows($query);
echo"<div class='topnav'><b>فئات Fbt</b>($count)</div>";
if($count>0)
{
while($row=mysql_fetch_array($query))
{
$name=cleanvalues2($row["name"]);
$id=$row["id"];
$img=$row["img"];
if(!empty($img))
{
$img="<img src='/images/$img' height='20' width='20' alt='img' />";
}
else
{
$img="*";
}
echo"<ul><li>$img $name</li><li><a href='?action=Edit&id=$id'>تعديل</a> <div class='right'><a href='?action=Delete&id=$id'><font color='red'>حذف</font></a></li></ul>";
}
}
else
{
echo"<font color='red'><center>لا الفئة التي تم إنشاؤها بعد</center></font><div class='gap'></div>";
}
echo"<div class='button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
}
?>
