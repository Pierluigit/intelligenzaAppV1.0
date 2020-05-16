<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Analytics
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
$page = "app_admin_analytics";
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
	<title><?php echo($app_nameProject);?> | Analytics</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("scripts/cp/inc.template_head.php");?>
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<link href="assets/plugins/map/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
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
				<li class="breadcrumb-item"><a href="index.php?">Home</a></li>
				<li class="breadcrumb-item active">Analytics</li>
			</ul>
			<!-- END breadcrumb -->
			<!-- BEGIN page-header -->
			<h1 class="page-header">
				Analytics <small>stats, overview & performance, work in progress</small>
			</h1>
			<!-- END page-header -->
			
			<!-- BEGIN row -->
			<div class="row">
				<!-- BEGIN col-3 -->
				<div class="col-lg-3 col-sm-6">
					<!-- BEGIN widget -->
					<a href="#" class="widget widget-stats bg-gradient-blue-dark">
						<div class="widget-stats-info">
							<div class="widget-stats-title">NEW PURCHASE</div>
							<div class="widget-stats-value">
								140
							</div>
							<div class="widget-desc">Today, 1:50PM</div>
						</div>
						<div class="widget-stats-icon">
							<i class="ti-shopping-cart-full text-inverse"></i>
						</div>
					</a>
					<!-- END widget -->
				</div>
				<!-- END col-3 -->
				<!-- BEGIN col-3 -->
				<div class="col-lg-3 col-sm-6">
					<!-- BEGIN widget -->
					<a href="#" class="widget widget-stats bg-gradient-purple-dark">
						<div class="widget-stats-info">
							<div class="widget-stats-title">TOTAL VISITORS</div>
							<div class="widget-stats-value">
								<?php echo($app_totalVisits);?>
							</div>
							<div class="widget-desc">Today, 11:25AM</div>
						</div>
						<div class="widget-stats-icon text-inverse">
							<i class="ti-pie-chart"></i>
						</div>
					</a>
					<!-- END widget -->
				</div>
				<!-- END col-3 -->
				<!-- BEGIN col-3 -->
				<div class="col-lg-3 col-sm-6">
					<!-- BEGIN widget -->
					<a href="#" class="widget widget-stats bg-gradient-pink">
						<div class="widget-stats-info">
							<div class="widget-stats-title">NEW REGISTERED USER</div>
							<div class="widget-stats-value">
								92
							</div>
							<div class="widget-desc">Today, 8:20AM</div>
						</div>
						<div class="widget-stats-icon text-inverse">
							<i class="ti-user"></i>
						</div>
					</a>
				</div>
				<!-- END col-3 -->
				<!-- BEGIN col-3 -->
				<div class="col-lg-3 col-sm-6">
					<!-- BEGIN widget -->
					<a href="#" class="widget widget-stats bg-gradient-orange-dark">
						<div class="widget-stats-info">
							<div class="widget-stats-title">PENDING INVOICE</div>
							<div class="widget-stats-value">
								5
							</div>
							<div class="widget-desc">Yesterday, 10:23PM</div>
						</div>
						<div class="widget-stats-icon text-inverse">
							<i class="ti-files"></i>
						</div>
					</a>
					<!-- END widget -->
				</div>
				<!-- END col-3 -->
			</div>
			<!-- END row -->
			
			<!-- BEGIN row -->
			<div class="row">
				<!-- BEGIN col-4 -->
				<div class="col-lg-4 col-sm-6">
			        <!-- BEGIN panel -->
					<div class="panel panel-default with-rounded-corner with-shadow">
			        	<!-- BEGIN panel-heading -->
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            	<div class="dropdown dropdown-icon">
                                	<a href="javascript:;" class="btn" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                	<ul class="dropdown-menu dropdown-menu-right">
                            			<li><a href="#">Today</a></li>
                                		<li><a href="#">Yesterday</a></li>
                                		<li class="active"><a href="#">Last 7 days</a></li>
                                		<li><a href="#">Last 28 days</a></li>
                                	</ul>
                                </div>
                            </div>
                            <h4 class="panel-title">
                            	OVERVIEW
                            </h4>
                        </div>
			        	<!-- END panel-heading -->
			        	<!-- BEGIN panel-body -->
                        <div class="panel-body">
                        	<div class="text-center m-b-lg">
								<div class="f-s-1rem f-w-500 m-t-xs">Right now</div>
								<div class="f-s-5rem text-gradient bg-gradient-black line-height-1 m-xs">
									<span data-id="active-user">5</span>
								</div>
								<div>active users on site</div>
							</div>
							<hr />
							<ul class="list-inline m-b-sm">
								<li>
									<span class="circle circle-sm text-primary m-r-xs"></span> Desktop
								</li>
								<li>
									<span class="circle circle-sm text-success m-r-xs"></span> Mobile
								</li>
								<li>
									<span class="circle circle-sm text-warning m-r-xs"></span> Tablet
								</li>
							</ul>
							<div class="progress without-rounded-corner m-b-sm">
								<div class="progress-bar bg-primary" data-id="desktop-user" style="width: 60%;">60%</div>
								<div class="progress-bar bg-success" data-id="mobile-user" style="width: 25%;">25%</div>
								<div class="progress-bar bg-warning" data-id="tablet-user" style="width: 15%;">15%</div>
							</div>
                        	<p class="desc m-b-0">
                        		* Data updates continuously and each pageview is reported seconds after it occurs.
                        	</p>
                    	</div>
                    </div>
			        <!-- END panel -->
			        <!-- BEGIN panel -->
					<div class="panel panel-default with-rounded-corner with-shadow">
			        	<!-- BEGIN panel-heading -->
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            	<div class="dropdown dropdown-icon">
                                	<a href="javascript:;" class="btn" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                	<ul class="dropdown-menu dropdown-menu-right">
                            			<li><a href="#">Today</a></li>
                                		<li><a href="#">Yesterday</a></li>
                                		<li class="active"><a href="#">Last 7 days</a></li>
                                		<li><a href="#">Last 28 days</a></li>
                                	</ul>
                                </div>
                            </div>
                            <h4 class="panel-title">
                            	TOP REFERRALS
                            </h4>
                        </div>
			        	<!-- END panel-heading -->
			        	<table class="table table-panel table-condensed table-striped table-bordered table-th-without-border">
			        		<thead>
			        			<tr>
			        				<th width="1%"></th>
			        				<th>Source</th>
			        				<th width="15%" colspan="2" class="text-center text-nowrap">Active Users</th>
			        			</tr>
			        		</thead>
			        		<tbody>
								<tr>
									<td>1.</td>
									<td><a href="#">wrapbootstrap.com</a></td>
									<td data-col="value" class="text-right">15</td>
								</tr>
								<tr>
									<td>2.</td>
									<td><a href="#">bootswatch.com</a></td>
									<td data-col="value" class="text-right">6</td>
								</tr>
								<tr>
									<td>3.</td>
									<td><a href="#">google.com</a></td>
									<td data-col="value" class="text-right">3</td>
								</tr>
								<tr>
									<td>4.</td>
									<td><a href="#">(direct)</a></td>
									<td data-col="value" class="text-right">1</td>
								</tr>
			        		</tbody>
			        	</table>
			        </div>
			        <!-- END panel -->
			        <!-- BEGIN panel -->
					<div class="panel panel-default with-rounded-corner with-shadow">
			        	<!-- BEGIN panel-heading -->
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            	<div class="dropdown dropdown-icon">
                                	<a href="javascript:;" class="btn" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                	<ul class="dropdown-menu dropdown-menu-right">
                            			<li><a href="#">Today</a></li>
                                		<li><a href="#">Yesterday</a></li>
                                		<li class="active"><a href="#">Last 7 days</a></li>
                                		<li><a href="#">Last 28 days</a></li>
                                	</ul>
                                </div>
                            </div>
                            <h4 class="panel-title">
                            	TOP SOCIAL TRAFFIC
                            </h4>
                        </div>
			        	<!-- END panel-heading -->
			        	<table class="table table-panel table-condensed table-striped table-bordered table-th-without-border">
			        		<thead>
			        			<tr>
			        				<th width="1%"></th>
			        				<th>Source</th>
			        				<th width="15%" colspan="2" class="text-center text-nowrap">Active Users</th>
			        			</tr>
			        		</thead>
			        		<tbody>
								<tr>
									<td>1.</td>
									<td><a href="#">facebook.com</a></td>
									<td data-col="value" class="text-right">5</td>
								</tr>
								<tr>
									<td>2.</td>
									<td><a href="#">twitter.com</a></td>
									<td data-col="value" class="text-right">3</td>
								</tr>
								<tr>
									<td>3.</td>
									<td><a href="#">youtube.com</a></td>
									<td data-col="value" class="text-right">1</td>
								</tr>
			        		</tbody>
			        	</table>
			        </div>
			        <!-- END panel -->
			        <!-- BEGIN panel -->
					<div class="panel panel-default with-rounded-corner with-shadow">
			        	<!-- BEGIN panel-heading -->
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            	<div class="dropdown dropdown-icon">
                                	<a href="javascript:;" class="btn" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                	<ul class="dropdown-menu dropdown-menu-right">
                            			<li><a href="#">Today</a></li>
                                		<li><a href="#">Yesterday</a></li>
                                		<li class="active"><a href="#">Last 7 days</a></li>
                                		<li><a href="#">Last 28 days</a></li>
                                	</ul>
                                </div>
                            </div>
                            <h4 class="panel-title">
                            	TOP KEYWORDS
                            </h4>
                        </div>
			        	<!-- END panel-heading -->
			        	<table class="table table-panel table-condensed table-striped table-bordered table-th-without-border">
			        		<thead>
			        			<tr>
			        				<th width="1%"></th>
			        				<th>Keyword</th>
			        				<th width="15%" colspan="2" class="text-center text-nowrap">Active Users</th>
			        			</tr>
			        		</thead>
			        		<tbody>
								<tr>
									<td>1.</td>
									<td><a href="#">admin-template</a></td>
									<td data-col="value" class="text-right">5</td>
								</tr>
								<tr>
									<td>2.</td>
									<td><a href="#">dashboard</a></td>
									<td data-col="value" class="text-right">3</td>
								</tr>
								<tr>
									<td>3.</td>
									<td><a href="#">apple-design</a></td>
									<td data-col="value" class="text-right">2</td>
								</tr>
								<tr>
									<td>4.</td>
									<td><a href="#">bootstrap</a></td>
									<td data-col="value" class="text-right">2</td>
								</tr>
			        		</tbody>
			        	</table>
			        </div>
			        <!-- END panel -->
                </div>
                <!-- END col-4 -->
                <!-- BEGIN col-8 -->
				<div class="col-lg-8 col-sm-6">
			        <!-- BEGIN panel -->
					<div class="panel panel-default with-rounded-corner with-shadow">
			        	<!-- BEGIN panel-heading -->
                        <div class="panel-heading">
                        	<div class="switcher switcher-success pull-right">
								<input type="checkbox" name="panel_header_switcher" id="panel_header_switcher" checked="">
								<label for="panel_header_switcher"></label>
							</div>
                            <h4 class="panel-title">
                            	REAL-TIME MONITORING
                            </h4>
							<p class="desc m-b-xs">
								This is where you monitor user activity as it happens on your site.
							</p>
                        </div>
			        	<!-- END panel-heading -->
			        	<!-- BEGIN panel-body -->
                        <div class="panel-body">
							<div style="height: 15rem">
								<canvas id="page-view-chart"></canvas>
							</div>
						</div>
			        	<!-- END panel-body -->
					</div>
			        <!-- END panel -->
			        <!-- BEGIN panel -->
					<div class="panel panel-default with-rounded-corner with-shadow">
			        	<!-- BEGIN panel-heading -->
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            	<div class="dropdown dropdown-icon">
                                	<a href="javascript:;" class="btn" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                	<ul class="dropdown-menu dropdown-menu-right">
                            			<li><a href="#">Today</a></li>
                                		<li><a href="#">Yesterday</a></li>
                                		<li class="active"><a href="#">Last 7 days</a></li>
                                		<li><a href="#">Last 28 days</a></li>
                                	</ul>
                                </div>
                            </div>
                            <h4 class="panel-title">
                            	TOP ACTIVE PAGES
                            </h4>
                        </div>
			        	<!-- END panel-heading -->
			        	<!-- BEGIN table-responsive -->
			        	<div class="table-responsive">
							<table class="table table-panel table-condensed table-striped table-bordered table-th-without-border">
								<thead>
									<tr>
										<th width="1%"></th>
										<th>Active Page</th>
										<th width="15%" colspan="2" class="text-center text-nowrap">Active Users</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td><a href="#">/cloud-boss/index</a></td>
										<td data-col="value" width="1%">12</td>
										<td data-col="percent">25.00%</td>
									</tr>
									<tr>
										<td>2.</td>
										<td><a href="#">/qs1023.asp</a></td>
										<td data-col="value">10</td>
										<td data-col="percent">20.00%</td>
									</tr>
									<tr>
										<td>3.</td>
										<td><a href="#">/search?key=mobile</a></td>
										<td data-col="value">8</td>
										<td data-col="percent">18.00%</td>
									</tr>
									<tr>
										<td>4.</td>
										<td><a href="#">/items/94092</a></td>
										<td data-col="value">5</td>
										<td data-col="percent">11.11%</td>
									</tr>
									<tr>
										<td>5.</td>
										<td><a href="#">/items/93011</a></td>
										<td data-col="value">5</td>
										<td data-col="percent">11.11%</td>
									</tr>
									<tr>
										<td>6.</td>
										<td><a href="#">/home</a></td>
										<td data-col="value">4</td>
										<td data-col="percent">10.00%</td>
									</tr>
									<tr>
										<td>7.</td>
										<td><a href="#">/track</a></td>
										<td data-col="value">2</td>
										<td data-col="percent">3.00%</td>
									</tr>
								</tbody>
							</table>
			        	</div>
			        	<!-- END table-responsive -->
                    </div>
                    <!-- END panel -->
                    <!-- BEGIN panel -->
					<div class="panel panel-default with-rounded-corner with-shadow">
			        	<!-- BEGIN panel-heading -->
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                            	<div class="dropdown dropdown-icon">
                                	<a href="javascript:;" class="btn" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                	<ul class="dropdown-menu dropdown-menu-right">
                            			<li><a href="#">Today</a></li>
                                		<li><a href="#">Yesterday</a></li>
                                		<li class="active"><a href="#">Last 7 days</a></li>
                                		<li><a href="#">Last 28 days</a></li>
                                	</ul>
                                </div>
                            </div>
                            <h4 class="panel-title">
                            	TOP LOCATIONS
                            </h4>
                        </div>
			        	<!-- END panel-heading -->
			        	<div id="world-map" style="height: 20rem"></div>
			        </div>
                    <!-- END panel -->
				</div>
				<!-- END col-8 -->
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
	<script src="assets/plugins/map/jquery-jvectormap/jquery-jvectormap.min.js"></script>
	<script src="assets/plugins/map/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/js/page/analytics.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			Analytics.init();
		});
	</script>
	
  	<?php require_once("scripts/inc.core.framework.php");?>
  	<?php require_once("scripts/inc.core.noty.php");?>
</body>
</html>