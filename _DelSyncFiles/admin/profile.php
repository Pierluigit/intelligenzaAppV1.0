<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Member Profile
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
$page = "app_profile";
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
	<title><?php echo($app_nameProject);?> | Profile</title>
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
			<?php require_once("scripts/cp/inc.template_headerSearch.php"); ?>
			<!-- END header-search-bar -->
		</div>
		<!-- END #header -->
		
		<!-- BEGIN #sidebar -->
		<?php require_once("scripts/cp/inc.template_sideBarMenu.php"); ?>
		<!-- END #sidebar -->
		
		<!-- BEGIN #content -->
		<div id="content" class="content p-0">
			
			<!-- BEGIN profile-header -->
			<div class="profile-header">
				<!-- BEGIN profile-header-cover -->
				<div class="profile-header-cover"></div>
				<!-- END profile-header-cover -->
				<!-- BEGIN profile-header-content -->
				<div class="profile-header-content">
					<!-- BEGIN profile-header-img -->
					<div class="profile-header-img">
						<?php if($avatarUser!="") {?>
						<img src="../members/id_<?php echo($idUser);?>/img/<?php echo($avatarUser);?>" alt="" />
						<?php }else {?>
						<img src="<?php echo($app_urlRoot);?>/img/avatar.png" alt="" />
						<?php }?>
					</div>
					<!-- END profile-header-img -->
					<!-- BEGIN profile-header-info -->
					<div class="profile-header-info">
						<h4 class="m-t-sm"><?php echo($pseudoUser);?></h4>
						<p class="m-b-sm"><?php echo($rightsUser);?> <?php echo($subRightsUser);?><br><?php echo($fonctionUser);?></p>
					</div>
					<!-- END profile-header-info -->
				</div>
				<!-- END profile-header-content -->
				<!-- BEGIN profile-header-tab -->
				<ul class="profile-header-tab nav nav-tabs">
					<li class="nav-item"><a href="#profile-post" class="nav-link active" data-toggle="tab">POSTS</a></li>
					<li class="nav-item"><a href="#profile-about" class="nav-link" data-toggle="tab">ABOUT</a></li>
					<li class="nav-item"><a href="#profile-photos" class="nav-link" data-toggle="tab">PHOTOS</a></li>
					<li class="nav-item"><a href="#profile-videos" class="nav-link" data-toggle="tab">VIDEOS</a></li>
					<li class="nav-item"><a href="#profile-friends" class="nav-link" data-toggle="tab">FRIENDS</a></li>
				</ul>
				<!-- END profile-header-tab -->
			</div>
			<!-- END profile-header -->
			<!-- BEGIN profile-container -->
			<div class="profile-container">
				<!-- BEGIN row -->
				<div class="row row-space-20">
					<!-- BEGIN col-8 -->
					<div class="col-md-8">
						<!-- BEGIN tab-content -->
						<div class="tab-content p-0">
							<!-- BEGIN tab-pane -->
							<div class="tab-pane fade in active" id="profile-post">
								<div class="post">
									<div class="post-header">
										<div class="post-header-img">
											<img src="assets/img/user.jpg" alt="" />
										</div>
										<div class="post-header-info">
											<h4><a href="#">Clyde Stanley</a> at <a href="#">South Lake Tahoe, California</a></h4>
											<span class="time">March 16</span>
										</div>
									</div>
									<div class="post-content">
										<p class="post-desc">Best vacation of 2017</p>
										<ul class="img-list">
											<li class="main"><a href="#"><img src="assets/img/gallery/gallery-1.jpg" alt="" /></a></li>
											<li><a href="#"><img src="assets/img/gallery/gallery-2.jpg" alt="" /></a></li>
											<li><a href="#"><img src="assets/img/gallery/gallery-3.jpg" alt="" /></a></li>
											<li><a href="#"><img src="assets/img/gallery/gallery-4.jpg" alt="" /></a></li>
											<li class="with-number">
												<a href="#">
													<img src="assets/img/gallery/gallery-5.jpg" alt="" />
													<div class="number">+12</div>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="post">
									<div class="post-header">
										<div class="post-header-img">
											<img src="assets/img/user.jpg" alt="" />
										</div>
										<div class="post-header-info">
											<h4><a href="#">Clyde Stanley</a> is watching <a href="#">PATAGONIA 8k</a></h4>
											<span class="time">March 12</span>
										</div>
									</div>
									<div class="post-content">
										<p class="post-desc">Nice PATAGONIA footage in 8K</p>
										<div class="embed-responsive embed-responsive-16by9">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ChOhcHD8fBA?showinfo=0"></iframe>
										</div>
									</div>
								</div>
								<div class="post">
									<div class="post-header">
										<div class="post-header-img">
											<img src="assets/img/user.jpg" alt="" />
										</div>
										<div class="post-header-info">
											<h4><a href="#">Clyde Stanley</a></h4>
											<span class="time">March 4</span>
										</div>
									</div>
									<div class="post-content">
										<p class="post-desc">
											Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br />Quisque sodales urna justo, ac ultrices magna consectetur id.<br /><br />
											Donec tempor ligula sit amet nunc porta, sed aliquam leo sagittis.<br />
											Ut auctor congue efficitur. Praesent aliquam pulvinar neque, placerat semper massa elementum et.
										</p>
									</div>
								</div>
								<div class="post">
									<div class="post-header">
										<div class="post-header-img">
											<img src="assets/img/user.jpg" alt="" />
										</div>
										<div class="post-header-info">
											<h4><a href="#">Clyde Stanley</a> at <a href="#">United States</a></h4>
											<span class="time">May 5</span>
										</div>
									</div>
									<div class="post-content">
										<p class="post-desc">Business Trip</p>
										<ul class="img-list">
											<li class="main"><a href="#"><img src="assets/img/gallery/gallery-5.jpg" alt="" /></a></li>
											<li class="main"><a href="#"><img src="assets/img/gallery/gallery-6.jpg" alt="" /></a></li>
											<li><a href="#"><img src="assets/img/gallery/gallery-7.jpg" alt="" /></a></li>
											<li><a href="#"><img src="assets/img/gallery/gallery-8.jpg" alt="" /></a></li>
											<li><a href="#"><img src="assets/img/gallery/gallery-9.jpg" alt="" /></a></li>
											<li><a href="#"><img src="assets/img/gallery/gallery-10.jpg" alt="" /></a></li>
										</ul>
									</div>
								</div>
							</div>
							<!-- END tab-pane -->
							<!-- BEGIN tab-pane -->
							<div class="tab-pane fade" id="profile-about">
								<table class="table table-profile">
									<thead>
										<tr>
											<th colspan="2">WORK AND EDUCATION</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="field">Work</td>
											<td class="value">
												<div class="m-b-5">
													<b>Magnificient IT (2017)</b> <br />
													<span class="text-muted">PHP Programmer</span>
												</div>
												<div>
													<b>Neutrino IT (2012)</b> <br />
													<span class="text-muted">UXUI / Frontend Developer</span>
												</div>
											</td>
										</tr>
										<tr>
											<td class="field">Education</td>
											<td class="value">
												<div class="m-b-5">
													<b>University (2009)</b> <br />
													<span class="text-muted">University of Georgia, Athens, GA</span>
												</div>
												<div>
													<b>High School (2006)</b> <br />
													<span class="text-muted">Heritage High School, West Chestter, PA</span>
												</div>
											</td>
										</tr>
										<tr>
											<td class="field">Skills</td>
											<td class="value">
												C++, PHP, HTML5, CSS, jQuery, MYSQL, Ionic, Laravel, Phonegap, Bootstrap, Angular JS, Angular JS, Asp.net
											</td>
										</tr>
									</tbody>
								</table>
								<table class="table table-profile">
									<thead>
										<tr>
											<th colspan="2">CONTACT INFORMATION</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="field">Mobile Phones</td>
											<td class="value">
												+44 7700 900860
												
											</td>
										</tr>
										<tr>
											<td class="field">Email</td>
											<td class="value">
												admin@infinite.com
												
											</td>
										</tr>
										<tr>
											<td class="field">Facebook</td>
											<td class="value">
												http://facebook.com/infinite.admin
												
											</td>
										</tr>
										<tr>
											<td class="field">Website</td>
											<td class="value">
												http://seantheme.com
												
											</td>
										</tr>
										<tr>
											<td class="field">Address</td>
											<td class="value">
												Twitter, Inc. <br />
												1355 Market Street, Suite 900<br />
												San Francisco, CA 94103
											</td>
										</tr>
									</tbody>
								</table>
								<table class="table table-profile">
									<thead>
										<tr>
											<th colspan="2">BASIC INFORMATION</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="field">Birth of Date</td>
											<td class="value">
												November 4, 1989
												
											</td>
										</tr>
										<tr>
											<td class="field">Gender</td>
											<td class="value">
												Male
												
											</td>
										</tr>
										<tr>
											<td class="field">Facebook</td>
											<td class="value">
												http://facebook.com/infinite.admin
												
											</td>
										</tr>
										<tr>
											<td class="field">Website</td>
											<td class="value">
												http://seantheme.com
												
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!-- END tab-pane -->
							<!-- BEGIN tab-pane -->
							<div class="tab-pane fade" id="profile-photos">
								<div class="m-b-10"><b>Photos (30)</b></div>
								<ul class="img-grid-list">
									<li><a href="#"><img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-4.jpg" alt="" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-6.jpg" alt="" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-9.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-10.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-11.jpg" alt="" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-12.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-13.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-14.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-15.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-16.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-17.jpg" alt="" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-18.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-19.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-20.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-21.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-22.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-23.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-24.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-25.jpg" alt="" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-26.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-27.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-28.jpg" alt="" class="img-portrait" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-29.jpg" alt="" /></a></li>
									<li><a href="#"><img src="assets/img/gallery/gallery-30.jpg" alt="" /></a></li>
								</ul>
							</div>
							<!-- END tab-pane -->
							<!-- BEGIN tab-pane -->
							<div class="tab-pane fade" id="profile-videos">
								<div class="m-b-10"><b>Videos (15)</b></div>
								<!-- BEGIN row -->
								<div class="row row-space-2">
									<!-- BEGIN col-8 -->
									<div class="col-sm-8">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/3Kf-FlECN7M?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-8 -->
									<!-- BEGIN col-4 -->
									<div class="col-sm-4">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/izsjRpcgfmk?showinfo=0"></iframe>
										</div>
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/j876xgnTVUg?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-4 -->
								</div>
								<!-- END row -->
								<!-- BEGIN row -->
								<div class="row row-space-2">
									<!-- BEGIN col-4 -->
									<div class="col-sm-4">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wUqH_5memWY?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-4 -->
									<!-- BEGIN col-4 -->
									<div class="col-sm-4">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wXmu-EYAmKU?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-4 -->
									<!-- BEGIN col-4 -->
									<div class="col-sm-4">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/xS1DghfzuMc?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-4 -->
								</div>
								<!-- END row -->
								<!-- BEGIN row -->
								<div class="row row-space-2">
									<!-- BEGIN col-4 -->
									<div class="col-sm-4">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v3ZkCLUFrys?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-4 -->
									<!-- BEGIN col-4 -->
									<div class="col-sm-4">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/toPm-L7Ib44?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-4 -->
									<!-- BEGIN col-4 -->
									<div class="col-sm-4">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/qD8OnPC1fLI?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-4 -->
								</div>
								<!-- END row -->
								<!-- BEGIN row -->
								<div class="row row-space-2">
									<!-- BEGIN col-4 -->
									<div class="col-sm-4">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Guo7gR0XyaU?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-4 -->
									<!-- BEGIN col-4 -->
									<div class="col-sm-4">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ADfIlLfs5Bk?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-4 -->
									<!-- BEGIN col-4 -->
									<div class="col-sm-4">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8Wg1MYjOguI?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-4 -->
								</div>
								<!-- END row -->
								<!-- BEGIN row -->
								<div class="row row-space-2">
									<!-- BEGIN col-4 -->
									<div class="col-sm-4">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/LbpHB9wbDhY?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-4 -->
									<!-- BEGIN col-4 -->
									<div class="col-sm-4">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/oVWBFkaXMyw?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-4 -->
									<!-- BEGIN col-4 -->
									<div class="col-sm-4">
										<div class="embed-responsive embed-responsive-16by9 m-b-2">
											<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/90PRvlhOLSk?showinfo=0"></iframe>
										</div>
									</div>
									<!-- END col-4 -->
								</div>
								<!-- END row -->
							</div>
							<!-- END tab-pane -->
							<!-- BEGIN tab-pane -->
							<div class="tab-pane fade" id="profile-friends">
								<div class="m-b-10"><b>Friend List (9)</b></div>
								<!-- BEGIN friend-list -->
								<ul class="friend-list clearfix">
									<li>
										<a href="#">
											<div class="friend-img"><img src="assets/img/user-2.jpg" alt="" /></div>
											<div class="friend-info">
												<h4>Sancho Aldo</h4>
												<p>392 friends</p>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="friend-img"><img src="assets/img/user-3.jpg" alt="" /></div>
											<div class="friend-info">
												<h4>Jonty Augusto</h4>
												<p>128 friends</p>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="friend-img"><img src="assets/img/user-4.jpg" alt="" /></div>
											<div class="friend-info">
												<h4>Androkles Allen</h4>
												<p>12 friends</p>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="friend-img"><img src="assets/img/user-5.jpg" alt="" /></div>
											<div class="friend-info">
												<h4>Ithamar Silvio</h4>
												<p>1,923 friends</p>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="friend-img"><img src="assets/img/user-6.jpg" alt="" /></div>
											<div class="friend-info">
												<h4>Denzel Annas</h4>
												<p>893 friends</p>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="friend-img"><img src="assets/img/user-7.jpg" alt="" /></div>
											<div class="friend-info">
												<h4>Kamil Cree</h4>
												<p>983 friends</p>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="friend-img"><img src="assets/img/user-8.jpg" alt="" /></div>
											<div class="friend-info">
												<h4>Fritjof Inderjit</h4>
												<p>3,321 friends</p>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="friend-img"><img src="assets/img/user-9.jpg" alt="" /></div>
											<div class="friend-info">
												<h4>Sushil Trygve</h4>
												<p>921 friends</p>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="friend-img"><img src="assets/img/user-10.jpg" alt="" /></div>
											<div class="friend-info">
												<h4>Frans Gebhard</h4>
												<p>944 friends</p>
											</div>
										</a>
									</li>
								</ul>
								<!-- END friend-list -->
							</div>
							<!-- END tab-pane -->
						</div>
						<!-- END tab-content -->
					</div>
					<!-- END col-8 -->
					<!-- BEGIN col-4 -->
					<div class="col-md-4 hidden-xs hidden-sm">
						<!-- BEGIN profile-info-list -->
						<ul class="profile-info-list">
							<li class="title">PERSONAL INFORMATION</li>
							<li>
								<div class="field">Occupation:</div>
								<div class="value">UXUI / Frontend Developer</div>
							</li>
							<li>
								<div class="field">Skills:</div>
								<div class="value">C++, PHP, HTML5, CSS, jQuery, MYSQL, Ionic, Laravel, Phonegap, Bootstrap, Angular JS, Angular JS, Asp.net</div>
							</li>
							<li>
								<div class="field">Birth of Date:</div>
								<div class="value">1989/11/04</div>
							</li>
							<li>
								<div class="field">Country:</div>
								<div class="value">San Francisco</div>
							</li>
							<li>
								<div class="field">Address:</div>
								<div class="value">
									<address class="m-b-0">
										Twitter, Inc.<br />
										1355 Market Street, Suite 900<br />
										San Francisco, CA 94103
									</address>
								</div>
							</li>
							<li>
								<div class="field">Phone No.:</div>
								<div class="value">
									(123) 456-7890
								</div>
							</li>
							<li class="title">FRIEND LIST (9)</li>
							<li class="img-list">
								<a href="#" class="m-b-5"><img src="assets/img/user-2.jpg" alt="" /></a>
								<a href="#" class="m-b-5"><img src="assets/img/user-3.jpg" alt="" /></a>
								<a href="#" class="m-b-5"><img src="assets/img/user-4.jpg" alt="" /></a>
								<a href="#" class="m-b-5"><img src="assets/img/user-5.jpg" alt="" /></a>
								<a href="#" class="m-b-5"><img src="assets/img/user-6.jpg" alt="" /></a>
								<a href="#" class="m-b-5"><img src="assets/img/user-7.jpg" alt="" /></a>
								<a href="#" class="m-b-5"><img src="assets/img/user-8.jpg" alt="" /></a>
								<a href="#" class="m-b-5"><img src="assets/img/user-9.jpg" alt="" /></a>
								<a href="#" class="m-b-5"><img src="assets/img/user-10.jpg" alt="" /></a>
							</li>
						</ul>
						<!-- END profile-info-list -->
					</div>
					<!-- END col-4 -->
				</div>
				<!-- END row -->
			</div>
			<!-- END profile-container -->
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