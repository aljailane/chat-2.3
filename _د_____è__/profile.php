<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("init.php");
if(!isloggedin())
{ header('location: index.php'); }
else { $user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==1) { header("location: logout.php"); exit(); }
else { updateonline(); } } echo"<style type='text/css'>
<!-- .style1 {
color: #FF0000;
font-weight: bold;
font-family: Arial, Helvetica, sans-serif;
font-size: 13px;
} .style7 {color: #FFFFFF} --> </style> <div class='' align='right'>";
include "topnav.php";
$uid=(int)$_GET["uid"];
$checkid=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE userID=$uid"));
if(empty($uid)||$checkid<1) { header('Location: index.php'); } $username=cleanvalues2(user_info2($uid, username));
$status=cleanvalues2(user_info2($uid, status));
$lasttime=cleanvalues2(user_info2($uid, lasttime));
$lasttime2=date(" h:i:s | Y/m/d", $lasttime); $sex=user_info2($uid, sex);
$position=user_info2($uid, position); $about=user_info2($uid, note);
$regtime=user_info2($uid, regtime); $regtime=date(" h:i:s | Y/m/d", $regtime); $avatar=user_info2($uid, photo); $country=user_info2($uid, country); $name=user_info2($uid, name); $city=user_info2($uid, city);
$school=user_info2($uid, school); $level=user_info2($uid, level);
$rank=getrank($level);
$recent=date("U")-900; $onlinecheck=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE userID='$uid' AND lasttime>'$recent'"));
if($onlinecheck>0) {
$st="<font color='green'>.::متــصل::.</font>"; } else { $st="<font color='red'>.::غيــر متصل::.</font>"; } echo "<title>$config->title &raquo; $username' الملف الشخصي لـ</title>";
echo"<div class='breadcrumb'></div>
<center>"; include "ads.php";
fblike(); echo"</center>
<div style='margin-top: 5px;' class='alj1'>";
echo"<div class='grid3 middle' align='center'><div class='b_head'>$username الملف الشخصي لـ</div>$st<br/>$status"; if(empty($avatar)) { $avatar="/images/nophoto.png"; } else { $avatar="/avatars/$avatar";
} echo "<div class='user-pic'><br><img src='$avatar' alt='photo' height='150' width='150' /></div><center><a class='button' href='/mail/compose.php?rname=$username'>مراسلة ($username)</a><center></div><br/>";
echo"<div class='a5' align='center'>
<ul><li><b>اسم المستخدم:</b> $username</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>الاسم الكامل:</b> $name</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>نوع الجنس:</b> $sex</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>عني:</b> $about</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>مدينة:</b> $city</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>البلد:</b> $country</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>المدرسة:</b> $position من $school</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>عضو منذ:</b> $regtime</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>آخر تسجيل دخول:</b> $lasttime2</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>الرتبـــة:</b> <h2><font color='red'>$rank</font></h2></li></ul><br><br>&raquo; <a href='../member/settings.php'>تحرير التفاصيل الشخصية الخاصة بك</a><br/><center><br/><font color='red'><b>دعوة أصدقائك إلى $config->title</b></font><br/></center><br/><div style=' background:#EFEF00; padding: 3px;' class='style7'>=> <a href='../member/search.php'>بحث عن أعضاء</a></div><br/><div class='link_button'><a href='../member/index.php'>  الرجوع للخلف </a></div></div>";
include "footer.php"; ?>
