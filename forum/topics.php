<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php");
{ header(''); }
{ $user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==1) { header("");
exit(); }
else {
updateonline(); } }
$id=(int)$_GET["id"];
if($id<1)
{ header('location: index.php');
exit(); }
$num=get_row("SELECT * FROM b_forums WHERE id=$id");
if($num==0)
{ header('');
exit(); }
$query=mysql_fetch_array(mysql_query("SELECT * FROM b_forums WHERE id=$id"));
$name=$query["name"];
echo"<title>$config->title &raquo; Forum | $name</title>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../member/index.php'>الرئيسية</a> &raquo; <a href='index.php'>منتديات</a></div><br>";
echo"<center>";
include"../ads.php";

echo"</center>";
echo"<div class='grid3 middle'>
<div class='b_head'>منتديـــات &raquo; $name</div>";
$action=$_GET["action"];
if($action=="add")
{ $id=$_GET["id"];
if($_POST["submit"])
{
$title=$_POST["title"];
$message=$_POST["message"];
//clean
$title=cleanvalues($title);
$message=cleanvalues($message);
$errors=array();
if(empty($title)|| strlen($title)<4)
{
$errors[]="العنوان الخاص بك قصير جداً";
}
if(empty($message)||strlen($message)<4)
{
$errors[]="المحتوى الخاص بك قصير جداً";
}
if(count($errors)==0)
{ if(!isloggedin())
{ header("location: ../index.php"); }
else {
$date=time();
$query=mysql_query("INSERT INTO b_topics SET poster='$user', lastpostdate='$date', lastposter='$user', subject='$title', message='$message', date='$date', forumid=$id");
if(!$query)
{
$msg="حدث خطأ";
}
else
{
$msg="تم إنشاء موضوع بنجاح";
}
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
echo"<div class='msg'><br><span class='style1'><strong>تحذير</strong></span><p><span class='style1'><b>.</b> </span>نرجو تنسيق المواضيع حسب المنتدى المخصص لها<br>

<span class='style1'><b>.</b></span> 
بخصوص الدعم ابدأ اسأل أي عضو طلب اذا لم تجدة قدم طلبك.</div>";
echo"<form action='#' method='post'><center><ul><li><center>عنوان<br/><input type='text' name='title'></li><li>موضوعگ<br/><textarea name='message'></textarea></li><li><input type='submit' name='submit' class='button' value='انشاء'></li></ul></center><br/><div class='link_button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
//echo"hello this is your id $id";
exit();
}


$self=$_SERVER["PHP_SELF"];
$rowsperpage=10;
$range=7;
if(isset($_GET["currentpage"]) && is_numeric($_GET["currentpage"])) { $currentpage=(int)$_GET["currentpage"]; } else { $currentpage=1; } $offset=($currentpage-1)*$rowsperpage;
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_topics WHERE forumid=$id"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages) { $currentpage=$totalpages; }
if($currentpage<1) {$currentpage=1; } $query2=mysql_query("SELECT * FROM b_topics WHERE forumid='$id' ORDER BY lastpostdate DESC LIMIT $offset, $rowsperpage");
$num=mysql_num_rows($query2); if($num==0)
{ echo"<div class='msg'>لا توجد مواضيع بعد</div>"; }
else { echo"<br><div class='center'><span class='style18'></span></div><br><br>
";
while($info=mysql_fetch_array($query2)) { $title=cleanvalues2($info["subject"]);
$id2=cleanvalues2($info["id"]); $author=cleanvalues2($info["poster"]);
$aid=user_info($author, userID);
$date=cleanvalues2($info["date"]);
$lastposter=cleanvalues2($info["lastposter"]);
$forumid=cleanvalues2($info["forumid"]);
$bid=user_info($lastposter, userID);
$lastpostdate=cleanvalues2($info["lastpostdate"]);
$date=date(' h:i:s | Y/m/d', $date); if(empty($lastposter))
{ $lastposter="---"; $lastpostdate=" "; }
else { $lastposter="اخر رد  
<a href='../profile.php?uid=$bid'>$lastposter </a>&nbsp;"; $lastpostdate=@date('h:i:s | Y/m/d', $lastpostdate); }
$query=mysql_fetch_array(mysql_query("SELECT * FROM b_forums WHERE id=$forumid"));
$name=$query["name"];
echo "<div class='alj1' align='right'><ul><li class='a5'><a href=showtopic.php?id=$id2><font color=\"#cc0000\"
style=\"text-transform:uppercase; font-weight:bold\">$title</font></a></li><li>
بواسطة
  <a href='../profile.php?uid=$aid'>$author       </a>&nbsp; ($date) <br/>$lastposter ($lastpostdate)</li><br></ul>
</div>";
} if($currentpage>1) { echo " <a href='$self?id=$id&currentpage=1'>[<b>اقدم</b>]</a> "; $prevpage=$currentpage-1;
echo" <a href='$self?id=$id&currentpage=$prevpage'>[<b>سابق</b>]</a> "; } for($x=($currentpage-$range); $x<(($currentpage+$range)+1); $x++) { if(($x>0) &&($x<=$totalpages)) { if($x==$currentpage)
{ echo" [<font color='red'>$x</font>] ";
} else { echo" <a href='$self?id=$id&currentpage=$x'>[<b>$x</b>]</a> "; } } } if($currentpage!=$totalpages) { $nextpage=$currentpage+1; echo" <a href='$self?id=$id&currentpage=$nextpage'>[<b>تالي</b>]</a> "; echo" <a href='$self?id=$id&currentpage=$totalpages'>[<b>احدث</b>]</a> "; } } echo"<br/><br><div class='link_button'><a href=?action=add&id=$id>انشاء موضوعك الان</a></div><div class='gap'></div>";
include"../footer.php";
?>
