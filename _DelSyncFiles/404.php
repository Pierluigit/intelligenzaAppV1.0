<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: 404 Page
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
$page = "404";
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
	<title><?php echo($tr_text_page_404_title);?> | 404</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="<?php echo($tr_text_page_404_description);?>" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="<?php echo($app_urlRoot);?>/admin/assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?php echo($app_urlRoot);?>/admin/assets/plugins/bootstrap/bootstrap4/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo($app_urlRoot);?>/admin/assets/plugins/icon/themify-icons/themify-icons.css" rel="stylesheet" />
	<link href="<?php echo($app_urlRoot);?>/admin/assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?php echo($app_urlRoot);?>/admin/assets/css/style.min.css" rel="stylesheet" />
	<link href="<?php echo($app_urlRoot);?>/admin/assets/css/theme/default.css" rel="stylesheet" id="theme" />
	<!-- my styles -->
	<link rel="stylesheet" href="<?php echo($app_urlRoot);?>/css/jquery-confirm.min.css">
	<link rel="stylesheet" href="<?php echo($app_urlRoot);?>/css/noty_confirm.css">
	<link rel="stylesheet" href="<?php echo($app_urlRoot);?>/css/font-awesome.min.css">
	<!-- Favicons -->
	<link rel="shortcut icon" href="<?php echo($app_urlRoot);?>/images/logo/<?php echo($faviconProject);?>">
	<!-- ================== END BASE CSS STYLE ================== -->
	<style>
		body {
			background-color: black;
			color: white;
		}
	</style>
	<!-- ================== BEGIN BASE JS ================== -->
	<!-- used absolute url works everywhere -->
	<script src="<?php echo($app_urlRoot);?>/admin/assets/plugins/loader/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<?php require_once("scripts/analyticstracking.php");// not in admin ?>
	<!-- BEGIN #page-container -->
	<div id="page-container" class="fade">
		<!-- BEGIN error-page -->
        <div class="error-page">
			<a href="index.php">
			<?php if(($set_activeSettingDb=="yes") && ($okCanUseDynamicSettings==true)) {// dynamic mode??>
				<?php if($app_logoProject=="") {// check which logo?>
				<span class="logo"><i class="ti-infinite"></i></span>
				<?php }else {
				// if existe
				if(file_exists('images/logo/'.$app_logoHProject.'')) {?>
					<img src="images/logo/<?php echo($app_logoHProject);?>" width="333" alt=""/>
				<?php }else {?>
				<span class="logo"><i class="ti-infinite"></i></span>
				<?php }?>
				<?php }?>
				<br><?php //echo($app_nameProject);?>
			<?php }else {// manuel mode?>
					<span class="logo"><i class="ti-infinite"></i> <?php echo($app_nameProject);?></span><br>
			<?php }?>
			</a>
        	<div class="error-icon"><i class="ti-alert"></i></div>
        	<h1>Oops!</h1> 
			<h3>We can't seem to find the page you're looking for</h3>
			<p>
				Error code: <b>404</b>
				<br />
				<br />
				<br />
				<!--Here are some helpful links instead:-->
			</p>
        </div>
        <!-- END error-page -->
	</div>
	<!-- END #page-container -->
	
	<!-- BEGIN Footer -->
	<?php require_once("scripts/inc.footer.php");?>
	<!-- END Footer -->
  
	<!-- BEGIN theme-panel -->
  	<?php //require_once("scripts/inc.template_themePanel.php");?>
  	<!-- END theme-panel -->
	
	<!-- ================== BEGIN BASE JS ================== -->
  	<script src="<?php echo($app_urlRoot);?>/admin/assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo($app_urlRoot);?>/admin/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo($app_urlRoot);?>/admin/assets/plugins/cookie/js/js.cookie.js"></script>
	<script src="<?php echo($app_urlRoot);?>/admin/assets/plugins/tooltip/popper/popper.min.js"></script>
	<script src="<?php echo($app_urlRoot);?>/admin/assets/plugins/bootstrap/bootstrap4/js/bootstrap.min.js"></script>
	<script src="<?php echo($app_urlRoot);?>/admin/assets/plugins/scrollbar/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<!-- used absolute url works everywhere -->
	<script src="<?php echo($app_urlRoot);?>/admin/assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	
  	<?php //require_once("admin/scripts/inc.core.framework.php");?>
  	<?php //require_once("admin/scripts/inc.core.noty.php");?>
</body>
</html>