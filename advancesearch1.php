<?php
include "headerpg.php";
$cond="";
$con="";
if($_GET['cate_name']!="")
{
	$cond=" category_name='".$_GET['cate_name']."'";
	$con=" and ";
}
if($_GET['subcat']!="")
{
	$cond=$cond.$con." subcat_name='".$_GET['subcat']."'";
	$con=" and ";
}
if($_GET['publisher']!="")
{
	$cond=$cond.$con." publisher='".$_GET['publisher']."'";
	$con=" and ";
}
if($_GET['pfrom']!="" && $_GET['pto']!="")
{
	if($_GET['pfrom'] > $_GET['pto'])
	{
		$cond=$cond.$con." (book_price>=".$pfrom." and book_price<=".$pto.")";
		$con=" and ";
	}
	elseif($_GET['pto'] > $_GET['pfrom'])
	{
		$cond=$cond.$con." (book_price<=".$pto." and book_price>=".$pfrom.")";
		$con=" and ";
	}
}
elseif($_GET['pfrom']!="" && $_GET['pto']=="")
{
	$cond=$cond.$con."book_price='".$pfrom."'";
	$con=" and ";
}	
elseif($_GET['pfrom']=="" && $_GET['pto']!="")
{
	$cond=$cond.$con." book_price='".$pto."'";
	$con=" and ";
}	
?>

	<td valign="top" align="center">
		<table border=0 cellpadding="0" cellspacing="0" align="center" width="100%">
			<?php
				echo"<tr><td align='center' class='bigboldblack'><u>".$_GET['name']."</u></td></tr>";
			?>
			<tr align="center">
				<td class="bigboldgreen" height="28"><hr></td>
			</tr>
		 	<tr>
            	<td valign="top" align="center" > 
				<?php 
				if (isSet($_GET['pgno'])==true && $_GET['pgno']!="")
				{
					$pgno=$_GET['pgno'];
					$st=6*($pgno-1);
					$lim=" Limit $st,6";
				}
				else
				{
					$pgno=1;
					$st=0;
					$lim=" Limit $st,6";				
				}
					$qry="select * from book where ".$cond.$lim;
	          		$result = mysql_query($qry);
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
								echo"<tr>";
									echo"<td align=right height=10><a href='viewbook.php?id=".$fres['book_id']."&pgno=$i&prod_id=".$fres['book_id']."' class='smallboldgreen'>view</a></td>";
								echo"</tr>";
								echo"<tr >";																				
									echo"<td colspan='3' align='center' class='bigblack'>Price:<font color='#ff0000'> $".$fres[book_price]."</span></font></td>";
								echo"</tr>";
								echo "<form name='book[]' method='post' action='addtocart.php?pgno=".$i."&prod_id=".$fres['book_id']."&check=1&id=search&name=".$_GET['name']."&pgno=".$i."&cate_name=".$_GET['cate_name']."&publisher=".$_GET['publisher']."&pfrom=".$_GET['pfrom']."&pto=".$_GET['pto']."&subcat=".$_GET['subcat']."'>";
									echo"<tr>";
										echo"<td colspan='3' align=center>&nbsp;<input name='txtqty' type='text' onFocus=this.value='' value='1' size='2' class='smallblack'>&nbsp;<input name='cmdatoc' type='submit' class='Buttonblack' value='Add To Cart'> </td>";
									echo"</tr>";
								echo "</form>";
							echo"</table>";
						echo"</td>";
					
					
						$counto++;											
					}
					echo"</tr>";
					echo"</table>";
					$qry1="select count(*) as total from book where ".$cond;
					$res=mysql_query($qry1);
					$fr=mysql_fetch_array($res);
					if($fr['total']>6)
					{
						$noofpgnos=ceil(($fr['total']/6));
					}
					echo "<table cellpadding=0 cellspacing=0 border=0 width=470 align=left>";
					echo "<tr><td width=10>&nbsp;</td><td>";
					for($i=1;$i<=$noofpgnos;$i++)
					{
						if($_GET['pgno']==$i)
						{
							echo "<font class='BigBoldgreen'>$i</font>&nbsp;";
						}
						else
						{
							echo "<a href='".basename($PHP_SELF)."?pgno=$i&cate_name=".$_GET['cate_name']."&publisher=".$_GET['publisher']."&pfrom=".$_GET['pfrom']."&pto=".$_GET['pto']."' class='Bigorange'>$i</a>&nbsp;";
						}
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
