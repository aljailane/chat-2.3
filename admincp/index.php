<?php
/*
Project: Aljbook 1.0

*/
require("monit.php");
echo "<title>$config->title &raquo; Admin Panel</title>";
echo "<div class='msg'>مرحبا بك  <b>في لوحة الادارة</b></div><br/>";
if(!isloggedin())
{ header('location: ../index.php');
exit(); } echo "<div class='b_head'>Admin Menu</div><br/>"; $msg=$_GET["msg"];
if(!empty($msg))
{ echo"<div class='msg'>$msg</div>"; } echo "<div class='' align='center'><ul><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><a href='updates.php'>الاعلانات</a></li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><a href='user.php?action=pm'>الرسائل العامة</a></li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><a href='user.php'>ادارة الاعضاء</a></li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><a href='c.php'>ادارة غرف الدردشة</a></li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><a href='forum.php'>ادارة المنتديات</a></li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><a href='fbt.php'>ادارة سجل الزوار</a></li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><a href='tutorials.php'>ادارة الشروحات</a></li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><a href='uploads.php'>ادارة التنزيلات</a></li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li><li><a href='jamz.php'>ادارة الصوتيات</a></li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li></ul></div>";
echo"<div class='link_button'><a href='../member/index.php'>عودة للخلف</a></div>";
include"../footer.php";
?>
