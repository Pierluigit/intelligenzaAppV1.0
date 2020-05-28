<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: admin noty
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
$page = "app_admin_noty";
///////////////////////////////////////////////////
///////////////////////////////////////////////////
// load core intelligenza
///////////////////////////////////////////////////
require_once("scripts/inc.core.intelligenza.php");

///////////////////////////////////////////////////
///////////////////////////////////////////////////
// archive noty
///////////////////////////////////////////////////
if(isset($_GET['archiveNoty'])) {
	$idNoty = $_GET['archiveNoty'];
	// check if existe 
	$connectDBIntelApp->exec("insert into site_notySawByUser (idMemberWhoSawNoty, idNoty) value ('$idUser', '$idNoty')");
	header("location:?");
}

///////////////////////////////////////////////////
///////////////////////////////////////////////////
// delete noty
///////////////////////////////////////////////////
if(isset($_GET['deleteNoty'])) {
	$idNoty = $_GET['deleteNoty'];
	// delete noty
	$connectDBIntelApp->exec("delete from site_noty where idNoty='$idNoty' limit 1");
	// delete noty saw
	$dbRequest_notySaw=$connectDBIntelApp->query("select * from site_notySawByUser where idMemberWhoSawNoty='$idUser' and idNoty='$idNoty'");
	$dbRequest_notySaw->setFetchMode(PDO::FETCH_OBJ);
	while( $getResult_notySaw = $dbRequest_notySaw->fetch() ) {
		$idWhoSawNoty = $getResult_notySaw->idWhoSawNoty;
		$connectDBIntelApp->exec("delete from site_notySawByUser where idWhoSawNoty='$idWhoSawNoty' limit 1");
	}
	
	header("location:?whileArchivedNoty=1");
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo($_SESSION['language']);?>">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo($app_nameProject);?> | Admin Noty</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("scripts/cp/inc.template_head.php");?>
	<style>
		/*ready to turn into dynamic mode*/
		.notyBox_ {
			border-radius: 12px;
			padding: 12px;
			color: white;
			background-color: rgba(0,0,0,0.8);
		}
		
		.notyAdmin_info
		{
			box-shadow: 0px 0px 2px #0396ff;
			color: #0396ff;
			transition:0.5s;
		}
		.notyAdmin_info:hover{
			/*background-color: rgba(0,0,0,0.8);
			transition:0.5s;*/
		}
		.notyAdmin_success
		{
			box-shadow: 0px 0px 2px #259c08;
			color: #0ad406;
			transition:0.5s;
		}
		.notyAdmin_success:hover{
			/*background-color: rgba(0,0,0,0.8);
			transition:0.5s;*/
		}
		.notyAdmin_warning
		{
			box-shadow: 0px 0px 2px #ffb103;
    		color: #ffb103;
			transition:0.5s;
		}
		.notyAdmin_warning:hover{
			/*background-color: rgba(0,0,0,0.8);
			transition:0.5s;*/
		}
		
		.notyAdmin_danger
		{
			box-shadow: 0px 0px 2px #ff0303;
    		color: #ff0303;
			transition:0.5s;
		}
		.notyAdmin_danger:hover{
			/*background-color: rgba(0,0,0,0.8);
			transition:0.5s;*/
		}
		.notyAdmin_primary
		{
			box-shadow: 0px 0px 2px #03fff5;
    		color: #03d0ff;
			transition:0.5s;
		}
		.notyAdmin_primary:hover{
			/*background-color: rgba(0,0,0,0.8);
			transition:0.5s;*/
		}
		 
	</style>
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
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active">Admin Noty</li>
			</ul>
			<!-- END breadcrumb -->
			<!-- BEGIN page-header -->
			<h1 class="page-header">
				Manage Noty <small>work in progress...</small>
			</h1>
			<!-- END page-header -->
			
			<br><br>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						<!-- BEGIN widget -->
						<!--<a href="?whileNoty=1" class="widget widget-stats bg-gradient-blue inverse-mode">
							<div class="widget-stats-left">
								<div class="widget-stats-title">Total New Noty</div>
							</div>
							<div class="widget-stats-right">
								<div class="widget-stats-value">
									<?php //echo($totalNotyUser);?>
								</div>
								<div class="widget-desc">Today, <?php //echo($dateNow);?></div>
							</div>
						</a>-->
						<!-- END widget -->
					</div>
					<div class="col-md-3">
						<!-- BEGIN widget -->
						<!--<a href="?whileArchivedNoty=1" class="widget widget-stats bg-gradient-purple inverse-mode">
							<div class="widget-stats-left">
								<div class="widget-stats-title">Noty Archived</div>
							</div>
							<div class="widget-stats-right">
								<div class="widget-stats-value">
									<?php //echo($totalNotyArchivedUser);?>
								</div>
								<div class="widget-desc">Today, <?php //echo($dateNow);?></div>
							</div>
						</a>-->
						<!-- END widget -->
						
					</div>
					<div class="col-md-3">
						<?php if($rightsUser=="Administrator") {?>
						<!-- BEGIN widget -->
						<a href="?newNoty=1" class="widget widget-stats bg-gradient-green inverse-mode">
							<div class="widget-stats-left">
								<div class="widget-stats-title">New Noty</div>
							</div>
							<div class="widget-stats-right">
								<div class="widget-stats-value">
									+
								</div>
								<div class="widget-desc">Today, <?php echo($dateNow);?></div>
							</div>
						</a>
						<!-- END widget -->
						<?php }?>
					</div>
					<div class="col-md-3">
						
					</div>
				</div>
			</div>
			<br><br>	
			
			<i class="faa-bounce animated"></i>
			<?php
			///////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////
			// noty up  
			///////////////////////////////////////////////////////////////
			if((!isset($_GET['whileArchivedNoty'])) && (isset($_GET['newNoty']))) {
			?>
			<h4>New Notifications</h4><br>
			<table id="table_noty" class="display compact inverse" style="width:100%">
			<thead>
				<tr>
					<th>Action</th>
					<th>From</th>
					<th>Title</th>
					<th>Message</th>
					<th>Link</th>
					<th>Updated</th>
					<th>Date</th>
					<th>Archive</th>
				</tr>
			</thead>
			<tbody>
			<?php
			///////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////
			// noty up  
			///////////////////////////////////////////////////////////////
				$totalNoty=0;
				$dbRequest_noty=$connectDBIntelApp->query("select * from site_noty where idMember='$idUser' and type='notyUp' order by dateNoty asc");
				$dbRequest_noty->setFetchMode(PDO::FETCH_OBJ);
				while( $getResult_noty = $dbRequest_noty->fetch() ) {
					$noty_idNoty = $getResult_noty->idNoty;
					$noty_idFrom = $getResult_noty->idFrom;
					// recup pseudo
					if($noty_idFrom!=0) {// 0 = admin
						$dbRequest_notyMFrom=$connectDBIntelApp->query("select * from members where idMember='$noty_idFrom'");
						$dbRequest_notyMFrom->setFetchMode(PDO::FETCH_OBJ);
						if( $getResult_notyMFrom = $dbRequest_notyMFrom->fetch() ) {
							$noty_pseudoFrom = $getResult_notyMFrom->pseudo;
						}
						// recup avatar
						$dbRequest_notyMIFrom=$connectDBIntelApp->query("select * from members_intel where idMember='$noty_idFrom'");
						$dbRequest_notyMIFrom->setFetchMode(PDO::FETCH_OBJ);
						if( $getResult_notyMIFrom = $dbRequest_notyMIFrom->fetch() ) {
							$noty_avatarFrom = $getResult_notyMIFrom->avatar;
							if($noty_avatarFrom!="") {// user have owns avatar
								$noty_avatarFrom="../members/id_".$noty_idFrom."/img/".$noty_avatarFrom."";
							}else {
								if($app_avatarProfile!="") {// user doesn't have own avatar
									$noty_avatarFrom="../images/logo/".$app_avatarProfile."";
								}else {
									$noty_avatarFrom="".$app_urlRoot."/img/avatar.png";
								}
							}
						}
					}else {
						//exit(0);
						// from admin
						$noty_pseudoFrom = "Administrator";
						$noty_avatarFrom = "../img/chat-box.png";
					}

					$noty_dateNoty = $getResult_noty->dateNoty;
					$noty_dateNotyUpdate = $getResult_noty->dateNotyUpdate;
					$noty_categories = $getResult_noty->categories;
					$noty_title = $getResult_noty->title;
					$noty_message = $getResult_noty->message;
					$noty_link = $getResult_noty->linkNoty;
					$noty_classCss = $getResult_noty->classCss;
					// define type css
					$noty_classCssType = "";
					if($noty_classCss=="primary") { $noty_classCssType = "notyAdmin_primary";}
					if($noty_classCss=="info") { $noty_classCssType = "notyAdmin_info";}
					if($noty_classCss=="success") { $noty_classCssType = "notyAdmin_success";}
					if($noty_classCss=="warning") { $noty_classCssType = "notyAdmin_warning";}
					if($noty_classCss=="danger") { $noty_classCssType = "notyAdmin_danger";}
					
					// check if saw
					$notySaw = false;
					$dbRequest_notySaw=$connectDBIntelApp->query("select * from site_notySawByUser where idMemberWhoSawNoty='$idUser' and idNoty='$noty_idNoty'");
					$dbRequest_notySaw->setFetchMode(PDO::FETCH_OBJ);
					if( $getResult_notySaw = $dbRequest_notySaw->fetch() ) {
						// saw nothing
						$notySaw = true;
						
					}
					if($notySaw==false) {
						// not see yet
						$totalNoty+=1;
							?>
					
					<tr class="<?php if($noty_idFrom==0) { echo($noty_classCssType);}?>">
						<td>?</td>
						<td style="text-align: center"><b><?php echo($noty_pseudoFrom);?></b><br><img src="<?php echo($noty_avatarFrom);?>" width="55" height="55" alt=""/></td>
						<td><?php echo($noty_title);?></td>
						<td style="padding: 8px;">
							<?php echo($noty_message);?>
						</td>
						
						<td>
							<?php if($noty_link!="") {?><a href="<?php echo($noty_link);?>" target="_blank" title="<?php echo($noty_link);?>"><img src="../img/link.png" width="24" height="24" alt=""/></a><?php }?>
						</td>
						<td>
							<div style="text-align: center; font-weight: bold" id='dateNoty_update_<?php echo($totalNoty);?>'></div><br>
							<div style="font-size: 10px;line-height: 11px;text-align: center"><?php echo($noty_dateNotyUpdate);?></div>
						</td>
						<td>
							<div style="text-align: center; font-weight: bold" id='dateNoty_since_<?php echo($totalNoty);?>'></div><br>
							<div style="font-size: 10px;line-height: 11px;text-align: center"><?php echo($noty_dateNoty);?></div>
						</td>
						<td style="text-align: center"><a onClick="return confirm('Êtes-vous sûr de vouloir archiver la noty ID <?php echo($noty_title);?> ?');" href="?archiveNoty=<?php echo($noty_idNoty);?>"><img src="../img/voir.png" width="33" height="33" title="Archive" alt=""/></a>
						</td>
					</tr>
					<?php
					}
				}
			?>
			</tbody>
			</table>
			<?php
				////////////////////
				// end if whileNoty
				///////////////////
			}?>
			
			<?php
			///////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////
			// noty up archived
			///////////////////////////////////////////////////////////////
			if(isset($_GET['whileArchivedNoty'])) {
			?>
			<h4>Notifications Archived</h4><br>
			<table id="table_noty" class="display compact inverse" style="width:100%">
			<thead>
				<tr>
					<th>Action</th>
					<th>From</th>
					<th>Title</th>
					<th>Message</th>
					<th>Link</th>
					<th>Date Update</th>
					<th>Date</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
			<?php
			///////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////
			// noty up  
			///////////////////////////////////////////////////////////////
				$totalNoty=0;
				$dbRequest_noty=$connectDBIntelApp->query("select * from site_noty where idMember='$idUser' and type='notyUp' order by dateNoty asc");
				$dbRequest_noty->setFetchMode(PDO::FETCH_OBJ);
				while( $getResult_noty = $dbRequest_noty->fetch() ) {
					$noty_idNoty = $getResult_noty->idNoty;
					$noty_idFrom = $getResult_noty->idFrom;
					// recup pseudo
					if($noty_idFrom!=0) {// 0 = admin
						$dbRequest_notyMFrom=$connectDBIntelApp->query("select * from members where idMember='$noty_idFrom'");
						$dbRequest_notyMFrom->setFetchMode(PDO::FETCH_OBJ);
						if( $getResult_notyMFrom = $dbRequest_notyMFrom->fetch() ) {
							$noty_pseudoFrom = $getResult_notyMFrom->pseudo;
						}
						// recup avatar
						$dbRequest_notyMIFrom=$connectDBIntelApp->query("select * from members_intel where idMember='$noty_idFrom'");
						$dbRequest_notyMIFrom->setFetchMode(PDO::FETCH_OBJ);
						if( $getResult_notyMIFrom = $dbRequest_notyMIFrom->fetch() ) {
							$noty_avatarFrom = $getResult_notyMIFrom->avatar;
							if($noty_avatarFrom!="") {// user have owns avatar
								$noty_avatarFrom="../members/id_".$noty_idFrom."/img/".$noty_avatarFrom."";
							}else {
								if($app_avatarProfile!="") {// user doesn't have own avatar
									$noty_avatarFrom="../images/logo/".$app_avatarProfile."";
								}else {
									$noty_avatarFrom="".$app_urlRoot."/img/avatar.png";
								}
							}
						}
					}else {
						//exit(0);
						// from admin
						$noty_pseudoFrom = "Administrator";
						$noty_avatarFrom = "../img/chat-box.png";
					}

					$noty_dateNoty = $getResult_noty->dateNoty;
					$noty_dateNotyUpdate = $getResult_noty->dateNotyUpdate;
					$noty_categories = $getResult_noty->categories;
					$noty_title = $getResult_noty->title;
					$noty_message = $getResult_noty->message;
					$noty_link = $getResult_noty->linkNoty;
					$noty_classCss = $getResult_noty->classCss;
					// define type css
					$noty_classCssType = "";
					if($noty_classCss=="primary") { $noty_classCssType = "notyAdmin_primary";}
					if($noty_classCss=="info") { $noty_classCssType = "notyAdmin_info";}
					if($noty_classCss=="success") { $noty_classCssType = "notyAdmin_success";}
					if($noty_classCss=="warning") { $noty_classCssType = "notyAdmin_warning";}
					if($noty_classCss=="danger") { $noty_classCssType = "notyAdmin_danger";}
					
					// check if saw
					$notySaw = false;
					$dbRequest_notySaw=$connectDBIntelApp->query("select * from site_notySawByUser where idMemberWhoSawNoty='$idUser' and idNoty='$noty_idNoty'");
					$dbRequest_notySaw->setFetchMode(PDO::FETCH_OBJ);
					if( $getResult_notySaw = $dbRequest_notySaw->fetch() ) {
						// saw 
						$totalNoty+=1;
							?>
					
					<tr class="<?php if($noty_idFrom==0) { echo($noty_classCssType);}?>">
						<td>?</td>
						<td style="text-align: center"><b><?php echo($noty_pseudoFrom);?></b><br><img src="<?php echo($noty_avatarFrom);?>" width="55" height="55" alt=""/></td>
						<td><?php echo($noty_title);?></td>
						<td style="padding: 8px;">
							<?php echo($noty_message);?>
						</td>
						<td>
							<?php if($noty_link!="") {?><a href="<?php echo($noty_link);?>" target="_blank" title="<?php echo($noty_link);?>"><img src="../img/link.png" width="24" height="24" alt=""/></a><?php }?>
						</td>
						<td>
							<div style="text-align: center; font-weight: bold" id='dateNoty_update_<?php echo($totalNoty);?>'></div><br>
							<div style="font-size: 10px;line-height: 11px;text-align: center"><?php echo($noty_dateNotyUpdate);?></div>
						</td>
						<td>
							<div style="text-align: center; font-weight: bold" id='dateNoty_since_<?php echo($totalNoty);?>'></div><br>
							<div style="font-size: 10px;line-height: 11px;text-align: center"><?php echo($noty_dateNoty);?></div>
						</td>
						<td style="text-align: center">
							<?php if($noty_idFrom!=0) {?>
							<a onClick="return confirm('Êtes-vous sûr de vouloir supprimer la noty  <?php echo($noty_title);?> ?');" href="?deleteNoty=<?php echo($noty_idNoty);?>"><img src="../img/supp.png" width="33" height="33" title="Delete" alt=""/></a>
							<?php }?>
						</td>
					</tr>
					<?php
					}
				}
			?>
			</tbody>
			</table>
			<?php
				////////////////////
				// end if archived
				///////////////////
			}?>
			
			
			
			
			
			
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
	
	<?php
	///////////////////////////////////////////////////////////////
	///////////////////////////////////////////////////////////////
	// noty up  
	///////////////////////////////////////////////////////////////
	// new noty
	if(isset($_GET['whileNoty'])) {
		$totalNoty=0;
		$dbRequest_noty=$connectDBIntelApp->query("select * from site_noty where idMember='$idUser' and type='notyUp' order by dateNoty asc");
		$dbRequest_noty->setFetchMode(PDO::FETCH_OBJ);
		while( $getResult_noty = $dbRequest_noty->fetch() ) {
			$noty_idNoty = $getResult_noty->idNoty;
			$noty_idFrom = $getResult_noty->idFrom;
			$noty_dateNoty = $getResult_noty->dateNoty;
			$noty_dateNotyUpdate = $getResult_noty->dateNotyUpdate;
			// check if saw
			$notySaw = false;
			$dbRequest_notySaw=$connectDBIntelApp->query("select * from site_notySawByUser where idMemberWhoSawNoty='$idUser' and idNoty='$noty_idNoty'");
			$dbRequest_notySaw->setFetchMode(PDO::FETCH_OBJ);
			if( $getResult_notySaw = $dbRequest_notySaw->fetch() ) {
				// saw nothing
				$notySaw = true;
			}
			if($notySaw==false) {
				// not see yet
				$totalNoty+=1;
					?>
	<script>
		$(document).ready( function () {
		
		var time = moment("<?php echo($noty_dateNoty);?>").fromNow(); // 8 years ago
		document.getElementById('dateNoty_since_<?php echo($totalNoty);?>').innerHTML = ""+ time + "";
		var time2 = moment("<?php echo($noty_dateNotyUpdate);?>").fromNow(); // 8 years ago
		document.getElementById('dateNoty_update_<?php echo($totalNoty);?>').innerHTML = ""+ time2 + "";
		//alert(time);//debug
		
		} );
	</script>
	<?php
			}
		}
	}
	?>
	<?php
	///////////////////////////////////////////////////////////////
	// new noty archived
	if(isset($_GET['whileArchivedNoty'])) {
		$totalNoty=0;
		$dbRequest_noty=$connectDBIntelApp->query("select * from site_noty where idMember='$idUser' and type='notyUp' order by dateNoty asc");
		$dbRequest_noty->setFetchMode(PDO::FETCH_OBJ);
		while( $getResult_noty = $dbRequest_noty->fetch() ) {
			$noty_idNoty = $getResult_noty->idNoty;
			$noty_idFrom = $getResult_noty->idFrom;
			$noty_dateNoty = $getResult_noty->dateNoty;
			$noty_dateNotyUpdate = $getResult_noty->dateNotyUpdate;
			// check if saw
			$notySaw = false;
			$dbRequest_notySaw=$connectDBIntelApp->query("select * from site_notySawByUser where idMemberWhoSawNoty='$idUser' and idNoty='$noty_idNoty'");
			$dbRequest_notySaw->setFetchMode(PDO::FETCH_OBJ);
			if( $getResult_notySaw = $dbRequest_notySaw->fetch() ) {
				$totalNoty+=1;
			?>
	
	<script>
		$(document).ready( function () {
		
		var time = moment("<?php echo($noty_dateNoty);?>").fromNow(); // 8 years ago
		document.getElementById('dateNoty_since_<?php echo($totalNoty);?>').innerHTML = ""+ time + "";
		var time2 = moment("<?php echo($noty_dateNotyUpdate);?>").fromNow(); // 8 years ago
		document.getElementById('dateNoty_update_<?php echo($totalNoty);?>').innerHTML = ""+ time2 + "";
		//alert(time2);//debug
		
		} );
	</script>
	<?php
			}
		}
	}
	?>
	
	
	
	
	
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	
  	<?php require_once("scripts/inc.core.framework.php");?>
  	<?php require_once("scripts/inc.core.noty.php");?>
	
	<script>
		// while noty
		$(document).ready( function () {
			$('#table_noty').DataTable( {
				"aaSorting": [5,'asc'],// debut à 0
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
				{ "bVisible": true, "bSortable": false, "sWidth": "20px", "bSearchable": true },
				{ "bVisible": true, "bSortable": false, "sWidth": "40px", "bSearchable": true },
				{ "bVisible": true, "bSortable": false, "sWidth": "555px", "bSearchable": true },
				{ "bVisible": true, "bSortable": false, "sWidth": "20px", "bSearchable": true },
				{ "bVisible": true, "bSortable": false, "sWidth": "20px", "bSearchable": true },
				{ "bVisible": false, "bSortable": true, "sWidth": "44px", "bSearchable": true },
				
				{ "bVisible": true, "bSortable": false, "sWidth": "18px", "bSearchable": false }
				],
			} );
		} );
		
		// while noty archived
		$(document).ready( function () {
			$('#table_noty2').DataTable( {
				"aaSorting": [5,'asc'],// debut à 0
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
				{ "bVisible": true, "bSortable": false, "sWidth": "20px", "bSearchable": true },
				{ "bVisible": true, "bSortable": false, "sWidth": "40px", "bSearchable": true },
				{ "bVisible": true, "bSortable": false, "sWidth": "555px", "bSearchable": true },
				{ "bVisible": true, "bSortable": false, "sWidth": "20px", "bSearchable": true },
				{ "bVisible": true, "bSortable": false, "sWidth": "20px", "bSearchable": true },
				{ "bVisible": false, "bSortable": true, "sWidth": "44px", "bSearchable": true },
				
				{ "bVisible": true, "bSortable": false, "sWidth": "18px", "bSearchable": false }
				],
			} );
		} );
		
		
	</script>
</body>
</html>