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

include('../moduls/init.php');
if(!isloggedin())
{ header("location: ../index.php"); }
else { $user=$_SESSION["user"];
} echo"<title>$config->title &raquo; Prov Maker</title>";
echo"<div class='body_width'>";
include "../topnav.php";
echo"<div align='center'>";
include "../ads.php";
fblike();
echo"</div>";
echo"<center>
<div class='public_message'><div class='success'></div></div>

</center>




<div style='margin-top: 5px;' class='grid3'>

<br />

</div>";
echo"<div class='grid3 middle'>
<div class='b_head'>Prov Maker</center></div>";
?> echo"<li><form action="http://xmlprov.com/apc/" method="post"> <p>Prov Name: <br/> <input type="text" name="val[prov_name]" class="input" value="JOSHUAEASY <?php echo "$config->title"; ?>"/></p> <p>Proxy Apn: <br/> <input type="text" name="val[prov_access_apn]" class="input" value=""/></p> <p>Proxy Ip:<br/> <input type="text" name="val[prov_access_ip]" class="input" value=""/></p> <p>Proxy Port: <br/> <input type="text" name="val[prov_access_port]" class="input" value=""/></p> <p>Username: <br/> <input type="text" name="val[prov_username]" class="input" value=""/></p> <p>Password: <br/> <input type="text" name="val[prov_password]" class="input" value=""/></p><p><input type="submit" name="action[generate_apc]" class="submit" value="Create Prov"/> </p></form></li>"; <?php include ("footer.php");
?>
