<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: F.A.Q.
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
$page = "faq";
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
	<title><?php echo($tr_text_page_faq_title);?> | F.A.Q.</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="<?php echo($tr_text_page_faq_description);?>" name="description" />
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
		<!-- BEGIN Privacy -->
        <div class="register">
        	<!-- BEGIN register-cover -->
			<div class="faq-cover"></div>
			<div class="register-content">
				<!-- BEGIN brand -->
				<div class="register-brand">
					<a href="index.php">
						<?php require_once("scripts/inc.logoHPage.php");// dynamic logo?>
					</a>
				</div>
				<div class="bgBox">
				<!-- END brand -->
				<h3 class="m-b-20"><span>F.A.Q.</span></h3>
				<p class="m-b-20">One Admin ID is all you need to access all the Admin services.</p>
				<!-- BEGIN Privacy-content -->
				
				<!-- END Privacy-content -->
				</div>
			</div>
			
			<!-- BEGIN btn-scroll-top -->
			<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="ti-arrow-up"></i></a>
			<!-- END btn-scroll-top -->
        </div>
        <!-- END Privacy -->
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