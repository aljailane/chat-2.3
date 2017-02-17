<?php
ERROR_REPORTING(0);
/*
Project: PBNL Forum v2.3.5

Coded By: Adegboye Joshua (JOSHUAEASY)

Facebook: http://facebook.com/JOSHUAEASY

Email: (adegboyejoshua@gmail.com)

CellPhone +2348137536702

Twitter: @herdaywhaley

WebSite: http://www.9jatech.tk
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
echo"<title>$config->title &raquo; Sent Messages </title>";

echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='index.php'>Messaging</a> </div><br>";
echo"<center>";
include"../ads.php";
fblike();

echo"</center>";
echo"<center>

<div class='public_message'><div class='success'></div></div>

</center>



<div style='margin-top: 5px;' class='grid3'>
</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>الصادر</div>";
$pmquery=mysql_query("SELECT * FROM b_pms WHERE sender='$user' ORDER BY id DESC");
$pmcount=mysql_num_rows($pmquery);
if($pmcount==0)
{
echo"<div class='msg'><strong><br>ليس لديك أي الرسائل المرسلة<br></strong></div>";
}
else
{
while($pminfo=mysql_fetch_array($pmquery))
{
$pmid=$pminfo["id"];
$reciever=$pminfo["reciever"];
$subject=$pminfo["subject"];
$date=$pminfo["date"];
$date=date("h:i:s | Y/m/d", $date);
$sid=user_info($reciever, userID);
echo"<ul class='message-list'>    

<li>مرسلة/<a href='view.php?ref=outbox&id=$pmid'> $subject</a>

 <br>إلى <a href='../profile.php?uid=$sid'>$reciever</font></a> في $date</font></li><div class='gap'></div></ul>";
}
}
echo"<br><div class='link_button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
