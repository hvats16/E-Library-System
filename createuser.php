<?php
include "headerpg.php";
?>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
      <td valign="top" width="400">
	  <form name="create_account" action="createuser1.php" method="get" onSubmit="return check(this)">
        <input name="action" value="process" type="hidden">
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr > 
              <td><table border="0" align="center">
                   	<tr> 
					
					<?php 
						$valid=$_GET['valid'];
						if($valid!="")
						{
							echo"<td width='400' align='center'><font color='#ff0000'><b>".$valid."</b></font></td>";
						}
						else
						{	
							echo"<td width='400' class='bigboldorange'>My Account Information</td>";
						}
						?>
					 </tr>
					 <tr> 
                      <td height="10" align="center"><hr></td>
					 </tr>
                </table></td>
            </tr>
            <tr> 
              <td></td>
            </tr>
            <tr> 
              <td><br>
                <font class="bigboldorange">NOTE:</font><font class="bigblack"> 
                If you already have an account, please login at the </font><a href="login.php" class="biggreen"><u>login 
                page</u></a>.</td>
            </tr>
            <tr> 
              <td>&nbsp;</td>
            </tr>
            <tr> 
              <td>
			  	<table width="400" border="0" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td class="bigboldgreen" height="30">Your Personal Details</td>
                      <td align="center"><font class="requiredfield">*</font><font class="bigblack"> Required information</font></td>
                    </tr>
                </table>
			</td>
            </tr>
            <tr> 
              <td><table  border="0" cellpadding="2" cellspacing="1" class="infoBox" width="350" >
                  <tbody>
                    <tr  class="infoBoxContents"> 
                      <td>
					  	<table border="0" cellpadding="2" cellspacing="2" align="left">
                          <tbody>
                            <tr> 
                              <td class="bigorange">First Name:</td>
                              <td ><input name="firstname" type="text" maxlength="30" class="Buttonwhitecomb" size="17" value="<?php echo $_GET['txtfname']; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
                            <tr> 
                              <td class="bigorange">Last Name:</td>
                              <td ><input name="lastname" type="text" maxlength="30" class="Buttonwhitecomb" size="17" value="<?php echo $_GET['txtlname']; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
                            <tr> 
                              <td class="bigorange">Gender:</td>
							  <?php
	  							    if($_GET['txtgen']=="male")
									{
										$male="checked";
				  						$female="";
									}
									else
									{
										$female="checked";
										$male="";
									}		

							  ?>
                              <td ><input name="gender" value="male" type="radio" <?php echo $male; ?> >&nbsp;<font class="bigblack">Male</font>&nbsp;&nbsp; 
                                 <input name="gender" value="female" type="radio" <?php echo $female;?> >&nbsp;<font class="bigblack">Female</font>&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
							
                            <tr> 
                              <td class="bigorange">Date of Birth:</td>
							  <?php 
							  if($_GET['txtdd']=="")
								{
									$txtdd="dd";
								}
								else
								{
									$txtdd=$_GET['txtdd'];
								}
							  if($_GET['txtyy']=="")
								{
									$txtyy="yyyy";
								}
								else
								{
									$txtyy=$_GET['txtyy'];
								}
							  if($_GET['txtmm']=="")
								{
									$txtmm="mm";
								}
								else
								{
									$txtmm=$_GET['txtmm'];
								}
							  ?>
							 
                              <td ><input name="dobdd" class="Buttonwhite" type="text" maxlength="2" size="2" onFocus="this.value=''" value="<?php echo $txtdd; ?>">&nbsp;<input name="dobmm" type="text" maxlength="2" class="Buttonwhite" size="2" onFocus="this.value=''" value="<?php echo $txtmm; ?>">&nbsp;<input name="dobyy" type="text" class="Buttonwhite" maxlength="4" size="4" onFocus="this.value=''" value="<?php echo $txtyy; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
                            <tr> 
                              <td class="bigorange">E-Mail Address:</td>
                              <td ><input name="email_address" type="text" maxlength="30" class="Buttonwhitecomb" size="17" value="<?php echo $_GET['txtemail']; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
                        </table></td>
                    </tr>
                </table></td>
            </tr>
			<tr> 
              <td class="bigboldgreen" height="30">Father Occupation Details</td>
            </tr>
            <tr> 
              <td><table border="0" cellpadding="2" cellspacing="1" class="infoBox" width="350">
                  <tbody>
                    <tr class="infoBoxContents"> 
                      <td><table border="0" cellpadding="2" cellspacing="2" align="left">
                          <tbody>
                            <tr> 
                              <td class="bigorange">publisher Name:</td>
                              <td ><input name="publisher" type="text" maxlength="30" class="Buttonwhitecomb" size="17" value="<?php echo $_GET['txtpublisher']; ?>">&nbsp;</td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr> 
              <td class="bigboldgreen" height="30">Contact Information</td>
            </tr>
            <tr> 
              <td><table border="0" cellpadding="2" cellspacing="1" class="infoBox" width="350">
                  <tbody>
                    <tr class="infoBoxContents"> 
                      <td height="175"><table border="0" cellpadding="2" cellspacing="2">
                          <tbody>
                            <tr> 
                              <td class="bigorange">Street Address:</td>
                              <td><input name="street_address" type="text" maxlength="50" class="Buttonwhitecomb" size="17" value="<?php echo $_GET['txtaddress']; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
                            <tr> 
                              <td class="bigorange">Post Code:</td>
                              <td ><input name="postcode" type="text" maxlength="8" class="Buttonwhitecomb" size="17" value="<?php echo $_GET['txtpostcode']; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
                            <tr> 
                              <td class="bigorange">City:</td>
                              <td ><input name="city" type="text" maxlength="30" class="Buttonwhitecomb" size="17" value="<?php echo $_GET['txtcity']; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
                            <tr> 
                              <td class="bigorange">State/Province:</td>
                              <td > <input name="state" type="text" maxlength="30" class="Buttonwhitecomb" size="17" value="<?php echo $_GET['txtstate']; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
                            <tr> 
                              <td height="46" class="bigorange">Country:</td>
							  <?php
							  	if($_GET['txtcountry']=="")
								{
									$country="Please Select";
								}
								else
								{
									$country=$_GET['txtcountry'];
								}
							  ?>
                              <td ><select name="country" class="Buttonwhitecomb">
                              <option value="<?php echo $country; ?>" selected><?php echo $country; ?></option>
                              <option value="Afghanistan">Afghanistan</option>
                              <option value="Albania">Albania</option>
                              <option value="Algeria">Algeria</option>
                              <option value="American Samoa">American Samoa</option>
                              <option value="Andorra">Andorra</option>
                              <option value="Angola">Angola</option>
                              <option value="Anguilla">Anguilla</option>
                              <option value="Antarctica">Antarctica</option>
                              <option value="Antigua and Barbuda">Antigua and 
                              Barbuda</option>
                              <option value="Argentina">Argentina</option>
                              <option value="Armenia">Armenia</option>
                              <option value="Aruba">Aruba</option>
                              <option value="Australia">Australia</option>
                              <option value="Austria">Austria</option>
                              <option value="Azerbaijan">Azerbaijan</option>
                              <option value="Bahamas">Bahamas</option>
                              <option value="Bahrain">Bahrain</option>
                              <option value="Bangladesh">Bangladesh</option>
                              <option value="Barbados">Barbados</option>
                              <option value="Belarus">Belarus</option>
                              <option value="Belgium">Belgium</option>
                              <option value="Belize">Belize</option>
                              <option value="Benin">Benin</option>
                              <option value="Bermuda">Bermuda</option>
                              <option value="Bhutan">Bhutan</option>
                              <option value="Bolivia">Bolivia</option>
                              <option value="Bosnia ">Bosnia </option>
                              <option value="Botswana">Botswana</option>
                              <option value="Bouvet Island">Bouvet Island</option>
                              <option value="Brazil">Brazil</option>
                              <option value="British Indian Ocean Territory">British 
                              Indian Ocean Territory</option>
                              <option value="Brunei Darussalam">Brunei Darussalam</option>
                              <option value="Bulgaria">Bulgaria</option>
                              <option value="Burkina Faso">Burkina Faso</option>
                              <option value="Burundi">Burundi</option>
                              <option value="Cambodia">Cambodia</option>
                              <option value="Cameroon">Cameroon</option>
                              <option value="Canada">Canada</option>
                              <option value="Cape Verde">Cape Verde</option>
                              <option value="Cayman Islands">Cayman Islands</option>
                              <option value="Central African Republic">Central 
                              African Republic</option>
                              <option value="Chad">Chad</option>
                              <option value="Chile">Chile</option>
                              <option value="China">China</option>
                              <option value="Christmas Island">Christmas Island</option>
                              <option value="Cocos (Keeling) Islands">Cocos (Keeling) 
                              Islands</option>
                              <option value="Colombia">Colombia</option>
                              <option value="Comoros">Comoros</option>
                              <option value="Congo">Congo</option>
                              <option value="Cook Islands">Cook Islands</option>
                              <option value="Costa Rica">Costa Rica</option>
                              <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                              <option value="Croatia">Croatia</option>
                              <option value="Cuba">Cuba</option>
                              <option value="Cyprus">Cyprus</option>
                              <option value="Czech Republic">Czech Republic</option>
                              <option value="Denmark">Denmark</option>
                              <option value="Djibouti">Djibouti</option>
                              <option value="Dominica">Dominica</option>
                              <option value="Dominican Republic">Dominican Republic</option>
                              <option value="East Timor">East Timor</option>
                              <option value="Ecuador">Ecuador</option>
                              <option value="Egypt">Egypt</option>
                              <option value="El Salvador">El Salvador</option>
                              <option value="Equatorial Guinea">Equatorial Guinea</option>
                              <option value="Eritrea">Eritrea</option>
                              <option value="Estonia">Estonia</option>
                              <option value="Ethiopia">Ethiopia</option>
                              <option value="Falkland Islands (Malvinas)">Falkland 
                              Islands (Malvinas)</option>
                              <option value="Faroe Islands">Faroe Islands</option>
                              <option value="Fiji">Fiji</option>
                              <option value="Finland">Finland</option>
                              <option value="France">France</option>
                              <option value="France, Metropolitan">France, Metropolitan</option>
                              <option value="French Guiana">French Guiana</option>
                              <option value="French Polynesia">French Polynesia</option>
                              <option value="French Southern Territories">French 
                              Southern Territories</option>
                              <option value="Gabon">Gabon</option>
                              <option value="Gambia">Gambia</option>
                              <option value="Georgia">Georgia</option>
                              <option value="Germany">Germany</option>
                              <option value="Ghana">Ghana</option>
                              <option value="Gibraltar">Gibraltar</option>
                              <option value="Greece">Greece</option>
                              <option value="Greenland">Greenland</option>
                              <option value="Grenada">Grenada</option>
                              <option value="Guadeloupe">Guadeloupe</option>
                              <option value="Guam">Guam</option>
                              <option value="Guatemala">Guatemala</option>
                              <option value="Guinea">Guinea</option>
                              <option value="Guinea-bissau">Guinea-bissau</option>
                              <option value="Guyana">Guyana</option>
                              <option value="Haiti">Haiti</option>
                              <option value="Heard and Mc Donald Islands">Heard 
                              and Mc Donald Islands</option>
                              <option value="Honduras">Honduras</option>
                              <option value="Hong Kong">Hong Kong</option>
                              <option value="Hungary">Hungary</option>
                              <option value="Iceland">Iceland</option>
                              <option value="India">India</option>
                              <option value="Indonesia">Indonesia</option>
                              <option value="Iran (Islamic Republic of)">Iran 
                              (Islamic Republic of)</option>
                              <option value="Iraq">Iraq</option>
                              <option value="Ireland">Ireland</option>
                              <option value="Israel">Israel</option>
                              <option value="Italy">Italy</option>
                              <option value="Jamaica">Jamaica</option>
                              <option value="Japan">Japan</option>
                              <option value="Jordan">Jordan</option>
                              <option value="Kazakhstan">Kazakhstan</option>
                              <option value="Kenya">Kenya</option>
                              <option value="Kiribati">Kiribati</option>
                              <option value="Korea">Korea</option>
                              <option value="Korea, Republic of">Korea, Republic 
                              of</option>
                              <option value="Kuwait">Kuwait</option>
                              <option value="Kyrgyzstan">Kyrgyzstan</option>
                              <option value="Lao People's Democratic Republic">Lao 
                              People's Democratic Republic</option>
                              <option value="Latvia">Latvia</option>
                              <option value="Lebanon">Lebanon</option>
                              <option value="Lesotho">Lesotho</option>
                              <option value="Liberia">Liberia</option>
                              <option value="Libyan Arab Jamahiriya">Libyan Arab 
                              Jamahiriya</option>
                              <option value="Macau">Macau</option>
                              <option value="Macedonia">Macedonia</option>
                              <option value="Madagascar">Madagascar</option>
                              <option value="Malawi">Malawi</option>
                              <option value="Malaysia">Malaysia</option>
                              <option value="Maldives">Maldives</option>
                              <option value="Mali">Mali</option>
                              <option value="Malta">Malta</option>
                              <option value="Marshall Islands">Marshall Islands</option>
                              <option value="Martinique">Martinique</option>
                              <option value="Mauritania">Mauritania</option>
                              <option value="Mauritius">Mauritius</option>
                              <option value="Mayotte">Mayotte</option>
                              <option value="Mexico">Mexico</option>
                              <option value="Micronesia">Micronesia</option>
                              <option value="Moldova, Republic of">Moldova, Republic 
                              of</option>
                              <option value="Monaco">Monaco</option>
                              <option value="Mongolia">Mongolia</option>
                              <option value="Montserrat">Montserrat</option>
                              <option value="Morocco">Morocco</option>
                              <option value="Mozambique">Mozambique</option>
                              <option value="Myanmar">Myanmar</option>
                              <option value="Namibia">Namibia</option>
                              <option value="Nauru">Nauru</option>
                              <option value="Nepal">Nepal</option>
                              <option value="Netherlands">Netherlands</option>
                              <option value="Netherlands Antilles">Netherlands 
                              Antilles</option>
                              <option value="New Caledonia">New Caledonia</option>
                              <option value="New Zealand">New Zealand</option>
                              <option value="Nicaragua">Nicaragua</option>
                              <option value="Niger">Niger</option>
                              <option value="Nigeria">Nigeria</option>
                              <option value="Niue">Niue</option>
                              <option value="Norfolk Island">Norfolk Island</option>
                              <option value="Northern Mariana Islands">Northern 
                              Mariana Islands</option>
                              <option value="Norway">Norway</option>
                              <option value="Oman">Oman</option>
                              <option value="Pakistan">Pakistan</option>
                              <option value="Palau">Palau</option>
                              <option value="Panama">Panama</option>
                              <option value="Papua New Guinea">Papua New Guinea</option>
                              <option value="Paraguay">Paraguay</option>
                              <option value="Peru">Peru</option>
                              <option value="Philippines">Philippines</option>
                              <option value="Pitcairn">Pitcairn</option>
                              <option value="Poland">Poland</option>
                              <option value="Portugal">Portugal</option>
                              <option value="Puerto Rico">Puerto Rico</option>
                              <option value="Qatar">Qatar</option>
                              <option value="Reunion">Reunion</option>
                              <option value="Romania">Romania</option>
                              <option value="Russian Federation">Russian Federation</option>
                              <option value="Rwanda">Rwanda</option>
                              <option value="Saint Kitts and Nevis">Saint Kitts 
                              and Nevis</option>
                              <option value="Saint Lucia">Saint Lucia</option>
                              <option value="Saint Vincent and the Grenadines">Saint 
                              Vincent and the Grenadines</option>
                              <option value="Samoa">Samoa</option>
                              <option value="San Marino">San Marino</option>
                              <option value="Sao Tome and Principe">Sao Tome and 
                              Principe</option>
                              <option value="Saudi Arabia">Saudi Arabia</option>
                              <option value="Senegal">Senegal</option>
                              <option value="Seychelles">Seychelles</option>
                              <option value="Sierra Leone">Sierra Leone</option>
                              <option value="Singapore">Singapore</option>
                              <option value="Slovakia (Slovak Republic)">Slovakia 
                              (Slovak Republic)</option>
                              <option value="Slovenia">Slovenia</option>
                              <option value="Solomon Islands">Solomon Islands</option>
                              <option value="Somalia">Somalia</option>
                              <option value="South Africa">South Africa</option>
                              <option value="South Georgia and the South Sandwich Islands">South 
                              Georgia and the South Sandwich Islands</option>
                              <option value="Spain">Spain</option>
                              <option value="Sri Lanka">Sri Lanka</option>
                              <option value="St. Helena">St. Helena</option>
                              <option value="St. Pierre and Miquelon">St. Pierre 
                              and Miquelon</option>
                              <option value="Sudan">Sudan</option>
                              <option value="Suriname">Suriname</option>
                              <option value="Svalbard and Jan Mayen Islands">Svalbard 
                              and Jan Mayen Islands</option>
                              <option value="Swaziland">Swaziland</option>
                              <option value="Sweden">Sweden</option>
                              <option value="Switzerland">Switzerland</option>
                              <option value="Syrian Arab Republic">Syrian Arab 
                              Republic</option>
                              <option value="Taiwan">Taiwan</option>
                              <option value="Tajikistan">Tajikistan</option>
                              <option value="Tanzania, United Republic of">Tanzania, 
                              United Republic of</option>
                              <option value="Thailand">Thailand</option>
                              <option value="Togo">Togo</option>
                              <option value="Tokelau">Tokelau</option>
                              <option value="Tonga">Tonga</option>
                              <option value="Trinidad and Tobago">Trinidad and 
                              Tobago</option>
                              <option value="Tunisia">Tunisia</option>
                              <option value="Turkey">Turkey</option>
                              <option value="Turkmenistan">Turkmenistan</option>
                              <option value="Turks and Caicos Islands">Turks and 
                              Caicos Islands</option>
                              <option value="Tuvalu">Tuvalu</option>
                              <option value="Uganda">Uganda</option>
                              <option value="Ukraine">Ukraine</option>
                              <option value="United Arab Emirates">United Arab 
                              Emirates</option>
                              <option value="United Kingdom">United Kingdom</option>
                              <option value="United States">United States</option>
                              <option value="United States Minor Outlying Islands">United 
                              States Minor Outlying Islands</option>
                              <option value="Uruguay">Uruguay</option>
                              <option value="Uzbekistan">Uzbekistan</option>
                              <option value="Vanuatu">Vanuatu</option>
                              <option value="Vatican City State (Holy See)">Vatican 
                              City State (Holy See)</option>
                              <option value="Venezuela">Venezuela</option>
                              <option value="Viet Nam">Viet Nam</option>
                              <option value="Virgin Islands (British)">Virgin 
                              Islands (British)</option>
                              <option value="Virgin Islands (U.S.)">Virgin Islands 
                              (U.S.)</option>
                              <option value="Wallis and Futuna Islands">Wallis 
                              and Futuna Islands</option>
                              <option value="Western Sahara">Western Sahara</option>
                              <option value="Yemen">Yemen</option>
                              <option value="Yugoslavia">Yugoslavia</option>
                              <option value="Zaire">Zaire</option>
                              <option value="Zambia">Zambia</option>
                              <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                                <font class="requiredfield">*</font></td>
                            </tr>
                            <tr> 
                              <td class="bigorange">Telephone Number:</td>
                              <td ><input name="telephone" type="text" maxlength="15" class="Buttonwhitecomb" size="17" value="<?php echo $_GET['txttelephone']; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
                            <tr> 
                              <td class="bigorange">Fax Number:</td>
                              <td ><input name="fax" type="text" maxlength="15" class="Buttonwhitecomb" size="17" value="<?php echo $_GET['txtfax']; ?>">
                                &nbsp;</td>
                            </tr>
							
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr> 
              <td class="bigboldgreen" height="30">Options</td>
            </tr>
            <tr> 
              <td><table  border="0" cellpadding="2" cellspacing="1" class="infoBox" width="350">
                  <tbody>
                    <tr class="infoBoxContents"> 
                      <td><table border="0" cellpadding="2" cellspacing="2">
                          <tbody>
                            <tr> 
                              <td class="bigorange">Newsletter:</td>
                              <td>
							  <?php
							  	if($_GET['txtnewsletter']==1)
								{
									$newsletter="checked";
								}
								else
								{
									$newsletter="";
								}
							  ?>
							  <input name="newsletter" value="1" type="checkbox" <?php echo $newsletter ?>>
                                &nbsp;</td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr> 
              <td class="bigboldgreen" height="30">Your Password</td>
            </tr>
            <tr> 
              <td><table  border="0" cellpadding="1" cellspacing="1" class="infoBox" width="350">
                  <tbody>
                    <tr class="infoBoxContents"> 
                      <td><table border="0" cellpadding="2" cellspacing="2">
                          <tbody>
                            <tr> 
                              <td class="bigorange">User Id:</td>
                              <td ><input name="userid" maxlength="40" type="text" class="Buttonwhitecomb" size="17" value="<?php echo $_GET['txtuid']; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
                            <tr> 
                              <td class="bigorange">Password:</td>
                              <td ><input name="password" maxlength="20" class="Buttonwhitecomb" type="password" size="17" value="<?php echo $_GET['txtpassword']; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
                            <tr> 
                              <td class="bigorange">Password Confirmation:</td>
                              <td ><input name="confpassword" maxlength="20" type="password" class="Buttonwhitecomb" size="17" value="<?php echo $_GET['txtconfpassword']; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
							 <tr> 
                              <td class="bigorange">Security Question:</td>
                              <td ><input name="sque" maxlength="30" class="Buttonwhitecomb" type="text" size="17" value="<?php echo $_GET['txtsque']; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
                            <tr> 
                              <td class="bigorange">Security Answer:</td>
                              <td ><input name="sans" maxlength="30" type="text" class="Buttonwhitecomb" size="17" value="<?php echo $_GET['txtsans']; ?>">&nbsp;<font class="requiredfield">*</font></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
            <tr> 
              <td><hr></td>
            </tr>
            <tr> 
              <td><table  border="0" cellpadding="2" cellspacing="1" width="400" >
                  <tbody>
                    <tr > 
                      <td align="right" width="200" ><input name="submit" type="submit" class="Buttongreen" value="Submit"></td>
                      <td>&nbsp;</td>
                      <td ><input name="submit2" type="reset" class="Buttonorange" value="Reset "></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table>
      </form></td>
    <td valign="top" align="center" width="150">&nbsp;</td>
  </tr>
</table>
<?php
include "footerpg.php";
?>
<script language="JavaScript">
function isStr(st)
{
	validst="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
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
			form.dobdd.focus();
			return false;
		}
		if(BDate=="")
		{
			alert("Birth Date cannot be empty.");
			form.dobdd.focus();
			return false;
		}
		/*Month Checking*/
		if(BMonth=="")
		{
			alert("Please select Birth Month.");
			form.dobmm.focus();
			return false;
		}
		if((isNumeric(BMonth)==false)||(BMonth>12) || (BMonth<1))
		{
			alert("Please enter valid Birth Month.");
			form.dobmm.focus();
			return false;
		}
		/*Year Checking*/
		if(isNumeric(BYear)==false)
		{
			alert("Please enter a valid Year.");
			form.dobyy.focus();
			return false;
		}
		if(BYear=="")
		{
			alert("Birth Year cannot be empty.");
			form.dobyy.focus();
			return false;
		}
		if((BYear.length<4)||(BYear>CYear)||(isNaN(BYear)==true)|| (BYear<1))
		{
			alert("Please insert a valid year.");
			form.dobyy.focus();
			return false;		
		}
		if(BMonth=="2")
		{
			if((BYear%4)==0)
			{
				if(BDate>"29")
				{
					alert("Please enter valid date.");
					form.dobdd.focus();
					return false;				
				}
			}
			else
			{
				if(BDate>"28")
				{
					alert("Please enter valid date.");
					form.dobdd.focus();
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
									form.dobdd.focus();
									return false;
							}
							break;
			}
		}
		return true;
}

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
}
function userid(st)
{
	validst="_.abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	var j=0;
	if(st=="")
	{
		return false;
	}
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


// Password Validation
function isPassword(st)
{
	validst=" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789~!@#$%^&*()_+|-=\[]{};:<>?,./";
	var j=0;
	if(st=="")
	{
		return false;
	}
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

// PhoneNo Validation
function isPhoneNo(st)
{
	validst="-0123456789";
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


function check(form)
{
	var fn=form.firstname.value;
	var ln=form.lastname.value;
	var bdt=form.dobdd.value;
	var bmn=form.dobmm.value;
	var byr=form.dobyy.value;
	var email=form.email_address.value;
	var Address=form.street_address.value;
	var postcode=form.postcode.value;
	var City=form.city.value;
	var State=form.state.value;
	var Country=form.country.value;
	var PNo=form.telephone.value;
	var uid=form.userid.value;
	var pass=form.password.value;
	var cpass=form.confpassword.value;
	var sque=form.sque.value;
	var sans=form.sans.value;


	if(fn=="")
	{
		alert("First Name cannot be empty.");
		form.firstname.focus();
		return false;
	}
	if(isStr(fn)==false)
	{
		alert("Enter Proper FirstName");
		return false;
	}
	if(ln=="")
	{
		alert("Last Name cannot be empty.");
		form.lastname.focus();
		return false;
	}
	if(isStr(ln)==false)
	{
		alert("Enter Proper LastName");
		return false;
	}
	if(isDate(bdt,bmn,byr)==false)
	{
		return false;
	}	
	if(isEmail(email)==false)
	{
		alert("Enter Proper Email Address");
		form.email_address.focus();
		return false;
	}
	if(Address=="")
	{
		alert("Address cannot be empty.");
		form.street_address.focus();
		return false;
	}
	if(postcode=="")
	{
		alert("PostalCode cannot be empty.");
		form.postcode.focus();
		return false;
	}
	if(isNumeric(postcode)==false)
	{
		alert("Enter proper PostalCode.");
		form.postcode.focus();
		return false;
	}
	if(City=="")
	{
		alert("City cannot be empty.");
		form.city.focus();
		return false;
	}
	if(isStr(City)==false)
	{
		alert("Please enter City properly.");
		form.city.focus();
		return false;
	}
	if(State=="")
	{
		alert("State cannot be empty.");
		form.state.focus();
		return false;
	}
	if(isStr(State)==false)
	{
		alert("Please enter State properly.");
		form.state.focus();
		return false;
	}
	if(Country=="")
	{
		alert("Please select Country from the list.");
		form.country.focus();
		return false;
	}
	if(PNo=="")
	{
		alert("Phone no can not be empty");
		form.telephone.focus();
		return false;
	}
	if (isPhoneNo(PNo)==false)
	{
		alert("Please Enter valid Phone Number.");
		form.telephone.focus();
		return false;	
	}
	if(userid(uid)==false)
	{
		alert("Enter Proper UserId");
		form.userid.focus();
		return false;
	}
	if(isPassword(pass)==false)
	{
		alert("Enter Proper Password");
		form.password.focus();
		return false;
	}
	if(pass!=cpass)
	{
		alert("Passwords do not match.");
		form.password.value="";
		form.confpassword.value="";
		form.password.focus();
		return false;
	}
		if(sque=="")
	{
		alert("Security Question can not be empty.");
		form.sque.focus();
		return false;
	}
	if(sans=="")
	{
		alert("Security Answer can not be empty");
		form.sans.focus();
		return false;
	}

}
</script>
