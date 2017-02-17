<?php ERROR_REPORTING(0);
/*
Project: Aljailane
*/
include("../init.php");
if(!isloggedin())
{ header('location: ../index.php');
exit(); } else { $user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==0) { updateonline(); } else { header('location: ../logout.php'); exit(); } }
echo"<div class='body_width'>"; echo"<div class='page_w'>"; echo"<div style='clear: both'></div><br>";
echo"<center>";
include "../ads.php";
echo"</center>"; $online=mysql_num_rows(mysql_query("SELECT DISTINCT(chatter) FROM b_chatonline"));
$recent=date("U")-900; 
$onlineusers=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE lasttime>'$recent'"));
if(isset($_POST["update"])) { $status=$_POST["status"];
$status=cleanvalues($status);
mysql_query("UPDATE b_users SET status='$status' WHERE username='$username'");
echo"<div class='msg'>تم تحديث الحالة الخاصة بك</div>"; } $status=user_info($user, status);
$status=cleanvalues2($status);
$msg=$_GET["msg"];
if(!empty($msg))
{ echo"<div class='ms'>$msg</div>";
} echo"<div class='grid3' style='margin-top: 5px;'>
</div>";
echo"<title>$config->title &raquo; واب العرب</title>";
?><style type="text/css">
<!--.style7 { color: #FFFFFF; font-size: 13px; font-family: Arial, Helvetica, sans-serif; } .style70 {font-size: 12px} .style73 {color: #00FF00}
--></style>
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
?>

<hr>
اهلا بك يا 
<font color="green" size="5"><?php echo $username; ?></font>
<br><br>
الاي بي الخاص بك 
(<font color="blue" size="4"><?php echo $ip; ?></font>) <?php
echo $_SERVER['HTTP_USER_AGENT'];
?>
<br><br>
الحالة
(<font color="red" size="3"><?php echo $status; ?></font>)
<div align="center"><ul class="">
<li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li>
<li class="a11"><a href="../blogs">
<span class="dashboard_button_heading">المـــــــــدونــــة</span></a><br>
</li>
<li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li>
<li class="a11"><a href="../forum">قــسم المنتديـات</a><br></li>
<li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li>
<li class="a11"><a href="../c"><span class="dashboard_button_heading">غـــرف الدردشـــة </span></a></li>
<li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li>
<li class="a11"><a href="../upload">
<span class="dashboard_button_heading">مركـــز التحميــل</span></a><br></li>
<li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li>
<li class="a11"><a href="../music"><span class="dashboard_button_heading">قســـم الصوتيات</span></a><br></li>
<li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li>
<li class="a11"><a href="../tutorials">
<span class="dashboard_button_heading">مكتبــة الـــدروس</span></a><br></li>
<li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li>
<li class="a11"><a href="online.php"><span class="dashboard_button_heading">المتصــلون الان</span></a></li>
<li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li>
</ul></div></div><div class="clearfix"></div></div></div>
<!-- Footer --><?php include "../footer.php"; ?><br /><!-- End Footer --> </body>  </html>
