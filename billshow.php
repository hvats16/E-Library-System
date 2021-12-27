<?php
include "config.php";
$query="select * from order_master where orderid=".$_GET['orderid'];
$fres=mysql_fetch_array(mysql_query($query));
$query="select * from order_master where orderid=".$_GET['orderid'];
$fresl=mysql_fetch_array(mysql_query($query));
?>
<link href="style.css" rel="stylesheet" type="text/css">

<table align="center" width="700" height="118" cellspacing="0" cellpadding="0" border="0">
		<tr>
			<td align="center"><img src="admin/image/logo.gif"></td>
			<td valign="center">
				<table align="left" width="200" class="Buttonwhite" border="0">
					<?php
					if($fres['pay_method']=='cash')
					{
						echo"<Tr><td >Payment Mathod:</td></Tr>";
						echo"<Tr><td ><blockquote>Cash On Delivery</blockquote></td></Tr>";
					}
					elseif($fres['pay_method']=='credit')
					{
						echo"<Tr><td width='150' colspan='3'>Payment Mathod: Credit Card</td></Tr>";
					?>					
					<Tr valign="top">
						<td valign="top">Card Owner:</td>
						<td valign="top"><?php echo $fres['credit_name'];?></td>
					</tr>
					<tr>
						<td valign="top">Card number:</td>
						<td valign="top"><?php echo $fres['credit_no'];?></td>
					</tr>
						<td valign="top">Ex. Date:</td>
						<td valign="top"><?php echo $fres['credit_date'];?></td>
					</Tr>
					<?php
					}
					?>
				</table>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">
				<table border="0" align="" width="500">
					<tr > 
					  <td  colspan="2" align="right" class="buttonwhite">Order Id: <?php echo $fres['orderid']; ?></td>
						<td class="buttonwhite">Date: <?php echo date(d)."/".date(m)."/20".date(y) ?></td>
					</tr>
					<tr > 
					  <td align="left" class="buttonwhite">Billing Details:</td>
					  <td align="left" class="Buttonwhite">Name: <?php  echo $fres['billing_nm']; ?></td>
					  <td colspan="2" align="left" class="buttonwhite">Address: <?php echo $fres['billing_ad']; ?></td>
					</tr>
					<tr > 
					  <td align="left" class="buttonwhite">Shipping Details:</td>
					  <td align="left" class="Buttonwhite">Name:<?php  echo $fresl['shipping_nm']; ?></td>
					  <td colspan="2" align="left" class="buttonwhite">Address: <?php echo $fres['shipping_ad']; ?></td>
					</tr>
		      </table>
	  		</td>
		</tr>
	<tr><td>
	<table width="700" align="center" border=0>
	<tr>
    <td colspan="2"> 
      <table border="0" align="center">
				<tr class="infoBoxContents">
					<td colspan="4" height="20" class="bigboldorange" align="center"></td>
				</tr>
	  </table>
			<table border="0" align="left" width="600" class="borderoftable">
				<tr class="infoboxcontents">
					<td class="bigorange" align="center">No.</td>
					<td class="bigorange" align="center">book Name</td>
					<td class="bigorange" align="center">Quantity</td>
					<td class="bigorange" align="center">Rate</td>
					<td class="bigorange" align="center">Total</td>
				</tr>
				<?php
				$i=1;
				$query="select * from order_detail where order_id=".$_GET['orderid'];
				$res=mysql_query($query);
				while($fres=mysql_fetch_array($res))
				{
					$qry="select book_name from book where book_id='".$fres['book_id']."' limit 0, 1";
					$res1=mysql_query($qry);
					$fres1=mysql_fetch_array($res1);
					$total=$total+($fres['qty'] * $fres['rate']);
					echo"<tr>";
					echo"	<td class='buttonwhite' align='center'>$i</td>";
					echo"	<td class='buttonwhite' align='center'>$fres1[book_name]</td>";
					echo"	<td class='buttonwhite' align='center'>$fres[qty]</td>";
					echo"	<td class='buttonwhite' align='center'>$$fres[rate]</td>";
					echo"	<td class='buttonwhite' align='center'>$$fres[total]</td>";
					echo"</tr>";
					$i++;
				}
				?>
				<tr class="INFOBOXCONTENTS">
					<td  colspan="3" class="bigblack" align="center"></td>
					<td  colspan="3" class="bigboldorange" align="right">Total : $<?php echo $total;?></td>
				</tr>
			</table>
		</td>
	</tr>
	</table>
</table>
