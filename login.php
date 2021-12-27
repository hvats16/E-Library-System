<?php
include "headerpg.php";
?>

	<td width="550" valign="top" align="center">
		<form name="login" action="login1.php" method="get">
			<table border="0" cellpadding="0" cellspacing="0" >
      			<tbody>
					<tr>
        				<td>
							<table border="0" cellpadding="0" cellspacing="0" >
          						<tbody>
									<tr>
									<?php
									$valid=$_GET['valid'];
									if($valid!="")
									{
										echo"<td><font color='#ff0000'><b>".$valid."</b></font></td>";
									}
									else
									{
										echo"<td class='bigboldblack'>Welcome, Please Sign In</td>";
									}
									?>
          							</tr>
        						</tbody>
							</table>
						</td>
      				</tr>
				    <tr>
              			<td>&nbsp;</td>
      				</tr>
      				<tr>
        				<td>
							<table border="0" cellpadding="2" cellspacing="0" >
								<tbody>
									<tr>
            							<td class="bigboldorange" valign="top" >New Student</td>
							            <td class="bigboldgreen" valign="top" >Returning Student</td>
									</tr>
									<tr>
            							<td height="100%" valign="top" >
											<table class="infoBox" border="0" cellpadding="2" cellspacing="1" height="100%" >
												<tbody>
													<tr class="infoBoxContents">
										                <td>
															<table border="0" cellpadding="2" cellspacing="0" width="200" >
																<tbody>
																	<tr>
								                                      <td>&nbsp;</td>
																	</tr>
																	<tr>
																		<td class="bigblack" valign="top">I am a new Student.<br><br>By
													  													  creating an account at library you will be able to find faster, be
																										  up to date on an book orders status, and keep track of the book orders you have
																										  previously made.
																		</td>
													                </tr>
                  													<tr>
				  														<td align="right"><a href="Createuser.php" class="biggreen">Create New Account</a> </td>
				  													</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
            							<td height="100%" valign="top" >
											<table class="infoBox" border="0" cellpadding="2" cellspacing="1">
												<tbody>
													<tr class="infoBoxContents">
														<td>
															<table border="0" cellpadding="2" cellspacing="0" width="200" >
																<tbody>
																	<tr>
																		<td colspan="2">&nbsp;</td>
																	</tr>
																	<tr>
																		<td class="bigblack" colspan="2">I am a returning Student.</td>
																	</tr>
																	<tr>
																		<td colspan="2">&nbsp;</td>
																	</tr>
																	<tr>
																		<td  class="bigorange" >User Name</td>
																		<td  ><input name="user_name" type="text" class="Buttonwhite"></td>
																	</tr>
																	<tr>
																		<td class="bigorange">Password</td>
																		<td ><input name="password" maxlength="40" type="password" onFocus="this.select()" class="Buttonwhite"></td>
																	</tr>
																	<tr>
																		<td colspan="2" align="center"><input type="submit" name="LoginOk" value="  Ok  " class="Buttonblack" onClick="return check1()"></td>
																	</tr>
																	<tr>
																		<td>&nbsp;</td>
																	</tr>
																	<tr>
																		<!--<td colspan="2" align="right"><a href="#" onClick="return check()" class="biggreen" ><u>Password forgotten? Click here.</u></a></td> --->
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</tr>
</table>
</td>
</table>
<?php
include "footerpg.php";
?>
<script language="JavaScript">
function check()
{
	var uid=document.login.user_name.value;
	if(uid=="")
	{
		alert("please enter Username");
		document.login.user_name.focus();
		return false;
	}
	else
	{
	window.location='forgotpass.php?id='+uid;
	return false;
	}
	return false;
}

</script>
<script language="JavaScript">
function check1()
{
	var uname=document.login.user_name.value;
	var upass=document.login.password.value;
	if(uname=="")
	{
		alert("please enter username");
		document.login.user_name.focus();
		return false;
	}
	if(upass=="")
	{
		alert("please enter Password");
		document.login.password.focus();
		return false;
	}

	return true;
}

</script>