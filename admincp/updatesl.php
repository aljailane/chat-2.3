<?php
/*
Project: PBNL Forum v2.3.5

Coded By: Adegboye Joshua (JOSHUAEASY)

Facebook: http://facebook.com/JOSHUAEASY

Email: (adegboyejoshua@gmail.com)

CellPhone +2348137536702

Twitter: @herdaywhaley

WebSite: http://www.9jatech.tk
*/require("monit.php");
if(isset($_GET["action"]))
{
$action=$_GET["action"];
}
else
{
$action=" ";
}
if($action=="Add")
{
echo"<div class='msg'>Please all fields are required</div>";
if(isset($_POST["submit"]))
{
$prefix=$_POST["prefix"];
$title=$_POST["title"];
$url=$_POST["url"];
if(empty($prefix) || empty($title) || empty($url) || strlen($prefix)<4 strlen($title)<4 || strlen($url)<4)
{
echo"<div class='center'><font color='red'><b>Your Prefix , Title or Url field is empty</b></font></div>";
}
else
{
$prefix=cleanvalues($prefix);
$title=cleanvalues($title);
$url=cleanvalues($url);
$insert=mysql_query("INSERT INTO b_updates SET prefix='$prefix', title='$title', url='$url'");
if(!$insert)
{
$msg="An error occured".mysql_error();
}
else
{
$msg="Update successfully Added";
}
header("location: ?msg=$msg");
exit();
}
}
echo"<form action='?action=Add' method='POST'>";
echo"<ul><li><b>Update Prefix:</b><br/><textarea name='title'></textarea></li>
<ul><li><b>Update Title:</b><br/><textarea name='title'></textarea></li><li><b>Update Url:</b><br/><input type='text' name='url'></li><li><center><input type='submit' name='submit' class='button' value='Add Updates'></center></li></ul></form>";
echo"<div class='title'><a href='updates.php'>Back To Updates</a></div>";
exit();
}
elseif($action=="Edit")
{
//if submit
if(isset($_POST["submit"]))
{
$id=(int)$_POST["id"];
$prefix=$_POST["prefix"];
$title=$_POST["title"];
$url=$_POST["url"];
//check values
if(empty($prefix) || empty($title) || empty($url) || strlen($prefix)<4 || strlen($url)<4 || strlen($title)<4)
{
echo"<div class='center'><font color='red'>Your title or url is empty</font></div>";
}
else
{
$prefix=cleanvalues($prefix);
$title=cleanvalues($title);
$url=cleanvalues($url);
$insert=mysql_query("UPDATE b_updates SET prefix='$prefix', title='$title', url='$url' WHERE id=$id");
if(!$insert)
{
$msg=mysql_error();
}
else
{
$msg="Changes Successfully Saved";
}
header("location: ?msg=$msg");
exit();
}
}
$id=(int)$_GET["id"];
$query=mysql_query("SELECT * FROM b_updates WHERE id=$id");
$info=mysql_fetch_array($query);
$prefix=$info["prefix"];
$title=$info["title"];
$url=$info["url"];
$id=$info["id"];
echo"<form action='?action=Edit' method='POST'>";
echo"<ul><li><b>Update Prefix<b><br/><textarea name='prefix'>$prefix</textarea></li>
<ul><li><b>Update Title<b><br/><textarea name='title'>$title</textarea></li><li>Update Url<br/><input type='text' name='url' value='$url'></li><li><input type='hidden' value='$id' name='id'></li><li><center><input type='submit' name='submit' class='button' value='Save Changes'></center></li></ul></form>";
echo"<div class='title'><a href='updates.php'>Back Updates</a></div>";
exit();
}
elseif($action=="Delete")
{
$id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_updates WHERE id=$id");
if($query)
{
$msg="Deleted Successfuly";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
exit();
}
else
{
echo"<div class='topnav'><div class='left'><a href='updates.php?action=Add'>Add update</a></div><div class='right'><a href='index.php'>Menu</a></div></div><div class='gap'></div><div class='center'><ul>Here You can add new update, delete or edit existing updates</ul></div>";
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}

echo"<div class='topnav'>Existing Updates</div>";
$query=mysql_query("SELECT * FROM b_updates ORDER BY id DESC") or mysql_error();
while($info=mysql_fetch_assoc($query))
{
$prefix=$info["prefix"];
$title=$info["title"];
$url=$info["url"];
$id=$info["id"];
echo"<ul><li><b>Prefix: </b>$prefix</li><ul><li><b>Title: </b>$title</li><li><b>URL:</b> $url</li><li><a href='?action=Edit&id=$id'>Edit</a> <div class='right'><a href='?action=Delete&id=$id'>Delete</a></li></div></ul>";
}
}
include"../footer.php";

?>
