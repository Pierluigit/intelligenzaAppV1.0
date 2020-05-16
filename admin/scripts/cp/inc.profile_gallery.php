<table>
<thead>
	<tr>
		<th colspan="2">Gestion des Galeries</th>
	</tr>
</thead>
</table>
<br>
<!--<h4 id="photos">Gestion des Galeries</h4>-->
<form action="?" method="post">
<input tabindex="1" class="form-control" type="text" name="nameNewGallery" id="nameNewGallery" value="" placeholder="Name" maxlength="60" required />
	<br>
<textarea tabindex="2" class="form-control" name="description" rows="2" placeholder="Descrption"></textarea>
<button tabindex="3" type="submit" name="rec_newGallery" class="btn btn-primary btn-sm btn-block">New Gallery</button><br>
</form>
<br>
<!-- ici listing les galleries photos -->
Liste de mes Galeries<br>
<?php
$resultatsEditGallery=$connectDBIntelApp->query("select * from galleries where idMember='$idUser'");
$resultatsEditGallery->setFetchMode(PDO::FETCH_OBJ);
while( $unResultat = $resultatsEditGallery->fetch() ) {
	$idGallery = $unResultat->idGallery;
	$name = $unResultat->name;
	if($_SESSION['editGallery']!=$idGallery) {?>
	<a href="?editGallery=<?php echo($idGallery);?>"><button type="button" class="btn btn-default btn-xs"><?php echo($name);?></button></a> 
<?php }
}?>
<br><br>
<?php
if(isset($_SESSION['editGallery'])) {
	$editGallery = $_SESSION['editGallery'];
	$resultats=$connectDBIntelApp->query("select * from galleries where idGallery='$editGallery'");
	$resultats->setFetchMode(PDO::FETCH_OBJ);
	if( $unResultat = $resultats->fetch() ) {
		$dateCreation = $unResultat->dateCreation;
		$tags = $unResultat->tags;
		$name = $unResultat->name;
		$ifPublic = $unResultat->ifPublicGallery;
		$description = $unResultat->description;
	}?><hr>
	<div class="row">
		<div class="col-md-4">
			<input tabindex="4" class="form-control" type="text" name="name" id="name" value="<?php echo($name);?>" onKeyUp="rec_fieldGallery(<?php echo($idUser);?>, 'name', <?php echo($editGallery);?>);" onChange="rec_fieldGallery(<?php echo($idUser);?>, 'name', <?php echo($editGallery);?>);" onKeyBlur="rec_fieldGallery(<?php echo($idUser);?>, 'name', <?php echo($editGallery);?>);" placeholder="Name" maxlength="64" />
			<span id="confirm_name"></span><br>
			<input tabindex="5" class="form-control" type="text" name="tags" id="tags" onKeyUp="rec_fieldGallery(<?php echo($idUser);?>, 'tags', <?php echo($editGallery);?>);" onChange="rec_fieldGallery(<?php echo($idUser);?>, 'tags', <?php echo($editGallery);?>);" onKeyBlur="rec_fieldGallery(<?php echo($idUser);?>, 'tags', <?php echo($editGallery);?>);" value="<?php echo($tags);?>" placeholder="Tags" maxlength="255" /><span id="confirm_tags"></span>
		</div>
		<div class="col-md-5">
			<textarea tabindex="6" class="form-control" name="description" id="description" rows="2" onKeyUp="rec_fieldGallery(<?php echo($idUser);?>, 'description', <?php echo($editGallery);?>);" onChange="rec_fieldGallery(<?php echo($idUser);?>, 'description', <?php echo($editGallery);?>);" onKeyBlur="rec_fieldGallery(<?php echo($idUser);?>, 'description', <?php echo($editGallery);?>);" placeholder="Descrption" maxlength="400"><?php echo($description);?></textarea><span id="confirm_description"></span>
			
		</div>
		<div class="col-md-3" style="text-align: right">
			<a href="?suppGallery=<?php echo($editGallery);?>" onClick="return(confirm('Êtes-vous sûr de vouloir supprimer la galerie <?php echo($name);?> ?'));"><button class="btn btn-xs btn-danger">Supp. Gallery <?php echo($name);?></button></a><br><br>
			<div class="switcher switcher-danger">
			<input type="checkbox" name="ifPublicGallery" id="ifPublicGallery" onChange="rec_fieldGallery(<?php echo($idUser);?>, 'ifPublicGallery', <?php echo($editGallery);?>);" <?php if($ifPublic!="yes") {?>checked<?php }?> />
			<label for="ifPublicGallery">Public</label>
			</div>
		</div>
	</div>
	<hr>

	<?php
	// gestion des images affiche 
	$dirnameGallery = "../members/id_".$idUser."/photo/gallery_".$editGallery;
	$dirGallery = opendir($dirnameGallery);

	while($file = readdir($dirGallery)) {
	if($file != '.' && $file != '..' && !is_dir($dirname.$file))
		if($file != '.') {
	{?>
	
	<div style="display:inline-block">
	<a class="group" href="../members/id_<?php echo($idUser);?>/photo/gallery_<?php echo($editGallery);?>/<?php echo($file);?>" title="Voir en grand"><img src="../members/id_<?php echo($idUser);?>/photo/gallery_<?php echo($editGallery);?>/<?php echo($file);?>" width="180" height="180" alt=""/></a><br>
	<?php 
	}?>
	<a href="?suppPhotoGallery=<?php echo($file);?>&idGallery=<?php echo($editGallery);?>" onClick="return(confirm('Êtes-vous sûr de vouloir supprimer l\'image <?php echo($file);?> ?'));"><button class="btn btn-xs btn-danger">Supp.</button></a>
	</div>
	<?php
	}}
	closedir($dirGallery);
	?>
	<br><br><hr>
	<a href="?editPhoto=1"><button type="text" class="btn btn-primary btn-block">Refresh to manage your upload</button></a><br>

	<div class="row dropzone-previews">
		<div class="col-md-12 dz-preview">
			<!-- PAGE CONTENT BEGINS -->
			<div id="dropzoneGallery"><!--scripts/uploadPhotoGirl.php-->
			  <form  action="?" class="dropzone" method="post" enctype="multipart/form-data">
				<!--<input type="hidden" name="idGirl" value="<?php //echo($idGirl);?>">-->
				<input type="hidden" name="recPhotoGallery" value="<?php echo($editGallery);?>">
				  <!--<input type="file" name="file" />-->
				  <!--<p style="text-align:center;"><i class="fas fa-cloud-upload-alt fa-5x" style="color:#000000"></i><br>Déposer ici tes photos !</p>-->
				</form>
			</div><!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
	
<?php
}
?>
<br><hr>