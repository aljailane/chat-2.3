<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php");
if(!isloggedin())
{ header("location: ../index.php");
} else { $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo; اعدادات الملف الشخصي</title>";
echo"<div class='body_width'>";
include "../topnav.php";
echo"<div class='breadcrumb'></div>";
echo"<center>";
include "../ads.php";
echo"</center>";
echo"<center>

</center>";
//ERROR HERE
$msg=$_GET["msg"];
if($msg!=="…… ")
{
echo"<div class='msg'>$msg</div>";
}

echo"
<div style='margin-top: 5px;' class='grid3'>




</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>إعدادات ملف التعريف</div><br><div class='list'>   <ul>  <li><a href='edit_profile.php'>تحرير التفاصيل الشخصية</a></li>   <li><a href='upload_photo.php'>تحميل الصورة الشخصية</a></li>   <li><a href='change_access.php'>تغيير كلمة المرور</a></li></li></ul></div><div class='link_button'><a href='index.php'>الرجوع للخلف</a></div>";
include "../footer.php";
?>
