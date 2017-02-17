<?php
/*
Project: PBNL Forum v2.3.5

Coded By: Adegboye Joshua (JOSHUAEASY)

Facebook: http://facebook.com/JOSHUAEASY

Email: (adegboyejoshua@gmail.com)

CellPhone +2348137536702

Twitter: @herdaywhaley

WebSite: http://www.9jatech.tk
*/
include('monit.php');
if(isset($_GET["action"]))
{
$action=$_GET["action"];
}
else
{
$action=" ";
}
if($action=="Delete")
{
if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_tutorialcat WHERE id=$id");
if($query)
{
$msg="Category Deleted Successfuly";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
include "../footer.php"; exit();
}
$id=(int)$_GET["id"];
echo"<div class='topnav'>System Warning</div><div class='msg'>Are You Sure You want to Delete This Category ?</div><div class='gap'></div><div class='link_button'><a href='?action=Delete&yes=true&id=$id'><font color='red'>Yes</font></a> | <div class='right'><a href='?'>No</a></div></div>";
}
elseif($action=="Edit")
{
$id=(int)$_GET["id"];
if(isset($_POST["submit"]))
{
$name=cleanvalues2($_POST["name"]);
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'>Category field name is empty or less than 4</font></div>";
}
else
{
if(empty($_POST["img"]))
{
mysql_query("UPDATE b_tutorialcat SET name='$name' WHERE id=$id") or die(mysql_error());
$msg="Changes Saved Successfulty";
header("location: ?msg=$msg");
include "../footer.php"; exit();
}
else
{ $img=$_POST["img"];
mysql_query("UPDATE b_tutorialcat SET name='$name', img='$img' WHERE id=$id");
$msg="Changes saved successfully";
header("location: ?msg=$msg");
}
}
}
$query=mysql_query("SELECT * FROM b_tutorialcat WHERE id='$id'");
$info=mysql_fetch_array($query);
$name=$info["name"];
$img=$info["img"];
echo"<form action='?action=Edit&id=$id' method='POST'><div class='b_head'>Editing Category..</div><br><ul><li>Category Name</br><input type='text' name='name' value='$name'></li><li><br>Image Link e.g:<br/> http://joshuaeasy.com/myluv.png<br/><input type='text' name='img' value='$img'></li><li><center><input type='submit' name='submit' class='link_button' value='CREATE'></center></li></ul></form>";
echo"<div class='link_button'><a href='tutorials.php'>Back</a></div>";
include "../footer.php"; exit();
}
elseif($action=="Add")
{
if(isset($_POST["submit"]))
{
$name=cleanvalues2($_POST["name"]);
$checkname=mysql_num_rows(mysql_query("SELECT * FROM b_tutorialcat WHERE name='$name'"));
if(empty($name) || strlen($name)<4)
{
echo"<div class='center'><font color='red'>Category field name is empty or less than 4</font></div>";
}
elseif($checkname>0) {
echo"<div class='msg'>Please Choose Another Name</div>"; }
else
{
if(empty($_POST["img"]))
{
mysql_query("INSERT INTO b_tutorialcat SET name='$name'") or die(mysql_error());
$msg="Category Created Successfulty";
header("location: ?msg=$msg");
include "../footer.php"; exit();
}
else
{ $img=$_POST["img"];
mysql_query("INSERT INTO b_tutorialcat SET name='$name', img='$img' WHERE id=$id");
$msg="Category Created successfully";
header("location: ?msg=$msg");
}
}
}
echo"<form action='?action=Add' method='POST'><div class='b_head'>Creating Category..</div><br><ul><li>Category Name</br><input type='text' name='name'></li><li><br>Image Link e.g:<br/> http://joshuaeasy.com/myluv.png<br/><input type='text' name='img'></li><li><center><input type='submit' name='submit' class='link_button' value='CREATE'></center></li></ul></form>";
echo"<div class='link_button'><a href='tutorials.php'>Back</a></div>";
include "../footer.php"; exit();
}
else
{
echo"<br/><div class='topnav'><div class='left'><b><a href='?action=Add'>Add Category</a> &raquo; <a href='tutopics.php'>Topics</a></b></div><br/><div class='center'><ul>Here You can Create New Categories, delete or edit existing category categories</ul></div><br>"; 
$msg=$_GET["msg"];
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}
$query=mysql_query("SELECT * FROM b_tutorialcat ORDER BY id DESC") or mysql_error();
$count=mysql_num_rows($query);
echo"<div class='topnav'><b>Tutorial Categories</b>($count)</div>";
if($count>0)
{
while($row=mysql_fetch_array($query))
{
$name=cleanvalues2($row["name"]);
$id=$row["id"];
$img=$row["img"];
if(!empty($img))
{
$img="<img src='$img' height='20' width='20' alt='img' />";
}
else
{
$img="<img src='../images/book.png' height='20' width='20' alt='$img' />"; 
}
echo "<div class='user-info'><ul><li>$img $name<br/><a href='?action=Edit&id=$id'>Edit</a> - <a href='?action=Delete&id=$id'><font color='red'>Delete</font></a></li></ul></div>"; 
}
}
else
{
echo"<font color='red'><center>No category created yet</center></font><div class='gap'></div>";
}
echo "<div class='link_button'><a href='index.php'>Back</a></div>";
include "../footer.php";
}
?>