<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php");
if(!isloggedin())
{ header('location: ../index.php'); }
else { $user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==1) { header("location: ../logout.php"); exit(); } else { updateonline(); } }
echo "<title>$config->title &raquo; Forums</title>";
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
font-size: 13px;
}
.style5 {
font-family: Georgia, 'Times New Roman', Times, serif;
font-size: 13px;
}
-->
</style><div class='body_width'>";
include"../topnav.php";
echo"<div class='clearfix'></div>


<div style='clear: both'></div>



<center> ";
echo"<center>";
include"../ads.php";

echo"</center>";


$msg=cleanvalues2($_GET["msg"]);
if($msg!==" ")
{
echo"<div class='msg'>$msg</div>";
}

echo"</center>";
echo"<div style='margin-top: 5px;' class='grid3'>

<br />


</div>
";
echo"<div class='grid3 middle' align='center'><div class='b_head'>المنتديـــــات<br></div>";
echo"<div class=''><span class='style2'></span> <span class='style4'></span>
<a href='search.php'><img src='../images/search.gif' width='20' height='20' border='0'><br>بحث عن مواضيع</a><div class='style4'> </div>
<br>";
$query=mysql_query("SELECT * FROM b_forums ORDER BY id DESC");
$count=mysql_num_rows($query);
if($count>0)
{
while($row=mysql_fetch_array($query))
{
$name=cleanvalues2($row["name"]);
$id=$row["id"];
$topics=$row["topics"];
$img=$row["img"];
if(!empty($img))
{
$img="<img src='$img' alt='img' height='48' width='48'/>";
}
else
{
$img="<img src='../images/general_news.png' alt='img' height='48' width='48'/>";
}
$nquery=mysql_query("SELECT * FROM b_topics WHERE forumid=$id");
$num=mysql_num_rows($nquery);
echo"<div class='forum_container'>  <div class='forum-list'>  <ul>    <li>    <table border='0' width='100%'>  <tbody><tr>  <td width='8%'>$img</td><td width='92%'>   <table border='0' width='100%'>   <tbody><tr> <td class='a5'><a href='topics.php?id=$id'><font color='blue'>$name</font> ($num) - $numrows</a></td>   </tr>   <tr> <td class='alj1'>        <div align='right'>  تنوية: جميع مايكتب بالمنتديات يعبر عن راي كاتبه ولا يعبر عن راي ادارة الموقع
$lastposter</div>
</td>   </tr>   </tbody></table>  </td>  </tr>    </tbody></table>  </li></div></div>    ";
}
}
else
{
echo"<font color='red'><center>No forum created yet</center></font>

";
}

echo "</div></div>
<div class='grid3' style='margin-top: 5px;'>

</div>   <div class='clearfix'></div>  </div> </div>";
include"../footer.php";?>


