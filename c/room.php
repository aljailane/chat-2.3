<?php
/*
Project: Aljbook 1.0

*/require("../init.php");
if(!isloggedin())
{ header("location: ../index.php"); }
else { $user=$_SESSION["user"];
$level=user_info($user, level);
}
$id=(int)$_REQUEST["id"];
$check=mysql_query("SELECT * FROM b_chatroom WHERE id=$id");
if(mysql_num_rows($check)==0)
{
header("location: index.php");
exit();
}
$rinfo=mysql_fetch_assoc($check);
$roomid=$rinfo["id"];
$roomname=$rinfo["name"];
$timeout=time()-100;
$time=time();
//$ctimeout=$ctimenow-$ctimeto;
mysql_query("DELETE FROM b_chatonline WHERE chatter='$user'");
$insert=mysql_query("INSERT INTO b_chatonline SET time='$time', chatter='$user', roomid='$roomid'");
if(!$insert)
{
mysql_query("UPDATE b_chatonline SET time='$time', chatter='$user', roomid='$roomid'");
}
mysql_query("DELETE FROM b_chatonline WHERE time<'$timeout'");
if($_GET["act"]=="del")
{
$mid=(int)$_GET["mid"];
mysql_query("DELETE FROM b_chat WHERE id=$mid");
}
/*$link="<a href='?cat=del'>[حذف]</a>";
$link2=($level>0) ? $link : ' ';*/
echo"<title>$config->title - Chat - $roomname</title>";
include"../topnav.php";
include"../ads.php";
echo" <a href='../member/update.php'>تعيين حالتگ</a>  | <a href='../content/bbcode_ref.php'>اكواد BBcode</a> | <a href='../member/icons.php'>فيسات</a>";
echo"$chatter<br>";
$onlinequery=mysql_query("SELECT DISTINCT * FROM b_chatonline WHERE roomid=$roomid");
echo"<ul><li><select><option>المتصلون بالغـرفة</option>";
while($row=@mysql_fetch_array($onlinequery))
{
$chatter=$row["chatter"];
echo"<option>$chatter</option>";
}
echo"</select></li></ul>";
echo"<form action='room.php?id=$roomid' method='POST'><ul><li><textarea name='message'></textarea></li><center><li><input type='submit' name='submit' value='ارســـــــال' class='button'></li></ul></form>";
echo"<div class='grid3 middle' align='center'>";echo"<div class='style2'><h2><a href='room.php?id=$roomid'>تحديث</a></h2></div><div class='..'></div>";
$query=mysql_query("SELECT * FROM b_chat WHERE roomid=$roomid ORDER BY id DESC LIMIT 10");
while($info=mysql_fetch_array($query))
{
$chatter=cleanvalues2($info["chatter"]);
$message=cleanvalues2($info["message"]);
$message=bbcode($message);
$message=smiley($message); $time=$info["time"];
date_default_timezone_set('Asia/Riyadh');
$time=date("Y/m/d - h:i:s", $time);
$uid=user_info($chatter, userID);
$mid=$info["id"];
$avatar=$pminfo["photo"];
$sid=user_info($chatter, userID);
$avatar=user_info($chatter, photo);
if(empty($avatar))
{ $avatar="<img src='../avatars/nophoto.png' alt='photo' height='50' width='50'>";
} else { $avatar="<img src='../avatars/$avatar' alt='photo' height='120' width='110'>";
}
echo"<div class='' align='right'><ul><li><a href='../profile.php?uid=$uid'><b>$img $avatar  </b></a></li><li>[❤<small>$chatter</small>❤]</li><br><li><big><font color='black' size='5'>$message</font></big></li><br><li>($time)</li><li><hr></li></div>";
if($level>0)
{
echo"<a href='?act=del&mid=$mid&id=$id'><font color='red'>حـذف</font></a></ul>";
}
else
{
echo"</li></ul>";
}
}
//ERROR
if(isset($_POST["submit"]))
{
$message=$_POST["message"];
$user=$_SESSION["user"];
$time=time();
if(empty($message) || strlen($message)<1)
{
echo"<div class='msg'>. رسالتك قصيرة جداً</div>";
}
else
{
$update=mysql_query("INSERT INTO b_chat SET chatter='$user', message='$message', time='$time', roomid='$roomid'");
header("location: room.php?id=$roomid");
}
}
echo"<div class='title'><center>ارسل رسالتگ</center></div><br/><form action='room.php?id=$roomid' method='POST'><ul><li><textarea name='message'></textarea></li><center><input type='submit' name='submit' value='ارسال' class='button'></li></ul>";
echo"<br /> <br /><div class='link_button'><a href='index.php'>Go Back</a></div>";
include"../footer.php";
?>
