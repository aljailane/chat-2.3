<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php");
if(!isloggedin())
{ header('location: index.php'); } else
{ $user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==1) {
header("location: ../logout.php"); exit(); } else { updateonline(); } }
echo"<title>$config->title &raquo; بحث عن عضو</title>";
echo"<style type='text/css'>
<!--
.style2 {
color: #FF0000;
font-weight: bold;
font-family: Georgia, 'Times New Roman', Times, serif;
font-size: 13px;
} .style4 {
color: #FFFFFF;
font-family: Georgia, 'Times New Roman', Times, serif;
font-size: 13px; }
.style5 {
font-family: Georgia, 'Times New Roman', Times, serif;
font-size: 13px;
} --></style><div class='body_width'>";
include "../topnav.php";
echo"<center>";
include "../ads.php";
echo"</center>";
echo"<div style='margin-top: 5px;' class='grid3'></div>";
echo"<div class='grid3 middle'> <div class='b_head'> بحث الاعضاء</div>";
echo"<b>البحث حسب اسم العضو:</b> ";
echo"<form action='#' method='POST'><ul><li><input type='text' name='q' /></li><li><center><input type='submit' name='submit' value='بحث' class='button'></center></li></ul>"; $q=$_REQUEST["q"];
if(isset($q) && !empty($q))
{ $q=trim($q);
$q=cleanvalues($q);
$q=strtoupper($q);
//echo"you searched for $q";
//$u="is";
$self=$_SERVER["PHP_SELF"];
$rowsperpage=2;
$range=2;
if(isset($_GET["currentpage"]) && is_numeric($_GET["currentpage"]))
{ $currentpage=(int)$_GET["currentpage"]; } else { $currentpage=1; }
}
if($currentpage<1)
{
$currentpage=1;
}
$query=mysql_query("SELECT * from b_users WHERE UPPER(username) LIKE '%$q%' OR UPPER(username) LIKE '%$q' OR UPPER(username) LIKE '$q%' LIMIT $offset, $rowsperpage");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>لا يوجد نتيجة</div>";
}
else
{
echo"<div class='title'><center>نتائج البحث عن $q</center></div><div class='gap'></div>";
while($info=mysql_fetch_assoc($query))
{
$username=cleanvalues2($info["username"]);
$id=$info["userID"];
echo"<ul><a href='profile.php?uid=$id'>$username</a></ul><div class='gap'></div>";
}
if($currentpage>1)
{
echo"<a href='$self?currentpage=1&q=$q'>[<b>الأولى</b>]</a>";
$prevpage=$currentpage-1;
echo"<a href='$self?currentpage=$prevpage&q=$q'>[<b>السابق</b>]</a>";
}
for($x=($currentpage-$range); $x<(($currentpage+$range)+1); $x++)
{
if(($x>0) &&($x<=$totalpages))
{
if($x==$currentpage)
{
echo"[<font color='red'>$x</font>]";
}
else
{
echo"<a href='$self?currentpage=$x&q=$q'>[<b>$x</b>]</a>";
}
}
}
if($currentpage!=$totalpages)
{
$nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage&q=$q'>[<b>التالي</b>]</a>";
echo"<a href='$self?currentpage=$totalpages&q=$q'>[<b>الاخير</b>]</a>";
} }
echo"<div class='link_button'><a href='index.php'>رجوع</a></div>";
include "../footer.php";
?>
