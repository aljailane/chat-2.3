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
$cquery=mysql_query("SELECT * FROM b_uploadcat WHERE id=$id");
if(mysql_num_rows($cquery)==0)
{
header("location: index.php");
exit();
}
$cinfo=mysql_fetch_array($cquery);
$name=$cinfo["name"];
echo"<title>$config->title &raquo; $name</title>";
echo"<style type='text/css'>
<!--
.style2 {
color: #FF0000;
font-weight: bold;
}
-->
</style>

<div class='alj1'>";
include"../topnav.php";
echo"<div class='a'><a href='../member/index.php'>البدايه</a> &raquo; <a href='index.php'>مركز التحميل</a> &raquo; $name</div>";
echo"<center>";
include"../ads.php";

echo"</center>";
echo"<div class='ad1' align='right'>
<div class='b_head'>القسم &raquo; $name</div>";
$self=$_SERVER["PHP_SELF"];
$rowsperpage=10;
$range=7;
if(isset($_GET["currentpage"]) && is_numeric($_GET["currentpage"]))
{
$currentpage=(int)$_GET["currentpage"];
}
else
{
$currentpage=1;
}
$offset=($currentpage-1)*$rowsperpage;
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_upload WHERE catid=$id"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$sort=$_REQUEST["sort"];
if($sort==1)
{
$tquery=mysql_query("SELECT * FROM b_upload WHERE catid=$id ORDER BY id DESC LIMIT $offset, $rowsperpage");
}
elseif($sort==2)
{
$tquery=mysql_query("SELECT * FROM b_upload WHERE catid=$id ORDER BY id ASC LIMIT $offset, $rowsperpage");
}
elseif($sort==3)
{
$tquery=mysql_query("SELECT * FROM b_upload WHERE catid=$id ORDER BY downloads LIMIT $offset, $rowsperpage");
}
elseif($sort==4)
{
$tquery=mysql_query("SELECT * FROM b_upload WHERE catid=$id ORDER BY `views` LIMIT $offset, $rowsperpage");
}
else
{
$tquery=mysql_query("SELECT * FROM b_upload WHERE catid=$id ORDER BY id DESC LIMIT $offset, $rowsperpage");
}
if(mysql_num_rows($tquery)==0)
{
echo"<div class='msg'>لا توجد ملفات حتى الآن</div>";
}
else
{
echo"<ul><li><center>فرز حسب:</center></li><li> <form action='category.php?id=$id' method='POST'><center><select name='sort'><option value='1'>الأحدث أولاً</option><option value='2'>الأقدم أولاً</option><option value='3'>الاكثر تحميلا</option><option value='4'>الاكثر مشاهدة</option></select></center></li><li><center><input type='submit' value='فرز' class='button' name='submit'></center></li></ul></form>";
echo"<div class='title'><br><center>البحث عن أي ملف <font color='red'><a href='search.php'><b>اضغط هنا</b></a></font></center></div>";
while($info=mysql_fetch_assoc($tquery))
{
$fid=$info["id"];
$name=$info["name"];
echo"<div class='a5' align='right'>
<ul><li><img src=/upload/download.php?id=$fid' height='32' width='32' alt='no img' /> <a href='view.php?id=$fid'>$name</a></li></ul></div>"; }
if($currentpage>1)
{ echo" <a href='$self?currentpage=1&id=$id&sort=$sort'>[<b>الاقدم</b>]</a> ";
$prevpage=$currentpage-1;
echo" <a href='$self?currentpage=$prevpage&id=$id&sort=$sort'>[<b>سابق</b>]</a> ";
}
for($x=($currentpage-$range); $x<(($currentpage+$range)+1); $x++)
{
if(($x>0) &&($x<=$totalpages))
{
if($x==$currentpage)
{
echo" [<font color='red'>$x</font>] ";
}
else
{
echo" <a href='$self?currentpage=$x&id=$id&sort=$sort'>[<b>$x</b>]</a> ";
}
}
}
if($currentpage!=$totalpages)
{
$nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage&id=$id&sort=$sort'>[<b>التالي</b>]</a>";
echo"<a href='$self?currentpage=$totalpages&id=$id&sort=$sort'>[<b>الاحدث</b>]</a>";
}
}
echo"<br><div class='link_button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
?>
