<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php");
if(!isloggedin())
{ header('location: ../index.php'); }
else
{
$user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==1)
{
header("location: ../logout.php");
exit();
}
else
{
updateonline();
}
}
echo"<title>$config->title - دردشة</title>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'></div>";
echo"<center>";
include"../ads.php";

echo"</center>";

echo"<div class='grid3 middle' align='center'>
<div class='b_head'>غرف الدردشة</div>";
echo"<div class='ms'><div class=''><font color='red'><strong><br><!-- google_afm --><br>

تنبية:
</strong> </font>نرجو الاحترام والادب<br>
<br>";
$query=mysql_query("SELECT * FROM b_chatroom ORDER BY id ASC");
$count=mysql_num_rows($query);
if($count>0)
{
while($row=mysql_fetch_array($query))
{
$name=cleanvalues2($row["name"]);
$id=$row["id"];
$online=mysql_num_rows(mysql_query("SELECT DISTINCT(chatter) FROM b_chatonline WHERE roomid=$id"));
//$description=$row["description"];
/*$img=$row["img"];
if(!empty($img))
{
$img="<img src='/images/$img' alt='IMG'/>";
}
else
{
$img="No Img";
}
*/
echo"<div class='a11'><a href='room.php?id=$id'><ul><li>$name ($online)</a>
</li><li><img src='http://beta.3srup.ga/1/1801.png' width='320' height='60' /></li></ul></div>
</div>";
}
}
else
{
echo"<div class='msg'><font color='red'><center>No room created yet</center></font></div><div class='gap'></div>";
}
echo"<div class='link_button'><a href='".$config->url."main.php'>Go Back</a></div>";
include"../footer.php";
?>
