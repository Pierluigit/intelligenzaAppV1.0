<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Double Authentication
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
$page = "airlock";
//////////////////////////////////////////
//////////////////////////////////////////
// load core intelligenza
require_once("admin/scripts/inc.core.intelligenza.php");
/////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////
//////////////////////// double authentification ////////////////////
/////////////////////////////////////////////////////////////////////
// check time double auth max 5min
// Login Double Auth
$okCanLDA = true;
// format dates
$heureLDA = substr($dateDoubleAuthentificationUser, 11, 2);	
$minuteLDA = substr($dateDoubleAuthentificationUser, 14, 2);  
$secondeLDA = substr($dateDoubleAuthentificationUser, 17, 2); 
$moisLDA = substr($dateDoubleAuthentificationUser, 5, 2); 
$jourLDA = substr($dateDoubleAuthentificationUser, 8, 2); 
$anneeLDA = substr($dateDoubleAuthentificationUser, 0, 4); 
//exit($moisLDA);
//echo($anneeBloque); exit(0);
$timeStampLDA = mktime($heureLDA, $minuteLDA, $secondeLDA, $moisLDA, $jourLDA, $anneeLDA);
$formatDateLastLDA = $jourLDA."-".$moisLDA."-".$anneeLDA." à ".$heureLDA.":".$minuteLDA.":".$secondeLDA;
// format date for countdown
$formatDateCountDownLastLDA = $anneeLDA."/".$moisLDA."/".$jourLDA." ".$heureLDA.":".$minuteLDA.":".$secondeLDA;
// add 5min
$timeStampWhenYouCanLDA = $timeStampLDA + ($app_limitTimeProcessDoubleAndLost);// 5min *************
$timeStampWhenYouCanLDA = date("Y/m/d H:i:s", $timeStampWhenYouCanLDA);

//exit($formatDateLastLDACompteDown);
// recup date et heure
$heureActuel = date('G');
//$heureActuel += 1;// heure d'hiver ATTENTION
$minuteActuel = date('i');
$secondeActuel = date('s');
$moisActuel = date('n');
$jourActuel = date('j');
$anneeActuel = date('Y');
// int mktime ( int hour, int minute, int second, int month, int day, int year [, int is_dst])
$timeStampActuel = mktime($heureActuel, $minuteActuel, $secondeActuel, $moisActuel, $jourActuel, $anneeActuel);
// test les deux timestamps affiche difference
$tempsEcoule = $timeStampActuel-$timeStampLDA;

//echo($tempsEcoule);exit(0);
// test si il peux voter
if($tempsEcoule>$app_limitTimeProcessDoubleAndLost){//86400 = 24 h = 60 * 60 * 24, 15min ******************
	//echo("plus de 15min");exit();
	$okCanLDA = false;
	//header("location:connect.php?");
}




//////////////////////////
if(isset($_POST['rec_valideAuthentificationCode'])) {
	$valideAuthentificationCode = $_POST['valideAuthentificationCode'];
	if($doubleAuthentificationCodeUser==$valideAuthentificationCode) {
		// kill session double
		unset($_SESSION['doubleAuthentification']);
		// update db for use one time only 
		$connectDBIntelApp->exec("update members set doubleAuthentificationCode='' where idMember='$idUser' limit 1"); 
		// redirection après login
		if(($rightsUser == 'Administrator') && ($subRightsUser == 'Alpha')) { 
			header("location:".$app_urlRoot."/alpha/index.php?");
		}
		if($rightsUser == 'Administrator') {
			header("location:".$app_urlRoot."/admin/index.php?");
		}
		if($rightsUser == 'Member') { 
			header("location:".$app_urlRoot."/admin/dashboard.php?");
		}
	}else {
		// error 
		// 3 attempts max
		// wrong email
		$connectNotOk= true;
		if(!isset($_SESSION['connectNotOk'])) {
			$_SESSION['connectNotOk'] = 1;
		}else {
			// si plus de 3 tentative ip bloquée 24h
			if($_SESSION['connectNotOk']>=3){
				//echo('3 tentatives'); exit(0);
				// releve l'ip user et insert dans bdd bloque
				$ipUser = $_SERVER['REMOTE_ADDR'];
				$connectDBIntelApp->exec("insert into site_blackList_user (ipUser, howLong) value ('$ipUser', '86400')");// 86400
				header('location:http://www.blackl.com/black-google.php');
			}else {
				$_SESSION['connectNotOk'] += 1;
			}
		}
	}
}

// test
//if($_SESSION['dateDoubleAuthentification']) {

	//echo($timeStampWhenYouCanLDA);exit(0);
//}
?>
<?php //$i = str_replace ( "-", "/", $dateDoubleAuthentificationUser);echo($dateDoubleAuthentificationUser."<br>");echo($i);exit(0);?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo($_SESSION['language']);?>">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo($tr_text_page_airlock_title);?> | Airlock</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="<?php echo($tr_text_page_airlock_description);?>" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("admin/scripts/cp/inc.template_head.php");?>
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN CUSTOM CSS STYLE ================== -->
	<?php require_once("admin/scripts/cp/inc.head.customCss.php");// custom css ?>
	<!-- ================== END CUSTOM CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="admin/assets/plugins/loader/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="inverse-mode">
	<?php require_once("scripts/analyticstracking.php"); ?>
	<!-- BEGIN #page-container -->
	<div id="page-container" class="fade">
		<!-- BEGIN login -->
        <div class="login">
			<!-- BEGIN airlock-cover -->
			<div class="airlock-cover"></div>
			<!-- END login-cover -->
			<!-- BEGIN login-content -->
			<div class="login-content">
				<!-- BEGIN login-brand -->
				<div class="login-brand">
					<a href="index.php">
						<?php require_once("scripts/inc.logoHPage.php");// dynamic logo?>
					</a>
				</div>
				<!-- END login-brand -->
				<div class="bgBox">
				<!-- BEGIN login-desc -->
				<div class="login-desc_">
					Double Authentification check your email!
				</div>
				<br>
				<!-- END login-desc -->
				<div class="countdown">Time remaining!
				  <?php //if($okCanVote==false) {?><?php echo($tr_text_page_vote_remaningTime);?><?php //}?>
				  <span style="font-size: 12px;" id="clockDoubleAuth"></span>
				</div>
				<br>
				<!-- BEGIN login-form -->
				<form action="?" method="POST" name="login_form">
					<div class="form-group">
						<label class="control-label" for="valideAuthentificationCode">Code <span class="text-danger">*</span></label>
						<input type="text" name="valideAuthentificationCode" id="valideAuthentificationCode" class="form-control" style="text-align: center" value="" maxlength="5" required />
					</div>
					
					<!--<div class="form-group">
						<label id="acode" for="captcha_code" id="labelCaptcha"><?php //echo($tr_text_form_captcha);?> <span class="text-danger">*</span></label><br>
						<img id="captcha" src="modular/securimage/securimage_show.php" alt="CAPTCHA Image" class="vignette" />
						
						<input type="text" id="captcha_code" class="form-control" name="captcha_code" onKeyPress="checkCaptcha()" maxlength="6" tabindex="4" onBlur="checkCode();" onKeyUp="checkCode();" placeholder="<?php //echo($txt_connexion_inscription_CopyTheSixCharactersAbove);?>" <?php //if((isset($_REQUEST['btn_signup'])) && ($okCaptcha == false)) { echo(" style='border: 1px solid #FE1B00;'");}?> required/>

						<object type="application/x-shockwave-flash" data="modular/securimage/securimage_play.swf?audio_file=modular/securimage/securimage_play.php" width="19" height="19"> 
						<param name="movie" value="modular/securimage/securimage_play.swf?audio_file=modular/securimage/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" style="cursor:pointer;" />
						</object>
						<a href="#" onclick="document.getElementById('captcha').src = 'modular/securimage/securimage_show.php?' + Math.random(); return false"><img width="18" height="18" onclick="this.blur()" alt="Reload Image" src="modular/securimage/images/refresh.png"></a>
					</div>-->
					<button type="submit" name="rec_valideAuthentificationCode" class="btn btn-primary btn-block">Login</button>
				</form>
				<br>
				<a href="?logout"><button type="text" class="btn btn-warning btn-block">Abandon</button></a>
				<!-- END login-form -->
				<div class="m-t-20">
					If you have trouble connection ? <a href="mailto:<?php echo($app_emailContactProject);?>"><?php echo($app_emailContactProject);?></a><br>
				</div>
				</div>
			</div>
			<!-- END login-content -->
        </div>
        <!-- END login -->
	</div>
	<!-- END #page-container -->
	
	<!-- BEGIN Footer -->
	<?php require_once("scripts/inc.footer.php");?>
	<!-- END Footer -->
		
	<!-- BEGIN theme-panel -->
  	<?php //require_once("scripts/inc.template_themePanel.php");?>
  	<!-- END theme-panel -->
	
	<!-- ================== BEGIN BASE JS ================== -->
  	<?php require_once("admin/scripts/cp/inc.template_framework.php");?>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="admin/assets/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
	
  	<?php require_once("admin/scripts/inc.core.framework.php");?>
  	<?php require_once("admin/scripts/inc.core.noty.php");?>
	<script>
		$('#clockDoubleAuth').countdown('<?php echo($timeStampWhenYouCanLDA);?>')
		.on('update.countdown', function(event) {
		  var format = '%H:%M:%S';
		  if(event.offset.totalDays > 0) {
			format = '%-d day%!d ' + format;
		  }
		  if(event.offset.weeks > 0) {
			format = '%-w week%!w ' + format;
		  }
		  $(this).html(event.strftime(format));
		})
		.on('finish.countdown', function(event) {
		  $(this).html('Time exceeded!')
			.parent().addClass('disabled');
			window.location.replace("?logout");
		});
	</script>
	<script>
		
	</script>
</body>
</html>