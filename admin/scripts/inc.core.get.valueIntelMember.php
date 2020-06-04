<?php 
$dbRequest=$connectDBIntelApp->query("select * from members_intel where idMember='$idMember'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequest->fetch() ) {	
	$idIntelMember = $getResult->idIntelMember;
	$ipUserMember = $getResult->ipUser;
	$dateInscriptionMember = $getResult->dateInscription;
	$rightsMember = $getResult->rights;
	$subRightsMember = $getResult->subRights;
	$fonctionMember = $getResult->fonction;
	$avatarMember = $getResult->avatar;
	$bgProfileMember = $getResult->bgProfile;
	$ifMPMember = $getResult->ifMP;
	$ifUseEmailMember = $getResult->ifUseEmail; 
	$emailServerMember = $getResult->emailServer;
	$passEmailServerMember = $getResult->passEmailServer;	
	$ifNotyUpMember = $getResult->ifNotyUp;
	$ifProfileAllPrivateMember = $getResult->ifProfileAllPrivate;
	$ifPublicPostMember = $getResult->ifPublicPost;
	$ifPublicFriendListMember = $getResult->ifPublicFriendList;
	$ifPublicVideoMember = $getResult->ifPublicVideo;
	$ifPublicPhotoMember = $getResult->ifPublicPhoto;
	$ifShowFonctionMember = $getResult->ifShowFonction;
	$ifShowSkillsMember = $getResult->ifShowSkills;
	$ifShowAgeMember = $getResult->ifShowAge;
	$ifShowSexMember = $getResult->ifShowSex;
	$ifShowSportsMember = $getResult->ifShowSports;
	$ifShowHobbiesMember = $getResult->ifShowHobbies;
	$ifShowPhonePersoMember = $getResult->ifShowPhonePerso;
	$ifShowPhoneProMember = $getResult->ifShowPhonePro;
	$ifShowSkypeMember = $getResult->ifShowSkype;
	$ifShowWebsitePersoMember = $getResult->ifShowWebsitePerso;
	$ifShowWebsiteProMember = $getResult->ifShowWebsitePro;
	$ifShowSocialLink1Member = $getResult->ifShowSocialLink1;
	$ifShowSocialLink2Member = $getResult->ifShowSocialLink2;
	$ifShowSocialLink3Member = $getResult->ifShowSocialLink3;
	$ifShowNameMember = $getResult->ifShowName;
	$ifShowEmailMember = $getResult->ifShowEmail;
	$ifShowPhoneMember = $getResult->ifShowPhone;
	$ifShowEntryCodeMember = $getResult->ifShowEntryCode;
	$ifShowStreetMember = $getResult->ifShowStreet;
	$ifShowZipCodeMember = $getResult->ifShowZipCode;
	$ifShowCityMember = $getResult->ifShowCity;
	$ifShowStateMember = $getResult->ifShowState;
	$ifShowCountryMember = $getResult->ifShowCountry;
	
	$languagePrefMember = $getResult->languagePref;
	$deliveryScheduleMember = $getResult->deliverySchedule;
	$preferedHoursMember = $getResult->preferedHours;
}
// extrac registration date 
$dateIJJ = substr($dateInscriptionMember, 8, 2);     // day  
$dateIMM = substr($dateInscriptionMember, 5, 2);    // month 
$dateIAAAA = substr($dateInscriptionMember, 0, 4); // year
$dateInscriptionMemberOrgi = $dateIAAAA."-".$dateIMM."-".$dateIJJ;
$dateInscriptionMember = $dateIJJ."-".$dateIMM."-".$dateIAAAA;
////////////////////////////////////////////////////////////
// count + info
////////////////////////////////////////////////////////////
// count video
$totalVideoMember = $connectDBIntelApp->query("select count(idVideo) from videos where idMember='$idMember'")->fetchColumn();
// count photo
$totalPhotoMember = $connectDBIntelApp->query("select count(idPhoto) from photos where idMember='$idMember'")->fetchColumn();
// count bill
$totalBillMember = $connectDBIntelApp->query("select count(idBill) from admin_bill where idMember='$idMember'")->fetchColumn();
// count comments
$totalCommentsMember = $connectDBIntelApp->query("select count(id) from comments where idMember='$idMember'")->fetchColumn();
// count comments_votes
$totalCommentsVotesMember = $connectDBIntelApp->query("select count(idCommentVote) from comments_votes where idMember='$idMember'")->fetchColumn();
// count galleries
$totalGalleryMember = $connectDBIntelApp->query("select count(idGallery) from galleries where idMember='$idMember'")->fetchColumn();
// count labels
$totalLabelsMember = $connectDBIntelApp->query("select count(idLabel) from labels where idMember='$idMember'")->fetchColumn();
// count posts
$totalPostsMember = $connectDBIntelApp->query("select count(idPost) from posts where idMember='$idMember'")->fetchColumn();
// count groups
$totalGroupsMember = $connectDBIntelApp->query("select count(idGroup) from members_groups where idMember='$idMember' and active='yes'")->fetchColumn();
// count people blocked
$totalPeopleBlockedMember = $connectDBIntelApp->query("select count(id) from members_blocked where idMember='$idMember'")->fetchColumn();
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
// count how many friends
////////////////////////////////////////////////////////////
$totalFriendsMember=0;
// while people who want to be friend with member
$dbRequest_friends=$connectDBIntelApp->query("select * from members_friends where idMemberFriend='$idMember'");
$dbRequest_friends->setFetchMode(PDO::FETCH_OBJ);
while( $getResult_friends = $dbRequest_friends->fetch() ) {
	$idFriend = $getResult_friends->idMember;
	// check if him too
	$dbRequest_friendToo=$connectDBIntelApp->query("select * from members_friends where idMember='$idMember' and idMemberFriend='$idFriend'");
	$dbRequest_friendToo->setFetchMode(PDO::FETCH_OBJ);
	if( $getResult_friendToo = $dbRequest_friendToo->fetch() ) {
		// count friends reciprocal
		$totalFriendsMember+=1;
	}
}

?>