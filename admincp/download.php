<?php
include "monit.php";
/*
Project: PBNL Forum v2.3.5

Coded By: Adegboye Joshua (JOSHUAEASY)

Facebook: http://facebook.com/JOSHUAEASY

Email: (adegboyejoshua@gmail.com)

CellPhone +2348137536702

Twitter: @herdaywhaley

WebSite: http://www.9jatech.tk
*/if(!isloggedin())
{ header("location: ../index.php"); }
else { $user=$_SESSION["user"]; }
$id=(int)$_REQUEST["id"];
if($id<1) { header('location: index.php'); exit();
}
$cquery=mysql_query("SELECT * FROM b_upload WHERE id=$id");
if(mysql_num_rows($cquery)==0)
{
header("location: index.php");
exit(); } $info=mysql_fetch_array($cquery);
$name=$info["name"];
$downloads=$info["downloads"]+1;
mysql_query("UPDATE b_upload SET downloads='$downloads' WHERE id=$id");
header("location: ../upload/files/$name"); ?>
