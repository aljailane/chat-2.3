<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("init.php");
echo"<title>$configg->title &raquo; Registration</title>";

echo"<div class='alj1'><div class='alj1'><div class='middle'><p class='b_head' style='margin-left: 3px; text-align:center;'>تسجيل عضوية جديدة</p>
<div class='m_signup'><center><span class='style1'><u><font color='black'> $config->title قواعد التسجيل!</font></u></span><br><div class='gap'></div><ul>
<div class='center'><font color='red'>*</font> لا يطول اسم المستخدم عن  <font color='red'><b>15</b></font> حرف<br/>
<font color='red'>*</font>املأ التفاصيل الخاصه بك لن ياخذ منك وقت<br/>
<font color='red'>*</font>اختر اسم لائق فيك وقصير </div></ul><hr>";
?>
<?php if($_POST["submit"])
{
//Retrieve form values
$username=$_POST["username"];
$password=$_POST["password"];
$number=$_POST["number"];
$email=$_POST["email"];
$country=$_POST["country"];
$state=$_POST["state"];
$sex=$_POST["sex"];
$school=$_POST["school"];
$position=$_POST["position"];
$erros=array();

//clean up the values
$username=cleanvalues($username);
$password=cleanvalues($password);
$email=cleanvalues($email);
$number=cleanvalues($number);
$country=cleanvalues($country);
$state=cleanvalues($state);
$sex=cleanvalues($sex);
$school=cleanvalues($school);
$position=cleanvalues($position);

//Validate values & store errors
//username
if(empty($username)||strlen($username)<4)
{
$errors[]="اسم المستخدم قصير جداً";
}
if(strlen($username)>25)
{
$errors[]="اسم المستخدم طويلة جداً";
}

$checkuser=mysql_query("SELECT *  FROM b_users WHERE username='$username'");
if(mysql_num_rows($checkuser)>0)
{
$errors[]="اسم المستخدم هذا موجود بالفعل";
}

if(!preg_match("^[A-Za-z0-9ا-ي]^", "$username"))
{
$errors[]="اسم المستخدم يحتوي على أحرف غير صالحة";
}
//Email
if(!preg_match("/([\w\-]+\@[\w\-]+.[\w\-]+)/", $email) || strlen($email)<4)
{
$errors[]="أدخلت بريد إلكتروني غير صالح";
}
$checkemail=mysql_query("SELECT * FROM b_users WHERE email='$email'");

if(mysql_num_rows($checkemail)>0)
{
$errors[]="البريد الإلكتروني موجودة بالفعل";
}
//NUMBER
$checknumber=mysql_query("SELECT * FROM b_users WHERE number='$number'");
if(mysql_num_rows($checknumber)>0||!ctype_digit($number)||strlen($number)<4)
{
$error[]="هذا الرقم موجود بالفعل";
}

if(count($errors)==0)
{//ERROR FREE
//echo "success";

$spassword=md5($password);
//PREPARE UR CODE
$supervalue=$value;
$day=date("U");
$seedval=$day%10000;
srand($seedval);
$key=RAND(1000000, 2000000);
$query="INSERT INTO b_users(username,password,email,keynode,validated,number,country,sex,school,position,state,regtime) values('$username','$spassword','$email','$key','1','$number','$country', '$sex', '$school', '$position', '$state','$date')";
$query2=mysql_query($query) or die(mysql_error());
$regmsg="تم تسجيلگ بنجاح شكرا لانضمامك";
header("location: index.php?msg=$regmsg");
exit();
}
else
{//GAT SOME ERROR ??
foreach($errors as $error){ $tmp.="$error<br/>"; }
}
}
if($tmp!=" ") echo "<div class='msg'>$tmp</div>"; ?><div class='ad2'><form action="#" method="POST">
<center>اسم عضويتگ:<br/>
<input class="bblue" type="text" name="username" size="10"><br/>
كلمة المرور: <br/><input type="password" name="password"><br/>
البريد الالكتروني مثال: 
<br>name@name.com<br/>
<input class="button" type="text" name="email" values="email" size="20">
<br/>


<center>الجنــس:<br> <select name='sex'><option value='ذكر'>ذكـــر</option><option value='انثى'>انثى</option>اختر جنسك</option>";
echo"</select></center>
<br/><input class="bblue" type="submit" name="submit" value="تسجيــل"></center></form></div>
<br><br>
<center><img src="images/home.gif" alt="*"/><a href="index.php"> عـودة</a></center>
<div class="clearfix"></div>
</div>
</div>

</div>  </div>
<?
include"footer.php";
?>
