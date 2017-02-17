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
{
header("location: ../index.php");
}
else
{
$user=$_SESSION["user"];
}
echo"<title>$config->title -- BBcodes</title>";
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

echo"<center>
	  
            <br> 
        <img src='http://www.9jacliq.com/images/xmas.png' height='110' width='728'>        <br>
        <div class='public_message'><div class='success'></div></div> 
     
</center>  

        
        
<div style='margin-top: 5px;' class='grid3'>  
	     
    	  
           
       
</div>";
echo"<div class='grid3 middle'>
        	<div class='grid3 middle'>
        	<div class='b_head'><u><span class='style59'>9jacliq BBC CODES! </span></u></div>
            <p class='style50' align='center'><u><span class='style51'>BB codes are Used to Add Effect to your Comment, Use them while commenting on 9jacliq Forums!</span></u> <span class='style51'><br>
                  </span></p>
            <table align='center' border='1' bordercolor='#00FF00' cellpadding='0' cellspacing='0' width='403'>
              <tbody><tr>
                <td class='style51' height='457' valign='top' width='370'><p> [b]Your Comment[/b]:<br>
                  This will make the Comment you Typed in the Forum.<br>
                  e.g<strong> Your Comment </strong>.</p>
                    <table border='0' cellpadding='0' cellspacing='0' width='403'>
                      <tbody><tr>
                        <td bgcolor='#00FF00'><span class='style60'>.</span></td>
                      </tr>
                    </tbody></table>
                  <p>[u]Your Comment[/u]:<br>
                    This will Underline the Comment you Posted in the Forum . <br>
                    e.g <u>Your Comment.</u> </p>
                  <table border='0' cellpadding='0' cellspacing='0' width='403'>
                      <tbody><tr>
                        <td bgcolor='#00FF00'><span class='style60'>.</span></td>
                      </tr>
                    </tbody></table>
                  <p>[blink]Your Comment[/blink]<br>
                    This will Make the Comment Blink, So it will come On and Off. </p>
                  <table border='0' cellpadding='0' cellspacing='0' width='403'>
                      <tbody><tr>
                        <td bgcolor='#00FF00'><span class='style60'>.</span></td>
                      </tr>
                    </tbody></table>
                  <p>[color=Red]Your Comment[/color]<br>
                    This will give your Comment a Particular color you choose e.g Red, Green etc<br>
                    <span class='style45'><span class='style6'>e.g</span> Your Comment</span></p>
                  <table border='0' cellpadding='0' cellspacing='0' width='403'>
                      <tbody><tr>
                        <td bgcolor='#00FF00'><span class='style60'>.</span></td>
                      </tr>
                    </tbody></table>
                  <p>[i]Your Comment[/i]<br>
                    This will Make your Comment be in an Italic Form....<br>
                    e.g<em> Your Comment</em></p>
                  <table border='0' cellpadding='0' cellspacing='0' width='403'>
                      <tbody><tr>
                        <td class='style6' bgcolor='#00FF00'>.</td>
                      </tr>
                    </tbody></table>
                  <p><span class='style6'>You can also Use any of this Icon, Just Copy and Paste them in your Post using PC or Opera 5</span><span class='style6'>:</span></p>
                  </td>
              </tr>
            </tbody></table>
            <p align='center'><span class='style51'>This BB Codes works in the Forum Alone</span><br>
       	      <br>
   	        </p><br><div class='link_button'><a href='index.php'>Go Back</a></div></div>";
include"../footer.php";
?>
