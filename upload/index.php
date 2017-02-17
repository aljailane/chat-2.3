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
echo"<title>$config->title &raquo; مركز التحميل</title>";
echo"<style type='text/css'>

<!--

.style1 {

color: #FF0000;

font-weight: bold;

}

.style2 {color: #FF0000}

-->

</style>

<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../member/index.php'>البداية</a> &raquo; التحميلات</div>";
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}
echo"<center>";
include"../ads.php";

echo"</center>";

echo"<div class='grid3 middle'>
<div class='b_head'>
منطقة التحميل والتنزيل المجانيه
</div>
<br>
<span class='style2'>استمتع بأفضل ما في منطقتنا للتحميل! تحميل حقيقي حقاً.</span>
<br>
<br>

";
echo"<div class='list'>  <ul>    <li><img src='".$config->url."addons/dload/upload-icon.png' width='16' height='16'> <a href='upload.php'>ارفع ملف جديد</a></li><li><img src='".$config->url."addons/dload/download-icon.png' width='16' height='16'> <a href='index2.php'>تصفح التحميلات المرفوعة</a></li><li><img src='".$config->url."addons/dload/search.gif' width='16' height='16' border='0'> <a href='search.php'>ابحث عن ملف</a></li></ul></div> ";
echo"<br /><div class='link_button'><a href='".$config->url."index.php'>رجوع</a></div>";
include"../footer.php";
?>
