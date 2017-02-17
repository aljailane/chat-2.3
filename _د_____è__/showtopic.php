<?php
ERROR_REPORTING(0);
/*
Project: PBNL Forum 
*/
require("../init.php");
$id=(int)$_GET["id"];
if($id<1)
{ header("location: /forum/topics.php");
exit(); }
$level=user_info($user, level);
$username=user_info($user, username);
$rank=getrank($level);
//TOPIC DETAILS
$tquery=mysql_query("SELECT * FROM b_topics WHERE id=$id");
$tnum=mysql_num_rows($tquery);
if($tnum==0)
{ header("location: topics.php"); }
$tinfo=mysql_fetch_assoc($tquery);
$fid=$tinfo["forumid"];
$title=$tinfo["subject"];
$author=$tinfo["poster"];
$tmessage=$tinfo["message"];
$tmessage=bbcode($tmessage);
$tmessage=smiley($tmessage);
$locked=$tinfo["locked"];
$tdate=$tinfo["date"];
$tdate=date("h:i:s | Y/m/d", $tdate);
$tid=$tinfo["id"];
$coins=getworth($poster);
$hints=$tinfo["hints"]+6;
mysql_query("UPDATE b_topics SET hints='$hints' WHERE id='$tid'");
//FORUMS
$finfo=mysql_fetch_assoc(mysql_query("SELECT * FROM b_forums WHERE id=$fid"));
$fname=$finfo["name"];
$fid=$finfo["id"];
echo"<title>$config->title &raquo; منتديات | $title</title>";
echo"<style type='text/css'>
<!--
.style2 {
font-family: Arial, Helvetica, sans-serif;
color: #FF0000;
font-size: 12px;
}
.style3 {color: #FF0000}
.style5 {color: #FF0000; font-weight: bold; }
body,td,th {
font-family: Arial, Helvetica, sans-serif;
font-size: 13px;
}
-->
</style>

<div class='body_width'>";
include "../topnav.php";
echo"<div class='breadcrumb'><a href='../member/index.php'>الرئيسية</a> &raquo; <a href='index.php'>المنتديات</a> &raquo; <a href='topics.php?id=$fid'>$fname</a></div><br>";
echo"<center>";
include"../ads.php";
echo"</center>";

$amsg=$_GET["amsg"];
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
{ if(!isloggedin())
{ header("location: ../index.php"); }
else {
$topicid=cleanvalues($topicid);
$message=cleanvalues($message);
$insert=mysql_query("INSERT INTO b_replies SET poster='$poster', date='$date', topicid='$id', message='$message'");
mysql_query("UPDATE b_topics SET lastposter='$poster', lastpostdate='$date' WHERE id=$id");
if(!$insert)
{
$msg3="حدث خطأ";
}
else
{
$msg3="تم إضافة الرد بنجاح";
} }
echo"<div class='msg'>$msg3</div>";
}
}
//REPLIES
$self=$_SERVER["PHP_SELF"];
$rowsperpage=15;
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
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_replies WHERE topicid=$id"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$rquery=mysql_query("SELECT * FROM b_replies WHERE topicid=$id ORDER BY id Asc LIMIT $offset, $rowsperpage");
$rnum=mysql_num_rows($rquery);
echo"
</center>



<div style='margin-top: 5px;' class='grid3'>




</div>";
echo "<div class='right>
<div class='a5'>منتديات &raquo; $fname</div><div class='a5' align='right'>
<div id='info_post'>
<span class='ad1'>مشاهدات:$coins/ $hints</span>&nbsp; | &nbsp;<span class='ad1'>تعليقات: $numrows</span><div class='clearfix'></div>
</div>";
$uid=user_info($author, userID);
$coins=getworth($author);
If($level>0)
{
if($locked==0)
{
$link2="<a href='action.php?action=movetopic&tid=$tid'>نقل</a> - <a href='action.php?action=lock&id=$tid'>اغلاق</a>- <a href='action.php?action=edittopic&tid=$tid'>تعديل</a>";
}
else
{
$link2="<a href='action.php?action=movetopic&id=$tid'>نقل</a> - <a href='action.php?action=unlock&id=$tid'>فتح</a> - <a href='action.php?action=edittopic&id=$tid'>تعديل</a>";
}
}
echo "<div class=\"alj1\"><a href=\"../profile.php?uid=$uid\">$author</a> ($tdate)<br/><h3>$tmessage</h3><br/>$link2</div><br>
<p></p>
<hr>
<p>

<div class=\"info_post\"></div>
<h3 class=\"comment_header\"><font color=\"#ffffff\">الردود</h3></font>";

if($rnum==0)
{
echo"<div class='msg'>لا توجد أي ردود حتى الآن</div>";
}
else
{
while($rinfo=mysql_fetch_assoc($rquery))
{
$poster=$rinfo["poster"];
$topicid=$rinfo["topicid"];
$uid=user_info($poster, userID);
$pid=$rinfo["id"];
$message=$rinfo["message"];
$date=$rinfo["date"];
$date=date("h:i:s | Y/m/d", $date);
$coins=getworth($poster);
//BBCODE
$message=smiley(cleanvalues2($message));
$message=bbcode($message);
$link="<br><a href='action.php?action=delete&id=$pid&tid=$tid'><font color='red'>حذف</font></a> - <a href='action.php?action=edit&id=$pid&tid=$tid'>تعديل</a>";
$link0=" ";
$link4=($level>0) ? $link : $link0;
$query=mysql_fetch_array(mysql_query("SELECT * FROM b_topics WHERE id=$topicid"));
$subject=$query["subject"];
echo"<div id='posts' align='right'><a href='../profile.php?uid=$uid'>$poster</a> ($date)<br>$message<br>$link4</div>";
} echo "<br><div class=\"pager\">"; if($currentpage>1)
{ echo"<a href='$self?currentpage=1&id=$id'>[<b>الاقدم</b>]</a>";
$prevpage=$currentpage-1;
echo"<a href='$self?currentpage=$prevpage&id=$id'>[<b>السابق</b>]</a>";
}
for($x=($currentpage-$range); $x<(($currentpage+$range)+1); $x++)
{
if(($x>0) &&($x<=$totalpages))
{
if($x==$currentpage)
{
echo"[<font color='red'>$x</font>]";
}
else {
echo"<a href='$self?currentpage=$x&id=$id'>[<b>$x</b>]</a>";
}
}
} if($currentpage!=$totalpages)
{ $nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage&id=$id'>[<b>التالي</b>]</a>"; echo"<a href='$self?currentpage=$totalpages&id=$id'>[<b>الاحدث</b>]</a>"; } echo"</div><br>"; }
if($locked==0)
{ if(isloggedin())
{ echo "<span
class=\"style2\"><strong>=&gt;</strong>غير مقبول البريد العشوائي<br/>قد تفقد الحساب الخاص بك!</span><br>
<br>رد<form action='#' method='POST'><input type='hidden' name='topicid' value='$id'><input type='hidden' name='poster' value='$user'><textarea class='bbcode' rows='4' cols='26' name='message'></textarea><br/><input type='submit' name='submit' value='رد' class='button'></form><br/><center><a href=\"".$config->url."content/bbcode_ref.php\">BBCODE</a> | <a
href=\"".$config->url."content/smiley_ad.php\">
فيسات
</a>"; } else
{ echo "<span
class=\"style2\"><strong>=&gt;</strong>لانسمح بالرسائل العشوائية <br/>قد تفقدك حسابك</span><br>
<br>اضف رد<form action='#' method='POST'><input type='hidden' name='topicid' value='$id'><input type='hidden' name='poster' value='$user'><textarea rows='4' cols='26' name='message'></textarea>		 <script>
                CKEDITOR.replace( 'message' );
            </script>

<br/><input type='submit' name='submit' value='رد' class='button'></form></br><center><a href=\"".$config->url."content/bbcode_ref.php\">BBCODE</a> | <a
href=\"".$config->url."content/smiley_ad.php\">فيسات</a>"; } }
else {
echo"<div class='msg'><font color='red'><b>تم تأمين هذا الموضوع من قبل الادارة</b></font></div>";
}
echo"<br></div></div>";
include"../footer.php";
?>
