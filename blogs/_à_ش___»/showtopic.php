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
$id=(int)$_GET["id"];
if($id<1||empty($id))
{
header("location: /blogs/topics.php");
exit();
}
$level=user_info($user, level);
//TOPIC DETAILS
$tquery=mysql_query("SELECT * FROM b_fbttopics WHERE id=$id");
$tnum=mysql_num_rows($tquery);
if($tnum==0)
{
header("location: topics.php");
}
$tinfo=mysql_fetch_assoc($tquery);
$cid=$tinfo["catid"];
$title=cleanvalues2($tinfo["title"]);
$tmessage=cleanvalues2($tinfo["subject"]);
$tmessage=bbcode($tmessage);
$tmessage=smiley($tmessage);
$locked=$tinfo["locked"];
$tdate=$tinfo["date"];
$tdate=date("D d M Y", $tdate);
$tid=$tinfo["id"];
$views=$tinfo["views"]+6;
mysql_query("UPDATE b_fbttopics SET `views`='$views' WHERE id='$tid'");
//CATEGORIES
$cinfo=mysql_fetch_assoc(mysql_query("SELECT * FROM b_fbtcat WHERE id=$cid"));
$cname=$cinfo["name"];
$cid=$cinfo["id"];
echo"<title>$config->title - مدونات &raquo; $title</title>";
echo"<div class='alj1'>";

include "../topnav.php";
echo"<div class='breadcrumb'><a href='../index.php'>البدايه</a> &raquo; <a href='../blogs'>المدونات</a> &raquo; <a href='topics.php?id=$cid'>$fname</a></div>";
echo"<center>";
include"../ads.php";

echo"</center>";
$amsg=cleanvalues2($_GET["amsg"]);
if(!empty($amsg))
{ echo"<div class='msg'>$amsg</div>";
}
if(isset($_POST["submit"]))
{
$poster=$_POST["poster"];
$topicid=$_POST["topicid"];
$message=$_POST["message"];
$date=time();
//CLEAN
if(strlen($message)<4 || empty($message))
{
echo"<div class='msg'>رسالتك قصيرة جداً</div>";
}
else
{
$topicid=cleanvalues($topicid);
$message=cleanvalues($message);
$insert=mysql_query("INSERT INTO b_fbtreplies SET poster='$poster', date='$date', topicid='$id', message='$message'");
if(!$insert)
{
$msg3="An error Occured";
}
else
{
$msg3="تم اضافة تعليق بنجاح";
}
echo"<div class='msg'>$msg3</div>";
}
}
//REPLIES
$self=$_SERVER["PHP_SELF"];
$rowsperpage=10;
$range=10;
if(isset($_GET["currentpage"]) && is_numeric($_GET["currentpage"]))
{
$currentpage=(int)$_GET["currentpage"];
}
else
{
$currentpage=1;
}
$offset=($currentpage-1)*$rowsperpage;
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_fbtreplies WHERE topicid=$id"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$rquery=mysql_query("SELECT * FROM b_fbtreplies WHERE topicid=$id ORDER BY id Asc LIMIT $offset, $rowsperpage");
$rnum=mysql_num_rows($rquery);
echo"<div class='grid3 middle'>
<div id='post-head'>$title<br/></div>
<div id='post-info'>
<span class='left'>تعليقات: $numrows</span> <span class='right'> مشاهدات: $views</span><br>
<span>نشرت في: $tdate<br>
<div style='clear: both;'></div>
</span></div>";
If($level==2)
{
if($locked==0)
{
$link2="<a href='action.php?action=movetopic&tid=$tid'>نقل</a> - <a href='action.php?action=lock&id=$tid'>قفل</a>- <a href='action.php?action=edittopic&tid=$tid'>تحرير</a>";
}
else
{
$link2="<a href='action.php?action=movetopic&id=$tid'>نقل</a> - <a href='action.php?action=unlock&id=$tid'>فتح</a> - <a href='action.php?action=edittopic&id=$tid'>تعديل</a>";
}
}
echo"<p>$tmessage</p>
<hr>
<p>

<div class=\"info_post\">أنا نحب دائماً واب العرب</div>
<h4 class='comment_header'>تعليقات</h4></div>";

if($rnum==0)
{
echo"<div class='msg'>لا توجد أي تعليقات حتى الآن</div>";
}
else
{
while($rinfo=mysql_fetch_assoc($rquery))
{
$poster=$rinfo["poster"];
$uid=user_info($poster, userID);
$pid=$rinfo["id"];
$message=$rinfo["message"];
$date=$rinfo["date"];
$date=date("D d M Y", $date);
//BBCODE
$message=smiley(cleanvalues2($message));
$message=bbcode($message);
$link="<a href='action.php?action=delete&id=$pid&tid=$tid'><font color='red'>Delete</font></a> - <div class='right'><a href='action.php?action=edit&id=$pid&tid=$tid'>Edit</a></div>";
$link0=" ";
$link4=($level>0) ? $link : $link0;
echo"<div class='tutorial-comment'>
<div class='tutorial-comment-info'><a href='../profile.php?uid=$uid'>$poster</a> $date</div><div class='tutorial-comment-text'>$message</div></div><br/>$link4";
}
if($currentpage>1)
{
echo"<a href='$self?currentpage=1&id=$id'>[<b>اقدم</b>]</a>";
$prevpage=$currentpage-1;
echo"<a href='$self?currentpage=$prevpage&id=$id'>[<b>اسبق</b>]</a>";
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
echo"<a href='$self?currentpage=$x&id=$id'>[<b>$x</b>]</a>";
}
}
}
if($currentpage!=$totalpages)
{
$nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage&id=$id'>[<b>التالي</b>]</a>";
echo"<a href='$self?currentpage=$totalpages&id=$id'>[<b>احدث</b>]</a>";
}
echo"<br>";
}
echo"<br><center><font color='red'><b>تحدير:</B></font> الرجاء عدم نسخ هذي المدونة إلى مواقع أخرى، أو مدونة او  منتدى! إذا اذا كنت تريد القيام بذلك، ضع وصلة المدونة $config-> بعد لصقها<br/>";
if($locked==0)
{
echo"تعليق<form action='#' method='POST'><input type='hidden' name='topicid' value='$id'><input type='hidden' name='poster' value='$user'><textarea rows='3' cols='20' name='message'></textarea><br/><input type='submit' name='submit' value='اضافة' class='button'></form></center><center>";
}
else
{
echo"<div class='msg'><font color='red'><b>تم تأمين هذا الموضوع من قبل المشرف</b></font></div><div class='gap'></div>";
}
echo"<br><a href='design.php'>اكواد bb</a> | <a href='smiles.php'>نشر الابتسامات</a></b></center><br>";
echo"<br><div class='link_button'><a href='index.php'>رجوع</a></div></div>";

include"../footer.php";
?>
