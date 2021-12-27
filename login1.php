<?php
include "config.php";

$getun=$_GET['user_name'];
$getpw=$_GET['password'];
$valid="Invalid username or password. Please try again !";
$check="1";
	$qry="select userid, password from user_info where userid= '".$getun."'";
	$res=mysql_query($qry);
	$fres=mysql_fetch_array($res);
		if($fres['userid']==$getun)
		{
			if($fres['password']==$getpw)
			{
				$_SESSION['uname']=$getun;
				header("location:books.php?check=".$check."&pgno=1");
			}
			else
			{
				header("location:login.php?valid=".$valid);
						
			}
		}
		else
		{
				header("location:login.php?valid=".$valid);
		}
	
?>
<?php	
include "headerpg.php";
?>

   <td valign="center" align="center">
   	<table align="center">
		<tr>
			<td class="bigboldgreen">Congratulation ! Registration Process successfully done.</td>
		</tr>
		<tr>
			<td class="bigboldgreen">Please Login at the <a href="login.php" class="bigorange">Login</a> page</td>
		</tr>
	</table>
	</td>
</tr>
</table>
<?php
include "footerpg.php";
?>