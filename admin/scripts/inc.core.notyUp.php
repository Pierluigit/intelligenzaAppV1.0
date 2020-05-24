<?php
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
// noty up  data-icon="ti-github"
///////////////////////////////////////////////////////////////
if($ifNotyUpUser=="yes") {
	$resultats_noty=$connectDBIntelApp->query("select * from site_noty where idMember='$idUser' and type='notyUp' order by dateNoty desc limit 8");
	$resultats_noty->setFetchMode(PDO::FETCH_OBJ);
	while( $unResultat_noty = $resultats_noty->fetch() ) {
		$idNoty = $unResultat_noty->idNoty;
		$idFrom = $unResultat_noty->idFrom;
		// recup pseudo
		if($idFrom!=0) {// if not 0 = admin
			$resultats_notyMFrom=$connectDBIntelApp->query("select * from members where idMember='$idFrom'");
			$resultats_notyMFrom->setFetchMode(PDO::FETCH_OBJ);
			if( $unResultat_notyMFrom = $resultats_notyMFrom->fetch() ) {
				$pseudoFrom = $unResultat_notyMFrom->pseudo;
			}
			// recup avatar
			$resultats_notyMIFrom=$connectDBIntelApp->query("select * from members_intel where idMember='$idFrom'");
			$resultats_notyMIFrom->setFetchMode(PDO::FETCH_OBJ);
			if( $unResultat_notyMIFrom = $resultats_notyMIFrom->fetch() ) {
				$avatarFrom = $unResultat_notyMIFrom->avatar;
				if($avatarFrom!="") {// user have owns avatar
					$avatarFrom="../members/id_".$idFrom."/img/".$avatarFrom."";
				}else {
					if($app_avatarProfile!="") {// user doesn't have own avatar
						$avatarFrom="../images/logo/".$app_avatarProfile."";
					}else {
						$avatarFrom="".$app_urlRoot."/img/avatar.png";
					}
				}
			}
		}else {
			// from admin
			$pseudoFrom = "Administrator";
			//$avatarFrom = "../images/logo/".$app_logoProject."";
			$avatarFrom = "../img/chat-box-white.png";
		}
		
		$dateNoty = $unResultat_noty->dateNoty;
		$categories = $unResultat_noty->categories;
		if($categories=="welcome") { $welcomePseudo = $pseudoUser;}else { $welcomePseudo = "";}
		$title = $unResultat_noty->title;
		$message = $unResultat_noty->message;
		$linkNoty = $unResultat_noty->linkNoty;
		// format link
		if($linkNoty=="") {
			$linkNoty = "appNoty.php";
		}
		
		// check if saw
		$resultats_notySaw=$connectDBIntelApp->query("select * from site_notySawByUser where idMemberWhoSawNoty='$idUser' and idNoty='$idNoty'");
		$resultats_notySaw->setFetchMode(PDO::FETCH_OBJ);
		if( $unResultat_notySaw = $resultats_notySaw->fetch() ) {
			// saw nothing
		}else {
			// not see yet
			$totalNoty+=1;
			
	?>
<a href="#" id="noty_<?php echo($totalNoty);?>" style="display: none" class="btn btn-inverse btn-sm"
data-toggle="notification" 
data-inverse-mode="true"
data-title="<?php echo($title);?> <?php echo($welcomePseudo);?>" 
data-content="<?php echo($message);?><br><span style='font-size:8px;'><?php echo($pseudoFrom);?> / <span class='notification-time' id='since_<?php echo($totalNoty);?>'></span></span>"

data-img="<?php echo($avatarFrom);?>"
data-icon-class="bg-white"
data-btn-url="<?php echo($app_urlRoot);?>/admin/noty.php"
data-btn="true"
data-btn-text="Details"
data-btn-attr="data-click='trigger-pull'"></a>
<script>
	$(document).ready( function () {
		$('#noty_<?php echo($totalNoty);?>').click();
	
	var time = moment("<?php echo($dateNoty);?>").fromNow(); // 8 years ago
	document.getElementById('since_<?php echo($totalNoty);?>').innerHTML = ""+ time + "";
	//alert(time);//debug
	} );
</script>
	<?php
		}
	}
}
?>