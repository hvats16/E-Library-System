<?php
include "headerpg.php";
include "config.php";
?>
<html>
<body>
    <td valign="top">
		<blockquote><table border="0" cellpadding="0" cellspacing="0">
          		<tr> 
            	    <td valign="top" width="100%"><form name="contact_us" action="contactsave.php" method="get" onSubmit="return check(this)">
                		<table border="0" cellpadding="0" cellspacing="0" width="100%">
                    			<tr> 
                      				<td>
										<table border="0" width="100%">
                    					        <tr> 
                              						<td class="bigboldorange">Enquiry</td>
					                            </tr>
                    					        <tr> 
                              						<td height="10" class="bigboldorange"><hr></td>
					                            </tr>
				                        </table>
									</td>
								</tr>
			                    <tr> 
            				        <td>&nbsp;</td>
			                    </tr>
            			        <tr> 
                      				<td>
										<table class="infoBox" border="0" cellpadding="2" cellspacing="1" width="100%">
					                            <tr class="infoBoxContents"> 
                    						        <td>
														<table border="0" cellpadding="2" cellspacing="0" width="100%">
														<?PHP
														if($_GET['valid']==1)
														{
														?>
															<tr><td class="BIGBOLDGREEN">Thank You. Your query is stored. We will reply as soon as possible.</td></tr>
															<tr><td class="BIGBOLDGREEN" align="center">To continue click <A href="books.php" class="bigorange">Back</A> to book page.</td></tr>
														<?php }else{ ?>
                            							        <tr> 
								                                    <td class="bigboldgreen">Full Name</td>
                                							    </tr>
							                                    <tr> 
                            								        <td><input name="name" type="text" class="Buttonwhitecomb"></td>
							                                    </tr>
                            							        <tr> 
								                                    <td class="bigboldgreen">E-Mail Address</td>
                                								</tr>
							                                    <tr> 
																	<td><input name="email" type="text" class="Buttonwhitecomb"></td>
							                                    </tr>
                            							        <tr> 
								                                    <td class="bigboldgreen">Enquiry</td>
                                								</tr>
							                                    <tr> 
                            								        <td><textarea name="enquiry" wrap="soft" cols="80" rows="15" class="Buttonwhite"></textarea></td>
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
                      				<td>
										<table class="infoBox" border="0" cellpadding="2" cellspacing="1" width="100%">
                    					        <tr class="infoBoxContents"> 
					                            <td>
													<table border="0" cellpadding="2" cellspacing="0" width="100%">
                        						            <tr> 
							                                    <td width="10">&nbsp;</td>
                            							        <td align="right"><input type="submit" class="Buttonorange" value="Continue"></td>
							                                    <td width="10">&nbsp;</td>
                            						        </tr>
                        					        </table>
												</td>
				                            	</tr>
												<?php }?>
    				                  </table>
									  
									 </td>
				                 </tr>
		                </table>
					</form>
					</td>
				</tr>
    	   </table>
		  </blockquote>
		  </td>
	  </tr>
      </td>
	</table>
    </td>
    </tr>
    </table>
    </body>
    </html>
    
    <?php
include "footerpg.php";
    ?>
  <script language="JavaScript">
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

function check(form)
{
	var name=form.name.value;
	if(name=="")
	{
		alert("Name field must not be empty:");
		form.name.focus();
		return false;
	}
	var email=form.email.value;
	if(isEmail(email)==false)
	{
		alert("Enter Proper Email Address");
		form.email.focus();
		return false;
	}
	var enquiry=form.enquiry.value;
	if(enquiry=="")
	{
		alert("Enquiry must not be empty");
		form.enquiry.focus();
		return false;
	}
	return true;
}
</script>


