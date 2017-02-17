<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php");
if(!isloggedin())
{ header("location: ../index.php"); } else
{ $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo; Inbox </title>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='index.php'>صندوق الرسائل</a></div><br>";
echo"<center>";
include"../ads.php";

echo"</center>";

if(isset($_POST["delete"]))
{
$pms=$_REQUEST["pms"];
$pmcount=count($pms);
$i=0;
for($i=0; $i<count($pms); $i++)
{
$del=$pms[$i];
$r=mysql_query("DELETE FROM b_pms WHERE reciever='$user' AND id=$del")or die(mysql_error());
if($r) $a++;
}
$msg="$a/$pmcount تم بنجاح حذف";
header("location: index.php?msg=$msg");
exit();
}
echo"<div class='grid3 middle'>
<div class='b_head'>رسائل واردة</div>";
$pmquery=mysql_query("SELECT * FROM b_pms WHERE reciever='$user' ORDER BY id DESC");
$pmcount=mysql_num_rows($pmquery);
if($pmcount==0)
{
echo"<div class='msg' align='right'><strong><br>ليس لديك أي الرسائل واردة</strong></div><br>";
}

else
{
echo"<form action='#' method='POST'>";
while($pminfo=mysql_fetch_array($pmquery))
{
$pmid=$pminfo["id"];
//echo"<b>$pmid</b>";
echo"<br><ul class='message-list'><li>
<table border='0' width='100%'>
<tr><td width='4%'><input type='checkbox' name='pms[]' value='$pmid'></td>
<td width='96%'>";
$sender=cleanvalues2($pminfo["sender"]);
$subject=cleanvalues2($pminfo["subject"]);
$date=$pminfo["date"];
$date=date("h:i:s | Y/m/d", $date); $hasread=$pminfo["hasread"];
if($hasread==0) { $img="<img src='../images/newmsg.png' alt='new' border='0' />"; } else { $img="<img src='../images/oldmsg.png' alt='old' border='0' />"; } $sid=user_info($sender, userID);
echo"
<b><a href='view.php?id=$pmid'>$subject</a></b>  $img
<br>
من: 
<span class=''><a href='../profile.php?uid=$sid'>$sender</a> </span>
في: 
 $date
</td>
</tr>
</table>
</li>";
}
echo"<br><center><input type='submit' name='delete' value='حذف المحدد'></form></center><br>";
}
echo"<div class='link_button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
?>
