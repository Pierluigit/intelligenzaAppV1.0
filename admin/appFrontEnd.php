<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Admin Front End
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
$page = "app_admin_frontEnd";
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
	<title><?php echo($app_nameProject);?> | Admin Front End</title>
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
		<div id="content" class="content bgBoxApp">
			<!-- BEGIN breadcrumb -->
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active">Front End</li>
			</ul>
			<!-- END breadcrumb -->
			<!-- BEGIN page-header -->
			<h1 class="page-header">
				Front End <small>work in progress...</small>
			</h1>
			<!-- END page-header -->
			<p>
				
				<!-- BEGIN panel-body -->
						<div class="panel-body">
							<p class="desc">
								Type of web site default onepage, else ecommerce, portofolio, vitrine, resume<br>
				Styles bg, selection color...
							</p>
							<!-- BEGIN nav-tabs -->
							<ul class="nav nav-tabs" id="nav-tabs">
								<li class="nav-item"><a href="#type" onClick="statutMenuAdminFrontEnd('type');" class="nav-link <?php if($_SESSION['statutMenuAdminFrontEnd']=="type") {?>active<?php }?>" data-toggle="tab">Type</a></li>
								<li class="nav-item"><a href="#pages" onClick="statutMenuAdminFrontEnd('pages');" class="nav-link <?php if($_SESSION['statutMenuAdminFrontEnd']=="pages") {?>active<?php }?>" data-toggle="tab">Pages</a></li>
								<li class="nav-item"><a href="#styles" onClick="statutMenuAdminFrontEnd('styles');" class="nav-link <?php if($_SESSION['statutMenuAdminFrontEnd']=="styles") {?>active<?php }?>" data-toggle="tab">Styles</a></li>
								<li class="nav-item"><a href="#faq" onClick="statutMenuAdminFrontEnd('faq');" class="nav-link <?php if($_SESSION['statutMenuAdminFrontEnd']=="faq") {?>active<?php }?>" data-toggle="tab">F.A.Q.</a></li>
								<li class="nav-item dropdown">
									<a href="#" class="dropdown-toggle nav-link <?php if(($_SESSION['statutMenuAdminFrontEnd']=="dropdown1") || ($_SESSION['statutMenuAdminFrontEnd']=="dropdown2")) {?>active<?php }?>" data-toggle="dropdown">
										Support <span class="caret"></span>
									</a>
									<ul class="dropdown-menu">
										<li><a href="#dropdown1" onClick="statutMenuAdminFrontEnd('dropdown1');" class="nav-link <?php if($_SESSION['statutMenuAdminFrontEnd']=="dropdown1") {?>active<?php }?>" data-toggle="tab">@fat</a></li>
										<li><a href="#dropdown2" onClick="statutMenuAdminFrontEnd('dropdown2');" class="nav-link <?php if($_SESSION['statutMenuAdminFrontEnd']=="dropdown2") {?>active<?php }?>" data-toggle="tab">@mdo</a></li>
									</ul> 
								</li>
							</ul>
							<!-- END nav-tabs -->
							<!-- BEGIN tab-content -->
							<div class="tab-content tab-content-bordered">
								<!-- BEGIN tab-pane -->
								<div class="tab-pane fade <?php if($_SESSION['statutMenuAdminFrontEnd']=='type') {?>active in<?php }?>" id="type">
									<p>
										Raw denim you probably haven't heard of them jean shorts Austin. 
										Nesciunt tofu stumptown aliqua, retro synth master cleanse. 
										Mustache cliche tempor, williamsburg carles vegan helvetica. 
										Reprehenderit butcher retro keffiyeh dreamcatcher synth. 
										Cosby sweater eu banh mi, qui irure terry richardson ex squid. 
										Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, 
										butcher voluptate nisi qui.
									</p>
								</div>
								<!-- END tab-pane -->
								<!-- BEGIN tab-pane -->
								<div class="tab-pane fade <?php if($_SESSION['statutMenuAdminFrontEnd']=='pages') {?>active in<?php }?>" id="pages">
									<p>
										Raw denim you probably haven't heard of them jean shorts Austin. 
										Nesciunt tofu stumptown aliqua, retro synth master cleanse. 
										Mustache cliche tempor, williamsburg carles vegan helvetica. 
										Reprehenderit butcher retro keffiyeh dreamcatcher synth. 
										Cosby sweater eu banh mi, qui irure terry richardson ex squid. 
										Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, 
										butcher voluptate nisi qui.
									</p>
								</div>
								<!-- END tab-pane -->
								<!-- BEGIN tab-pane -->
								<div class="tab-pane fade <?php if($_SESSION['statutMenuAdminFrontEnd']=='styles') {?>active in<?php }?>" id="styles">
									<p>
										<!-- BEGIN setting-list -->
										<ul class="setting-list">
											<li class="setting-title bg-theme">BACKGROUND FRONT PAGES</li>
											<li>
												<div class="field"><br>

												</div>
												<div class="value">
													<span class="text-muted" style="font-size: 8px;">Place it in</span> $app_urlRoot/images/bg/
												</div>
												<div class="action">

												</div>
											</li>
											<li>
												<div class="field"></div>
												<div class="value green">If empty = default in admin/asset/img/</div>
											</li>
											<li>
												<div class="field"><a href="../index.php" target="_blank">Coming Soon</a><br>
													<span class="text-muted" style="font-size: 8px;">size suggested</span> (1920x1280)
												</div>
												<div class="value">
												<input tabindex="2" class="form-control" name="bgComingSoon" id="bgComingSoon" onKeyUp="rec_fieldSettings('bgComingSoon');" onChange="rec_fieldSettings('bgComingSoon');" onBlur="rec_fieldSettings('bgComingSoon');" type="text" value="<?php echo($set_bgComingSoon);?>" placeholder="Default coming-soon-cover.jpg" maxlength="64">
												</div>
												<div class="action">
												  <span id="confirm_bgComingSoon"></span>
												</div>
											</li>
											<li>
												<div class="field"><a href="<?php echo($app_urlRoot);?>/images/bg/<?php echo($set_bgLogin);?>" target="_blank">Login</a><br>
													<span class="text-muted" style="font-size: 8px;">Size suggested</span> (1920x2880)
												</div>
												<div class="value">
												<input tabindex="2" class="form-control" name="bgLogin" id="bgLogin" onKeyUp="rec_fieldSettings('bgLogin');" onChange="rec_fieldSettings('bgLogin');" onBlur="rec_fieldSettings('bgLogin');" type="text" value="<?php echo($set_bgLogin);?>" placeholder="Default login-cover.jpg" maxlength="64">
												</div>
												<div class="action">
												  <span id="confirm_bgLogin"></span>
												</div>
											</li>
											<li>
												<div class="field"><a href="<?php echo($app_urlRoot);?>/images/bg/<?php echo($set_bgAirlock);?>" target="_blank">Double Auth.</a><br>
													<span class="text-muted" style="font-size: 8px;">Size suggested</span> (1920x1280)
												</div>
												<div class="value">
												<input tabindex="2" class="form-control" name="bgAirlock" id="bgAirlock" onKeyUp="rec_fieldSettings('bgAirlock');" onChange="rec_fieldSettings('bgAirlock');" onBlur="rec_fieldSettings('bgAirlock');" type="text" value="<?php echo($set_bgAirlock);?>" placeholder="Default register-cover.jpg" maxlength="64">
												</div>
												<div class="action">
													<span id="confirm_bgAirlock"></span>
												</div>
											</li>
											<li>
												<div class="field"><a href="<?php echo($app_urlRoot);?>/images/bg/<?php echo($set_bgRegister);?>" target="_blank">Register</a><br>
													<span class="text-muted" style="font-size: 8px;">Size suggested</span> (1920x1280)
												</div>
												<div class="value">
												<input tabindex="2" class="form-control" name="bgRegister" id="bgRegister" onKeyUp="rec_fieldSettings('bgRegister');" onChange="rec_fieldSettings('bgRegister');" onBlur="rec_fieldSettings('bgRegister');" type="text" value="<?php echo($set_bgRegister);?>" placeholder="Default register-cover.jpg" maxlength="64">
												</div>
												<div class="action">
													<span id="confirm_bgRegister"></span>
												</div>
											</li>
											<li>
												<div class="field"><a href="<?php echo($app_urlRoot);?>/images/bg/<?php echo($set_bgLostPass);?>" target="_blank">Lost Password</a><br>
													<span class="text-muted" style="font-size: 8px;">Size suggested</span> (1920x1280)
												</div>
												<div class="value">
												<input tabindex="2" class="form-control" name="bgLostPass" id="bgLostPass" onKeyUp="rec_fieldSettings('bgLostPass');" onChange="rec_fieldSettings('bgLostPass');" onBlur="rec_fieldSettings('bgLostPass');" type="text" value="<?php echo($set_bgLostPass);?>" placeholder="Default register-cover.jpg" maxlength="64">
												</div>
												<div class="action">
													<span id="confirm_bgLostPass"></span>
												</div>
											</li>
											<li>
												<div class="field"><a href="../privacy.php" target="_blank">Privacy</a><br>
													<span class="text-muted" style="font-size: 8px;">Size suggested</span> (1920x1280)
												</div>
												<div class="value">
												<input tabindex="2" class="form-control" name="bgPrivacy" id="bgPrivacy" onKeyUp="rec_fieldSettings('bgPrivacy');" onChange="rec_fieldSettings('bgPrivacy');" onBlur="rec_fieldSettings('bgPrivacy');" type="text" value="<?php echo($set_bgPrivacy);?>" placeholder="Default register-cover.jpg" maxlength="64">
												</div>
												<div class="action">
													<span id="confirm_bgPrivacy"></span>
												</div>
											</li>
											<li>
												<div class="field"><a href="../terms.php" target="_blank">Terms</a><br>
													<span class="text-muted" style="font-size: 8px;">Size suggested</span> (1920x1280)
												</div>
												<div class="value">
												<input tabindex="2" class="form-control" name="bgTerms" id="bgTerms" onKeyUp="rec_fieldSettings('bgTerms');" onChange="rec_fieldSettings('bgTerms');" onBlur="rec_fieldSettings('bgTerms');" type="text" value="<?php echo($set_bgTerms);?>" placeholder="Default register-cover.jpg" maxlength="64">
												</div>
												<div class="action">
													<span id="confirm_bgTerms"></span>
												</div>
											</li>

											<li>
												<div class="field"><a href="../faq.php" target="_blank">F.A.Q.</a><br>
													<span class="text-muted" style="font-size: 8px;">Size suggested</span> (1920x1280)
												</div>
												<div class="value">
												<input tabindex="2" class="form-control" name="bgFaq" id="bgFaq" onKeyUp="rec_fieldSettings('bgFaq');" onChange="rec_fieldSettings('bgFaq');" onBlur="rec_fieldSettings('bgFaq');" type="text" value="<?php echo($set_bgFaq);?>" placeholder="Default register-cover.jpg" maxlength="64">
												</div>
												<div class="action">
													<span id="confirm_bgFaq"></span>
												</div>
											</li>

											<li>
												<div class="field"><a href="../contact.php" target="_blank">Contact</a><br>
													<span class="text-muted" style="font-size: 8px;">Size suggested</span> (1920x1280)
												</div>
												<div class="value">
												<input tabindex="2" class="form-control" name="bgContact" id="bgContact" onKeyUp="rec_fieldSettings('bgContact');" onChange="rec_fieldSettings('bgContact');" onBlur="rec_fieldSettings('bgContact');" type="text" value="<?php echo($set_bgContact);?>" placeholder="Default register-cover.jpg" maxlength="64">
												</div>
												<div class="action">
													<span id="confirm_bgContact"></span>
												</div>
											</li>
											<br>
											
										</ul>
									</p>
								</div>
								<!-- END tab-pane -->
								<!-- BEGIN tab-pane -->
								<div class="tab-pane fade <?php if($_SESSION['statutMenuAdminFrontEnd']=='faq') {?>active in<?php }?>" id="faq">
									<p>
										faq   denim you probably haven't heard of them jean shorts Austin. 
										Nesciunt tofu stumptown aliqua, retro synth master cleanse. 
										Mustache cliche tempor, williamsburg carles vegan helvetica. 
										Reprehenderit butcher retro keffiyeh dreamcatcher synth. 
										Cosby sweater eu banh mi, qui irure terry richardson ex squid. 
										Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, 
										butcher voluptate nisi qui.
									</p>
								</div>
								<!-- END tab-pane -->
								<!-- BEGIN tab-pane -->
								<div class="tab-pane fade <?php if($_SESSION['statutMenuAdminFrontEnd']=='dropdown1') {?>active in<?php }?>" id="dropdown1">
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
								<div class="tab-pane fade <?php if($_SESSION['statutMenuAdminFrontEnd']=='dropdown2') {?>active in<?php }?>" id="dropdown2">
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
							<!-- END tab-content -->
						</div>
						<!-- END panel-body -->
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