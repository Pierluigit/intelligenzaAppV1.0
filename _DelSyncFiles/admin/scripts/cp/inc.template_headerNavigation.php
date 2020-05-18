<div class="navbar-xs-justified">
	<ul class="nav navbar-nav navbar-right">
		<?php if($smartPhone!="yes") {// no time on smartphone?>
		<li class="dateTimeHeader">
			<span id="hours"></span>
			<span class="point">:</span>
			<span id="min"> </span>
			<span class="point">:</span>
			<span id="sec"></span>	
			<!--Date : --><?php //echo($dateNow);?>
		</li>
		<?php }?>
		<li class="dropdown">
			<a href="javascript:;" data-toggle="dropdown" class="navbar-icon">
				<i class="fas fa-language"></i>
			</a>
			<ul class="dropdown-menu dropdown-md no-padding" data-dropdown-close="false">
				<li class="dropdown-header"><?php echo($tr_text_activeLanguage);?></li>
				<?php //here allow languages which are translated ?>
				<?php if($_SESSION['language']!='fr') {?>
				<li>
					<a onClick="chooseLanguage('fr');" href="javascript:return;"><img src="<?php echo($app_urlRoot);?>/images/flags/fr.png" width="24" alt=""/> Français</a>
				</li>
				<?php }?>
				<?php if($_SESSION['language']!='en') {?>
				<li>
					<a onClick="chooseLanguage('en');" href="javascript:return;"><img src="<?php echo($app_urlRoot);?>/images/flags/en.png" width="24" alt=""/> English</a>
				</li>
				<?php }?>
				<!--<?php //if($_SESSION['language']!='de') {?>
				<li>
					<a onClick="chooseLanguage('de');" href="javascript:return;"><img src="<?php //echo($app_urlRoot);?>/images/flags/de.png" width="24" alt=""/> Deutsch</a>
				</li>
				<?php //}?> 
				<?php //if($_SESSION['language']!='it') {?>
				<li>
					<a onClick="chooseLanguage('it');" href="javascript:return;"><img src="<?php //echo($app_urlRoot);?>/images/flags/it.png" width="24" alt=""/> Italiano</a>
				</li>
				<?php //}?>
				<?php //if($_SESSION['language']!='es') {?>
				<li>
					<a onClick="chooseLanguage('es');" href="javascript:return;"><img src="<?php //echo($app_urlRoot);?>/images/flags/es.png" width="24" alt=""/> Española</a>
				</li>
				<?php //}?>-->
				
				
			</ul>
		</li>
		
		
		
		<!-- here search icone <li>
			<a href="javascript:;" data-toggle="search-bar" class="navbar-icon">
				<i class="ti-search"></i>
			</a>
		</li>-->
		<li class="dropdown"><!--  data-toggle="dropdown" -->
			<a href="noty.php" class="dropdown-toggle navbar-icon <?php if($totalNotyUser!=0) {?>with-label<?php }?>">
				<i class="ti-bell"></i><!-- <i class="faa-ring animated"></i> -->
			</a>
			<!--<ul class="dropdown-menu dropdown-lg no-padding">
				<li class="dropdown-header"><a href="appNoty.php">Go to my <?php //echo($totalNoty);?> notification<?php //if($totalNoty!=0) {?>s<?php //}?></a></li>
			</ul>-->
		</li>
		<li class="dropdown">
			<a href="javascript:;" data-toggle="dropdown" class="navbar-icon">
				<i class="ti-settings"></i>
			</a>
			<ul class="dropdown-menu dropdown-md no-padding" data-dropdown-close="false">
				<li class="dropdown-header">Notifications Settings</li>
				<!--<li class="setting">
					<div class="setting-icon bg-grey"><i class="ti-email"></i></div>
					<div class="setting-info">
						<div class="switcher">
							<input type="checkbox" name="ifUseEmail" id="ifUseEmail" onChange="rec_fieldMemberIntel(<?php //echo($idUser);?>, 'ifUseEmail');" <?php //if($ifUseEmailUser=="yes") {?>checked<?php //}?> />
							<label for="ifUseEmail"></label>
						</div>
						Active Email
					</div>
				</li>
				<li class="setting">
					<div class="setting-icon bg-grey"><i class="ti-user"></i></div>
					<div class="setting-info">
						<div class="switcher">
							<input type="checkbox" name="ifMP" id="ifMP" onChange="rec_fieldMemberIntel(<?php //echo($idUser);?>, 'ifMP');" <?php //if($ifMPUser=="yes") {?>checked<?php //}?> /> 
							<label for="ifMP"></label>
						</div>
						Allow MP
					</div>
				</li>-->
				<li class="setting">
					<div class="setting-icon bg-grey"><i class="ti-bell"></i></div>
					<div class="setting-info">
						<div class="switcher">
							<input type="checkbox" name="ifNotyUp" id="ifNotyUp" onChange="rec_fieldMemberIntel(<?php echo($idUser);?>, 'ifNotyUp');" <?php if($ifNotyUpUser=="yes") {?>checked<?php }?> />
							<label for="ifNotyUp"></label>
						</div>
						Notification Up
					</div>
				</li>
				<?php if($app_ifUseAudio=="yes") {// allow only if actived?>
				<li class="dropdown-header">Sounds</li>
				<li class="setting">
					<div class="setting-icon"><!--<i class="ti-music-alt"></i>-->
					<div id="muteA">
						<?php // check statut audio 
						if(isset($_SESSION['statutSound'])) {
							if($_SESSION['statutSound']=='up') {?>
								<a href="javascript:return;" title="Mute" style="cursor:pointer;" onClick="mute();"><i class="fa fa-volume-up fa-2x"></i></a><br>
							<?php }else {?>
								<a href="javascript:return;" title="Activate Audio" style="cursor:pointer;" onClick="activeAudio();"><i class="fa fa-volume-off fa-2x"></i></a>
							<?php }?>
						<?php }else {?>
								<a href="javascript:return;" title="Mute" style="cursor:pointer;" onClick="mute();"><i class="fa fa-volume-up fa-2x"></i></a><br>
						<?php }?>
						
						</div>
					</div>
					<div class="setting-info">
						
						
						<div class="slidecontainer">
						  <input type="range" min="0" max="100" value="<?php echo($app_volume);?>" class="slider" id="myRange">
						</div><!--<span id="demo"></span>-->
					</div>
				</li>
				<?php }// end allow only if actived ?>
				
				<!--<li class="setting">
					<div class="setting-icon bg-grey"><i class="ti-user"></i></div>
					<div class="setting-info">
						<div class="switcher">
							<input type="checkbox" name="ifPublicFriendList" id="ifPublicFriendList" onChange="rec_fieldMemberIntel(<?php //echo($idUser);?>, 'ifPublicFriendList');" <?php //if($ifPublicFriendListUser=="yes") {?>checked<?php //}?> />
							<label for="ifPublicFriendList"></label>
						</div>
						Public friends list 
					</div>
				</li>-->
			</ul>
		</li>
		<li class="dropdown">
			<a href="javascript:;" data-toggle="dropdown">
				<span class="navbar-user-img online pull-left">
					<?php if($avatarUser!="") {// user have owns avatar?>
							<img src="../members/id_<?php echo($idUser);?>/img/<?php echo($avatarUser);?>" alt="" />
					<?php }else {?>
						<?php if($app_avatarProfile!="") {// user doesn't have own avatar?>
							<img src="<?php echo($app_urlRoot);// choice admin?>/images/logo/<?php echo($app_avatarProfile);?>" alt="" />
						<?php }else {?>
							<img src="<?php echo($app_urlRoot);// default?>/img/avatar.png" alt="" />
						<?php }?>
					<?php }?>
				</span>
				<span class="hidden-xs" id="pseudoUser3"><?php echo($pseudoUser);?> <b class="caret"></b></span>
			</a>
			<ul class="dropdown-menu">
				<?php if($rightsUser=="Administrator") {// menu admin?>
				
				<li <?php if($page=="app_profileEdit") {?>class="active"<?php }?>><a href="profileEdit.php">Edit Profile</a></li>
				<li class="divider"></li>
				<li <?php if($page=="app_admin_circles") {?>class="active"<?php }?>><a href="appCircles.php">Circles</a></li>
				<li <?php if($page=="app_admin_members") {?>class="active"<?php }?>><a href="appMembers.php">Members</a></li>
				<li <?php if($page=="app_admin_appSettings") {?>class="active"<?php }?>><a href="appSettings.php">App Settings</a></li>
				<li <?php if($page=="app_admin_languages") {?>class="active"<?php }?>><a href="appLanguages.php">Languages</a></li>
				<li <?php if($page=="app_admin_modular") {?>class="active"<?php }?>><a href="appModular.php">Modular</a></li>
				<li <?php if($page=="app_admin_appNoty") {?>class="active"<?php }?>><a href="appNoty.php">Notifications</a></li>
				<li <?php if($page=="app_admin_backups") {?>class="active"<?php }?>><a href="appBackups.php">Backups</a></li>
				<li class="divider"></li>
				<li <?php if($page=="app_admin_frontEnd") {?>class="active"<?php }?>><a href="appFrontEnd.php">Front End</a></li>
				<li class="divider"></li>
				<li><a href="?logout">Log Out</a></li>
				<?php }?>
				<?php if($rightsUser=="Member") {// menu member?>
				<li <?php if($page=="app_profileEdit") {?>class="active"<?php }?>><a href="profileEdit.php">Edit Profile</a></li>
				<li class="divider"></li>
				<li <?php if($page=="app_admin_modular") {?>class="active"<?php }?>><a href="appModular.php">Modular</a></li>
				<li class="divider"></li>
				<li><a href="?logout">Log Out</a></li>
				<?php }?>
			</ul>
		</li>
	</ul>
</div>