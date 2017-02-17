<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/ ?><div class="page_wrapper">
<?php
if(isloggedin())
{
?>
<?php
$username=user_info($user, username);
$uid=user_info($user, userID);
$level=user_info($user, level);
$position=user_info($user, position);
$school=user_info($user, school);
$pm=mysql_num_rows(mysql_query("SELECT * FROM b_pms WHERE reciever='$username' AND hasread=0"));
echo"<div class='a5' style='padding: 13px;'>
<span class=''>مرحبا بك يا, <a href='../profile.php?uid=$uid'>$username</a> 
<br>
</span><span class='d_board_right'><a href='../index.php'>الرئيسية</a> | <a href='../member/settings.php'>اعدادات</a> | <a href='../mail/inbox.php'>الرسائل الخاصة (<font color='#ff0000'><b>$pm</b></font>)</a> <br> <a href='../content/bbcode_ref.php'>اكواد للرسائل</a> | <a href='../content/smiley_ad.php'>فيسات</a> |<a href='../logout.php'>تسجيل خروج</a>";
if($level==2)
{ echo "&nbsp;<br> (<a href=\"../admincp/index.php\" style=\"color:red\"><b>دخول الادمن</b></a>)";
} echo"</div></span>";
$query=mysql_fetch_assoc(mysql_query("SELECT * FROM b_settings"));
$option=$query["shout"];
if($option=="0")
{ shoutbox(); }
echo"</dv>";?> <?php } else {
?> اهلا بگ يا 
<b> زائـر</b> ارجو منك <a href='../register.php'> <b>تسجيل اشتراك </b></a> او  <a href='../index.php'><b>الدخول</b></a> للاستمتاع بخدماتنا المجانيه<?php } ?>
