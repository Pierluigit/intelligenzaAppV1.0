<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Member Management
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
$page = "app_admin_members";
//////////////////////////////////////////
//////////////////////////////////////////
// load core intelligenza
require_once("scripts/inc.core.intelligenza.php");
//mail("pierluigi.neva@gmail.com","coucou test envois emai","youpi success sa marche",'-f '.$app_emailContactProject.'');
//exit(0);
/////////////////////////////////////////////
// add member
if(isset($_POST['btn_addMember'])) { 
	$pseudoInscrit = $_POST['pseudo'];
	$emailInscrit = $_POST['emailInscription'];
	// test email
	$okMailInscrit = true;
	if (!preg_match("/^[\w\.\w]+@[\w\.-]+\.[a-z]{2,10}$/i", $emailInscrit) ) {
		$okMailInscrit = false;
	}
	// test si existe deja dans la base 
	$dbRequest=$connectDBIntelApp->query("select * from members where email='$emailInscrit'");
	$dbRequest->setFetchMode(PDO::FETCH_OBJ);
	if( $getResult = $dbRequest->fetch() ) {	
		$okMailInscrit = false;
	}
	
	// test nom 
	$okPseudoInscrit = true;
	if((strlen($pseudoInscrit)<2) || (strlen($pseudoInscrit)>24)) {
		$okPseudoInscrit = false;
	}else {
		// test si existe deja dans la base 
		$dbRequest=$connectDBIntelApp->query("select * from members where pseudo='$pseudoInscrit'");
		$dbRequest->setFetchMode(PDO::FETCH_OBJ);
		if( $getResult = $dbRequest->fetch() ) {	
			$okPseudoInscrit = false;
		}
		// 2eme test if blackliste pseudo
		$dbRequestBL=$connectDBIntelApp->query("select * from site_blackList_pseudo where pseudo='$pseudoInscrit'");
		$dbRequestBL->setFetchMode(PDO::FETCH_OBJ);
		if( $getResult = $dbRequestBL->fetch() ) {	
			$okPseudoInscrit = false;
		}
	}
	// genere une key unique pour validation de l'email par user
	$validationEmailCode = md5(rand(00000001, 99999999));
	// secure password
	$securePassword = generateStrongPassword();
	$passwordInscrit = md5($securePassword);
	// test avant insertion dans la base 
	if(($okMailInscrit==true) && ($okPseudoInscrit==true)) {
		// inserer membre
		$connectDBIntelApp->exec("insert into members (validationEmailCode, pseudo, email, ifEmailConfirmed, password) value ('$validationEmailCode', '$pseudoInscrit', '$emailInscrit', 'no', '$passwordInscrit')");
		// recupere l'id de la derniere entree
		$lastId = $connectDBIntelApp->lastInsertId();
		// translate
		require_once("scripts/inc.core.languagesTranslation.handler.php");
		// envois email
		require_once("scripts/inc.core.email.addNewMember.php");
		
		header("location:?whileMembers=1");
	}else {
		// erreur
		header("location:?addMember=1&error");
	}
	
}
/////////////////////////////////////////////
// edit member
if(isset($_GET['editMember'])) {
	$_SESSION['editMember'] = $_GET['editMember'];
	header("location:?");
}
// back admin
if(isset($_GET['backAdmin'])) {
	unset($_SESSION['editMember']);
	header("location:?");
}
/////////////////////////////////////////////
// delete member info popup
if(isset($_GET['suppMember'])) {
	// lauch popup
	$_SESSION['suppMember'] = $_GET['suppMember'];
	header("location:?");
}
// cancelDeleteMember
if(isset($_GET['cancelDeleteMember'])) {
	unset($_SESSION['suppMember']);
	header("location:?");
}
////////////////////////
// permanentlyDeleteMember
if(isset($_GET['permanentlyDeleteMember'])) { 
	$idMember = $_SESSION['suppMember'];
	// delete member
	$connectDBIntelApp->exec("delete from members where idMember='$idMember' limit 1");
	// delete member_intel
	$connectDBIntelApp->exec("delete from members_intel where idMember='$idMember' limit 1");
	// delete members_friends
	$dbRequest=$connectDBIntelApp->query("select * from members_friends where idMember='$idMember'");
	$dbRequest->setFetchMode(PDO::FETCH_OBJ);
	while( $getResult = $dbRequest->fetch() ) {
		$id = $getResult->id;
		$connectDBIntelApp->exec("delete from members_friends where id='$id' limit 1");
	}
	// delete address
	$connectDBIntelApp->exec("delete from address where idMember='$idMember' and type='home' limit 1");
	$connectDBIntelApp->exec("delete from address where idMember='$idMember' and type='billing' limit 1");
	$connectDBIntelApp->exec("delete from address where idMember='$idMember' and type='delivery' limit 1");
	// delete wallet
	$connectDBIntelApp->exec("delete from admin_wallets where idMember='$idMember' limit 1");
	// delete wallet movement
	$dbRequest=$connectDBIntelApp->query("select * from admin_wallets_movements where idMember='$idMember'");
	$dbRequest->setFetchMode(PDO::FETCH_OBJ);
	while( $getResult = $dbRequest->fetch() ) {
		$idWalletMovment = $getResult->idWalletMovment;
		$connectDBIntelApp->exec("delete from admin_wallets_movements where idWalletMovment='$idWalletMovment' limit 1");
	}
	
	// delete galleries
	$dbRequest=$connectDBIntelApp->query("select * from galleries where idMember='$idMember'");
	$dbRequest->setFetchMode(PDO::FETCH_OBJ);
	while( $getResult = $dbRequest->fetch() ) {
		$idGallery = $getResult->idGallery;
		$connectDBIntelApp->exec("delete from galleries where idGallery='$idGallery' limit 1");
	}
	
	// delete photos db
	$dbRequest=$connectDBIntelApp->query("select * from photos where idMember='$idMember'");
	$dbRequest->setFetchMode(PDO::FETCH_OBJ);
	while( $getResult = $dbRequest->fetch() ) {
		$idPhoto = $getResult->idPhoto;
		$connectDBIntelApp->exec("delete from photos where idPhoto='idPhoto' limit 1");
	}
	
	// delete videos
	$dbRequest=$connectDBIntelApp->query("select * from videos where idMember='$idMember'");
	$dbRequest->setFetchMode(PDO::FETCH_OBJ);
	while( $getResult = $dbRequest->fetch() ) {
		$idVideo = $getResult->idVideo;
		$connectDBIntelApp->exec("delete from videos where idVideo='$idVideo' limit 1");
	}
	// delete site_noty
	// delete admin_abo
	// delete admin_bill
	// delete admin_psp
	// delete comments
	// delete comments_votes
	// delete labels
	// delete labels_customers
	// delete labels_sellPoints
	// delete markers
	// delete orders
	// delete partners
	// delete posts
	// delete products
	// delete requests
	// delete sellPoints
	
	// delete folder
	deleteDirectory("../members/id_".$idMember."");
	///////////////////////////////////////////////
	// delete session delete
	unset($_SESSION['suppMember']);
	// send email ok delete
	
	// reload page
	header("location:?whileMembers=1");
}
//////////////////////////////////////////////////
// block user
/////////////////////////////////////////////
// block member info popup
if(isset($_GET['blockId'])) {
	// lauch popup inc.noty.php
	$_SESSION['blockId'] = $_GET['blockId'];
	header("location:?");
}
// cancelDeleteMember
if(isset($_GET['cancelBlockMember'])) {
	unset($_SESSION['blockId']);
	header("location:?");
}
////////////////////////
// block member
if(isset($_POST['blockMember'])) {
	$emailBlock = $_POST['emailBlock'];
	$ipBlock = $_POST['ipBlock'];
	$howLongBlock = $_POST['howLong'];
	$idMemberBlock = $_SESSION['blockId'];
	// if is forever blacklist email
	if($howLongBlock!="forever") {
		$connectDBIntelApp->exec("insert into site_blackList_user (ipUser, idMember, howLong) value ('$ipUser', '$idMemberBlock', '$howLongBlock')");// 86400
	}else {
		$connectDBIntelApp->exec("insert into site_blackList_email (email) value ('$emailBlock')");// 86400
	}
	
	
	unset($_SESSION['blockId']);
	header("location:?");
}
//////////////////////////
// deblock
if(isset($_GET['deBlockMember'])) {
	$idMember = $_GET['deBlockMember'];
	$connectDBIntelApp->exec("delete from site_blackList_user where idMember='$idMember' limit 1");
	header("location:?");
}
//

//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// add pseudo reserved
//////////////////////////////////////////////////////////////////
if(isset($_POST['btn_addNewPseudoReserved'])) {
	$newPseudoReserved = $_POST['newPseudoReserved'];
	$connectDBIntelApp->exec("insert into site_blackList_pseudo (pseudo) value ('$newPseudoReserved')");// 86400
	header("location:?whilePseudo=1");
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// supp pseudo reserved
//////////////////////////////////////////////////////////////////
if(isset($_GET['suppPseudoReserved'])) {
	$idPseudoReserved = $_GET['suppPseudoReserved'];
	$connectDBIntelApp->exec("delete from site_blackList_pseudo where idBlackListePseudo='$idPseudoReserved' limit 1");
	header("location:?whilePseudo=1");
}

//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// add email blacklisted 
//////////////////////////////////////////////////////////////////
if(isset($_POST['btn_addNewEmailBlacklisted'])) {
	$newEmailBlacklisted = $_POST['newEmailBlacklisted'];
	if (preg_match("/^[\w\.\w]+@[\w\.-]+\.[a-z]{2,10}$/i", $newEmailBlacklisted) ) {
		$newEmailBlacklisted = strtolower($newEmailBlacklisted);// met tout en minuscule, strtoupper() fais l'inverse
		$connectDBIntelApp->exec("insert into site_blackList_email (email) value ('$newEmailBlacklisted')");// 86400
		header("location:?whileEmail=1");
	}
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// supp email blacklisted
//////////////////////////////////////////////////////////////////
if(isset($_GET['suppEmailBlacklisted'])) {
	$idSuppEmailBlacklisted = $_GET['suppEmailBlacklisted'];
	$connectDBIntelApp->exec("delete from site_blackList_email where idEmailBlackListed='$idSuppEmailBlacklisted' limit 1");
	header("location:?whileEmail=1");
}

//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// add Banned Word
//////////////////////////////////////////////////////////////////
if(isset($_POST['btn_addNewBannedWord'])) {
	$newBannedWord = $_POST['newBannedWord'];
	if (strlen($newBannedWord)>=3) {
		$newBannedWord = strtoupper($newBannedWord);// met tout en minuscule, strtoupper() fais l'inverse
		$connectDBIntelApp->exec("insert into site_blackList_words (word) value ('$newBannedWord')");// 86400
		header("location:?whileBannedWords=1");
	}
}
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// supp Banned Word
//////////////////////////////////////////////////////////////////
if(isset($_GET['suppBannedWord'])) {
	$idSuppBannedWord = $_GET['suppBannedWord'];
	$connectDBIntelApp->exec("delete from site_blackList_words where idWordBlackListed='$idSuppBannedWord' limit 1");
	header("location:?whileBannedWords=1");
}

//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// manage session edit member
//////////////////////////////////////////////////////////////////
if((isset($_GET['whileMembers'])) || (isset($_GET['whilePseudo'])) || (isset($_GET['whileEmail'])) || (isset($_GET['whileBannedWords'])) || (isset($_GET['addMember']))) {
	if(isset($_SESSION['editMember'])) { unset($_SESSION['editMember']);}
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo($_SESSION['language']);?>">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo($nameProject);?> | Admin Members</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("scripts/cp/inc.template_head.php");?>
	<link href="assets/plugins/map/jquery-jvectormap/jquery-jvectormap.css" rel="stylesheet" />
	
	
	
	<style>
		table.dataTable tbody tr.odd {
			
		}
		table.dataTable tbody tr.even {
			
		}
		table.dataTable tbody tr .sorting_1 {
			
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
				<li class="breadcrumb-item active">Manage Members</li>
			</ul>
			<!-- END breadcrumb -->
			<h1 class="page-header">
				Manage <?php echo($app_totalMembers);?> Members <small>/ <?php echo($app_totalAdministrator);?> Administrators</small>
			</h1>
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						<!-- BEGIN widget -->
						<a href="?whileMembers=1" class="widget widget-stats bg-gradient-blue inverse-mode">
							<div class="widget-stats-left">
								<div class="widget-stats-title">Total Members</div>
							</div>
							<div class="widget-stats-right">
								<div class="widget-stats-value">
									<?php echo($app_totalMembers);?>
								</div>
								<div class="widget-desc">Today, <?php echo($dateNow);?></div>
							</div>
						</a>
						<!-- END widget -->
					</div>
					<div class="col-md-3">
						<!-- BEGIN widget -->
						<a href="?addMember=1" class="widget widget-stats bg-gradient-green inverse-mode">
							<div class="widget-stats-left">
								<div class="widget-stats-title">Invite Friends</div>
							</div>
							<div class="widget-stats-right">
								<div class="widget-stats-value">
									+
								</div>
								<div class="widget-desc">Today, <?php echo($dateNow);?></div>
							</div>
						</a>
						<!-- END widget -->
					</div>
					<div class="col-md-3">
						<!-- BEGIN widget -->
						<a href="?whilePseudo=1" class="widget widget-stats bg-gradient-orange inverse-mode">
							<div class="widget-stats-left">
								<div class="widget-stats-title">Pseudo Reserved</div>
							</div>
							<div class="widget-stats-right">
								<div class="widget-stats-value">
									<?php echo($app_totalPseudoReserved);?>
								</div>
								<div class="widget-desc">Today, <?php echo($dateNow);?></div>
							</div>
						</a>
						<!-- END widget -->
					</div>
					<div class="col-md-3">
						<!-- BEGIN widget -->
						<a href="?whileEmail=1" class="widget widget-stats bg-gradient-red inverse-mode">
							<div class="widget-stats-left">
								<div class="widget-stats-title">Email Blocked</div>
							</div>
							<div class="widget-stats-right">
								<div class="widget-stats-value">
									<?php echo($app_totalEmailBlacklisted);?>
								</div>
								<div class="widget-desc">Today, <?php echo($dateNow);?></div>
							</div>
						</a>
						<!-- END widget -->
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						<!-- BEGIN widget -->
						<!--<a href="?whileMembers=1" class="widget widget-stats bg-gradient-blue inverse-mode">
							<div class="widget-stats-left">
								<div class="widget-stats-title">Total Members</div>
							</div>
							<div class="widget-stats-right">
								<div class="widget-stats-value">
									<?php //echo($app_totalMembers);?>
								</div>
								<div class="widget-desc">Today, <?php //echo($dateNow);?></div>
							</div>
						</a>-->
						<!-- END widget -->
					</div>
					<div class="col-md-3">
						<!-- BEGIN widget -->
						<!--<a href="?addMember=1" class="widget widget-stats bg-gradient-green inverse-mode">
							<div class="widget-stats-left">
								<div class="widget-stats-title">Invite Friends</div>
							</div>
							<div class="widget-stats-right">
								<div class="widget-stats-value">
									+
								</div>
								<div class="widget-desc">Today, <?php //echo($dateNow);?></div>
							</div>
						</a>-->
						<!-- END widget -->
					</div>
					<div class="col-md-3">
						<!-- BEGIN widget -->
						<!--<a href="?whilePseudo=1" class="widget widget-stats bg-gradient-orange inverse-mode">
							<div class="widget-stats-left">
								<div class="widget-stats-title">Pseudo Reserved</div>
							</div>
							<div class="widget-stats-right">
								<div class="widget-stats-value">
									<?php //echo($app_totalPseudoReserved);?>
								</div>
								<div class="widget-desc">Today, <?php //echo($dateNow);?></div>
							</div>
						</a>-->
						<!-- END widget -->
					</div>
					<div class="col-md-3">
						<!-- BEGIN widget -->
						<a href="?whileBannedWords=1" class="widget widget-stats bg-gradient-red inverse-mode">
							<div class="widget-stats-left">
								<div class="widget-stats-title">Banned Words</div>
							</div>
							<div class="widget-stats-right">
								<div class="widget-stats-value">
									<?php echo($app_totalBannedWords);?>
								</div>
								<div class="widget-desc">Today, <?php echo($dateNow);?></div>
							</div>
						</a>
						<!-- END widget -->
					</div>
				</div>
			</div>
			<br><br>
			
			
			
			
			
			
			
			<?php
			/////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////
			// stats members
			/////////////////////////////////////////////////////////////
			if( (!isset($_SESSION['editMember'])) && (!isset($_GET['addMember'])) && (!isset($_GET['whileMembers'])) && (!isset($_GET['whileEmail'])) && (!isset($_GET['whilePseudo']))) {?>
			
			
			<?php }?>
			
			
			
			
			
			
			<?php
			/////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////
			// add member
			/////////////////////////////////////////////////////////////
			if(isset($_GET['addMember'])) {?>
			<h4>Add User</h4><br>
			<form action="?" method="POST" name="register_form">
				<div class="form-group">
					<label class="control-label">Name <span class="text-danger">*</span></label>
					<input tabindex="1" type="text" class="form-control" name="pseudo" id="pseudo" onKeyUp="checkPseudo();" onChange="checkPseudo();" onKeyBlur="checkPseudo();" type="text" <?php if((isset($_POST['btn_signup'])) && ($okPseudoInscrit==false)) {?> style="border: 3px solid #e88d3c;" <?php }?> value="<?php echo($_POST['pseudo']);?>" placeholder="Public Nickname" maxlength="40" required />
					<span id="confirm_pseudo">&emsp;</span>
					<br>
					<label class="control-label">Email Address <span class="text-danger">*</span></label>
					<input class="form-control" name="emailInscription" id="emailInscription" type="email" tabindex="2" value="<?php echo($_POST['emailInscription']);?>" <?php if((isset($_POST['btn_signup'])) && ($okMailInscrit==false)) {?> style="border: 3px solid #e88d3c;" <?php }?> placeholder="ID" required>
				</div>
				<button type="submit" name="btn_addMember" class="btn btn-primary btn-block">Add Member</button>
			</form>
			<br><br>
			<?php }?>
			
			<?php
			/////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////
			// edit member
			/////////////////////////////////////////////////////////////
			if(isset($_SESSION['editMember'])) {
					$idMember = $_SESSION['editMember'];
					// recup infos
					require_once("scripts/inc.core.get.valueMember.php");
					require_once("scripts/inc.core.get.valueIntelMember.php");
					require_once("scripts/inc.core.get.valueAddressMember.php");
					// form 
					require_once("scripts/cp/inc.admin.profile_about.php");
			}// fin edit member?>
			
			<?php 
			/////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////
			// while members
			/////////////////////////////////////////////////////////////
			if(isset($_GET['whileMembers'])) {unset($_SESSION['editMember']);?>
			<h4>Members</h4><br>
			<table id="table_members" class="display compact inverse" style="width:100%">
			<thead>
				<tr>
					<th>Actions</th>
					<th>Avatar</th>
					<th>Name</th>
					<th>Job</th>
					<th>Skills</th>
					<th>Age</th>
					<th>Sex</th>
					<th>Since</th>
					<th>Supp.</th>
				</tr>
			</thead>
			<tbody>
				<?php // liste seulement les tickets de la personne logée
				$dbRequest=$connectDBIntelApp->query("select * from members order by idMember desc");
				$dbRequest->setFetchMode(PDO::FETCH_OBJ);
				while( $getResult = $dbRequest->fetch() ) {
					$idMember = $getResult->idMember;
					$pseudoMember = $getResult->pseudo;
					$phonePersoMember = $getResult->phonePerso;
					$phoneProMember = $getResult->phonePro;
					$jobMember = $getResult->job;
					$skillsMember = $getResult->skills;
					$ageMember = $getResult->age;
					$sexMember = $getResult->sex;
					$emailMember = $getResult->email;
					$ifEmailConfirmedMember = $getResult->ifEmailConfirmed;
					$websitePersoMember = $getResult->websitePerso;
					
					
					// if member is blocked
					/*$dbRequestIsBlocked=$connectDBIntelApp->query("select * from site_blacklist_email where email='$emailMember'");
					$dbRequestIsBlocked->setFetchMode(PDO::FETCH_OBJ);
					if( $getResult = $dbRequestIsBlocked->fetch() ) {	
						$ifMemberIsBlocked = true;
					}*/
					
					$dbRequest_intel=$connectDBIntelApp->query("select * from members_intel where idMember='$idMember'");
					$dbRequest_intel->setFetchMode(PDO::FETCH_OBJ);
					if( $getResult_intel = $dbRequest_intel->fetch() ) {
						$avatarMember = $getResult_intel->avatar;
						$rights = $getResult_intel->rights;
						$dateInscription = $getResult_intel->dateInscription;
						$ifShowPhonePerso = $getResult_intel->ifShowPhonePerso;
						$ifShowPhonePro = $getResult_intel->ifShowPhonePro;
						// ici format la date pour l'affichage, format dans la base (AAAA/MM/JJ)
						$dateSinceJJ = substr($dateInscription, 8, 2);     // jour  
						$dateSinceMM = substr($dateInscription, 5, 2);    // mois 
						$dateSinceAAAA = substr($dateInscription, 0, 4); // annee
						$dateSinceAffichageMember = $dateSinceJJ."-".$dateSinceMM."-".$dateSinceAAAA;
					}
					// don't manage the administrators
					if($rights!="Administrator") {
				?>
				<tr>
					<td style="background-color: black">
						<?php require("scripts/cp/inc.admin.menu.manageMember.php");// same menu on different place?>
					</td>
					<td>
					<?php if($avatarMember!="") {?>
						<img src="../members/id_<?php echo($idMember);?>/img/<?php echo($avatarMember);?>" width="33" height="33" alt="" />
					<?php }else {?>
						<img src="../img/avatar.png" width="33" height="33" alt="" />
					<?php }?>
					</td>
					<td><?php echo($pseudoMember);?></td>
					<td><?php echo($jobMember);?></td>
					<td><?php echo($skillsMember);?></td>
					<td><?php echo($ageMember);?></td>
					<td><?php echo($sexMember);?></td>
					<td><?php echo($dateSinceAffichageMember);?></td>
					<td style="text-align: right; background-color: black;">
						<?php
						////////////////////////////////////////////////////////
						// check if user blacklisted ?
						////////////////////////////////////////////////////////
						$memberBlocked = false;
						$dbRequestBlack=$connectDBIntelApp->query("select * from site_blackList_user where idMember='$idMember'");
						$dbRequestBlack->setFetchMode(PDO::FETCH_OBJ);
						if( $getResult = $dbRequestBlack->fetch() ) { 
							$dateBloqued = $getResult->timeStamp;
							$howLong = $getResult->howLong;
							// format date bloquee 
							$heureBloque = substr($dateBloqued, 11, 2);	
							$minuteBloque = substr($dateBloqued, 14, 2);  
							$secondeBloque = substr($dateBloqued, 17, 2); 
							$moisBloque = substr($dateBloqued, 5, 2); 
							$jourBloque = substr($dateBloqued, 8, 2); 
							$anneeBloque = substr($dateBloqued, 0, 4); 
							//echo($anneeBloque);exit(0);
							$timeStampBloquage = mktime($heureBloque, $minuteBloque, $secondeBloque, $moisBloque, $jourBloque, $anneeBloque);
							// recup date et heure
							$heureActuel = date('G');
							$minuteActuel = date('i');
							$secondeActuel = date('s');
							$moisActuel = date('n');
							$jourActuel = date('j');
							$anneeActuel = date('Y');
							// int mktime ( int hour, int minute, int second, int month, int day, int year [, int is_dst])
							$timeStampActuel = mktime($heureActuel, $minuteActuel, $secondeActuel, $moisActuel, $jourActuel, $anneeActuel);
							// test les deux timestamps affiche difference
							$tempsEcoule = $timeStampActuel-$timeStampBloquage;
							//echo($tempsEcoule); exit(0);
							if($tempsEcoule<$howLong){//86400 = 24 h 120 = 3min.
								$memberBlocked = true;
							}
						}
					?>
						<?php if($memberBlocked==true) {?><a href="?deBlockMember=<?php echo($idMember);?>"><i class="fas fa-unlock-alt green"></i></a><?php }?>
						<a onClick="return confirm('Êtes-vous sûr de vouloir blocker le member ID <?php echo($idMember);?> ?');" href="?blockId=<?php echo($idMember);?>" title="Block"><i class="fas fa-user-lock <?php if($memberBlocked==true) {?>red<?php }else {?><?php }?>"></i></a>
						<a onClick="return confirm('Êtes-vous sûr de vouloir supprimer le member ID <?php echo($idMember);?> ?');" href="?suppMember=<?php echo($idMember);?>"><img src="../img/supp-white.png" width="14" height="14" title="Delete" alt=""/></a>
					</td>
				</tr>
				<?php }
				}?>
				</tbody>
			</table>
			<?php }// fin while members?>
			
			<?php 
			/////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////
			// while pseudo reserved
			/////////////////////////////////////////////////////////////
			if(isset($_GET['whilePseudo'])) {?>
			<h4>Pseudo Reserved</h4><br>
			<form method="post" action="?">
				<input tabindex="1" class="form-control" name="newPseudoReserved" id="newPseudoReserved" type="text" value="" style="text-align: center;" maxlength="64" required><br><br>
				<button tabindex="2" type="submit" name="btn_addNewPseudoReserved" class="btn btn-primary btn-block">Add New Pseudo Reserved</button>
			</form>
			<br><br>
			<table id="table_simple" class="display compact inverse" style="width:100%">
				<thead>
					<tr>
						<th>Actions</th>
						<th>ID</th>
						<th>Pseudo</th>
						<th>Supp.</th>
					</tr>
				</thead>
				<tbody>
				<?php // while pseudo
				$dbRequest=$connectDBIntelApp->query("select * from site_blackList_pseudo order by pseudo asc");
				$dbRequest->setFetchMode(PDO::FETCH_OBJ);
				while( $getResult = $dbRequest->fetch() ) {
					$idPseudoReserved = $getResult->idBlackListePseudo;
					$pseudoReserved = $getResult->pseudo;
				?>
				<tr>
					<td></td>
					<td>
						<?php echo($idPseudoReserved);?>
					</td>
					<td style="text-align: center; font-size: 22px;padding: 12px;"><?php echo($pseudoReserved);?></td>
					
					<td style="text-align: right">
						
						
						<a onClick="return confirm('Êtes-vous sûr de vouloir supprimer le pseudo <?php echo($pseudoReserved);?> ?');" href="?suppPseudoReserved=<?php echo($idPseudoReserved);?>"><img src="../img/supp.png" width="33" height="33" title="Delete" alt=""/></a>
					</td>
				</tr>
				<?php 
				}?>
				</tbody>
			</table>
			<?php }// fin while pseudo reserved?>
			
			<?php 
			/////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////
			// while email blacklisted
			/////////////////////////////////////////////////////////////
			if(isset($_GET['whileEmail'])) {unset($_SESSION['editMember']);?>
			<h4>Email Blacklisted</h4><br>
			<form method="post" action="?">
				<input tabindex="1" class="form-control" name="newEmailBlacklisted" id="newEmailBlacklisted" type="email" value="" style="text-align: center;" maxlength="64" required><br><br>
				<button type="submit" name="btn_addNewEmailBlacklisted" class="btn btn-primary btn-block">Add New Email Blacklisted</button>
			</form>
			<br><br>
			<table id="table_simple" class="display compact inverse" style="width:100%">
				<thead>
					<tr>
						<th>Actions</th>
						<th>ID</th>
						<th>Email</th>
						<th>Supp.</th>
					</tr>
				</thead>
				<tbody>
				<?php // while pseudo
				$dbRequest=$connectDBIntelApp->query("select * from site_blackList_email order by email asc");
				$dbRequest->setFetchMode(PDO::FETCH_OBJ);
				while( $getResult = $dbRequest->fetch() ) {
					$idEmailBlackListed = $getResult->idEmailBlackListed;
					$emailBlackListed = $getResult->email;
				?>
				<tr>
					<td></td>
					<td>
						<?php echo($idEmailBlackListed);?>
					</td>
					<td style="text-align: center; font-size: 22px;padding: 12px;"><?php echo($emailBlackListed);?></td>
					
					<td style="text-align: right">
						
						
						<a onClick="return confirm('Êtes-vous sûr de vouloir supprimer le pseudo <?php echo($emailBlackListed);?> ?');" href="?suppEmailBlacklisted=<?php echo($idEmailBlackListed);?>"><img src="../img/supp.png" width="33" height="33" title="Delete" alt=""/></a>
					</td>
				</tr>
				<?php 
				}?>
				</tbody>
			</table>
			<?php }// fin while email blacklisted?>
			
			<?php 
			/////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////
			// while words banned 
			/////////////////////////////////////////////////////////////
			if(isset($_GET['whileBannedWords'])) {?>
			<h4>Banned Words</h4><br>
			<form method="post" action="?">
				<input tabindex="1" class="form-control" name="newBannedWord" id="newBannedWord" type="text" value="" style="text-align: center;" maxlength="64" required><br><br>
				<button tabindex="2" type="submit" name="btn_addNewBannedWord" class="btn btn-primary btn-block">Add New Banned Word </button>
			</form>
			<br><br>
			<table id="table_simple" class="display compact inverse" style="width:100%">
				<thead>
					<tr>
						<th>Actions</th>
						<th>ID</th>
						<th>Word</th>
						<th>Supp.</th>
					</tr>
				</thead>
				<tbody>
				<?php // while pseudo
				$dbRequest=$connectDBIntelApp->query("select * from site_blackList_words order by idWordBlackListed asc");
				$dbRequest->setFetchMode(PDO::FETCH_OBJ);
				while( $getResult = $dbRequest->fetch() ) {
					$idWordBlackListed = $getResult->idWordBlackListed;
					$word = $getResult->word;
				?>
				<tr>
					<td></td>
					<td>
						<?php echo($idWordBlackListed);?>
					</td>
					<td style="text-align: center; font-size: 22px;padding: 12px;"><?php echo($word);?></td>
					
					<td style="text-align: right">
						
						
						<a onClick="return confirm('Êtes-vous sûr de vouloir bannir le mot <?php echo($word);?> ?');" href="?suppBannedWord=<?php echo($idWordBlackListed);?>"><img src="../img/supp.png" width="33" height="33" title="Delete" alt=""/></a>
					</td>
				</tr>
				<?php 
				}?>
				</tbody>
			</table>
			<?php }// fin while pseudo reserved?>
			
			
		
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
  	<?php require_once("scripts/inc.core.framework.php");// app framework?>
  	<?php require_once("scripts/inc.core.noty.php");// app admin noty?>
	<?php require_once("scripts/inc.core.notyUp.php");// app personal noty?>
	<script>
		// while members
		$(document).ready( function () {
			$('#table_members').DataTable( {
				"aaSorting": [7,'desc'],// debut à 0
				"pagingType": "full_numbers",
				"pageLength": 100,
				"language": {
				"search": "<?php echo($tr_text_tables_menu_search);?>",
				"zeroRecords": "<?php echo($tr_text_tables_menu_zeroRecords);?>",
				"info": "<?php echo($tr_text_tables_menu_info);?> _PAGE_ <?php echo($tr_text_tables_menu_of);?> _PAGES_",
				"lengthMenu": "<?php echo($tr_text_tables_menu_lengthMenu);?> _MENU_ <?php echo($tr_text_tables_menu_lengthMenu2);?>",
				"paginate": {
					"first":      "<?php echo($tr_text_tables_menu_first);?>",
					"last":       "<?php echo($tr_text_tables_menu_last);?>",
					"next":       "<?php echo($tr_text_tables_menu_next);?>",
					"previous":   "<?php echo($tr_text_tables_menu_previous);?>"
					},
				},
				"aoColumns": [
				{ "bVisible": true, "bSortable": false, "sWidth": "20px", "bSearchable": false },
				{ "bVisible": true, "bSortable": true, "sWidth": "20px", "bSearchable": true },
				{ "bVisible": true, "bSortable": true, "sWidth": "120px", "bSearchable": true },
				{ "bVisible": <?php if($smartPhone!="yes") {?>true<?php }else {?>false<?php }?>, "bSortable": true, "sWidth": "120px", "bSearchable": true },
				{ "bVisible": <?php if($smartPhone!="yes") {?>true<?php }else {?>false<?php }?>, "bSortable": true, "sWidth": "400px", "bSearchable": true },
				{ "bVisible": <?php if($smartPhone!="yes") {?>true<?php }else {?>false<?php }?>, "bSortable": true, "sWidth": "60px", "bSearchable": true },
				{ "bVisible": <?php if($smartPhone!="yes") {?>true<?php }else {?>false<?php }?>, "bSortable": true, "sWidth": "44px", "bSearchable": true },
				{ "bVisible": true, "bSortable": true, "sWidth": "18px", "bSearchable": true },
				{ "bVisible": true, "bSortable": false, "sWidth": "18px", "bSearchable": false }
				],
			} );
		} );
		
		// while pseudo and email
		$(document).ready( function () {
			$('#table_simple').DataTable( {
				"aaSorting": [1,'desc'],// debut à 0
				"pagingType": "full_numbers",
				"pageLength": 100,
				"language": {
				"search": "<?php echo($tr_text_tables_menu_search);?>",
				"zeroRecords": "<?php echo($tr_text_tables_menu_zeroRecords);?>",
				"info": "<?php echo($tr_text_tables_menu_info);?> _PAGE_ <?php echo($tr_text_tables_menu_of);?> _PAGES_",
				"lengthMenu": "<?php echo($tr_text_tables_menu_lengthMenu);?> _MENU_ <?php echo($tr_text_tables_menu_lengthMenu2);?>",
				"paginate": {
					"first":      "<?php echo($tr_text_tables_menu_first);?>",
					"last":       "<?php echo($tr_text_tables_menu_last);?>",
					"next":       "<?php echo($tr_text_tables_menu_next);?>",
					"previous":   "<?php echo($tr_text_tables_menu_previous);?>"
					},
				},
				"aoColumns": [
				{ "bVisible": true, "bSortable": false, "sWidth": "20px", "bSearchable": false },
				{ "bVisible": false, "bSortable": false, "sWidth": "20px", "bSearchable": false },
				{ "bVisible": true, "bSortable": true, "sWidth": "200px", "bSearchable": true },
				{ "bVisible": true, "bSortable": false, "sWidth": "20px", "bSearchable": false }
				
				],
			} );
		} );
	</script>
</body>
</html>