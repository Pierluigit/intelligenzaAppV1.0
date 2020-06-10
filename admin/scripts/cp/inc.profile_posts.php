<!--<table id="video">
<thead>
	<tr>
		<th colspan="2">New Post</th>
	</tr>
</thead>
</table>-->

<br>
<?php if(!isset($_GET['addPost'])) {?>
<a href="?addPost=1"><button tabindex="3" type="submit" name="rec_newVideo" class="btn btn-xs bg-theme btn-block">New Post</button></a><br>

<?php }else {?>


<form action="?" method="post">
<!--<input tabindex="1" class="form-control" type="text" name="name" id="name" value="" placeholder="U" maxlength="60" required /><br>-->
<textarea tabindex="2" class="form-control" name="iframe" rows="2" placeholder="Iframe" required></textarea><br>
<button tabindex="3" type="submit" name="rec_newPost" class="btn btn-xs bg-theme btn-block">Posts</button><br>
</form>
<br>
<br><br><hr>
<!--<a href="?editVideo=1"><button type="text" class="btn btn-xs bg-theme btn-block">Refresh to manage your upload</button></a><br>

<div class="row dropzone-previews">
	<div class="col-md-12 dz-preview">
		<!-- PAGE CONTENT BEGINS -_->
		<div>
		  <form id="dropzonePost" action="?" class="dropzone" method="post" enctype="multipart/form-data">
			<!--<input type="hidden" name="idGirl" value="<?php //echo($idGirl);?>">-_->
			<input type="hidden" name="recPostUser" value="<?php //echo($idUser);?>">
			  <!--<input type="file" name="file" />-->
			  <!--<p style="text-align:center;"><i class="fas fa-cloud-upload-alt fa-5x" style="color:#000000"></i><br>Déposer ici tes photos !</p>-_->
			</form>
		</div><!-- PAGE CONTENT ENDS -_->
	</div><!-- /.col -_->
</div><!-- /.row -_->
<br><hr>-->
<?php }?>

<?php 
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
// while friends
/////////////////////////////////////////////////////////////
?>
<div class="m-b-10"><b>POST (<?php echo($totalPostsUser);?>)</b></div>
<table id="table_posts" class="display compact inverse" style="width:100%">
<thead>
	<tr>
		<th>Actions</th>
		<th></th>
		<th>Name</th>
		<th>Tags</th>
		<th>(only to search no visible)Tags</th>
		<th>Actions</th>
	</tr>
</thead>
<tbody>
	<?php // while requests friends
	$dbRequest_friends=$connectDBIntelApp->query("select * from posts where idMember='$idUser'");
	$dbRequest_friends->setFetchMode(PDO::FETCH_OBJ);
	$i=0;
	while( $getResult_friends = $dbRequest_friends->fetch() ) {
		$idFriend = $getResult_friends->idMember;
		
	?>
	<tr>
		<td style="background-color: black">
			<!--<div class="checkbox checkbox-purple">
				<input type="checkbox" name="id_<?php //echo($idFriend);?>" value="<?php //echo($idFriend);?>" id="normal-checkbox-<?php //echo($idFriend);?>" checked />
				<label for="normal-checkbox-<?php //echo($idFriend);?>">

				</label>
			</div>-->
			<?php //require("scripts/cp/inc.table.menu.manageFriends.php");// same menu on different place?>
		</td>
		<td>
			<a href="gatheringPeople.php?idM=<?php echo($idMCodeFriend);?>">
		<?php if($avatarMemberFriend!="") {?>
			<img src="../members/id_<?php echo($idFriend);?>/img/<?php echo($avatarMemberFriend);?>" width="33" height="33" alt="" />
		<?php }else {?>
			<img src="../img/avatar.png" width="33" height="33" alt="" />
		<?php }?>
			</a>
		</td>
		<td><?php echo($pseudoFriend);?></td>
		<td>
			<input type="text" class="form-control" name="tags_<?php echo($i);?>" id="tags_<?php echo($i);?>" onKeyUp="rec_fieldTagsFriends(<?php echo($idUser);?>, <?php echo($idFriend);?>, <?php echo($i);?>);" onChange="rec_fieldTagsFriends(<?php echo($idUser);?>, <?php echo($idFriend);?>, <?php echo($i);?>);" onKeyBlur="rec_fieldTagsFriends(<?php echo($idUser);?>, <?php echo($idFriend);?>', <?php echo($i);?>);" type="text" value="<?php echo($tagsMemberFriend);?>" placeholder="Tags" maxlength="255" />
		</td>
		
		<td><?php echo($tagsMemberFriend);?></td>

		<td style="text-align: right; background-color: black;">
			

		</td>
	</tr>
	<?php 
	}?>
	</tbody>
</table>
<?php //}// fin while friends?>

<!--<div class="post">
	<div class="post-header">
		<div class="post-header-img">
			<img src="assets/img/user.jpg" alt="" />
		</div>
		<div class="post-header-info">
			<h4><a href="#">Clyde Stanley</a> at <a href="#">South Lake Tahoe, California</a></h4>
			<span class="time">March 16</span>
		</div>
	</div>
	<div class="post-content">
		<p class="post-desc">Best vacation of 2017</p>
		<ul class="img-list">
			<li class="main"><a href="#"><img src="assets/img/gallery/gallery-1.jpg" alt="" /></a></li>
			<li><a href="#"><img src="assets/img/gallery/gallery-2.jpg" alt="" /></a></li>
			<li><a href="#"><img src="assets/img/gallery/gallery-3.jpg" alt="" /></a></li>
			<li><a href="#"><img src="assets/img/gallery/gallery-4.jpg" alt="" /></a></li>
			<li class="with-number">
				<a href="#">
					<img src="assets/img/gallery/gallery-5.jpg" alt="" />
					<div class="number">+12</div>
				</a>
			</li>
		</ul>
	</div>
</div>
<div class="post">
	<div class="post-header">
		<div class="post-header-img">
			<img src="assets/img/user.jpg" alt="" />
		</div>
		<div class="post-header-info">
			<h4><a href="#">Clyde Stanley</a> is watching <a href="#">PATAGONIA 8k</a></h4>
			<span class="time">March 12</span>
		</div>
	</div>
	<div class="post-content">
		<p class="post-desc">Nice PATAGONIA footage in 8K</p>
		<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ChOhcHD8fBA?showinfo=0"></iframe>
		</div>
	</div>
</div>
<div class="post">
	<div class="post-header">
		<div class="post-header-img">
			<img src="assets/img/user.jpg" alt="" />
		</div>
		<div class="post-header-info">
			<h4><a href="#">Clyde Stanley</a></h4>
			<span class="time">March 4</span>
		</div>
	</div>
	<div class="post-content">
		<p class="post-desc">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br />Quisque sodales urna justo, ac ultrices magna consectetur id.<br /><br />
			Donec tempor ligula sit amet nunc porta, sed aliquam leo sagittis.<br />
			Ut auctor congue efficitur. Praesent aliquam pulvinar neque, placerat semper massa elementum et.
		</p>
	</div>
</div>
<div class="post">
	<div class="post-header">
		<div class="post-header-img">
			<img src="assets/img/user.jpg" alt="" />
		</div>
		<div class="post-header-info">
			<h4><a href="#">Clyde Stanley</a> at <a href="#">United States</a></h4>
			<span class="time">May 5</span>
		</div>
	</div>
	<div class="post-content">
		<p class="post-desc">Business Trip</p>
		<ul class="img-list">
			<li class="main"><a href="#"><img src="assets/img/gallery/gallery-5.jpg" alt="" /></a></li>
			<li class="main"><a href="#"><img src="assets/img/gallery/gallery-6.jpg" alt="" /></a></li>
			<li><a href="#"><img src="assets/img/gallery/gallery-7.jpg" alt="" /></a></li>
			<li><a href="#"><img src="assets/img/gallery/gallery-8.jpg" alt="" /></a></li>
			<li><a href="#"><img src="assets/img/gallery/gallery-9.jpg" alt="" /></a></li>
			<li><a href="#"><img src="assets/img/gallery/gallery-10.jpg" alt="" /></a></li>
		</ul>
	</div>
</div>-->