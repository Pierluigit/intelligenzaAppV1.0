<a href="gatheringPeople.php"><button type="submit" name="btn_signup" class="btn btn-xs bg-theme btn-block">Looking for new Friends</button></a><br><br>
<div class="m-b-10"><b>Request Friend List (<?php echo($totalRequestsFriendsUser);?>)</b></div>
<!-- BEGIN friend-list -->
<ul class="friend-list clearfix"> 
	<?php
	$dbRequest_friends=$connectDBIntelApp->query("select * from members_friends where idMemberFriend='$idUser'");
	$dbRequest_friends->setFetchMode(PDO::FETCH_OBJ);
	while( $getResult_friends = $dbRequest_friends->fetch() ) {
		$idFriend = $getResult_friends->idMember;
		// check if me too
		$dbRequest_friendToo=$connectDBIntelApp->query("select * from members_friends where idMember='$idUser' and idMemberFriend='$idFriend'");
		$dbRequest_friendToo->setFetchMode(PDO::FETCH_OBJ);
		if( $getResult_friendToo = $dbRequest_friendToo->fetch() ) {
			
		}else {
			// get infos member
			$dbRequest=$connectDBIntelApp->query("select * from members where idMember='$idFriend'");
			$dbRequest->setFetchMode(PDO::FETCH_OBJ);
			if( $getResult = $dbRequest->fetch() ) {
				$pseudoFriend = $getResult->pseudo;
				$idMCodeFriend = $getResult->idMCode;
			}
			
			// get infos member
			$dbRequest=$connectDBIntelApp->query("select * from members_intel where idMember='$idFriend'");
			$dbRequest->setFetchMode(PDO::FETCH_OBJ);
			if( $getResult = $dbRequest->fetch() ) {
				$avatarMemberFriend = $getResult->avatar;
			}
	?>
	<li>
		<div style="display: block;color: #000;padding: 0.625rem;margin: 1px;background: #fff;">
		<div class="friend-img">
			<?php if($avatarMemberFriend!="") {?>
			<img src="../members/id_<?php echo($idFriend);?>/img/<?php echo($avatarMemberFriend);?>" alt="" />
			<?php }else {?>
				<?php if($app_avatarProfile!="") {// user doesn't have own avatar?>
					<img src="<?php echo($app_urlRoot);// choice admin?>/images/logo/<?php echo($app_avatarProfile);?>" alt="" />
				<?php }else {?>
					<img src="<?php echo($app_urlRoot);// default?>/img/avatar.png" alt="" />
				<?php }?>
			<?php }?>
		</div>
		<div class="friend-info">
			<h4><a href="profiles.php?id=<?php echo($idMCodeFriend);?>"><?php echo($pseudoFriend);?></a></h4>
			<p>
				<a href="?acceptRF=<?php echo($idMCodeFriend);?>"><span class="label label-success">Accept</span></a> 
				<a href="?refuseRF=<?php echo($idMCodeFriend);?>"><span class="label label-warning">Refuse</span></a>
				<a onClick="return confirm('Are you sure you want blocked <?php echo($pseudoFriend);?> ?');" href="?blockM=<?php echo($idMCodeFriend);?>"><span class="label label-danger">Block</span></a> 
			</p>
		</div>
		</div>
	</li>
		<?php }
	}
	?>
</ul>
<!-- END friend-list -->
<hr>
<?php 
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
// while friends
/////////////////////////////////////////////////////////////
?>
<div class="m-b-10"><b>Friends List (<?php echo($totalFriendsUser);?>)</b></div>
<table id="table_friends" class="display compact inverse" style="width:100%">
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
	$dbRequest_friends=$connectDBIntelApp->query("select * from members_friends where idMemberFriend='$idUser'");
	$dbRequest_friends->setFetchMode(PDO::FETCH_OBJ);
	$i=0;
	while( $getResult_friends = $dbRequest_friends->fetch() ) {
		$idFriend = $getResult_friends->idMember;
		// check if me too
		$dbRequest_friendToo=$connectDBIntelApp->query("select * from members_friends where idMember='$idUser' and idMemberFriend='$idFriend'");
		$dbRequest_friendToo->setFetchMode(PDO::FETCH_OBJ);
		if( $getResult_friendToo = $dbRequest_friendToo->fetch() ) {
			$i+=1;
			// get infos member
			$dbRequest=$connectDBIntelApp->query("select * from members where idMember='$idFriend'");
			$dbRequest->setFetchMode(PDO::FETCH_OBJ);
			if( $getResult = $dbRequest->fetch() ) {
				$pseudoFriend = $getResult->pseudo;
				$emailFriend = $getResult->email;
				$idMCodeFriend = $getResult->idMCode;
				$phonePersoFriend = $getResult->phonePerso;
				$phoneProFriend = $getResult->phonePro;
				$websitePersoFriend = $getResult->websitePerso;
			}
			
			// get infos intel member
			$dbRequest=$connectDBIntelApp->query("select * from members_intel where idMember='$idFriend'");
			$dbRequest->setFetchMode(PDO::FETCH_OBJ);
			if( $getResult = $dbRequest->fetch() ) {
				$avatarMemberFriend = $getResult->avatar;
				$ifShowPhonePersoFriend = $getResult->ifShowPhonePerso;
				$ifShowPhoneProFriend = $getResult->ifShowPhonePro;
				$ifShowWebsitePersoFriend = $getResult->ifShowWebsitePerso;
				$ifProfileAllPrivateFriend = $getResult->ifProfileAllPrivate;
			}
			// get infos tags member
			$dbRequest=$connectDBIntelApp->query("select * from members_tags where idMember='$idUser' and idMemberTagged='$idFriend'");
			$dbRequest->setFetchMode(PDO::FETCH_OBJ);
			if( $getResult = $dbRequest->fetch() ) {
				$tagsMemberFriend = $getResult->tags;
			}
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
			<?php if(($phonePersoFriend!="") && ($ifShowPhonePersoFriend=="yes") && ($ifProfileAllPrivateFriend!="yes")) {?>
			<a href="tel:<?php echo($phonePersoFriend);?>"><img src="../img/phone-white.png" width="20" height="20" title="Perso: <?php echo($phonePersoFriend);?>" alt=""/></a>
			<?php }?>
			<?php if(($websitePersoFriend!="") && ($ifShowWebsitePersoFriend=="yes") && ($ifProfileAllPrivateFriend!="yes")) {?>
			<a href="<?php echo($websitePersoFriend);?>" target="_blank"><img src="../img/internet-white.png" width="20" height="20" alt=""/></a>
			<?php }?>
			<a href="?notyM=<?php echo($idMCodeFriend);?>" title="Notification"><i class="far fa-bell white fa-2x"></i></a>
			<span class="white">/</span>
			<a onClick="return confirm('Are you sure you want drop <?php echo($pseudoFriend);?>?');" href="?dropFriend=<?php echo($idMCodeFriend);?>" title="Drop"><i class="fas fa-handshake-slash warning"></i></a>
			<a onClick="return confirm('Are you sure you want blocked <?php echo($pseudoFriend);?> ?');" href="?blockM=<?php echo($idMCodeFriend);?>" title="Block"><i class="fas fa-user-slash fa-1x red"></i></a>

		</td>
	</tr>
	<?php }
	}?>
	</tbody>
</table>
<?php //}// fin while friends?>
<!--<hr>
<div class="checkbox checkbox-purple">
	<input type="checkbox" name="id_<?php //echo($idFriend);?>" value="<?php //echo($idFriend);?>" id="normal-checkbox-<?php //echo($idFriend);?>" checked />
	<label for="normal-checkbox-<?php //echo($idFriend);?>">
		Select all
	</label>
</div>
With selected:-->
<hr>
<?php 
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
// while groups
/////////////////////////////////////////////////////////////
?>
<div class="m-b-10"><b>Groups (<?php echo($totalGroupsUser);?>)</b></div>
<a href="#"><button type="submit" name="btn_signup" class="btn btn-xs bg-theme btn-block">New Group</button></a><br><br>
<table id="table_group" class="display compact inverse" style="width:100%">
<thead>
	<tr>
		<th>Actions</th>
		<th></th>
		<th>Name</th>
		<th>Type</th>
		<th>Tags</th>
		<th></th>

		<th>Drop</th>
	</tr>
</thead>
<tbody>
	<?php // while requests friends
	$dbRequest_groups=$connectDBIntelApp->query("select * from members_groups where idMember='$idUser'");
	$dbRequest_groups->setFetchMode(PDO::FETCH_OBJ);
	while( $getResult_groups = $dbRequest_groups->fetch() ) {
		$idGroupUser = $getResult_groups->idGroup;
		$ifActiveGroupUser = $getResult_groups->active;
		$nameGroupUser = $getResult_groups->name;
		$descriptionGroupUser = $getResult_groups->description;
	?>
	<tr>
		<td style="background-color: black">
			<!--<div class="checkbox checkbox-purple">
				<input type="checkbox" name="id_<?php //echo($idFriend);?>" value="<?php //echo($idFriend);?>" id="normal-checkbox-<?php //echo($idFriend);?>" checked />
				<label for="normal-checkbox-<?php //echo($idFriend);?>">

				</label>
			</div>-->
			<?php //require("scripts/cp/inc.admin.menu.manageMember.php");// same menu on different place?>
		</td>
		<td>
		<?php if($avatarMemberFriend!="") {?>
			<img src="../members/id_<?php echo($idFriend);?>/img/<?php echo($avatarMemberFriend);?>" width="33" height="33" alt="" />
		<?php }else {?>
			<img src="../img/avatar.png" width="33" height="33" alt="" />
		<?php }?>
		</td>
		<td><?php echo($pseudoFriend);?></td>
		<td><?php echo($jobMember);?></td>
		<td><?php echo($skillsMember);?></td>
		<td><?php echo($ageMember);?></td>


		<td style="text-align: right; background-color: black;">
			<a onClick="return confirm('Are you sure you want drop <?php echo($pseudoFriend);?>?');" href="?dropFriend=<?php echo($idMCodeFriend);?>"><span class="label label-warning">Drop</span></a>
			<a onClick="return confirm('Are you sure you want blocked <?php echo($pseudoFriend);?>?');" href="?blockM=<?php echo($idMCodeFriend);?>"><span class="label label-danger">Block</span></a>
			

		</td>
	</tr>
	<?php 
	}?>
	</tbody>
</table>
<?php //}// fin while friends?>

<hr>
<?php 
/////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////
// while people blocked
/////////////////////////////////////////////////////////////
?>
<div class="m-b-10"><b>People Blacklisted (<?php echo($totalPeopleBlacklistedUser);?>)</b></div>
<table id="table_blacklisted" class="display compact inverse" style="width:100%">
<thead>
	<tr>
		<th></th>
		<th>Name</th>
		<th>Unblocked</th>
	</tr>
</thead>
<tbody>
	<?php // while people blacklisted
	$dbRequest_blacklisted=$connectDBIntelApp->query("select * from members_blocked where idMember='$idUser'");
	$dbRequest_blacklisted->setFetchMode(PDO::FETCH_OBJ);
	while( $getResult_blacklisted = $dbRequest_blacklisted->fetch() ) {
		$idMemberBlocked = $getResult_blacklisted->idMemberBlocked;
		// get pseudo member
		//$pseudoMemberBlocked = getSingleValue("members", "idMember", $idMemberBlocked, "pseudo"); // table, where field, value, columnName
		
		$dbRequest=$connectDBIntelApp->query("select * from members where idMember='$idMemberBlocked'");
		$dbRequest->setFetchMode(PDO::FETCH_OBJ);
		if( $getResult = $dbRequest->fetch() ) {	
			$pseudoMemberBlocked = $getResult->pseudo;
			$idMCodeBlocked = $getResult->idMCode;
		}
		$dbRequest=$connectDBIntelApp->query("select * from members_intel where idMember='$idMemberBlocked'");
		$dbRequest->setFetchMode(PDO::FETCH_OBJ);
		if( $getResult = $dbRequest->fetch() ) {	
			$avatarMember = $getResult->avatar;
		}
	?>
	<tr>
		<td>
		<?php if($avatarMember!="") {?>
			<img src="../members/id_<?php echo($idMemberBlocked);?>/img/<?php echo($avatarMember);?>" width="33" height="33" alt="" />
		<?php }else {?>
			<img src="../img/avatar.png" width="33" height="33" alt="" />
		<?php }?>
		</td>
		<td><?php echo($pseudoMemberBlocked);?></td>
		<td style="text-align: right; background-color: black;">
			<a onClick="return confirm('Are you sure you want unblocked <?php echo($pseudoMemberBlocked);?> ?');" href="?unblockM=<?php echo($idMCodeBlocked);?>"><span class="label label-success">Unblocked</span></a>
		</td>
	</tr>
	<?php 
	}?>
	</tbody>
</table>
<?php //}// fin while friends?>