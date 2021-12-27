<?php
include "config.php";
?>

<body> 
	<table border="0" align="center" width="700" height="118" cellspacing="0" cellpadding="0">
		<tr>
			<td width="120" colspan="2" align="left"><img src="admin/image/logo.gif"></td>
			<td width="245">
				<table border="0" cellpadding="0" cellspacing="0" align="center">
					<tr valign="center">
						<td rowspan="2" valign="top" align="center"><a href="cartadded.php"><img src="admin/image/cart.gif" border="0"></a></td>
						<td rowspan="2" width="5"></td>
						<td  height="100%" width="120" class="bigboldblack">Purchase Book</td>
					</tr>
					<tr  valign="top">
					<?php
					if(isset($_SESSION['uname']))
					{
						$query="select count(*) as total from viewcart where user_id='".$_SESSION['uname']."' and session_id='".session_id()."'";
						$res=mysql_query($query);
						$fres=mysql_fetch_array($res);
						echo"<td class='smallblack'>Now in your cart <a href='cartadded.php'><font color='#ff0000'>".$fres['total']." items</a></font></td>";
						$_SESSION['cart']=$fres['total'];
					}
					else
					{
						echo"<td class='smallblack'>Now in your cart <a href='cartadded.php'><font color='#ff0000'>0 items</a></td>";
						$_SESSION['cart']=0;
					}
					?>
					</tr>
				</table>		</td>
	</tr>
	<tr>
	<tr>
	<tr>
	<td colspan="4" valign="top" align="left" class="bigboldgreen" bordercolorlight="#CCFF66"><a href="admin/login.php" class="bigboldorange">Administrator</a>  </td></tr>
	<tr>
		<td colspan="4" valign="top" align="right" class="bigboldgreen"><a href="advancesearch.php" class="bigboldorange">Search</a> | 
			<?php if(isset($_SESSION['uname']))
				{
					echo "<a href='logoff.php' class='bigboldorange'>Logoff</a>";
					echo " | <a href='viewinfo.php' class='bigboldorange'>View Information</a>";
				}
				else
				{
				  	echo "<a href='login.php' class='bigboldorange'>Student login</a>";
					echo " | <a href='createuser.php' class='bigboldorange'>Create an Account</a>";
				}
			?></td>		
	</tr>
	<tr>
		<td colspan="2"></td>
	</tr>
	<tr>
		<td colspan="2"></td>
	</tr>
	<tr>
		<td colspan="2" height="2"></td>
	</tr>
	<tr>
		<td colspan="2" height="2"></td>
	</tr>
</table>
<table cellspacing="0" cellpadding="0" width=700 align="center" border="0">
<tr valign="middle" align="center">
	<td  width="200" rowspan="3" background="admin/buttons/m15.gif" >
	<table border="0" cellpedding=0 cellspacing="0">
		<tr>
			<td colspan=3 class="bigboldwhite">Book Search :</td>
		</tr>
			<tr>
				<td></td>
				<form action="books.php" method="get">
				<td><input type="text" name="name" size="15" value="<?php echo $_GET['name']; ?>"></td>
				<input type="hidden" name="check" value="search">
				<td><input type="image" src="admin/buttons/m09.gif"></td>
				</form>
			</tr>
			<tr>
				<td></td>
				
          <td colspan=2 align="right"><a href="advancesearch.php" class="bigboldwhite">Advance Search</a></td>
			</tr>
	  </table>	</td>
		<td >&nbsp;</td>
		<td rowspan="3"><a href="index.php"><img src="admin/buttons/m10.gif" border="0"></a></td>
		<td rowspan="3"><a href="books.php?pgno=1"><img src="admin/image/m11.gif" border="0"></a></td>
		<td rowspan="3"><a href="viewinfo.php"><img src="admin/buttons/m12.gif" border="0"></a></td>
		<td rowspan="3"><a href="cartadded.php"><img src="admin/buttons/m13.gif" border="0"></a></td>
		<td rowspan="3"><a href="checkout.php"><img src="admin/buttons/m14.gif" border="0"></a></td>
  </tr>
</table>
<table align="center">
	<tr>
		<td colspan="3" bgcolor="#9b9b9b" height="3" width="700"></td>
	</tr>
</table>

<table align="center" border="0" width="700" >
	<tr>
    <td valign="top" width="150"> 
		<table border=0 align="center" cellpadding="0" cellspacing="0" width="100%" >
        <?php				
				$qry="Select category_name from category_master where category_type='Arts' and category_name in (select distinct(category_name) from book)";
				$res=mysql_query($qry);
				if($res)
				{
					echo "<tr><td height=20 valign='bottom' align=center colspan=2 class=bigboldblack>BROWSE BY CATEGORY</td></tr>";
					echo "<tr><td colspan=2 height=15><hr></td></tr>";
					echo "<tr>";
					echo "<td colspan=2 class=bigboldgreen>";
					echo "<u>Arts</u>";
					echo "</td>";
					echo "</tr>";
					while($fres=mysql_fetch_array($res))
					{
						echo "<tr >";
						echo "	<td width=10 align=right><img src='admin/image/bullets/green.bmp'>";
						echo "	</td>";
						echo "	<td >";
						echo "<a class=smallboldorange href=books.php?name=".$fres['category_name']."&pgno=1>".$fres['category_name']."</a>";
						echo "	</td>";
						echo "</tr>";
					}
				}
				else
				{
					echo "No category found";
				}
				$qry="Select category_name from category_master where category_type='indoor' and category_name in (select distinct(category_name) from book)";
				$res=mysql_query($qry);
				if($res)
				{
					echo "<tr>";
					echo "<td colspan=2 class=bigboldgreen>";
					echo "<u>Commerce</u>";
					echo "</td>";
					echo "</tr>";
					while($fres=mysql_fetch_array($res))
					{
						echo "<tr>";
						echo "	<td width=10 align=right><img src='admin/image/bullets/green.bmp'>";
						echo "	</td>";
						echo "	<td>";
						echo "<a href=books.php?name=".$fres['category_name']."&pgno=1><font class=smallboldorange>".$fres['category_name']."</font></a>";
						echo "	</td>";
						echo "</tr>";
					}
				}
				else
				{
					echo "No category found";
				}
?>
	</table>
	</td>
