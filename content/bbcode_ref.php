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
require("../init.php");
if(!isloggedin())
{ header("location: ../index.php"); } else
{ $user=$_SESSION["user"]; }
echo "<title>$config->title &raquo; BBcodes</title>";
echo"<style type='text/css'>
<!--
.style6 {color: #FFFFFF}
.style61 {color: #FFFF00}
.style59 {
color: #000000;

font-weight: bold;
}
.style45 {color: #FF0000}
.style60 {color: #00FF00}
.style54 {color: #00FFFF}
.style1 {	color: #FFFF00;
font-weight: bold;
}
.style3 {color: #FF0000; font-weight: bold; }
.style57 {font-family: Arial, Helvetica, sans-serif}
.style62 {color: #330066}
.style50 {font-size: 14px; color: #FF0000; }
.style51 {font-size: 13px}
-->
</style>

<div class='body_width'>";
include"../topnav.php";
echo"<div class='clearfix'></div>


<div style='clear: both'></div>

<center> ";
echo"<center>";
include"../ads.php";
fblike();

echo"</center>";
echo"<center>

<div class='public_message'><div class='success'></div></div>

</center>

<div style='margin-top: 5px;' class='grid3'>




</div>";
echo"<div class='grid3 middle'>
<div class='grid3 middle'>
<div class='b_head' align='center'><u><span class='style59'>BBC CODES! </span></u></div>
<p class='style50' align='center'><u><span class='style51'>يتم استخدام أكواد BB لإضافة تأثير إلى التعليق الخاص بك، واستخدامها أثناء تعليقه على المنتديات </span></u> <span class='style51' align='right'><br>
</span></p><p> [b]هنا تعليقگ[/b]:<br>
وهذا سيجعل التعليق الذي كتبته في المنتدى.<br>
مثال<strong> تعليقك  </strong>.</p>

<p>[u]رسالتك[/u]:استخدم هذا الكود<br>
ستظهر رسالتگ بالمنتدئ<br>
مثال:<u>رسالتگ.</u> </p>

<p>[blink]تعليقك[/blink]<br>
يظهر نصك ع شكل وميض ظهور واخفاء. </p>
<p>[color=Red]نصك باللون الاحمر [/color]<br>
وهذا سيعطي تعليقك لون معين تختاره مثل الأحمر، الأخضر إلخ<br>
<span class='style45'><span class='style6'>e.g</span> تعليقك</span></p>

<p>[i]تعليقك[/i]<br>
This will Make your Comment be in an Italic Form....<br>
e.g<em> Your Comment</em></p>

<p><span class='style6'>You can also Use any of this Icon, Just Copy and Paste them in your Post using PC or Opera 5</span><span class='style6'>:</span></p>
<p>☺ ☻ ♥ ♦ ♣ ♠ • ◘ ○ ◙ ♂♀ ♪ ← ∟ ↔ ▲ ▼ ☻ ♥ ♦ ♣ ♠ • ◘ ○ ◙ ▬ ↨ ↑ ↓ → ← ∟ ↔ <br/>  </p>

<p align='center'><span class='style51'>This BB Codes works in the Forum Alone</span><br>
<br>
</p><br><div class='link_button'><a href='../member/index.php'>Go Back</a></div></div>";
include"../footer.php";
?>
