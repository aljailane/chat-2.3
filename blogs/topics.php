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
$level=user_info($user, level);
$id=(int)$_GET["id"];
if($id<1)
{
header('location: index.php');
exit();
}
$cquery=mysql_query("SELECT * FROM b_fbtcat WHERE id=$id");
if(mysql_num_rows($cquery)==0)
{
header("location: index.php");
exit();
}
$cinfo=mysql_fetch_array($cquery);
$name=$cinfo["name"];
echo"<title>$config->title - $name</title>";
echo"<style type='text/css'>
<!--
.style2 {font-size: 13px; color: #FF0000; font-family: Arial, Helvetica, sans-serif;}
-->
</style>
<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>Home</a> &raquo; <a href='index.php'>Fbt</a> &raquo; $name</div>";
echo"<center>";
include"../ads.php";

echo"</center>";
echo"<div class='grid3 middle'>
<div class='b_head'>تدوينات &raquo; $name</div><br>";
if($_GET["action"]=="add")
{
$id=$_GET["id"];
if($_POST["submit"])
{
$title=cleanvalues($_POST["title"]);
$subject=cleanvalues($_POST["subject"]);
$errors=array();
if(empty($title)|| strlen($title)<4)
{
$errors[]="العنوان الخاص بك قصيرة جداً";
}
if(empty($subject)||strlen($subject)<4)
{
$errors[]="المحتوى الخاص بك قصيرة جداً";
}
if(count($errors)==0)
{
$date=time();
$query=mysql_query("INSERT INTO b_fbttopics SET title='$title', subject='$subject', date='$date', catid=$id");
if(!$query)
{
$msg="حدث خطأ";
}
else
{
$msg="تم بنجاح إنشاء الموضوع";
}
header("location: index.php?msg=$msg");
}
else
{
foreach($errors as $error)
{
$string.="$error<br/>";
}
}
}
if($string!==" "){
echo"<div class='msg'>$string</div>";
}
echo"<div class='msg'><br><span class='style2'><b>الرجاء نشر تدوينات مفيدة دائماً</b></span><br></div>";
echo"<form action='#' method='post'><center><ul><li><center>عنوان<br/><input type='text' name='title'></li><li>وصف<br/><textarea name='subject'></textarea></li><li><input type='submit' name='submit' class='button' value='انشاء'></li></ul></center><br/><div class='link_button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
//echo"مرحبا هذا هو المعرف الخاص بك $id";
exit();
}

$self=$_SERVER["PHP_SELF"];
$rowsperpage=7;
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
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_fbttopics WHERE catid=$id"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$tquery=mysql_query("SELECT * FROM b_fbttopics WHERE catid=$id ORDER BY id DESC LIMIT $offset, $rowsperpage");
if(mysql_num_rows($tquery)==0)
{
echo"<div class='msg'>لا توجد تدوينات بعد</div>";
}
else
{
echo"
<span class='style2'>انقر فوق أي من تدوينات أدناه لأعلامنا تحديث القرص!</span> <br>
<br>";
while($info=mysql_fetch_assoc($tquery))
{
$tid=$info["id"];
$title=$info["title"];
echo"<div class='a5'>   <ul>    <li>  <div class='ad2'><a href='showtopic.php?id=$tid'><b>$title</b></a></div></div><li></ul>";
}
if($currentpage>1)
{
echo"<a href='$self?currentpage=1'>[<b>اقدم</b>]</a>";
$prevpage=$currentpage-1;
echo"<a href='$self?currentpage=$prevpage'>[<b>سابق</b>]</a>";
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
echo"<a href='$self?currentpage=$x'>[<b>$x</b>]</a>";
}
}
}
if($currentpage!=$totalpages)
{
$nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage'>[<b>تالي</b>]</a>";
echo"<a href='$self?currentpage=$totalpages'>[<b>احدث</b>]</a>";
}
}
if($level==2)
echo"<br><br><center><a class='button' href=?action=add&id=$id>انشاء مدونتگ الخاصة</a></center>";
echo"<br><div class='link_button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
?>
