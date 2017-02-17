<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/ ?><div class="alj1">
<?php
if(isloggedin())
{
?>

<?php
$username=user_info($user, username);
$uid=user_info($user, userID);
$level=user_info($user, level);
$status=cleanvalues2(user_info2($uid, status));
$position=user_info($user, position);
$school=user_info($user, school);
$ip=$_SERVER['REMOTE_ADDR'];
mysql_query("UPDATE
b_users SET ip='$ip' WHERE username='$username'");
$pm=mysql_num_rows(mysql_query("SELECT * FROM b_pms WHERE reciever='$username' AND hasread=0"));
echo"<div class='a5' style='padding: 13px;'>
<a href='../mail/inbox.php'>الرسائل الخاصة (<font color='#ff0000'><b>$pm</b></font>)</a>
<br>
<span class='d_board_right'><a href='../index.php'>البداية</a> | <a href='../member/settings.php'>اعدادات الحساب</a> | <a href='../music/upload.php'>تحميل الموسيقى</a> | <a href='../logout.php'>تسجيل خروج</a>";
if($level==2)
{ echo "<br>&nbsp; [<a href=\"../admincp/index.php\" style=\"color:red\"><b>دخول الادمن</b></a>]";
}if($level==1)
{ echo "&nbsp;| <a href=\"../modcp/index.php\" style=\"color:white\"><b>برج المراقبة</b></a>"; } echo"</div></span>";
$query=mysql_fetch_assoc(mysql_query("SELECT * FROM b_settings"));
$option=$query["shout"];
if($option=="0")
{ shoutbox(); }
echo"</dv>";?> <?php } else {
?> مرحبا بك يا
 <b> زائــر</b> ارجو منك <a href='../register.php'> <b>التسجيل</b></a> او  <a href='../index.php'><b>الدخول</b></a> لتستمتع بخدماتنا<?php } ?>
