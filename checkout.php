<?php
include "config.php";
if($_SESSION['uname']=="")
{
	$valid="To buy any items! Please Login";
	header("location:login.php?valid=".$valid);
	exit;
}
if($_SESSION['cart']==0)
{
	$valid="There is no items in your cart!";
	header("location:books.php?valid=".$valid."&pgno=1");
	exit;
}
include "headerpg.php";


$date=date(Y)."-".date(m)."-".date(d);
?>
	<td valign="top" align="center"> 
		<table border="0" cellpadding="0" cellspacing="0" >
			<tr>
				<td valign="top" ><form name="checkout" action="checkout1.php" method="get">
					<table border="0" cellpadding="0" cellspacing="0" >
						<tr>
						<?php echo "<input name='hiddendate' type='hidden' value='$date'  >" ;  ?>
   							<td>
								<table border="0" cellpadding="0" cellspacing="0" >
									<tr>
  										<td class="bigboldorange" valign="bottom" colspan="2">Delivery Information</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="bigboldorange" height="28" width="500" colspan="2"><hr></td>
						</tr>
						<tr>
        					<td>
								<table border="0" cellpadding="2" cellspacing="0" width="200">
									<tr>
										<td class="bigboldgreen">Shipping Adderss</td>
									</tr>
        						</table>
							</td>
							<td>
								<table border="0" cellpadding="2" cellspacing="0" width="200">
									<tr>
										<td class="bigboldgreen">Billing Adderss</td>
									</tr>
        						</table>
							</td>
      					</tr>
						<tr>
        					<td>
								<table class="infoBox" border="0" cellpadding="2" cellspacing="1" width="200">
          							<tr class="infoBoxContents">
							            <td>
											<table border="0" cellpadding="2" cellspacing="0" >
						                        <tr> 
                        						  <td class="bigorange" colspan="2">Name:</td>
						                        </tr>
                        						<tr> 
						                          <td colspan="2"><input type="text" class="buttonwhite" name="sname"></td>
        				                        </tr>
                        						<tr> 
													  <td class="bigorange" colspan="2">Address:</td>
												</tr>
												<tr>
													<td><textarea class="buttonwhite" cols="30" rows="5" name="saddress"></textarea></td>
												</tr>

											</table>
										</td>
									</tr>
								</table>
							</td>
        					<td>
								<table class="infoBox" border="0" cellpadding="2" cellspacing="1" width="200">
          							<tr class="infoBoxContents">
							            <td>
											<table border="0" cellpadding="2" cellspacing="0" >
						                        <tr> 
                        						  <td class="bigorange" colspan="2">Name:</td>
						                        </tr>
                        						<tr> 
						                          <td colspan="2"><input type="text" class="buttonwhite" name="bname"></td>
						                        </tr>
                        						<tr> 
													  <td class="bigorange" colspan="2">Address:</td>
												</tr>
												<tr>
													<td><textarea class="buttonwhite" cols="30" rows="5" name="baddress"></textarea></td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="bigboldgreen">Payment Method</td>
						</tr>
						<tr>
							<table class="BorderOfTable" border="0" width="400">
								<tr>
									<td colspan="3" class="smallboldblack">Please select the preferred payment method to use on this order.</td>
								</tr>
								<tr>
									<td width="10"><input type="radio" name="credit" checked value="card"></td>
									<td class="bigboldorange" colspan="2">Credit Card</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td class="biggreen">Credit Card Owner:</td>
									<td align="left"><input type="text" class="buttonwhite" name="cardowner"></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td class="biggreen">Credit Card Number:</td>
									<td align="left"><input type="text" class="buttonwhite" name="cardnumber"></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td class="biggreen">Credit Card Expiry Date:</td>
									<td><input type="text" class="buttonwhite" width="10" name="carddate" onFocus="this.select()" value="dd/mm/yyyy"></td>
								</tr>
								<tr>
									<td><input type="radio" name="credit" value="cash"></td>
									<td class="bigboldorange" colspan="2">Cash On Delivery</td>
								</tr>
							</table>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="bigboldgreen">Order Confirmation</td>
						</tr>
						<tr>
							<td>
								<table class="BorderOfTable" border="0">
									<tr>
										<td><?php 
												echo "<table border='0' cellpadding='2' cellspacing='1' class='infoBox' width='392'>";
												echo "<tr class='infoBoxContents'>";
												echo "<td class='bigboldorange' align='center'>No.</td>";
												echo "<td class='bigboldorange'>book(s)</td>";
												echo "<td class='bigboldorange' align='center'>Qty.</td>";
												echo "<td class='bigboldorange' align='center'>Rate</td>";
												echo "<td class='bigboldorange' align='right'>Total</td>";
											echo "</tr>"; 
											$count=1;
										$qry="Select * from viewcart where user_id='".$_SESSION['uname']."' and session_id='".session_id()."'";
										$res=mysql_query($qry);
										while($fres=mysql_fetch_array($res))
										{
											$price=$fres['rate']*$fres['qty'];
											$total=$total+$price;
											echo"<form name='cart_quantity' action='cartdelete.php' method='post'>";
											echo "<tr class='infoBoxContents'>";
												echo "<td align='center'>$count.</td>";
												echo "<td>";
													echo"<table border='0' cellpadding='2' cellspacing='2' >";
														echo "<tr>";    
															echo "<td width=150 valign='top' class='bigblack'>".$fres['prod_discription']."</td>";
														echo "</tr>";
													echo"</table>";
												echo "</td>";
												echo"<input type=hidden name=pid[] value='".$fres['book_id']."'>";
												echo "<td align='right' valign='middle'>".$fres['qty']."</td>";
												echo "<td align='right' valign='middle' class='bigblack'>$".$fres['rate']."</td>";
												echo "<td  class='bigboldblack' align='right' valign='middle'><font class='bigblack'>$".$price."</font></td>";
											echo "</tr>";
											$count++;
										}
								
											echo "<tr class=infoboxcontents>";
												echo "<td width=50 colspan=2 class='bigblack'>&nbsp;</td>";
												echo "<td valign='middle' class='bigboldgreen' align='right' colspan=3>Sub-Total: <font class=bigblack>$".$total."</font></td>";
											echo "</tr>";

										echo "</table>";
?></td>	
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2">
		                      <table border="0" class="BorderOfTable" width="400">
       					        <tr>
									<td class="smallboldblack">Continue Checkout Procedure</td> 
		                          <td align="right"><input type="submit" name="adserch" value="Continue" class="Buttonblack"></td>
          					    </tr>
		                      </table>												
							</td>
						</tr>
					</table>
					</form>
				</td>
			</tr>
		</table>
	</td>
	<td valign="top" align="center"></td>
	</tr>
</table>
<?php
include "footerpg.php";
?>