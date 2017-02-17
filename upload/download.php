<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php");
if(!isloggedin())
{
header("location: ../index.php");
}
else
{
$user=$_SESSION["user"];
}
$id=(int)$_REQUEST["id"];
if($id<1)
{
header('location: index.php');
exit();
}
$cquery=mysql_query("SELECT * FROM b_upload WHERE id=$id");
if(mysql_num_rows($cquery)==0)
{
header("location: index.php");
exit();
}
$info=mysql_fetch_array($cquery);
$name=$info["name"];
$downloads=$info["downloads"]+1;
mysql_query("UPDATE b_upload SET downloads='$downloads' WHERE id=$id");
header("location: files/$name");
?>
