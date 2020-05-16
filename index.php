<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Coming Soon
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
$page = "comingSoon";
//////////////////////////////////////////
//////////////////////////////////////////
// load core intelligenza
require_once("admin/scripts/inc.core.intelligenza.php");
//require_once("admin/scripts/inc.settings.php");
// admin stats
//require_once("admin/scripts/inc.adminStats.php");

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo($_SESSION['language']);?>">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo($tr_text_page_index_title);?> | Home</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="<?php echo($tr_text_page_index_description);?>" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<?php require_once("admin/scripts/cp/inc.template_head.php");?>
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE CSS STYLE ================== -->
    <link href="admin/assets/plugins/timer/jquery.countdown/jquery.countdown.css" rel="stylesheet" />
	<!-- ================== END PAGE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="admin/assets/plugins/loader/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body>
	<?php require_once("scripts/analyticstracking.php");?>
	<!-- BEGIN #page-container -->
	<div id="page-container" class="fade">
		<!-- BEGIN coming-soon -->
        <div class="coming-soon">
			<!-- BEGIN coming-soon-cover -->
        	<div class="coming-soon-cover"></div>
			<!-- END coming-soon-cover -->
			<!-- BEGIN coming-soon-content -->
			<div class="coming-soon-content bgBox">
				<div class="brand m-b-lg">
					<!--<a href="#">-->
					<?php if(($set_activeSettingDb=="yes") && ($okCanUseDynamicSettings==true)) {// dynamic mode??>
						<?php if($app_logoProject=="") {// check which logo?>
								<span class="logo"><i class="ti-infinite"></i></span>
								<br><?php echo($app_nameProject);?>
						<?php }else {
								// if existe
								if(file_exists('images/logo/'.$app_logoProject.'')) {?>
									<img src="images/logo/<?php echo($app_logoProject);?>" width="222" alt=""/>
								<?php }else {?>
								<span class="logo"><i class="ti-infinite"></i></span>
								<br><?php echo($app_nameProject);?>
							<?php }?>
							
						<?php }?>
					<?php }else {// manuel mode?>
							<span class="logo"><i class="ti-infinite"></i> <?php echo($app_nameProject);?></span>
					<?php }?>
					<!--</a>-->
				</div><br><br>
				<h1>We're Coming Soon</h1>
				<div class="coming-soon-timer">
					<div id="timer"></div>
				</div>
				<p>We are working very hard on the new version of our site.<br /> It will bring a lot of new features. Stay tuned!</p>
			</div>
			<!-- END coming-soon-content -->
			<!-- BEGIN Footer -->
	<?php require_once("scripts/inc.footer.php");?>
	<!-- END Footer -->
        </div>
        <!-- END coming-soon -->
		
		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="ti-arrow-up"></i></a>
		<!-- END btn-scroll-top -->
	</div>
	<!-- END #page-container -->

	<!-- ================== BEGIN BASE JS ================== -->
	<?php require_once("admin/scripts/cp/inc.template_framework.php");?>
	<!-- ================== END BASE JS ================== -->
	
	<!-- font awesome pour les icones de ok validation -->
	<script src="js/fontAwesome.js" crossorigin="anonymous"></script>
    
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="admin/assets/plugins/timer/jquery.countdown/jquery.plugin.js"></script>
    <script src="admin/assets/plugins/timer/jquery.countdown/jquery.countdown.js"></script>
	<script src="admin/assets/js/page/page-coming-soon.demo.js"></script>
	<script src="admin/assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<?php if($app_ifUseAudio=="yes") {// if app audio setteings = yes?>
	<script src="modular/_sm/script/soundmanager2.js"></script>
	<script>
		soundManager.defaultOptions.volume = <?php echo($app_volume);?>;
		soundManager.setup({
		  url: 'modular/_sm/swf/',
		  onready: function() {
			var mySound = soundManager.createSound({
			  id: 'aSound',
			  url: 'audio/pageComingSoon.mp3'
			});
			mySound.play();
		  },
		  ontimeout: function() {
			// Hrmm, SM2 could not start. Missing SWF? Flash blocked? Show an error, etc.?
		  }
		});
	</script>
	<?php }// end if app audio settings = yes?>
	<script>
		// gestion du count down dynamic de bleu!
		var handleRenderCountdownTimer = function() {
			<?php if($app_dateCountDownProject=="") {?>
			var newYear = new Date();
			newYear = new Date(newYear.getFullYear() + 1, 1 - 1, 1);
			$('#timer').countdown({until: newYear});
			<?php }else {?>
			$('#timer').countdown({<?php echo($app_sinceOrUntilCountDownProject);?>: new Date(<?php echo($app_dateCountDownProject);?>)});
			<?php }?>
		};	
	</script>
	<script>
		$(document).ready(function() {
			App.init();
			ComingSoon.init();
		});
	</script>
</body>
</html>