<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Lost Password
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
$page = "lostPassword";
//////////////////////////////////////////
//////////////////////////////////////////
// load core intelligenza
require_once("admin/scripts/inc.core.intelligenza.php");
//echo($_SESSION['formatDateLastRRPCompteDown']);exit(0);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo($_SESSION['language']);?>">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo($tr_text_page_lostPassword_title);?> | Lost Password</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="<?php echo($tr_text_page_lostPassword_description);?>" name="description" />
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
	<?php require_once("scripts/analyticstracking.php"); ?>
	<!-- BEGIN #page-container -->
	<div id="page-container" class="fade">
		<!-- BEGIN login -->
        <div class="login">
			<!-- BEGIN lostPass-cover -->
			<div class="lostPass-cover"></div>
			<!-- END login-cover -->
			<!-- BEGIN login-content -->
			<div class="login-content" style="top: 282px">
				<!-- BEGIN login-brand -->
				<div class="login-brand">
					<a href="index.php">
						<?php require_once("scripts/inc.logoHPage.php");// dynamic logo?>
					</a>
				</div>
				<!-- END login-brand -->
				<div class="bgBox">
				<!-- BEGIN login-desc -->
				<div class="login-desc">
					Lost Password?
				</div>
				<!-- END login-desc -->
				<?php if((!isset($_SESSION['okFormLostPass'])) && (!isset($_SESSION['lostPass']))) {?>
				<!-- BEGIN login-form -->
				<form action="?" method="POST" name="login_form">
					<div class="form-group">
						<label class="control-label" for="emailRecup">Email <span class="text-danger">*</span></label>
						<input type="email" name="emailRecup" id="emailRecup" class="form-control" value="" required />
					</div>
					
					<div class="form-group">
						<label id="acode" for="captcha_code" id="labelCaptcha"><?php echo($tr_text_form_captcha);?> <span class="text-danger">*</span></label><br>
						<img id="captcha" src="modular/_captcha/securimage_show.php" alt="CAPTCHA Image" class="vignette" /><br><br>
						
						<input type="text" id="captcha_code" class="form-control" name="captcha_code" onKeyPress="checkCaptcha()" maxlength="6" tabindex="4" onBlur="checkCode();" onKeyUp="checkCode();" placeholder="<?php echo($txt_connexion_inscription_CopyTheSixCharactersAbove);?>" <?php if((isset($_REQUEST['btn_signup'])) && ($okCaptcha == false)) { echo(" style='border: 1px solid #FE1B00;'");}?> required/><br>

						<object type="application/x-shockwave-flash" data="modular/_captcha/securimage_play.swf?audio_file=modular/_captcha/securimage_play.php" width="19" height="19"> 
						<param name="movie" value="modular/_captcha/securimage_play.swf?audio_file=modular/_captcha/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" style="cursor:pointer;" />
						</object>
						<a href="#" onclick="document.getElementById('captcha').src = 'modular/_captcha/securimage_show.php?' + Math.random(); return false"><img width="18" height="18" onclick="this.blur()" alt="Reload Image" src="modular/_captcha/images/refresh.png"></a>
					</div>
					<button type="submit" name="btn_lostPass" class="btn btn-primary btn-block">Reset password</button>
				</form>
				<?php }?>
				<?php if(isset($_SESSION['okFormLostPass'])) {?>
				Check your email!<br>
					
				<?php echo($tr_text_noty_thank);?> <?php echo($_SESSION['pseudookFormLostPass']);?>, <?php echo($tr_text_noty_checkEmailForRecreatePass);?> : <?php echo($_SESSION['emailokFormLostPass']);?> !<br><br>
					Process active <?php echo($app_limitTimeProcessDoubleAndLostF);?>
				<?php }?>
				
				<?php if(isset($_SESSION['lostPass'])) {// $_SESSION['lostPass']=idMmeber?>
				Choose your new Password!<br><br>
				
					
				
					<a href="javascript:return;" onClick="generatePassword();"><button type="button" class="btn btn-success btn-block">Generate Secure Password</button></a><br>
					<?php if($app_ifDemandSecurePassword=="yes") {?>To enhance your security, We demand a secure password, One !@#$%&*?, one number, one Capital and minuscule!<br><br><?php }?>
				<form action="?" method="post">
					<input type="hidden" name="idMember" value="<?php echo($_SESSION['lostPass']);?>">
					<input type="hidden" name="code" value="">
					<?php echo($tr_text_form_newPass);?> : 
					<input tabindex="38" class="form-control" name="password1" id="password1" type="password" onKeyUp="checkPassword1();" onChange="checkPassword1();" onBlur="checkPassword1();" <?php if((isset($_POST['btn_changePass'])) && ($okNewPass=='nokn')) {?> style="border: 3px solid #e88d3c;" <?php }?> value="" placeholder="<?php echo($tr_text_form_newPass);?> *" maxlength="24" required><span toggle="#password1" class="fa fa-fw fa-eye field-icon passwordShow"></span>

					<?php echo($tr_text_form_confirmNewPass);?> : 
					<input tabindex="39" class="form-control" name="password2" id="password2" type="password" onKeyUp="checkPassword2();" onChange="checkPassword2();" onBlur="checkPassword2();" <?php if((isset($_POST['btn_changePass'])) && ($okNewPass=='nokn')) {?> style="border: 3px solid #e88d3c;" <?php }?> value="" placeholder="<?php echo($tr_text_form_confirmNewPass);?> *"  maxlength="24" required>
					<br>
					<div class="progress progress-striped active">
					<div id="jak_pstrength" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
					</div>
					<br>
					<div class="countdown">Time remaining!
					  <?php //if($okCanVote==false) {?><?php echo($tr_text_page_vote_remaningTime);?><?php //}?>
					  <span style="font-size: 12px;" id="clock"></span>
					</div>
					<br>
					<input type="submit" class="btn btn-primary btn-block" name="btn_regeneratePass" value="<?php echo($tr_text_form_btn_changePass);?>">
				</form><br>
				
				<?php }?>
				<!-- END login-form -->
				<div class="m-t-20">
					You have trouble connection?<br>Contact <a href="mailto:<?php echo($app_emailContactProject);?>"><?php echo($app_emailContactProject);?></a><br>
				</div>
				<div class="m-t-20">
					Already have an ID? <a href="connect.php">Sign In</a> or <a href="register.php">Sign Up</a>
				</div>
				</div>
			</div>
			<!-- END login-content -->
        </div>
        <!-- END login -->
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
	
  	<?php require_once("admin/scripts/inc.core.framework.php");// <?php echo($formatDateLastRRPCompteDown);? >?>
  	<?php require_once("admin/scripts/inc.core.noty.php");?>
	
	<?php if(isset($_SESSION['lostPass'])) {// display only if he can regenerate pass?>
	<script>
		$('#clock').countdown('<?php echo($_SESSION['formatDateLastRRPCompteDown']);?>')
		.on('update.countdown', function(event) {
		  var format = '%H:%M:%S';
		  if(event.offset.totalDays > 0) {
			format = '%-d day%!d ' + format;
		  }
		  if(event.offset.weeks > 0) {
			format = '%-w week%!w ' + format;
		  }
		  $(this).html(event.strftime(format));
		})
		.on('finish.countdown', function(event) {
		  $(this).html('Time exceeded!')
			.parent().addClass('disabled');
			//location.reload();
			killSessionReneratePassword(<?php echo($_SESSION['lostPass']);?>);
		});
	</script>
	<?php }?>
</body>
</html>