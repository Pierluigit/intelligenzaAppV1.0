<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: App Settings
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
$page = "app_admin_appSettings";
//////////////////////////////////////////
//////////////////////////////////////////
// load core intelligenza
require_once("scripts/inc.core.intelligenza.php");
// recup values settings
require_once("scripts/inc.core.get.valueAppSettings.php");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo($_SESSION['language']);?>">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo($app_nameProject);?> | App Settings</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("scripts/cp/inc.template_head.php");?>
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE CSS STYLE ================== -->
	<link href="assets/plugins/form/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" />
	<link href="assets/plugins/form/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
	<link href="assets/plugins/form/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
	<link href="assets/plugins/form/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
	<link href="assets/plugins/form/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
	<link href="assets/plugins/form/bootstrap-slider/css/bootstrap-slider.css" rel="stylesheet" />
	<!-- ================== BEGIN PAGE CSS STYLE ================== -->
	
	<!-- ================== EXTRA CSS STYLE ================== -->
	<link href="assets/plugins/form/bootstrap-slider/css/bootstrap-slider.css" rel="stylesheet" />
	<link href="../css/php_file_tree/styles.css" rel="stylesheet" type="text/css" media="screen" />
	<style>
		
		/*.yui-h-slider,.yui-v-slider{position:relative;}.yui-h-slider .yui-slider-thumb,.yui-v-slider .yui-slider-thumb{position:absolute;cursor:default;}.yui-skin-sam .yui-h-slider{background:url(img/bg-h.gif) no-repeat 5px 0;height:28px;width:228px;}.yui-skin-sam .yui-h-slider .yui-slider-thumb{top:4px;}.yui-skin-sam .yui-v-slider{background:url(img/bg-v.gif) no-repeat 12px 0;height:228px;width:48px;}*/
		
		.php-file-tree A {
		color: #ffffff;
		text-decoration: none;
		}

		.php-file-tree A:hover {
			color: #777777;
		}
		
		
	</style>
	
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
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active">App Settings</li>
			</ul>
			<!-- END breadcrumb -->
			<!-- BEGIN page-header -->
		  	<h1 class="page-header">
				App Settings <small>intelligenza of the App</small>
			</h1>
			<!--<a href="?" title="Refresh"><img src="../img/metal-gear.png" width="111" height="111" alt=""/></a>-->
			<!-- END page-header -->
			
			
			<!-- BEGIN setting-list -->
			<ul class="setting-list">
				<li class="setting-title bg-theme">DEBUG MODE</li>
				<li>
					<div class="field">PHP init, Geoloc, Platforme...<br>
						<span class="text-muted" style="font-size: 8px;">Popup appear if isset Get value ?debug </span>
					</div>
					<div class="value">
						<?php if(!isset($_GET['debug'])) {?>
						<a href="?debug"><button type="text" class="btn btn-primary btn-sm">Active Debug Mode</button></a>
						<?php }else {?>
						<a href="?"><button type="text" class="btn btn-warning btn-sm">Close Debug Mode</button></a>
						<?php }?>
					</div>
					<div class="action">
					  
					</div>
				</li>
				<li class="setting-title bg-theme">SETTINGS</li>
				<li>
					<div class="field">
						Statut
						<?php 
						if(($set_activeDbSettings=="yes") && ($okCanUseDynamicSettings==true)) {?>
						Dynamic
						<?php }else {?>
						Manual
						<?php }?>
						<br>
						<span class="text-muted" style="font-size: 8px;">/admin/scripts/inc.settings.php</span>
					</div>
					<div class="value">
						<?php if($okCanUseDynamicSettings==true) {?>
							<div class="switcher switcher-success">
							<input type="checkbox" name="activeDbSettings" id="activeDbSettings" onChange="rec_fieldSettings('activeDbSettings');" <?php if($set_activeDbSettings=="yes") {?>checked<?php }?> />
							<label for="activeDbSettings"></label>
							</div>
							<!--<a href="?"><button type="text" class="btn btn-success btn-sm btn-block">Refresh Changes</button></a>-->
						
						<?php }else {?>
					  <a href="?"><button type="text" class="btn btn-warning btn-block">Check the minimum settings to switch in dynamic</button></a>
						<?php }?>
						<?php 
						if(($set_activeDbSettings=="yes") && ($okCanUseDynamicSettings==true)) {?>
						
						<?php }else {?>
						<img src="../img/error.png" width="24" height="24" alt=""/><br>Minimum Config!
						<?php }?>
					</div>
					<div class="action">
					  
					</div>
				</li>
				
				
				<li class="setting-title bg-theme"><?php 
						if(($set_activeDbSettings=="yes") && ($okCanUseDynamicSettings==true)) {?>
						DYNAMIC
						<?php }else {?>
						MANUAL
						<?php }?> MODE</li> 
			</ul> 
			<br>
			
			<!-- BEGIN nav-tabs -->
			<ul class="nav nav-tabs" id="nav-tabs">
				<li class="nav-item"><a href="#root" onClick="statutMenuAdmin('root');" class="nav-link <?php if($_SESSION['statutMenuAdmin']=="root") {?>active<?php }?>" data-toggle="tab">Root</a></li>
				
				<li class="nav-item"><a href="#project" onClick="statutMenuAdmin('project');" class="nav-link <?php if($_SESSION['statutMenuAdmin']=="project") {?>active<?php }?>" data-toggle="tab">Project</a></li>
				
				<?php if($set_activeDbSettings=="yes") {?>
				<li class="nav-item"><a href="#option" onClick="statutMenuAdmin('option');" class="nav-link <?php if($_SESSION['statutMenuAdmin']=="option") {?>active<?php }?>" data-toggle="tab">Option</a></li>
				<!--<li class="nav-item"><a href="#nav" class="nav-link" data-toggle="tab">Nav</a></li>-->
				
				<li class="nav-item"><a href="#members" onClick="statutMenuAdmin('members');" class="nav-link <?php if($_SESSION['statutMenuAdmin']=="members") {?>active<?php }?>" data-toggle="tab">Members</a></li>
				<li class="nav-item"><a href="#styles" onClick="statutMenuAdmin('styles');" class="nav-link <?php if($_SESSION['statutMenuAdmin']=="styles") {?>active<?php }?>" data-toggle="tab">Styles</a></li>
				<li class="nav-item"><a href="#sounds" onClick="statutMenuAdmin('sounds');" class="nav-link <?php if($_SESSION['statutMenuAdmin']=="sounds") {?>active<?php }?>" data-toggle="tab">Sounds</a></li>
				<li class="nav-item"><a href="#psp" onClick="statutMenuAdmin('psp');" class="nav-link <?php if($_SESSION['statutMenuAdmin']=="psp") {?>active<?php }?>" data-toggle="tab">PSP</a></li>
				<li class="nav-item"><a href="#cron" onClick="statutMenuAdmin('cron');" class="nav-link <?php if($_SESSION['statutMenuAdmin']=="cron") {?>active<?php }?>" data-toggle="tab">Cron Tasks</a></li>
				<?php }?>
				<li class="nav-item dropdown">
					<a href="#" class="dropdown-toggle nav-link <?php if(($_SESSION['statutMenuAdmin']=="dropdown1") || ($_SESSION['statutMenuAdmin']=="dropdown2")) {?>active<?php }?>" data-toggle="dropdown">
						Support <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#dropdown1" onClick="statutMenuAdmin('dropdown1');" data-toggle="tab">@fat</a></li>
						<li><a href="#dropdown2" onClick="statutMenuAdmin('dropdown2');" data-toggle="tab">@mdo</a></li>
					</ul> 
				</li>
			</ul>
			<!-- END nav-tabs -->
			<!-- BEGIN tab-content -->
			<div class="tab-content tab-content-bordered">
				
				<!-- BEGIN tab-pane -->
				<div class="tab-pane fade <?php if($_SESSION['statutMenuAdmin']=='root') {?>active in<?php }?>" id="root">
					<ul class="setting-list">
						<li class="setting-title bg-theme">Lecture seule, Content Root Template Alpha</li>
					</ul>
					<p>
						
						<div class="bgBox_" id="fileTree_">
							<?php if(!isset($_GET['fileTree'])) {?>
							<a href="?fileTree=1"><button type="text" class="btn btn-primary btn-sm">Show File Tree</button></a>
							<?php }?>
						<?php
							if(isset($_GET['fileTree'])) {?>
								<a href="?"><button type="text" class="btn btn-primary btn-sm">Mask File Tree</button></a><br><br>
							<?php
							echo php_file_tree("../", "javascript:return;");// [link]
							 }
						?>
						</div>
					</p>
				</div>
				<!-- BEGIN tab-pane -->
				<div class="tab-pane fade <?php if($_SESSION['statutMenuAdmin']=="project") {?>active in<?php }?>" id="project">
					<p>
						<!-- BEGIN setting-list -->
						<ul class="setting-list">
							<li class="setting-title bg-theme">WHERE IS THE APP?</li>
							<li>
								<div class="field"><span class="green"><?php if($ifLocalApp!="yes") {?>Online<?php }else {?>Local<?php }?> </span><br>
									<span class="text-muted" style="font-size: 8px;">Local or Online project</span>
								</div>
								<div class="value">
									This parameter has to be set manualy in the file "admin/scripts/<b>inc.core.connectDB.php</b>"<br>
									Although by default it's set online you can also work in local and without internet<br>
									You have to define if it's a local or online project!
								</div>
								<div class="action">
									<span id="confirm_nameProject"></span>
								</div>
							</li>
							<br>
							
							<li class="setting-title bg-theme"><span class="text-danger">*</span> MINIMUM SETTINGS FOR ACTIVE DYNAMIC MODE</li>
							<!--<li>
								<div class="field">If Local Site <span class="red">* doesn't work yet</span><br>
									<span class="text-muted" style="font-size: 8px;">Where is the app, default online</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifLocalSite" id="ifLocalSite" onChange="rec_fieldSettings('ifLocalSite');" <?php //if($set_ifLocalSite=="yes") {?>checked<?php //}?> />
								<label for="ifLocalSite"></label>
								</div>
								</div>
								<div class="action">
									<span id="confirm_ifLocalSite"></span>
								</div>
							</li>-->
							<li>
								<div class="field"><?php if($set_nameProject=="") {?><span class="warning">Name</span><?php }else {?>Name<?php }?> <span class="text-danger">*</span><br>
									<span class="text-muted" style="font-size: 8px;">Your Brand</span>
								</div>
								<div class="value">
									<input tabindex="1" class="form-control" name="nameProject" id="nameProject" onKeyUp="rec_fieldSettings('nameProject');" onChange="rec_fieldSettings('nameProject');" onBlur="rec_fieldSettings('nameProject');" type="text" value="<?php echo($set_nameProject);?>" placeholder="Name" maxlength="64">
								</div>
								<div class="action">
									<span id="confirm_nameProject"></span>
								</div>
							</li>
							<li>
								<div class="field"><?php if($okEmailContactProject==false) {?><span class="warning">Contact Email</span><?php }else {?>Contact Email<?php }?> <span class="text-danger">*</span><br>
									<span class="text-muted" style="font-size: 8px;">Contact, Footer...</span>
								</div>
								<div class="value">
								<input tabindex="2" class="form-control" name="emailContactProject" id="emailContactProject" onKeyUp="rec_fieldSettings('emailContactProject');" onChange="rec_fieldSettings('emailContactProject');" onBlur="rec_fieldSettings('emailContactProject');" type="email" value="<?php echo($set_emailContactProject);?>" placeholder="Email" maxlength="64">
								</div>
								<div class="action">
									<span id="confirm_emailContactProject"></span>
								</div>
							</li>
							<li>
								<div class="field"><?php if($okEmailContactProject==false) {?><span class="warning">Contact Email</span><?php }else {?>Email Communication<?php }?> <span class="text-danger">*</span><br>
									<span class="text-muted" style="font-size: 8px;">Appear Only in the Email</span>
								</div>
								<div class="value">
								<input tabindex="2" class="form-control" name="emailComEmailProject" id="emailComEmailProject" onKeyUp="rec_fieldSettings('emailComEmailProject');" onChange="rec_fieldSettings('emailComEmailProject');" onBlur="rec_fieldSettings('emailComEmailProject');" type="email" value="<?php echo($set_emailComEmailProject);?>" placeholder="Email" maxlength="64">
								</div>
								<div class="action">
									<span id="confirm_emailComEmailProject"></span>
								</div>
							</li>
							<li>
								<div class="field"><?php if($set_urlRoot=="") {?><span class="warning">Url Root</span><?php }else {?>Url Root<?php }?> <span class="text-danger">*</span><br> 
								  <span class="orange"><i class="fas fa-exclamation-triangle"></i> if wrong it will bug</span>
									<span class="text-muted" style="font-size: 8px;">Header css, framework functions...</span>
								</div>
								<div class="value">
								<input tabindex="2" class="form-control" name="urlRoot" id="urlRoot" onKeyUp="rec_fieldSettings('urlRoot');" onChange="rec_fieldSettings('urlRoot');" onBlur="rec_fieldSettings('urlRoot');" type="text" value="<?php echo($set_urlRoot);?>" placeholder="Absolute url project with protocole " maxlength="64">
								</div>
								<div class="action">
									<span id="confirm_urlRoot"></span>
								</div>
							</li>
							
							<br>
							<li class="setting-title bg-theme">COMING SOON PAGE</li>
							
							<li>
								<div class="field">Coming Soon Page Only<br>
									<span class="text-muted" style="font-size: 8px;">Only Coming Soon and Connect pages</span>
								</div>
								<div class="value">
								<div class="switcher switcher-danger">
								<input type="checkbox" name="ifLimitToComingSoon" id="ifLimitToComingSoon" onChange="rec_fieldSettings('ifLimitToComingSoon');" <?php if($set_ifLimitToComingSoon=="yes") {?>checked<?php }?> />
								<label for="ifLimitToComingSoon"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifLimitToComingSoon"></span>
								</div>
							</li>
							<li>
								<div class="field">Date Count Down<br>
									<span class="text-muted" style="font-size: 8px;">Target date deadline (minus one month)</span>
								</div>
								<div class="value">
								<input tabindex="2" class="form-control" name="dateCountDownProject" id="dateCountDownProject" onKeyUp="rec_fieldSettings('dateCountDownProject');" onChange="rec_fieldSettings('dateCountDownProject');" onBlur="rec_fieldSettings('dateCountDownProject');" type="text" value="<?php echo($set_dateCountDownProject);?>"  placeholder="yyyy, mm, dd" maxlength="10">
								</div>
								<div class="action">
									<span id="confirm_dateCountDownProject"></span>
								</div>
							</li>
							<li>
								<div class="field">Until or Since<br>
									<span class="text-muted" style="font-size: 8px;">Type countdown</span>
								</div>
								<div class="value">
								<select tabindex="5" class="form-control m-b-10 input-sm" name="sinceOrUntilCountDownProject" id="sinceOrUntilCountDownProject" onChange="rec_fieldSettings('sinceOrUntilCountDownProject');" onBlur="rec_fieldSettings('sinceOrUntilCountDownProject');" style="width: 177px">
									<?php if($set_sinceOrUntilCountDownProject!="") {?>
									<option><?php echo($set_sinceOrUntilCountDownProject);?></option>
									<?php }?>
									<option value=""></option>
									<?php if($set_sinceOrUntilCountDownProject=="") {?>
										<option value="until">until</option>
										<option value="since">since</option>
									<?php }else {?>
										<?php if($set_sinceOrUntilCountDownProject!="until") {?><option value="until">until</option><?php }?>
										<?php if($set_sinceOrUntilCountDownProject!="since") {?><option value="since">since</option><?php }?>
									<?php }?>
								</select>
								</div>
								<div class="action">
									<span id="confirm_sinceOrUntilCountDownProject"></span>
								</div>
							</li>
							<br>
							<li class="setting-title bg-theme">CONNECTION</li>
							<li>
								<div class="field">Connect Remember Me<br>
									<span class="text-muted" style="font-size: 8px;">How long I remember you? 24h by default</span>
								</div>
								<div class="value">
									<select tabindex="5" class="form-control m-b-10 input-sm" name="timeRememberMe" id="timeRememberMe" onChange="rec_fieldSettings('timeRememberMe');" onBlur="rec_fieldSettings('timeRememberMe');" style="width: 177px">
										<?php 
										// format time 
										if($set_timeRememberMe!="") {
											if($set_timeRememberMe=="1800") { $set_timeRememberMeF = "30min";}
											if($set_timeRememberMe=="3600") { $set_timeRememberMeF = "1h";}
											if($set_timeRememberMe=="7200") { $set_timeRememberMeF = "2h";}
											if($set_timeRememberMe=="18000") { $set_timeRememberMeF = "5h";}
											if($set_timeRememberMe=="36000") { $set_timeRememberMeF = "10h";}
											if($set_timeRememberMe=="86400") { $set_timeRememberMeF = "24h";}
										}
										if($set_timeRememberMe!="") {?><option value="<?php echo($set_timeRememberMe);?>"><?php echo($set_timeRememberMeF);?></option><?php }?>
										<option value=""></option>
										<option value="1800">30min</option>
										<option value="3600">1h</option>
										<option value="7200">2h</option>
										<option value="18000">5h</option>
										<option value="36000">10h</option>
										<option value="86400">24h</option>
									</select>
								</div>
								<div class="action">
								  <span id="confirm_timeRememberMe"></span>
								</div>
							</li>
							<li>
								<div class="field">Min Connection Time<br>
									<span class="text-muted" style="font-size: 8px;">Time without activities exceeded!</span>
								</div>
								<div class="value">
									<select tabindex="5" class="form-control m-b-10 input-sm" name="timeConnection" id="timeConnection" onChange="rec_fieldSettings('timeConnection');" onBlur="rec_fieldSettings('timeConnection');" style="width: 177px">
										<?php 
										// format time 
										if($set_timeConnection!="") {
											if($set_timeConnection=="120") { $set_timeConnectionF = "2min";}
											if($set_timeConnection=="300") { $set_timeConnectionF = "5min";}
											if($set_timeConnection=="600") { $set_timeConnectionF = "10min";}
											if($set_timeConnection=="1200") { $set_timeConnectionF = "20min";}
											if($set_timeConnection=="1800") { $set_timeConnectionF = "30min";}
										}
										if($set_timeConnection!="") {?><option value="<?php echo($set_timeConnection);?>"><?php echo($set_timeConnectionF);?></option><?php }?>
										<option value=""></option>
										<option value="120">2min</option>
										<option value="300">5min</option>
										<option value="600">10min</option>
										<option value="1200">20min</option>
										<option value="1800">30min</option>
									</select>
								</div>
								<div class="action">
								  <span id="confirm_timeConnection"></span>
								</div>
							</li>
							
							
							<li>
								<div class="field">Active Double Authentication<br>
									<span class="text-muted" style="font-size: 8px;">User receive an email code to login</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifDoubleAuthentification" id="ifDoubleAuthentification" onChange="rec_fieldSettings('ifDoubleAuthentification');" <?php if($set_ifDoubleAuthentification=="yes") {?>checked<?php }?> />
								<label for="ifDoubleAuthentification"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifDoubleAuthentification"></span>
								</div>
							</li>
							<li>
								<div class="field">Limit Process Time<br>
									<span class="text-muted" style="font-size: 8px;">Double Auth and Lostpass</span>
								</div>
								<div class="value">
									<select tabindex="5" class="form-control m-b-10 input-sm" name="limitTimeProcessDoubleAndLost" id="limitTimeProcessDoubleAndLost" onChange="rec_fieldSettings('limitTimeProcessDoubleAndLost');" onBlur="rec_fieldSettings('limitTimeProcessDoubleAndLost');" style="width: 177px">
										<?php 
										// format time 
										if($set_limitTimeProcessDoubleAndLost!="") {
											if($set_limitTimeProcessDoubleAndLost=="60") { $set_limitTimeProcessDoubleAndLostF = "1min";}
											if($set_limitTimeProcessDoubleAndLost=="120") { $set_limitTimeProcessDoubleAndLostF = "2min";}
											if($set_limitTimeProcessDoubleAndLost=="180") { $set_limitTimeProcessDoubleAndLostF = "3min";}
											if($set_limitTimeProcessDoubleAndLost=="240") { $set_limitTimeProcessDoubleAndLostF = "4min";}
											if($set_limitTimeProcessDoubleAndLost=="300") { $set_limitTimeProcessDoubleAndLostF = "5min";}
										}
										if($set_limitTimeProcessDoubleAndLost!="") {?><option value="<?php echo($set_limitTimeProcessDoubleAndLost);?>"><?php echo($set_limitTimeProcessDoubleAndLostF);?></option><?php }?>
										<option value=""></option>
										<option value="60">1min</option>
										<option value="120">2min</option>
										<option value="180">3min</option>
										<option value="240">4min</option>
										<option value="300">5min</option>
									</select>
								</div>
								<div class="action">
								  <span id="confirm_limitTimeProcessDoubleAndLost"></span>
								</div>
							</li>
							<li>
								<div class="field">Limit Time Blacklist<br>
									<span class="text-muted" style="font-size: 8px;">How long is he in the sand box!</span>
								</div>
								<div class="value">
									<select tabindex="5" class="form-control m-b-10 input-sm" name="limitTimeBlackList" id="limitTimeBlackList" onChange="rec_fieldSettings('limitTimeBlackList');" onBlur="rec_fieldSettings('limitTimeBlackList');" style="width: 177px">
										<?php 
										// format time 
										if($set_limitTimeBlackList!="") {
											if($set_limitTimeBlackList=="21600") { $set_limitTimeBlackListF = "6h";}
											if($set_limitTimeBlackList=="43200") { $set_limitTimeBlackListF = "12h";}
											if($set_limitTimeBlackList=="86400") { $set_limitTimeBlackListF = "24h";}
											if($set_limitTimeBlackList=="604800") { $set_limitTimeBlackListF = "one week";}
											if($set_limitTimeBlackList=="2419200") { $set_limitTimeBlackListF = "one month";}
										}
										if($set_limitTimeBlackList!="") {?><option value="<?php echo($set_limitTimeBlackList);?>"><?php echo($set_limitTimeBlackListF);?></option><?php }?>
										<option value="86400"></option>
										<option value="21600">6h</option>
										<option value="43200">12h</option>
										<option value="86400">24h</option>
										<option value="604800">one week</option>
										<option value="2419200">one month</option>
									</select>
								</div>
								<div class="action">
								  <span id="confirm_limitTimeBlackList"></span>
								</div>
							</li>
							
							
							
							<li>
								<div class="field">Demand Secure Password<br>
									<span class="text-muted" style="font-size: 8px;">User has to use a secure password to login</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifDemandSecurePassword" id="ifDemandSecurePassword" onChange="rec_fieldSettings('ifDemandSecurePassword');" <?php if($set_ifDemandSecurePassword=="yes") {?>checked<?php }?> />
								<label for="ifDemandSecurePassword"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifDemandSecurePassword"></span>
								</div>
							</li>
							<li>
								<div class="field">Demand Secure Email<br>
									<span class="text-muted" style="font-size: 8px;">User has to use a crypted webmail</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifDemandSecureEmail" id="ifDemandSecureEmail" onChange="rec_fieldSettings('ifDemandSecureEmail');" <?php if($set_ifDemandSecureEmail=="yes") {?>checked<?php }?> />
								<label for="ifDemandSecureEmail"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifDemandSecureEmail"></span>
								</div>
							</li>
							<li>
								<div class="field">Secure WebMail<br>
									<span class="text-muted" style="font-size: 8px;">Webmail crypted domain name separate with slash /</span>
								</div>
								<div class="value">
									<input tabindex="2" class="form-control" name="secureWebMail" id="secureWebMail" onKeyUp="rec_fieldSettings('secureWebMail');" onChange="rec_fieldSettings('secureWebMail');" onBlur="rec_fieldSettings('secureWebMail');" type="text" value="<?php echo($set_secureWebMail);?>" maxlength="255">
								</div>
								<div class="action">
								  <span id="confirm_secureWebMail"></span>
								</div>
							</li>
							<br>
						</ul>
					</p>
				</div>
				<!-- END tab-pane -->
				<!-- BEGIN tab-pane -->
				<div class="tab-pane fade <?php if($_SESSION['statutMenuAdmin']=="option") {?>active in<?php }?>" id="option">
					<p>
						<!-- BEGIN setting-list -->
						<ul class="setting-list">
							 
							
							<li class="setting-title bg-theme">FILES SHARING</li>
							<li>
								<div class="field">Active Sharing<br>
									<span class="text-muted" style="font-size: 8px;">Members can share files each other</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifSharingFolder" id="ifSharingFolder" onChange="rec_fieldSettings('ifSharingFolder');" <?php if($set_ifSharingFolder=="yes") {?>checked<?php }?> />
								<label for="ifSharingFolder"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifSharingFolder"></span>
								</div>
							</li>
							<li>
								<div class="field">Space Limit in MB<br>
									<span class="text-muted" style="font-size: 8px;">Limit size of public space</span>
								</div>
								<div class="value">
									<input tabindex="" class="form-control" name="limitSizePublicFolder" id="limitSizePublicFolder" onKeyUp="rec_fieldSettings('limitSizePublicFolder');" onChange="rec_fieldSettings('limitSizePublicFolder');" onBlur="rec_fieldSettings('limitSizePublicFolder');" type="number" value="<?php echo($set_limitSizePublicFolder);?>" min="100" max="10000" maxlength="5" style="width: 77px">
								</div>
								<div class="action">
									<span id="confirm_limitSizePublicFolder"></span>
								</div>
							</li>
							<br>
							<li class="setting-title bg-theme">GATHERING PLACE</li>
							<li>
								<div class="field">Active Gathering<br>
									<span class="text-muted" style="font-size: 8px;">Public profiles, events, labels, products...</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifGathering" id="ifGathering" onChange="rec_fieldSettings('ifGathering');" <?php if($set_ifGathering=="yes") {?>checked<?php }?> />
								<label for="ifGathering"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifGathering"></span>
								</div>
							</li>
							
							
							<br>
							<li class="setting-title bg-theme">OTHERS</li>
							<li>
								<div class="field">Use App Only<br>
									<span class="text-muted" style="font-size: 8px;">Front End Disabled</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifOnlyApp" id="ifOnlyApp" onChange="rec_fieldSettings('ifOnlyApp');" <?php if($set_ifOnlyUseApp=="yes") {?>checked<?php }?> />
								<label for="ifOnlyApp"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifOnlyApp"></span>
								</div>
							</li>
							<li>
								<div class="field">Active Accept Cookies<br>
									<span class="text-muted" style="font-size: 8px;">User has to accept use of cookies</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifActiveAcceptCookies" id="ifActiveAcceptCookies" onChange="rec_fieldSettings('ifActiveAcceptCookies');" <?php if($set_ifActiveAcceptCookies=="yes") {?>checked<?php }?> />
								<label for="ifActiveAcceptCookies"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifActiveAcceptCookies"></span>
								</div>
							</li>
							
							
							<li>
								<div class="field">Block Right Clic and Selection<br>
									<span class="text-muted" style="font-size: 8px;">User can't select and use contextual menu</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifLookSelectAndRightClic" id="ifLookSelectAndRightClic" onChange="rec_fieldSettings('ifLookSelectAndRightClic');" <?php if($set_ifLookSelectAndRightClic=="yes") {?>checked<?php }?> />
								<label for="ifLookSelectAndRightClic"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifLookSelectAndRightClic"></span>
								</div>
							</li>
						</ul>
					</p>
				</div>
				<!-- END tab-pane -->
				<!-- BEGIN tab-pane -->
				<!--<div class="tab-pane fade" id="nav">
					<p>
						<!-- BEGIN setting-list -_->
						<ul class="setting-list">
							
							<br>
						</ul>
					</p>
				</div>-->
				<!-- BEGIN tab-pane -->
				<div class="tab-pane fade <?php if($_SESSION['statutMenuAdmin']=="members") {?>active in<?php }?>" id="members">
					<p>
						<!-- BEGIN setting-list -->
						<ul class="setting-list">
							<li class="setting-title bg-theme">ACCESS</li>
							<li>
								<div class="field">Limit Access to Members<br>
									<span class="text-muted" style="font-size: 8px;">Only admin can login (kill all session)</span>
								</div>
								<div class="value">
								<div class="switcher switcher-danger">
								<input type="checkbox" name="ifKillAllSessionBlockLogin" id="ifKillAllSessionBlockLogin" onChange="rec_fieldSettings('ifKillAllSessionBlockLogin');" <?php if($set_ifKillAllSessionBlockLogin=="yes") {?>checked<?php }?> />
								<label for="ifKillAllSessionBlockLogin"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifKillAllSessionBlockLogin"></span>
								</div>
							</li>
							<li>
								<div class="field">Block New Registration<br>
									<span class="text-muted" style="font-size: 8px;">User can't get an ID and sign up</span>
								</div>
								<div class="value">
								<div class="switcher switcher-danger">
								<input type="checkbox" name="ifBlockNewRegistration" id="ifBlockNewRegistration" onChange="rec_fieldSettings('ifBlockNewRegistration');" <?php if($set_ifBlockNewRegistration=="yes") {?>checked<?php }?> />
								<label for="ifBlockNewRegistration"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifBlockNewRegistration"></span>
								</div>
							</li>
							<br>
							<li class="setting-title bg-theme">TARGET</li>
							<li>
								<div class="field">Active Limit Age<br>
									<span class="text-muted" style="font-size: 8px;">UI popup appears and ask for age</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifLimitAge" id="ifLimitAge" onChange="rec_fieldSettings('ifLimitAge');" <?php if($set_ifLimitAge=="yes") {?>checked<?php }?> />
								<label for="ifLimitAge"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifLimitAge"></span>
								</div>
							</li>
							<li id="set_limitAge">
								<div class="field">Age Limit<br>
									<span class="text-muted" style="font-size: 8px;">Limit access Age to your members</span>
								</div>
								<div class="value">
									<input tabindex="4" class="form-control" name="limitAge" id="limitAge" onKeyUp="rec_fieldSettings('limitAge');" onChange="rec_fieldSettings('limitAge');" onBlur="rec_fieldSettings('limitAge');" type="number" value="<?php echo($set_limitAge);?>" min="0" max="222" maxlength="3" style="width: 77px">
								</div>
								<div class="action">
									<span id="confirm_limitAge"></span>
								</div>
							</li>
							<br>
							<li class="setting-title bg-theme">USERS OPTIONS</li>
							<li>
								<div class="field">Active Knowledges<br>
									<span class="text-muted" style="font-size: 8px;">Members can rec all infos he needs...</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifMembersUseKnowledges" id="ifMembersUseKnowledges" onChange="rec_fieldSettings('ifMembersUseKnowledges');" <?php if($set_ifMembersUseKnowledges=="yes") {?>checked<?php }?> />
								<label for="ifMembersUseKnowledges"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifMembersUseKnowledges"></span>
								</div>
							</li>
							<li>
								<div class="field">Active Labels<br>
									<span class="text-muted" style="font-size: 8px;">Members can have labels, products...</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifMembersUseLabel" id="ifMembersUseLabel" onChange="rec_fieldSettings('ifMembersUseLabel');" <?php if($set_ifMembersUseLabel=="yes") {?>checked<?php }?> />
								<label for="ifMembersUseLabel"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifMembersUseLabel"></span>
								</div>
							</li>
							<li>
								<div class="field">Active My Folder<br>
									<span class="text-muted" style="font-size: 8px;">Members can have a little personal space</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifMembersUseMyFolder" id="ifMembersUseMyFolder" onChange="rec_fieldSettings('ifMembersUseMyFolder');" <?php if($set_ifMembersUseMyFolder=="yes") {?>checked<?php }?> />
								<label for="ifMembersUseMyFolder"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifMembersUseMyFolder"></span>
								</div>
							</li>
							<li>
								<div class="field">Space Limit in MB<br>
									<span class="text-muted" style="font-size: 8px;">Limit size of personal space</span>
								</div>
								<div class="value">
									<input tabindex="" class="form-control" name="limitSizeMyFolder" id="limitSizeMyFolder" onKeyUp="rec_fieldSettings('limitSizeMyFolder');" onChange="rec_fieldSettings('limitSizeMyFolder');" onBlur="rec_fieldSettings('limitSizeMyFolder');" type="number" value="<?php echo($set_limitSizeMyFolder);?>" min="100" max="10000" maxlength="5" style="width: 77px">
								</div>
								<div class="action">
									<span id="confirm_limitSizeMyFolder"></span>
								</div>
							</li>
							
							<li>
								<div class="field">Active Wallet<br>
									<span class="text-muted" style="font-size: 8px;">Members can do payments and receive money</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifMembersUseWallet" id="ifMembersUseWallet" onChange="rec_fieldSettings('ifMembersUseWallet');" <?php if($set_ifMembersUseWallet=="yes") {?>checked<?php }?> />
								<label for="ifMembersUseWallet"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifMembersUseWallet"></span>
								</div>
							</li>
							<br>
						</ul>
					</p>
				</div>
				
				
				
				<!-- BEGIN tab-pane -->
				<div class="tab-pane fade <?php if($_SESSION['statutMenuAdmin']=="styles") {?>active in<?php }?>" id="styles">
					<p>
						<!-- BEGIN setting-list -->
						<ul class="setting-list">
							<li class="setting-title bg-theme">LOGO</li>
							<li>
								<div class="field"><br>
									 
								</div>
								<div class="value">
									<span class="text-muted" style="font-size: 8px;">Place it in</span> $app_urlRoot/images/logo/ 
								</div>
								<div class="action">
									
								</div>
							</li>
							
							<li>
								<div class="field"><a href="<?php echo($app_urlRoot);?>/images/logo/<?php echo($set_faviconProject);?>" target="_blank">Favicon</a><br>
									<span class="text-muted" style="font-size: 8px;">Size suggested</span> 180x180
								</div>
								<div class="value">
								<input tabindex="2" class="form-control" name="faviconProject" id="faviconProject" onKeyUp="rec_fieldSettings('faviconProject');" onChange="rec_fieldSettings('faviconProject');" onBlur="rec_fieldSettings('faviconProject');" type="text" value="<?php echo($set_faviconProject);?>" placeholder="File name" maxlength="64">
								</div>
								<div class="action">
									<span id="confirm_faviconProject"></span>
								</div>
							</li>
							<li>
								<div class="field"><a href="<?php echo($app_urlRoot);?>/images/logo/<?php echo($set_logoProject);?>" target="_blank">Logo</a><br>
									<span class="text-muted" style="font-size: 8px;">Size suggested</span> Free
								</div>
								<div class="value">
								<input tabindex="2" class="form-control" name="logoProject" id="logoProject" onKeyUp="rec_fieldSettings('logoProject');" onChange="rec_fieldSettings('logoProject');" onBlur="rec_fieldSettings('logoProject');" type="text" value="<?php echo($set_logoProject);?>" placeholder="File name" maxlength="64">
								</div>
								<div class="action">
									<span id="confirm_logoProject"></span>
								</div>
							</li>
							<li>
								<div class="field"><a href="<?php echo($app_urlRoot);?>/images/logo/<?php echo($set_logoHProject);?>" target="_blank">Logo Horizontal</a><br>
									<span class="text-muted" style="font-size: 8px;">Size suggested</span> Free
								</div>
								<div class="value">
								<input tabindex="2" class="form-control" name="logoHProject" id="logoHProject" onKeyUp="rec_fieldSettings('logoHProject');" onChange="rec_fieldSettings('logoHProject');" onBlur="rec_fieldSettings('logoHProject');" type="text" value="<?php echo($set_logoHProject);?>" placeholder="File name" maxlength="64">
								</div>
								<div class="action">
									<span id="confirm_logoHProject"></span>
								</div>
							</li>
							<li>
								<div class="field"><a href="<?php echo($app_urlRoot);?>/images/logo/<?php echo($set_logoEmailProject);?>" target="_blank">Logo Email</a><br>
									<span class="text-muted" style="font-size: 8px;">Size suggested</span> Free
								</div>
								<div class="value">
								<input tabindex="2" class="form-control" name="logoEmailProject" id="logoEmailProject" onKeyUp="rec_fieldSettings('logoEmailProject');" onChange="rec_fieldSettings('logoEmailProject');" onBlur="rec_fieldSettings('logoEmailProject');" type="text" value="<?php echo($set_logoEmailProject);?>" placeholder="File name" maxlength="64">
								</div>
								<div class="action">
									<span id="confirm_logoEmailProject"></span>
								</div>
							</li>
							<li>
								<div class="field"><a href="<?php echo($app_urlRoot);?>/images/logo/<?php echo($set_logoPdfProject);?>" target="_blank">Logo PDF</a><br>
									<span class="text-muted" style="font-size: 8px;">Size suggested</span> 252x120
								</div>
								<div class="value">
								<input tabindex="2" class="form-control" name="logoPdfProject" id="logoPdfProject" onKeyUp="rec_fieldSettings('logoPdfProject');" onChange="rec_fieldSettings('logoPdfProject');" onBlur="rec_fieldSettings('logoPdfProject');" type="text" value="<?php echo($set_logoPdfProject);?>" placeholder="File name" maxlength="64">
								</div>
								<div class="action">
									<span id="confirm_logoPdfProject"></span>
								</div>
							</li>
							<li>
								<div class="field">Apple-touch-icon<br>
									 
								</div>
								<div class="value">
									<span class="text-muted" style="font-size: 8px;">Place it in</span> $app_urlRoot/images/logo/
								</div>
								<div class="action">
									
								</div>
							</li>
							<br>
							<li class="setting-title bg-theme">LINKS</li>
							
							<li>
								<div class="field">Sources<br>
									 
								</div>
								<div class="value">
									<a href="<?php echo($app_urlRoot);?>/modular/_template_admin/template_html/index.html" target="_blank">Tamplate Admin</a> - <a href="<?php echo($app_urlRoot);?>/modular/_template_admin/documentation/index.html" target="_blank">Documentation</a>
								</div>
								<div class="action">
									
								</div>
							</li>
							<li>
								<div class="field">Links Color<br>
									 
								</div>
								<div class="value">
									<div class="form-group">
										<div data-format="alias" class="input-group colorpicker-component colorpicker-alias">
											<input type="text" value="<?php echo($set_linkColor);?>" name="linkColor" id="linkColor" onKeyUp="rec_fieldSettings('linkColor');" onChange="rec_fieldSettings('linkColor');" onBlur="rec_fieldSettings('linkColor');"  class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
								</div>
								<div class="action">
									<span id="confirm_linkColor"></span>
								</div>
							</li>
							
							
							
							
							<li>
								<div class="field">Links Color Over<br>
								</div>
								<div class="value">
									<div class="form-group">
										<div data-format="alias" class="input-group colorpicker-component colorpicker-alias">
											<input type="text" value="<?php echo($set_linkColorOver);?>" name="linkColorOver" id="linkColorOver" onKeyUp="rec_fieldSettings('linkColorOver');" onChange="rec_fieldSettings('linkColorOver');" onBlur="rec_fieldSettings('linkColorOver');"  class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
								</div>
								<div class="action">
									<span id="confirm_linkColorOver"></span>
								</div>
							</li>
							<li>
								<div class="field">Links Color Active<br>
								</div>
								<div class="value">
									<div class="form-group">
										<div data-format="alias" class="input-group colorpicker-component colorpicker-alias">
											<input type="text" value="<?php echo($set_linkColorActive);?>" name="linkColorActive" id="linkColorActive" onKeyUp="rec_fieldSettings('linkColorActive');" onChange="rec_fieldSettings('linkColorActive');" onBlur="rec_fieldSettings('linkColorActive');"  class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
								</div>
								<div class="action">
									<span id="confirm_linkColorActive"></span>
								</div>
							</li>
							<li>
								<div class="field">Links Color Visited<br>
								</div>
								<div class="value">
									<div class="form-group">
										<div data-format="alias" class="input-group colorpicker-component colorpicker-alias">
											<input type="text" value="<?php echo($set_linkColorVisited);?>" name="linkColorVisited" id="linkColorVisited" onKeyUp="rec_fieldSettings('linkColorVisited');" onChange="rec_fieldSettings('linkColorVisited');" onBlur="rec_fieldSettings('linkColorVisited');"  class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
								</div>
								<div class="action">
									<span id="confirm_linkColorVisited"></span>
								</div>
							</li>
							
							<li class="setting-title bg-theme">SELECTION</li>
							
							<li>
								<div class="field">CSS Background<br>
									 
								</div>
								<div class="value">
									<div class="form-group">
										<div data-format="alias" class="input-group colorpicker-component colorpicker-alias">
											<input type="text" value="<?php echo($set_selectionColorBg);?>" name="selectionColorBg" id="selectionColorBg" onKeyUp="rec_fieldSettings('selectionColorBg');" onChange="rec_fieldSettings('selectionColorBg');" onBlur="rec_fieldSettings('selectionColorBg');"  class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
								</div>
								<div class="action">
									<span id="confirm_selectionColorBg"></span>
								</div>
							</li>
							<li>
								<div class="field">CSS Color<br>
									 
								</div>
								<div class="value">
									<div class="form-group">
										<div data-format="alias" class="input-group colorpicker-component colorpicker-alias">
											<input type="text" value="<?php echo($set_selectionColor);?>" name="selectionColor" id="selectionColor" onKeyUp="rec_fieldSettings('selectionColor');" onChange="rec_fieldSettings('selectionColor');" onBlur="rec_fieldSettings('selectionColor');"  class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
								</div>
								<div class="action">
									<span id="confirm_selectionColor"></span>
								</div>
							</li>
							
							
							
							<li class="setting-title bg-theme">BACKGROUND APP PAGES</li>
							<li>
								<div class="field"><a href="<?php echo($app_urlRoot);?>/images/bg/<?php echo($set_bgProfileHeader);?>" target="_blank">Default Background Profile</a><br>
									<span class="text-muted" style="font-size: 8px;">Size suggested</span> (1920x699)
								</div>
								<div class="value">
								<input tabindex="2" class="form-control" name="bgProfileHeader" id="bgProfileHeader" onKeyUp="rec_fieldSettings('bgProfileHeader');" onChange="rec_fieldSettings('bgProfileHeader');" onBlur="rec_fieldSettings('bgProfileHeader');" type="text" value="<?php echo($set_bgProfileHeader);?>" placeholder="Default profile-cover.jpg" maxlength="64">
								</div>
								<div class="action">
								  <span id="confirm_bgProfileHeader"></span>
								</div>
							</li>
							<li>
								<div class="field"><a href="<?php echo($app_urlRoot);?>/images/bg/<?php echo($set_bgProfileHeader);?>" target="_blank">Default Avatar Profile</a><br>
									<span class="text-muted" style="font-size: 8px;">Size suggested</span> (444x444)
								</div>
								<div class="value">
								<input tabindex="2" class="form-control" name="avatarProfile" id="avatarProfile" onKeyUp="rec_fieldSettings('avatarProfile');" onChange="rec_fieldSettings('avatarProfile');" onBlur="rec_fieldSettings('avatarProfile');" type="text" value="<?php echo($set_avatarProfile);?>" placeholder="Default avatar.png" maxlength="64">
								</div>
								<div class="action">
									<span id="confirm_avatarProfile"></span>
								</div>
							</li>
							<br>
							
						</ul>
					</p>
				</div>

				<!-- BEGIN tab-pane -->
				<div class="tab-pane fade <?php if($_SESSION['statutMenuAdmin']=="sounds") {?>active in<?php }?>" id="sounds">
					<p>
						<!-- BEGIN setting-list -->
						<ul class="setting-list">
							<a href="https://www.intelligenza.pro/alpha/modular/sm/" target="_blank"><img src="../img/sm2.jpg" width="100%" alt=""/></a><br><br>
							<li class="setting-title bg-theme">AUDIO</li>
							<li>
								<div class="field">Active Sounds<br>
									<span class="text-muted" style="font-size: 8px;">Load loops and framework</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifUseAudio" id="ifUseAudio" onChange="rec_fieldSettings('ifUseAudio');" <?php if($set_ifUseAudio=="yes") {?>checked<?php }?> />
								<label for="ifUseAudio"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifUseAudio"></span>
								</div>
							</li>
							
							
							
							<li>
								<div class="field">Default Volume<br>
									<span class="text-muted" style="font-size: 8px;">Limit default volume</span>
								</div>
								<div class="value">
									<input tabindex="4" class="form-control" name="volume" id="volume" onKeyUp="rec_fieldSettings('volume');" onChange="rec_fieldSettings('volume');" onBlur="rec_fieldSettings('limitvolumeAge');" type="number" value="<?php echo($set_volume);?>" min="0" max="100" maxlength="3" style="width: 77px">
								</div>
								<div class="action">
									<span id="confirm_volume"></span>
								</div>
							</li>
							
							
						</ul>
					</p>
				</div>

				<!-- BEGIN tab-pane -->
				<div class="tab-pane fade <?php if($_SESSION['statutMenuAdmin']=="psp") {?>active in<?php }?>" id="psp">
					<p>
						<!-- BEGIN setting-list -->
						<ul class="setting-list">
							<li class="setting-title bg-theme">GET MONEY OLD SCHOOL</li>
							<li>
								<div class="field">Paypal<br>
									<span class="text-muted" style="font-size: 8px;">You can receive payments throught Paypal</span>
								</div>
								<div class="value">
									<input tabindex="2" class="form-control" name="paypal" id="paypal" onKeyUp="rec_fieldSettings('paypal');" onChange="rec_fieldSettings('paypal');" onBlur="rec_fieldSettings('paypal');" type="text" value="<?php echo($set_paypal);?>" placeholder="" maxlength="255">
								</div>
								<div class="action">
								  <span id="confirm_paypal"></span>
								</div>
							</li>
							<br>
							
							<li class="setting-title bg-theme">BANK</li>
							<li>
								<div class="field">IBAN<br>
									<span class="text-muted" style="font-size: 8px;">You can receive payments throught a bank account</span>
								</div>
								<div class="value">
									<input tabindex="2" class="form-control" name="IBAN" id="IBAN" onKeyUp="rec_fieldSettings('IBAN');" onChange="rec_fieldSettings('IBAN');" onBlur="rec_fieldSettings('IBAN');" type="text" value="<?php echo($set_IBAN);?>" placeholder="" maxlength="255">
								</div>
								<div class="action">
								  <span id="confirm_IBAN"></span>
								</div>
							</li>
							<li>
								<div class="field">BIC<br>
									<span class="text-muted" style="font-size: 8px;">To foreign payments</span>
								</div>
								<div class="value">
									<input tabindex="2" class="form-control" name="BIC" id="BIC" onKeyUp="rec_fieldSettings('BIC');" onChange="rec_fieldSettings('BIC');" onBlur="rec_fieldSettings('BIC');" type="text" value="<?php echo($set_BIC);?>" placeholder="" maxlength="64">
								</div>
								<div class="action">
								  <span id="confirm_BIC"></span>
								</div>
							</li>
							<br>
							
							<li class="setting-title bg-theme">PAYMENT SYSTEM PROVIDER</li>
							<li>
								<div class="field">Active PSP<br>
									<span class="text-muted" style="font-size: 8px;">You can receive payments</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifActivePsp" id="ifActivePsp" onChange="rec_fieldSettings('ifActivePsp');" <?php if($set_ifActivePsp=="yes") {?>checked<?php }?> />
								<label for="ifActivePsp"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifActivePsp"></span>
								</div>
							</li>
							<br>
						</ul>
						
						<ul class="setting-list">
							<li class="setting-title bg-theme ">CONFIG PSP</li>
							<li class="" <?php if($set_ifActivePsp!="yes") {?><?php }?>>
								<div class="field">Production Mode<br>
									<span class="text-muted" style="font-size: 8px;">Sandbox or Prod.</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="productionMode" id="productionMode" onChange="rec_fieldPsp('productionMode');" <?php if($set_psp_productionMode=="yes") {?>checked<?php }?> />
								<label for="productionMode"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_productionMode"></span>
								</div>
							</li>
							<li>
								<div class="field">ID PSP<br>
									<span class="text-muted" style="font-size: 8px;">ID of your PSP</span>
								</div>
								<div class="value">
								<input tabindex="" class="form-control" name="pspId" id="pspId" onKeyUp="rec_fieldPsp('pspId');" onChange="rec_fieldPsp('pspId');" onBlur="rec_fieldPsp('pspId');" type="text" value="<?php echo($set_psp_pspId);?>"  maxlength="255">
								</div>
								<div class="action">
									<span id="confirm_pspId"></span>
								</div>
							</li>
							<li>
								<div class="field">SHA IN Key<br>
									<span class="text-muted" style="font-size: 8px;">SHA IN</span>
								</div>
								<div class="value">
								<input tabindex="" class="form-control" name="shaIn" id="shaIn" onKeyUp="rec_fieldPsp('shaIn');" onChange="rec_fieldPsp('shaIn');" onBlur="rec_fieldPsp('shaIn');" type="text" value="<?php echo($set_psp_shaIn);?>"  maxlength="255">
								</div>
								<div class="action">
									<span id="confirm_shaIn"></span>
								</div>
							</li>
							<li>
								<div class="field">SHA OUT Key<br>
									<span class="text-muted" style="font-size: 8px;">SHA OUT</span>
								</div>
								<div class="value">
								<input tabindex="" class="form-control" name="shaOut" id="shaOut" onKeyUp="rec_fieldPsp('shaOut');" onChange="rec_fieldPsp('shaOut');" onBlur="rec_fieldPsp('shaOut');" type="text" value="<?php echo($set_psp_shaOut);?>"  maxlength="255">
								</div>
								<div class="action">
									<span id="confirm_shaOut"></span>
								</div>
							</li>
							<li>
								<div class="field">If use URL Back<br>
									<span class="text-muted" style="font-size: 8px;">Other it's by default domaine</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="ifUrlBack" id="ifUrlBack" onChange="rec_fieldPsp('ifUrlBack');" <?php if($set_psp_ifUrlBack=="yes") {?>checked<?php }?> />
								<label for="ifUrlBack"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_ifUrlBack"></span>
								</div>
							</li>
							<li>
								<div class="field">Back URL Ok<br>
									<span class="text-muted" style="font-size: 8px;">Transaction ok</span>
								</div>
								<div class="value">
								<input tabindex="" class="form-control" name="urlOk" id="urlOk" onKeyUp="rec_fieldPsp('urlOk');" onChange="rec_fieldPsp('urlOk');" onBlur="rec_fieldPsp('urlOk');" type="text" value="<?php echo($set_psp_urlOk);?>"  maxlength="255">
								</div>
								<div class="action">
									<span id="confirm_urlOk"></span>
								</div>
							</li>
							<li>
								<div class="field">Back URL Not Ok<br>
									<span class="text-muted" style="font-size: 8px;">Transaction Fail</span>
								</div>
								<div class="value">
								<input tabindex="" class="form-control" name="urlNok" id="urlNok" onKeyUp="rec_fieldPsp('urlNok');" onChange="rec_fieldPsp('urlNok');" onBlur="rec_fieldPsp('urlNok');" type="text" value="<?php echo($set_psp_urlNok);?>"  maxlength="255">
								</div>
								<div class="action">
									<span id="confirm_urlNok"></span>
								</div>
							</li>
							<li>
								<div class="field">Back URL Exception<br>
									<span class="text-muted" style="font-size: 8px;">!</span>
								</div>
								<div class="value">
								<input tabindex="" class="form-control" name="urlException" id="urlException" onKeyUp="rec_fieldPsp('urlException');" onChange="rec_fieldPsp('urlException');" onBlur="rec_fieldPsp('urlException');" type="text" value="<?php echo($set_psp_urlException);?>"  maxlength="255">
								</div>
								<div class="action">
									<span id="confirm_urlException"></span>
								</div>
							</li>
							<li>
								<div class="field">Back URL Cancel<br>
									<span class="text-muted" style="font-size: 8px;">User Abandon!</span>
								</div>
								<div class="value">
								<input tabindex="" class="form-control" name="urlCancel" id="urlCancel" onKeyUp="rec_fieldPsp('urlCancel');" onChange="rec_fieldPsp('urlCancel');" onBlur="rec_fieldPsp('urlCancel');" type="text" value="<?php echo($set_psp_urlCancel);?>"  maxlength="255">
								</div>
								<div class="action">
									<span id="confirm_urlCancel"></span>
								</div>
							</li>
							<li>
								<div class="field">Logo file name<br>
									<span class="text-muted" style="font-size: 8px;">You have to send it to your provider!</span>
								</div>
								<div class="value">
								<input tabindex="" class="form-control" name="logoFileName" id="logoFileName" onKeyUp="rec_fieldPsp('logoFileName');" onChange="rec_fieldPsp('logoFileName');" onBlur="rec_fieldPsp('logoFileName');" type="text" value="<?php echo($set_psp_logoFileName);?>"  maxlength="255">
								</div>
								<div class="action">
									<span id="confirm_logoFileName"></span>
								</div>
							</li>
							<li>
								<div class="field">URL Home<br>
									<span class="text-muted" style="font-size: 8px;">URL Root!</span>
								</div>
								<div class="value">
								<input tabindex="" class="form-control" name="urlHome" id="urlHome" onKeyUp="rec_fieldPsp('urlHome');" onChange="rec_fieldPsp('urlHome');" onBlur="rec_fieldPsp('urlHome');" type="text" value="<?php echo($set_psp_urlHome);?>"  maxlength="255">
								</div>
								<div class="action">
									<span id="confirm_urlHome"></span>
								</div>
							</li>
							<li>
								<div class="field">URL Catalogue<br>
									<span class="text-muted" style="font-size: 8px;">URL Shop!</span>
								</div>
								<div class="value">
								<input tabindex="" class="form-control" name="urlCatalogue" id="urlCatalogue" onKeyUp="rec_fieldPsp('urlCatalogue');" onChange="rec_fieldPsp('urlCatalogue');" onBlur="rec_fieldPsp('urlCatalogue');" type="text" value="<?php echo($set_psp_urlCatalogue);?>"  maxlength="255">
								</div>
								<div class="action">
									<span id="confirm_urlCatalogue"></span>
								</div>
							</li>
							<li>
								<div class="field">URL Dynmic Tamplate<br>
									<span class="text-muted" style="font-size: 8px;">URL of your own payment page!</span>
								</div>
								<div class="value">
								<input tabindex="" class="form-control" name="urlDynmiqueTamplate" id="urlDynmiqueTamplate" onKeyUp="rec_fieldPsp('urlDynmiqueTamplate');" onChange="rec_fieldPsp('urlDynmiqueTamplate');" onBlur="rec_fieldPsp('urlDynmiqueTamplate');" type="text" value="<?php echo($set_psp_urlDynmiqueTamplate);?>"  maxlength="255">
								</div>
								<div class="action">
									<span id="confirm_urlDynmiqueTamplate"></span>
								</div>
							</li>
								
							<br>
						</ul>
					</p>
				</div>

				
				
				
				<div class="tab-pane fade <?php if($_SESSION['statutMenuAdmin']=="cron") {?>active in<?php }?>" id="cron">
					<p>
						Hostpoint (M8 H* D* M* WD*) all hours to minute 8 <br>
						/usr/local/bin/php -f /home/service/www/mysite.pro/admin/scripts/inc.core.cron.handler.php
						<!-- BEGIN setting-list -->
						<ul class="setting-list">
							<li class="setting-title bg-theme">SERVER TASKS</li>
							<li>
								<div class="field">Active Tasks<br>
									<span class="text-muted" style="font-size: 8px;">Active or Suspend</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="activeCronTasks" id="activeCronTasks" onChange="rec_fieldSettings('activeCronTasks');" <?php if($set_activeCronTasks=="yes") {?>checked<?php }?> />
								<label for="activeCronTasks"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_activeCronTasks"></span>
								</div>
							</li>
							<br>
							<li class="setting-title bg-theme">TASKS REPORT</li>
							<li>
								<div class="field">Active Report<br>
									<span class="text-muted" style="font-size: 8px;">Once a day you receive an email with the raport</span>
								</div>
								<div class="value">
								<div class="switcher switcher-success">
								<input type="checkbox" name="cronReport" id="cronReport" onChange="rec_fieldSettings('cronReport');" <?php if($set_cronReport=="yes") {?>checked<?php }?> />
								<label for="cronReport"></label>
								</div>
								</div>
								<div class="action">
								  <span id="confirm_cronReport"></span>
								</div>
							</li>
							<li>
								<div class="field">Email Report<br>
									<span class="text-muted" style="font-size: 8px;">Email which you want receive the report</span>
								</div>
								<div class="value">
								<input tabindex="" class="form-control" name="emailReportCronTasks" id="emailReportCronTasks" onKeyUp="rec_fieldSettings('emailReportCronTasks');" onChange="rec_fieldSettings('emailReportCronTasks');" onBlur="rec_fieldSettings('emailReportCronTasks');" type="text" value="<?php echo($set_emailReportCronTasks);?>"  maxlength="255">
								</div>
								<div class="action">
									<span id="confirm_emailReportCronTasks"></span>
								</div>
							</li>
							<br>
						</ul>
					</p>
				</div>
				<!-- BEGIN tab-pane -->
				<!--<div class="tab-pane fade" id="basic">
					<p>
						<!-- BEGIN setting-list -_->
						<ul class="setting-list">
							
						</ul>
					</p>
				</div>-->
				<!-- BEGIN tab-pane -->
				<div class="tab-pane fade <?php if($_SESSION['statutMenuAdmin']=="dropdown1") {?>active in<?php }?>" id="dropdown1">
					<p>
						Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic 
						lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed 
						craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth 
						PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever 
						gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you 
						probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu 
						synth chambray yr.
					</p>
				</div>
				<!-- END tab-pane -->
				<!-- BEGIN tab-pane -->
				<div class="tab-pane fade <?php if($_SESSION['statutMenuAdmin']=="dropdown2") {?>active in<?php }?>" id="dropdown2">
					<p>
						Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out 
						master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY,
						art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, 
						banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, 
						mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial 
						keffiyeh echo park vegan.
					</p>
				</div>
				<!-- END tab-pane -->
			</div>

			<!-- END setting-list -->
			<?php 
			if(($set_activeDbSettings=="yes") && ($okCanUseDynamicSettings==true)) {?>
			<div class="text-center">
				<?php require_once("../img/svg/inc.svg.sunAnimate.php");?>
			</div>
			<?php }?>
			
			
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
	<script src="assets/plugins/form/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="assets/plugins/form/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="assets/plugins/form/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
	<script src="assets/plugins/form/bootstrap-typeahead/js/bootstrap-typeahead.min.js"></script>
	<script src="assets/plugins/form/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
	<script src="assets/plugins/form/bootstrap-slider/js/bootstrap-slider.min.js"></script>
	<script src="assets/plugins/form/bootstrap-select/js/bootstrap-select.min.js"></script>
	<script src="assets/plugins/form/masked-input/js/masked-input.min.js"></script>
	<script src="assets/plugins/form/pwstrength/js/pwstrength.js"></script>
	<script src="assets/js/page/form-plugins.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<script src="../js/php_file_tree_jquery.js" type="text/javascript"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script>
		$(document).ready(function() {
			App.init();
			FormPlugins.init();
		});
		var handleRenderMaskedInput = function() {
			$('#dateCountDownProject').mask('9999,99,99');
			//$('#dateCountDownProject').mask('(999) 999-9999');
		};
		$("#colorLinks").colorpicker({
			colorSelectors:{black:"#000000",white:"#ffffff",default:"#8A8A8F",primary:"#007aff",success:"#4CD964",info:"#5AC8FA",warning:"#FF9500",danger:"#FF3B30"}
		});
	</script>
  	<?php require_once("scripts/inc.core.framework.php");// app framework?>
  	<?php require_once("scripts/inc.core.noty.php");// app admin noty?>
	<?php require_once("scripts/inc.core.notyUp.php");// app personal noty?>
</body>
</html>