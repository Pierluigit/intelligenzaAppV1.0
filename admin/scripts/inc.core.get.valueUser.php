<?php 
$dbRequest=$connectDBIntelApp->query("select * from members where idMember='$idUser'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequest->fetch() ) {
	$idMCodeUser = $getResult->idMCode;
	$pseudoUser = $getResult->pseudo;
	$emailUser = $getResult->email;
	$passwordUser = $getResult->password;
	$emailChangeUser = $getResult->emailChange;
	$dateRequestChangeEmailUser = $getResult->dateRequestChangeEmail;
	$doubleAuthentificationCodeUser = $getResult->doubleAuthentificationCode;
	$dateDoubleAuthentificationUser = $getResult->dateDoubleAuthentification;
	$jobUser = $getResult->job;
	$skillsUser = $getResult->skills;	
	$ageUser = $getResult->age;	
	$sexUser = $getResult->sex;	
	$sportsUser = $getResult->sports;	
	$hobbiesUser = $getResult->hobbies;
	$phonePersoUser = $getResult->phonePerso;
	$phoneProUser = $getResult->phonePro;
	$skypePseudoUser = $getResult->skypePseudo;
	$websitePersoUser = $getResult->websitePerso;
	$websiteProUser = $getResult->websitePro;
	$socialLink1User = $getResult->socialLink1;
	$socialLink2User = $getResult->socialLink2;
	$socialLink3User = $getResult->socialLink3;
	$ifDeletAccuntUser = $getResult->ifDeletAccunt;
	$dateAskDeletionUser = $getResult->dateAskDeletion;
	$commentDeleteUser = $getResult->commentDelete;
	$ifEmailConfirmedUser = $getResult->ifEmailConfirmed;
	
	//////////////////////////////
	// check if demand secure email
	///////////////////////////////

	if($app_ifDemandSecureEmail=="yes") {
		// explode app_secureWebMail
		$secureWebMail = explode("/", $app_secureWebMail);
		$found = 0;
		foreach ($secureWebMail as $webmail) {
			if($ifFound = strstr($emailUser, $webmail)) {
				$foud+=1;
			}
		}
		if($foud==0) {
			// demand secure email noty
			$_SESSION['emailNotSecure'] = true;
			// echo($app_linksSecureWebMail);exit();
		}else {
			unset($_SESSION['emailNotSecure']);
		}
	}
}
?>