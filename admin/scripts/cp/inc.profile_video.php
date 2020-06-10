<table id="video">
<thead>
	<tr>
		<th colspan="2">Manage Video</th>
	</tr>
</thead>
</table>

<br>
<br><br><hr>
<a href="?editVideo=1"><button type="text" class="btn btn-xs bg-theme btn-block">Refresh to manage your upload</button></a><br>

<div class="row dropzone-previews">
	<div class="col-md-12 dz-preview">
		<!-- PAGE CONTENT BEGINS -->
		<div>
		  <form id="dropzoneVideo" action="?" class="dropzone" method="post" enctype="multipart/form-data">
			<!--<input type="hidden" name="idGirl" value="<?php //echo($idGirl);?>">-->
			<input type="hidden" name="recVideoUser" value="<?php //echo($idUser);?>">
			  <!--<input type="file" name="file" />-->
			  <!--<p style="text-align:center;"><i class="fas fa-cloud-upload-alt fa-5x" style="color:#000000"></i><br>Déposer ici tes photos !</p>-->
			</form>
		</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
<br><hr>





<form action="?" method="post">
<!--<input tabindex="1" class="form-control" type="text" name="name" id="name" value="" placeholder="U" maxlength="60" required /><br>-->
<textarea tabindex="2" class="form-control" name="iframe" rows="2" placeholder="Iframe" required></textarea><br>
<button tabindex="3" type="submit" name="rec_newVideo" class="btn btn-xs bg-theme btn-block">New Video</button><br>
</form>
<br>
<div class="m-b-10"><b>Videos (<?php echo($totalVideoUser);?>)</b></div>
<?php 
$resultats=$connectDBIntelApp->query("select * from videos where idMember='$idUser'");
$resultats->setFetchMode(PDO::FETCH_OBJ);
while( $unResultat = $resultats->fetch() ) {
	$iframeV = $unResultat->iframe;
	$idVideo = $unResultat->idVideo;?>
	<?php echo($iframeV);?><br>
	<a href="?suppVideo=<?php echo($idVideo);?>"><button tabindex="3" class="btn btn-danger btn-xs">Supp. Video</button></a><br><br>
<?php }?>

<!--
<div class="row row-space-2">
	
	<div class="col-sm-8">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/3Kf-FlECN7M?showinfo=0"></iframe>
		</div>
	</div>
	
	
	<div class="col-sm-4">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/izsjRpcgfmk?showinfo=0"></iframe>
		</div>
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/j876xgnTVUg?showinfo=0"></iframe>
		</div>
	</div>
	
</div>


<div class="row row-space-2">
	
	<div class="col-sm-4">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wUqH_5memWY?showinfo=0"></iframe>
		</div>
	</div>
	
	
	<div class="col-sm-4">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wXmu-EYAmKU?showinfo=0"></iframe>
		</div>
	</div>
	
	
	<div class="col-sm-4">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/xS1DghfzuMc?showinfo=0"></iframe>
		</div>
	</div>
	
</div>


<div class="row row-space-2">
	
	<div class="col-sm-4">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/v3ZkCLUFrys?showinfo=0"></iframe>
		</div>
	</div>
	
	
	<div class="col-sm-4">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/toPm-L7Ib44?showinfo=0"></iframe>
		</div>
	</div>
	
	
	<div class="col-sm-4">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/qD8OnPC1fLI?showinfo=0"></iframe>
		</div>
	</div>
	
</div>


<div class="row row-space-2">
	
	<div class="col-sm-4">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Guo7gR0XyaU?showinfo=0"></iframe>
		</div>
	</div>
	
	
	<div class="col-sm-4">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ADfIlLfs5Bk?showinfo=0"></iframe>
		</div>
	</div>
	
	
	<div class="col-sm-4">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8Wg1MYjOguI?showinfo=0"></iframe>
		</div>
	</div>
	
</div>


<div class="row row-space-2">
	
	<div class="col-sm-4">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/LbpHB9wbDhY?showinfo=0"></iframe>
		</div>
	</div>
	
	
	<div class="col-sm-4">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/oVWBFkaXMyw?showinfo=0"></iframe>
		</div>
	</div>
	
	
	<div class="col-sm-4">
		<div class="embed-responsive embed-responsive-16by9 m-b-2">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/90PRvlhOLSk?showinfo=0"></iframe>
		</div>
	</div>
	
</div>-->
