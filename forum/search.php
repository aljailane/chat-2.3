<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php");
if(!isloggedin())
{ header("location: ../index.php"); }
else { $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo; بحث عن موضوع</title>";
echo"<style type='text/css'>
<!--
.style2 {font-size: 12px; font-family: Arial, Helvetica, sans-serif;}
.style4 {color: #FF0000; font-family: Arial, Helvetica, sans-serif; font-size: 12px; font-weight: bold; }
.style5 {
color: #FF0000;
font-weight: bold;
}
-->
</style>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<center>";
include"../ads.php";
echo"</center>
<div style='margin-top: 5px;' class='grid3'</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>البحث عن مواضيع المنتدى</div>";
echo"<br><!-- google_afm --><br>
<span class='style4'>&gt;&gt; </span><span class='style2'>بحث عن أي موضوع المنتدى عن طريق استخدام كلمة واحدة <span class='style5'>ا.ب.ت</span> ربما شخص مكون من الموضوع: <u><strong>كيفية تناول الطعام من دون اليد</strong></u>, يمكنك البحث عن <span class='style5'>أكل</span>, وسوف تحصل عليه.</span> <br>
<br>";
echo"<form action='#' method='POST'><ul><li><input type='text' name='q' /></li><li><center><input type='submit' name='submit' value='البحث عن' class='button'></center></li></ul>";
$q=$_REQUEST["q"];
if(isset($q) && !empty($q))
{
$q=trim($q);
$q=cleanvalues($q);
$q=strtoupper($q);
//echo"you searched for $q";
//$u="is";
$self=$_SERVER["PHP_SELF"];
$rowsperpage=2;
$range=2;
if(isset($_GET["currentpage"]) && is_numeric($_GET["currentpage"]))
{
$currentpage=(int)$_GET["currentpage"];
}
else
{
$currentpage=1;
}
$offset=($currentpage-1)*$rowsperpage;
$numrows=mysql_num_rows(mysql_query("SELECT * from b_topics WHERE UPPER(subject) LIKE '%$q%' OR UPPER(subject) LIKE '%$q' OR UPPER(subject) LIKE '$q%'"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$query=mysql_query("SELECT * from b_topics WHERE UPPER(subject) LIKE '%$q%' OR UPPER(subject) LIKE '%$q' OR UPPER(subject) LIKE '$q%' LIMIT $offset, $rowsperpage");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>لا توجد نتيجة العثور على</div>";
}
else
{
echo"<div class='title'><center>نتائج البحث عن$q</center></div><div class='gap'></div>";
while($info=mysql_fetch_assoc($query))
{
$title=cleanvalues2($info["subject"]);
$id=$info["id"];
echo"<ul><a href='showtopic.php?id=$id'>$title</a></ul><div class='gap'></div>";
}
if($currentpage>1)
{
echo"<a href='$self?currentpage=1&q=$q'>[<b>الاقدم</b>]</a>";
$prevpage=$currentpage-1;
echo"<a href='$self?currentpage=$prevpage&q=$q'>[<b>السابق</b>]</a>";
}
for($x=($currentpage-$range); $x<(($currentpage+$range)+1); $x++)
{
if(($x>0) &&($x<=$totalpages))
{
if($x==$currentpage)
{
echo"[<font color='red'>$x</font>]";
}
else
{
echo"<a href='$self?currentpage=$x&q=$q'>[<b>$x</b>]</a>";
}
}
}
if($currentpage!=$totalpages)
{
$nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage&q=$q'>[<b>التالي</b>]</a>";
echo"<a href='$self?currentpage=$totalpages&q=$q'>[<b>الاحدث</b>]</a>";
}}
}

echo"<br>
<br>
<div class='link_button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
?>
