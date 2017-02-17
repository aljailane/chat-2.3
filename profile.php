<?php
ERROR_REPORTING(0);
/*remoded By anonymous user
please use wisely
*/
require("init.php");
if(!isloggedin())
{ header('location: index.php'); }
else { $user=$_SESSION["user"];
$lev=user_info($user, level);
$id=user_info($user, userID);
$banned=user_info($user, banned);
if($banned==1) { header("location: logout.php"); exit(); }
else { updateonline(); } } echo"<style type='text/css'>
<!-- .style1 {
color: #FF0000;
font-weight: bold;
font-family: Arial, Helvetica, sans-serif;
font-size: 13px;
} .style7 {color: #FFFFFF} --> </style> <div class='body_width'>";
include "topnav.php";
$uid=(int)$_GET["uid"];
$checkid=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE userID=$uid"));
if(empty($uid)||$checkid<1) { header('Location: index.php'); } $username=cleanvalues2(user_info2($uid, username));
$status=cleanvalues2(user_info2($uid, status));
$lasttime=cleanvalues2(user_info2($uid, lasttime));
$lasttime2=date(" h:i:s | Y/m/d", $lasttime); $sex=user_info2($uid, sex);
$sig=user_info2($uid, sig);
$ip=user_info2($uid, ip);
$position=user_info2($uid, position); $about=user_info2($uid, note);
$regtime=user_info2($uid, regtime); $regtime=date(" h:i:s | Y/m/d", $regtime); $avatar=user_info2($uid, photo);
$country=user_info2($uid, country); $name=user_info2($uid, name);
$aljailane=user_info2($uid, aljailane);
$city=user_info2($uid, city);
$coins=getworth($poster);
$posts=user_info2($uid, posts);
$school=user_info2($uid, school); $level=user_info2($uid, level);
$rank=getrank($level);
$recent=date("U")-900;
$ip=user_info($username, ip);
$onlinecheck=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE userID='$uid' AND lasttime>'$recent'"));
if($onlinecheck>0) {
$st="<font color='green'><b>.:: متصل الان ::.</b></font>"; } else { $st="<font color='red'><b>.:: غير متصل ::.</b></font>"; } echo "<title>$config->title &raquo; $username ملف</title>";
$query="SELECT COUNT(poster) AS fcount FROM b_topics WHERE poster='$username'";
$goPage=mysql_query($query);
if(!$goPage)
die("ERROR_PAGE_SQL");
$fcount=mysql_result($goPage,0,`fcount`);
$tquery="SELECT COUNT(poster) AS tcount FROM b_replies WHERE poster='$username'";
$page=mysql_query($tquery);
if(!$page)
die("ERROR_PAGE_SQL");
$tcount=mysql_result($page,0,`tcount`);
echo"<div class='breadcrumb'></div>
<center>"; include "ads.php";
echo"<div class='grid3 middle' align='center'>"; $msg=$_GET["msg"];
if(!empty($msg))
{ echo"<div class='public_message'>$msg</div>"; }
echo "<div class='b_head'>$username ملف </div>$st<br/>$status"; if(empty($avatar)) { $avatar="/images/nophoto.png"; } else { $avatar="/avatars/$avatar";
}
if($uid==$id) { echo"<br>"; } else { echo"<center><a class='button' href='/mail/compose.php?rname=$username'>ارسال رسالة</a><center>"; }
$squery=mysql_fetch_array(mysql_query("SELECT b_users.userID, b_friend.friendID
FROM b_users INNER JOIN b_friend ON b_users.userID=b_friend.friendID
Where b_friend.userID=$uid And b_friend.friendID=$id ORDER BY b_friend.id"));
if(!$squery)
{ echo "<div class='alj1'><br><img src='$avatar' alt='photo' height='150' width='150' /></div></div>"; } else { echo"<center><a class='button' href='/friend.php?action=delete&id=$uid'>حذف الصديق</a><center><br/>"; }
echo"<div class='a5'>
<ul><li><b>العضوية:</b> $username</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>الاسم الكامل:</b> $name</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>نوع الجنس:</b> $sex</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>من انا:</b> $about</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>City:</b> $city</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>الدولة:</b> $country</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>المدرسة:</b> $position و  $school</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>عضو منذ:</b> $regtime</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>اخر دخول:</b> $lasttime2</li>
<li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>الايبي:</b> $ip</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>مواضيع العضو:</b> $fcount </li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>مشاركات العضو:</b> $tcount </li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>شارة الموقع:</b> $sig</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><b>رصيد العضو:</b> $coins</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li>";

if($level>0) { echo "<span class='alj2'>تحكم بالعضو</span>"; }
$b="[<a href='../member/modaction.php?action=Ban&id=$uid'>حجب العضوية</a>]<br>";
$ba="<a href='../member/modaction.php?action=UnBan&id=$uid'>تفعيل العضو </a><br>";
if($banned==0) { $bma="<a href='../member/modaction.php?action=Ban&id=$uid'>حظر العضوية</a><br>";} elseif($banned==1) { $bma="<a href='../member/modaction.php?action=UnBan&id=$uid'>تفعيل العضوية $username</a><br>"; } if($lev==2) { echo "<li><br><a href='../admincp/user.php?action=rank&id=$uid'>ترقية العضو</a> $b  $ba";
} elseif($lev==1) { echo "<li>$b</li><li>$ba</li>"; } echo "</ul><br><br>&raquo; <a href='../member/settings.php'>تعديل ملف العضوية</a><br/><br/><div style=' background:red; padding: 3px;' class='style7'>=> <a href='../member/search.php'>بحث عن عضو</a></div><br/><div class='link_button'><a href='../member/index.php'> رجوع </a></div></div>";
include "footer.php"; ?>
