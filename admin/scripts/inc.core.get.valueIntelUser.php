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
	$ifProfileAllPrivateUser = $getResult->ifProfileAllPrivate;
	$ifPublicPostUser = $getResult->ifPublicPost;
	$ifPublicFriendListUser = $getResult->ifPublicFriendList;
	$ifPublicVideoUser = $getResult->ifPublicVideo;
	$ifPublicPhotoUser = $getResult->ifPublicPhoto;
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
	$ifShowEmailUser = $getResult->ifShowEmail;
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
// count posts
$totalPostsUser = $connectDBIntelApp->query("select count(idPost) from posts where idMember='$idUser'")->fetchColumn();
// count groups
$totalGroupsUser = $connectDBIntelApp->query("select count(idGroup) from members_groups where idMember='$idUser' and active='yes'")->fetchColumn();
// count people blocked 
$totalPeopleBlacklistedUser = $connectDBIntelApp->query("select count(id) from members_blocked where idMember='$idUser'")->fetchColumn();
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
// count how many noty not views
////////////////////////////////////////////////////////////
$totalNotyUser=0;
// while noty not see
$dbRequest_noty=$connectDBIntelApp->query("select * from site_noty where idMember='$idUser'");
$dbRequest_noty->setFetchMode(PDO::FETCH_OBJ);
while( $getResult_noty = $dbRequest_noty->fetch() ) {
	$idNoty = $getResult_noty->idNoty;
	// check if saw
	$dbRequest_notySaw=$connectDBIntelApp->query("select * from site_notySawByUser where idMemberWhoSawNoty='$idUser' and idNoty='$idNoty'");
	$dbRequest_notySaw->setFetchMode(PDO::FETCH_OBJ);
	if( $getResult_notySaw = $dbRequest_notySaw->fetch() ) {
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
$dbRequest_noty=$connectDBIntelApp->query("select * from site_noty where idMember='$idUser'");
$dbRequest_noty->setFetchMode(PDO::FETCH_OBJ);
while( $getResult_noty = $dbRequest_noty->fetch() ) {
	$idNoty = $getResult_noty->idNoty;
	// check if saw
	$dbRequest_notySaw=$connectDBIntelApp->query("select * from site_notySawByUser where idMemberWhoSawNoty='$idUser' and idNoty='$idNoty'");
	$dbRequest_notySaw->setFetchMode(PDO::FETCH_OBJ);
	if( $getResult_notySaw = $dbRequest_notySaw->fetch() ) {
		// count noty saw 
		$totalNotyArchivedUser+=1;
	}
}

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
// count how many requests friends
////////////////////////////////////////////////////////////
$totalRequestsFriendsUser=0;
// while people who want to be friend with me
$dbRequest_rf=$connectDBIntelApp->query("select * from members_friends where idMemberFriend='$idUser'");
$dbRequest_rf->setFetchMode(PDO::FETCH_OBJ);
while( $getResult_rf = $dbRequest_rf->fetch() ) {
	$idFriend = $getResult_rf->idMember;
	// check if me too
	$dbRequest_friendToo=$connectDBIntelApp->query("select * from members_friends where idMember='$idUser' and idMemberFriend='$idFriend'");
	$dbRequest_friendToo->setFetchMode(PDO::FETCH_OBJ);
	if( $getResult_friendToo = $dbRequest_friendToo->fetch() ) {
		// nothing
	}else {
		// count requests friend
		$totalRequestsFriendsUser+=1;
	}
}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
// count how many friends
////////////////////////////////////////////////////////////
$totalFriendsUser=0;
// while people who want to be friend with me
$dbRequest_friends=$connectDBIntelApp->query("select * from members_friends where idMemberFriend='$idUser'");
$dbRequest_friends->setFetchMode(PDO::FETCH_OBJ);
while( $getResult_friends = $dbRequest_friends->fetch() ) {
	$idFriend = $getResult_friends->idMember;
	// check if me too
	$dbRequest_friendToo=$connectDBIntelApp->query("select * from members_friends where idMember='$idUser' and idMemberFriend='$idFriend'");
	$dbRequest_friendToo->setFetchMode(PDO::FETCH_OBJ);
	if( $getResult_friendToo = $dbRequest_friendToo->fetch() ) {
		// count friends reciprocal
		$totalFriendsUser+=1;
	}
}








?>