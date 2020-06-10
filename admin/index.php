<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Admin Home Page
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
$page = "app_admin_home";
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
	<title><?php echo($app_nameProject);?> | Home</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("scripts/cp/inc.template_head.php");?>
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN CUSTOM CSS STYLE ================== -->
	<?php require_once("scripts/cp/inc.head.customCss.php");// custom css ?>
	<!-- ================== END CUSTOM CSS STYLE ================== -->
	
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
			<!-- BEGIN page-header -->
			<h1 class="page-header">
				Admin Dashboard <small>work in progress</small>
			</h1>
			<!-- END page-header -->
			
			<!-- BEGIN row -->
			<div class="row">
				<!-- BEGIN col-6 -->
				<div class="col-lg-6 col-sm-12">
					<!-- BEGIN widget -->
					<div class="widget widget-card widget-card-rowspan2 dynamic-xs inverse-mode with-min-height">
						<!-- BEGIN widget-card-cover -->
						<div class="widget-card-cover">
							<div class="cover-bg"></div>
							<img src="assets/img/dashboard-cover.jpg" alt="" />
						</div>
						<!-- END widget-card-cover -->
						<!-- BEGIN widget-card-content -->
						<div class="widget-card-content">
							<a href="appNoty.php" class="widget-title-link bg-primary">General Notifcation</a>
							<h4 class="widget-title"><b>GETTING STARTED</b></h4>
						</div>
						<!-- END widget-card-content -->
						<!-- BEGIN widget-card-content -->
						<div class="widget-card-content bottom p-b-5">
							<div class="text-center">
								<h3 class="m-b-0">Welcome back, <?php echo($pseudoUser);?>!</h3>
								<p class="opacity-7">We've assembled some links to get you started:</p>
							</div>
							<!-- BEGIN row -->
							<div class="row">
								<!-- BEGIN col-6 -->
								<div class="col-6">
									<!-- BEGIN widget -->
									<ul class="widget widget-list m-b-0 no-bg inverse-mode">
										<li>
											<!-- BEGIN widget-list-container -->
											<a href="profileEdit.php" class="widget-list-container">
												<div class="widget-list-media icon p-l-0">
													<i class="ti-pencil bg-gradient-blue"></i>
												</div>
												<div class="widget-list-content">
													<h4 class="widget-title">Manage Profile</h4>
													<div class="widget-desc hidden-xs">Personal infos</div>
												</div>
											</a>
											<!-- END widget-list-container -->
										</li>
										<li>
											<!-- BEGIN widget-list-container -->
											<a href="labels.php" class="widget-list-container">
												<div class="widget-list-media icon p-l-0">
													<i class="ti-shopping-cart-full bg-gradient-purple"></i>
												</div>
												<div class="widget-list-content">
													<h4 class="widget-title">Manage Labels</h4>
													<div class="widget-desc hidden-xs">Products</div>
												</div>
											</a>
											<!-- END widget-list-container -->
										</li>
										<li>
											<!-- BEGIN widget-list-container -->
											<a href="wallet.php" class="widget-list-container">
												<div class="widget-list-media icon p-l-0">
													<i class="ti-bag bg-gradient-green"></i>
												</div>
												<div class="widget-list-content">
													<h4 class="widget-title">Manage Transaction</h4>
													<div class="widget-desc hidden-xs">Report</div>
												</div>
											</a>
											<!-- END widget-list-container -->
										</li>
									</ul>
									<!-- END widget -->
								</div>
								<!-- END col-6 -->
								<!-- BEGIN col-6 -->
								<div class="col-6">
									<!-- BEGIN widget -->
									<ul class="widget widget-list m-b-0 no-bg inverse-mode">
										<li>
											<!-- BEGIN widget-list-container -->
											<a href="appSettings.php" class="widget-list-container">
												<div class="widget-list-media icon p-l-0">
													<i class="ti-settings bg-theme"></i>
												</div>
												<div class="widget-list-content">
													<h4 class="widget-title">App Settings</h4>
													<div class="widget-desc hidden-xs">System</div>
												</div>
											</a>
											<!-- END widget-list-container -->
										</li>
										<li>
											<!-- BEGIN widget-list-container -->
											<a href="appMembers.php" class="widget-list-container">
												<div class="widget-list-media icon p-l-0">
													<i class="ti-user bg-gradient-red"></i>
												</div>
												<div class="widget-list-content">
													<h4 class="widget-title">Manage Members</h4>
													<div class="widget-desc hidden-xs">Rights, block, add...</div>
												</div>
											</a>
											<!-- END widget-list-container -->
										</li>
										<li>
											<!-- BEGIN widget-list-container -->
											<a href="appBackups.php" class="widget-list-container">
												<div class="widget-list-media icon p-l-0">
													<i class="fas fa-database bg-gradient-orange"></i>
													
												</div>
												<div class="widget-list-content">
													<h4 class="widget-title">Backups</h4>
													<div class="widget-desc hidden-xs">Globale</div>
												</div>
											</a>
											<!-- END widget-list-container -->
										</li>
										
										
									</ul>
									<!-- END widget -->
								</div>
								<!-- END col-6 -->
							</div>
							<!-- END row -->
						</div>
						<!-- END widget-card-content -->
					</div>
					<!-- END widget -->
				</div>
				<!-- END col-6 -->
				<!-- BEGIN col-3 -->
				<div class="col-lg-3 col-sm-6" <?php if($app_ifGathering!="yes") {?> style="display: none;"<?php }?>>
					<!-- BEGIN widget -->
					<div class="widget widget-card inverse-mode with-min-height">
						<!-- BEGIN widget-card-cover -->
						<a href="gatheringSocialCircles.php">
						<div class="widget-card-cover">
							<div class="cover-bg with-gradient"></div>
							<img src="assets/img/dashboard-cover-1.jpg" alt="" />
						</div>
						<!-- END widget-card-cover -->
						<!-- BEGIN widget-card-content -->
						<div class="widget-card-content">
							<!--<div class="dropdown dropdown-icon pull-right">
								<a href="#" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#">View</a></li>
									<li><a href="#">Analytics</a></li>
									<li><a href="#">Report</a></li>
								</ul>
							</div>-->
							<h4 class="widget-title"><b>Local Circles</b></h4>
						</div>
						<!-- END widget-card-content -->
						<!-- BEGIN widget-card-content -->
						<div class="widget-card-content bottom">
							<div class="widget-card-img bg-gradient-blue">
								<img src="../images/logo/intel/icone32.png" alt="" />
							</div>
							
							<div class="widget-card-info">
								<h4 class="widget-title">Connect with others circles</h4>
								<ul class="widget-inline-list">
									<li>1.2m views</li>
									<li>8888888 circles</li>
								</ul>
							</div>
						</div>
						<!-- END widget-card-content -->
						</a>
					</div>
					<!-- END widget -->
					<!-- BEGIN widget -->
					<div class="widget widget-card inverse-mode with-min-height">
						<!-- BEGIN widget-card-cover -->
						<a href="gatheringLabels.php">
						<div class="widget-card-cover">
							<div class="cover-bg with-gradient"></div>
							<img src="../images/dashboard/dashboard-cover-3.jpg" alt="" />
						</div>
						<!-- END widget-card-cover -->
						<!-- BEGIN widget-card-content -->
						<div class="widget-card-content">
							<!--<div class="dropdown dropdown-icon pull-right">
								<a href="#" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#">View</a></li>
									<li><a href="#">Analytics</a></li>
									<li><a href="#">Report</a></li>
								</ul>
							</div>-->
							<h4 class="widget-title">Labels</h4>
						</div>
						<!-- END widget-card-content -->
						<!-- BEGIN widget-card-content -->
						<div class="widget-card-content bottom">
							<div class="widget-card-img bg-gradient-green">
								<img src="../images/dashboard/tomato.png" alt="" />
							</div>
							<div class="widget-card-info">
								<h4 class="widget-title"><!--<a href="gatheringLabels.php">-->Products, Services...<!--</a>--></h4>
								<ul class="widget-inline-list">
									<li>2222 labels</li>
									<li>55555 products</li>
								</ul>
							</div>
						</div>
							</a>
						<!-- END widget-card-content -->
					</div>
					<!-- END widget -->
				</div>
				<!-- END col-3 -->
				<!-- BEGIN col-3 -->
				<div class="col-lg-3 col-sm-6"  <?php if($app_ifGathering!="yes") {?> style="display: none;"<?php }?>>
					<!-- BEGIN widget -->
					<div class="widget widget-card inverse-mode with-min-height">
						<a href="gatheringEvents.php">
						<!-- BEGIN widget-card-cover -->
						<div class="widget-card-cover">
							<div class="cover-bg with-gradient"></div>
							<img src="../images/dashboard/dashboard-cover-2.jpg" alt="" />
						</div>
						<!-- END widget-card-cover -->
						<!-- BEGIN widget-card-content -->
						<div class="widget-card-content">
							<!--<div class="dropdown dropdown-icon pull-right">
								<a href="#" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#">View</a></li>
									<li><a href="#">Analytics</a></li>
									<li><a href="#">Report</a></li>
								</ul>
							</div>-->
							<h4 class="widget-title">Events</h4>
						</div>
						<!-- END widget-card-content -->
						<!-- BEGIN widget-card-content -->
						<div class="widget-card-content bottom">
							<div class="widget-card-icon bg-gradient-yellow">
								<i class="fas fa-birthday-cake"></i>
							</div>
							<div class="widget-card-info">
								<h4 class="widget-title">Meet others people</h4>
								<ul class="widget-inline-list">
									<li>129 parties</li>
									<li>1,382 friends</li>
								</ul>
							</div>
						</div>
						<!-- END widget-card-content -->
						</a>
					</div>
					<!-- END widget -->
					<!-- BEGIN widget -->
					<div class="widget widget-card inverse-mode with-min-height">
						<a href="gatheringDate.php">
						<!-- BEGIN widget-card-cover -->
						<div class="widget-card-cover">
							<div class="cover-bg with-gradient"></div>
							<img src="../images/dashboard/dashboard-cover-4.jpg" alt="" />
						</div>
						<!-- END widget-card-cover -->
						<!-- BEGIN widget-card-content -->
						<div class="widget-card-content">
							<!--<div class="dropdown dropdown-icon pull-right">
								<a href="#" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#">View</a></li>
									<li><a href="#">Analytics</a></li>
									<li><a href="#">Report</a></li>
								</ul>
							</div>-->
							<h4 class="widget-title"><b>Date</b></h4>
						</div>
						<!-- END widget-card-content -->
						<!-- BEGIN widget-card-content -->
						<div class="widget-card-content bottom">
							<div class="widget-card-icon bg-gradient-red"><i class="fas fa-heartbeat"></i></div>
							<div class="widget-card-info">
								<h4 class="widget-title text-ellipsis">Meet some nice people make your circle</h4>
								<ul class="widget-inline-list">
									<li>one love</li>
									<li>some children</li>
								</ul>
							</div>
						</div>
						<!-- END widget-card-content -->
						</a>
					</div>
					<!-- END widget -->
				</div>
				<!-- END col-3 -->
			</div>
			<!-- END row -->
			
			
				
			
			
			
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