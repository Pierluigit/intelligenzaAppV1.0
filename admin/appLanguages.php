<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: App Languages
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
$page = "app_admin_languages";
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
	<title><?php echo($app_nameProject);?> | Languages</title>
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
		<div id="content" class="content">
			<!-- BEGIN breadcrumb -->
			<ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active">Languages</li>
			</ul>
			<!-- END breadcrumb -->
			<h1 class="page-header">
				Manage Languages <small>/ Countries, Languages</small>
			</h1>
			
			<!-- END breadcrumb -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-3">
						<!-- BEGIN widget -->
						<a href="?whileCountry=1" class="widget widget-stats bg-gradient-blue inverse-mode">
							<div class="widget-stats-left">
								<div class="widget-stats-title">DB Country</div>
							</div>
							<div class="widget-stats-right">
								<div class="widget-stats-value">
									<?php echo($app_totalCountry);?>
								</div>
								<div class="widget-desc">Today, <?php echo($dateNow);?></div>
							</div>
						</a>
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
						<!--<a href="?whileEmail=1" class="widget widget-stats bg-gradient-red inverse-mode">
							<div class="widget-stats-left">
								<div class="widget-stats-title">Email Blocked</div>
							</div>
							<div class="widget-stats-right">
								<div class="widget-stats-value">
									<?php //echo($app_totalEmailBlacklisted);?>
								</div>
								<div class="widget-desc">Today, <?php //echo($dateNow);?></div>
							</div>
						</a>-->
						<!-- END widget -->
					</div>
				</div><!-- end menu -->
				<br>
				
				
				<?php 
				/////////////////////////////////////////////////////////////
				/////////////////////////////////////////////////////////////
				// while pseudo reserved
				/////////////////////////////////////////////////////////////
				if(isset($_GET['whileCountry'])) {//unset($_SESSION['editMember']);?>
				<h4>Manage Countries</h4><br>
				
				<table id="table_country" class="display compact inverse" style="width:100%">
					<thead>
						<tr>
							<th>Actions</th>
							<th>Flag</th>
							<th>Name</th>
							<th>Name FR</th>
							<th>Language</th>
							<th>Code</th>
							<th>Capital</th>
							<th>Currency</th>
						</tr>
					</thead>
					<tbody>
					<?php // while pseudo
					$resultats=$connectDBIntelApp->query("select * from country order by name desc");
					$resultats->setFetchMode(PDO::FETCH_OBJ);
					while( $unResultat = $resultats->fetch() ) {
						$idCountry = $unResultat->idCountry;
						$name = $unResultat->name;
						$code = $unResultat->code;
						$nameFr = $unResultat->nameFr;
						$language = $unResultat->language;
						$languageCode = $unResultat->languageCode;
						$capitalCity = $unResultat->capitalCity;
						$currency = $unResultat->currency;
						// format name for flag img
						$nameFlag = strtolower($name);//strtolower strtoupper
						$nameFlag = str_replace ( " ", "-", $nameFlag);	
					?>
					<tr>
						<td style="background-color: black">
							<!--<a href="?show=<?php //echo($idCountry);?>"><img src="../img/voir.png" width="12" height="12" title="Show Profile" alt=""/></a>-->
							<a href="?editCountry=<?php echo($idCountry);?>"><img src="../img/edit-white.png" width="12" height="12" title="Edit" alt=""/></a>
						</td>
						<td><img src="../img/flags/<?php echo($nameFlag);?>.png" width="44" height="44" alt=""/></td>
						<td><?php echo($name);?></td>
						<td><?php echo($nameFr);?></td>
						<td><?php echo($languageCode);?> / <?php echo($language);?></td>
						<td><?php echo($code);?></td>
						<td><?php echo($capitalCity);?></td>
						
						<td style="text-align: right"><?php echo($currency);?></td>
					</tr>
					<?php 
					}?>
					</tbody>
				</table>
				<?php }// fin while country?>
				
				<?php 
				/////////////////////////////////////////////////////////////
				/////////////////////////////////////////////////////////////
				// while pseudo reserved
				/////////////////////////////////////////////////////////////
				if(isset($_GET['editCountry'])) {//unset($_SESSION['editMember']);
					// recup infos 
					$idCountry = $_GET['editCountry'];
					$resultats=$connectDBIntelApp->query("select * from country where idCountry='$idCountry'");
					$resultats->setFetchMode(PDO::FETCH_OBJ);
					if( $unResultat = $resultats->fetch() ) {
						$idCountry = $unResultat->idCountry;
						$name = $unResultat->name;
						$nameFr = $unResultat->nameFr;
						$languageCode = $unResultat->languageCode;
						$language = $unResultat->language;
						$code = $unResultat->code;
						$capitalCity = $unResultat->capitalCity;
						$currency = $unResultat->currency;
						$weather = $unResultat->weather;
						$zonesIATA = $unResultat->zonesIATA;
						$map = $unResultat->map;
						// format name for flag img
						$nameFlag = strtolower($name);//strtolower strtoupper
						$nameFlag = str_replace ( " ", "-", $nameFlag);	
						?>
				<img src="../img/flags/<?php echo($nameFlag);?>.png" width="44" height="44" alt=""/><br>
				<label>Name <span id="confirm_name"></span></label><br>
				<input tabindex="2" class="form-control" name="name" id="name" onKeyUp="rec_fieldCountry(<?php echo($idCountry);?>, 'name');" onChange="rec_fieldCountry(<?php echo($idCountry);?>, 'name');" onBlur="rec_fieldCountry(<?php echo($idCountry);?>, 'name');" type="text" value="<?php echo($name);?>" maxlength="64">
				<br>
				<label>Name Français <span id="confirm_nameFr"></span></label><br>
				<input tabindex="2" class="form-control" name="nameFr" id="nameFr" onKeyUp="rec_fieldCountry(<?php echo($idCountry);?>, 'nameFr');" onChange="rec_fieldCountry(<?php echo($idCountry);?>, 'nameFr');" onBlur="rec_fieldCountry(<?php echo($idCountry);?>, 'nameFr');" type="text" value="<?php echo($nameFr);?>" maxlength="64">
				<br>
				<label>Language <span id="confirm_language"></span></label><br>
				<input tabindex="2" class="form-control" name="language" id="language" onKeyUp="rec_fieldCountry(<?php echo($idCountry);?>, 'language');" onChange="rec_fieldCountry(<?php echo($idCountry);?>, 'language');" onBlur="rec_fieldCountry(<?php echo($idCountry);?>, 'language');" type="text" value="<?php echo($language);?>" maxlength="64">
				<br>
				<label>Language Code <span id="confirm_languageCode"></span></label><br>
				<input tabindex="2" class="form-control" name="languageCode" id="languageCode" onKeyUp="rec_fieldCountry(<?php echo($idCountry);?>, 'languageCode');" onChange="rec_fieldCountry(<?php echo($idCountry);?>, 'languageCode');" onBlur="rec_fieldCountry(<?php echo($idCountry);?>, 'languageCode');" type="text" value="<?php echo($languageCode);?>" maxlength="64">
				<br>
				<label>Code Country <span id="confirm_code"></span></label><br>
				<input tabindex="2" class="form-control" name="code" id="code" onKeyUp="rec_fieldCountry(<?php echo($idCountry);?>, 'code');" onChange="rec_fieldCountry(<?php echo($idCountry);?>, 'code');" onBlur="rec_fieldCountry(<?php echo($idCountry);?>, 'code');" type="text" value="<?php echo($code);?>" maxlength="64">
				<br>
				<label>Capital <span id="confirm_capitalCity"></span></label><br>
				<input tabindex="2" class="form-control" name="capitalCity" id="capitalCity" onKeyUp="rec_fieldCountry(<?php echo($idCountry);?>, 'capitalCity');" onChange="rec_fieldCountry(<?php echo($idCountry);?>, 'capitalCity');" onBlur="rec_fieldCountry(<?php echo($idCountry);?>, 'capitalCity');" type="text" value="<?php echo($capitalCity);?>" maxlength="64">
				<br>
				<label>Currency <span id="confirm_currency"></span></label><br>
				<input tabindex="2" class="form-control" name="currency" id="currency" onKeyUp="rec_fieldCountry(<?php echo($idCountry);?>, 'currency');" onChange="rec_fieldCountry(<?php echo($idCountry);?>, 'currency');" onBlur="rec_fieldCountry(<?php echo($idCountry);?>, 'currency');" type="text" value="<?php echo($capitalCity);?>" maxlength="64">
				<br>
				
					
					<?php }?>
				<?php }?>
				
			</div>
			<br><br>
			
								

			

			
			
			
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
			$('#table_country').DataTable( {
				"aaSorting": [2,'asc'],// debut à 0
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
				{ "bVisible": true, "bSortable": true, "sWidth": "200px", "bSearchable": true },
				{ "bVisible": true, "bSortable": true, "sWidth": "200px", "bSearchable": true },
				{ "bVisible": true, "bSortable": true, "sWidth": "200px", "bSearchable": true },
				{ "bVisible": true, "bSortable": true, "sWidth": "200px", "bSearchable": true },
				{ "bVisible": true, "bSortable": true, "sWidth": "200px", "bSearchable": true },
				{ "bVisible": true, "bSortable": false, "sWidth": "20px", "bSearchable": true }
				
				],
			} );
		} );
	</script>
	
</body>
</html>