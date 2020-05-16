<?php
$dbRequest=$connectDBIntelApp->query("select * from members_intel where idMember='$idUser'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequest->fetch() ) {
	$idIntelMemberUser = $getResult->idIntelMember;
	$ipUser = $getResult->ipUser;
	$dateInscriptionUser = $getResult->dateInscription;
	$rightsUser = $getResult->rights;
	$subRightsUser = $getResult->subRights;
	$fonctionUser = $getResult->fonction;
	$avatarUser = $getResult->avatar;
	$bgProfileUser = $getResult->bgProfile;
	$ifMPUser = $getResult->ifMP;
	$ifUseEmailUser = $getResult->ifUseEmail; 
	$emailServerUser = $getResult->emailServer;
	$passEmailServerUser = $getResult->passEmailServer;	
	$ifNotyUpUser = $getResult->ifNotyUp;
	$ifPublicProfileUser = $getResult->ifPublicProfile;
	$ifPublicPostUser = $getResult->ifPublicPost;
	$ifPublicFriendListUser = $getResult->ifPublicFriendList;
	$ifShowFonctionUser = $getResult->ifShowFonction;
	$ifShowSkillsUser = $getResult->ifShowSkills;
	$ifShowAgeUser = $getResult->ifShowAge;
	$ifShowSexUser = $getResult->ifShowSex;
	$ifShowSportsUser = $getResult->ifShowSports;
	$ifShowHobbiesUser = $getResult->ifShowHobbies;
	$ifShowPhonePersoUser = $getResult->ifShowPhonePerso;
	$ifShowPhoneProUser = $getResult->ifShowPhonePro;
	$ifShowSkypeUser = $getResult->ifShowSkype;
	$ifShowWebsitePersoUser = $getResult->ifShowWebsitePerso;
	$ifShowWebsiteProUser = $getResult->ifShowWebsitePro;
	$ifShowSocialLink1User = $getResult->ifShowSocialLink1;
	$ifShowSocialLink2User = $getResult->ifShowSocialLink2;
	$ifShowSocialLink3User = $getResult->ifShowSocialLink3;
	$ifShowNameUser = $getResult->ifShowName;
	$ifShowPhoneUser = $getResult->ifShowPhone;
	$ifShowEntryCodeUser = $getResult->ifShowEntryCode;
	$ifShowStreetUser = $getResult->ifShowStreet;
	$ifShowZipCodeUser = $getResult->ifShowZipCode;
	$ifShowCityUser = $getResult->ifShowCity;
	$ifShowStateUser = $getResult->ifShowState;
	$ifShowCountryUser = $getResult->ifShowCountry;
	$languagePrefUser = $getResult->languagePref;
	$deliveryScheduleUser = $getResult->deliverySchedule;
	$preferedHoursUser = $getResult->preferedHours;
}
// extrac registration date 
$dateIJJ = substr($dateInscriptionUser, 8, 2);     // day  
$dateIMM = substr($dateInscriptionUser, 5, 2);    // month 
$dateIAAAA = substr($dateInscriptionUser, 0, 4); // year
$dateInscriptionUserOrgi = $dateIAAAA."-".$dateIMM."-".$dateIJJ;
$dateInscriptionUser = $dateIJJ."-".$dateIMM."-".$dateIAAAA;
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
// count + info
////////////////////////////////////////////////////////////
// count video
$totalVideoUser = $connectDBIntelApp->query("select count(idVideo) from videos where idMember='$idUser'")->fetchColumn();
// compte photo
$totalPhotoUser = $connectDBIntelApp->query("select count(idPhoto) from photos where idMember='$idUser'")->fetchColumn();
// count bill
$totalBillUser = $connectDBIntelApp->query("select count(idBill) from admin_bill where idMember='$idUser'")->fetchColumn();
// count comments
$totalCommentsUser = $connectDBIntelApp->query("select count(id) from comments where idMember='$idUser'")->fetchColumn();
// count comments_votes
$totalCommentsVotesUser = $connectDBIntelApp->query("select count(idCommentVote) from comments_votes where idMember='idUser'")->fetchColumn();
// count galleries
$totalGalleryUser = $connectDBIntelApp->query("select count(idGallery) from galleries where idMember='$idUser'")->fetchColumn();
// count labels
$totalLabelsUser = $connectDBIntelApp->query("select count(idLabel) from labels where idMember='idUser'")->fetchColumn();
// count members_friends
$totalMembersFriendsUser = $connectDBIntelApp->query("select count(id) from members_friends where idMember='$idUser'")->fetchColumn();
// count posts
$totalPostsUser = $connectDBIntelApp->query("select count(idPost) from posts where idMember='$idUser'")->fetchColumn();
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
// count how many noty not views
////////////////////////////////////////////////////////////
$totalNotyUser=0;
// while noty not see
$resultats_noty=$connectDBIntelApp->query("select * from site_noty where idMember='$idUser'");
$resultats_noty->setFetchMode(PDO::FETCH_OBJ);
while( $unResultat_noty = $resultats_noty->fetch() ) {
	$idNoty = $unResultat_noty->idNoty;
	// check if saw
	$resultats_notySaw=$connectDBIntelApp->query("select * from site_notySawByUser where idMemberWhoSawNoty='$idUser' and idNoty='$idNoty'");
	$resultats_notySaw->setFetchMode(PDO::FETCH_OBJ);
	if( $unResultat_notySaw = $resultats_notySaw->fetch() ) {
		// saw nothing
	}else {
		// not see yet
		$totalNotyUser+=1;
	}
}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
// count how many noty views
////////////////////////////////////////////////////////////
$totalNotyArchivedUser=0;
// while noty not see
$resultats_noty=$connectDBIntelApp->query("select * from site_noty where idMember='$idUser'");
$resultats_noty->setFetchMode(PDO::FETCH_OBJ);
while( $unResultat_noty = $resultats_noty->fetch() ) {
	$idNoty = $unResultat_noty->idNoty;
	// check if saw
	$resultats_notySaw=$connectDBIntelApp->query("select * from site_notySawByUser where idMemberWhoSawNoty='$idUser' and idNoty='$idNoty'");
	$resultats_notySaw->setFetchMode(PDO::FETCH_OBJ);
	if( $unResultat_notySaw = $resultats_notySaw->fetch() ) {
		// count noty saw 
		$totalNotyArchivedUser+=1;
	}
}
?>