<table class="table table-profile">
	<thead>
		<tr>
			<th colspan="2">Connection</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="field">Email</td>
			<td class="value">
				<?php echo($emailUser);?> <?php if(isset($_SESSION['emailNotSecure'])) {?><i class="fas fa-times red"></i><?php }else {?><i class="far fa-check-circle green"></i><?php }?> <br><br>
				<?php if(isset($_SESSION['emailNotSecure'])) {if($app_ifDemandSecureEmail=="yes") {?><?php echo($tr_text_noty_youMustHaveSecureEmail);?> <?php echo($app_linksSecureWebMail);?><br><br><?php }}?>
				<?php echo($tr_text_form_newEmail);?> : <?php if($emailChangeUser!="") { echo($emailChangeUser);?> <i class="fas fa-clock warning"></i><?php }?><br><br>
				<form action="" method="post">
					<input tabindex="36" class="form-control" name="newEmail" id="newEmail" type="email" value="<?php echo($_POST['newEmail']);?>" placeholder="<?php echo($tr_text_form_newEmail);?>" maxlength="64" required>
					<br>
					<input type="submit" class="btn btn-xs bg-theme btn-block" name="btn_changeEmail" value="<?php echo($tr_text_page_members_tab2_t3);?>">
				</form><br><br>
			</td>
		</tr>
		<tr>
			<td class="field">Password</td>
			
			<td class="value">
				<?php if(isset($_SESSION['passUserNotSecure'])) {?><i class="fas fa-times red"></i> To enhance your security, We demand a secure password !<br><br><?php }?>
				<form action="" method="post">
				<?php echo($tr_text_form_actualPass);?> : 
<input tabindex="37" class="form-control" name="passwordActuel" id="passwordActuel" type="password" <?php if((isset($_POST['btn_changePass'])) && ($okNewPass=='nok')) {?> style="border: 3px solid #e88d3c;" <?php }?> value="<?php echo($_POST['passwordActuel']);?>" placeholder="<?php echo($tr_text_form_actualPass);?> *" maxlength="24" required>
				<br>
				<a href="javascript:return;" onClick="generatePassword();"><button type="button" class="btn btn-success btn-xs btn-block">Generate Secure Password</button></a><br>
					
				<?php echo($tr_text_form_newPass);?> : 
<input tabindex="38" class="form-control" name="password1" id="password1" type="password" onKeyUp="checkPassword1();" onChange="checkPassword1();" onBlur="checkPassword1();" <?php if((isset($_POST['btn_changePass'])) && ($okNewPass=='nokn')) {?> style="border: 3px solid #e88d3c;" <?php }?> value="" placeholder="<?php echo($tr_text_form_newPass);?> *" maxlength="24" required><span toggle="#password1" class="fa fa-fw fa-eye field-icon passwordShow"></span>
				
				<div class="progress progress-striped active">
				<div id="jak_pstrength" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
				</div>
				<br>
				<?php echo($tr_text_form_confirmNewPass);?> : 
<input tabindex="39" class="form-control" name="password2" id="password2" type="password" onKeyUp="checkPassword2();" onChange="checkPassword2();" onBlur="checkPassword2();" <?php if((isset($_POST['btn_changePass'])) && ($okNewPass=='nokn')) {?> style="border: 3px solid #e88d3c;" <?php }?> value="" placeholder="<?php echo($tr_text_form_confirmNewPass);?> *"  maxlength="24" required>

				
				<br>
				<input type="submit" class="btn btn-xs bg-theme btn-block" name="btn_changePass" value="<?php echo($tr_text_form_btn_changePass);?>">
				</form><br>
			</td>
		</tr>
	</tbody>

</table>