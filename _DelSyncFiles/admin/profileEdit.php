<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Profile Edit
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
$page = "app_profileEdit";
//////////////////////////////////////////
//////////////////////////////////////////
// load core intelligenza
require_once("scripts/inc.core.intelligenza.php");
//////////////////////////////////////////
// change pass
//////////////////////////////////////////
if(isset($_POST['btn_changePass'])) { 
	$okForm = false;
	$okNewPass = '';
	$passwordActuel = $_POST['passwordActuel'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	// anti hack
	$value = $password1;
	require("scripts/inc.core.antiHackPassword.php");
	$password1 = $value;
	$value = $password2;
	require("scripts/inc.core.antiHackPassword.php");
	$password2 = $value;
	//echo("success actuel ".md5($passwordActuel)." - pass user ".$passwordUser);exit(0);
	//(md5($passwordActuel));exit(" ".$passwordUser);
	// test if pass actuel match with passuser 
	if(md5($passwordActuel)==$passwordUser) {//exit('youpi');
		if((strlen($password1)<=24) && (strlen($password1)>=6) && ($password1==$password2)) {
			//////////////////////////////
			// check if demand secure password
			///////////////////////////////
			if($app_ifDemandSecurePassword=="yes") {//echo("success de");exit(0);
				$okCapital=false;
				$okMinuscule=false;
				$okNumber=false;
				$okCharaSpecial=false;
				if(preg_match('#^[^A-Z]*([A-Z].*)#',$password1)) { $okCapital=true;}
				if(preg_match('#^[^a-z]*([a-z].*)#',$password1)) { $okMinuscule=true;}
				if(preg_match('#^[^0-9]*([0-9].*)#',$password1)) { $okNumber=true;}		
				$i = 0;
				$ifFound = strstr($password1, '!'); if($ifFound!="") { $i+=1;}
				$ifFound = strstr($password1, '@'); if($ifFound!="") { $i+=1;}
				$ifFound = strstr($password1, '#'); if($ifFound!="") { $i+=1;}
				$ifFound = strstr($password1, '$'); if($ifFound!="") { $i+=1;}
				$ifFound = strstr($password1, '%'); if($ifFound!="") { $i+=1;}
				$ifFound = strstr($password1, '&'); if($ifFound!="") { $i+=1;}
				$ifFound = strstr($password1, '*'); if($ifFound!="") { $i+=1;}
				$ifFound = strstr($password1, '?'); if($ifFound!="") { $i+=1;}
				// !@#$%&*?
				if($i>=1) { $okCharaSpecial=true;}
				if(($okCapital==true) && ($okMinuscule==true) && ($okNumber==true) && ($okCharaSpecial==true)) { // nothing
					//exit('youpi2');
					$okNewPass = 'ok';
					// format pass md5
					$newPassword = md5($password1);
					// update bdd
					$connectDBIntelApp->exec("update members set password='$newPassword' where idMember='$idUser' limit 1");
					session_unset();
					$_SESSION['okAge']="ok";
					if(isset($_COOKIE['remember'])) { setcookie("remember", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
					if(isset($_COOKIE['rememberMe'])) { setcookie("rememberMe", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
					if(isset($_COOKIE['logOk'])) { setcookie("logOk", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
					header('location:'.$app_urlRoot.'/connect.php?reLog=2');
				}else {
					header('location:?editConnection=1&okNewPass=nok');
				}
			}else {
				//exit('youpi2');
				$okNewPass = 'ok';
				// format pass md5
				$newPassword = md5($password1);
				// update bdd
				$connectDBIntelApp->exec("update members set password='$newPassword' where idMember='$idUser' limit 1");
				session_unset();
				$_SESSION['okAge']="ok";
				if(isset($_COOKIE['remember'])) { setcookie("remember", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
				if(isset($_COOKIE['rememberMe'])) { setcookie("rememberMe", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
				if(isset($_COOKIE['logOk'])) { setcookie("logOk", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
				header('location:'.$app_urlRoot.'/connect.php?reLog=2');
			}
		}else {
			$okNewPass = 'nokn_';
			// noty errors
		header('location:?editConnection=1&okNewPass=nok');
		}
	}else {//echo("success nok");exit(0);
		// noty errors
		header('location:?editConnection=1&okNewPass=nok');
	}
}
?>
<?php
//////////////////////////////////////////
////////////////////////////////////////////////
// upload photos
////////////////////////////////////////////////
// fonction enregistre les nouvelles photos
if(isset($_POST['recPhotoUser'])) {
	// recup idRequest
	$idUser = $_POST['recPhotoUser'];
	$ds          = DIRECTORY_SEPARATOR;  //1
	$storeFolder = '../members/id_'.$idUser.'/img';   //2

	if (!empty($_FILES)) {
		$tempFile = $_FILES['file']['tmp_name'];          //3     
		$fileName = $_FILES['file']['name'];
		$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
		$targetFile =  $targetPath. $_FILES['file']['name'];  //5
		move_uploaded_file($tempFile,$targetFile); //6
		// insertion dans la base pour email c'est important
		$connectDBIntelApp->exec("insert into photos (photoName, idMember) value ('$fileName', '$idUser')");
	}
	//header("location:?#photos");
}
// ici si on veut effacer une photos
if(isset($_GET['suppPhoto'])) {
	//$idRequest = $_GET['id'];
	$fichier = $_GET['suppPhoto'];
	// supprime la photo dans la base
	$connectDBIntelApp->exec("delete from photos where idMember='$idUser' and photoName='$fichier' limit 1");
	// fait test si comme vignette
	$resultats=$connectDBIntelApp->query("select * from members_intel where idMember='$idUser' and avatar='$fichier'");
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	if( $unResultat = $resultats->fetch() ) {
		$connectDBIntelApp->exec("update members_intel set avatar='' where idMember='$idUser' limit 1");
	}
	// test si bg
	$resultats=$connectDBIntelApp->query("select * from members_intel where idMember='$idUser' and bgProfile='$fichier'");
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	if( $unResultat = $resultats->fetch() ) {
		$connectDBIntelApp->exec("update members_intel set bgMember='' where idMember='$idUser' limit 1");
	}
	// supprime photo en dur dans le dossier
	unlink("../members/id_".$idUser."/img/".$fichier."");
	header("location:?editPhoto=1");
}
////// defini vignette
if(isset($_GET['defAvatar'])) {
	$file = $_GET['defAvatar'];
	$idMember = $_GET['idMember'];
	
	$connectDBIntelApp->exec("update members_intel set avatar='$file' where idMember='$idMember' limit 1");
	header("location:?editPhoto=1"); 
}
////// defini defBgGirl
if(isset($_GET['defBg'])) {
	$file = $_GET['defBg'];
	$idMember = $_GET['idMember'];
	
	$connectDBIntelApp->exec("update members_intel set bgProfile='$file' where idMember='$idMember' limit 1");
	header("location:?editPhoto=1"); 
}
////// supp avatar
if(isset($_GET['suppAvatar'])) {
	$connectDBIntelApp->exec("update members_intel set avatar='$file' where idMember='$idUser' limit 1");
	header("location:?editPhoto=1"); 
}
////// supp bg
if(isset($_GET['suppBg'])) {
	$connectDBIntelApp->exec("update members_intel set bgProfile='$file' where idMember='$idUser' limit 1");
	header("location:?editPhoto=1"); 
}
?>
<?php
////////////////////////////////////////////
// gestion des galeries
////////////////////////////////////////////
if(isset($_POST['rec_newGallery'])) {
	$nameNewGallery = $_POST['nameNewGallery'];
	$descriptionNewGallery = $_POST['description'];
	if($nameNewGallery!="") {
		// insert new entery 
		$connectDBIntelApp->exec("insert into galleries (dateCreation, idMember, name, description) value ('NOW()', '$idUser', '$nameNewGallery', '$descriptionNewGallery')");
		$lastId = $connectDBIntelApp->lastInsertId();
		// create new folder
		mkdir ("../members/id_$idUser/photo/gallery_$lastId");
		chmod ("../members/id_$idUser/photo/gallery_$lastId", 0755);

		$_SESSION['editGallery'] = $lastId;
	}
	
	header("location:?editPhoto=1"); 
}
if(isset($_GET['editGallery'])) {
	$idGallery = $_GET['editGallery'];
	$_SESSION['editGallery'] = $idGallery;
	
	header("location:?editPhoto=1");
}
if(isset($_POST['recPhotoGallery'])) {
	// recup idRequest
	$idGallery = $_POST['recPhotoGallery'];
	$ds          = DIRECTORY_SEPARATOR;  //1
	$storeFolder = '../members/id_'.$idUser.'/photo/gallery_'.$idGallery.'';   //2

	if (!empty($_FILES)) {
		$tempFile = $_FILES['file']['tmp_name'];          //3     
		$fileName = $_FILES['file']['name'];
		$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
		$targetFile =  $targetPath. $_FILES['file']['name'];  //5
		move_uploaded_file($tempFile,$targetFile); //6
		// insertion dans la base pour email c'est important
		$connectDBIntelApp->exec("insert into photos (photoName, idMember, idGallery) value ('$fileName', '$idUser', '$idGallery')");
	}
}
if(isset($_GET['suppPhotoGallery'])) {
	//$idRequest = $_GET['id'];
	$fichier = $_GET['suppPhotoGallery'];
	$idGallery = $_GET['idGallery'];
	// supprime la photo dans la base
	$connectDBIntelApp->exec("delete from photos where idMember='$idUser' and photoName='$fichier' limit 1");
	
	// supprime photo en dur dans le dossier
	unlink("../members/id_".$idUser."/photo/gallery_".$idGallery."/".$fichier."");
	header("location:?editPhoto=1");
}
if(isset($_GET['suppGallery'])) {
	//$idRequest = $_GET['id'];
	$idGallery = $_GET['suppGallery'];
	// supprime la photo dans la base
	$connectDBIntelApp->exec("delete from galleries where idMember='$idUser' and idGallery='$idGallery' limit 1");
	// supprime photo en dur dans le dossier et le dossier
	delete_directory("../members/id_".$idUser."/photo/gallery_".$idGallery."");
	// delete photos in db photo
	$resultats=$connectDBIntelApp->query("select * from photos where idGallery='$idGallery'");
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	while( $unResultat = $resultats->fetch() ) {
		$idPhoto = $unResultat->idPhoto;
		$connectDBIntelApp->exec("delete from photos where idGallery='$idGallery' and idPhoto='$idPhoto'");
	}
	// unset edit galerie
	unset($_SESSION['editGallery']);
	header("location:?editPhoto=1");
}
?>
<?php
///////////////////////////////////////////
// new video
if(isset($_POST['rec_newVideo'])) {
	$iframe = $_POST['iframe'];
	// no test free
	$connectDBIntelApp->exec("insert into videos (iframe, idMember) value ('$iframe', '$idUser')");
	header("location:?editVideo=1");
}
///////////////////////////////////////////
// supp video
if(isset($_GET['suppVideo'])) {
	$idVideo = $_GET['suppVideo'];
	$connectDBIntelApp->exec("delete from videos where idVideo='$idVideo' and idMember='$idUser'");
	header("location:?editVideo=1");
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo($_SESSION['language']);?>">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo($app_nameProject);?> | Profile Edit</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("scripts/cp/inc.template_head.php");?>
	
	<!-- upload fichier -->
	<link rel="stylesheet" href="../css/dropzone.css" />
	<style>
		.dz-image-preview  {
			width: 180px;
			height: 180px;
		}
		.dz-progress .dz-upload {
			height: 80px;
		}
	</style>
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
							<?php if($app_avatarProfile!="") {// user doesn't have own avatar?>
								<img src="<?php echo($app_urlRoot);// choice admin?>/images/logo/<?php echo($app_avatarProfile);?>" alt="" />
							<?php }else {?>
								<img src="<?php echo($app_urlRoot);// default?>/img/avatar.png" alt="" />
							<?php }?>
						<?php }?>
					</div>
					<!-- END profile-header-img -->
					<!-- BEGIN profile-header-info -->
					<div class="profile-header-info">
						<h4 class="m-t-sm" id="pseudoUser"><?php echo($pseudoUser);?></h4>
						<p class="m-b-sm"><?php echo($rightsUser);?> <?php echo($subRightsUser);?><br>
							<span id="jobUser"><?php echo($jobUser);?></span>
						</p>
					</div>
					<!-- END profile-header-info -->
				</div>
				<!-- END profile-header-content -->
				<!-- BEGIN profile-header-tab -->
				<ul class="profile-header-tab nav nav-tabs">
					<!--<li class="nav-item"><a href="#profile-post" class="nav-link" data-toggle="tab">POSTS</a></li>-->
					<li class="nav-item"><a href="#profile-about" class="nav-link <?php if((!isset($_GET['editPhoto']))&&(!isset($_GET['editVideo']))&&(!isset($_GET['editConnection']))) {?>active<?php }?>" data-toggle="tab">ABOUT</a></li>
					<li class="nav-item"><a href="#profile-photos" class="nav-link <?php if(isset($_GET['editPhoto'])) {?>active<?php }?>" data-toggle="tab">PHOTOS</a></li>
					<li class="nav-item"><a href="#profile-videos" class="nav-link <?php if(isset($_GET['editVideo'])) {?>active<?php }?>" data-toggle="tab">VIDEOS</a></li>
					<li class="nav-item"><a href="#profile-connection" class="nav-link <?php if(isset($_GET['editConnection'])) {?>active<?php }?>" data-toggle="tab">CONNECTION</a></li>
					<!--<li class="nav-item"><a href="#profile-friends" class="nav-link" data-toggle="tab">FRIENDS</a></li>-->
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
							<div class="tab-pane fade <?php if(isset($_GET['editPost'])) {?>in active<?php }?>" id="profile-post">
								<?php 
									require_once("scripts/cp/inc.profile_posts.php");
								?>
							</div>
							<!-- END tab-pane -->
							<!-- BEGIN tab-pane -->
							<div class="tab-pane fade <?php if((!isset($_GET['editPhoto'])) && (!isset($_GET['editVideo'])) &&(!isset($_GET['editConnection']))) {?>in active<?php }?>" id="profile-about">
								<?php 
									require_once("scripts/cp/inc.profile_about.php");
								?>
							</div>
							<!-- END tab-pane -->
							<!-- BEGIN tab-pane -->
							<div class="tab-pane fade <?php if(isset($_GET['editPhoto'])) {?>in active<?php }?>" id="profile-photos">
							<?php 
								require_once("scripts/cp/inc.profile_gallery.php");
							?>	
							<?php 
								require_once("scripts/cp/inc.profile_avatarBg.php");
							?>
							</div>
							<!-- END tab-pane -->
							<!-- BEGIN tab-pane -->
							<div class="tab-pane fade <?php if(isset($_GET['editVideo'])) {?>in active<?php }?>" id="profile-videos">
							<?php 
								require_once("scripts/cp/inc.profile_video.php");
							?>
							</div>
							<!-- END tab-pane -->
							<!-- BEGIN tab-pane -->
							<div class="tab-pane fade <?php if(isset($_GET['editFriends'])) {?>in active<?php }?>" id="profile-friends">
							<?php 
								require_once("scripts/cp/inc.profile_friends.php");
							?>
							</div>
							<!-- END tab-pane -->
							<!-- BEGIN tab-pane -->
							<div class="tab-pane fade <?php if(isset($_GET['editConnection'])) {?>in active<?php }?>" id="profile-connection">
							<?php 
								require_once("scripts/cp/inc.profile_connection.php");
							?>
							</div>
							<!-- END tab-pane -->
						</div>
						<!-- END tab-content -->
					</div>
					<!-- END col-8 -->
					<!-- BEGIN col-4 -->
					<div class="col-md-4 hidden-xs_ hidden-sm_">
						
						<!-- BEGIN profile-info-list -->
						<ul class="profile-info-list">
							<table class="table table-profile">
								<thead>
									<tr>
										<th colspan="2">Privacy <?php echo($pseudoUser);?></th>
									</tr>
								</thead>
								<tbody>
								<tr>
									<td class="field">Transparency</td>
									<td class="value">
										<a href="creapdf/pdf/privacyUser.php"><img src="../img/pdf-white.png" width="24" height="24" alt=""/></a>
									
									</td>
								</tr>
								</tbody>
							</table>
							
				
							<div class="panel-body">
							<!-- BEGIN panel-group -->
							<div class="panel-group" id="accordion">
								<!-- BEGIN panel -->
								<div class="panel panel-default panel-bordered">
									<!-- BEGIN panel-heading -->
									<div class="panel-heading" id="headingOne">
										<h4 class="panel-title">
											<a href="#collapseOne" class="accordion-link" data-toggle="collapse" data-parent="#accordion">
												General
											</a>
										</h4>
									</div>
									<!-- END panel-heading -->
									<!-- BEGIN panel-collapse -->
									<div id="collapseOne" class="panel-collapse collapse">
										
										<table class="table table-profile">
											<tbody>
											<tr>
												<td class="field">All Private</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifPublicProfile" id="ifPublicProfile" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifPublicProfile');" <?php if($ifPublicProfileUser!="yes") {?>checked<?php }?> />
													<label for="ifPublicProfile"></label>
													</div>
												</td>
											</tr>
											</tbody>
										</table>
										
									</div>
									<!-- END panel-collapse -->
								</div>
								<!-- END panel -->
								<!-- BEGIN panel -->
								<div class="panel panel-default panel-bordered">
									<!-- BEGIN panel-heading -->
									<!--<div class="panel-heading" id="headingTwo">
										<h4 class="panel-title">
											<a href="#collapseTwo" class="accordion-link collapsed" data-toggle="collapse" data-parent="#accordion">
												Posts
											</a>
										</h4>
									</div>-->
									<!-- END panel-heading -->
									<!-- BEGIN panel-collapse -->
									<div id="collapseTwo" class="panel-collapse collapse">
										<table class="table table-profile">
											<tbody>
											<tr>
												<td class="field">Public</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifPublicPost" id="ifPublicPost" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifPublicPost');" <?php if($ifPublicPostUser!="yes") {?>checked<?php }?> />
													<label for="ifPublicPost"></label>
													</div>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
									<!-- END panel-collapse -->
								</div>
								<!-- END panel -->
								<!-- BEGIN panel -->
								<div class="panel panel-default panel-bordered">
									<!-- BEGIN panel-heading -->
									<div class="panel-heading" id="headingThree">
										<h4 class="panel-title">
											<a href="#collapseThree" class="accordion-link collapsed" data-toggle="collapse" data-parent="#accordion">
												About
											</a>
										</h4>
									</div>
									<!-- END panel-heading -->
									<!-- BEGIN panel-collapse -->
									<div id="collapseThree" class="panel-collapse collapse">
										<table class="table table-profile">
											<tbody>

											<tr>
												<td class="field">Function</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowFonction" id="ifShowFonction" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowFonction');" <?php if($ifShowFonctionUser!="yes") {?>checked<?php }?> />
													<label for="ifShowFonction"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Skills</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSkills" id="ifShowSkills" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowSkills');" <?php if($ifShowSkillsUser!="yes") {?>checked<?php }?> />
													<label for="ifShowSkills"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Age</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowAge" id="ifShowAge" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowAge');" <?php if($ifShowAgeUser!="yes") {?>checked<?php }?> />
													<label for="ifShowAge"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Sex</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSex" id="ifShowSex" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowSex');" <?php if($ifShowSexUser!="yes") {?>checked<?php }?> />
													<label for="ifShowSex"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Sports</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSports" id="ifShowSports" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowSports');" <?php if($ifShowSportsUser!="yes") {?>checked<?php }?> />
													<label for="ifShowSports"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Hobbies</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowHobbies" id="ifShowHobbies" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowHobbies');" <?php if($ifShowHobbiesUser!="yes") {?>checked<?php }?> />
													<label for="ifShowHobbies"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Phone Perso</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowPhonePerso" id="ifShowPhonePerso" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowPhonePerso');" <?php if($ifShowPhonePersoUser!="yes") {?>checked<?php }?> />
													<label for="ifShowPhonePerso"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Phone Pro</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowPhonePro" id="ifShowPhonePro" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowPhonePro');" <?php if($ifShowPhoneProUser!="yes") {?>checked<?php }?> />
													<label for="ifShowPhonePro"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Skype</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSkype" id="ifShowSkype" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowSkype');" <?php if($ifShowSkypeUser!="yes") {?>checked<?php }?> />
													<label for="ifShowSkype"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Website Perso</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowWebsitePerso" id="ifShowWebsitePerso" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowWebsitePerso');" <?php if($ifShowWebsitePersoUser!="yes") {?>checked<?php }?> />
													<label for="ifShowWebsitePerso"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Website Pro</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowWebsitePro" id="ifShowWebsitePro" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowWebsitePro');" <?php if($ifShowWebsiteProUser!="yes") {?>checked<?php }?> />
													<label for="ifShowWebsitePro"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Social link 1</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSocialLink1" id="ifShowSocialLink1" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowSocialLink1');" <?php if($ifShowSocialLink1User!="yes") {?>checked<?php }?> />
													<label for="ifShowSocialLink1"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Social link 2</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSocialLink2" id="ifShowSocialLink2" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowSocialLink2');" <?php if($ifShowSocialLink2User!="yes") {?>checked<?php }?> />
													<label for="ifShowSocialLink2"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Social link 3</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowSocialLink3" id="ifShowSocialLink3" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowSocialLink3');" <?php if($ifShowSocialLink3User!="yes") {?>checked<?php }?> />
													<label for="ifShowSocialLink3"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Name</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowName" id="ifShowName" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowName');" <?php if($ifShowNameUser!="yes") {?>checked<?php }?> />
													<label for="ifShowName"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Phone</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowPhone" id="ifShowPhone" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowPhone');" <?php if($ifShowPhoneUser!="yes") {?>checked<?php }?> />
													<label for="ifShowPhone"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Entry Code</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowEntryCode" id="ifShowEntryCode" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowEntryCode');" <?php if($ifShowEntryCodeUser!="yes") {?>checked<?php }?> />
													<label for="ifShowEntryCode"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Street</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowStreet" id="ifShowStreet" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowStreet');" <?php if($ifShowStreetUser!="yes") {?>checked<?php }?> />
													<label for="ifShowStreet"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Zip Code</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowZipCode" id="ifShowZipCode" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowZipCode');" <?php if($ifShowZipCodeUser!="yes") {?>checked<?php }?> />
													<label for="ifShowZipCode"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">City</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowCity" id="ifShowCity" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowCity');" <?php if($ifShowCityUser!="yes") {?>checked<?php }?> />
													<label for="ifShowCity"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">State</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowState" id="ifShowState" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowState');" <?php if($ifShowStateUser!="yes") {?>checked<?php }?> />
													<label for="ifShowState"></label>
												</div>
												</td>
											</tr>
											<tr>
												<td class="field">Country</td>
												<td class="value">
													<div class="switcher switcher-danger">
													<input type="checkbox" name="ifShowCountry" id="ifShowCountry" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifShowCountry');" <?php if($ifShowCountryUser!="yes") {?>checked<?php }?> />
													<label for="ifShowCountry"></label>
												</div>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
									<!-- END panel-collapse -->
								</div>
								<!-- END panel -->
							</div>
							<!-- END panel-group -->
						</div>
							
				
				
							
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