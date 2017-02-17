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
require("../init.php"); if(!isloggedin()) { header("location: index.php"); } else
{ $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo; Edit Profile</title>";
echo"<style type='text/css'>
<!--
.style1 {
color: #FF0000;
font-family: Arial, Helvetica, sans-serif;
font-size: 13px;
}
-->
</style>
<div class='body_width'>";
include "../topnav.php";
echo"<div class='breadcrumb'></div>";
echo"<center>";
include "../ads.php";
echo"</center>";
echo"<center>


</ceter>



<div style='margin-top: 5px;' class='grid3'>

</div>";

if(isset($_POST["submit"]))
{
$gender=$_POST["gender"];
$name=$_POST["name"];
$aljailane=$_POST["aljailane"];
$city=$_POST["city"];
$country=$_POST["country"];
$sex=$_POST["sex"];
$school=$_POST["school"];
$position=$_POST["position"];
$note=$_POST["note"];
//CLEAN VALUES
$name=cleanvalues($name);
$aljailane=cleanvalues($aljailane);
$city=cleanvalues($city);
$country=cleanvalues($country);
$note=cleanvalues($note);
$gender=cleanvalues($gender);
$sex=cleanvalues($sex);
$school=cleanvalues($school);
$position=cleanvalues($position);
$user=$_SESSION["user"];
mysql_query("UPDATE b_users SET name='$name', aljailane='$aljailane', city='$city', country='$country', note='$note', gender='$gender' , sex='$sex' , school='$school' , position='$position' WHERE username='$user'");
$pmsg="Profile details successfully updated";
header("location: settings.php?msg=$pmsg");
exit();
}
?>
<?php
$user=$_SESSION["user"];
$name=user_info($user, name);
$aljailane=user_info($user, aljailane);
$city=user_info($user, city);
$country=user_info($user, country);
$note=user_info($user, note);
$sex=user_info($user, sex);
$school=user_info($user, school);
$position=user_info($user, position);
$name=cleanvalues2($name);
$aljailane=cleanvalues2($aljailane);
$city=cleanvalues2($city);
$country=cleanvalues2($country);
$sex=cleanvalues2($sex);
$school=cleanvalues2($school);
$position=cleanvalues2($position);
$note=cleanvalues2($note);
$gender=user_info($user, gender);
$gender=cleanvalues2($gender);
?>
<form action='#' method='POST'><div class='grid3 middle'>
<div class='b_head'>تحرير ملف التعريف<br></DIV>الاسم الكامل
<br/><input type="text" name="name" value="<?php echo $name; ?>"><br/> حالتك 150 حرف
<br/><input type="text" name="aljailane" value="<?php echo $aljailane; ?>"><br/> مدينة
<br/><input type="text" name="city" value="<?php echo $city; ?>"><br/>البلد
<br/><input type="text" name="country" value="<?php echo $country; ?>"><br/>عني
<br/><textarea rows='4' cols='20' name='note'><?php echo $note; ?></textarea><br/><br>

<br/>

<center>الجنس الخاص بك<br> <select name='sex'><option value='ذكر'>ذكـــر</option><option value='انثى'>انثــئ</option>--SELECT---</option>";
echo"</select></center>

<br/>


<center>اختر دعاء او تسبيحة <br> <select name='school'><option value="غير محدد">لا شيئ</option>

<option value="سبحان الله وبحمدة سبحان الله العظيم">سبحان الله وبحمدة سبحان الله العظيم</option>
<option value="لا الة الا اللة محمد رسول اللة">لا الة الا اللة محمد رسول اللة</option>
<option value="اللهم اتنا بالدنيا حسنة وبالاخرة حسنة وقنا عذاب النار">اللهم اتنا بالدنيا حسنة وبالاخرة حسنة وقنا عذاب النار</option>

--SELECT---</option>";
echo"</select></center>

<br/>

<center>في اي مجال دراستك <br> <select name='position'><option value='طب'>طب</option><option value='هندسة'>هندسة</option>
<option value='تكنلوجيا'>تكنلوجيا</option>--SELECT---</option>";
echo"</select></center>

<br/>

<center><input type='submit' name='submit' value='تحديث' class='button'></center>
<?php
echo"<br><div class='center'><font color='red'><b>نرجو ملئ الحقول بشكل صحيح❤</b></font><br/></div><div class='link_button'><a href='settings.php'>الرجوع للخلف</a></div>";
include "../footer.php";
?>
