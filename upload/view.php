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
$id=(int)$_REQUEST["id"];
if($id<1)
{
header('location: index.php');
exit();
}
$cquery=mysql_query("SELECT * FROM b_upload WHERE id=$id");
if(mysql_num_rows($cquery)==0)
{
header("location: index.php");
exit();
}
$cinfo=mysql_fetch_array($cquery);
$name=$cinfo["name"];
$id=$cinfo["id"];
$description=$cinfo["description"];
$by=$cinfo["by"];
$date=$cinfo["date"];
$date=date("A- h:i:s | Y/m/d", $date);
$extension=$cinfo["extension"];
$downloads=$cinfo["downloads"];
$views=$cinfo["views"]+1;
mysql_query("UPDATE b_upload SET views='$views'");
$size=$cinfo["size"];
$size=get_size($size);
$catid=$cinfo["catid"];
$catinfo=mysql_fetch_assoc(mysql_query("SELECT name FROM b_uploadcat WHERE id='$catid'"));
$catname=$catinfo["name"];
echo"<title>$config->title &raquo; viewing $name</title>";
echo"<style type='text/css'>
<!--
.style1 {
color: #FF0000;
font-weight: bold;
}
.style2 {
color: #FFFF00;
font-family: Arial, Helvetica, sans-serif;
font-size: 13px;
}
.style5 {font-family: Arial, Helvetica, sans-serif; color: #FF0000;}
.style6 {
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
}
-->
</style>

<div class='body_width' align='right'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../member/index.php'>البدايه</a> &raquo; <a href='index.php'>تحميلات</a> &raquo; $name</div>";
echo"<center>";
include"../ads.php";

echo"</center>";
echo"<div class='b_head'>ملف  &raquo; $name</div>";
echo"<br><div class='alj1' align='right'>
<div class='bgreen'><a href='download.php?id=$id'><center>اضغـــط هنـــا للتنزيــــل</center></a></div><ul>
<li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li>
<li>
<b><span>الملف: $name</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><span class='style1'>الوصف:</span> $description</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li>تم الرفع: $date</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li>اضيفت بواسطة: $by</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li>القسم: $catname</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li>الحجم: $size - الاي دي: $id</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li>الصيغة: $extension</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li>المشاهدات: $views</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li> التنزيلات: $downloads</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li></ul></span></li></li></ul></div>";
echo"<div class='link_button'><a href='category.php?id=$catid'>رجوع</a></div>";

include"../footer.php";
?>
