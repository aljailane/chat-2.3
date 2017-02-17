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
if(!isloggedin())
{
header("location: index.php");
}
else
{
$user=$_SESSION["user"];
}
echo"<title>$config->title -- Online Users</title>";
echo"<div class='body_width'>";
include"topnav.php";
echo"<div class='breadcrumb'><a href='main.php'>Home</a> &raquo; Online Users</div>";
echo"<center>
	  
            <br> 
        <img src='http://www.9jacliq.com/images/xmas.png' height='110' width='728'>        <br>
        <div class='public_message'><div class='success'></div></div> 
     
</center>  

        
        
<div style='margin-top: 5px;' class='grid3'>  
	     
    	  
           
       
</div>";
echo"<div class='grid3 middle'>
        	<div class='b_head'>Online Users</div>";
$recent=date("U")-900;
$self=$_SERVER["PHP_SELF"];
$rowsperpage=3;
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
$numrows=mysql_num_rows(mysql_query("SELECT * FROM b_users WHERE lasttime>'$recent'"));
$totalpages=ceil($numrows/$rowsperpage);
if($currentpage>$totalpages)
{
$currentpage=$totalpages;
}
if($currentpage<1)
{
$currentpage=1;
}
$query=mysql_query("SELECT * FROM b_users WHERE lasttime>'$recent' LIMIT $offset, $rowsperpage");
if(mysql_num_rows($query)==0)
{
echo"<div class='msg'>No User Found</div>";
}
else
{
while($info=mysql_fetch_array($query))
{
$username=cleanvalues2($info["username"]);
$uid=$info["userID"];
$img=$info["photo"];
$status=$info["status"];
$status=wordwrap($status, 13, "<br/>\n");
if(empty($img))
{
$img="<img src='/avatars/nophotoboy.gif' alt='photo' height='100' width='80'>";
}
else
{
$img="<img src='/avatars/$img' alt='photo' height='100' width='80'>";
}
echo"           
            <div class='file-list'>
            	<ul>
                                	                    	<li>$img <a href='profile.php?uid=$uid'>$username</a></li></ul></div>";
}
if($currentpage>1)
{
echo"<a href='$self?currentpage=1'>[<b>First</b>]</a>";
$prevpage=$currentpage-1;
echo"<a href='$self?currentpage=$prevpage'>[<b>Prev</b>]</a>";
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
echo"<a href='$self?currentpage=$x'>[<b>$x</b>]</a>";
}
}
}
if($currentpage!=$totalpages)
{
$nextpage=$currentpage+1;
echo"<a href='$self?currentpage=$nextpage'>[<b>Next</b>]</a>";
echo"<a href='$self?currentpage=$totalpages'>[<b>Last</b>]</a>";
}
}
echo"<br><div class='link_button'><a href='main.php'>Go Back</div></a>";
include"footer.php";
?>
