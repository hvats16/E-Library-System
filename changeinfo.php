<?php
include "config.php";
$key=$_GET['hiddenkey'];
	if($key=="personal")
	{
		$query="UPDATE `user_info` SET `f_name` = '".$_GET['txtfname']."', `l_name` = '".$_GET['txtlname']."', `e_mail` = '".$_GET['txtemail']."', `gender` = '".$_GET['gender']."' WHERE userid='".$_SESSION['uname']."'";
		mysql_query($query);
		header("location:viewinfo.php");
	}
	if($key=="contact")
	{
		$query="UPDATE `user_info` SET `street_add` = '".$_GET['txtaddress']."', `post_code` = '".$_GET['txtpostcode']."', `city` = '".$_GET['txtcity']."', `state` = '".$_GET['txtstate']."', `country` = '".$_GET['txtcountry']."', `tele_no` = '".$_GET['txttele']."', `fax_no` = '".$_GET['txtfax']."' WHERE userid='".$_SESSION['uname']."'";
		mysql_query($query);
		header("location:viewinfo.php");
	}
	if($key=="user")
	{
		$query="UPDATE `user_info` SET `sque` = '".$_GET['txtsque']."', `sans` = '".$_GET['txtsans']."' WHERE userid='".$_SESSION['uname']."'";
		mysql_query($query);
		header("location:viewinfo.php");
	}
	if($key=="password")
	{
		$query="UPDATE `user_info` SET `password` = '".$_GET['txtnewpass']."' WHERE userid='".$_SESSION['uname']."'";
		mysql_query($query);
		if($_GET['check1']==1)
		{
			header("location:login.php");
		}
		else
		{
			header("location:viewinfo.php");
		}		
	}
?>