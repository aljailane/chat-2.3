<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php");
if(!isloggedin()) { header("location: index.php"); }
else { $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo;  Upload Profile Picture</title>";
echo"<div class='body_width'>";
include "../topnav.php";
echo"<div class='breadcrumb'></div>";
echo"<center>";
include "../ads.php";
echo"</center>";
echo"<div class='grid3 middle'>
<div class='b_head'>تحميل الصورة الشخصية</div>";
echo"<font color='red'><center>تحذير:</font> لا تقم بتحميل صور عارية/ومخالفة للشرع الاسلامي</center><br/><b>حدد إحدى صور من جهازك لتحميلها bmp/png/gif/jpg</b>";
$folder="../avatars/";
$allowed_types=array('.jpg','.gif','.png','.bmp');
$filename=$_FILES["avatar"]["name"];
$ext=substr($filename, strpos($filename, '.'), strlen($filename)-1);
if(isset($_POST["submit"]))
{
if(!isset($_FILES["avatar"]) || $_FILES["avatar"]["size"]==0)
{
echo"<div class='msg'>لم يتم تحديد ملف</div>";
}
elseif(!in_array($ext, $allowed_types))
{
echo"<div class='msg'>$ext ليس على نوع المسموح به</div>";
} elseif(!file_exists($folder)) { echo"<div class='msg'>لا يوجد مجلد</div>";
} elseif(!is_writable($folder)) {
echo"<div class='msg'>المجلد غير قابل للكتابة</div>";
}
else
{
if(move_uploaded_file($_FILES["avatar"]["tmp_name"], $folder.$filename))
{
$user=$_SESSION["user"];
mysql_query("UPDATE b_users SET photo='$filename' WHERE username='$user'") or mysql_erro();
$msg="الصورة الشخصية التي تعامل";
header("location: settings.php?msg=$msg");
}
else
{
$msg="غير قادر على تحميل، الرجاء المحاولة مرة أخرى";
header("location: settings.php?msg=$msg");
}
}
}
//ERRORS HERE
echo"<form action='#' method='POST' enctype='multipart/form-data'><center><input type='file' name='avatar' size='13'></center><br/><center><input type='submit' class='button' name='submit' value='تحميل الان'></center><div class='gap'></div><div class='link_button'><a href='settings.php'>رجوع</a></div>";
include "../footer.php";
?>
