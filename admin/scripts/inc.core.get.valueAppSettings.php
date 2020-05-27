<?php
$dbRequest=$connectDBIntelApp->query("select * from site_settings where idSetting='77'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequest->fetch() ) {
	$set_activeDbSettings = $getResult->activeDbSettings;
	$set_app_version = $getResult->app_version;
	$set_app_version_date = $getResult->app_version_date;
	$set_ifActivePsp = $getResult->ifActivePsp;
	// if yes recup config psp
	if($set_ifActivePsp=="yes") {
		$dbRequestPsp=$connectDBIntelApp->query("select * from admin_psp where id='77' and idType='admin'");
		$dbRequestPsp->setFetchMode(PDO::FETCH_OBJ);
		if( $getResult = $dbRequestPsp->fetch() ) {
			$set_psp_productionMode = $getResult->productionMode;
			$set_psp_pspId = $getResult->pspId;
			$set_psp_shaIn = $getResult->shaIn;
			$set_psp_shaOut = $getResult->shaOut;
			$set_psp_ifUrlBack = $getResult->ifUrlBack;
			$set_psp_urlOk = $getResult->urlOk;
			$set_psp_urlNok = $getResult->urlNok;
			$set_psp_urlException = $getResult->urlException;
			$set_psp_urlCancel = $getResult->urlCancel;
			$set_psp_logoFileName = $getResult->logoFileName;
			$set_psp_urlHome = $getResult->urlHome;
			$set_psp_urlCatalogue = $getResult->urlCatalogue;
			$set_psp_urlDynmiqueTamplate = $getResult->urlDynmiqueTamplate;
		}
	}
	$set_urlRoot = $getResult->urlRoot;// required
	$set_nameProject = $getResult->nameProject;// required
	$set_emailContactProject = $getResult->emailContactProject;// required
	$set_emailComEmailProject = $getResult->emailComEmailProject;// required
	
	$set_ifKillAllSessionBlockLogin = $getResult->ifKillAllSessionBlockLogin;
	$set_ifLimitToComingSoon = $getResult->ifLimitToComingSoon;
	$set_ifOnlyUseApp = $getResult->ifOnlyApp;
	$set_ifBlockNewRegistration = $getResult->ifBlockNewRegistration;
	$set_ifLocalSite = $getResult->ifLocalSite;
	$set_faviconProject = $getResult->faviconProject;
	$set_logoProject = $getResult->logoProject;
	$set_logoHProject = $getResult->logoHProject;
	$set_logoEmailProject = $getResult->logoEmailProject;
	$set_logoPdfProject = $getResult->logoPdfProject;
	$set_dateCountDownProject = $getResult->dateCountDownProject;
	$set_sinceOrUntilCountDownProject = $getResult->sinceOrUntilCountDownProject;
	$set_ifRememberMe = $getResult->ifRememberMe;
	$set_timeRememberMe = $getResult->timeRememberMe;
	$set_timeConnection = $getResult->timeConnection;
	$set_limitTimeProcessDoubleAndLost = $getResult->limitTimeProcessDoubleAndLost;
	$set_limitTimeBlackList = $getResult->limitTimeBlackList;
	$set_ifLimitAge = $getResult->ifLimitAge;
	$set_limitAge = $getResult->limitAge;
	$set_ifDoubleAuthentification = $getResult->ifDoubleAuthentification;
	$set_ifDemandSecurePassword = $getResult->ifDemandSecurePassword;
	$set_ifDemandSecureEmail = $getResult->ifDemandSecureEmail;
	$set_secureWebMail = $getResult->secureWebMail;
	$set_ifActiveAcceptCookies = $getResult->ifActiveAcceptCookies;
	$set_ifLookSelectAndRightClic = $getResult->ifLookSelectAndRightClic;
	$set_ifSharingFolder = $getResult->ifSharingFolder;
	$set_limitSizePublicFolder = $getResult->limitSizePublicFolder;
	$set_ifGathering = $getResult->ifGathering;
	$set_ifUseAudio = $getResult->ifUseAudio;
	$set_volume = $getResult->volume;
	$set_bgProfileHeader = $getResult->bgProfileHeader;
	$set_avatarProfile = $getResult->avatarProfile;
	$set_linkColor = $getResult->linkColor;
	$set_linkColorOver = $getResult->linkColorOver;
	$set_linkColorActive = $getResult->linkColorActive;
	$set_linkColorVisited = $getResult->linkColorVisited;
	$set_selectionColorBg = $getResult->selectionColorBg;
	$set_selectionColor = $getResult->selectionColor;
	$set_bgRegister = $getResult->bgRegister;
	$set_bgLogin = $getResult->bgLogin;
	$set_bgComingSoon = $getResult->bgComingSoon;
	$set_bgPrivacy = $getResult->bgPrivacy;
	$set_bgTerms = $getResult->bgTerms;
	$set_bgAirlock = $getResult->bgAirlock;
	$set_bgLostPass = $getResult->bgLostPass;
	$set_bgFaq = $getResult->bgFaq;
	$set_bgContact = $getResult->bgContact;
	$set_ifMembersUseKnowledges = $getResult->ifMembersUseKnowledges;
	$set_ifMembersUseWallet = $getResult->ifMembersUseWallet;
	$set_ifMembersUseLabel = $getResult->ifMembersUseLabel;
	$set_ifMembersUseMyFolder = $getResult->ifMembersUseMyFolder;
	$set_limitSizeMyFolder = $getResult->limitSizeMyFolder;
	$set_paypal = $getResult->paypal;
	$set_IBAN = $getResult->IBAN;	
	$set_BIC = $getResult->BIC;
	
	$set_activeCronTasks = $getResult->activeCronTasks;	
	$set_cronReport = $getResult->cronReport;
	$set_emailReportCronTasks = $getResult->emailReportCronTasks;
	
	//////////////////////////////////////////
	// format time connection
	if($set_timeRememberMe=="1800") { $set_timeRememberMeF = "30min";}
	if($set_timeRememberMe=="3600") { $set_timeRememberMeF = "1h";}
	if($set_timeRememberMe=="7200") { $set_timeRememberMeF = "2h";}
	if($set_timeRememberMe=="18000") { $set_timeRememberMeF = "5h";}
	if($set_timeRememberMe=="36000") { $set_timeRememberMeF = "10h";}
	if($set_timeRememberMe=="86400") { $set_timeRememberMeF = "24h";}
	if($set_timeConnection=="120") { $set_timeConnectionF = "2min";}
	if($set_timeConnection=="300") { $set_timeConnectionF = "5min";}
	if($set_timeConnection=="600") { $set_timeConnectionF = "10min";}
	if($set_timeConnection=="1200") { $set_timeConnectionF = "20min";}
	if($set_timeConnection=="1800") { $set_timeConnectionF = "30min";}
	
	if($set_limitTimeProcessDoubleAndLost=="60") { $set_limitTimeProcessDoubleAndLostF = "1min";}
	if($set_limitTimeProcessDoubleAndLost=="120") { $set_limitTimeProcessDoubleAndLostF = "2min";}
	if($set_limitTimeProcessDoubleAndLost=="180") { $set_limitTimeProcessDoubleAndLostF = "3min";}
	if($set_limitTimeProcessDoubleAndLost=="240") { $set_limitTimeProcessDoubleAndLostF = "4min";}
	if($set_limitTimeProcessDoubleAndLost=="300") { $set_limitTimeProcessDoubleAndLostF = "5min";}
	
	if($set_limitTimeBlackList=="21600") { $set_limitTimeBlackListF = "6h";}
	if($set_limitTimeBlackList=="43200") { $set_limitTimeBlackListF = "12h";}
	if($set_limitTimeBlackList=="86400") { $set_limitTimeBlackListF = "24h";}
	if($set_limitTimeBlackList=="604800") { $set_limitTimeBlackListF = "one week";}
	if($set_limitTimeBlackList=="2419200") { $set_limitTimeBlackListF = "one month";}
	
	//////////////////////////////////////////
	// check if can switch in dynamic settings
	$okCanUseDynamicSettings = false;
	$okEmailContactProject = false;
	if (preg_match("/^[\w\.\w]+@[\w\.-]+\.[a-z]{2,10}$/i", $set_emailContactProject) ) {
		$okEmailContactProject = true;
		$set_emailContactProject = strtolower($set_emailContactProject);// met tout en minuscule, strtoupper() fais l'inverse
	}
	if (preg_match("/^[\w\.\w]+@[\w\.-]+\.[a-z]{2,10}$/i", $set_emailComEmailProject) ) {
		$okEmailComEmailProject = true;
		$set_emailComEmailProject = strtolower($set_emailComEmailProject);
	}
	if(($set_nameProject!="") && ($set_urlRoot!="") && ($okEmailContactProject==true) && ($okEmailComEmailProject==true)) {
		$okCanUseDynamicSettings = true;
	}
}
?>