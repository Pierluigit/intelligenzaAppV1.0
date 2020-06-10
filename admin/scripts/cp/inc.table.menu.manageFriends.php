<?php 
// size icon
if(isset($_SESSION['editMember'])) { 
	$size="24";
}else {
	$size = "12";
}?>
<a href="gatheringPeople.php?idM=<?php echo($idMCodeFriend);?>"><img src="../img/voir-white.png" width="<?php echo($size);?>" height="<?php echo($size);?>" title="Show Profile" alt=""/></a>

<a href="?notyM=<?php echo($idMCodeFriend);?>" alt=""><i class="far fa-bell white"></i></a>

<?php if(($phonePersoFriend!="") && ($ifShowPhonePersoFriend=="yes") && ($ifProfileAllPrivateFriend!="yes")) {?>
<a href="tel:<?php echo($phonePersoFriend);?>"><img src="../img/phone-white.png" width="<?php echo($size);?>" height="<?php echo($size);?>" title="Perso: <?php echo($phonePersoFriend);?>" alt=""/></a>
<?php }?>
<?php if(($phoneProFriend!="") && ($ifShowPhoneProFriend=="yes") && ($ifProfileAllPrivateFriend!="yes")) {?>
<a href="tel:<?php echo($phoneProFriend);?>"><img src="../img/phone-white.png" width="<?php echo($size);?>" height="<?php echo($size);?>" title="Pro: <?php echo($phoneProFriend);?>" alt=""/></a>
<?php }?>
<?php if(($websitePersoFriend!="") && ($ifShowWebsitePersoFriend=="yes") && ($ifProfileAllPrivateFriend!="yes")) {?>
<a href="<?php echo($websitePersoFriend);?>" target="_blank"><img src="../img/internet-white.png" width="<?php echo($size);?>" height="<?php echo($size);?>" alt=""/></a>
<?php }?>