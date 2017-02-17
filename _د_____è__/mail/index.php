<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php");
if(!isloggedin())
{
header("location: ../index.php");
}
else
{
$user=$_SESSION["user"];
}
echo"<title>$config->title &raquo; صندوق الرسائل</title>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<center>";
include"../ads.php";

echo"</center>";
echo"<div class='grid3 middle'>
<div class='b_head'>الرسائل الخاصة</div>";
$msg=$_GET["msg"];
if($msg!=" ")
{
echo"<div class='msg'>$msg</div>";
}
echo"<div class='list'>  <ul>  <li><a href='compose.php'>ارسال رسالة جديدة</a></li><li><a href='inbox.php'>الرسائل الواردة $pm</a></li><li><a href='sent.php'>الرسائل المرسلة</a></li>  </ul>    </div>  ";
echo"<br><div class='link_button'><a href='../main.php'>رجوع</a></div>";
include"../footer.php";
?>
