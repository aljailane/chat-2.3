<?php ERROR_REPORTING(0);
/*
Project: Aljailane
*/
include("../init.php");
if(!isloggedin())
{ header('location: ../index.php');
exit(); } else { $user=$_SESSION["user"];
$banned=user_info($user, banned);
if($banned==0) { updateonline(); } else { header('location: ../logout.php'); exit(); } }
echo"<div class='body_width'>"; echo"<div class='page_w'>"; include "../topnav.php"; echo"<div style='clear: both'></div><br>";
echo"<center>";
include "../ads.php";
echo"</center>"; 
?>

<style type="text/css">
<!--.style7 { color: #FFFFFF; font-size: 13px; font-family: Arial, Helvetica, sans-serif; } .style70 {font-size: 12px} .style73 {color: #00FF00}
--></style>
<div class="alj1">
<table style="width:100%" align='center'>
  <tr> سيتم اضافة المزيد قريبا<p class='a5'>
    <th>الرمز</th>
    <th>الصورة</th> 
</p>
<hr>
    <td>هع</td>
    <td><img src='../icons/ah.gif' alt='photo' height='40' width='40' /></td> 
<hr>
    <td>وردة</td>
    <td><img src='../icons/ward.gif' alt='photo' height='40' width='40' /></td> 
<hr>
  </tr>
  <tr>
    <td>ضرب</td>
    <td><img src='../icons/drb.gif' alt='photo' height='40' width='40' /></td> 
<hr>
    <td>نايس</td>
    <td><img src='../icons/nic.gif' alt='photo' height='40' width='40' /></td> 
<hr>
    <td>رفص</td>
    <td><img src='../icons/rafs.gif' alt='photo' height='40' width='40' /></td> 
<hr>
    <td>بوسة</td>
    <td><img src='../icons/busa.gif' alt='photo' height='40' width='40' /></td> 
<hr>
    <td>هههه</td>
    <td><img src='../icons/haha.gif' alt='photo' height='40' width='40' /></td> 
<hr>
    <td>بفكر</td>
    <td><img src='../icons/fkr.gif' alt='photo' height='40' width='40' /></td> 
<hr>
  
  </tr>
</table>
</div>

<!-- Footer --><?php include "../footer.php"; ?><br /><!-- End Footer --> </body>  </html>
