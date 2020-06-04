<?php
///////////////////////////////////////////
/////// Alpha Project version 1.0 /////////
///////////////////////////////////////////
///////////////////////////////////////////
// core intelligenza
// Title: Smart Login Logout
// Developer: Pierluigi
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
///////////////////////////////////////////
//////////////////////////////////// First
// session start
session_start();
///////////////////////////////////////////
/////////////////////////////////////// 2th
// connect DB and define if local or online
require_once("inc.core.connectDB.php");//////////////////////////// modif this script to start, manual local app or online default
///////////////////////////////////////////
/////////////////////////////////////// 3th
// app settings minimum or full dynamic
require_once("inc.core.settings.php");//////////////////////////// modif 4 minimum field in this script to start
///////////////////////////////////////////
/////////////////////////////////////// 4th
// check if ip blacklisted
require_once("inc.core.check.ipBlacklisted.php");
///////////////////////////////////////////
/////////////////////////////////////// 5th
// check if user blacklisted
require_once('inc.core.check.userBlacklisted.php');
///////////////////////////////////////////

///////////////////////////////////////////
/////////////////////////////////////// 6th
// handler languages
// try language, is without login 
// if choice user existe variable $_SESSION['chooseLanguage'] if ok = lg choice user
// if not recup broswer preference, if not empty language = pref broswer, if empty language = default en 
// if language broswer existe, check if existe translation, if not language = default en 
// and if translation existe, browser language = translation
// the $_SESSION['language'] is the reference for App
///////////////////////////////////////////
// foremost, to do a language check because 
// the next scripts need to know which language is used
///////////////////////////////////////////
if(!isset($_SESSION['logOk'])) {// no logged
	if(!isset($_SESSION['chooseLanguage'])) {// no user choice
		$langBroswer = $_SERVER['HTTP_ACCEPT_LANGUAGE'];// recup browser preference language
		$langBroswer =substr($langBroswer, 0, 2);// extract browser preference language
		if($langBroswer!='') {// langBroswer not empty
			// check if existe translation and limit if not translated
			if(($langBroswer=='en') || ($langBroswer=='fr')) {// limit languages translated
				// browser language match a language translated
				$_SESSION['language']=$langBroswer;
				// languages handler, reload languages variables
				require_once("inc.core.languagesTranslation.handler.php");
			}else {
				// no translated = default en
				$_SESSION['language']='en';
				// lauch noty "sorry we haven't translated yet"
				// "your language and we search translator"
				$_SESSION['languageNotTranslated']=$langBroswer;
				// languages handler, reload languages variables
				require_once("inc.core.languagesTranslation.handler.php");
			}
		}else {
			// browser language empty language = default en
			$_SESSION['language']='en';
			// languages handler, reload languages variables
			require_once("inc.core.languagesTranslation.handler.php");
		}
	}else {
		// user choice language = $_SESSION['chooseLanguage']
		$_SESSION['language']=$_SESSION['chooseLanguage'];
		// languages handler, reload languages variables
		require_once("inc.core.languagesTranslation.handler.php");
	}
}
///////////////////////////////////////////
/////////////////////////////////////// 7th
// php function library
require_once("inc.core.php.functions.php");
///////////////////////////////////////////
/////////////////////////////////////// 8th
// parent = check langue
// admin tasks 
require_once("inc.core.reception.php");
///////////////////////////////////////////
/////////////////////////////////////// 9th
// geolocation
require_once("inc.core.geolocation.php");
// check if it works
//echo($countryCode);exit(0);
///////////////////////////////////////////
////////////////////////////////////// 10th
// parent = check langue and geolocation
// admin stats
if(($page!="404") && ($_SESSION['rightsUser']!="Administrator")) {
	require_once("inc.core.stats.php");
}
///////////////////////////////////////////
////////////////////////////////////// 11th
// recup knowledges app  
require_once("inc.core.get.intelligenzaApp.php");
///////////////////////////////////////////
////////////////////////////////////// 12th
// seo 
require_once("inc.core.seo.php");
///////////////////////////////////////////
///////////////////////////////////////////
//
// check login						   13th
//
///////////////////////////////////////////
///////////////////////////////////////////
// case 1 = limit app pages if not logged

// case 2 = check if persistent connection existe
//			with $_COOKIE['remember'] and $_COOKIE['rememberMe']
//			unique ip connection 

// case 3 = check if logged without persistent connection
// 			
// case 4 = check if doubleAuthentification 
// 			
// case 5 = block access  connect, register and lostpass pages if logged
//
// case 6 = user want login
//
// case 7 = user click logout



/*if(isset($_SESSION['languageNotTranslated'])) {
	echo("ok  languageNotTranslated existe");exit(0); 
}*/
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// case 0 -> only index = coming soon
//////////////////////////////////////////////////////////////
if($app_ifLimitToComingSoon=="yes") {
	// if not logged
	if(!isset($_SESSION['logOk'])) {
		if(($page!="comingSoon") && ($page!="connect")) {
			// pass by index page
			header("location:".$app_urlRoot."/index.php?");
		}
	}
}

//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// case 0 -> app only
//////////////////////////////////////////////////////////////
if($app_ifOnlyUseApp=="yes") {
	// if not logged
	if(!isset($_SESSION['logOk'])) {
		if($page!="connect") {
			if(($page=="register") || ($page=="lostPassword")) {
				
			}else {
			// pass by connect page
			header("location:".$app_urlRoot."/connect.php?");
			}
		}
	}
}

//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// case 1-> limit access if no logged
//////////////////////////////////////////////////////////////
if(!isset($_SESSION['logOk'])) {
	$ifFound = strstr($page, 'app_'); 
	if($ifFound!="") {
		header("location:".$app_urlRoot."");
	}
}
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// case 2-> is there a persistent connection
//////////////////////////////////////////////////////////////
if((isset($_COOKIE['remember'])) && (isset($_COOKIE['rememberMe'])) ){ //echo("cokees remember me"); exit(0);//debug
	// there are cookies
	$valeurCookie = $_COOKIE['remember'];
	$valeurCookieMe = $_COOKIE['rememberMe'];
	$valeurCookie = explode('----', $valeurCookie);
	$emailUser = $valeurCookie[0];// email user
	$passMd5User = $valeurCookie[1];// pass md5 user
	
	if($_SERVER['REMOTE_ADDR']==$valeurCookieMe) {// unique ip connection 
		// check if existe in db
		$dbRequest=$connectDBIntelApp->query("select * from members where email='$emailUser' and password='$passMd5User'");
		$dbRequest->setFetchMode(PDO::FETCH_OBJ);
		if( $dbMember = $dbRequest->fetch() ) {
			// existe so ok login
			$_SESSION['logOk'] = true;
			$idUser = $dbMember->idMember;// recup id user
			$_SESSION['idUser'] = $idUser;
			require_once("inc.core.get.valueUser.php");// recup user values
			require_once("inc.core.get.valueIntelUser.php");// recup user intel
			require_once("inc.core.get.valueAddressUser.php");// recup user address
			// update ip user
			$ip = $_SERVER["REMOTE_ADDR"];
			$connectDBIntelApp->exec("update members_intel set ipUser='$ip' where idMember='$idUser' limit 1");
			// handler languages
			if(!isset($_SESSION['chooseLanguage'])) {// no choice
				
				if($languagePrefUser=='') {// no preference user
					$langBroswer = $_SERVER['HTTP_ACCEPT_LANGUAGE'];// lang broswer
					$langBroswer =substr($langBroswer, 0, 2);
					if($langBroswer!='') {// lang broswer existe
						if(($langBroswer=='en') || ($langBroswer=='fr')) {// translated languages
							// browser language match a language translated?
							$_SESSION['language']=$langBroswer;
							// languages handler, reload languages variables
							require_once("inc.core.languagesTranslation.handler.php");
						}else {
							// no translated = default en
							$_SESSION['language']='en';
							// lauch noty "sorry we haven't translated yet"
							// "your language and we search translator"
							//$_SESSION['languageNotTranslated']=$langBroswer;
							// languages handler, reload languages variables
							require_once("inc.core.languagesTranslation.handler.php");
						}
					}else {
						// browser language empty language = default en
						$_SESSION['language']='en';
						// languages handler, reload languages variables
						require_once("inc.core.languagesTranslation.handler.php");
					}
				}else {
					// user has a preference language = languagePrefUser
					// check user preference match a language translated
					if(($languagePrefUser=='en') || ($languagePrefUser=='fr')) {// translated languages
						// browser language match a language translated
						//$_SESSION['language']=$languagePrefUser;
						// languages handler, reload languages variables
						require_once("inc.core.languagesTranslation.handler.php");
					}else {
						// no translated = default en
						$_SESSION['language']='en';
						// lauch noty "sorry we haven't translated yet"
						// "your language and we search translator"
						//$_SESSION['languageNotTranslated']=$languagePrefUser;
						// languages handler, reload languages variables
						require_once("inc.core.languagesTranslation.handler.php");
					}
				}
			}else {
				// user choice language = $_SESSION['chooseLanguage']
				$_SESSION['language']=$_SESSION['chooseLanguage'];
				// languages handler, reload languages variables
				require_once("inc.core.languagesTranslation.handler.php");
			}
			///////////////////////////////////////////
			///////// handler rights and access ///////
			///////////////////////////////////////////
			$ifFoundAppAdmin = strstr($page, 'app_admin_');
			// secure admin page 
			if(($ifFoundAppAdmin!="") && ($rightsUser!="Administrator")) { 
				header("location:".$app_urlRoot."");// go away if no Administrator
			}
		}else {
			// no result in db
			// kill session to be sure and cookies
			session_unset();
			if(isset($_COOKIE['remember'])) { setcookie("remember", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
			if(isset($_COOKIE['rememberMe'])) { setcookie("rememberMe", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
			if(isset($_COOKIE['logOk'])) { setcookie("logOk", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
			$_SESSION['okAge']="yes";// okAge requested one time only
			header("location:".$app_urlRoot."/connect.php?reLog=3");// if email change relog
		}
	}else {
		// not the same ip maybe used VPN so nothing
		// kill session to be sure and cookies
		session_unset();
		if(isset($_COOKIE['remember'])) { setcookie("remember", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
		if(isset($_COOKIE['rememberMe'])) { setcookie("rememberMe", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
		if(isset($_COOKIE['logOk'])) { setcookie("logOk", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
		$_SESSION['okAge']="yes";// okAge requested one time only
		header("location:".$app_urlRoot."/index.php?ipChanged");
	}
}
?>
<?php 
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// case 3-> check if logged without persistent connection
//////////////////////////////////////////////////////////////
if ((isset($_SESSION['logOk'])) && (!isset($_COOKIE['remember'])) && (!isset($_COOKIE['rememberMe']))) { 
	$idUser = $_SESSION['idUser'];/*define who is connected*/
	require_once("inc.core.get.valueUser.php");
	require_once("inc.core.get.valueIntelUser.php");
	require_once("inc.core.get.valueAddressUser.php");
	// language
	if(!isset($_SESSION['chooseLanguage'])) {
		if($languagePrefUser=='') {
			$langBroswer = $_SERVER['HTTP_ACCEPT_LANGUAGE']; 
			$langBroswer =substr($langBroswer, 0, 2);
			if($langBroswer!='') {
				if(($langBroswer=='en') || ($langBroswer=='fr')) {// translated languages
					$_SESSION['language']=$langBroswer;
					require_once("inc.core.languagesTranslation.handler.php");
				}else {
					$_SESSION['language']='en';
					// lauch noty "sorry we haven't translated yet"
					// "your language and we search translator"
					//$_SESSION['languageNotTranslated']=$langBroswer;
					// languages handler, reload languages variables
					require_once("inc.core.languagesTranslation.handler.php");
				}
			}else {
				$_SESSION['language']='en';
				require_once("inc.core.languagesTranslation.handler.php");
			}
		}else {
			// user has a preference language = languagePrefUser
			// check user preference match a language translated
			if(($languagePrefUser=='en') || ($languagePrefUser=='fr')) {// translated languages
				// browser language match a language translated
				$_SESSION['language']=$languagePrefUser;
				// languages handler, reload languages variables
				require_once("inc.core.languagesTranslation.handler.php");
			}else {
				// no translated = default en
				$_SESSION['language']='en';
				// lauch noty "sorry we haven't translated yet"
				// "your language and we search translator"
				//$_SESSION['languageNotTranslated']=$languagePrefUser;
				// languages handler, reload languages variables
				require_once("inc.core.languagesTranslation.handler.php");
			}
		}
	}else {
		$_SESSION['language']=$_SESSION['chooseLanguage'];
		require_once("inc.core.languagesTranslation.handler.php");
	}
	// check if existe cookie logok, yes = in activity so extend life to 5min
	if(isset($_COOKIE['logOk'])) {//exit('ok cookie logOk');//debug
		//////////////////////////////////////
		///// handler rights and access //////
		//////////////////////////////////////
		$ifFoundAppAdmin = strstr($page, 'app_admin_');
		// secure admin page 
		if(($ifFoundAppAdmin!="") && ($rightsUser!="Administrator")) { 
			header("location:".$app_urlRoot."");// go away if no Administrator
		}
		
		if($app_timeConnection=="") { $app_timeConnection="300";}// default 5min 
		// extend session life regenerate cookies
		setcookie("logOk", "connexion", time()+ $app_timeConnection, "/", $_SERVER['HTTP_HOST'], true, true);
		
		// update ip user
		$ip = $_SERVER["REMOTE_ADDR"];
		$connectDBIntelApp->exec("update members_intel set ipUser='$ip' where idMember='$idUser' limit 1"); 
	}else {
		// no cookie logok max 5min exceeded
		session_unset();
		$_SESSION['okAge']="yes";
		$ifFound = strstr($page, 'app_');// limit access app
		if($ifFound!="") {	
			header("location:".$app_urlRoot."/connect.php?reLog=1");
		}else {
			header("location:?");
		}
	}
}
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// case 4-> check if doubleAuthentification
//////////////////////////////////////////////////////////////
// force to airlock page if double authentification is not validate
if((isset($_SESSION['doubleAuthentification'])) && ($page!="airlock")) {
	
	if($_SESSION['doubleAuthentification'] == false) {
		header("location:".$app_urlRoot."/airlock.php?");
	}
}
//////////////////////////////////////////////////////////////
// limit access of the airlock page only if $_SESSION['doubleAuthentification'] existe
if(!isset($_SESSION['logOk'])) {
	if($page=="airlock") {
		header("location:".$app_urlRoot."");
	}
}else {
	// I'm loggel I don't want have access at airlock page 
	if((!isset($_SESSION['doubleAuthentification'])) && ($page=="airlock")) {
		header("location:".$app_urlRoot."");
	}
}
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// case 5-> block access  connect, register and lostpass pages if logged
//////////////////////////////////////////////////////////////
if(isset($_SESSION['logOk'])) { 
	///////////////////////////////////////
	// check if change email ?????????????????????????????? check
	/*if(isset($_SESSION['okChangeEmail2'])) {//echo("session change mail 2");exit(0);
		unset($_SESSION['okChangeEmail2']);
		header("location:".$app_urlRoot."/admin/profileEdit.php?okNewMail=1");
	}*/
	if(($page=="connect") || ($page=="register") || ($page=="lostPassword")) {
		//echo("logok page ".$page." rights ".$rightsUser); exit(0);debug
		// check rights user and go to right place
		if(($rightsUser == 'Administrator') && ($subRightsUser == 'Alpha')) { 
			header("location:".$app_urlRoot."/alpha/index.php?");
		}
		if($rightsUser == 'Administrator') {
			header("location:".$app_urlRoot."/admin/index.php?");
		}
		if($rightsUser == 'Member') { 
			header("location:".$app_urlRoot."/admin/dashboard.php?");
		}
	}
}

//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// case 0 -> admin kill all session and block login
// nobody can login
//////////////////////////////////////////////////////////////
if($app_ifKillAllSessionBlockLogin=="yes") {
	// kill all session !!!!!!!!!!!!!!!!!!!!!!!!!!! not for admin
	if($rightsUser!="Administrator") {//echo($rightsUser);exit(0);
		session_unset();
		// kill cookies
		if(isset($_COOKIE['remember'])) { setcookie("remember", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
		if(isset($_COOKIE['rememberMe'])) { setcookie("rememberMe", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
		if(isset($_COOKIE['logOk'])) { setcookie("logOk", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
		$_SESSION['okAge']="yes";
		// noty
		$_SESSION['notyConnectNotAllowed'] = true;
	}
}else {
	// unset noty session
	if(isset($_SESSION['notyConnectNotAllowed'])) {	unset($_SESSION['notyConnectNotAllowed']);}
}



//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
// case 6-> user want login
//////////////////////////////////////////////////////////////
if (isset($_POST['btn_login'])) { 
	// unset session admin
	unset($_SESSION['noty_emailConfirmed']);
	unset($_SESSION['pseudoInscrit']);
	unset($_SESSION['okFormLostPass']);
	unset($_SESSION['lostPass']);// kill session regenerate pass
	unset($_SESSION['okChangeEmail2']);
	// unset session time exceeded
	unset($_SESSION['lostPassTimeExceeded']);
	//unset($_SESSION['connectNotOk']);
	
	// recup data connection
	$email = $_POST['email'];
	// crypt pass to md5
	$passMd5User = md5($_POST['password']);
	//////////////////////////////
	// check if demand secure password
	///////////////////////////////
	if($app_ifDemandSecurePassword=="yes") {
		$okCapital=false;
		$okMinuscule=false;
		$okNumber=false;
		$okCharaSpecial=false;
		if(preg_match('#^[^A-Z]*([A-Z].*)#',$_POST['password'])) { $okCapital=true;}
		if(preg_match('#^[^a-z]*([a-z].*)#',$_POST['password'])) { $okMinuscule=true;}
		if(preg_match('#^[^0-9]*([0-9].*)#',$_POST['password'])) { $okNumber=true;}		
		$i = 0;
		$ifFound = strstr($_POST['password'], '!'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($_POST['password'], '@'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($_POST['password'], '#'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($_POST['password'], '$'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($_POST['password'], '%'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($_POST['password'], '&'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($_POST['password'], '*'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($_POST['password'], '?'); if($ifFound!="") { $i+=1;}
		// !@#$%&*?
		if($i>=1) { $okCharaSpecial=true;}
		if(($okCapital==true) && ($okMinuscule==true) && ($okNumber==true) && ($okCharaSpecial==true)) { if(isset($_SESSION['passUserNotSecure'])) { unset($_SESSION['passUserNotSecure']);}
		}else { $_SESSION['passUserNotSecure'] = true;}
	}
	//////////////////////////////////////////////////////////////
	// if captcha to login
	//////////////////////////////////////////////////////////////
	// $captcha_code = $_POST['captcha_code'];
	// check captcha
	//require("modular/securimage/securimage.php");
	// $securimage = new Securimage();
	// if ($securimage->check($captcha_code) == true) {
	// the code match
	// $okCaptcha = true;
	
	if(preg_match("/^[\w\.\w]+@[\w\.-]+\.[a-z]{2,8}$/i", $email)) {
		// check if email blocked
		$dbRequest=$connectDBIntelApp->query("select * from site_blackList_email where email='$email'");
		$dbRequest->setFetchMode(PDO::FETCH_OBJ);
		if( $dbMember = $dbRequest->fetch() ) {
			// match renew black list user ip
			$ipUser = $_SERVER['REMOTE_ADDR'];
			$connectDBIntelApp->exec("insert into site_blackList_user (ipUser, howLong) value ('$ipUser', '$app_limitTimeBlackList')");// 86400
			// sandbox
			
			header("location:http://www.blackl.com/black-google.php");
			// stop process
			exit(0);
		}
		
		$dbRequest=$connectDBIntelApp->query("select * from members where email='$email' and password='$passMd5User'");
		$dbRequest->setFetchMode(PDO::FETCH_OBJ);
		if( $dbMember = $dbRequest->fetch() ) {
			// match in db login ok
			$idUser = $dbMember->idMember;
			$pseudoUser = $dbMember->pseudo;
			////////////////////////////////
			// ok login
			////////////////////////////////
			// reset session connectnok if existe
			unset($_SESSION['connectNotOk']);
			
			// open session logOk
			$_SESSION['logOk'] = true;
			$_SESSION['idUser'] = $idUser;
			$_SESSION['pseudoUser'] = $pseudoUser;
			
			// recup data user
			require_once("inc.core.get.valueUser.php");
			require_once("inc.core.get.valueIntelUser.php");
			require_once("inc.core.get.valueAddressUser.php");
			//echo("success5 user ".$pseudoUser);exit(0);
			// definie 
			$_SESSION['rightsUser'] = $rightsUser;
			// language
			if(!isset($_SESSION['chooseLanguage'])) {
				if($languagePrefUser=='') {
					$langBroswer = $_SERVER['HTTP_ACCEPT_LANGUAGE']; 
					$langBroswer =substr($langBroswer, 0, 2);
					if($langBroswer!='') {
						if(($langBroswer=='en') || ($langBroswer=='fr')) {// limit translated languages
							$_SESSION['language']=$langBroswer;
							require_once("inc.core.languagesTranslation.handler.php");
						}else {
							$_SESSION['language']='en';
							// lauch noty "sorry we haven't translated yet"
							// "your language and we search translator"
							//$_SESSION['languageNotTranslated']=$langBroswer;
							// languages handler, reload languages variables
							require_once("inc.core.languagesTranslation.handler.php");
						}
					}else {
						$_SESSION['language']='en';
						require_once("inc.core.languagesTranslation.handler.php");
					}
				}else {
					// user has a preference language = languagePrefUser
					// check user preference match a language translated
					if(($languagePrefUser=='en') || ($languagePrefUser=='fr')) {// translated languages
						// browser language match a language translated
						$_SESSION['language']=$languagePrefUser;
						// languages handler, reload languages variables
						require_once("inc.core.languagesTranslation.handler.php");
					}else {
						// no translated = default en
						$_SESSION['language']='en';
						// lauch noty "sorry we haven't translated yet"
						// "your language and we search translator"
						//$_SESSION['languageNotTranslated']=$languagePrefUser;
						// languages handler, reload languages variables
						require_once("inc.core.languagesTranslation.handler.php");
					}
				}
			}else {
				$_SESSION['language']=$_SESSION['chooseLanguage'];
				require_once("inc.core.languagesTranslation.handler.php");
			}
			// check if persistent connection requested create cookies remember 
			if($app_timeRememberMe=="") { $app_timeRememberMe="86400";}// default 24h 3600 * 24
			if($app_timeConnection=="") { $app_timeConnection="300";}// default 5min 
			if(isset($_POST['rememberme'])) { 
				setcookie("remember", $emailUser.'----'.$passMd5User, time()+ $app_timeRememberMe, "/", $_SERVER['HTTP_HOST'], true, true);
				setcookie("rememberMe", $_SERVER['REMOTE_ADDR'], time()+ $app_timeRememberMe, "/", $_SERVER['HTTP_HOST'], true, true);
			}
			// if not persistent connection create cookie 5min
			// cookie name, value, how long, domain global or folder or under domain, is https, https only
			setcookie("logOk", "connection", time()+$app_timeConnection, "/", $_SERVER['HTTP_HOST'], true, true);
			// 3600 = 1h/ 60 = 1min $limitTempsConnexionUser 5min = 300
			
			// update ip user
			$ip = $_SERVER["REMOTE_ADDR"];
			$connectDBIntelApp->exec("update members_intel set ipUser='$ip' where idMember='$idUser' limit 1");
			
			/////////////////////////////////////////////////////////////////////
			/////////////////////////////////////////////////////////////////////
			////////// here check if double authentification ////////////////////
			/////////////////////////////////////////////////////////////////////
			// if app_ifDoubleAuthentification == yes
			// genere a code and put it in db member_intel
			// redirection sur page sas.php
			if($app_ifDoubleAuthentification == "yes") {
				// active session double auth.
				$_SESSION['doubleAuthentification'] = false;
				// generate code verif
				$doubleAuthentificationCode = rand(00001, 99999);
				// update db
				$connectDBIntelApp->exec("update members set doubleAuthentificationCode='$doubleAuthentificationCode', dateDoubleAuthentification=NOW() where idMember='$idUser' limit 1");
				// send email with code
				require_once("admin/scripts/inc.core.email.doubleAuthentification.php");
				// go to sas
				header("location:airlock.php");
			}else {
				/////////////////////////////////////////////////////
				/////////////////////////////////////////////////////
				// check if app settings block connection
				/////////////////////////////////////////////////////
				if($app_ifKillAllSessionBlockLogin=="yes") {
					// if no admin
					if($rightsUser=="Administrator") {
						header("location:".$app_urlRoot."/admin/index.php?");
					}else {
						// block login
						header("location:?");
					}
				}else {
					//////////////////////////
					// no double auth so go to right place
					if(($rightsUser == 'Administrator') && ($subRightsUser == 'Alpha')) { 
						header("location:".$app_urlRoot."/alpha/index.php?");
					}
					if($rightsUser == 'Administrator') {
						header("location:".$app_urlRoot."/admin/index.php?");
					}
					if($rightsUser == 'Member') { 
						header("location:".$app_urlRoot."/admin/dashboard.php?");
					}
				}
			}
		}else { // no result in database
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
	}else {
		// wrong email 3 attempts max
		// noty in scripts/inc.noty.php
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
	//////////////////////////////////////////////////////////////
	// if captcha to login
	//////////////////////////////////////////////////////////////
  	/*}else {
		// if captcha don't match
		// noty in scripts/inc.noty.php
		$connectNotOk= true;
		if(!isset($_SESSION['connectNotOk'])) {
			$_SESSION['connectNotOk'] = 1;
		}else {
			// si plus de 3 tentative ip bloquée 24h
			if($_SESSION['connectNotOk']>=3){
				//echo('3 tentatives'); exit(0);
				// releve l'ip user et insert dans bdd bloque
				$ipUser = $_SERVER['REMOTE_ADDR'];
				$connectDBIntelApp->exec("insert into site_blackListe_user (ipUser, howLong) value ('$ipUser', '120')");// $app_limitTimeBlackList
				header('location:http://www.blackl.com/black-google.php');
			}else {
				$_SESSION['connectNotOk'] += 1;
			}
		}
	}*/
}
//////////////////////////////////////////////////////////////
// case 7-> user click logout
//////////////////////////////////////////////////////////////
if(isset($_GET['logout'])) {
	$id = $_GET['id'];
	// if page is listing recup id
	//echo("?show=".$id); exit(0);
	// check if there is $_SESSION['connectNotOk']
	if(isset($_SESSION['connectNotOk'])) {
		// (bridge) on session unset to keep it
		$connectNotOk = $_SESSION['connectNotOk'];
	}
	// kill all session
	session_unset();
	// kill cookies
	if(isset($_COOKIE['remember'])) { setcookie("remember", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
	if(isset($_COOKIE['rememberMe'])) { setcookie("rememberMe", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
	if(isset($_COOKIE['logOk'])) { setcookie("logOk", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
	
	// ok age
	$_SESSION['okAge']="yes";// okAge requested one time only
	
	// (bridge) check value connectNotOk
	if($connectNotOk!="") {
		// there was session connectNotOk
		$_SESSION['connectNotOk'] = $connectNotOk;
	}
	
	
	//////////////////////////////////////
	///// handler rights and access //////
	//////////////////////////////////////
	// block app access 
	$ifFound = strstr($page, 'app_'); 
	if($ifFound!="") {
		header("location:".$app_urlRoot."/index.php?");
	}else {
		// simple reload if not on app
		header("location:?");
	}
}



?>