<?php
error_reporting(0);
/*
Project: AljBook
*/
require("moduls/init.php");
echo"<title>$config->title &raquo; $config->desc </title>";
if(isset($_SESSION["user"])) { header("location: member/index.php"); } $recent=date("U")-900;
$onlinequery=mysql_query("SELECT * FROM b_users WHERE lasttime>'$recent'");
$ucount=mysql_num_rows($onlinequery);
?><style type="text/css"><!-- .style1 {color: #FFFF00}
a:link { text-decoration: none;
} a:visited {
text-decoration: none;
} a:hover {
text-decoration: none;
}
a:active {
text-decoration: none;
} .style2 {
font-family: Arial,
Helvetica, sans-serif;
font-size: 12px;
} .style4 {font-size: 11px} .style5
{font-size: 12px}
.style6 {font-family: Arial,
Helvetica, sans-serif} .style7 {
color: #FF0000;
font-weight: bold; } --></style>
<div class="ad3"><div class=""><div class="clearfix"></div><?php
$count=get_rows(b_users);
$msg=$_GET["msg"];
if($msg!==" ") {
echo"$msg";
include "moduls/header.php";
}
?>
<div align="center">نظرا لحذف قاعدة البيانات نرجو التسجيل مرة اخرى شكرا</div>

<div class="a11" align="right"><p class="a5" style="margin-left: 3px;">دخول الاعضاء</p><div class="alj1"><form action="login.php" method="post">اسم عضويتگ ❤<br/><input class="bgreen" type="text" name="username" size="10"><br/>كلمة السر<br/><input class="bred" type="password" name="password" size="10"><br/><br><input type="submit" name="submit" class="button" value="دخول الان"></form></div>
<br>
لم تصبح عضوا؟
<br>
<a href="register.php"><button class="bblue"><b>تسجيل اشتراك جديد</b></button></a>
<br><br>
 نسيت بيانات الدخول؟
<br>
 <a href="forgotpass.php"><button class="bred"><b>نسيت التفاصيل؟</b></button></a><br/><br>
</div><div class="clearfix"></div><div class="grid1"><div class="b_head" style="margin-left: 3px;"> أعضاء عشوائيون</div><div
style="padding:10px; border:
1px solid #FFF; border-radius:
6px; margin-bottom:
5px;"><?php
$query=mysql_query("SELECT * FROM b_users ORDER BY RAND() LIMIT 4");
while($info=mysql_fetch_array($query)) { $username=cleanvalues2($info["username"]);
$uid=$info["userID"];
$img=$info["photo"];
$status=$info["status"];
$status=wordwrap($status, 13, "<br/>\n");
if(empty($img))
{ $img="<img src='images/nophoto.png' alt='photo' height='60' width='40' style='border:
1px solid #FFF;'>"; }
else
{ $img="<img src='/avatars/$img' alt='photo' height='60' width='40' style='border:
1px solid #FFF;'>"; }
echo "<left><a href='profile.php?uid=$uid'style='color:#000033'>$img</a></left>";
} ?></div><div class="b_head">إحصائيات الموقع</div>
<br><div class="a11"><b>مجموع الأعضاء</b>: <font color='red'><?php echo $count; ?></font></div>
<div class="a11"><b>الأعضاء على الإنترنت</b>:
<?php echo "<font color='red'>$ucount</font><br/></div></div> ";
while($uinfo=mysql_fetch_array
($onlinequery))
{ $userID=$uinfo["userID"];
$username=$uinfo["username"];
$school=$uinfo["school"];
$position=$uinfo["position"];
$sex=$uinfo["sex"];
$img=$uinfo["photo"];
echo"<a href='profile.php?uid=$userID'><font color='red'>$username</font></a>, <font color='gold'></font><font color='black'> </font>";
include "topis.php";
if(empty($img)) { $photo="<img src='/avatars/nophoto.png' alt='photo' height='60' width='40'>"; } else
{ $photo="<img src='/avatars/$photo' alt='photo' height='60' width='40'>"; } } ?><br/><div class="alertMsg"><span class="style7">&raquo;</span> تحميل مباشر  للملفات<a href="<?php echo $config->url; ?>/upload/live.php"><strong>هنا</strong></a></div><br><p><span class="alj4"> &raquo; هذا الموقع من تطوير محمد الجيلاني</font><br></a></p></div><? include "footer.php"; ?>
