<?php
ERROR_REPORTING(0);
/*
Project: PBNL Forum v2.3.5

Coded By: Adegboye Joshua (JOSHUAEASY)

Facebook: http://facebook.com/JOSHUAEASY

Email: (adegboyejoshua@gmail.com)

CellPhone +2348137536702

Twitter: @herdaywhaley

WebSite: http://www.9jatech.tk
*/
require("../init.php");
if(!isloggedin())
{ header("location: ../index.php"); }
else
{
$user=$_SESSION["user"];
}
echo"<title>$config->title - عرض رسالة </title>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='index.php'>الرسائل</a> </div>";
echo"<center>";
include"../ads.php";
fblike();

echo"</center>";
echo"<center>

<div class='public_message'><div class='success'></div></div>

</center>



<div style='margin-top: 5px;' class='grid3'>




</div>";
$ref=$_GET["ref"];
if($ref=="outbox")
{
$pid=(int)$_GET["id"];
//echo"$pid";
$pm=mysql_query("SELECT * FROM b_pms WHERE id=$pid");
$pminfo=mysql_fetch_assoc($pm);
$ruser=$pminfo["sender"];
//echo"$ruser";
if($ruser!=$user)
{
$msg="أنت تحاول التسلل إلى رسالة شخص ما؟... تم تسجيل العمل الخاص بك وسوف يعاد النظر قبل مدراء";
//echo"$msg";
header("location: index.php?msg=$msg");
}
else
{
$subject=cleanvalues2($pminfo["subject"]);
$reciever=cleanvalues2($pminfo["reciever"]);
$sid=user_info($reciever, userID);
$id=cleanvalues2($pminfo["id"]);
$message=cleanvalues2($pminfo["message"]);


echo"<div class='title'><center>الصادرة &raquo; $subject</center></div><br/><ul><center><a href='../profile.php?uid=$sid'><b>$reciever</b></a><br/>$message<br/><div class='button'><a href='sent.php'>رجوع للخلف</a></title><div class='gap'></div>";
include"../footer.php";
}
exit();
}
if(isset($_GET["mode"]) && $_GET["mode"]=="delete")
{
$id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_pms WHERE id=$id AND reciever='$user'");
if(!$query)
{
echo"<div class='msg'>حدث خطأ، يرجى المحاولة مرة أخرى</div>";
}
else
{
$msg="تم الحذف بنجاح";
header("location: index.php?msg=$msg");
exit();
}
}
$pid=$_GET["id"];
//echo"$pid";
$pm=mysql_query("SELECT * FROM b_pms WHERE id=$pid");
$pminfo=mysql_fetch_assoc($pm);
$ruser=$pminfo["reciever"];
//echo"$ruser";
if(strcasecmp($ruser, $user)!=0)
{
$msg="أنت تحاول التسلل إلى شخص ما رسالة؟..تم تسجيل العمل الخاص بك وسوف يعاد النظر قبل مدراء";
//echo"$msg";
header("location: index.php?msg=$msg");
}
else
{
mysql_query("UPDATE b_pms SET hasread='1' WHERE id='$pid' AND reciever='$user'");
$subject=cleanvalues2($pminfo["subject"]);
$sender=cleanvalues2($pminfo["sender"]);
$sid=user_info($sender, userID);
$id=$pminfo["id"];
$message=cleanvalues2($pminfo["message"]);
$message=smiley($message);
//Previous msg
$user=$_SESSION["user"];
//echo"$user";
$query=mysql_query("SELECT * FROM b_pms WHERE reciever='$user' AND sender='$sender'  OR sender='$user' AND reciever='$sender'");
$pmcount=mysql_num_rows($query);
echo"<div class='grid3 middle'>
<div class='b_head'>الوارد &raquo; $subject</div><div class='message-view'><a href='../profile.php?uid=$sid'><b>$sender:</b></a><br>$message</div></center><br/>";
if($pmcount>0)
{
echo"<div class='previous-messages'>الرسائل السابقة</div>";
while($info=mysql_fetch_assoc($query))
{
$psender=$info["sender"];
$pmessage=$info["message"];
$psid=user_info($sender, userID);
echo"<div class='message-thread'><span class='thread_user'><a href='../profile.php?uid=$psid'> $psender</a>/ $pmessage</span><br></div>";
}
}
if(isset($_POST["submit"]))
{
$rname=$sender;
$sname=$user;
$message=$_POST["message"];
$subject=$_POST["subject"];
if(empty($message) || strlen($message)<4)
{
echo"<div class='msg'>رسالتك قصيرة جداً</div>";
}
else
{
$date=time();
$insert=mysql_query("INSERT INTO b_pms SET `reciever`='$rname', `sender`='$sname', `date`='$date', `subject`='$subject', `message`='$message'");
if(!$insert)
{
$msg="An error occurred";
}
else
{
$msg="تم ارسال الرسالة بنجاح";
}
header("location: index.php?msg=$msg");
exit();
}
}
echo"<div class='title' align='right'><center><a href='?id=$id&mode=delete'>حذف الرسالة</a><br><br>رد:<br><br></div><li><form action='#' method='POST'><textarea name='message' ></textarea><input type='hidden' name='subject' value='رد:$subject'></li><li><br><input type='submit' name='submit' class='button' value='ارسال'></form><br></center></ul><br>";
}
echo"<div class='link_button'><a href='inbox.php'>رجوع</a></div>";
include"../footer.php";
?>
