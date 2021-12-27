<?php
include "config.php";
$res=mysql_query("select userid from user_info where userid='".$_GET['id']."'");
$fres=mysql_fetch_array($res);	
if($fres['userid']=="")
{
	header("location:login.php?valid=Please enter valid user name!");
	exit;
}

include "headerpg.php";
?>
    <td valign="top"> 
		<table align="center" border="0" width="100%">
			<tr>
			
			<?php

			if($_GET['valid']=="")
			{
				echo"<td align='center' class='bigboldorange'>Did you forget your password ?</td>";
			}
			else
			{
				echo"<td align='center' height='10' class='bigboldorange'><font color='#FF0000'>".$_GET['valid']."</font></td>";
			}			
			?>
			</tr>
			<tr valign="top">
				<td valign="top"><hr></td>
			</tr>
			<tr>
				<td>
					<table align="center" class="BorderofTable">
						<form name="create_account" onSubmit="return check()" action="forgotpasscheck.php" method="post">
						<tr>
							<?php echo"<input type='hidden' name='id' value=".$_GET['id'].">"; ?>
							<td class="biggreen">Birth Date</td>
							<td><input type="text" name="dobdd" class="buttonwhite" size="2" maxlength="2">&nbsp;<input type="text" name="dobmm" class="buttonwhite" size="2" maxlength="2">&nbsp;<input type="text" name="dobyy" class="buttonwhite" size="4" maxlength="4"></td>
						</tr>
						<tr>
							<td class="biggreen">Security Question</td>
							<td><input type="text" name="sque" class="buttonwhitecomb"></td>
						</tr>
						<tr>
							<td class="biggreen">Security Answer</td>
							<td><input type="text" name="sans" class="buttonwhitecomb"></td>
						</tr>
					</table>
					<table align="center">
						<tr>
							<td colspan="2" align="center">
								<table align="center" class="borderoftable">
									<tr>
										<td width="255" align="right"><input type="submit" class="buttonblack" name="ok" value="  Ok  "></td>
									</tr>
								</table>
							</td>
						</tr>
						</form>
					</table>
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>
<?php
include "footerpg.php";
?>

<script language="JavaScript">
function isDate(bdt,bmn,byr)
{
		/* Checking Birthdate */
		var BDate=bdt;
		var BMonth=bmn;
		var BYear=byr;
		var CYear=((new Date()).getYear())-6;
		/*Date checking*/
		if(isNumeric(BDate)==false || (BDate<1))
		{
			alert("Please enter a valid Birth Date.");
			document.create_account.dobdd.focus();
			return false;
		}
		if(BDate=="")
		{
			alert("Birth Date cannot be empty.");
			document.create_account.dobdd.focus();
			return false;
		}
		/*Month Checking*/
		if(BMonth=="")
		{
			alert("Please select Birth Month.");
			document.create_account.dobmm.focus();
			return false;
		}
		if((isNumeric(BMonth)==false)||(BMonth>12) || (BMonth<1))
		{
			alert("Please enter valid Birth Month.");
			document.create_account.dobmm.focus();
			return false;
		}
		/*Year Checking*/
		if(isNumeric(BYear)==false)
		{
			alert("Please enter a valid Year.");
			document.create_account.dobyy.focus();
			return false;
		}
		if(BYear=="")
		{
			alert("Birth Year cannot be empty.");
			document.create_account.dobyy.focus();
			return false;
		}
		if((BYear.length<4)||(BYear>CYear)||(isNaN(BYear)==true)|| (BYear<1))
		{
			alert("Please insert a valid year.");
			document.create_account.dobyy.focus();
			return false;		
		}
		if(BMonth=="2")
		{
			if((BYear%4)==0)
			{
				if(BDate>"29")
				{
					alert("Please enter valid date.");
					document.create_account.dobdd.focus();
					return false;				
				}
			}
			else
			{
				if(BDate>"28")
				{
					alert("Please enter valid date.");
					document.create_account.dobdd.focus();
					return false;				
				}
			}
		}
		else
		{
			switch(BMonth)
			{
				case "4":
				case "6":
				case "9":
				case "11":
							if (BDate>"30")
							{
									alert("Please enter valid date.");
									document.create_account.dobdd.focus();
									return false;
							}
							break;
			}
		}
		return true;
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

function check()
{
	var bdt=document.create_account.dobdd.value;
	var bmn=document.create_account.dobmm.value;
	var byr=document.create_account.dobyy.value;
	if(isDate(bdt,bmn,byr)==false)
		{
			return false;
		}
		return true;	
}
</script>