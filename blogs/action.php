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
$level=user_info($user, level);
if($level==0)
{
echo"<title>ممنوع</title>";
echo"<div class='msg'><font color='red'>ليس لديك الإذن ديس</font></div>";
include"../footer.php";
exit();
}
include"../topnav.php";
$action=$_GET["action"];
if($action=="lock")
{
$id=(int)$_GET["id"];
$query=mysql_query("SELECT * FROM b_fbttopics WHERE id=$id");
if(mysql_num_rows($query)==0)
{
echo"<div class='msg'><font color='red'>المنتدى غير صالح</font></div>";
}
else
{
$query=mysql_query("UPDATE b_fbttopics SET locked=1 WHERE id=$id");
$msg="الموضوع مغلق بنجاح";
header("location: showtopic.php?id=$id&amsg=$msg");
exit();
}
}

if($action=="edittopic") {  if(isset($_POST["submit"])) {
$id=$_POST["id"];
$subject=cleanvalues($_POST["subject"]); $title=cleanvalues($_POST["title"]); if(empty($title) || strlen($title)<4 || empty($subject) || strlen($subject)<4) { echo"<div class='msg'>الرجاء التأكد من إدخال عنوان الرسالة والرسالة، وأنه يجب أن يكون أكبر من أربعة أحرف</div>"; } else {
$date=time();
mysql_query("UPDATE b_fbttopics SET `subject`='$subject', `title`='$title', `date`='$date' WHERE id=$id") or die(mysql_error()); $msg="حفظ بنجاح"; header("location: showtopic.php?id=$id&amsg=$msg"); exit(); } }
$id=(int)$_GET["tid"];
$info=mysql_fetch_assoc(mysql_query("SELECT * FROM b_fbttopics WHERE id=$id"));
$subject=cleanvalues2($info["subject"]); $title=cleanvalues2($info["title"]); echo"<form action='?action=edittopic' method='POST'><ul><li>عنوان الموضوع<br/><input type='text' name='title' value='$title'></li><input type='hidden' name='id' value='$id'><li>رسالة<br/><textarea name='subject'>$subject</textarea></li><li><center><input type='submit' name='submit' value='حفظ التغييرات' class='button'></center></li></ul></form>";
exit();
}
elseif($action==movetopic)
{
if(isset($_POST["submit"]))
{
$id=(int)$_POST["id"];
$finfo=mysql_fetch_assoc(mysql_query("SELECT * FROM b_fbtcat WHERE id=$id"));
$name=$finfo["name"];
$tid=(int)$_POST["tid"];
mysql_query("UPDATE b_fbttopics SET catid='$id' WHERE id=$tid") or die(mysql_error());
$msg="نقل الموضوع إلى <b>$name</b> الفئة بنجاح";
header("location: index.php?msg=$msg");
exit();
}
else
{
$tid=(int)$_GET["tid"];
echo"<div class='msg'>هل أنت متأكد من أنك تريد نقل هذا الموضوع؟</div>";
echo"<form action='?action=movetopic' method='POST'><ul><li>الانتقال إلى....<br/><select name='id'>";
$query=mysql_query("SELECT * FROM b_fbtcat");
while($row=mysql_fetch_assoc($query))
{
$cname=$row["name"];
$id=$row["id"];
echo"<option value='$id'>$cname</option>";
}
echo"</select></li><input type='hidden' name='tid' value='$tid'><li><input type='submit' name='submit' class='button' value='نقل'></li></ul></form>";
}
exit();
}
elseif($action=="delete")
{
$id=(int)$_GET["id"];
$query=mysql_query("SELECT * FROM b_fbtreplies WHERE id=$id");
if(mysql_num_rows($query)==0)
{
echo"الرد غير صحيح";
}
else
{
$delete=mysql_query("DELETE FROM b_fbtreplies WHERE id=$id");
$tid=$_GET["tid"];
$msg="بعد حذف بنجاح";
header("location: showtopic.php?id=$tid&amsg=$msg");
exit();
}
}
elseif($action=="edit")
{
print"<title>$config->title -- مرحلة ما بعد تحرير</title>";
//include"../topnav.php";
If(isset($_POST['update']))
{
$tid=$_POST["tid"];
$id=$_POST["id"];
$message=cleanvalues($_POST["message"]);
if(empty($message)||strlen($message)<4)
{
echo"<div class='msg'>لا يمكن أن تكون رسالة فارغة</div>";
}
else
{
$query=mysql_query("UPDATE b_fbtreplies SET message='$message' WHERE id=$id");
$msg="آخر تحديث بنجاح";
header("location: showtopic.php?id=$tid&amsg=$msg");
exit();
}
}
else
{
$tid=(int)$_GET["tid"];
$id=$_GET["id"];
$info=mysql_fetch_array(mysql_query("SELECT * FROM b_fbtreplies WHERE id=$id"));
$message=$info["message"];
$author=$info["poster"];
echo"<form action='?action=edit' method='POST'><div class='title'>تحرير الوظيفة من قبل $author</div><input type='hidden' name='id' value='$id'><input type='hidden' name='tid' value='$tid'><ul><li><textarea name='message' rows='10' cols='30'>$message</textarea></li><li><center><input type='submit' name='update' class='button' value='حفظ التغييرات'></center></li></ul>";
include"../footer.php";
exit();
}}

if($action=="unlock")
{
$id=(int)$_GET["id"];
$query=mysql_query("SELECT * FROM b_fbttopics WHERE id=$id");
if(mysql_num_rows($query)==0)
{
echo"<div class='msg'><font color='red'>تعليمي غير صالحة</font></div>";
}
else
{
$query=mysql_query("UPDATE b_fbttopics SET locked=0 WHERE id=$id");
$msg="الموضوع مقفلة بنجاح";
header("location: showtopic.php?id=$id&amsg=$msg");
exit();
}
}
else
{
echo"<div class='msg'><font color='red'>كيف تحصل هنا</red></div>";
}
?>
