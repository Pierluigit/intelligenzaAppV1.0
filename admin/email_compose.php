<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Email Compose
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
$page = "app_admin_emailCompose";
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
	<title><?php echo($app_nameProject);?> | Email Compose</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("scripts/cp/inc.template_head.php");?>
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE CSS STYLE ================== -->
	<link href="assets/plugins/form/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
	<link href="assets/plugins/form/summernote/summernote.css" rel="stylesheet" />
	<!-- ================== END PAGE CSS STYLE ================== -->
	
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
								<button type="submit" class="btn btn-primary btn-sm"><i class="ti-email"></i> Send</button>
								<a href="#" class="btn btn-default btn-sm"><i class="ti-clip f-s-14 m-t-1 m-r-1 text-primary"></i> <span class="hidden-xs">Attach</span></a>
								<a href="#" class="btn btn-default btn-sm">Discard</a>
								<span class="dropdown dropdown-icon">
									<a href="#" class="btn btn-default btn-sm" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
									<ul class="dropdown-menu" style="margin-left: -15px;">
										<li><a href="#">Save draft</a></li>
										<li><a href="#">Show From</a></li>
										<li><a href="#">Check names</a></li>
										<li><a href="#">Set importance</a></li>
										<li><a href="#">Switch to plain text</a></li>
										<li><a href="#">Check for accessibility issues</a></li>
									</ul>
								</span>
							</div>
							<div class="pull-right">
								<a href="#" class="btn btn-default btn-sm"><i class="ti-back-left"></i> <span class="hidden-xs">Undo</span></a>
								<a href="email_inbox.html" class="btn btn-default btn-sm"><i class="ti-close"></i></a>
							</div>
						</div>
						<!-- END mail-box-toolbar -->
						<!-- BEGIN mail-box-container -->
						<div class="mail-box-container">
							<div class="email-form">
								<div class="email-form-header">
									<div class="form-group">
										<label class="control-label col-md-1">To:</label>
										<div class="col-md-11">
											<input type="text" class="form-control" id="tagsinput-default" data-role="tagsinput" value="admin@infiite.com" />
										</div>
									</div>
									<div class="form-group m-b-0">
										<label class="control-label col-md-1">Subject:</label>
										<div class="col-md-11">
											<input type="text" class="form-control" />
										</div>
									</div>
								</div>
								<textarea name="text" class="summernote form-control" title="Contents"></textarea>
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
	<script src="assets/plugins/form/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
	<script src="assets/plugins/form/summernote/summernote.min.js"></script>
	<script src="assets/js/page/email-compose.demo.min.js"></script>
	<script src="assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
			EmailCompose.init();
		});
	</script>
	
  	<?php require_once("scripts/inc.core.framework.php");// app framework?>
  	<?php require_once("scripts/inc.core.noty.php");// app admin noty?>
	<?php require_once("scripts/inc.core.notyUp.php");// app personal noty?>
</body>
</html>