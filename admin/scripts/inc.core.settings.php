<?php
///////////////////////////////////////////////
///////////////////////////////////////////////
///////////// General Settings ////////////////
///////////////////////////////////////////////
///////////////////////////////////////////////
// check if db installed?
$dbRequest=$connectDBIntelApp->query("select * from site_settings where idSetting='77'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequest->fetch() ) { 
	$set_activeSettingDb = $getResult->activeDbSettings;
	$set_urlRoot = $getResult->urlRoot;
	$set_nameProject = $getResult->nameProject;
	$set_emailContactProject = $getResult->emailContactProject;
	$set_emailComEmailProject = $getResult->emailComEmailProject;
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
if(($set_activeSettingDb=="yes") && ($okCanUseDynamicSettings==true)) {// yes it is in dynamic mode
	// if yes switch setting in dynamic and recup info
	$dbRequest=$connectDBIntelApp->query("select * from site_settings where idSetting='77'");
	$dbRequest->setFetchMode(PDO::FETCH_OBJ);
	if( $getResult = $dbRequest->fetch() ) {
		///////////////////////////////////////////////
		///////////// set settings in app /////////////
		///////////////////////////////////////////////
		$okSettings = true;
		$app_publicKey = $getResult->publicKey;
		$app_privateKey = $getResult->privateKey;
		$app_version = $getResult->app_version;
		$app_version_date = $getResult->app_version_date;
		// format date app version
		$dateJJ = substr($app_version_date, 8, 2);// day  
		$dateMM = substr($app_version_date, 5, 2);// month 
		$dateAAAA = substr($app_version_date, 0, 4);// year
		$app_version_date = $dateJJ."-".$dateMM."-".$dateAAAA;
		
		$app_ifActivePsp = $getResult->ifActivePsp;
		// if yes recup config psp
		if($app_ifActivePsp=="yes") {
			$dbRequestPsp=$connectDBIntelApp->query("select * from admin_psp where id='77' and idType='admin'");
			$dbRequestPsp->setFetchMode(PDO::FETCH_OBJ);
			if( $getResultPsp = $dbRequestPsp->fetch() ) {
				$app_psp_productionMode = $getResultPsp->productionMode;
				$app_psp_pspId = $getResultPsp->pspId;
				$app_psp_shaIn = $getResultPsp->shaIn;
				$app_psp_shaOut = $getResultPsp->shaOut;
				$app_psp_ifUrlBack = $getResultPsp->ifUrlBack;
				$app_psp_urlOk = $getResultPsp->urlOk;
				$app_psp_urlNok = $getResultPsp->urlNok;
				$app_psp_urlException = $getResultPsp->urlException;
				$app_psp_urlCancel = $getResultPsp->urlCancel;
				$app_psp_logoFileName = $getResultPsp->logoFileName;
				$app_psp_urlHome = $getResultPsp->urlHome;
				$app_psp_urlCatalogue = $getResultPsp->urlCatalogue;
				$app_psp_urlDynmiqueTamplate = $getResultPsp->urlDynmiqueTamplate;
			}
		}
		
		
		$app_ifKillAllSessionBlockLogin = $getResult->ifKillAllSessionBlockLogin;
		$app_ifLimitToComingSoon = $getResult->ifLimitToComingSoon;
		$app_ifOnlyUseApp = $getResult->ifOnlyApp;
		$app_ifBlockNewRegistration = $getResult->ifBlockNewRegistration;
		
		$app_ifLocalSite = $getResult->ifLocalSite;
		$app_urlRoot = $getResult->urlRoot;
		// used for filemanager
		$_SESSION['app_urlRoot'] = $app_urlRoot;
		$app_nameProject = $getResult->nameProject;
		$app_faviconProject = $getResult->faviconProject;
		$app_logoProject = $getResult->logoProject;
		$app_logoHProject = $getResult->logoHProject;
		$app_logoEmailProject = $getResult->logoEmailProject;
		$app_logoPdfProject = $getResult->logoPdfProject;
		$app_emailContactProject = $getResult->emailContactProject;
		$app_emailComEmailProject = $getResult->emailComEmailProject;
		$app_dateCountDownProject = $getResult->dateCountDownProject;
		$app_sinceOrUntilCountDownProject = $getResult->sinceOrUntilCountDownProject;
		$app_ifRememberMe = $getResult->ifRememberMe;
		$app_timeRememberMe = $getResult->timeRememberMe;
		$app_timeConnection = $getResult->timeConnection;
		$app_limitTimeProcessDoubleAndLost = $getResult->limitTimeProcessDoubleAndLost;
		$app_limitTimeBlackList = $getResult->limitTimeBlackList;
		$app_ifLimitAge = $getResult->ifLimitAge;
		$app_limitAge = $getResult->limitAge;
		$app_ifDoubleAuthentification = $getResult->ifDoubleAuthentification;
		$app_ifDemandSecurePassword = $getResult->ifDemandSecurePassword; 
		$app_ifDemandSecureEmail = $getResult->ifDemandSecureEmail;
		$app_secureWebMail = $getResult->secureWebMail;
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
		$app_ifActiveAcceptCookies = $getResult->ifActiveAcceptCookies;
		$app_ifLookSelectAndRightClic = $getResult->ifLookSelectAndRightClic;
		$app_ifSharingFolder = $getResult->ifSharingFolder;
		$app_limitSizePublicFolder = $getResult->limitSizePublicFolder;
		// format size
		$app_limitSizePublicFolderOctet = $app_limitSizePublicFolder*1000000;// get octets
		
		$app_ifGathering = $getResult->ifGathering;
		
		$app_ifUseAudio = $getResult->ifUseAudio;
		$app_volume = $getResult->volume;
		
		$app_bgProfileHeader = $getResult->bgProfileHeader;
		/*$app_avatarProfile = $getResult->bgProfileHeader;*/
		$app_avatarProfile = $getResult->avatarProfile;
		$app_linkColor = $getResult->linkColor;
		$app_linkColorOver = $getResult->linkColorOver;
		$app_linkColorActive = $getResult->linkColorActive;
		$app_linkColorVisited = $getResult->linkColorVisited;
		$app_selectionColorBg = $getResult->selectionColorBg;
		$app_selectionColor = $getResult->selectionColor;
	
		$app_bgRegister = $getResult->bgRegister;
		$app_bgLogin = $getResult->bgLogin;
		$app_bgComingSoon = $getResult->bgComingSoon;
		
		$app_bgPrivacy = $getResult->bgPrivacy;
		$app_bgTerms = $getResult->bgTerms;
		$app_bgAirlock = $getResult->bgAirlock;
		$app_bgLostPass = $getResult->bgLostPass;
		$app_bgFaq = $getResult->bgFaq;
		$app_bgContact = $getResult->bgContact;
		
		$app_ifMembersUseKnowledges = $getResult->ifMembersUseKnowledges;
		$app_ifMembersUseWallet = $getResult->ifMembersUseWallet;
		$app_ifMembersUseLabel = $getResult->ifMembersUseLabel;
		$app_ifMembersUseMyFolder = $getResult->ifMembersUseMyFolder;
		$app_limitSizeMyFolder = $getResult->limitSizeMyFolder;
		// format size
		$app_limitSizeMyFolderOctet = $app_limitSizeMyFolder*1000000;// get octets
		
		$app_paypal = $getResult->paypal;
		$app_IBAN = $getResult->IBAN;	
		$app_BIC = $getResult->BIC;
		
		$app_activeCronTasks = $getResult->activeCronTasks;	
		$app_cronReport = $getResult->cronReport;
		$app_emailReportCronTasks = $getResult->emailReportCronTasks;
		
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
	/////////////////////////////////////////////// HERE TO START :)
	// Manual Settings
	// here the four minimum settings to start *
	// first of all please fill in all field *
	///////////////////////////////////////////////
	///////////////////////////////////////////////
	///////////////////////////////////////////////
	//////////////// url root * ///////////////////
	///////////////////////////////////////////////
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
		$$app_emailContactProject = strtolower($$app_emailContactProject);
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
		//header("location:infos/install.php");
	}
}

?>