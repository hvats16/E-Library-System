<?php
include "config.php";

$fn=$_GET['firstname'];
$ln=$_GET['lastname'];
$gender=$_GET['gender'];
$dobdd=$_GET['dobdd'];
$dobmm=$_GET['dobmm'];
$dobyy=$_GET['dobyy'];
$email=$_GET['email_address'];
$publisher=$_GET['publisher'];
$address=$_GET['street_address'];
$postcode=$_GET['postcode'];
$city=$_GET['city'];
$state=$_GET['state'];
$country=$_GET['country'];
$telephone=$_GET['telephone'];
$fax=$_GET['fax'];
$newsletter=$_GET['newsletter'];
$uid=$_GET['userid'];
$password=$_GET['password'];
$confpassword=$_GET['confpassword'];
$sque=$_GET['sque'];
$sans=$_GET['sans'];

if(strlen($dobdd)!=2)
{
	$dobdd='0'.$dobdd;
}
if(strlen($dobmm)!=2)
{
	$dobmm='0'.$dobmm;
}
$valid="UserId is already exists";
$dob=$dobdd."/".$dobmm."/".$dobyy;
	$query=mysql_query("select userid from user_info where userid='".$uid."'");
	$fres=mysql_fetch_array($query);
		if($fres['userid']==$uid)
		{ 
			header("location:createuser.php?txtfname=".$fn."&txtlname=".$ln."&txtgen=".$gender."&txtdd=".$dobdd."&txtmm=".$dobmm."&txtyy=".$dobyy."&txtemail=".$email."&txtpublisher=".$publisher."&txtaddress=".$address."&txtpostcode=".$postcode."&txtcity=".$city."&txtstate=".$state."&txtcountry=".$country."&txtnewsletter=".$newsletter."&txtuid=".$uid."&txtpassword=".$password."&txtfax=".$fax."&txttelephone=".$telephone."&txtconfpassword=".$confpassword."&valid=".$valid."&txtsque=".$sque."&txtsans=".$sans);	
		}
		else 
		{
			$qry="INSERT INTO `user_info` (`f_name`, `l_name`, `dob`, `e_mail`, `gender`, `comp_nm`, `street_add`, `post_code`, `city`, `state`, `country`, `tele_no`, `fax_no`, `news`, `userid`, `password`,`sque`,`sans`) VALUES ('$fn', '$ln', '$dob', '$email', '$gender', '$publisher', '$address', '$postcode', '$city', '$state', '$country', '$telephone', '$fax', '$newsletter', '$uid', '$password','$sque','$sans')";
			mysql_query($qry);
		}
		
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