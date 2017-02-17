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
echo"<div class='body_width'>"; echo"<div class='page_w'>"; include "../topnav.php"; echo"<div style='clear: both'></div><br>";
echo"<center>";
include "../ads.php";
echo"</center>"; $online=mysql_num_rows(mysql_query("SELECT DISTINCT(chatter) FROM b_chatonline"));
$recent=date("U")-900; $onlineusers=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE lasttime>'$recent'"));
if(isset($_POST["update"])) { $aljailane=$_POST["aljailane"];
$aljailane=cleanvalues($aljailane);
mysql_query("UPDATE b_users SET status='$aljailane' WHERE username='$username'");
echo"<div class='msg'>تم تحديث الحالة الخاصة بك</div>"; } $aljailane=user_info($user, aljailane);
$aljailane=cleanvalues2($aljailane);
$msg=$_GET["msg"];
if(!empty($msg))
{ echo"<div class='ms'>$msg</div>";
} echo"<div class='grid3' style='margin-top: 5px;'>
</div>";
echo"<title>$config->title &raquo; تعيين الحالة</title>";
?>

<style type="text/css">
<!--.style7 { color: #FFFFFF; font-size: 13px; font-family: Arial, Helvetica, sans-serif; } .style70 {font-size: 12px} .style73 {color: #00FF00}
--></style><div class="grid3 middle" align="center">تعيين حالتك ستظهر بالغرف والموقع <form action="#" method="post"><p><li><center><input type="text" name="aljailane" value="<?php echo $aljailane; ?>"></li><li><center><input type="submit" name="update" value="تحديث حالتگ" class="button"></center></li></ul></p><div class="error_message"></div>

<!-- Footer --><?php include "../footer.php"; ?><br /><!-- End Footer --> </body>  </html>
