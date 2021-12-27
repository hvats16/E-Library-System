<?php
include "headerpg.php";
?>
    <td valign="top" width="490"> 
<?php				
		$qry="Select count(*) as total from viewcart where user_id='".$_SESSION['uname']."' and session_id='".session_id()."'";
		$fres=mysql_fetch_array(mysql_query($qry));
		$totalitems=$fres['total'];

			echo "<table cellpadding='0' cellspacing='0' border='0'>";
			echo "<tr valign='middle'>";
				echo "<td valign='top'>"; 
					echo "<table border='0' cellpadding='2' cellspacing='1' class='infoBox'>";
						echo "<tr class='infoBoxContents'>";
							echo "<td valign='top'><table border='0' cellpadding='0' cellspacing='0' align=center width=500 >";
								echo "<tr>";
									echo "<td>";
									if($totalitems!=0)
									{
										echo "<table border='0' cellpadding='0' cellspacing='0' >";
											echo "<tr>";
												echo "<td><font class=bigboldorange>What's In My Cart?</font></td>";
											echo "</tr>";
											echo "<tr>";
												echo "<td>&nbsp;</td>";
											echo "</tr>";
										
									}
									else
									{
										echo "<table border='0' cellpadding='0' cellspacing='0' align=center width='250' height=200>";
											echo "<tr >";
												echo "<td align=center><font class=bigboldorange>There is no book in your order.</font></td>";
											echo "</tr>";
									}
										echo "</table>";
									echo "</td>";
								echo "</tr>";
								echo "<tr>";
								if($totalitems!=0)
								{
									echo "<td>";
										echo "<table border='0' cellpadding='2' cellspacing='1' class='infoBox' width='100%'>";
											echo "<tr class='infoboxcontents' >";
												echo "<td class='bigboldgreen' align='center'>Remove</td>";
												echo "<td class='bigboldgreen'>book(s)</td>";
												echo "<td class='bigboldgreen' align='center'>Qty.</td>";
												echo "<td class='bigboldgreen' align='center'>Rate</td>";
												echo "<td class='bigboldgreen' align='right'>Total</td>";
											echo "</tr>"; 
										$qry="Select * from viewcart where user_id='".$_SESSION['uname']."' and session_id='".session_id()."'";
										$res=mysql_query($qry);
										$i=0;
										while($fres=mysql_fetch_array($res))
										{
											$price=$fres['rate']*$fres['qty'];
											$total=$total+$price;
											echo"<form name='cart_quantity' action='cartdelete.php' method='post'>";
											echo "<tr class='infoBoxContents'>";
												echo "<td align='center' valign='top'><input name='chkdelete[]' type='checkbox' value=".$fres['book_id']."></td>";
												echo "<td>";
													echo"<table border='0' cellpadding='2' cellspacing='2' >";
														echo "<tr>";    
															echo "<td align='left'><a href='#'><img src='admin/image/small/".$fres['book_image']."' alt='' title='' border='1' height='78' width='78'></a></td>    ";
															echo "<td width=150 valign='top' class='bigblack'>".$fres['prod_discription']."</td>";
														echo "</tr>";
													echo"</table>";
												echo "</td>";
												echo"<input type=hidden name=pid[] value='".$fres['book_id']."'>";
												echo "<td align='right' valign='top'><input name='txtqty[]' class='buttonwhite' value='".$fres['qty']."' size='4' type='text'></td>";
												echo "<td align='right' valign='top' class='bigblack'>$".$fres['rate']."</td>";
												echo "<td  class='bigboldblack'align='right' valign='top'><font class=bigorange>$".$price."</font></td>";
											echo "</tr>";
											$i++;
										}
								
											echo "<tr class=infoboxcontents>";
												echo "<td width=150 colspan=2 class='bigblack'><a href='#' class='bigblack' onclick=' return checkitem();'>CheckAll</a>&nbsp;<font class=biggreen>|</font>&nbsp;<a href='#' class='bigblack' onclick=' return uncheckitem()'>ClearAll</a></td>";
												echo "<td valign='middle' class='bigboldblack' align='right' colspan=3>Sub-Total: <font class=bigorange>$".$total."</font></td>";
											echo "</tr>";
										echo "</table>";
									echo "</td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td height=10 ></td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td height=10 ></td>";
								echo "</tr>";
								echo "<tr>";
									echo "<td><table class='infoBox' border='0' cellpadding='2' cellspacing='1' width=100%>";
									echo "<tr class='infoBoxContents'>";
										echo "<td ><table border='0' cellpadding='2' cellspacing='0' align=center width=250>";
											echo "<tr align=center>";
												
												echo "<td ><input type='button' class='Buttonblack'value='ContinueShopping' onClick=window.location='books.php'></td>";
												echo "<td ><input type='button' class='Buttongreen'value='CheckOut' onClick=window.location='checkout.php'></td>";
											echo "</tr>";
											echo"</form>";
										echo "</table></td>";
									echo "</tr>";
								}
									echo "</table></td>";
								echo "</tr>";
							echo "</table></td>";
						echo "</tr>";
					echo "</table>";
				echo "</td></tr>";
			echo "</table>";
			?>
		</td>
	</tr>
</table>
<?php
include "footerpg.php";
?>
<script language="JavaScript">
	function checkitem()
	{
	
		var a=0;
		for(a=0;a<window.document.cart_quantity.elements.length;a++)
		{
			if(window.document.cart_quantity.elements[a].name=="chkdelete[]")
			{
				window.document.cart_quantity.elements[a].checked=true;
			}
		}
	}
	function uncheckitem()
	{
	
		var a=0;
		for(a=0;a<window.document.cart_quantity.elements.length;a++)
		{
			if(window.document.cart_quantity.elements[a].name=="chkdelete[]")
			{
				window.document.cart_quantity.elements[a].checked=false;
			}
		}
	}
</script>
