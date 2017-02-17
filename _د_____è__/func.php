<?php
function isloggedin()
{
if(isset($_SESSION["user"])) return true;
else return false;
}
function getworth($user)
{
$perchat = 2; //Worth of each chat post
$pertopic = 10; //Worth of each topic created
$perrep = 5; //worth of each reply
$name = 'نقطة'; //Name of currency. Can be empty
$symbol = 'C'; // symbol of currency leave empty for nothing.

$chat = mysql_num_rows(mysql_query("SELECT * FROM b_chat WHERE chatter='$user'")); //Number of chat user made
$tchat = $chat * $perchat; //The actual worth of chat

$reply = mysql_num_rows(mysql_query("SELECT * FROM b_replies WHERE poster='$user'")); //reply to forum

$treply = $reply = mysql_num_rows(mysql_query("SELECT * FROM b_tutorialreplies WHERE poster='$user'")); //reply to tutorials
$replysum = $reply + $treply; //sum them up

$actrep = $replysum * $perrep; //actual worth of replies

$topic = mysql_num_rows(mysql_query("SELECT * FROM b_topics WHERE poster='$user'")); // Number of topics made

$ttopic = mysql_num_rows(mysql_query("SELECT * FROM b_tutorialtopics WHERE poster='$user'")); // Number of tutorial topics made

$acttop = $topic * $pertopic; //Worth of forum topics

$total = $tchat + $actrep + $acttop; // The total money worth

$returnee = $symbol.$total.' '.$name; return $returnee;}

function cleanvalues($string)
{
$string=trim($string);
return $string;
}
$user=$_SESSION["user"];
function user_info($user, $field)
{
//echo"$user and $field success";
$query=mysql_query("SELECT $field FROM b_users WHERE username='$user'");
$info=mysql_fetch_array($query);
$info=$info[$field];
return $info;
}

function user_info2($uid, $field)
{
//echo"$user and $field success";
$query2=mysql_query("SELECT $field FROM b_users WHERE userID=$uid") or mysql_error();
//echo"$field<br/>";
$info=@mysql_fetch_array($query2);
//print_r($info);
$info=$info[$field];
return $info;
}

function getrank($num)
{
if($num==0)
{
return "عضو جديد";
}
elseif($num==1)
{
return "مسئول عام";
}
elseif($num==2)
{
return "مدير الموقع";
}
}

function get_rows($table_and_query)
{
$total=mysql_query("SELECT COUNT(*) FROM $table_and_query");
$total=mysql_fetch_array($total);
return $total[0];
}

function get_row($query)
{ $total=mysql_num_rows(mysql_query($query));
return $total;
}

function cleanvalues2($string)
{
$string=strip_tags($string);
//$string=preg_replace("/[!#$%^&*<>+=]/", ' ', $string);
//$string=str_replace("", '', $string);
$string=htmlentities($string, ENT_QUOTES);
return $string;
}

function bbcode($string){
$string = preg_replace("(\[b\](.+?)\[\/b])is",'<b>$1</b>',$string);
$string = preg_replace("(\[center\](.+?)\[\/center])is",'<center>$1</center>',$string);
$string = preg_replace("(\[i\](.+?)\[\/i])is",'<i>$1</i>',$string);
$string = preg_replace("(\[u\](.+?)\[\/u])is",'<u>$1</u>',$string);
$string = preg_replace("(\[s\](.+?)\[\/s])is",'<strike>$1</strike>',$string);
$urlstring = " ا-ي٠-٩a-zA-Z0-9\:\&\/\-\?\.\=\_\~\#\'\%";
$string = preg_replace("(\[url\]([$urlstring]*)\[/url\])", '<a href="$1" target="_blank">$1</a>', $string);
$string = preg_replace("(\[url\=([$urlstring]*)\]([$urlstring]*)\[/url\])", '<a href="$1" target="_blank">$2</a>', $string);
$string = preg_replace("(\[color=(.+?)\](.+?)\[\/color\])is","<font color='$1'>$2</font>",$string);
$string = preg_replace("(\[font=(.+?)\](.+?)\[\/font\])is","<font face='$1'>$2</font>",$string);
$string = preg_replace("(\[quote\](.+?)\[\/quote])is","\"<font color=red>$1</font>\"<br/>",$string);
$string = preg_replace("/\[img\](.+?)\[\/img\]/", '<img src="$1">', $string);
$string = preg_replace("/\[img=(.+?)\]\[\/img\]/", '<img src="$1">', $string);
$string=nl2br($string);
return $string;
}

function smiley($string)
{
$smiles=array('(manu)'=>"<img src='$config->url/addons/smileys/manchester.jpg' alt='(manu)'/>",
'(chelsea)'=>"<img src='$config->url/addons/smileys/chelsea.png' alt='(chelsea)'/>",
'(spam)'=>"<img src='$config->url/addons/smileys/spam.gif' alt='(spam)' />",
'(welcome)'=>"<img src='$config->url/addons/smileys/welcome.gif' alt='(welcome)' />",
'(ban)'=>"<img src='$config->url/addons/smileys/ban.gif' alt='(ban)' />",
'(celebration)'=>"<img src='$config->url/addons/smileys/celebration.gif' alt='(celebration)' />",
'(admin)'=>"<img src='$config->url/addons/smileys/admin.gif' alt='(admin)' />",
'(anyone)'=>"<img src='$config->url/addons/smileys/anyone.gif' alt='(anyone)' />",
'(arsenal)'=>"<img src='$config->url/addons/smileys/arsenal.png' alt='(arsenal)' />",
'(barca)'=>"<img src='$config->url/addons/smileys/barca.jpeg' alt='(barca)' />",
'(cheesy)'=>"<img src='$config->url/addons/smileys/cheesy.gif' alt='(cheesy)' />",
'(cool)'=>"<img src='$config->url/addons/smileys/cool.gif' alt='(cool)' />",
'(cry)'=>"<img src='$config->url/addons/smileys/cry.gif' alt='(cry)' />",
'(drunk)'=>"<img src='$config->url/addons/smileys/drunk.gif' alt='(drunk)' />",
'(goodnight)'=>"<img src='$config->url/addons/smileys/goodnight.gif' alt='(goodnight)' />",
'(huh)'=>"<img src='$config->url/addons/smileys/huh.gif' alt='(huh)' />",
'(lies)'=>"<img src='$config->url/addons/smileys/lies.gif' alt='(lies)' />",
'(liverpool)'=>"<img src='$config->url/addons/smileys/liverpool.gif' alt='(liverpool)' />",
'هههه'=>"<img src='$config->url/addons/smileys/haha.gif' alt='هههه' />",
'هع'=>"<img src='$config->url/addons/smileys/lol.png' alt='هع' />",
'(love)'=>"<img src='$config->url/addons/smileys/love.png' alt='(love)' />",
'(love2)'=>"<img src='$config->url/addons/smileys/love-flower.gif' alt='(love2)' />",
'(madrid)'=>"<img src='$config->url/addons/smileys/real.png' alt='(madrid)' />",
'(tongue)'=>"<img src='$config->url/addons/smileys/tongue.gif' alt='(tongue)' />",
'(nicethread)'=>"<img src='$config->url/addons/smileys/nicethread.gif' alt='(nicethread)' />");

$string=str_replace(array_keys($smiles), array_values($smiles), $string);
return $string;
}

function mygeneral($limit)
{
$query=mysql_query("SELECT * FROM b_gupdates ORDER BY id DESC LIMIT $limit");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>لا توجد تحديثات بعد</div>";
}
else
{
echo"<h3><font color='red'><center></center></font></h3><ul>";
while($uinfo=mysql_fetch_array($query))
{
$prefix=$uinfo["prefix"];
$title=$uinfo["title"];
$url=$uinfo["url"];
echo"<div id='posts'><li><center>$prefix <a href=$url>$title</a></center></li></div>";
}
echo"</ul>";
}
}
function mygeneral2($limit)
{
$query=mysql_query("SELECT * FROM b_gupdates2 ORDER BY id DESC LIMIT $limit");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>لا توجد تحديثات بعد</div>";
}
else
{
echo"<h3><font color='red'><center>حصرياً من منتدى المناقشة العامة</center></font></h3><ul>";
while($uinfo=mysql_fetch_array($query))
{
$prefix=$uinfo["prefix"];
$title=$uinfo["title"];
$url=$uinfo["url"];
echo"<li><center><font color='white'>$prefix</font> <a href=$url>$title</a></center></li>";
}
echo"</ul>";
}
}

function mymobile($limit)
{
$query=mysql_query("SELECT * FROM b_iupdates ORDER BY id DESC LIMIT $limit");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>لا توجد تحديثات بعد</div>";
}
else
{
echo"<h3><font color='red'><center></center></font></h3><ul>";
while($uinfo=mysql_fetch_array($query))
{
$prefix=$uinfo["prefix"];
$title=$uinfo["title"];
$url=$uinfo["url"];
echo"<div id='posts'><li><center>$prefix <a href=$url>$title</a></center></li></div>";
}
echo"</ul>";
}
}
function mymobile2($limit)
{
$query=mysql_query("SELECT * FROM b_iupdates2 ORDER BY id DESC LIMIT $limit");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>لا توجد تحديثات بعد</div>";
}
else
{
echo"<h3><font color='red'><center>حصري من التصفح قرية</center></font></h3><ul>";
while($uinfo=mysql_fetch_array($query))
{
$prefix=$uinfo["prefix"];
$title=$uinfo["title"];
$url=$uinfo["url"];
echo"<li><center><font color='white'>$prefix</font> <a href=$url>$title</a></center></li>";
}
echo"</ul>";
}
}

function myevent($limit)
{
$query=mysql_query("SELECT * FROM b_eupdates ORDER BY id DESC LIMIT $limit");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>No updates yet</div>";
}
else
{
echo"<h3><font color='red'><center></center></font></h3><ul>";
while($uinfo=mysql_fetch_array($query))
{
$prefix=$uinfo["prefix"];
$title=$uinfo["title"];
$url=$uinfo["url"];
echo"<div id='posts'><li><center>$prefix <a href=$url>$title</a></center></li></div>";
}
echo"</ul>";
}
}
function fblike()
{

}
function myevent2($limit)
{
$query=mysql_query("SELECT * FROM b_eupdates2 ORDER BY id DESC LIMIT $limit");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>No updates yet</div>";
}
else
{
echo"<h3><font color='red'><center>حفلات مدرسة الحصري</center></font></h3><ul>";
while($uinfo=mysql_fetch_array($query))
{
$prefix=$uinfo["prefix"];
$title=$uinfo["title"];
$url=$uinfo["url"];
echo"<li><center><font color='white'>$prefix</font> <a href=$url>$title</a></center></li>";
}
echo"</ul>";
}
}

function mymusic($limit)
{
$query=mysql_query("SELECT * FROM b_mupdates ORDER BY id DESC LIMIT $limit");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>No updates yet</div>";
}
else
{
echo"<h3><font color='red'><center></center></font></h3><ul>";
while($uinfo=mysql_fetch_array($query))
{
$prefix=$uinfo["prefix"];
$title=$uinfo["title"];
$url=$uinfo["url"];
echo"<div id='posts'><li><center>$prefix <a href=$url>$title</a></center></li></div>";
}
echo"</ul>";
}
}
function mymusic2($limit)
{
$query=mysql_query("SELECT * FROM b_mupdates2 ORDER BY id DESC LIMIT $limit");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>No updates yet</div>";
}
else
{
echo"<h3><font color='red'><center>Exclusive Musics</center></font></h3><ul>";
while($uinfo=mysql_fetch_array($query))
{
$prefix=$uinfo["prefix"];
$title=$uinfo["title"];
$url=$uinfo["url"];
echo"<li><center><font color='white'>$prefix</font> <a href=$url>$title</a></center></li>";
}
echo"</ul>";
}
}
function myupdate($limit)
{
$query=mysql_query("SELECT * FROM b_updates ORDER BY id DESC LIMIT $limit");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>No updates yet</div>";
}
else
{
echo"<h3><font color='red'><center></center></font></h3><ul>";
while($uinfo=mysql_fetch_array($query))
{
$prefix=$uinfo["prefix"];
$title=$uinfo["title"];
$url=$uinfo["url"];
echo"<div id='posts'><li><center>$prefix <a href=$url>$title</a></center></li></div>";
}
echo"</ul>";
}
}

function myupdates($limit)
{
$query=mysql_query("SELECT * FROM b_updates ORDER BY id DESC LIMIT $limit");
$num=mysql_num_rows($query);
if($num==0)
{
echo"<div class='msg'>No updates yet</div>";
}
else
{
echo"<h3><font color='red'><center>تحديثات حصرية</center></font></h3><ul>";
while($uinfo=mysql_fetch_array($query))
{
$prefix=$uinfo["prefix"];
$title=$uinfo["title"];
$url=$uinfo["url"];
echo"<li><center>$prefix <a href=$url style='color:#ffffff'>$title</a></center></li>";
}
echo"</ul>";
}
}

function get_size($size)
{
if($size<1024) $size=$size.'B';
if($size>1024 AND $size<1048576) $size=round($size/1024, 1).'KB';
if($size>=1048576) $size=round(($size/1024)/1024, 1).'MB';
return $size;
}

function updateonline()
{
global $user;
$time=time();
$uinfo=mysql_fetch_array(mysql_query("SELECT * FROM b_users WHERE username='$user'"));
$tsgone=$uinfo["tsgone"];
$oldtime=$uinfo["oldtime"];
$checktime=date("U")-200;
mysql_query("UPDATE b_users SET lasttime='$time' WHERE username='$user'");
if($tsgone<$checktime)
{
mysql_query("UPDATE b_users SET tsgone='$time', oldtime='$tsgone'");
}
}

function shoutbox()
{
$info=mysql_fetch_assoc(mysql_query("SELECT * FROM b_shout ORDER BY id DESC"));
$name=cleanvalues2($info["name"]);
$uid=user_info($name, userID);
$img=user_info($name, photo);
$img=(!empty($img)) ? "<img src='../avatars/$img' height='70' width='50'>" : "<img src='../avatars/nophotoboy.gif' height='70' width='50'>";
$message=smiley(strtolower(cleanvalues2($info["message"])));
echo"<ul><li><div class='title'>يصرخ</div></li><table border='0'><tr><td rowspan='2'>$img</td><td><a href='../profile.php?uid=$uid'><font color='green'><b>$name</b></font></a></td></tr><tr><td colspan='2'>$message</td></tr></table></ul>";
}
?>
