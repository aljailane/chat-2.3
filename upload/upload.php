<?php
ERROR_REPORTING(0);
/*
Aljbook 1.0
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
echo"<title>$config->title &raquo; Upload File</title>";
echo"<style type='text/css'>
<!--
.style1 {color: #FF0000}
.style2 {
color: #FFFF00;
font-weight: bold;
}
-->
</style>
<div class='body_width'>";
include"../topnav.php";
echo"<div class='breadcrumb'><a href='../main.php'>البداية</a>&raquo; <a href='index.php'>مركز التحميل</a> &raquo; رفع الملفات </div>";
echo"<center>";
include"../ads.php";
echo"</center>";

echo"<div class='alj1'>
<div class='b_head'>ارفع ملف جديد</div>";
echo"<p> <span class='a'><strong>-</strong></span> اختر ملف تحميل حسب القسم المخصص<br>
<span class='a'><strong>-</strong></span> نرجو عدم ترك وصف الملف</p><br/><b>اختر الملف المراد تحميله</b><div class='gap'></div>";
$folder="files/";
$allowed_types=array('.mp3','.m4a','.acc','.zip','.wav','.rar','.3gp','.jpg','.png','.gif','.jpeg','.amr','.rm','.ram','.pdf','.mp2','.mp4');
$maxsize=10485760;
$filename=$_FILES["file"]["name"];
$check="files/$filename";
$ext=substr($filename, strpos($filename, '.'), strlen($filename)-1);
if(isset($_POST["submit"]))
{
$type=$_FILES["file"]["type"];
$filesize=$_FILES["file"]["size"];
$type=$_FILES["file"]["type"];
$description=$_POST["description"];
$cat=$_POST["cat"];
if(!isset($_FILES["file"]) || $_FILES["file"]["size"]==0)
{
echo"<div class='msg'>لم يتم تحديد  ملف</div>";
}
elseif(file_exists($check))
{
echo"<div class='msg'>إنهاء اسم الملف مسبقاً</div>";
}
elseif(!isset($cat) || empty($cat))
{
echo"<div class='msg'>الرجاء اختيار قسم مخصص</div>";
}
elseif(empty($description) || strlen($description)<4)
{
echo"<div class='msg'>وصف الملف إلزامي</div>";
}
elseif(!in_array($ext, $allowed_types))
{
echo"<div class='msg'>$ext وليس المسموح بها type</div>";
}
elseif(!file_exists($folder))
{
echo"<div class='msg'>لا يوجد مجلد</div>";
}
elseif(!is_writable($folder))
{
echo"<div class='msg'>المجلد غير قابل للكتابة</div>";
}
else
{
if(move_uploaded_file($_FILES["file"]["tmp_name"], $folder.$filename))
{
$date=time();
$user=$_SESSION["user"];
mysql_query("INSERT INTO b_upload SET `name`='$filename', `description`='$description', `by`='$user', `size`='$filesize', `extension`='$ext', `date`='$date', `catid`='$cat', `type`='$type'") or mysql_error();
$msg="شكرآ تم رفع الملف بنجاح";
header("location: index.php?msg=$msg");
}
else
{
$msg="غير قادر على التحميل، الرجاء المحاولة مرة أخرى";
header("location: index.php?msg=$msg");
}
}
}
//ERRORS HERE
echo"<div class='a5'><form action='#' method='POST' enctype='multipart/form-data'><ul><li><center><input type='file' name='file' size='8'></li><li><b>تحديد ملفگ</b><br/><select name='cat'><option value='0'>--اختيار قسم مخصص--</option>";
$query=mysql_query("SELECT * FROM b_uploadcat");
while($info=mysql_fetch_array($query))
{
$id=$info["id"];
$name=$info["name"];
echo"<option value='$id'>$name</option>";
}
echo"</select></li><li><b>الوصف </b><br/><textarea rows='5' cols='20' name='description'></textarea></li><li><input type='submit' class='button' name='submit' value='تحميل الان'></center></li></ul></form></div>";
echo"<div class='left'>
<b><br>
الحجم المسموح
:</b> 10 Mb<br>
<b>الامتدادات المسموحة:</b> mp3/m4a/acc/zip/wav/rar/ 3gp/jpg/png/gif/ jpeg/amr/rm/ram /pdf/mp2/mp4
<br>
اذا كان لديك امتداد جديد ارسلة لنا وسنقوم باضافته
</div>

<br>
<br>
<div class='link_button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
?>
