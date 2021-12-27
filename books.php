<?php
include "headerpg.php";
?>
	<td valign="top" align="center">
		<table border=0 cellpadding="0" cellspacing="0" align="center" width="100%">
			<?php
			if($_GET['name']=="")
			{
				if($_GET['valid']=="")
				{
					echo"<tr><td align='center' class='bigboldblack'><u>All books</u></td></tr>";
				}
				else
				{
					echo"<tr><td align='center' class='bigboldblack'><font color=#FF0000><u>".$_GET['valid']."</u></font></td></tr>";
				}			
			}
			else
			{
				echo"<tr><td align='center' class='bigboldblack'><u>".$_GET['name']."</u></td></tr>";
			}			
			?>
			<tr align="center">
				<td class="bigboldgreen" height="28"><hr></td>
			</tr>
		 	<tr> 
            	<td valign="top" align="center" > 
				<?php 
				if (isSet($_GET['pgno'])==true && $_GET['pgno']!="")
				{
					$pg=$_GET['pgno'];
					$st=6*($pg-1);
					$lim=" Limit $st,6";
				}
				else
				{
					$pg=1;
					$st=0;
					$lim=" Limit $st,6";				
				}
				if($_GET['check']!='search')
				{			   
					if($_GET['name']=="")
					{		$cond= "";		}
					else
					{		$cond= " where category_name='".$_GET['name']."'";		}
				}
				else
				{
				$check=$_GET['check'];
					if($_GET['name']=="")
					{		$cond= "";		}
					else
					{		$cond= " where category_name='".$_GET['name']."' or book_image ='".$_GET['name']."' or book_name='".$_GET['name']."' or subcat_name='".$_GET['name']."' or prod_discription like '%".$_GET['name']."%'"; 	}
				}
					$qry="Select * from book".$cond.$lim;
			
            		$result = mysql_query($qry);
					$res=mysql_query($result);
					$counto=0;
              		echo"<table border=0 cellpadding=0 cellspacing=0 align=center width=100%>";
						echo"<tr>";
					while($fres=mysql_fetch_array($result))
					{
						if($counto%2==0)
						{
							echo"</tr><tr height=8><td></td></tr><tr>";
						}
						echo "<td width=10>&nbsp;</td>";
						echo"<td valign='top'>";
							echo"<table border='0' align='center' cellpadding='0' cellspacing='0' width=250 class='BorderofTable'>";
								echo"<tr>";
									echo"<td width=5 rowspan=5></td>";
									echo"<td colspan=3 valign='top' align='center' height=20 class='bigboldorangeul'>$fres[book_name]</td>";
								echo"</tr>";
								echo"<tr>";
									echo"<td align='center' width=100 rowspan=2 class='borderoftable'><a href='viewbook.php?id=".$fres['book_id']."'><img src='admin/image/small/$fres[book_image]' alt='$fres[book_image]' title='' border='0' height='78' vspace='5' width='78'></a></td>";
									echo"<td width=5 rowspan=2></td>";
									echo"<td height=70 valign=top class='smallblack'>$fres[short_disc]</td>";
								echo"</tr>";
								if($_SESSION['uname'])
									{
									echo "<tr>";	
									echo "<td height=70 valign=top class='button'> <a href='admin/".$fres['path']."' download>Download</a></td>";
									}
								echo"<tr>";
									echo"<td align=right height=10><a href='viewbook.php?id=".$fres['book_id']."' class='smallboldgreen'>view</a></td>";
								echo"</tr>";
								echo"<tr >";																				
									echo"<td colspan='3' align='center' class='bigblack'>Price:<font color='#ff0000'> $".$fres[book_price]."</span></font></td>";
								echo"</tr>";
								echo "<form name='book[]' method='post' action='addtocart.php?prod_id=".$fres['book_id']."&check=1&name=".$_GET['name']."&pgno=".$_GET['pgno']."'>";
									echo"<tr>";
										echo"<td colspan='3' align=center>&nbsp;<input name='txtqty' type='text' onFocus='this.select()' value='1' size='2' class='smallblack'>&nbsp;<input name='cmdatoc' type='submit' class='Buttonblack' value='Add To Cart'> </td>";
									echo"</tr>";
								echo "</form>";
							echo"</table>";
						echo"</td>";
						$counto++;											
					}
					echo"</tr>";
					echo"</table>";

					$qry="Select count(*) as total from book".$cond;
					$res=mysql_query($qry);
					$fr=mysql_fetch_array($res);
					if($fr['total']>6)
					{
						$noofpgs=ceil(($fr['total']/6));
					}
					echo "<table cellpadding=0 cellspacing=0 border=0 width=100% align=left>";
					echo "<tr>";
					if($noofpgs>5)
					{
							echo "<form name='frmpg'>";
							echo "<td height=30 valign='middle' class=bigblack>";
							echo "Go To Page : ";
								/*Putting the links for the other pages using a hidden field and Combobox.*/
								echo "<input type='hidden' name='name' value='".$_GET['name']."'>";
								echo "<input type='hidden' name='check' value='".$_GET['check']."'>";
								echo "<select name='pgno' onchange='frmpg.submit()' class='smallboldblack'>";
								for($i=1;$i<=$noofpgs;$i++)
								{
									if ($_GET['pgno']!=$i)
									{
										echo "<option value='".$i."'>".$i."</option>";
									}
									else
									{
										echo "<option value='".$i."' selected>".$i."</option>";
									}
								}
								echo "</select>";
								echo "</td>";
								echo "</form>";

						}
						else
						{
							/*Putting the links for the other pages if possible to create.*/
							echo"<td class=bigblack>";
							if($noofpgs>1)
								echo "Go To Page : ";
							for($i=1;$i<=$noofpgs;$i++)
							{	
								if($_GET['pgno']==$i)
								{
									echo "<font class='BigBoldgreen'>$i</font>&nbsp;";
								}
								else
								{
										echo "<a href='".basename($PHP_SELF)."?check=".$_GET['check']."&name=".$_GET['name']."&pgno=$i' class='Bigorange'>$i</a>&nbsp;";
								}
							}
							echo "</td>";
						}
					echo "</td><td width=30% class='SmallBoldGreen' align=right>Total items found : ".$fr['total']."</td></tr>";
					echo "</table>";
				?>



</td>
</tr>
</table>
</td>

</tr>
</table>
<?php
include "footerpg.php";
?>
