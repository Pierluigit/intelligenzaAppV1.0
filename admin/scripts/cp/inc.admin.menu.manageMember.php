<?php 
// size icon
if(isset($_SESSION['editMember'])) { 
	$size="24";
}else {
	$size = "12";
}?>
<a href="gatheringPeople.php?idM=<?php echo($idMCodeMember);?>"><img src="../img/voir-white.png" width="<?php echo($size);?>" height="<?php echo($size);?>" title="Show Profile" alt=""/></a>
<?php if(!isset($_SESSION['editMember'])) {?>
<a href="?editMember=<?php echo($idMember);?>"><img src="../img/edit-white.png" width="<?php echo($size);?>" height="<?php echo($size);?>" title="Edit" alt=""/></a>
<?php }?>
<a href="creapdf/pdf/privacyMember.php?idMember=<?php echo($idMember);?>"><img src="../img/pdf-white.png" width="<?php echo($size);?>" height="<?php echo($size);?>" title="Privacy Report" alt=""/></a>

<a href="mailto:<?php echo($emailMember);?>"><img src="../img/email-white.png" width="<?php echo($size);?>" height="<?php echo($size);?>" title="<?php echo($emailMember);?>" alt=""/></a>

<?php if(($phonePersoMember!="") && ($ifShowPhonePersoMember=="yes")) {?>
<a href="tel:<?php echo($phonePersoMember);?>"><img src="../img/phone-white.png" width="<?php echo($size);?>" height="<?php echo($size);?>" title="Perso: <?php echo($phonePersoMember);?>" alt=""/></a>
<?php }?>
<?php if(($phoneProMember!="") && ($ifShowPhoneProMember=="yes")) {?>
<a href="tel:<?php echo($phoneProMember);?>"><img src="../img/phone-white.png" width="<?php echo($size);?>" height="<?php echo($size);?>" title="Pro: <?php echo($phoneProMember);?>" alt=""/></a>
<?php }?>
<?php if($websitePersoMember!="") {?>
<a href="<?php echo($websitePersoMember);?>" target="_blank"><img src="../img/internet-white.png" width="<?php echo($size);?>" height="<?php echo($size);?>" alt=""/></a>
<?php }?>
<?php if($ifEmailConfirmedMember=="yes") {?>
<i class="far fa-check-circle green" title="email confirmed"></i>
<?php }else {?>
<i class="far fa-clock orange" title="waiting email confirmation"></i>
<?php }?>