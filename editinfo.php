<?php
include "headerpg.php";
if($_GET['check']==1)
{
	$id=$_GET['id'];
}
else
{
	$id=$_SESSION['uname'];
}
if($id=="")
{
	$valid="To Change Your Personal Information Please Login!";
	header("location:login.php?valid=".$valid);
}

$query="select * from user_info where userid='".$id."'";
$res=mysql_query($query);
$fres=mysql_fetch_array($res);
?>
	<td valign="top" align="center"> 
			<table  border=0 cellpadding='2' cellspacing='1' class='infoBox' width='350'>
				<form name="editinfo" action="changeinfo.php" method="get" onSubmit="return check(this)">
<!-- *************************************** Personal Information ***************************-->
				
				<?php
					echo"<tr class='infoBoxContents'> ";
						if($_GET['key']=='personal')
						{
					?>
						<td colspan=2 class='bigboldgreen' align=center>Your Personal Information</td>
				  	</tr>
					<input type="hidden" name="hiddenkey" value="personal">
					<tr  class='infoBoxContents'>
						<td> <table border='0' cellpadding='2' cellspacing='2' align='left'>
					<tr> 
						<td class='bigorange'>First Name:</td>
						<td class='smallboldblack'><input type='text' class='buttonwhitecomb' name='txtfname' value=<?php echo $fres['f_name'];?>></td>
					</tr>
					<tr> 
						<td class='bigorange'>Last Name:</td>
						<td class='smallboldblack'><input type='text' class='buttonwhitecomb' name='txtlname' value=<?php echo $fres['l_name'];?>></td>
					</tr>
					<tr> 
						<td class='bigorange'>Gender:</td>
					<?php
					if($fres['gender']=="male")
						{
							$male="checked";
							$female="";
						}
						else
						{
							$female="checked";
							$male="";
						}		
					?>
						<td class='smallblack' valign='top'><input name='gender' value='male' type='radio' <?php echo $male;?> >&nbsp;<font class='bigblack'>Male</font>&nbsp;&nbsp;<input name='gender' value='female' type='radio' <?php echo $female;?>>&nbsp;<font class='bigblack'>Female</font></td>
					</tr>
					<tr> 
						<td class='bigorange'>E-Mail Address:</td>
						<td class='smallboldblack'><input type='text' class='buttonwhitecomb' name='txtemail' value=<?php echo $fres['e_mail'];?>></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<?php
}
?>
<!-- *************************************** Contact Information ***************************-->
					<?php
						if($_GET['key']=='contact')
						{
					?>
					<td colspan=2 class='bigboldgreen' align=center>Your Contact Information</td>
					<input type="hidden" name="hiddenkey" value="contact">
				  </tr>
				  <tr  class='infoBoxContents'>
					<td> <table border='0' cellpadding='2' cellspacing='2' align='left'>
						  <tr> 
							<td class='bigorange'>Street Address:</td>
							<td class='smallboldblack'><input type='text' class='buttonwhitecomb' name='txtaddress' value=<?php echo $fres['street_add'];?>></td>
						  </tr>
						  <tr> 
							<td class='bigorange'>Postal Code:</td>
							<td class='smallboldblack'><input type='text' class='buttonwhitecomb' name='txtpostcode' value=<?php echo $fres['post_code'];?>></td>
						  </tr>
						  <tr> 
							<td class='bigorange'>City/Provience:</td>
							<td class='smallblack' valign='top'><input name='txtcity' class="buttonwhitecomb" type='text' value=<?php echo $fres['city'];?>></td>
						  </tr>
						  <tr> 
							<td class='bigorange'>State:</td>
							<td class='smallboldblack'><input type='text' class='buttonwhitecomb' name='txtstate' value=<?php echo $fres['state'];?>></td>
						</tr>
						  <tr> 
							<td class='bigorange'>Country:</td>
							<td class='smallboldblack'><input type='text' class='buttonwhitecomb' name='txtcountry' value=<?php echo $fres['country'];?>></td>
						</tr>
						  <tr> 
							<td class='bigorange'>Telephone Number:</td>
							<td class='smallboldblack'><input type='text' class='buttonwhitecomb' name='txttele' value=<?php echo $fres['tele_no'];?>></td>
						</tr>
						  <tr> 
							<td class='bigorange'>Fax Number</td>
							<td class='smallboldblack'><input type='text' class='buttonwhitecomb' name='txtfax' value=<?php echo $fres['fax_no'];?>></td>
						</tr>
					  </table></td>
				  </tr>
			  </table>
			  	<?php
					 }
				 ?>
<!-- *************************************** User Information ***************************-->
					<?php
						if($_GET['key']=='user')
						{
					?>
					<td colspan=2 class='bigboldgreen' align=center>User Information</td>
					<input type="hidden" name="hiddenkey" value="user">
				  </tr>
				  <tr  class='infoBoxContents'>
					<td> 
						<table border='0' cellpadding='2' cellspacing='2' align='left'>
						  <tr> 
							<td class='bigorange'>Security Question:</td>
							<td class='smallboldblack'><input type='text' class='buttonwhitecomb' name='txtsque' value=<?php echo $fres['sque'];?>></td>
						</tr>
						  <tr> 
							<td class='bigorange'>Security Answer:</td>
							<td class='smallboldblack'><input type='text' class='buttonwhitecomb' name='txtsans' value=<?php echo $fres['sans'];?>></td>
						</tr>
					  </table></td>
				  </tr>
			  </table>
			  	<?php
					 }
				 ?>
<!-- *************************************** Change Password ***************************-->
					<?php
						if($_GET['key']=='password')
						{
					?>
					<td colspan=2 class='bigboldgreen' align=center>Change Password</td>
					<input type="hidden" name="hiddenkey" value="password">
					<?php echo"<input type='hidden' name='check1' value='".$_GET['check']."'>"; ?>
				  </tr>
				  <tr  class='infoBoxContents'>
					<td> 
						<table border='0' cellpadding='2' cellspacing='2' align='left'>
						  <tr> 
							<td class='bigorange'>User Id:</td>
							<td class='smallboldblack'><input type='text' class='buttonwhitecomb' name='txtuid' disabled value=<?php echo $fres['userid'];?>></td>
						</tr>
						  <tr> 
							<td class='bigorange'>New Password:</td>
							<td class='smallboldblack'><input type='password' class='buttonwhitecomb' name='txtnewpass' ></td>
						</tr>
						  <tr> 
							<td class='bigorange'>Confirm Password:</td>
							<td class='smallboldblack'><input type='password' class='buttonwhitecomb' name='txtconfpass' ></td>
						</tr>
					  </table></td>
				  </tr>
			  </table>
			  	<?php
					 }
				 ?>

			  <table>
				<tr>
					<td>
						<table class='infoBox' border='0' cellpadding='2' cellspacing='1' width=100%>
							<tr class='infoBoxContents'>
								<td >
									<table border='0' cellpadding='2' cellspacing='0' align=center width=345> 
										<tr align=center>
											<td ><input type='submit' class='Buttonblack' value='Change'> </td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			  </form>
			  </table>

		</td>
<?php
include "footerpg.php";
?>

<script language="JavaScript">
function isStr(st)
{
	validst="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	var j=0;
	
	for(i=0;i<st.length;i++)
	{
		c=st.charAt(i);
		if (validst.indexOf(c)>=0)
		{
			j++;
		}
	}
	
	if(j==st.length)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function isNumeric(st)
{
	validst="0123456789";
	var j=0;
	
	for(i=0;i<st.length;i++)
	{
		c=st.charAt(i);
		if (validst.indexOf(c)>=0)
		{
			j++;
		}
	}
	
	if(j==st.length)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function isEmail(st)
{
	validst="@.";
	var j=0;
	var posx=-1;
	var poxy=-1;
	for(i=0;i<st.length;i++)
	{
		c=st.charAt(i);
		if (validst.indexOf(c)==0)
		{
			j++;
			posx=i;
		}
		else if (validst.indexOf(c)==1)
		{
			j++;
			posy=i;
		}
	}
	
	if(j>=validst.length && (posy-posx)>0)
	{	
		return true;	
	}
	else
	{	
		return false;	
	}
}
function userid(st)
{
	validst="_.abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	var j=0;
	if(st=="")
	{
		return false;
	}
	for(i=0;i<st.length;i++)
	{
		c=st.charAt(i);
		if (validst.indexOf(c)>=0)
		{
			j++;
		}
	}
	if(j==st.length)
	{
		return true;
	}
	else
	{
		return false;
	}
}


// Password Validation
function isPassword(st)
{
	validst=" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~!@#$%^&*()_+|-=\[]{};:<>?,./";
	var j=0;
	if(st=="")
	{
		return false;
	}
	for(i=0;i<st.length;i++)
	{
		c=st.charAt(i);
		if (validst.indexOf(c)>=0)
		{
			j++;
		}
	}
	
	if(j==st.length)
	{
		return true;
	}
	else
	{
		return false;
	}
}

// PhoneNo Validation
function isPhoneNo(st)
{
	validst="-abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	var j=0;
	
	for(i=0;i<st.length;i++)
	{
		c=st.charAt(i);
		if (validst.indexOf(c)>=0)
		{
			j++;
		}
	}
	
	if(j==st.length)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<?php
		if($_GET['key']=='personal')
		{
	?>

		<script language="JavaScript">
		function check(form)
		{
			var fn=form.txtfname.value;
			var ln=form.txtlname.value;
			var email=form.txtemail.value;
			if(fn=="")
			{
				alert("First Name cannot be empty.");
				form.txtfname.focus();
				return false;
			}
			if(isStr(fn)==false)
			{
				alert("Enter Proper FirstName");
				return false;
			}
			if(ln=="")
			{
				alert("Last Name cannot be empty.");
				form.txtlname.focus();
				return false;
			}
			if(isStr(ln)==false)
			{
				alert("Enter Proper LastName");
				return false;
			}
			if(isEmail(email)==false)
			{
				alert("Enter Proper Email Address");
				form.txtemail.focus();
				return false;
			}
		}
		</script>
			<?php
			}
			?>
<!-- *************************************** Contact Information ***************************-->
		<?php
			if($_GET['key']=='contact')
			{
		?>
		
		<script language="JavaScript">
		function check(form)
		{
			var Address=form.txtaddress.value;
			var postcode=form.txtpostcode.value;
			var City=form.txtcity.value;
			var State=form.txtstate.value;
			var Country=form.txtcountry.value;
			var PNo=form.txttele.value;
			var fax=form.txtfax.value;
			if(Address=="")
			{
				alert("Address cannot be empty.");
				form.txtaddress.focus();
				return false;
			}
			if(postcode=="")
			{
				alert("PostalCode cannot be empty.");
				form.txtpostcode.focus();
				return false;
			}
			if(City=="")
			{
				alert("City cannot be empty.");
				form.txtcity.focus();
				return false;
			}
			if(isStr(City)==false)
			{
				alert("Please enter City properly.");
				form.txtcity.focus();
				return false;
			}
			if(State=="")
			{
				alert("State cannot be empty.");
				form.txtstate.focus();
				return false;
			}
			if(isStr(State)==false)
			{
				alert("Please enter State properly.");
				form.txtstate.focus();
				return false;
			}
			if(Country=="")
			{
				alert("Please select Country from the list.");
				form.txtcountry.focus();
				return false;
			}
			if(PNo=="")
			{
				alert("Phone no can not be empty");
				form.txttele.focus();
				return false;
			}
			if (isPhoneNo(PNo)==false)
			{
				alert("Please Enter valid Phone Number.");
				form.txttele.focus();
				return false;	
			}
			if(fax=="")
			{
				alert("fax no can not be empty");
				form.txtfax.focus();
				return false;
			}
			if (isPhoneNo(fax)==false)
			{
				alert("Please Enter valid Phone Number.");
				form.txtfax.focus();
				return false;	
			}
		}
		</script>
	<?php
		 }
	 ?>
<!-- *************************************** Change Password ***************************-->
		<?php
			if($_GET['key']=='password')
			{
		?>

		<script language="JavaScript">
		function check(form)
		{
			var npass=form.txtnewpass.value;
			var cpass=form.txtconfpass.value;
			if(isPassword(npass)==false)
			{
				alert("Enter Proper Password");
				form.txtnewpass.focus();
				return false;
			}
			if(npass!=cpass)
			{
				alert("Passwords do not match.");
				form.txtnewpass.value="";
				form.txtconfpass.value="";
				form.txtnewpass.focus();
				return false;
			}
		}
		</script>
		<?php
			 }
		 ?>
<!-- *************************************** User Information ***************************-->
			<?php
				if($_GET['key']=='user')
				{
			?>
		
		<script language="JavaScript">
		function check(form)
		{
			var sque=form.txtsque.value;
			var sans=form.txtsans.value;
			if(sque=="")
			{
				alert("Security Question can not be empty.");
				form.txtsque.focus();
				return false;
			}
			if(sans=="")
			{
				alert("Security Answer can not be empty");
				form.txtsans.focus();
				return false;
			}
		}
		</script>
<?php
	}
?>