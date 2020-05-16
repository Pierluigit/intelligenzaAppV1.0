<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Email Inbox
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
$page = "app_admin_emailInbox";
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
	<title><?php echo($app_nameProject);?> | Inbox</title>
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
		<div id="content" class="content p-0">
		    <!-- BEGIN mail-box -->
			<div class="mail-box">
		        <!-- BEGIN mail-box-sidebar -->
		        <div class="mail-box-sidebar">
					<!-- BEGIN mail-box-header -->
					<div class="mail-box-header dropdown">
						<a href="javascript:;" data-toggle="dropdown">
							<span class="caret pull-right"></span>
							<i class="ti-email"></i>
							<span class="text">admin@infitite.com</span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="email_inbox.html">admin@infitite.com</a></li>
							<li><a href="email_inbox.html">admin2@infitite.com</a></li>
							<li><a href="email_inbox.html">admin3@infitite.com</a></li>
						</ul>
					</div>
					<!-- END mail-box-header -->
					<!-- BEGIN mail-box-wrapper -->
					<div class="mail-box-wrapper">
						<h4 class="title m-t-0">Mailboxes</h4>
						<ul class="mail-box-menu">
							<li class="active"><a href="email_inbox.php"><i class="ti-harddrive"></i> Inbox <b><span id="emailRecent">0</span></b></a></li>
							<li><a href="email_inbox.html"><i class="ti-star"></i> Starred</a></li>
							<li><a href="email_inbox.html"><i class="ti-tag"></i> Important</a></li>
							<li><a href="email_inbox.html"><i class="ti-arrow-circle-right"></i> Sent Mail</a></li>
							<li><a href="email_inbox.html"><i class="ti-folder"></i> All Mail</a></li>
							<li><a href="email_inbox.html"><i class="ti-alert"></i> Spam</a></li>
							<li><a href="email_inbox.html"><i class="ti-trash"></i> Trash</a></li>
							<li><a href="email_inbox.html"><i class="ti-file"></i> Drafts</a></li>
						</ul>
						<h4 class="title m-t-0">Labels</h4>
						<ul class="mail-box-menu">
							<li><a href="javascript:;"><span class="email-label bg-gradient-red"></span> Red</a></li>
							<li><a href="javascript:;"><span class="email-label bg-gradient-orange"></span> License Codes</a></li>
							<li><a href="javascript:;"><span class="email-label bg-gradient-yellow"></span> Yellow</a></li>
							<li><a href="javascript:;"><span class="email-label bg-gradient-green"></span> Finance</a></li>
							<li><a href="javascript:;"><span class="email-label bg-gradient-blue"></span> Homework</a></li>
							<li><a href="javascript:;"><span class="email-label bg-gradient-purple"></span> Research</a></li>
							<li><a href="javascript:;"><span class="email-label bg-gradient-silver"></span> Games</a></li>
						</ul>
					</div>
					<!-- END mail-box-wrapper -->
		        </div>
		        <!-- END mail-box-sidebar -->
		        <!-- BEGIN mail-box-content -->
		        <div class="mail-box-content">
		            <!-- BEGIN mail-box-toolbar -->
		            <div class="mail-box-toolbar">
		                <div class="pull-left">
		                	<a href="email_compose.html" class="btn btn-default btn-sm" data-toggle="tooltip" data-title="New Email"><i class="ti-pencil-alt"></i></a>
		                	<span class="dropdown">
                            	<a href="#" class="btn btn-default btn-sm" data-toggle="dropdown">Filter: All <b class="caret"></b></a>
                            	<ul class="dropdown-menu">
                            		<li><a href="#">All</a></li>
                            		<li><a href="#">Unread</a></li>
                            		<li><a href="#">To me</a></li>
                            		<li><a href="#">Flagged</a></li>
                            		<li><a href="#">Contacts</a></li>
                            		<li><a href="#">Newsletters</a></li>
                            		<li><a href="#">Social updates</a></li>
                            	</ul>
                            </span>
		                </div>
		                <div class="pull-right hidden-xs">
		                	<a href="#" class="btn btn-default btn-sm"><i class="ti-archive"></i></a>
		                	<a href="#" class="btn btn-default btn-sm"><i class="ti-trash"></i></a>
		                	<a href="#" class="btn btn-default btn-sm"><i class="ti-email"></i></a>
		                	<a href="#" class="btn btn-default btn-sm"><i class="ti-star"></i></a>
		                	<a href="#" class="btn btn-default btn-sm"><i class="ti-tag"></i></a>
		                	<a href="#" class="btn btn-default btn-sm"><i class="ti-layout"></i></a>
		                </div>
		            </div>
		            <!-- END mail-box-toolbar -->
		            <!-- BEGIN mail-box-container -->
		            <div class="mail-box-container">
		                <!-- BEGIN scrollbar -->
		                <div data-scrollbar="true" data-height="100%">
		                    <!-- END table-email -->
		                    <ul class="email-list">
								<li class="unread has-attachment">
									<div class="email-checkbox">
										<div class="checkbox">
											<input type="checkbox" value="1" id="email-checkbox-1" />
											<label for="email-checkbox-1"></label>
										</div>
									</div>
									<div class="email-message">
										<a href="email_detail.html">
											<div class="email-sender">
												<span class="email-time">1 hour ago</span>
												Apple
											</div>
											<div class="email-title">Your payment is received</div>
											<div class="email-desc">
												Praesent id pulvinar orci. Donec ac metus non ligula faucibus venenatis. Suspendisse tortor est, placerat eu dui sed...
											</div>
										</a>
									</div>
								</li>
								<li class="unread has-attachment">
									<div class="email-checkbox">
										<div class="checkbox">
											<input type="checkbox" value="2" id="email-checkbox-2" />
											<label for="email-checkbox-2"></label>
										</div>
									</div>
									<div class="email-message">
										<a href="email_detail.html">
											<div class="email-sender">
												<span class="email-time">5 hours ago</span>
												Chance Graham
											</div>
											<div class="email-title">Trip to South America</div>
											<div class="email-desc">
												Quisque luctus sapien sodales pulvinar porta. In pretium accumsan elit, vitae blandit arcu suscipit eu. Ut tortor libero, gravida ut nisl tincidunt, efficitur laoreet mauris.
											</div>
										</a>
									</div>
								</li>
								<li class="has-attachment">
									<div class="email-checkbox">
										<div class="checkbox">
											<input type="checkbox" value="3" id="email-checkbox-3" />
											<label for="email-checkbox-3"></label>
										</div>
									</div>
									<div class="email-message">
										<a href="email_detail.html">
											<div class="email-sender">
												<span class="email-time">Aug 11</span>
												Paypal Inc
											</div>
											<div class="email-title">Important information about your order #019244</div>
											<div class="email-desc">
												Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens jump; dozy fowl quack. Quick wafting zephyrs vex bold Jim. Quick zephyrs blow, vexing daft Jim.
											</div>
										</a>
									</div>
								</li>
								<li class="">
									<div class="email-checkbox">
										<div class="checkbox">
											<input type="checkbox" value="4" id="email-checkbox-4" />
											<label for="email-checkbox-4"></label>
										</div>
									</div>
									<div class="email-message">
										<a href="email_detail.html">
											<div class="email-sender">
												<span class="email-time">Aug 09</span>
												Fitbit
											</div>
											<div class="email-title">Stylish accessories for your Charge 2</div>
											<div class="email-desc">
												How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! "Now fax quiz Jack!" my brave ghost pled. 
											</div>
										</a>
									</div>
								</li>
								<li class="">
									<div class="email-checkbox">
										<div class="checkbox">
											<input type="checkbox" value="5" id="email-checkbox-5" />
											<label for="email-checkbox-5"></label>
										</div>
									</div>
									<div class="email-message">
										<a href="email_detail.html">
											<div class="email-sender">
												<span class="email-time">Aug 09</span>
												Apple
											</div>
											<div class="email-title">Your invoice from Apple.</div>
											<div class="email-desc">
												 Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. 
											</div>
										</a>
									</div>
								</li>
								<li class="">
									<div class="email-checkbox">
										<div class="checkbox">
											<input type="checkbox" value="6" id="email-checkbox-6" />
											<label for="email-checkbox-6"></label>
										</div>
									</div>
									<div class="email-message">
										<a href="email_detail.html">
											<div class="email-sender">
												<span class="email-time">Aug 09</span>
												Hotels.com
											</div>
											<div class="email-title">[Ends tonight!] 48 Hour Sale - Save up to 50% + save an extra 10%</div>
											<div class="email-desc">
												Phasellus vulputate, ligula ac hendrerit euismod, nunc metus maximus tellus, aliquam finibus justo lorem a augue. 
											</div>
										</a>
									</div>
								</li>
								<li class="">
									<div class="email-checkbox">
										<div class="checkbox">
											<input type="checkbox" value="7" id="email-checkbox-7" />
											<label for="email-checkbox-7"></label>
										</div>
									</div>
									<div class="email-message">
										<a href="email_detail.html">
											<div class="email-sender">
												<span class="email-time">Aug 08</span>
												Google Calendar
											</div>
											<div class="email-title">Daily schedule on Tuesday, May 9, 2017</div>
											<div class="email-desc">
												Suspendisse potenti. Praesent ac ullamcorper sem. Mauris luctus accumsan felis
											</div>
										</a>
									</div>
								</li>
								<li class="">
									<div class="email-checkbox">
										<div class="checkbox">
											<input type="checkbox" value="8" id="email-checkbox-8" />
											<label for="email-checkbox-8"></label>
										</div>
									</div>
									<div class="email-message">
										<a href="email_detail.html">
											<div class="email-sender">
												<span class="email-time">Aug 08</span>
												Facebook Blueprint
											</div>
											<div class="email-title">April 2017 – Blueprint Highlights</div>
											<div class="email-desc">
												Phasellus pretium viverra tortor, eu sagittis erat aliquam nec. Nunc et volutpat ligula. Duis viverra posuere enim, ac bibendum massa viverra id.
											</div>
										</a>
									</div>
								</li>
								<li class="">
									<div class="email-checkbox">
										<div class="checkbox">
											<input type="checkbox" value="9" id="email-checkbox-9" />
											<label for="email-checkbox-9"></label>
										</div>
									</div>
									<div class="email-message">
										<a href="email_detail.html">
											<div class="email-sender">
												<span class="email-time">Aug 08</span>
												Customer Care
											</div>
											<div class="email-title">Re: [Case #1567940] - Re: [Important] Exabytes</div>
											<div class="email-desc">
												Nam imperdiet molestie arcu, et gravida quam lacinia lobortis.
											</div>
										</a>
									</div>
								</li>
								<li class="">
									<div class="email-checkbox">
										<div class="checkbox">
											<input type="checkbox" value="10" id="email-checkbox-10" />
											<label for="email-checkbox-10"></label>
										</div>
									</div>
									<div class="email-message">
										<a href="email_detail.html">
											<div class="email-sender">
												<span class="email-time">Aug 07</span>
												Flight Status
											</div>
											<div class="email-title">[Case#2017022137015743] *FLIGHT RETIMED* **MH2713/15JUL17**</div>
											<div class="email-desc">
												 Etiam condimentum orci ut velit suscipit, ut accumsan elit aliquet. Nulla cursus mi at augue vestibulum suscipit. Aenean ut risus euismod, laoreet justo non, convallis quam.
											</div>
										</a>
									</div>
								</li>
		                    </ul>
		                    <!-- END table-email -->
		                </div>
		                <!-- END scrollbar -->
		            </div>
		            <!-- END mail-box-container -->
		        </div>
		        <!-- END mail-box-content -->
		    </div>
		    <!-- END mail-box -->
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
	
	<script>
		function countEmailRecent() {  //alert(langue);
			"use strict";
			// requete ajax
			var formData = {idUser:<?php echo($idUser);?>,};
			$.ajax(
			{
				url : "<?php echo($app_urlRoot);?>/admin/scripts/inc.emailBox_countMessageRecent.php",
				type: "POST",
				data : formData,
				success: function(data)
				{
					//alert('success');
					document.getElementById('emailRecent').innerHTML = ""+ data +"";
					//window.location.href("?ok")
				},
				error: function()
				{
					document.getElementById('emailRecent').innerHTML = "Error Ajax!";
				}
			});
		}
		countEmailRecent();
	</script>
</body>
</html>