<table id="photos">
<thead>
	<tr>
		<th colspan="2">Gestion de l'avatar et du background</th>
	</tr>
</thead>
</table>
Taille suggerée BG 1920x699 pixel and Avatar 444x444 pixel<br><br>
<?php if($avatarUser!="") {?>
<a href="?suppAvatar=1"><button class="btn btn-xs btn-danger"><i class="tim-icons icon-trash-simple"></i> Supp. Avatar</button></a>
<?php }?>
<?php if($bgProfileUser!="") {?>
<a href="?suppBg=1"><button class="btn btn-xs btn-danger"><i class="tim-icons icon-trash-simple"></i> Supp. BG</button></a>
<?php }?>
<br><br>
<!-- ici listing des photos enregistrer -->
<?php
// gestion des images affiche 
$dirname = '../members/id_'.$idUser.'/img';
$dir = opendir($dirname);

while($file = readdir($dir)) {
if($file != '.' && $file != '..' && !is_dir($dirname.$file))
{?>
<div style="display:inline-block">
	<a class="group" href="../members/id_<?php echo($idUser);?>/img/<?php echo($file);?>" title="Voir en grand"><img src="../members/id_<?php echo($idUser);?>/img/<?php echo($file);?>" width="180" alt=""/></a><br>
	<?php
	$siV=false;
	$siBg=false;
 	$resultats=$connectDBIntelApp->query("select * from members_intel where bgProfile='$file' and idMember='$idUser'");
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	if( $unResultat = $resultats->fetch() ) {
		$siBg=true;
	}
	if($siBg==false) {
		$resultats=$connectDBIntelApp->query("select * from members_intel where avatar='$file' and idMember='$idUser'");
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		if( !$unResultat = $resultats->fetch() ) {
	
		
		?> 
    <a href="?defAvatar=<?php echo($file);?>&idMember=<?php echo($idUser);?>" title="Définir comme avatar"><button class="btn btn-xs btn-primary">Avatar</button></a>
    <?php }else { $siV=true;?>
    	<button class="btn btn-xs btn-success">Avatar actuel</button>
    <?php }
	}?>
    <!--defini bg-->
    <?php
	if($siV==false) {
		$resultats=$connectDBIntelApp->query("select * from members_intel where bgProfile='$file' and idMember='$idUser'");
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		if( !$unResultat = $resultats->fetch() ) {
		?> 
    <a href="?defBg=<?php echo($file);?>&idMember=<?php echo($idUser);?>" title="Définir comme fond d'écran"><button class="btn btn-xs btn-primary">BG </button></a>
    <?php }else {?>
    	<button class="btn btn-xs btn-success">BG actuel</button>
    <?php }
	}?>
	<a href="?suppPhoto=<?php echo($file);?>" onClick="return(confirm('Êtes-vous sûr de vouloir supprimer l\'image <?php echo($file);?> ?'));"><button class="btn btn-xs btn-danger">Supp.</button></a>
	</div>
	<?php }?>
<?php }
closedir($dir);
?>
<br><br><hr>
<a href="?editPhoto=1"><button type="text" class="btn btn-xs bg-theme btn-block">Refresh to manage your upload</button></a><br>

<div class="row dropzone-previews">
	<div class="col-md-12 dz-preview">
		<!-- PAGE CONTENT BEGINS -->
		<div id="dropzoneAvatarBg"><!--scripts/uploadPhotoGirl.php-->
		  <form  action="?" class="dropzone" method="post" enctype="multipart/form-data">
			<!--<input type="hidden" name="idGirl" value="<?php //echo($idGirl);?>">-->
			<input type="hidden" name="recPhotoUser" value="<?php echo($idUser);?>">
			  <!--<input type="file" name="file" />-->
			  <!--<p style="text-align:center;"><i class="fas fa-cloud-upload-alt fa-5x" style="color:#000000"></i><br>Déposer ici tes photos !</p>-->
			</form>
		</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
<br><hr>