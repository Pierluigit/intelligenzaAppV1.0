<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Email Details
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
$page = "app_admin_emailDetail";
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
	<title><?php echo($app_nameProject);?> | Email Detail</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("scripts/cp/inc.template_head.php");?>
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<link href="assets/plugins/form/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
	<link href="assets/plugins/form/summernote/summernote.css" rel="stylesheet" />
	
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
							<li class="active"><a href="email_inbox.html"><i class="ti-harddrive"></i> Inbox <b>2</b></a></li>
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
		            <form action="#" method="POST" name="email_form" class="form-horizontal">
						<!-- BEGIN mail-box-toolbar -->
						<div class="mail-box-toolbar">
							<div class="pull-left">
								<a href="email_compose.html" class="btn btn-default btn-sm"><i class="ti-email"></i> <span class="hidden-xs">New</span></a>
								<a href="email_compose.html" class="btn btn-default btn-sm"><i class="ti-back-left"></i> <span class="hidden-xs">Reply</span></a>
								<a href="#" class="btn btn-default btn-sm"><i class="ti-trash"></i> <span class="hidden-xs">Delete</span></a>
								<a href="#" class="btn btn-default btn-sm"><i class="ti-archive"></i> <span class="hidden-xs">Archive</span></a>
							</div>
							<div class="pull-right">
								<a href="#" class="btn btn-default btn-sm"><i class="ti-move"></i> <span class="hidden-xs">Move to</span></a>
								<a href="email_inbox.html" class="btn btn-default btn-sm"><i class="ti-close"></i></a>
							</div>
						</div>
						<!-- END mail-box-toolbar -->
						<!-- BEGIN mail-box-container -->
						<div class="mail-box-container">
							<div data-scrollbar="true" data-height="100%">
								<div class="email-detail">
									<!-- BEGIN mail-detail-header -->
									<div class="email-detail-header">
										<h4 class="email-subject">Trip to South America</h4>
										<div class="email-sender">
											<a href="javascript:;" class="email-sender-img">
												<img src="../assets/img/user-2.jpg" alt="" />
											</a>
											<div class="email-sender-info">
												<h4 class="title">Chance Graham &lt;chancegraham@gmail.com&gt;</h4>
												<div class="time">August 27, 2017 at 3.00pm</div>
												<div class="email-to">
													<small class="text-muted m-r-5">to</small> admin@infinite.com, seantheme@admin.com
												</div>
											</div>
										</div>
									</div>
									<!-- END mail-detail-header -->
									<div class="email-detail-content">
										<!-- BEGIN email-detail-attachment -->
										<div class="email-detail-attachment">
											<div class="email-attachment">
												<a href="#">
													<div class="document-file">
														<i class="ti-zip"></i>
													</div>
													<div class="document-name">invoice.zip</div>
												</a>
											</div>
											<div class="email-attachment">
												<a href="#">
													<div class="document-file">
														<i class="ti-video-camera"></i>
													</div>
													<div class="document-name">video.mp4</div>
												</a>
											</div>
											<div class="email-attachment">
												<a href="#">
													<div class="document-file">
														<img src="../assets/img/gallery/gallery-10.jpg" alt="">
													</div>
													<div class="document-name">image.jpg</div>
												</a>
											</div>
										</div>
										<div class="m-b-10"><a href="#">Download</a></div>
										<!-- END email-detail-attachment -->
										<!-- BEGIN email-detail-body -->
										<div class="email-detail-body">
											Hi Dear Customer,<br />
											<br />
											Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel auctor nisi, vel auctor orci. <br />
											Aenean in pretium odio, ut lacinia tellus. Nam sed sem ac enim porttitor vestibulum vitae at erat.<br />
											<br />
											Curabitur auctor non orci a molestie. Nunc non justo quis orci viverra pretium id ut est. <br />
											Nullam vitae dolor id enim consequat fermentum. Ut vel nibh tellus. <br />
											Duis finibus ante et augue fringilla, vitae scelerisque tortor pretium. <br />
											Phasellus quis eros erat. Nam sed justo libero.<br />
											<br />
											Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br />
											Sed tempus dapibus libero ac commodo.<br />
											<br />
											<br />
											Regards,<br />
											Twitter Inc,<br />
											795 Folsom Ave, Suite 600<br />
											San Francisco, CA 94107<br />
											P: (123) 456-7890<br />
										</div>
										<!-- END email-detail-body -->
									</div>
								</div>
							</div>
						</div>
						<!-- END mail-box-container -->
		            </form>
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