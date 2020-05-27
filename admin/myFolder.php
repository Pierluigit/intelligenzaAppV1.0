<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Member Folder
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
$page = "app_myFolder";
//////////////////////////////////////////
//////////////////////////////////////////
// load core intelligenza
require_once("scripts/inc.core.intelligenza.php");
// check if ok settings
if($app_ifMembersUseMyFolder!="yes") {
	header("location:".$app_urlRoot."");
}

//////////////////////////////////////////
//////////////////////////////////////////
// delete file
if(isset($_GET['suppFile'])) {
	unlink("../members/id_".$idUser."/myFolder/".$_GET['suppFile']."");
	header("location:?");
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo($_SESSION['language']);?>">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo($app_nameProject);?> | My Folder</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("scripts/cp/inc.template_head.php");?>
	<style>
		.content {
			margin-left: 14.375rem;/*14.375rem*/
			padding: 0px;/*1.5625rem*/
			position: relative;
			height: 100%;
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
		<div id="content" class="content bgBoxApp"><br>
			<div class="progress m-b-10">
				<?php 
				$statut = "success";
				if($sizeUsedUser>=80) { $statut = "warning";}
				if($sizeUsedUser>=90) { $statut = "danger";}
				?>
				<div class="progress-bar progress-bar-<?php echo($statut);?>" style="width: <?php echo($sizeUsedUser);?>%"><?php echo($sizeUsedUser);?>%/<?php echo($app_limitSizeMyFolder);?>MB!</div>
			</div>
			<?php if($sizeUsedUser<100) {?>
				<iframe width="100%" height="777" src="../modular/_fileManager/fileManager_users.php?" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<?php }else {?>
				<p>You have to delete some files to continue to use your folder!</p>
				<?php 
				/////////////////////////////////////////////////////////////
				/////////////////////////////////////////////////////////////
				// while files
				/////////////////////////////////////////////////////////////
				?>
				<h4>Manage Files</h4><br>
				
				<br><br>
				<table id="table_simple" class="display compact inverse" style="width:100%">
					<thead>
						<tr>
							<th>Actions</th>
							<th>Size</th>
							<th>File</th>
							<th>Supp.</th>
						</tr>
					</thead>
					<tbody>
					<?php // while pseudo
					// gestion des images affiche 
					$dirname = '../members/id_'.$idUser.'/myFolder/';
					$dir = opendir($dirname);

					while($file = readdir($dir)) {
					if($file != '.' && $file != '..' && !is_dir($dirname.$file))
					{
						$sizeFile = filesize("../members/id_".$idUser."/myFolder/".$file);
						$sizeFileName = getSizeName($sizeFile)?>
					<tr>
						<td><?php echo($sizeFile);?></td>
						<td>
							<b><?php echo($sizeFileName);?></b>
						</td>
						<td style="text-align: center; font-size: 22px;padding: 12px;"><?php echo($file);?></td>

						<td style="text-align: right">
							<a onClick="return confirm('Are you sure you want delete this file <?php echo($file);?> ?');" href="?suppFile=<?php echo($file);?>"><img src="../img/supp.png" width="33" height="33" title="Delete" alt=""/></a>
						</td>
					</tr>
					<?php 
					}}?>
					</tbody>
				</table>
				<?php // fin while pseudo reserved?>
			
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
		// while pseudo and email
		$(document).ready( function () {
			$('#table_simple').DataTable( {
				"aaSorting": [0,'desc'],// debut à 0
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
				{ "bVisible": false, "bSortable": false, "sWidth": "20px", "bSearchable": false },
				{ "bVisible": true, "bSortable": false, "sWidth": "40px", "bSearchable": false },
				{ "bVisible": true, "bSortable": true, "sWidth": "200px", "bSearchable": true },
				{ "bVisible": true, "bSortable": false, "sWidth": "20px", "bSearchable": false }
				
				],
			} );
		} );
	</script>
</body>
</html>