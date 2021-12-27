<?php
include "config.php";
mysql_query("INSERT INTO `contact` ( `name` , `email` , `enquiry` ) VALUES ('".$_GET['name']."', '".$_GET['email']."', '".$_GET['enquiry']."'");
$valid="1";
header("location:contactus.php?valid=$valid");
?>
