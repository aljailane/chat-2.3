<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php");
if(!isloggedin())
{ header("location: ../index.php"); }
else { $user=$_SESSION["user"]; }
echo"<title>$config->title &raquo; Privacy Policy</title>";
echo"<style type='text/css'>
<!--
.style1 {
color: #FF0000;
font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
}
.style2 {font-size: 12px; font-family: Arial, Helvetica, sans-serif;}
.style3 {color: #000000}
-->
</style>
<div class='body_width'>";
include "../topnav.php";
echo"<center>";
include "../ads.php";
echo"</center><div class=\"b_head\">سياسة الخصوصية</div>";
echo "<center>
أي الإعلانات التي تخدمها شركة غوغل، والشركات التابعة لها قد يمكن التحكم باستخدام ملفات تعريف الارتباط. هذه الملفات تسمح جوجل لعرض الإعلانات استناداً إلى الزيارات لهذا الموقع والمواقع الأخرى التي تستخدم خدمات Google الإعلانية. تعلم كيفية الانسحاب من استخدام جوجل ملفات تعريف الارتباط. كما ذكر أعلاه، يخضع أي تتبع به Google من خلال الكوكيز وغيرها من آليات سياسات خصوصية Google الخاصة.

<h4>حول جوجل الإعلان:</h4>
ما هو ملف تعريف الارتباط DoubleClick DART؟ يستخدم ملف تعريف الارتباط DoubleClick DART جوجل في الإعلانات خدم في مواقع الناشر عرض AdSense للمحتوى الإعلانات. عند زيارة المستخدمين للموقع AdSense للناشر وأما عرض أو النقر فوق أحد إعلانات، قد يتم إسقاط ملف تعريف ارتباط على المستعرض الخاص بالمستخدم نهاية هذا. سيتم استخدام البيانات التي تم جمعها من ملفات تعريف الارتباط هذه لمساعدة الناشرين AdSense أفضل وإدارة الإعلانات على الموقع (المواقع) وعبر شبكة الإنترنت. يمكن للمستخدمين اختيار عدم استخدام ملف تعريف الارتباط DART عن طريق زيارة جوجل الإعلانية ومحتوى شبكة سياسة الخصوصية.
<h3>معلومات الاتصال</h3>
مخاوف أو أسئلة حول سياسة الخصوصية هذه يمكن أن تكون موجهة إلى
<b> $config->email </b>لمزيد من التوضيح.
<br/><b>1)</b> وقد وضعت عامل تصفية كلمة في المكان لمنع أعضاء المنتدى من استخدام عبارات جنسية صريحة في مناصبهم.<br/><b>2)</b> وقد أبلغ أعضاء منظمتنا أنهم بحاجة إلى إبقاء كلماتهم نظيفة إذا كان الموقع البقاء على قيد الحياة.

<br/><b>3)</b> وقد صيغت سياسة خصوصية $config->title

أنا على استعداد للقيام بكل ما قد يلزم بالإضافة إلى ذلك جعل موقعي الشكوى تماما مع نهج الخاص بك.</p>";
echo"<div class='gap'></div><br><div class='link_button'><a href='../member/index.php'>رجوع</a></div>";
include "../footer.php";
?>
