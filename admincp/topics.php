<?php
/*
Project: AljBook 1.0
*/
include('monit.php');
echo"<div class='topnav'><a href='forum.php'>جميع المنتديات</a></div><div class='center'>هنا يمكنك يمكن نقل أو حذف مواضيع المنتدى</div>";
$msg=$_GET["msg"];
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
mysql_query("UPDATE b_topics SET forumid='$cid' WHERE id=$id");
$cinfo=mysql_fetch_assoc(mysql_query("SELECT * FROM b_forums WHERE id=$cid"));
$cname=$cinfo["name"];
$msg="نقل إلى موضوع المنتدى $cname المنتدى بنجاح";
header("location: ?msg=$msg");
exit();
}
else
{
$id=(int)$_GET["id"];
echo"<div class='msg'>هل أنت متأكد أنك تريد نقل هذا الموضوع إلى منتديات أخرى؟</div>";
echo"<form action='?action=move' method='POST'><ul><li>الانتقال إلى.....<br/><select name='cid'>";
$query=mysql_query("SELECT * FROM b_forums");
while($row=mysql_fetch_array($query))
{
$cname=$row["name"];
$pid=$row["id"];
echo"<option value='$pid'>$cname</option>";
}
echo"</select></li><input type='hidden' name='id' value='$id'><li><input type='submit' name='move' class='button' value='نقل'></li></ul></form>";
exit();
}
}
if($action=="Delete")
{
if(isset($_GET["yes"]) & $_GET["yes"]==true)
{ $id=(int)$_GET["id"];
$query=mysql_query("DELETE FROM b_topics WHERE id=$id");
if($query)
{
$msg="منتدى الموضوع محذوفة بنجاح";
}
else
{
$msg=mysql_error();
}
header("location: ?msg=$msg");
}
$id=(int)$_GET["id"];
echo"<div class='topnav'>نظام الإنذار</div><div class='msg'>هل تريد حذف هذا الموضوع؟</div><div class='gap'></div><div class='button'><a href='?action=Delete&yes=true&id=$id'><font color='red'>نعم</font></a> | <div class='right'><a href='?'>لا</a></div></div>";
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
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_topics"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$tquery=mysql_query("SELECT * FROM b_topics ORDER BY id DESC LIMIT $offset, $rowsperpage");
if(mysql_num_rows($tquery)==0)
{
echo"<div class='msg'>لا توجد ملفات حتى الآن</div>";
}
else
{
echo"<div class='title'>مواضيع المنتدى</div>";
while($info=mysql_fetch_assoc($tquery))
{
$fid=$info["id"];
$name=$info["subject"];
$by=$info["poster"];
$date=$info["date"];
$date=date("D d, M Y", $date);
$catid=$info["forumid"];
$cinfo=mysql_fetch_assoc(mysql_query("SELECT * FROM b_forums WHERE id=$catid"));
$cat=$cinfo["name"];
$link="<a href='?action=move&id=$fid'>[نقل]</a>- <div class='right'><a href='?action=Delete&yes=true&id=$fid'>[حذف]</a>";
echo"<ul><li>*<a href='../forum/showtopic.php?id=$fid'><b>$name</b></a><br/>منتدى:- $cat<br/>بواسطة:- $by<br/>$date<br/>$link</li></ul>";
}
if($currentpage>1)
{
echo"<a href='$self?currentpage=1&id=$id&sort=$sort'>[<b>قديم</b>]</a>";
$prevpage=$currentpage-1;
echo"<a href='$self?currentpage=$prevpage&id=$id&sort=$sort'>[<b>سابق</b>]</a>";
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
echo"<a href='$self?currentpage=$nextpage&id=$id&sort=$sort'>[<b>تالي</b>]</a>";
echo"<a href='$self?currentpage=$totalpages&id=$id&sort=$sort'>[<b>احدث</b>]</a>";
}
}
echo"<div class='button'><a href='forum.php'>رجوع</a></div>";
include"../footer.php";
?>
