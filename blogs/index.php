<?php 
ERROR_REPORTING(0);

/*
Project: Aljbook 1.0
*/
require("../init.php");
if(!isloggedin())
{
header('location: index.php');
}
else
{
$user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==1)
{
header("location: ../logout.php");
exit();
}
else
{
updateonline();
}
}
echo"<title>$config->title - سجل الزوار</title>";
echo"<div class='body_width'>";
include"../topnav.php";
echo"<style type='text/css'>
<!--
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}
.style3 {font-size: 11px}
.style4 {
	color: #00FF00;
	font-weight: bold;
}
.style5 {
	color: #FF0000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
}
.style6 {
	color: #FF0000;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
}
.style11 {
	font-family: Georgia, 'Times New Roman', Times, serif;
	font-size: 12px;
}
.style14 {font-family: Georgia, 'Times New Roman', Times, serif}
-->
</style>";
echo"<div class='body_width'>";
echo"<div class='clearfix'></div>  
</div>  

<div style='clear: both'></div>  

 <div class='breadcrumb'><a href='../main.php'>البداية</a> &raquo; المدونة</div>";
echo"<center>";
include"../ads.php";
echo"<div class='grid3 middle'>     <div class='b_head'>انشئ تدوينتگ</div>";
$msg=cleanvalues2($_GET["msg"]);
if(!empty($msg))
{
echo"<div class='msg'>$msg</div>";
}
echo"<div class=''>
        <p><span class='style6'>
          <!-- google_afm -->        </span></p>
        <p><span class='style6'>          نصائح:</span> <span class='style21 style2 style11'><span class='style21 style14'>مرحبا بك  ؟ { انشئ تدوينتگ بالقسم المخصص } </span></span>
          <br>
          <br>
                 
             </p>
      </div>";
$query=mysql_query("SELECT * FROM b_fbtcat ORDER BY id DESC");
$count=mysql_num_rows($query);
if($count>0)
{
while($row=mysql_fetch_array($query))
{
$name=$row["name"];
$id=$row["id"];
$description=$row["description"];
$img=$row["img"];
if(!empty($img))
{
$img="<img src='/images/$img' alt='IMG'border='0' height='50' width='50'/>";
}
else
{
$img="No Img";
}
echo"         <ul>          
    
       <li>  
         <div class='ad1'><a href='topics.php?id=$id'><b>$name</b></a></div><div class='fbt-category-detail'> $description		   
            </div> 
<br>        
          </li>               
       <li>";
}
}
else
{
echo"<div class='msg'><font color='red'><center>لا يوجد</center></font></div><div class='gap'></div>";
}
echo"<div class='link_button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
?>
