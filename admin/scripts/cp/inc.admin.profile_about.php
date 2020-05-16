<h4>Edit Member</h4><br>

<!-- BEGIN profile-container -->
<div class="profile-container">
	<!-- BEGIN row -->
	<div class="row row-space-20">
		<!-- BEGIN col-8 -->
		<div class="col-md-8">
			<!-- BEGIN tab-content -->
			<div class="tab-content p-0">
				<?php if($avatarMember!="") {?>
					<img src="../members/id_<?php echo($idMember);?>/img/<?php echo($avatarMember);?>" alt="" />
					<?php }else {?>
						<?php if($app_avatarProfile!="") {// user doesn't have own avatar?>
							<img src="<?php echo($app_urlRoot);// choice admin?>/images/logo/<?php echo($app_avatarProfile);?>" alt="" />
						<?php }else {?>
							<img src="<?php echo($app_urlRoot);// default?>/img/avatar.png" alt="" />
						<?php }?>
					<?php }?>
					<br><h3><?php echo($pseudoMember);?></h3><br><br>
				
<table class="table table-profile">
	<thead>
		<tr>
			<th colspan="2">Menu</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="field">Actions<br></td>
			<td class="value">
				<?php require("scripts/cp/inc.admin.menu.manageMember.php");// same menu on different place?>
				<div style="text-align: right">
					<?php if($memberBlocked==true) {?><a href="?deBlockMember=<?php echo($idMember);?>"><i class="fas fa-unlock-alt green"></i></a><?php }?>
					<a onClick="return confirm('Êtes-vous sûr de vouloir blocker le member ID <?php echo($idMember);?> ?');" href="?blockId=<?php echo($idMember);?>" title="Block"><i class="fas fa-user-lock <?php if($memberBlocked==true) {?>red<?php }else {?><?php }?>"></i></a>
					<a onClick="return confirm('Êtes-vous sûr de vouloir supprimer le member ID <?php echo($idMember);?> ?');" href="?suppMember=<?php echo($idMember);?>"><img src="../img/supp-white.png" width="14" height="14" title="Delete" alt=""/></a>
				
				</div>
			</td>
		</tr>
	</tbody>
</table>
				
<table class="table table-profile">
	<thead>
		<tr>
			<th colspan="2">Admin</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="field">Rights<br><span id="confirm_rights"></span></td>
			<td class="value">
				<select tabindex="5" class="form-control m-b-10 input-sm" name="rights" id="rights" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'rights');" onBlur="rec_fieldMemberIntel(<?php echo($idMember);?>, 'rights');" style="width: 177px">
					<option><?php echo($rightsMember);?></option>
					<option value=""></option>
					<?php if($rightsMember!="Administrator") {?><option value="Administrator">Administrator</option><?php }?>
					<?php if($rightsMember!="Member") {?><option value="Member">Member</option><?php }?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="field">Sub Rights<br><span id="confirm_subRights"></span></td>
			<td class="value">
				<select tabindex="5" class="form-control m-b-10 input-sm" name="subRights" id="subRights" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'subRights');" onBlur="rec_fieldMemberIntel(<?php echo($idMember);?>, 'subRights');" style="width: 177px">
					<?php if($subRightsMember!="") {?>
					<option><?php echo($subRightsMember);?></option>
					<?php }?>
					<option value=""></option>
					<option value="Alpha">Alpha</option>
					<option value="Dev">Dev</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="field">Email</td>
			<td class="value">
				<?php echo($emailMember);?> <?php if($app_ifDemandSecureEmail=="yes") { if($emailNotSecureMember==false) {?><i class="fas fa-times red"></i><?php }?><?php }else {?><i class="far fa-check-circle green"></i><?php }?> <br><br>
				<?php if(($app_ifDemandSecureEmail=="yes") && ($emailNotSecureMember==false)) {?><?php echo($tr_text_noty_youMustHaveSecureEmail);?> <?php echo($app_linksSecureWebMail);?><br><br><?php }?>
				<?php echo($tr_text_form_newEmail);?> : <?php if($emailChangeMember!="") { echo($emailChangeMember);?> <i class="fas fa-clock warning"></i><?php }?><br><br>
				<form action="" method="post">
					<input type='hidden' name="ifAdmin" value="<?php echo($idMember);?>">
					<input tabindex="36" class="form-control" name="newEmail" id="newEmail" type="email" value="<?php echo($_POST['newEmail']);?>" placeholder="<?php echo($tr_text_form_newEmail);?>" maxlength="64" required>
					<input type="submit" class="btn btn-primary" name="btn_changeEmail" value="<?php echo($tr_text_page_members_tab2_t3);?>">
				</form><br><br>
			</td>
		</tr>
	</tbody>
	

</table>
							
							
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
					<input tabindex="1" class="form-control" type="text" name="pseudo" id="pseudo" onKeyUp="checkPseudoMember(<?php echo($idMember);?>);" onChange="checkPseudoMember(<?php echo($idMember);?>);" onKeyBlur="checkPseudoMember(<?php echo($idMember);?>);" value="<?php echo($pseudoMember);?>" maxlength="40" />
					<span id="confirm_pseudo"></span>
				</div>
			</td>
		</tr>
		<tr>
			<td class="field">Fonction<br><span id="confirm_job"></span></td>
			<td class="value">
				<div class="m-b-5">
					<input tabindex="2" class="form-control" name="job" id="job" onKeyUp="rec_fieldMember(<?php echo($idMember);?>, 'job');" onChange="rec_fieldMember(<?php echo($idMember);?>, 'job');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'job');" type="text" value="<?php echo($jobMember);?>" maxlength="64">
				</div>

			</td>
		</tr>
		<tr>
			<td class="field">Skills<br><span id="confirm_skills"></span></td>
			<td class="value">
				<input tabindex="3" class="form-control" name="skills" id="skills" onKeyUp="rec_fieldMember(<?php echo($idMember);?>, 'skills');" onChange="rec_fieldMember(<?php echo($idMember);?>, 'skills');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'skills');" type="text" value="<?php echo($skillsMember);?>" maxlength="255">
			</td>
		</tr>
		<tr>
			<td class="field">Age<br><span id="confirm_age"></span></td>
			<td class="value">
				<input tabindex="4" class="form-control" name="age" id="age" onKeyUp="rec_fieldMember(<?php echo($idMember);?>, 'age');" onChange="rec_fieldMember(<?php echo($idMember);?>, 'age');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'age');" type="number" value="<?php echo($ageMember);?>" min="<?php if($app_ifLimitAge=="yes") { echo($app_limitAge);}else {?>0<?php }?>" max="222" maxlength="3" style="width: 77px">
			</td>
		</tr>
		<tr>
			<td class="field">Sex<br><span id="confirm_sex"></span></td>
			<td class="value">
				<select tabindex="5" class="form-control m-b-10 input-sm" name="sex" id="sex" onChange="rec_fieldMember(<?php echo($idMember);?>, 'sex');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'sex');" style="width: 177px">
					<?php if($sexMember!="") {?><option><?php echo($sexMember);?></option><?php }?>
					<option value=""></option>
					<?php if($sexMember=="") {?>
						<option value="Woman">Woman</option>
						<option value="Man">Man</option>
					<?php }else {?>
						<?php if($sexMember!="Woman") {?><option value="Woman">Woman</option><?php }?>
						<?php if($sexMember!="Man") {?><option value="Man">Man</option><?php }?>
					<?php }?>
				</select>
			</td>
		</tr>
		<tr>
			<td class="field">Sports<br><span id="confirm_sports"></span></td>
			<td class="value">
				<input tabindex="6" class="form-control" name="sports" id="sports" onKeyUp="rec_fieldMember(<?php echo($idMember);?>, 'sports');" onChange="rec_fieldMember(<?php echo($idMember);?>, 'sports');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'sports');" type="text" value="<?php echo($sportsMember);?>" maxlength="255">
			</td>
		</tr>
		<tr>
			<td class="field">Hobbies<br><span id="confirm_hobbies"></span></td>
			<td class="value">
				<input tabindex="7" class="form-control" name="hobbies" id="hobbies" onKeyUp="rec_fieldMember(<?php echo($idMember);?>, 'hobbies');" onChange="rec_fieldMember(<?php echo($idMember);?>, 'hobbies');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'hobbies');" type="text" value="<?php echo($hobbiesMember);?>" maxlength="255">
			</td>
		</tr>
		
		<!-- Lack code fr de it... in db country-->
		<tr>
			<td class="field">Preference Language<br><span id="confirm_languagePref"></span></td>
			<td class="value">
				<select tabindex="5" class="form-control m-b-10 input-sm" name="languagePref" id="languagePref" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'languagePref');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'languagePref');" style="width: 177px">
					<?php if($languagePrefMember!="") {?><option value="<?php echo($languagePrefMember);?>"><?php echo($languagePrefMember);?></option><?php }else {?>
					<option value="<?php echo($languageCodePays);?>"><?php echo($languagePrefMember);?></option><?php }?>
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
				<input tabindex="8" class="form-control" name="phonePerso" id="phonePerso" onKeyUp="rec_fieldMember(<?php echo($idMember);?>, 'phonePerso');" onChange="rec_fieldMember(<?php echo($idMember);?>, 'phonePerso');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'phonePerso');" type="text" value="<?php echo($phonePersoMember);?>" maxlength="22">
			</td>
		</tr>
		<tr>
			<td class="field">Professional Phone<br><span id="confirm_phonePro"></span></td>
			<td class="value">
				<input tabindex="9" class="form-control" name="phonePro" id="phonePro" onKeyUp="rec_fieldMember(<?php echo($idMember);?>, 'phonePro');" onChange="rec_fieldMember(<?php echo($idMember);?>, 'phonePro');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'phonePro');" type="text" value="<?php echo($phoneProMember);?>" maxlength="22">
			</td>
		</tr>
		<tr>
			<td class="field">Skype<br><span id="confirm_skypePseudo"></span></td>
			<td class="value">
				<input tabindex="10" class="form-control" name="skypePseudo" id="skypePseudo" onKeyUp="rec_fieldMember(<?php echo($idMember);?>, 'skypePseudo');" onChange="rec_fieldMember(<?php echo($idMember);?>, 'skypePseudo');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'skypePseudo');" type="text" value="<?php echo($skypePseudoMember);?>" maxlength="22">
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
			<td class="field">Personal Website <br><span id="confirm_websitePerso"></span></td>
			<td class="value">
				<input tabindex="11" class="form-control" name="websitePerso" id="websitePerso" onKeyUp="rec_fieldMember(<?php echo($idMember);?>, 'websitePerso');" onChange="rec_fieldMember(<?php echo($idMember);?>, 'websitePerso');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'websitePerso');" type="text" value="<?php echo($websitePersoMember);?>" placeholder="avec protocole ex. http://www.mysite.com" maxlength="255">
			</td>
		</tr>
		<tr>
			<td class="field">Professional Website<br><span id="confirm_websitePro"></span></td>
			<td class="value">
				<input tabindex="12" class="form-control" name="websitePro" id="websitePro" onKeyUp="rec_fieldMember(<?php echo($idMember);?>, 'websitePro');" onChange="rec_fieldMember(<?php echo($idMember);?>, 'websitePro');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'websitePro');" type="text" value="<?php echo($websiteProMember);?>" placeholder="avec protocole ex. http://www.mysite.com" maxlength="255">
			</td>
		</tr>
		<tr>
			<td class="field">Social link 1<br><span id="confirm_socialLink1"></span></td>
			<td class="value">
				<input tabindex="13" class="form-control" name="socialLink1" id="socialLink1" onKeyUp="rec_fieldMember(<?php echo($idMember);?>, 'socialLink1');" onChange="rec_fieldMember(<?php echo($idMember);?>, 'socialLink1');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'socialLink1');" type="text" value="<?php echo($socialLink1Member);?>" maxlength="255">
			</td>
		</tr>
		<tr>
			<td class="field">Social link 2<br><span id="confirm_socialLink2"></span></td>
			<td class="value">
				<input tabindex="14" class="form-control" name="socialLink2" id="socialLink2" onKeyUp="rec_fieldMember(<?php echo($idMember);?>, 'socialLink2');" onChange="rec_fieldMember(<?php echo($idMember);?>, 'socialLink2');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'socialLink2');" type="text" value="<?php echo($socialLink2Member);?>" maxlength="255">
			</td>
		</tr>
		<tr>
			<td class="field">Social link 3<br><span id="confirm_socialLink3"></span></td>
			<td class="value">
				<input tabindex="15" class="form-control" name="socialLink3" id="socialLink3" onKeyUp="rec_fieldMember(<?php echo($idMember);?>, 'socialLink3');" onChange="rec_fieldMember(<?php echo($idMember);?>, 'socialLink3');" onBlur="rec_fieldMember(<?php echo($idMember);?>, 'socialLink3');" type="text" value="<?php echo($socialLink3Member);?>" maxlength="255">
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
				<input tabindex="12" class="form-control" name="name" id="home_name" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'name', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'name', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'name', 'home');" type="text" value="<?php echo($ahm_name);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Phone<br><span id="confirm_home_phone"></span></td>
			<td class="value">
				<input tabindex="13" class="form-control" name="phone" id="home_phone" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'phone', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'phone', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'phone', 'home');" type="text" value="<?php echo($ahm_phone);?>" maxlength="16">
			</td>
		</tr>
		<tr>
			<td class="field">Entry Code<br><span id="confirm_home_entryCode"></span></td>
			<td class="value">
				<input tabindex="14" class="form-control" name="entryCode" id="home_entryCode" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'entryCode', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'entryCode', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'entryCode', 'home');" type="text" value="<?php echo($ahm_entryCode);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Street<br><span id="confirm_home_street"></span></td>
			<td class="value">
				<input tabindex="15" class="form-control" name="street" id="home_street" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'street', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'street', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'street', 'home');" type="text" value="<?php echo($ahm_street);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Zip Code<br><span id="confirm_home_zipCode"></span></td>
			<td class="value">
				<input tabindex="17" class="form-control" name="zipCode" id="home_zipCode" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'zipCode', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'zipCode', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'zipCode', 'home');" type="text" value="<?php echo($ahm_zipCode);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">City<br><span id="confirm_home_city"></span></td>
			<td class="value">
				<input tabindex="18" class="form-control" name="city" id="home_city" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'city', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'city', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'city', 'home');" type="text" value="<?php echo($ahm_city);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">State<br><span id="confirm_home_state"></span></td>
			<td class="value">
				<input tabindex="16" class="form-control" name="state" id="home_state" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'state', 'home');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'state', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'state', 'home');" type="text" value="<?php echo($ahm_state);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Country<br><span id="confirm_home_country"></span></td>
			<td class="value">
				<select tabindex="19" class="form-control m-b-10 input-sm" name="country" id="home_country" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'country', 'home');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'country', 'home');" style="width: 177px">
					<?php if($ahm_country!="") {?><option><?php echo($ahm_country);?></option><?php }?>
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
					<input type="checkbox" name="billing_ifSameHome" id="billing_ifSameHome" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'ifSameHome', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'ifSameHome', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'ifSameHome', 'billing');" <?php if($abm_ifSameHome=="yes") {?>checked="checked"<?php }?> />
					<label for="billing_ifSameHome"></label>
				</div>
		</div>
	</div>
</div>
<table class="table table-profile" id="billing_address" <?php if($abm_ifSameHome=="yes") {?>style="display: none"<?php }?>>

	<tbody>
		<tr>
			<td class="field">Name<br><span id="confirm_billing_name"></span></td>
			<td class="value">
				<input tabindex="20" class="form-control" name="name" id="billing_name" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'name', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'name', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'name', 'billing');" type="text" value="<?php echo($abm_name);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Phone<br><span id="confirm_billing_phone"></span></td>
			<td class="value">
				<input tabindex="21" class="form-control" name="phone" id="billing_phone" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'phone', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'phone', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'phone', 'billing');" type="text" value="<?php echo($abm_phone);?>" maxlength="16">
			</td>
		</tr>
		<tr>
			<td class="field">Entry Code<br><span id="confirm_billing_entryCode"></span></td>
			<td class="value">
				<input tabindex="22" class="form-control" name="entryCode" id="billing_entryCode" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'entryCode', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'entryCode', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'entryCode', 'billing');" type="text" value="<?php echo($abm_entryCode);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Street<br><span id="confirm_billing_street"></span></td>
			<td class="value">
				<input tabindex="23" class="form-control" name="street" id="billing_street" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'street', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'street', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'street', 'billing');" type="text" value="<?php echo($abm_street);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Zip Code<br><span id="confirm_billing_zipCode"></span></td>
			<td class="value">
				<input tabindex="25" class="form-control" name="zipCode" id="billing_zipCode" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'zipCode', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'zipCode', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'zipCode', 'billing');" type="text" value="<?php echo($abm_zipCode);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">City<br><span id="confirm_billing_city"></span></td>
			<td class="value">
				<input tabindex="26" class="form-control" name="city" id="billing_city" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'city', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'city', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'city', 'billing');" type="text" value="<?php echo($abm_city);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">State<br><span id="confirm_billing_state"></span></td>
			<td class="value">
				<input tabindex="24" class="form-control" name="district" id="billing_state" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'state', 'billing');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'state', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'state', 'billing');" type="text" value="<?php echo($abm_state);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Country<br><span id="confirm_billing_country"></span></td>
			<td class="value">
				<select tabindex="27" class="form-control m-b-10 input-sm" name="country" id="billing_country" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'country', 'billing');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'country', 'billing');" style="width: 177px">
					<?php if($abm_country!="") {?><option><?php echo($abm_country);?></option><?php }?>
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
					<input type="checkbox" name="delivery_ifSameHome" id="delivery_ifSameHome" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'ifSameHome', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'ifSameHome', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'ifSameHome', 'delivery');" <?php if($adm_ifSameHome=="yes") {?>checked="checked"<?php }?> />
					<label for="delivery_ifSameHome"></label>
				</div>
		</div>
	</div>
</div>
<table class="table table-profile" id="delivery_address" <?php if($adm_ifSameHome=="yes") {?>style="display: none"<?php }?> >
	<tbody>
		<tr>
			<td class="field">Name<br><span id="confirm_delivery_name"></span></td>
			<td class="value">
				<input tabindex="28" class="form-control" name="name" id="delivery_name" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'name', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'name', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'name', 'delivery');" type="text" value="<?php echo($adm_name);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Phone<br><span id="confirm_delivery_phone"></span></td>
			<td class="value">
				<input tabindex="29" class="form-control" name="phone" id="delivery_phone" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'phone', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'phone', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'phone', 'delivery');" type="text" value="<?php echo($adm_phone);?>" maxlength="16">
			</td>
		</tr>
		<tr>
			<td class="field">Entry Code<br><span id="confirm_delivery_entryCode"></span></td>
			<td class="value">
				<input tabindex="30" class="form-control" name="entryCode" id="delivery_entryCode" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'entryCode', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'entryCode', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'entryCode', 'delivery');" type="text" value="<?php echo($adm_entryCode);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Street<br><span id="confirm_delivery_street"></span></td>
			<td class="value">
				<input tabindex="31" class="form-control" name="street" id="delivery_street" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'street', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'street', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'street', 'delivery');" type="text" value="<?php echo($adm_street);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Zip Code<br><span id="confirm_delivery_zipCode"></span></td>
			<td class="value">
				<input tabindex="33" class="form-control" name="zipCode" id="delivery_zipCode" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'zipCode', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'zipCode', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'zipCode', 'delivery');" type="text" value="<?php echo($adm_zipCode);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">City<br><span id="confirm_delivery_city"></span></td>
			<td class="value">
				<input tabindex="34" class="form-control" name="city" id="delivery_city" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'city', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'city', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'city', 'delivery');" type="text" value="<?php echo($adm_city);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">State<br><span id="confirm_delivery_state"></span></td>
			<td class="value">
				<input tabindex="32" class="form-control" name="state" id="delivery_state" onKeyUp="rec_fieldMemberAddress(<?php echo($idMember);?>, 'state', 'delivery');" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'state', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'state', 'delivery');" type="text" value="<?php echo($adm_state);?>" maxlength="64">
			</td>
		</tr>
		<tr>
			<td class="field">Country<br><span id="confirm_delivery_country"></span></td>
			<td class="value">
				<select tabindex="35" class="form-control m-b-10 input-sm" name="country" id="delivery_country" onChange="rec_fieldMemberAddress(<?php echo($idMember);?>, 'country', 'delivery');" onBlur="rec_fieldMemberAddress(<?php echo($idMember);?>, 'country', 'delivery');" style="width: 177px">
					<?php if($adm_country!="") {?><option><?php echo($adm_country);?></option><?php }?>
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

							</div>
						<!-- END tab-content -->
					</div>

<div class="col-md-4 hidden-xs_ hidden-sm_">
						
						<!-- BEGIN profile-info-list -->
						<ul class="profile-info-list">
							<table class="table table-profile">
								<thead>
									<tr>
										<th colspan="2">Privacy <?php echo($pseudoMember);?></th>
									</tr>
								</thead>
								<tbody>
								<tr>
									<td class="field">Transparency</td>
									<td class="value">
										<a href="creapdf/pdf/privacyMember.php?idMember=<?php echo($idMember);?>"><img src="../img/pdf-white.png" width="24" height="24" alt=""/></a>
									
									</td>
								</tr>
								</tbody>
							</table>
							
				
							<div class="panel-body">
							<!-- BEGIN panel-group -->
							<div class="panel-group" id="accordion">
								<!-- BEGIN panel -->
								<div class="panel panel-default panel-bordered">
									<!-- BEGIN panel-heading -->
									<div class="panel-heading" id="headingOne">
										<h4 class="panel-title">
											<a href="#collapseOne" class="accordion-link" data-toggle="collapse" data-parent="#accordion">
												General
											</a>
										</h4>
									</div>
									<!-- END panel-heading -->
									<!-- BEGIN panel-collapse -->
									<div id="collapseOne" class="panel-collapse collapse">
										
										<table class="table table-profile">
											<tbody>
											<tr>
												<td class="field">All Private</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifPublicProfile" id="ifPublicProfile" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifPublicProfile');" <?php if($ifPublicProfileMember!="yes") {?>checked<?php }?> />
													<label for="ifPublicProfile"></label>
													</div>
												</td>
											</tr>
											</tbody>
										</table>
										
									</div>
									<!-- END panel-collapse -->
								</div>
								<!-- END panel -->
								<!-- BEGIN panel -->
								<div class="panel panel-default panel-bordered">
									<!-- BEGIN panel-heading -->
									<!--<div class="panel-heading" id="headingTwo">
										<h4 class="panel-title">
											<a href="#collapseTwo" class="accordion-link collapsed" data-toggle="collapse" data-parent="#accordion">
												Posts
											</a>
										</h4>
									</div>-->
									<!-- END panel-heading -->
									<!-- BEGIN panel-collapse -->
									<div id="collapseTwo" class="panel-collapse collapse">
										<table class="table table-profile">
											<tbody>
											<tr>
												<td class="field">Public</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifPublicPost" id="ifPublicPost" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifPublicPost');" <?php if($ifPublicPostMember!="yes") {?>checked<?php }?> />
													<label for="ifPublicPost"></label>
													</div>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
									<!-- END panel-collapse -->
								</div>
								<!-- END panel -->
								<!-- BEGIN panel -->
								<div class="panel panel-default panel-bordered">
									<!-- BEGIN panel-heading -->
									<div class="panel-heading" id="headingThree">
										<h4 class="panel-title">
											<a href="#collapseThree" class="accordion-link collapsed" data-toggle="collapse" data-parent="#accordion">
												About
											</a>
										</h4>
									</div>
									<!-- END panel-heading -->
									<!-- BEGIN panel-collapse -->
									<div id="collapseThree" class="panel-collapse collapse">
										<table class="table table-profile">
											<tbody>

											<tr>
												<td class="field">Function</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowFonction" id="ifShowFonction" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowFonction');" <?php if($ifShowFonctionMember!="yes") {?>checked<?php }?> />
													<label for="ifShowFonction"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Skills</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSkills" id="ifShowSkills" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowSkills');" <?php if($ifShowSkillsMember!="yes") {?>checked<?php }?> />
													<label for="ifShowSkills"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Age</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowAge" id="ifShowAge" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowAge');" <?php if($ifShowAgeMember!="yes") {?>checked<?php }?> />
													<label for="ifShowAge"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Sex</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSex" id="ifShowSex" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowSex');" <?php if($ifShowSexMember!="yes") {?>checked<?php }?> />
													<label for="ifShowSex"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Sports</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSports" id="ifShowSports" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowSports');" <?php if($ifShowSportsMember!="yes") {?>checked<?php }?> />
													<label for="ifShowSports"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Hobbies</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowHobbies" id="ifShowHobbies" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowHobbies');" <?php if($ifShowHobbiesMember!="yes") {?>checked<?php }?> />
													<label for="ifShowHobbies"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Phone Perso</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowPhonePerso" id="ifShowPhonePerso" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowPhonePerso');" <?php if($ifShowPhonePersoMember!="yes") {?>checked<?php }?> />
													<label for="ifShowPhonePerso"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Phone Pro</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowPhonePro" id="ifShowPhonePro" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowPhonePro');" <?php if($ifShowPhoneProMember!="yes") {?>checked<?php }?> />
													<label for="ifShowPhonePro"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Skype</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSkype" id="ifShowSkype" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowSkype');" <?php if($ifShowSkypeMember!="yes") {?>checked<?php }?> />
													<label for="ifShowSkype"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Website Perso</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowWebsitePerso" id="ifShowWebsitePerso" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowWebsitePerso');" <?php if($ifShowWebsitePersoMember!="yes") {?>checked<?php }?> />
													<label for="ifShowWebsitePerso"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Website Pro</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowWebsitePro" id="ifShowWebsitePro" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowWebsitePro');" <?php if($ifShowWebsiteProMember!="yes") {?>checked<?php }?> />
													<label for="ifShowWebsitePro"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Social link 1</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSocialLink1" id="ifShowSocialLink1" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowSocialLink1');" <?php if($ifShowSocialLink1Member!="yes") {?>checked<?php }?> />
													<label for="ifShowSocialLink1"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Social link 2</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSocialLink2" id="ifShowSocialLink2" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowSocialLink2');" <?php if($ifShowSocialLink2Member!="yes") {?>checked<?php }?> />
													<label for="ifShowSocialLink2"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Social link 3</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSocialLink3" id="ifShowSocialLink3" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowSocialLink3');" <?php if($ifShowSocialLink3Member!="yes") {?>checked<?php }?> />
													<label for="ifShowSocialLink3"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Name</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowName" id="ifShowName" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowName');" <?php if($ifShowNameMember!="yes") {?>checked<?php }?> />
													<label for="ifShowName"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Phone</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowPhone" id="ifShowPhone" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowPhone');" <?php if($ifShowPhoneMember!="yes") {?>checked<?php }?> />
													<label for="ifShowPhone"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Entry Code</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowEntryCode" id="ifShowEntryCode" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowEntryCode');" <?php if($ifShowEntryCodeMember!="yes") {?>checked<?php }?> />
													<label for="ifShowEntryCode"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Street</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowStreet" id="ifShowStreet" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowStreet');" <?php if($ifShowStreetMember!="yes") {?>checked<?php }?> />
													<label for="ifShowStreet"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Zip Code</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowZipCode" id="ifShowZipCode" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowZipCode');" <?php if($ifShowZipCodeMember!="yes") {?>checked<?php }?> />
													<label for="ifShowZipCode"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">City</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowCity" id="ifShowCity" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowCity');" <?php if($ifShowCityMember!="yes") {?>checked<?php }?> />
													<label for="ifShowCity"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">State</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowState" id="ifShowState" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowState');" <?php if($ifShowStateMember!="yes") {?>checked<?php }?> />
													<label for="ifShowState"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Country</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowCountry" id="ifShowCountry" onChange="rec_fieldMemberIntel(<?php echo($idMember);?>, 'ifShowCountry');" <?php if($ifShowCountryMember!="yes") {?>checked<?php }?> />
													<label for="ifShowCountry"></label>
												</div>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
									<!-- END panel-collapse -->
								</div>
								<!-- END panel -->
							</div>
							<!-- END panel-group -->
						</div>
							
				 
				
							
						</ul>
						<!-- END profile-info-list -->
					</div>
					
					</div>
				<!-- END row -->
			</div>

<br><br>