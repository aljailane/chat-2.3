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
echo"<title>$config->title &raquo; Tutorials</title>";
echo"<div class='body_width'>";
include '../topnav.php';
echo"<center>";
include "../ads.php";
fblike();

echo"</center>";
echo"<center>

<div class='public_message'><div class='success'></div></div>

</center>";
$msg=cleanvalues2($_GET["msg"]);
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}

echo"<div style='margin-top: 5px;' class='grid3'>";
echo"

<br></div>  ";
echo"<div class='grid3 middle'>";
echo"<center><div class='b_head'>Tutorials</div>";
echo"<hr><a href='search.php'><span class='style1'><img src='../images/search.gif' width='20' height='20' border='0'><br>Search</span></a><br><br> <div class='tutorial-list'>";
echo"
<ul>";
$query=mysql_query("SELECT * FROM b_tutorialcat ORDER BY id DESC");
$count=mysql_num_rows($query);
if($count>0)
{
while($row=mysql_fetch_array($query))
{
$name=$row["name"];
$id=$row["id"];
//$description=$row["description"];
$img=$row["img"];
if(!empty($img))
{
$img="<img src='$img' alt='IMG' border='0' height='40' width='40'/>";
} else { $img="<img src='../images/books.png' alt='IMG' border='0' height='40' width='40'/>"; }
echo "<li>
<a href='topics.php?id=$id'><div class='tutorial-image'>
<div align='center'>$img<br/><b></a><a href='topics.php?id=$id'>$name</b></div></div></a><div class='tutorial-header'>
</div>
</li>  ";
} echo "  <ul>   </div>"; }
else
{
echo"<div class='msg'><font color='red'><center>No category created yet</center></font></div><div class='gap'></div>";
}
echo"<div class='link_button'><a href='../member/index.php'>Go Back</a></div>";
include"../footer.php";
?>
