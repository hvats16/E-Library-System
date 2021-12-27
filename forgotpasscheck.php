<?php
include "config.php";
$valid="Please Enter Valid Information !";
$dob=$_POST['dobdd'].'/'.$_POST['dobmm'].'/'.$_POST['dobyy'];
$query="select * from user_info where userid='".$_POST['id']."'";
$fres=mysql_fetch_array(mysql_query($query));
if($dob==$fres['dob'])
{
	if($_POST['sque']==$fres['sque'])
	{
		if($_POST['sans']==$fres['sans'])
		{
			header("location:editinfo.php?key=password&check=1&id=".$_POST['id']);
		}
		else
		{
			header("location:forgotPass.php?valid=".$valid);
		}

	}
	else
	{
		header("location:forgotPass.php?valid=".$valid);
	}

}
else
{
	header("location:forgotPass.php?valid=".$valid);
}
		
?>