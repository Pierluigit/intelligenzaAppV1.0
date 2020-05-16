<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// Title: Contact
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
$page = "contact";
//////////////////////////////////////////
//////////////////////////////////////////
// load core intelligenza
require_once("admin/scripts/inc.core.intelligenza.php");
///////////////////////////////////////////////////
///////////////////////////////////////////////////
// contact form 
///////////////////////////////////////////////////
if(isset($_POST['sendMessage'])) { 
	$okMailFrom = false;
	$okCaptcha = false;
	$okNameFrom = false;
	$okSubjectFrom = false;
	$okMessageFrom = false;
	$nameFrom = $_POST['name'];
	$emailFrom = $_POST['email'];
	$subjectFrom = $_POST['subject'];
	$messageFrom = $_POST['message'];
	$captcha_code = $_POST['captcha_code'];
	
	///////////////////////////////////////////////////
	// start check
	if (preg_match("/^[\w\.\w]+@[\w\.-]+\.[a-z]{2,10}$/i", $emailFrom) ) {
		$okMailFrom = true;
		$emailFrom = strtolower($emailFrom);// put in minuscule, strtoupper() = UPERCASE		
		// check if email is blackisted
		$resultats=$connectDBIntelApp->query("select * from site_blackList_email where email='$emailFrom'");
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		if( $baseMembre = $resultats->fetch() ) {
			// existe donc ok
			$okMailFrom = false;
			// 3 attempts max
			// wrong don't match
			$connectNotOk= true;
			if(!isset($_SESSION['connectNotOk'])) {
				$_SESSION['connectNotOk'] = 1;
			}else {
				// 3 attempts wrong block ip 24h
				if($_SESSION['connectNotOk']>=3){
					// black list
					$ipUser = $_SERVER['REMOTE_ADDR'];
					$connectDBIntelApp->exec("insert into site_blackList_user (ipUser, howLong) value ('$ipUser', '$app_limitTimeBlackList')");
					// sandbox
					header('location:http://www.blackl.com/black-google.php');
				}else {
					$_SESSION['connectNotOk'] += 1;
				}
			}
		}
		//echo("ici youpi : je passe test blacklist : okMailFrom ".$okMailFrom); exit(0);
	}else {
		// 3 attempts max
		// wrong don't match
		$connectNotOk= true;
		if(!isset($_SESSION['connectNotOk'])) {
			$_SESSION['connectNotOk'] = 1;
		}else {
			// 3 attempts wrong block ip 24h
			if($_SESSION['connectNotOk']>=3){
				// black list
				$ipUser = $_SERVER['REMOTE_ADDR'];
				$connectDBIntelApp->exec("insert into site_blackList_user (ipUser, howLong) value ('$ipUser', '$app_limitTimeBlackList')");
				// sandbox
				header('location:http://www.blackl.com/black-google.php');
			}else {
				$_SESSION['connectNotOk'] += 1;
			}
		}
	}
	
	// remove specials charactairs
	$value = $messageFrom;
	require("admin/scripts/inc.core.antiHack.php");
	$messageFrom = $value;
	
	$value = $nameFrom;
	require("admin/scripts/inc.core.antiHack.php");
	$nameFrom = $value;
	
	$value = $subjectFrom;
	require("admin/scripts/inc.core.antiHack.php");
	$subjectFrom = $value;
	
	// check name
	if(strlen($nameFrom)>=2) { $okNameFrom = true;}
	// check subject
	if(strlen($subjectFrom)>=2) { $okSubjectFrom = true;}
	// check message
	if(strlen($messageFrom)>2) { $okMessageFrom = true;}
	
	//echo($subjectFrom);exit(0);
	// remplace tous les char1 de string par char2. 
	
	// test captcha
	require_once('modular/_captcha/securimage.php');
  	$securimage = new Securimage();
	
	if ($securimage->check($captcha_code) == true) {
	// the code was correct
		$okCaptcha = true;
		//exit();
	}
	// ici je recupe ip
	$ipUser = $_SERVER["REMOTE_ADDR"];
	$userAgent = $_SERVER['HTTP_USER_AGENT'];
	//echo("okCaptcha ".$okCaptcha);exit(0);
	// ici dernier test avant envois du mail  
	if(($okMailFrom==true) && ($okNameFrom==true) && ($okSubjectFrom==true) && ($okMessageFrom==true) && ($okCaptcha==true)) {//echo("success youpi all good");exit(0);
		//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// send email to admin, new contact
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// this scripts can be used directly to check
//$app_nameProject = "Pierluigi";
//$app_emailContactProject = "myemail@intel.net";
//...
$Destinataire = "".$app_emailContactProject."";// app_emailContactProject
$Sujet = "Contact from ".$app_nameProject."! ".$subjectFrom."";
$From  = "From:".$nameFrom." <".$emailFrom.">\n";
$From .= "Reply-To: ".$emailFrom."\n";
$From .= "MIME-version: 1.0\n";
$From .= "Content-type: text/html; charset=utf-8\n"; 
$Message = '<html>
			<head>
			   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			   <title>'.$app_nameProject.'</title>
			</head>
			<body style="background-color:#000;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			   <tr>
				  <td align="center">
					 <table width="69%" border="0" cellspacing="0" cellpadding="0">
					 	<tr style="text-align:center;">
						   <td></td>
						</tr>
						<tr style="text-align:center;">
						   <td><img src="'.$app_urlRoot.'/images/logo/'.$app_logoEmailProject.'" width="100%" alt=""/></td>
						</tr>
						<tr style="text-align:center;color:#ffffff;">
							<td><h1 style="text-align:center; padding-top:15px; color:#ffffff; font-size:18px;"> 
							From : '.$nameFrom.'</h1>
							Subject : '.$subjectFrom.'<br />
							Message :<br />
							'.$messageFrom.'<br /><br />
							</td>
						</tr>
						<tr>
						   <td><p style="text-align:center; color:#ffffff;">'.$app_nameProject.' '.$tr_text_copyRights.'</p></td>
						</tr>
					 </table>
				  </td>
			   </tr>
			</table>					
			</body>
			</html>';// '.$app_emailContactProject.'
		if(mail($Destinataire,$Sujet,$Message,$From,'-f '.$app_emailContactProject.'')) {
			//echo("ok sent");exit(0);
			//header('location:index.php?smo=1#contact');
			header('location:?okcf=1');
		}else {
			echo("ops not sent");exit(0);
			//echo('email not sent');exit(0);	
		}
	}else {
		// 3 attempts max
			// wrong don't match
			$connectNotOk= true;
			if(!isset($_SESSION['connectNotOk'])) {
				$_SESSION['connectNotOk'] = 1;
			}else {
				// 3 attempts wrong block ip 24h
				if($_SESSION['connectNotOk']>=3){
					// black list
					$ipUser = $_SERVER['REMOTE_ADDR'];
					$connectDBIntelApp->exec("insert into site_blackList_user (ipUser, howLong) value ('$ipUser', '$app_limitTimeBlackList')");
					// sandbox
					header('location:http://www.blackl.com/black-google.php');
				}else {
					$_SESSION['connectNotOk'] += 1;
				}
			}
		}
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo($_SESSION['language']);?>">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?php echo($tr_text_page_contact_title);?> | Contact</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta name="Googlebot" lang= "<?php echo($_SESSION['language']);?>" content="NOODP">
	<meta content="<?php echo($tr_text_page_contact_description);?>" name="description" />
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  	<?php require_once("admin/scripts/cp/inc.template_head.php");?>
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="admin/assets/plugins/loader/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== --> 
</head>
<body class="inverse-mode">
	<?php require_once("scripts/analyticstracking.php"); ?>
	<!-- BEGIN #page-container -->
	<div id="page-container" class="fade">
		<!-- BEGIN Privacy -->
        <div class="register">
        	<!-- BEGIN contact-cover -->
			<div class="contact-cover"></div>
			<div class="register-content">
				<!-- BEGIN brand -->
				<div class="register-brand">
					<a href="index.php">
						<?php require_once("scripts/inc.logoHPage.php");// dynamic logo?>
					</a>
				</div>
				<!-- END brand -->
				<div class="bgBox">
				<h3 class="m-b-20"><span>Contact</span></h3>
				<p class="m-b-20">To have more information contact us.</p>
				<!-- BEGIN Privacy-content -->
				
				<form method="post" action="?">
				  <div class="row contact-row">
					<div class="col-md-6">
					  <input name="name" id="name" class="form-control" value="<?php if(isset($_SESSION['logOk'])) { echo($pseudoUser); }else { echo($_POST['name']);}?>" type="text" placeholder="<?php echo($tr_text_page_index_contact_name);?> *" maxlength="24" <?php if((isset($_REQUEST['sendMessage'])) && ($okNameFrom == false)) { echo(" style='border: 1px solid orange;'");}?> required>
					</div>
					<div class="col-md-6">
					  <input name="email" id="email" class="form-control" type="email" value="<?php if(isset($_SESSION['logOk'])) { echo($emailUser); }else { echo($_POST['email']);}?>" placeholder="<?php echo($tr_text_page_index_contact_email);?> *" maxlength="64" <?php if((isset($_REQUEST['sendMessage'])) && ($okMailFrom == false)) { echo(" style='border: 1px solid orange;'");}?>  required>
					</div>
				  </div>
					<br>
				  <input name="subject" id="subject" class="form-control" value="<?php echo($_POST['subject']);?>" type="text" placeholder="<?php echo($tr_text_page_index_contact_sujet);?> *" maxlength="64" <?php if((isset($_REQUEST['sendMessage'])) && ($okSubjectFrom == false)) { echo(" style='border: 1px solid orange;'");}?>  required> 
					<br>
				  <textarea name="message" id="message" class="form-control" placeholder="<?php echo($tr_text_page_index_contact_message);?> *" maxlength="400" <?php if((isset($_REQUEST['sendMessage'])) && ($okMessageFrom == false)) { echo(" style='border: 1px solid orange;'");}?> required><?php echo($_POST['message']);?></textarea>

				<div class="row contact-row">
					<div class="col-md-6">
					  <label id="acode" for="captcha_code" id="labelCaptcha"><?php echo($tr_text_form_captcha);?> <span>*</span> </label>

					<p><img id="captcha" src="modular/_captcha/securimage_show.php" alt="CAPTCHA Image" class="vignette" /></p>
						 
					</div>
					<div class="col-md-6"><br><br>
						
						
						
					 <input type="text" id="captcha_code" class="form-control" name="captcha_code" onKeyPress="checkCaptcha()" maxlength="6" tabindex="4" onBlur="checkCode();" onKeyUp="checkCode();" placeholder="<?php echo($txt_connexion_inscription_CopyTheSixCharactersAbove);?>" <?php if((isset($_REQUEST['sendMessage'])) && ($okCaptcha == false)) { echo(" style='border: 1px solid orange;'");}?> required/>
						
					<object type="application/x-shockwave-flash" data="modular/_captcha/securimage_play.swf?audio_file=modular/_captcha/securimage_play.php" width="19" height="19"> 
				<param name="movie" value="modular/_captcha/securimage_play.swf?audio_file=modular/_captcha/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" style="cursor:pointer;" />
				</object>
				<a href="#" onclick="document.getElementById('captcha').src = 'modular/_captcha/securimage_show.php?' + Math.random(); return false"><img width="18" height="18" onclick="this.blur()" alt="Reload Image" src="modular/_captcha/images/refresh.png"></a>
					</div>
				  </div>
				
					

				
				
				  <br>
				  <input type="submit" class="btn btn-sm btn-primary btn-block" name="sendMessage" value="<?php echo($tr_text_page_index_contact_btn_send);?>">
				</form>
					
				<!-- END Privacy-content -->
				</div>
			</div>
        </div>
        <!-- END Privacy -->
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

	</script>
</body>
</html>