<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Gathering Events
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
$page = "app_gathering";
//////////////////////////////////////////
//////////////////////////////////////////
// load core intelligenza
require_once("scripts/inc.core.intelligenza.php");
//////////////////////////////////////////
//////////////////////////////////////////
// check if settings allow it
if($app_ifGathering!="yes") {
	header("location:".$app_urlRoot."");
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo($_SESSION['language']);?>">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo($app_nameProject);?> | Gathering</title>
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
		<div id="content" class="content">
			<!-- BEGIN breadcrumb -->
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active">Gathering</li>
			</ul>
			<!-- END breadcrumb -->
			<!-- BEGIN page-header -->
			<h1 class="page-header">
				Public Place <small>Profiles, Labels, Events...</small>
			</h1>
			<!-- END page-header -->
			work in progress<br>
			<p>
				<!-- BEGIN section-title -->
					<div class="section-title m-t-10">test widget</div>
					<!-- END section-title -->
					<!-- BEGIN widget -->
					<div class="widget widget-reminder inverse-mode">
						<div class="widget-reminder-header">TODAY, NOV 4</div>
						<div class="widget-reminder-container">
							<div class="widget-reminder-time">09:00<br>12:00</div>
							<div class="widget-reminder-divider bg-success"></div>
							<div class="widget-reminder-content">
								<h4 class="widget-title text-ellipsis">Meeting with HR</h4>
								<div class="widget-desc text-ellipsis"><i class="ti-pin"></i> Conference Room</div>
							</div>
						</div>
						<div class="widget-reminder-container">
							<div class="widget-reminder-time">20:00<br>23:00</div>
							<div class="widget-reminder-divider bg-primary"></div>
							<div class="widget-reminder-content">
								<h4 class="widget-title text-ellipsis">Dinner with Richard</h4>
								<div class="widget-desc text-ellipsis"><i class="ti-pin"></i> Tom's Too Restaurant</div>
								<div class="m-t-10 p-t-3 text-ellipsis">
									<a href="#" class="pull-right">Contact</a>
									<img src="../assets/img/user-3.jpg" width="16" class="img-circle pull-left m-r-5" alt="" /> Richard Leong 
								</div>
							</div>
						</div>
						<div class="widget-reminder-header">TOMORROW, NOV 5</div>
						<div class="widget-reminder-container">
							<div class="widget-reminder-time">All day</div>
							<div class="widget-reminder-divider bg-success"></div>
							<div class="widget-reminder-content">
								<h4 class="widget-title text-ellipsis"><i class="ti-gift text-success"></i> Terry Birthday</h4>
							</div>
						</div>
						<div class="widget-reminder-container">
							<div class="widget-reminder-time">08:00</div>
							<div class="widget-reminder-divider bg-warning"></div>
							<div class="widget-reminder-content">
								<h4 class="widget-title text-ellipsis"><i class="ti-gift text-warning"></i> Meeting</h4>
							</div>
						</div>
						<div class="widget-reminder-container">
							<div class="widget-reminder-time">00:00<br>00:30</div>
							<div class="widget-reminder-divider bg-danger"></div>
							<div class="widget-reminder-content">
								<h4 class="widget-title text-ellipsis">Server Maintenance</h4>
								<div class="widget-desc"><i class="ti-pin"></i> Data Centre</div>
							</div>
						</div>
					</div>
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
	<script src="assets/plugins/chart/chart-js/Chart.min.js"></script>
	<script src="assets/js/page/dashboard.demo.min.js"></script>
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