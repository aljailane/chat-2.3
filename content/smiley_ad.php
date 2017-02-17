<?php
ERROR_REPORTING(0);
/*
Project: Aljbook 1.0
*/
require("../init.php");
if(!isloggedin())
{ header("location: ../index.php"); }
else { $user=$_SESSION["user"]; }
echo "<title>$config->title &raquo; فيسات</title>";
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
include"../topnav.php";
echo"<div class='clearfix'></div>


<div style='clear: both'></div>

<center> ";
echo"<center>";
include"../ads.php";

echo"</center>";
echo"<div class='grid3 middle'>
<div class='b_head'><u><span class='style59'>فيسات تعبيرية للمنتديات &amp; والدردشة! </span></u></div>
<p align='center'>ادخل الرمز التعريفي بالدردشه والمنتديات سيظهر فورا</p>
<table align='center' width='320'>
<tbody><tr>
<td width='170'><p align='center'><span class='style1'><u>فيسات مضحكة</u></span></p>
<table align='center' border='1' bordercolor='#00FF00' width='170'>
<tbody><tr>
<td width='120'><div align='center'><u><strong>الكود</strong></u></div></td>
<td width='200'><div align='center'><strong><u>الرمز</u></strong></div></td>
</tr>
<tr>
<td height='100'><div align='center'>
<form id='form1' name='form1' method='post' action=''>
<label>
<input name='textfield' value='(manu)' size='10' type='text'>
</label>
</form>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/manchester.jpg 'height='32' width='300'</div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield2' value='(chelsea)' size='11' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/chelsea.png' height='32' width='300'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield3' value='(arsenal)' size='10' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/arsenal.png' height='32' width='32'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield4' value='(liverpool)' size='12' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/liverpool.gif' height='32' width='32'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield5' value='(barca)' size='10' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/barca.jpeg' height='32' width='32'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield6' value='(madrid)' size='10' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/real.png' height='32' width='32'></div></td>
</tr>
</tbody></table>
<p align='center'><span class='style1'><u>اجتماعية</u></span></p>
<table align='center' border='1' bordercolor='#00FF00' width='158'>
<tbody><tr>
<td width='72'><div align='center'><u><strong>كود</strong></u></div></td>
<td width='70'><div align='center'><strong><u>الرمز</u></strong></div></td>
</tr>
<tr>
<td height='25;><div align='center'>
<form id='form1' name='form1' method='post' action=''>
<label>
<input name='textfield7' value='(admin)' size='10' type='text'>
</label>
</form>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/admin.gif' height='51' width='46'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield22' value='(anyone)' size='11' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/anyone.gif' height='40' width='60'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield32' value='(ban)' size='10' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/ban.gif' height='60' width='60'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield42' value='(goodnight)' size='13' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/goodnight.gif' height='40' width='66'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield52' value='(nicethread)' size='13' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/nicethread.gif' height='53' width='45'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield62' value='(spam)' size='10' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/spam.gif' height='46' width='64'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield622' value='(welcome)' size='13' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/welcome.gif' height='45' width='60'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield6222' value='(lies)' size='7' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/lies.gif' height='51' width='46'></div></td>
</tr>
</tbody></table>
<p align='center'><span class='style1'><u>حزن وزعل</u></span></p>
<table align='center' border='1' bordercolor='#00FF00' width='158'>
<tbody><tr>
<td width='72'><div align='center'><u><strong>كود</strong></u></div></td>
<td width='70'><div align='center'><strong><u>الرمز</u></strong></div></td>
</tr>
<tr>
<td height='25'><div align='center'>
<form id='form1' name='form1' method='post' action=''>
<label>
<input name='textfield72' value='هع' size='10' type='text'>
</label>
</form>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/lol.png' height='28' width='28'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield222' value='(cool)' size='11' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/cool.gif' height='28' width='28'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield322' value='(chessy)' size='10' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/cheesy.gif' height='28' width='28'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield422' value='(tongue)' size='13' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/tongue.gif' height='28' width='28'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield522' value='(huh)' size='13' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/huh.gif' height='28' width='28'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield623' value='(drool)' size='10' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/drool.gif' height='28' width='28'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield6223' value='(cupid)' size='13' type='text'>
</div></td>
<td><div align='center'><img src=".$config->url."/addons/smileys/cupid.gif' height='26' width='39'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield62222' value='(drunk)' size='10' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/drunk.gif' height='30' width='58'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield622222' value='(exclaim)' size='11' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/exclaim.gif' height='15' width='15'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield6222222' value='(love)' size='11' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/love-flower.gif' height='15' width='15'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield62222222' value='(celebration)' size='13' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/celebration.gif' height='43' width='47'></div></td>
</tr>
<tr>
<td height='26'><div align='center'>
<input name='textfield62222223' value='(love2)' size='11' type='text'>
</div></td>
<td><div align='center'><img src='".$config->url."/addons/smileys/love_002.png' height='32' width='32'></div></td>
</tr>
</tbody></table></td>
</tr>
</tbody></table>
<p align='center'></p><br><div class='link_button'><a href='index.php'>رجوع</a></div>";
include"../footer.php";
?>
