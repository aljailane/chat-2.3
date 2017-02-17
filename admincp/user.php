<?php
include('monit.php');
/*
Project: Aljbook 1.0
*/
echo "<title>$config->title &raquo; Admin Menu</title>"; if(isset($_GET["action"])) { $action=$_GET["action"]; }
else { $action=" "; }
if($action=="Delete")
{ if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_users WHERE userID=$id");
if($query)
{ $msg="تم حذف العضو بنجاح"; }
else { $msg=mysql_error(); }
header("location: ?msg=$msg");
exit(); }
$id=(int)$_GET["id"];
echo"<div class='topnav'>تحذير النظام</div><div class='msg'>هل انت متأكد من حذف العضوية</div><div class='gap'></div><div class='button'><a href='?action=Delete&yes=true&id=$id'><font color='red'>نعم</font></a> | <a href='user.php'>لا</a></div>"; }
elseif($action=="pm") { if(isset($_POST["submit"])) { $message=cleanvalues($_POST["message"]); $reciever=cleanvalues($_POST["reciever"]);
if(empty($message) || strlen($message)<4)
{ echo"<div class='center'><font color='red'>الرجاء إدخال رسالتك</font></div>"; } else {
if($reciever=="1")
{ $query=mysql_query("SELECT * FROM b_users WHERE level=1"); } elseif($reciever=="2") { $query=mysql_query("SELECT * FROM b_users WHERE level=2"); } else
{ $query=mysql_query("SELECT * FROM b_users"); } $sname="$config->owner";
$subject="رسالة من مدير النظام";
$date=time();
$message.="<br/><b><font color=\"red\">ملاحظة:</font></b> عدم الرد على هذه الرسالة...";
while($info=mysql_fetch_assoc($query)) { $rname=$info["username"];
mysql_query("INSERT INTO b_pms SET `reciever`='$rname', `sender`='$sname',
`subject`='$subject', `message`='$message', `date`='$date'") or mysql_error(); }
$msg="وقد تم إرسال رسالتك بنجاح"; header("location: index.php?msg=$msg"); } }
echo "<br/><div class='b_head'>رسالة عامة</div><ul><div class='msg'>الرجاء إرسال الرسائل العامة بحكمة</div><li><form action='?action=pm' method='POST'>ادخل رسالتگ<br/><textarea rows='4' name='message'></textarea></li><li>لمن تريد رسالتگ<br><select name='reciever'><option value='0'>كل الاعضاء</option><option value='1'>مسئولين فقط </option><option value='2'>للادمن فقط</option></select></li><li><center><input name='submit' value='ارســـال' class='button' type='submit'></center></li></ul></form><br>"; } elseif($action=="rank")
{ $id=(int)$_GET["id"];
if(isset($_POST["submit"])) { $level=(int)$_POST["level"];
$rank=getrank($level);
mysql_query("UPDATE b_users SET level='$level' WHERE userID=$id") or die(mysql_error());
$msg="ترقية العضو الئ $rank بنجاح";
header("location: ?msg=$msg");
exit(); }
$username=user_info2($id, username);
$img=user_info2($id, photo); $level=user_info2($id, level);
$rank=getrank($level);
echo "<br/><div class='b_head'>ترقية المستخدم &raquo; $username</div><ul><div class='center'>ارجو التيقن عند ترقية العضو</div><li><div class='center'>بيانات</li><li>الاسم: $username</li><li>الرتبة الحالية: <font color='red' size='5'>$rank</font></li></ul>";
echo"<form action='#' method='POST'><ul><li>تحديد رتبة<br/><select name='level'><option value='0'>مستخدم عادي</option><option value='1'>مسئول عام</option><option value='2'>الادمن</option></select></li><li><center><input type='submit' name='submit' value='ترقية' class='button'></li></ul></form>"; }
elseif($action=="UnBan")
{ if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("UPDATE b_users SET banned='0' WHERE userID=$id"); if($query)
{
$msg="تم تفعيل العضو بنجاح";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
exit();
}
$id=(int)$_GET["id"];
echo"<div class='topnav'>نظام الانذار</div><div class='msg'>هل أنت متأكد من انك تريد رفع الحظر هذا المستخدم؟</div><div class='gap'></div><div class='button'><a href='?action=UnBan&yes=true&id=$id'><font color='red'>نعم</font></a> | <a href='user.php'>لا</a></div>";
}
elseif($action=="Ban")
{ if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("UPDATE b_users SET banned='1' WHERE userID=$id"); if($query) { $msg="User Has Been Banned Successfuly"; } else { $msg=mysql_error(); } header("location: ?msg=$msg"); exit(); } $id=(int)$_GET["id"];
echo"<div class='topnav'>نظام الإنذار</div><div class='msg'>هل تريد ابعاد هذا المستخدم؟</div><div class='gap'></div><div class='button'><a href='?action=Ban&yes=true&id=$id'><font color='red'>نعم</font></a> | <a href='user.php'>لا</a></div>"; } else
{ echo"<ul><div class='center'>تريث عند اختيارك احد هذي الخيارات</div></ul><a href='searchanddeleteusers.php'>بحث وحذف الاعضاء</a><br>";
$msg=$_GET["msg"];
if(!empty($msg))
{ echo"<div class='msg'>$msg</div>"; }
if(isset($_GET["page"]) && is_numeric($_GET["page"])) { $page=(int)$_GET["page"]; }
else { $page=1; }
$max=10;
$offset=($page-1)*$max;
if($_GET["show"]=="mod") { $result=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE level=1"));
$total=ceil($result/$max);
if($page<1){ $page=1; } if($page>$total){ $page=$total; } } else
{ $result=mysql_num_rows(mysql_query("SELECT * FROM b_users"));
$total=ceil($result/$max);
if($page<1){ $page=1; } if($page>$total){ $page=$total; } }
if($_GET["show"]=="mod") { echo "<div class=\"b_head\"><b>قائمة المشرفين</b></div><br/><div class=\"topnav\"><a href='?'>قائمة الاعضاء</a></div>";
$query=mysql_query("SELECT * FROM b_users WHERE level=1 LIMIT $offset, $max"); } else { echo "<div class=\"b_head\"><b>قائمة المستخدمين</b></div><br/><div class=\"topnav\"><a href='?show=mod'>المشرفون</a></div>";
$query=mysql_query("SELECT * FROM b_users ORDER BY userID LIMIT $offset, $max"); }
$num=mysql_num_rows($query); if($num==0)
{ echo "<div class='msg'>لا يوجد عضو</div>"; }
else { $i=0;
while($uinfo=mysql_fetch_assoc($query)) { $i=$i+1;
$id=$uinfo["userID"];
$username=$uinfo["username"];
$level=$uinfo["level"];
$recent=date("U")-900; $onlinecheck=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE userID='$id' AND lasttime>'$recent'"));
if($onlinecheck>0) { $st=" <font color=\" green\">&bull;</font> "; } else {
$st=" <font color=\" red\">&bull;</font> "; } $ban=$uinfo["banned"]; if($ban=='0') { $b="<a href='?action=Ban&id=$id'>حظر العضو</a>"; } else { $b="<a href='?action=UnBan&id=$id'>تفعيل العضو</a>"; } //$level=get_rank($level);
if($username=="Administrator") { continue; }
echo "<div class=\"user-info\"><ul><li>[$id] $st $username<br/><a href='?action=rank&id=$id'>ترقية العضو</a> - $b - <a href='?action=Delete&id=$id'>حذف العضو</a> - <a href='../profile.php?uid=$id'>مـلف العضو</a></li></ul></div>"; }
if($page>1) { $prev=$page-1;
echo" <a href='?page=$prev'>[<b>السابق</b>]</a> ";
} if($page<$total) { $next=$page+1;
echo" <a href='?page=$next'>[<b>Next</b>]</a> "; } } } echo "<br/><div class=\"link_button\"><a href=\"user.php\">رجوع</a></div>";
include "../footer.php";
?>
