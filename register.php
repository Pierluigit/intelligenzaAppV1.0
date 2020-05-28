<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Register
// Data Juggler: Pierluigi
// Support: intelligenza@protonmail.com
// Date: April 2020
/*
.     .       .  .   . .   .   . .    +  .
  .     .  :     .    .. :. .___---------___.
       .  .   .    .  :.:. _".^ .^ ^.  '.. :"-_. .
    .  :       .  .  .:../:            . .^  :.:\.
        .   . :: +. :.:/: .   .    .        . . .:\
 .  :    .     . _ :::/:               .  ^ .  . .:\
  .. . .   . - : :.:./.                        .  .:\
  .      .     . :..|:                    .  .  ^. .:|
    .       . : : ..||        .                . . !:|
  .     . . . ::. ::\(                           . :)/
 .   .     : . : .:.|. ######              .#######::|
  :.. .  :-  : .:  ::|.#######           ..########:|
 .  .  .  ..  .  .. :\ ########          :######## :/
  .        .+ :: : -.:\ ########       . ########.:/
    .  .+   . . . . :.:\. #######       #######..:/
      :: . . . . ::.:..:.\           .   .   ..:/
   .   .   .  .. :  -::::.\.       | |     . .:/
      .  :  .  .  .-:.":.::.\             ..:/
 .      -.   . . . .: .:::.:.\.           .:/
.   .   .  :      : ....::_:..:\   ___.  :/
   .   .  .   .:. .. .  .: :.:.:\       :/
     +   .   .   : . ::. :.:. .:.|\  .:/|
     .         +   .  .  ...:: ..|  --.:|
.      . . .   .  .  . ... :..:.."(  ..)"
 .   .       .      :  .   .: ::/  .  .::\
*/
//
//////////////////////////////////////////
//////////////////////////////////////////
// define which page and rights access
// app_namePage = all members, must be logged
// app_admin_namePage = must be an administrator
$page = "register";
//////////////////////////////////////////
//////////////////////////////////////////
// load core intelligenza
require_once("admin/scripts/inc.core.intelligenza.php");

//////////////////////////////////////////
//////////////////////////////////////////
// block new registrations
if($app_ifBlockNewRegistration=="yes") { header("location:".$app_urlRoot."");}
//////////////////////////////////////////
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo($_SESSION['language']);?>">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo($tr_text_page_register_title);?> | Register</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="<?php echo($tr_text_page_register_description);?>" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("admin/scripts/cp/inc.template_head.php");?>
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN CUSTOM CSS STYLE ================== -->
	<?php require_once("admin/scripts/cp/inc.head.customCss.php");// custom css ?>
	<!-- ================== END CUSTOM CSS STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="admin/assets/plugins/loader/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="inverse-mode">
	<?php require_once("scripts/analyticstracking.php");?>
	<!-- BEGIN #page-container -->
	<div id="page-container" class="fade">
		<!-- BEGIN register -->
        <div class="register">
        	<!-- BEGIN register-cover -->
			<div class="register-cover"></div>
			<!-- END register-cover -->
			<!-- BEGIN register-content -->
			<div class="register-content">
				<!-- BEGIN register-brand -->
				<div class="register-brand">
					<a href="index.php">
						<?php require_once("scripts/inc.logoHPage.php");// dynamic logo?>
					</a>
				</div>
				<!-- END register-brand -->
				<h3 class="m-b-20"><span>Sign Up</span></h3>
				<p class="m-b-20">One Admin ID is all you need to access all the Admin services.</p>
				<!-- BEGIN register-form -->
				<form action="?" method="POST" name="register_form">
					<!-- BEGIN row -->
					<div class="row row-space-20">
						<!-- BEGIN col-6 -->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Name <span class="text-danger">*</span></label>
								<input tabindex="1" type="text" class="form-control" name="pseudo" id="pseudo" onKeyUp="checkPseudo();" onChange="checkPseudo();" onKeyBlur="checkPseudo();" type="text" <?php if((isset($_POST['btn_signup'])) && ($okPseudoInscrit==false)) {?> style="border: 3px solid #e88d3c;" <?php }?> value="<?php echo($_POST['pseudo']);?>" placeholder="Public Nickname" maxlength="40" required />
								<span id="confirm_pseudo">&emsp;</span>
							</div>
							<div class="form-group">
								<label class="control-label">
									<?php if($app_ifDemandSecureEmail=="yes") {?>
									We accept <?php echo($app_linksSecureWebMail);?><br>
									<?php }?>
									Email Address <span class="text-danger">*</span>
								</label>
								<input class="form-control" name="emailInscription" id="emailInscription" type="email" tabindex="2" value="<?php echo($_POST['emailInscription']);?>" <?php if((isset($_POST['btn_signup'])) && ($okMailInscrit==false)) {?> style="border: 3px solid #e88d3c;" <?php }?> placeholder="ID" required>
							</div>
							
						</div>
						<!-- END col-6 -->
						<!-- BEGIN col-6 -->
						<div class="col-md-6">
							<div class="form-group">
								<a href="javascript:return;" onClick="generatePassword();"><button type="button" class="btn btn-success btn-block">Generate Secure Password</button></a><br>
								
								<label class="control-label">Password Min. 8 characters <span class="text-danger">*</span> <?php if($app_ifDemandSecurePassword=="yes") {?>(One !@#$%&*?, one number, one Capital and minuscule)<?php }else {?>(Min. 8 characters)<?php }?></label>
								<input class="form-control" name="password1" id="password1" onKeyUp="checkPassword1();" onChange="checkPassword1();" onKeyBlur="checkPassword1();" type="password" tabindex="3" <?php if((isset($_POST['btn_signup'])) && ($okPassInscrit==false)) {?> style="border: 3px solid #e88d3c;" <?php }?> value="<?php echo($_POST['password1']);?>" placeholder="Password" maxlength="40" required><span toggle="#password1" class="fa fa-fw fa-eye field-icon passwordShow"></span>
								<div class="progress progress-striped active">
								<div id="jak_pstrength" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Confirm Password <span class="text-danger">*</span></label>
								<input class="form-control" name="password2" id="password2" onKeyUp="checkPassword2();" onChange="checkPassword2();" onKeyBlur="checkPassword2();" type="password" tabindex="4" <?php if((isset($_POST['btn_signup'])) && ($okPassInscrit==false)) {?> style="border: 3px solid #e88d3c;" <?php }?> value="<?php echo($_POST['password2']);?>" placeholder="Confirm Password"  maxlength="40" required>
							</div>
						</div>
						<!-- END col-6 -->
					</div>
					
					<div class="row row-space-20">
						<!-- BEGIN col-6 -->
						<div class="col-md-6">
							<img id="captcha" src="modular/_captcha/securimage_show.php" alt="CAPTCHA Image" class="vignette" />
						</div>
						<!-- END col-6 -->
						<!-- BEGIN col-6 -->
						<div class="col-md-6">
							<label id="acode" for="captcha_code" id="labelCaptcha"><?php echo($tr_text_form_captcha);?> <span class="text-danger">*</span></label>
							<input type="text" id="captcha_code" class="form-control" name="captcha_code" onKeyPress="checkCaptcha()" maxlength="6" tabindex="4" onBlur="checkCode();" onKeyUp="checkCode();" placeholder="<?php echo($txt_connexion_inscription_CopyTheSixCharactersAbove);?>" <?php if((isset($_REQUEST['btn_signup'])) && ($okCaptcha == false)) { echo(" style='border: 1px solid #FE1B00;'");}?> required/>
							
							<object type="application/x-shockwave-flash" data="modular/_captcha/securimage_play.swf?audio_file=modular/_captcha/securimage_play.php" width="19" height="19"> 
							<param name="movie" value="modular/_captcha/securimage_play.swf?audio_file=modular/_captcha/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" style="cursor:pointer;" />
							</object>
							<a href="#" onclick="document.getElementById('captcha').src = 'modular/_captcha/securimage_show.php?' + Math.random(); return false"><img width="18" height="18" onclick="this.blur()" alt="Reload Image" src="modular/_captcha/images/refresh.png"></a>
						</div>
						<!-- END col-6 -->
					</div>
					<!-- END row -->
					<div class="m-b-10 m-t-10">
						<div class="checkbox-inline">
							<input type="checkbox" id="login-remember-me" name="okCondition" value="" <?php if((isset($_POST['btn_signup'])) && ($okConditionInscrit==false)) {?>  class="has-error"<?php }?> required> <label for="login-remember-me">I have read and agree to the <a href="terms.php">Terms of Use</a> and <a href="privacy.php">Privacy Policy</a>.</label>
						</div>
					</div>
					<button type="submit" name="btn_signup" class="btn btn-primary btn-block">Sign Up</button>
					<div class="m-t-20">
						Already have an ID? <a href="connect.php">Sign In</a>
					</div>
				</form>
				<!-- END register-form -->
			</div>
			<!-- END register-content -->
        </div>
        <!-- END register -->
	</div>
	<!-- END #page-container -->
	
	<!-- BEGIN Footer -->
	<?php require_once("scripts/inc.footer.php");?>
	<!-- END Footer -->
		
	<!-- BEGIN theme-panel -->
  	<?php //require_once("scripts/inc.template_themePanel.php");?>
  	<!-- END theme-panel -->
	
	<!-- ================== BEGIN BASE JS ================== -->
  	<?php require_once("admin/scripts/cp/inc.template_framework.php");?>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="admin/assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	
  	<?php require_once("admin/scripts/inc.core.framework.php");?>
  	<?php require_once("admin/scripts/inc.core.noty.php");?>
	<script>
		
		
	
	</script>
</body>
</html>