<?php
ERROR_REPORTING(0);

include("init.php");
$query=mysql_query("ALTER TABLE `b_users` ADD `ip` varchar(50) NOT NULL");
if(!$query){
header("location: index.php?msg=error");
} else {
header("location: index.php?msg=success");
}

?>
