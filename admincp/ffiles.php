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
echo"<div class='topnav'><a href='films.php'>Media Menu</a></div><div class='center'>Here You can move/delete uploaded Medias</div>";
$msg=cleanvalues2($_GET["msg"]);
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}
$action=$_GET["action"];
if($action=="move")
{
if(isset($_POST["move"]))
{
$id=(int)$_POST["id"];
$cid=(int)$_POST["cid"];
mysql_query("UPDATE b_film SET catid='$cid' WHERE id=$id");
$cinfo=mysql_fetch_assoc(mysql_query("SELECT * FROM b_filmcat WHERE id=$cid"));
$cname=$cinfo["name"];
$msg="Media moved to $cname category successfully";
header("location: ?msg=$msg");
exit();
}
else
{
$id=(int)$_GET["id"];
echo"<div class='msg'>Are You Sure You Want to move this Media to another category ?</div>";
echo"<form action='?action=move' method='POST'><ul><li>Move to.....<br/><select name='cid'>";
$query=mysql_query("SELECT * FROM b_filmcat");
while($row=mysql_fetch_array($query))
{
$cname=$row["name"];
$pid=$row["id"];
echo"<option value='$pid'>$cname</option>";
}
echo"</select></li><input type='hidden' name='id' value='$id'><li><input type='submit' name='move' class='button' value='move'></li></ul></form>";
exit();
}
}
if($action=="del")
{
if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_film WHERE id=$id");
if($query)
{
$msg="Media Deleted Successfuly";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
}
$id=(int)$_GET["id"];
echo"<div class='topnav'>System Warning</div><div class='msg'>Are You Sure You want to Delete This Media ?</div><div class='gap'></div><div class='button'><a href='?action=del&yes=true&id=$id'><font color='red'>Yes</font></a> | <div class='right'><a href=''>No</a></div></div>";
exit();
}
$self=$_SERVER["PHP_SELF"];
$rowsperpage=10;
$range=7;
if(isset($_GET["currentpage"]) && is_numeric($_GET["currentpage"]))
{
$currentpage=(int)$_GET["currentpage"];
}
else
{
$currentpage=1;
}
$offset=($currentpage-1)*$rowsperpage;
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_film"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$tquery=mysql_query("SELECT * FROM b_film ORDER BY id DESC LIMIT $offset, $rowsperpage");
if(mysql_num_rows($tquery)==0)
{
echo"<div class='msg'>No files yet</div>";
}
else
{
echo"<div class='title'>Uploaded Medias</div>";
while($info=mysql_fetch_assoc($tquery))
{
$fid=$info["id"];
$name=$info["title"];
$by=$info["by"];
$date=$info["date"];
$date=date("D d, M Y", $date);
$catid=$info["catid"];
$cinfo=mysql_fetch_assoc(mysql_query("SELECT * FROM b_filmcat WHERE id=$catid"));
$cat=$cinfo["name"];
$link="<a href='?action=move&id=$fid'>[-]</a>- <div class='right'><a href='?action=del&id=$fid'>[x]</a>";
echo"<ul><li>*<a href='../cinema/view.php?id=$fid'><b>$name</b></a><br/>Category:- $cat<br/>BY:- $by<br/>$date<br/>$link</li></ul>";
}
if($currentpage>1)
{
echo"<a href='$self?currentpage=1&id=$id&sort=$sort'>[<b>First</b>]</a>";
$prevpage=$currentpage-1;
echo"<a href='$self?currentpage=$prevpage&id=$id&sort=$sort'>[<b>Prev</b>]</a>";
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
echo"<a href='$self?currentpage=$x&id=$id&sort=$sort'>[<b>$x</b>]</a>";
}
}
}
if($currentpage!=$totalpages)
{
$nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage&id=$id&sort=$sort'>[<b>Next</b>]</a>";
echo"<a href='$self?currentpage=$totalpages&id=$id&sort=$sort'>[<b>Last</b>]</a>";
}
}
echo"<div class='link_button'><a href='films.php'>Go Back</a></div>";
include "../footer.php";
?>
