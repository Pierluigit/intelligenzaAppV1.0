<?php
///////////////////////////////////////////////
///////////////////////////////////////////////
///////////// General Settings ////////////////
///////////////////////////////////////////////
///////////////////////////////////////////////
// check if db installed?
$resultats=$connectDBIntelApp->query("select * from site_settings where idSetting='77'");
$resultats->setFetchMode(PDO::FETCH_OBJ);
if( $unResultat = $resultats->fetch() ) { 
	$set_activeSettingDb = $unResultat->activeDbSettings;
	$set_urlRoot = $unResultat->urlRoot;
	$set_nameProject = $unResultat->nameProject;
	$set_emailContactProject = $unResultat->emailContactProject;
	$set_emailComEmailProject = $unResultat->emailComEmailProject;
	// check if can switch in dynamic settings
	$okCanUseDynamicSettings = false;
	$okEmailContactProject = false;
	$okEmailComEmailProject = false;
	if (preg_match("/^[\w\.\w]+@[\w\.-]+\.[a-z]{2,10}$/i", $set_emailContactProject) ) {
		$okEmailContactProject = true;
	}
	if (preg_match("/^[\w\.\w]+@[\w\.-]+\.[a-z]{2,10}$/i", $set_emailComEmailProject) ) {
		$okEmailComEmailProject = true;
	}
	if(($set_nameProject!="") && ($set_urlRoot!="") && ($okEmailContactProject==true) && ($okEmailComEmailProject==true)) {
		$okCanUseDynamicSettings = true;
	}
}else {
	// here is a check if table existe
	// no match = db not existe
	echo("You have to install db and tables!");
	exit(0);
}
//echo("success set dyna ".$set_activeSettingDb." and ".$okCanUseDynamicSettings);exit(0);
// check if dynamic
$okSettings = false;
if(($set_activeSettingDb=="yes") && ($okCanUseDynamicSettings==true)) {
	// if yes switch setting in dynamic and recup info
	$resultats=$connectDBIntelApp->query("select * from site_settings where idSetting='77'");
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	if( $unResultat = $resultats->fetch() ) {
		///////////////////////////////////////////////
		///////////// set settings in app /////////////
		///////////////////////////////////////////////
		$okSettings = true;
		$app_publicKey = $unResultat->publicKey;
		$app_privateKey = $unResultat->privateKey;
		$app_version = $unResultat->app_version;
		$app_version_date = $unResultat->app_version_date;
		// format date app version
		$dateJJ = substr($app_version_date, 8, 2);// day  
		$dateMM = substr($app_version_date, 5, 2);// month 
		$dateAAAA = substr($app_version_date, 0, 4);// year
		$app_version_date = $dateJJ."-".$dateMM."-".$dateAAAA;
		
		$app_ifActivePsp = $unResultat->ifActivePsp;
		// if yes recup config psp
		if($app_ifActivePsp=="yes") {
			$resultatsPsp=$connectDBIntelApp->query("select * from admin_psp where id='77' and idType='admin'");
			$resultatsPsp->setFetchMode(PDO::FETCH_OBJ);
			if( $unResultatPsp = $resultatsPsp->fetch() ) {
				$app_psp_productionMode = $unResultatPsp->productionMode;
				$app_psp_pspId = $unResultatPsp->pspId;
				$app_psp_shaIn = $unResultatPsp->shaIn;
				$app_psp_shaOut = $unResultatPsp->shaOut;
				$app_psp_ifUrlBack = $unResultatPsp->ifUrlBack;
				$app_psp_urlOk = $unResultatPsp->urlOk;
				$app_psp_urlNok = $unResultatPsp->urlNok;
				$app_psp_urlException = $unResultatPsp->urlException;
				$app_psp_urlCancel = $unResultatPsp->urlCancel;
				$app_psp_logoFileName = $unResultatPsp->logoFileName;
				$app_psp_urlHome = $unResultatPsp->urlHome;
				$app_psp_urlCatalogue = $unResultatPsp->urlCatalogue;
				$app_psp_urlDynmiqueTamplate = $unResultatPsp->urlDynmiqueTamplate;
			}
		}
		
		
		$app_ifKillAllSessionBlockLogin = $unResultat->ifKillAllSessionBlockLogin;
		$app_ifLimitToComingSoon = $unResultat->ifLimitToComingSoon;
		$app_ifOnlyUseApp = $unResultat->ifOnlyApp;
		$app_ifBlockNewRegistration = $unResultat->ifBlockNewRegistration;
		
		$app_ifLocalSite = $unResultat->ifLocalSite;
		$app_urlRoot = $unResultat->urlRoot;
		// used for filemanager
		$_SESSION['app_urlRoot'] = $app_urlRoot;
		$app_nameProject = $unResultat->nameProject;
		$app_faviconProject = $unResultat->faviconProject;
		$app_logoProject = $unResultat->logoProject;
		$app_logoHProject = $unResultat->logoHProject;
		$app_logoEmailProject = $unResultat->logoEmailProject;
		$app_logoPdfProject = $unResultat->logoPdfProject;
		$app_emailContactProject = $unResultat->emailContactProject;
		$app_emailComEmailProject = $unResultat->emailComEmailProject;
		$app_dateCountDownProject = $unResultat->dateCountDownProject;
		$app_sinceOrUntilCountDownProject = $unResultat->sinceOrUntilCountDownProject;
		$app_timeRememberMe = $unResultat->timeRememberMe;
		$app_timeConnection = $unResultat->timeConnection;
		$app_limitTimeProcessDoubleAndLost = $unResultat->limitTimeProcessDoubleAndLost;
		$app_limitTimeBlackList = $unResultat->limitTimeBlackList;
		$app_ifLimitAge = $unResultat->ifLimitAge;
		$app_limitAge = $unResultat->limitAge;
		$app_ifDoubleAuthentification = $unResultat->ifDoubleAuthentification;
		$app_ifDemandSecurePassword = $unResultat->ifDemandSecurePassword; 
		$app_ifDemandSecureEmail = $unResultat->ifDemandSecureEmail;
		$app_secureWebMail = $unResultat->secureWebMail;
		// if secure email create links
		$app_linksSecureWebMail = "";
		if($app_ifDemandSecureEmail=="yes") {
			// explode app_secureWebMail
			$secureWebMail = explode("/", $app_secureWebMail);
			foreach ($secureWebMail as $webmail) {
				$app_linksSecureWebMail = $app_linksSecureWebMail.' <a href="https://www.'.$webmail.'" target="_blank">'.$webmail.'</a>';
			}
		}else {
			unset($_SESSION['emailNotSecure']);
		}
		$app_ifActiveAcceptCookies = $unResultat->ifActiveAcceptCookies;
		$app_ifLookSelectAndRightClic = $unResultat->ifLookSelectAndRightClic;
		$app_ifSharingFolder = $unResultat->ifSharingFolder;
		$app_limitSizePublicFolder = $unResultat->limitSizePublicFolder;
		$app_ifGathering = $unResultat->ifGathering;
		
		$app_ifUseAudio = $unResultat->ifUseAudio;
		$app_volume = $unResultat->volume;
		
		$app_bgProfileHeader = $unResultat->bgProfileHeader;
		/*$app_avatarProfile = $unResultat->bgProfileHeader;*/
		$app_avatarProfile = $unResultat->avatarProfile;
		$app_linkColor = $unResultat->linkColor;
		$app_linkColorOver = $unResultat->linkColorOver;
		$app_linkColorActive = $unResultat->linkColorActive;
		$app_linkColorVisited = $unResultat->linkColorVisited;
		$app_selectionColorBg = $unResultat->selectionColorBg;
		$app_selectionColor = $unResultat->selectionColor;
	
		$app_bgRegister = $unResultat->bgRegister;
		$app_bgLogin = $unResultat->bgLogin;
		$app_bgComingSoon = $unResultat->bgComingSoon;
		
		$app_bgPrivacy = $unResultat->bgPrivacy;
		$app_bgTerms = $unResultat->bgTerms;
		$app_bgAirlock = $unResultat->bgAirlock;
		$app_bgLostPass = $unResultat->bgLostPass;
		$app_bgFaq = $unResultat->bgFaq;
		$app_bgContact = $unResultat->bgContact;
		
		$app_ifMembersUseKnowledges = $unResultat->ifMembersUseKnowledges;
		$app_ifMembersUseWallet = $unResultat->ifMembersUseWallet;
		$app_ifMembersUseLabel = $unResultat->ifMembersUseLabel;
		$app_ifMembersUseMyFolder = $unResultat->ifMembersUseMyFolder;
		$app_limitSizeMyFolder = $unResultat->limitSizeMyFolder;
		
		$app_paypal = $unResultat->paypal;
		$app_IBAN = $unResultat->IBAN;	
		$app_BIC = $unResultat->BIC;
		
		$app_activeCronTasks = $unResultat->activeCronTasks;	
		$app_cronReport = $unResultat->cronReport;
		$app_emailReportCronTasks = $unResultat->emailReportCronTasks;
		
		//////////////////////////////////////////
		// format time connection, for debug 
		if($app_timeRememberMe=="1800") { $app_timeRememberMeF = "30min";}
		if($app_timeRememberMe=="3600") { $app_timeRememberMeF = "1h";}
		if($app_timeRememberMe=="7200") { $app_timeRememberMeF = "2h";}
		if($app_timeRememberMe=="18000") { $app_timeRememberMeF = "5h";}
		if($app_timeRememberMe=="36000") { $app_timeRememberMeF = "10h";}
		if($app_timeRememberMe=="86400") { $app_timeRememberMeF = "24h";}
		if($app_timeConnection=="120") { $app_timeConnectionF = "2min";}
		if($app_timeConnection=="300") { $app_timeConnectionF = "5min";}
		if($app_timeConnection=="600") { $app_timeConnectionF = "10min";}
		if($app_timeConnection=="1200") { $app_timeConnectionF = "20min";}
		if($app_timeConnection=="1800") { $app_timeConnectionF = "30min";}
		
		if($app_limitTimeProcessDoubleAndLost=="60") { $app_limitTimeProcessDoubleAndLostF = "1min";}
		if($app_limitTimeProcessDoubleAndLost=="120") { $app_limitTimeProcessDoubleAndLostF = "2min";}
		if($app_limitTimeProcessDoubleAndLost=="180") { $app_limitTimeProcessDoubleAndLostF = "3min";}
		if($app_limitTimeProcessDoubleAndLost=="240") { $app_limitTimeProcessDoubleAndLostF = "4min";}
		if($app_limitTimeProcessDoubleAndLost=="300") { $app_limitTimeProcessDoubleAndLostF = "5min";}
		
		if($app_limitTimeBlackList=="21600") { $app_limitTimeBlackListF = "6h";}
		if($app_limitTimeBlackList=="43200") { $app_limitTimeBlackListF = "12h";}
		if($app_limitTimeBlackList=="86400") { $app_limitTimeBlackListF = "24h";}
		if($app_limitTimeBlackList=="604800") { $app_limitTimeBlackListF = "one week";}
		if($app_limitTimeBlackList=="2419200") { $app_limitTimeBlackListF = "one month";}
	}
}else {
	///////////////////////////////////////////////
	///////////////////////////////////////////////
	// Manual Settings
	// here the four minimum settings to start *
	// first of all please fill in all field *
	///////////////////////////////////////////////
	// define if the project is local or online
	///////////////////////////////////////////////
	///////////////////////////////////////////////
	//////////////// url root * ///////////////////
	///////////////////////////////////////////////
	// works in local ????????????? check
	// for absolute link need for 404 page head style and function ajax php framework
	$app_urlRoot = ""; // $_SERVER['HTTP_HOST']

	///////////////////////////////////////////////
	//////////// project name * ////////////////////
	///////////////////////////////////////////////
	// title and other use
	$app_nameProject = "";
	
	///////////////////////////////////////////////
	////////////// mailto contact * /////////////////
	///////////////////////////////////////////////
	// used for contact form, and general
	$app_emailContactProject = "";// team@yourproject.org
	
	///////////////////////////////////////////////
	////////////// com email * /////////////////
	///////////////////////////////////////////////
	// used for contact email 
	$app_emailComEmailProject = "";// team@yourproject.org
	
	///////////////////////////////////////////////
	// optional 
	///////////////////////////////////////////////

	///////////////////////////////////////////////
	////////////////// count down /////////////////
	///////////////////////////////////////////////
	// target date (month start at 0 so -1)
	$app_dateCountDownProject = "2020,04,30"; //  if empty one year by default or your date "2020, 3, 30" 
	// since or until
	$app_sinceOrUntilCountDownProject = "until"; // since or until


	///////////////////////////////////////////////
	///////// control minimum setting /////////////
	///////////////////////////////////////////////
	// try if the minimum setting are filled
	// you mustn't set this code!
	$ok_urlRoot = false;
	$ok_nameProject = false;
	$ok_emailContactProject = false;
	$okEmailComEmailProject = false;

	if($app_urlRoot!="") { $ok_urlRoot=true;}
	if($app_nameProject!="") { $ok_nameProject=true;}
	
	if (preg_match("/^[\w\.\w]+@[\w\.-]+\.[a-z]{2,10}$/i", $app_emailContactProject) ) {
		$ok_emailContactProject = true;
		$app_emailContactProject = strtolower($app_emailContactProject);
	}
	if (preg_match("/^[\w\.\w]+@[\w\.-]+\.[a-z]{2,10}$/i", $app_emailComEmailProject) ) {
		$okEmailComEmailProject = true;
		$app_emailComEmailProject = strtolower($app_emailComEmailProject);
	}
	// general test
	if(($ok_urlRoot==true) && ($ok_nameProject==true) && ($ok_emailContactProject==true) && ($okEmailComEmailProject==true)) {
		$okSettings = true;
	}else {
		// if setteing file is not fill in
		header("location:infos/install.html");
	}
}

?>