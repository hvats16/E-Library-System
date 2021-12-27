<?php
include "headerpg.php";
?>
	<td width="400" valign="top" align="center"> 
		<table border="0" cellpadding="0" cellspacing="0" >
			<tr>
				<td valign="top" ><form name="advancesearch1" action="advancesearch1.php" method="get" onSubmit="return check(this);">
					<table border="0" cellpadding="0" cellspacing="0" >
						<tr>
						<input type="hidden" name="pgno" value="1">
   							<td>
								<table border="0" cellpadding="0" cellspacing="0" >
									<tr>
  										<td class="bigboldorange" valign="bottom">Advanced Search</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td class="bigboldorange" height="28"><hr></td>
						</tr>
						<tr>
        					<td>
								<table border="0" cellpadding="2" cellspacing="0" >
									<tr>
										<td>&nbsp;</td>
									</tr>
        						</table>
							</td>
      					</tr>
						<tr>
        					<td>
								<table class="infoBox" border="0" cellpadding="2" cellspacing="1" >
          							<tr class="infoBoxContents">
							            <td>
											<table border="0" cellpadding="2" cellspacing="0" >
						                        <tr> 
                        						  <td class="biggreen">Categories:</td>
						                          <?php 
												  $query="select category_name from category_master order by category_name";
												  $res=mysql_query($query);
												  echo"<td ><select name='cate_name' class='Buttonwhite' style='width: 100%;'>";
												  echo"<option value='' selected>[ Select Categories ]</option>";

												  while($fres=mysql_fetch_array($res))
												  {
												  		
													  echo"<option value=".$fres['category_name'].">".$fres['category_name']."</option>";
													}
													  echo"</select></td>";
												?>
						                        </tr>
                        						<tr> 
						                          <td >&nbsp;</td>
                        						  <td class="bigblack"></td>
						                        </tr>
                        						<tr> 
						                          <td colspan="2">&nbsp;</td>
						                        </tr>
                        						<tr> 
													  <td class="biggreen">Publisher:</td>
						                          <?php 
												  $query="SELECT distinct(publisher) FROM `book` WHERE publisher!='' order by publisher";
												  $res=mysql_query($query);
												  echo"<td ><select name='publisher' class='Buttonwhite' style='width: 100%;'>";
												  echo"<option value='' selected>[ Select Manufacturers ]</option>";

												  while($fres=mysql_fetch_array($res))
												  {
												  		
													  echo"<option value=".$fres['publisher'].">".$fres['publisher']."</option>";
													}
													  echo"</select></td>";
												?>
													</tr>
                        						<tr> 
													  <td class="biggreen">Subcategory:</td>
						                          <?php 
												  $query="select name from subcategory";
												  $res=mysql_query($query);
												  echo"<td ><select name='subcat' class='Buttonwhite' style='width: 100%;'>";
												  echo"<option value='' selected>[ Select Subcategory ]</option>";

												  while($fres=mysql_fetch_array($res))
												  {
												  		
													  echo"<option value=".$fres['name'].">".$fres['name']."</option>";
													}
													  echo"</select></td>";
												?>
													</tr>
													<tr> 
													  <td colspan="2">&nbsp;</td>
													</tr>
													<tr> 
													  <td class="biggreen">Price From:</td>
													  <td ><input name="pfrom" type="text" class="Buttonwhitecomb" style="width: 199px;"></td>
													  <input name="name" type="hidden" value="Search Results">
													</tr>
													<tr> 
													  <td class="biggreen">Price To:</td>
													  <td ><input name="pto" type="text" class="Buttonwhitecomb" style="width: 199px;"></td>
													</tr>
													<tr> 
													  <td>&nbsp;</td>
													  <td>&nbsp;</td>
													</tr>
												  </table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<table border="0" cellpadding="2" cellspacing="0" >
											<tr>
												<td>&nbsp;</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
				                      <table border="0" cellpadding="2" cellspacing="1" class="infoBox"  width="300" align="center">
                					        <tr class="infoBoxContents"> 
					                          <td align="right"><input type="submit" name="adserch" value="Search" class="Buttonblack"></td>
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
<script language="JavaScript">
function check(form)
{
	var cat_name=form.cate_name.value;
	var publisher=form.publisher.value;
	var subcat=form.subcat.value;
	var pfrom=form.pfrom.value;
	var pto=form.pto.value;
	if(cat_name=="" && publisher=="" && subcat=="" && pfrom=="" && pto=="")
	{
		alert("You have to enter atlist one value for advanced search");
		return false;
	}
	return true;
}
</script>