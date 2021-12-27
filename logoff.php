<?php
	include "config.php";
	
//	echo $_SESSION['uname'];
	unset($_SESSION['uname']);
	mysql_query("delete from viewcart where session_id='".session_id()."' or date!='".date(dmy)."'");
	session_destroy(); 	
	header("location:index.php");
?>