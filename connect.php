<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Connect
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
$page = "connect";
//////////////////////////////////////////
//////////////////////////////////////////
// load core intelligenza
require_once("admin/scripts/inc.core.intelligenza.php");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo($_SESSION['language']);?>">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo($tr_text_page_connect_title);?> | Connect</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="<?php echo($tr_text_page_connect_description);?>" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("admin/scripts/cp/inc.template_head.php");?>
	<!-- ================== END BASE CSS STYLE ================== -->
	
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
			<!-- BEGIN login-cover -->
			<div class="login-cover"></div>
			<!-- END login-cover -->
			<!-- BEGIN login-content -->
			<div class="login-content">
				<!-- BEGIN login-brand -->
				<div class="login-brand">
					<a href="index.php">
						<?php require_once("scripts/inc.logoHPage.php");// dynamic logo?>
					</a>
				</div>
				<!-- END login-brand -->
				<!-- BEGIN login-desc -->
				<div class="login-desc">
					For your protection, please verify your identity.
				</div>
				<!-- END login-desc -->
				<!-- BEGIN login-form -->
				<form action="?" method="POST" name="login_form">
					<div class="form-group">
						<label class="control-label" for="email">Email <span class="text-danger">*</span></label>
						<input type="email" name="email" id="email" class="form-control" value="<?php if(isset($_SESSION['noty_emailConfirmed'])) { echo($_SESSION['noty_emailConfirmed']);}?><?php if(isset($_SESSION['emailInscrit'])) { echo($_SESSION['emailInscrit']);}?>" required />
					</div>
					<div class="form-group">
						<label class="control-label" for="password">Password <span class="text-danger">*</span></label>
						<input type="password" name="password" id="password" class="form-control" value="" required />
					</div>
					<?php if($app_ifRememberMe=="yes") {?>
					<div class="m-b-10">
						<div class="checkbox-inline">
							<input type="checkbox" name="rememberme" id="rememberme" value="2"> <label for="rememberme">Remember me</label>
						</div>
					</div>
					<?php }?>
					<a href="lostPassword.php" class="pull-right">Forgot your ID or password?</a>
					<button type="submit" name="btn_login" class="btn btn-primary">Sign In</button>
				</form>
				<!-- END login-form -->
				<div class="m-t-20">
					Not a member yet? <a href="register.php">Get an Admin ID</a><br>
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
	
  	<?php require_once("admin/scripts/inc.core.framework.php");?>
  	<?php require_once("admin/scripts/inc.core.noty.php");?>
	<script>

	</script>
</body>
</html>