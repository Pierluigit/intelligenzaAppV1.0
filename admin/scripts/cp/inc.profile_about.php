<table class="table table-profile">
	<thead>
		<tr>
			<th colspan="2">Personal Information</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="field">Nickname</td>
			<td class="value">
				<div class="m-b-5">
					<input tabindex="1" class="form-control" type="text" name="pseudo" id="pseudo" onKeyUp="checkPseudoMember(<?php echo($idUser);?>);" onChange="checkPseudoMember(<?php echo($idUser);?>);" onKeyBlur="checkPseudoMember(<?php echo($idUser);?>);" value="<?php echo($pseudoUser);?>" maxlength="40" />
					<span id="confirm_pseudo"></span>
				</div>
			</td>
		</tr>
		<tr>
			<td class="field">Fonction<br><span id="confirm_job"></span></td>
			<td class="value">
				<div class="m-b-5">
					<input tabindex="2" class="form-control" name="job" id="job" onKeyUp="rec_fieldMember(<?php echo($idUser);?>, 'job');" onChange="rec_fieldMember(<?php echo($idUser);?>, 'job');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'job');" type="text" value="<?php echo($jobUser);?>" maxlength="64">
				</div>

			</td>
		</tr>
		<tr>
			<td class="field">Skills<br><span id="confirm_skills"></span></td>
			<td class="value">
				<input tabindex="3" class="form-control" name="skills" id="skills" onKeyUp="rec_fieldMember(<?php echo($idUser);?>, 'skills');" onChange="rec_fieldMember(<?php echo($idUser);?>, 'skills');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'skills');" type="text" value="<?php echo($skillsUser);?>" maxlength="255">
			</td>
		</tr>
		<tr>
			<td class="field">Age<br><span id="confirm_age"></span></td>
			<td class="value">
				<input tabindex="4" class="form-control" name="age" id="age" onKeyUp="rec_fieldMember(<?php echo($idUser);?>, 'age');" onChange="rec_fieldMember(<?php echo($idUser);?>, 'age');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'age');" type="number" value="<?php echo($ageUser);?>" min="<?php if($app_ifLimitAge=="yes") { echo($app_limitAge);}else {?>0<?php }?>" max="222" maxlength="3" style="width: 77px">
			</td>
		</tr>
		<tr>
			<td class="field">Sex<br><span id="confirm_sex"></span></td>
			<td class="value">
				<select tabindex="5" class="form-control m-b-10 input-sm" name="sex" id="sex" onChange="rec_fieldMember(<?php echo($idUser);?>, 'sex');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'sex');" style="width: 177px">
					<?php if($sexUser!="") {?><option><?php echo($sexUser);?></option><?php }?>
					<option value=""></option>
					<?php if($sexUser=="") {?>
						<option value="Woman">Woman</option>
						<option value="Man">Man</option>
					<?php }else {?>
						<?php if($sexUser!="Woman") {?><option value="Woman">Woman</option><?php }?>
						<?php if($sexUser!="Man") {?><option value="Man">Man</option><?php }?>
					<?php }?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="field">Sports<br><span id="confirm_sports"></span></td>
			<td class="value">
				<input tabindex="6" class="form-control" name="sports" id="sports" onKeyUp="rec_fieldMember(<?php echo($idUser);?>, 'sports');" onChange="rec_fieldMember(<?php echo($idUser);?>, 'sports');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'sports');" type="text" value="<?php echo($sportsUser);?>" maxlength="255">
			</td>
		</tr>
		<tr>
			<td class="field">Hobbies<br><span id="confirm_hobbies"></span></td>
			<td class="value">
				<input tabindex="7" class="form-control" name="hobbies" id="hobbies" onKeyUp="rec_fieldMember(<?php echo($idUser);?>, 'hobbies');" onChange="rec_fieldMember(<?php echo($idUser);?>, 'hobbies');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'hobbies');" type="text" value="<?php echo($hobbiesUser);?>" maxlength="255">
			</td>
		</tr>
		<!-- Lack code fr de it... in db country-->
		<tr>
			<td class="field">Preference Language<br><span id="confirm_languagePref"></span></td>
			<td class="value">
				<select tabindex="5" class="form-control m-b-10 input-sm" name="languagePref" id="languagePref" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'languagePref');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'languagePref');" style="width: 177px">
					<?php if($languagePrefUser!="") {?><option value="<?php echo($languagePrefUser);?>"><?php echo($languagePrefUser);?></option><?php }else {?>
					<option value="<?php echo($languageCodePays);?>"><?php echo($languagePrefUser);?></option><?php }?>
					<option value=""></option>
					<?php
					$resultats=$connectDBIntelApp->query("select * from country where languageCode!='' order by name asc");
					$resultats->setFetchMode(PDO::FETCH_OBJ);
					while( $unResultat = $resultats->fetch() ) {
						$namePays = $unResultat->name;
						$languageCodePays = $unResultat->languageCode;
						$languagePays = $unResultat->language;// when fill in use this one?>
						<option value="<?php echo($languageCodePays);?>"><?php echo($namePays);?></option>
					<?php 
					}?>
				</select>
			</td>
		</tr>
	</tbody>
</table>




<table class="table table-profile">
	<thead>
		<tr>
			<th colspan="2">Contact</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="field">Personal Phone<br><span id="confirm_phonePerso"></span></td>
			<td class="value">
				<input tabindex="8" class="form-control" name="phonePerso" id="phonePerso" onKeyUp="rec_fieldMember(<?php echo($idUser);?>, 'phonePerso');" onChange="rec_fieldMember(<?php echo($idUser);?>, 'phonePerso');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'phonePerso');" type="text" value="<?php echo($phonePersoUser);?>" maxlength="22">
			</td>
		</tr>
		<tr>
			<td class="field">Professional Phone<br><span id="confirm_phonePro"></span></td>
			<td class="value">
				<input tabindex="9" class="form-control" name="phonePro" id="phonePro" onKeyUp="rec_fieldMember(<?php echo($idUser);?>, 'phonePro');" onChange="rec_fieldMember(<?php echo($idUser);?>, 'phonePro');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'phonePro');" type="text" value="<?php echo($phoneProUser);?>" maxlength="22">
			</td>
		</tr>
		<tr>
			<td class="field">Skype<br><span id="confirm_skypePseudo"></span></td>
			<td class="value">
				<input tabindex="10" class="form-control" name="skypePseudo" id="skypePseudo" onKeyUp="rec_fieldMember(<?php echo($idUser);?>, 'skypePseudo');" onChange="rec_fieldMember(<?php echo($idUser);?>, 'skypePseudo');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'skypePseudo');" type="text" value="<?php echo($skypePseudoUser);?>" maxlength="22">
			</td>
		</tr>

	</tbody>
</table>
<table class="table table-profile">
	<thead>
		<tr>
			<th colspan="2">Social Network</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="field">Personal Website<br><span id="confirm_websitePerso"></span></td>
			<td class="value">
				<input tabindex="11" class="form-control" name="websitePerso" id="websitePerso" onKeyUp="rec_fieldMember(<?php echo($idUser);?>, 'websitePerso');" onChange="rec_fieldMember(<?php echo($idUser);?>, 'websitePerso');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'websitePerso');" type="text" value="<?php echo($websitePersoUser);?>" placeholder="avec protocole ex. http://www.mysite.com" maxlength="255">
			</td>
		</tr>
		<tr>
			<td class="field">Professional Website<br><span id="confirm_websitePro"></span></td>
			<td class="value">
				<input tabindex="12" class="form-control" name="websitePro" id="websitePro" onKeyUp="rec_fieldMember(<?php echo($idUser);?>, 'websitePro');" onChange="rec_fieldMember(<?php echo($idUser);?>, 'websitePro');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'websitePro');" type="text" value="<?php echo($websiteProUser);?>" placeholder="avec protocole ex. http://www.mysite.com" maxlength="255">
			</td>
		</tr>
		<tr>
			<td class="field">Social link 1<br><span id="confirm_socialLink1"></span></td>
			<td class="value">
				<input tabindex="13" class="form-control" name="socialLink1" id="socialLink1" onKeyUp="rec_fieldMember(<?php echo($idUser);?>, 'socialLink1');" onChange="rec_fieldMember(<?php echo($idUser);?>, 'socialLink1');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'socialLink1');" type="text" value="<?php echo($socialLink1User);?>" maxlength="255">
			</td>
		</tr>
		<tr>
			<td class="field">Social link 2<br><span id="confirm_socialLink2"></span></td>
			<td class="value">
				<input tabindex="14" class="form-control" name="socialLink2" id="socialLink2" onKeyUp="rec_fieldMember(<?php echo($idUser);?>, 'socialLink2');" onChange="rec_fieldMember(<?php echo($idUser);?>, 'socialLink2');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'socialLink2');" type="text" value="<?php echo($socialLink2User);?>" maxlength="255">
			</td>
		</tr>
		<tr>
			<td class="field">Social link 3<br><span id="confirm_socialLink3"></span></td>
			<td class="value">
				<input tabindex="15" class="form-control" name="socialLink3" id="socialLink3" onKeyUp="rec_fieldMember(<?php echo($idUser);?>, 'socialLink3');" onChange="rec_fieldMember(<?php echo($idUser);?>, 'socialLink3');" onBlur="rec_fieldMember(<?php echo($idUser);?>, 'socialLink3');" type="text" value="<?php echo($socialLink3User);?>" maxlength="255">
			</td>
		</tr>
	</tbody>
</table>
<table class="table table-profile">
	<thead>
		<tr>
			<th colspan="2">Contact Address</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="field">Name<br><span id="confirm_home_name"></span></td>
			<td class="value">
				<input tabindex="12" class="form-control" name="name" id="home_name" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'name', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'name', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'name', 'home');" type="text" value="<?php echo($ahu_name);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Phone<br><span id="confirm_home_phone"></span></td>
			<td class="value">
				<input tabindex="13" class="form-control" name="phone" id="home_phone" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'phone', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'phone', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'phone', 'home');" type="text" value="<?php echo($ahu_phone);?>" maxlength="16">
			</td>
		</tr>
		<tr>
			<td class="field">Entry Code<br><span id="confirm_home_entryCode"></span></td>
			<td class="value">
				<input tabindex="14" class="form-control" name="entryCode" id="home_entryCode" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'entryCode', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'entryCode', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'entryCode', 'home');" type="text" value="<?php echo($ahu_entryCode);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Street<br><span id="confirm_home_street"></span></td>
			<td class="value">
				<input tabindex="15" class="form-control" name="street" id="home_street" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'street', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'street', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'street', 'home');" type="text" value="<?php echo($ahu_street);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Zip Code<br><span id="confirm_home_zipCode"></span></td>
			<td class="value">
				<input tabindex="17" class="form-control" name="zipCode" id="home_zipCode" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'zipCode', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'zipCode', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'zipCode', 'home');" type="text" value="<?php echo($ahu_zipCode);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">City<br><span id="confirm_home_city"></span></td>
			<td class="value">
				<input tabindex="18" class="form-control" name="city" id="home_city" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'city', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'city', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'city', 'home');" type="text" value="<?php echo($ahu_city);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">State<br><span id="confirm_home_state"></span></td>
			<td class="value">
				<input tabindex="16" class="form-control" name="state" id="home_state" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'state', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'state', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'state', 'home');" type="text" value="<?php echo($ahu_state);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Country<br><span id="confirm_home_country"></span></td>
			<td class="value">
				<select tabindex="19" class="form-control m-b-10 input-sm" name="country" id="home_country" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'country', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'country', 'home');" style="width: 177px">
					<?php if($ahu_country!="") {?><option value="<?php echo($ahu_country);?>"><?php echo($ahu_country);?></option><?php }?>
					<option value=""></option>
					<?php 
					$resultats=$connectDBIntelApp->query("select * from country");
					$resultats->setFetchMode(PDO::FETCH_OBJ);
					while( $unResultat = $resultats->fetch() ) {
						$countryName = $unResultat->name;?>
						<?php if($countryName!=$countryProdProduct) {?><option value="<?php echo($countryName);?>"><?php echo($countryName);?></option><?php }?>
					<?php }?>
				</select>
			</td>
		</tr>



	</tbody>

</table>


<thead>
	<tr>
		<th colspan="2"><b>Billing Address</b></th>
	</tr>
</thead>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			Same than contact
		</div>
		<div class="col-md-9">
			<div class="switcher">
					<input type="checkbox" name="billing_ifSameHome" id="billing_ifSameHome" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'ifSameHome', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'ifSameHome', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'ifSameHome', 'billing');" <?php if($abu_ifSameHome=="yes") {?>checked="checked"<?php }?> />
					<label for="billing_ifSameHome"></label>
				</div>
		</div>
	</div>
</div>
<table class="table table-profile" id="billing_address" <?php if($abu_ifSameHome=="yes") {?>style="display: none"<?php }?>>

	<tbody>
		<tr>
			<td class="field">Name<br><span id="confirm_billing_name"></span></td>
			<td class="value">
				<input tabindex="20" class="form-control" name="name" id="billing_name" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'name', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'name', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'name', 'billing');" type="text" value="<?php echo($abu_name);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Phone<br><span id="confirm_billing_phone"></span></td>
			<td class="value">
				<input tabindex="21" class="form-control" name="phone" id="billing_phone" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'phone', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'phone', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'phone', 'billing');" type="text" value="<?php echo($abu_phone);?>" maxlength="16">
			</td>
		</tr>
		<tr>
			<td class="field">Entry Code<br><span id="confirm_billing_entryCode"></span></td>
			<td class="value">
				<input tabindex="22" class="form-control" name="entryCode" id="billing_entryCode" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'entryCode', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'entryCode', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'entryCode', 'billing');" type="text" value="<?php echo($abu_entryCode);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Street<br><span id="confirm_billing_street"></span></td>
			<td class="value">
				<input tabindex="23" class="form-control" name="street" id="billing_street" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'street', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'street', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'street', 'billing');" type="text" value="<?php echo($abu_street);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Zip Code<br><span id="confirm_billing_zipCode"></span></td>
			<td class="value">
				<input tabindex="25" class="form-control" name="zipCode" id="billing_zipCode" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'zipCode', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'zipCode', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'zipCode', 'billing');" type="text" value="<?php echo($abu_zipCode);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">City<br><span id="confirm_billing_city"></span></td>
			<td class="value">
				<input tabindex="26" class="form-control" name="city" id="billing_city" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'city', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'city', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'city', 'billing');" type="text" value="<?php echo($abu_city);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">State<br><span id="confirm_billing_state"></span></td>
			<td class="value">
				<input tabindex="24" class="form-control" name="district" id="billing_state" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'state', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'state', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'state', 'billing');" type="text" value="<?php echo($abu_state);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Country<br><span id="confirm_billing_country"></span></td>
			<td class="value">
				<select tabindex="27" class="form-control m-b-10 input-sm" name="country" id="billing_country" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'country', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'country', 'billing');" style="width: 177px">
					<?php if($abu_country!="") {?><option value="<?php echo($abu_country);?>"><?php echo($abu_country);?></option><?php }?>
					<option value=""></option>
					<?php 
					$resultats=$connectDBIntelApp->query("select * from country");
					$resultats->setFetchMode(PDO::FETCH_OBJ);
					while( $unResultat = $resultats->fetch() ) {
						$countryName = $unResultat->name;?>
						<?php if($countryName!=$countryProdProduct) {?><option value="<?php echo($countryName);?>"><?php echo($countryName);?></option><?php }?>
					<?php }?>

				</select>
			</td>
		</tr>
	</tbody>

</table>


<thead>
	<tr>
		<th colspan="2"><b>Delivery Address</b></th>
	</tr>
</thead>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			Same than contact
		</div>
		<div class="col-md-9">
			<div class="switcher">
					<input type="checkbox" name="delivery_ifSameHome" id="delivery_ifSameHome" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'ifSameHome', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'ifSameHome', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'ifSameHome', 'delivery');" <?php if($adu_ifSameHome=="yes") {?>checked="checked"<?php }?> />
					<label for="delivery_ifSameHome"></label>
				</div>
		</div>
	</div>
</div>
<table class="table table-profile" id="delivery_address" <?php if($adu_ifSameHome=="yes") {?>style="display: none"<?php }?> >
	<tbody>
		<tr>
			<td class="field">Name<br><span id="confirm_delivery_name"></span></td>
			<td class="value">
				<input tabindex="28" class="form-control" name="name" id="delivery_name" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'name', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'name', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'name', 'delivery');" type="text" value="<?php echo($adu_name);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Phone<br><span id="confirm_delivery_phone"></span></td>
			<td class="value">
				<input tabindex="29" class="form-control" name="phone" id="delivery_phone" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'phone', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'phone', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'phone', 'delivery');" type="text" value="<?php echo($adu_phone);?>" maxlength="16">
			</td>
		</tr>
		<tr>
			<td class="field">Entry Code<br><span id="confirm_delivery_entryCode"></span></td>
			<td class="value">
				<input tabindex="30" class="form-control" name="entryCode" id="delivery_entryCode" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'entryCode', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'entryCode', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'entryCode', 'delivery');" type="text" value="<?php echo($adu_entryCode);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Street<br><span id="confirm_delivery_street"></span></td>
			<td class="value">
				<input tabindex="31" class="form-control" name="street" id="delivery_street" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'street', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'street', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'street', 'delivery');" type="text" value="<?php echo($adu_street);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Zip Code<br><span id="confirm_delivery_zipCode"></span></td>
			<td class="value">
				<input tabindex="33" class="form-control" name="zipCode" id="delivery_zipCode" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'zipCode', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'zipCode', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'zipCode', 'delivery');" type="text" value="<?php echo($adu_zipCode);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">City<br><span id="confirm_delivery_city"></span></td>
			<td class="value">
				<input tabindex="34" class="form-control" name="city" id="delivery_city" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'city', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'city', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'city', 'delivery');" type="text" value="<?php echo($adu_city);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">State<br><span id="confirm_delivery_state"></span></td>
			<td class="value">
				<input tabindex="32" class="form-control" name="state" id="delivery_state" onKeyUp="rec_fieldMemberAddress(<?php echo($idUser);?>, 'state', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'state', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'state', 'delivery');" type="text" value="<?php echo($adu_state);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Country<br><span id="confirm_delivery_country"></span></td>
			<td class="value">
				<select tabindex="35" class="form-control m-b-10 input-sm" name="country" id="delivery_country" onChange="rec_fieldMemberAddress(<?php echo($idUser);?>, 'country', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idUser);?>, 'country', 'delivery');" style="width: 177px">
					<?php if($adu_country!="") {?><option value="<?php echo($adu_country);?>"><?php echo($adu_country);?></option><?php }?>
					<option value=""></option>
					<?php 
					$resultats=$connectDBIntelApp->query("select * from country");
					$resultats->setFetchMode(PDO::FETCH_OBJ);
					while( $unResultat = $resultats->fetch() ) {
						$countryName = $unResultat->name;?>
						<?php if($countryName!=$countryProdProduct) {?><option value="<?php echo($countryName);?>"><?php echo($countryName);?></option><?php }?>
					<?php }?>
				</select>
			</td>
		</tr>
	</tbody>
</table>
<br><br>
