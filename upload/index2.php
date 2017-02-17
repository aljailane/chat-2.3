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
echo"<title>$config->title &raquo; تحميلات</title>";
echo"<style type='text/css'>
<!--
.style2 {
color: #FF0000;
font-weight: bold;
}
-->
</style>


<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>البداية</a> &raquo; مركز التحميل</div>";
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}
echo"<center>";
include"../ads.php";
echo"</center>";

echo"<div class='grid3 middle'>
<div class='b_head'>قسم تحميل الملف</div>";
echo"<br>
<img src='../images/software_installer.png' width='64' height='64'><ul>ابحث عن أي ملف أو صوره؟ <a href='search.php'><font color='red'><b>اضغط هنا</b></font></a><br></ul>";
$query=mysql_query("SELECT * FROM b_uploadcat ORDER BY id DESC");
$count=mysql_num_rows($query);
if($count>0)
{
while($row=mysql_fetch_array($query))
{ $name=$row["name"];
$id=$row["id"];
//$description=$row["description"];
$img=$row["img"];
if(!empty($img))
{
$img="<img src='$img' alt='$name' border='0' height='35' width='35'/>";
} else { $img="<img src='../images/folder.png' alt='$name' border='0' height='35' width='35'/>"; } echo"<ul class='file-cat-list'>
<li><a href='category.php?id=$id'>$img<br/><b>$name</b></a></li>"; } }
else
{ echo"<div class='msg'><font color='red'><center>لا يوجد قسم تم إنشاؤها بعد</center></font></div><div class='gap'></div>";
}
echo"<br>
<div class='link_button'><a href='../member/index.php'>رجوع</a></div>";
include"../footer.php";
?>
