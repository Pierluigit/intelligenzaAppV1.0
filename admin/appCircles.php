<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Basic Template
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
$page = "app_admin_circles";
//////////////////////////////////////////
//////////////////////////////////////////
// load core intelligenza
require_once("scripts/inc.core.intelligenza.php");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo($_SESSION['language']);?>">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo($app_nameProject);?> | Social Circles</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("scripts/cp/inc.template_head.php");?>
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/plugins/loader/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<!-- BEGIN #page-container -->
	<div id="page-container" class="page-header-fixed page-sidebar-fixed fade">
		<!-- BEGIN #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- BEGIN container-fluid -->
			<div class="container-fluid">
				<!-- BEGIN mobile sidebar expand / collapse button -->
				<?php require_once("scripts/cp/inc.template_menuResponsive.php"); ?>
				<!-- END mobile sidebar expand / collapse button -->
				<!-- BEGIN header navigation right -->
				<?php require_once("scripts/cp/inc.template_headerNavigation.php"); ?>
				<!-- END header navigation right -->
			</div>
			<!-- END container-fluid -->
			<!-- BEGIN header-search-bar -->
			<?php //require_once("scripts/cp/inc.template_headerSearch.php"); ?>
			<!-- END header-search-bar -->
		</div>
		<!-- END #header -->
		
		<!-- BEGIN #sidebar -->
		<?php require_once("scripts/cp/inc.template_sideBarMenu.php"); ?>
		<!-- END #sidebar -->
		
		<!-- BEGIN #content -->
		<div id="content" class="content bgBoxApp">
			<!-- BEGIN breadcrumb -->
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active">Social Circles</li>
			</ul>
			<!-- END breadcrumb -->
			<!-- BEGIN page-header -->
			<h1 class="page-header">
				Social Circles <small>Connect with others circles...</small>
			</h1>
			<!-- END page-header -->
			<p>
				<!-- BEGIN setting-list -->
			<ul class="setting-list">
				<li class="setting-title bg-green">PUBLIC KEY</li> 
				<li>
					<div class="field">Connect with others circles<br>
						<span class="text-muted" style="font-size: 8px;">Give this key to connect with other circles</span>
					</div>
					<div class="value">
						<?php echo($app_publicKey);?> (pas d'infos sur l'app neutre la clef, générée une fois uniquement, pour connecter )
					</div>
					<div class="action">
					  
					</div>
				</li>
				
				<li class="setting-title bg-red">PRIVATE KEY</li>
				<li>
					<div class="field">Unique APP ID<br>
						<span class="text-muted" style="font-size: 8px;">External requests, public key has to match</span>
					</div>
					<div class="value">
						<?php echo($app_privateKey);?> (infos serveur domaine name date)
					</div>
					<div class="action">
					  
					</div>
				</li>
				<br>
			</ul>
			</p>
		</div>
		<!-- END #content -->
		
		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="ti-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
	</div>
	<!-- END #page-container -->
		
	<!-- BEGIN theme-panel -->
  	<?php require_once("scripts/cp/inc.template_themePanel.php");?>
  	<!-- END theme-panel -->
	
	<!-- ================== BEGIN BASE JS ================== -->
  	<?php require_once("scripts/cp/inc.template_framework.php");?>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	
  	<?php require_once("scripts/inc.core.framework.php");// app framework?>
  	<?php require_once("scripts/inc.core.noty.php");// app admin noty?>
	<?php require_once("scripts/inc.core.notyUp.php");// app personal noty?>
</body>
</html>