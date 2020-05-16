<?php 
$dbRequest=$connectDBIntelApp->query("select * from members where idMember='$idMember'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequest->fetch() ) {	
	$pseudoMember = $getResult->pseudo;
	$emailMember = $getResult->email;
	$passwordMember = $getResult->password;
	$emailChangeMember = $getResult->emailChange;
	$dateRequestChangeEmailMember = $getResult->dateRequestChangeEmail;
	$doubleAuthentificationCodeMember = $getResult->doubleAuthentificationCode;
	$jobMember = $getResult->job;
	$skillsMember = $getResult->skills;	
	$ageMember = $getResult->age;	
	$sexMember = $getResult->sex;	
	$sportsMember = $getResult->sports;	
	$hobbiesMember = $getResult->hobbies;
	$phonePersoMember = $getResult->phonePerso;
	$phoneProMember = $getResult->phonePro;
	$skypePseudoMember = $getResult->skypePseudo;
	$websitePersoMember = $getResult->websitePerso;
	$websiteProMember = $getResult->websitePro;
	$socialLink1Member = $getResult->socialLink1;
	$socialLink2Member = $getResult->socialLink2;
	$socialLink3Member = $getResult->socialLink3;
	$ifDeletAccuntMember = $getResult->ifDeletAccunt;
	$dateAskDeletionMember = $getResult->dateAskDeletion;
	$commentDeleteMember = $getResult->commentDelete;
	$ifEmailConfirmedMember = $getResult->ifEmailConfirmed;
	
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
			$emailNotSecureMember = true;
			// echo($app_linksSecureWebMail);exit();
		}else {
			$emailNotSecureMember = false;
		}
	}
}
?>