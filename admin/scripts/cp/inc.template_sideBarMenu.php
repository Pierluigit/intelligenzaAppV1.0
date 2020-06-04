<div id="sidebar" class="sidebar sidebar-inverse">
	<!-- BEGIN scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- BEGIN nav -->
		<ul class="nav">
			<li class="nav-profile">
				<div class="image">
					<?php if($avatarUser!="") {// user have owns avatar?>
							<img src="../members/id_<?php echo($idUser);?>/img/<?php echo($avatarUser);?>" alt="" />
					<?php }else {?>
						<?php if($app_avatarProfile!="") {// user doesn't have own avatar?>
							<img src="<?php echo($app_urlRoot);// choice admin?>/images/logo/<?php echo($app_avatarProfile);?>" alt="" />
						<?php }else {?>
							<img src="<?php echo($app_urlRoot);// default?>/img/avatar.png" alt="" />
						<?php }?>
					<?php }?>
				</div>
				<div class="info">
					<h4 id="pseudoUser2"><?php echo($pseudoUser);?></h4>
					<p><?php echo($rightsUser);?> <?php echo($subRightsUser);?><br>
						<span id="jobUser2"><?php echo($jobUser);?></span>
					</p>
				</div>
			</li>
			<li class="nav-divider"></li>
			<li class="nav-header">Navigation</li>
			<?php if($rightsUser!="Member") {?>
				<li <?php if($page=="app_admin_home") {?>class="active"<?php }?>><a href="index.php"><i class="ti-home"></i>
			<?php }else {?>
				<li <?php if($page=="app_dashboard") {?>class="active"<?php }?>><a href="dashboard.php"><i class="ti-home"></i>
			<?php }?>
			<span>Home</span></a></li>
			<?php if($rightsUser=="Administrator") {?>
			<li <?php if($page=="app_admin_analytics") {?>class="active"<?php }?>><a href="analytics.php"><i class="ti-pie-chart"></i><span>Analytics</span></a></li>
			<?php }?>
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret caret-right pull-right"></b>
					<i class="ti-comments-smiley"></i> 
					<span>Communication</span>
				</a>
				<ul class="sub-menu">
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret caret-right pull-right"></b>
							Wire
						</a>
						<ul class="sub-menu">
							<li><a href="https://app.wire.com/auth/" target="_blank">Browser App</a></li>
							<li class="has-sub">
								<a href="javascript:;">
									<b class="caret caret-right pull-right"></b>
									Infos
								</a>
								<ul class="sub-menu">
									<li><a href="https://wire.com" target="_blank">Website</a></li>
									<li><a href="https://wire.com/en/download/" target="_blank">Download</a></li>
								</ul>
							</li>
							
							
						</ul>
					</li>
					<!--<li><a href="javascript:;">Menu 1.2</a></li>
					<li><a href="javascript:;">Menu 1.3</a></li>--> 
				</ul>
			</li>
			
			<?php if($app_ifSharingFolder=="yes") {?>
			<li <?php if($page=="app_share") {?>class="active"<?php }?>><a href="share.php"><i class="ti-cloud"></i><span>Files Sharing</span></a></li>
			<?php }?>
			<?php if($app_ifGathering=="yes") {?>
					
			<li class="has-sub <?php $ifFound = strstr($page, 'app_gathering'); if($ifFound!="") {?>active<?php }?>">
				<a href="javascript:;">
					<b class="caret caret-right pull-right"></b>
					<i class="fas fa-users"></i>
					<span>Gathering Place</span>
				</a>
				<ul class="sub-menu"> 
					<li <?php if($page=="app_gathering") {?>class="active"<?php }?>><a href="gathering.php">Reception</a></li>
					<li <?php if($page=="app_gatheringSocialCircles") {?>class="active"<?php }?>><a href="gatheringSocialCircles.php">Local Circles</a></li>
					<li <?php if($page=="app_gatheringPeople") {?>class="active"<?php }?>><a href="gatheringPeople.php">People</a></li>
					<li <?php if($page=="app_gatheringLabels") {?>class="active"<?php }?>><a href="gatheringLabels.php">Labels</a></li>
					<li <?php if($page=="app_gatheringEvents") {?>class="active"<?php }?>><a href="gatheringEvents.php">Events</a></li>
					<li <?php if($page=="app_gatheringDate") {?>class="active"<?php }?>><a href="gatheringDate.php">Date</a></li>
					<li <?php if($page=="app_gatheringAdvertisements") {?>class="active"<?php }?>><a href="gatheringAdvertisements.php">Advertisements</a></li>
				</ul>
			</li>
			<?php }// end if use gathering?>
					
			
					
			<li style="display: none;" class="has-sub<?php if(($page=="app_admin_emailInbox") || ($page=="app_admin_emailCompose") || ($page=="app_admin_emailDetail")) {?> active<?php }?>">
				<a href="javascript:;">
					<span class="caret caret-right pull-right"></span>
					<i class="ti-email"></i> 
					<span>Email <span class="notification">20+</span></span>
				</a>
				<ul class="sub-menu">
					<li <?php if($page=="app_admin_emailInbox") {?>class="active"<?php }?>><a href="email_inbox.php">Inbox</a></li>
					<li <?php if($page=="app_admin_emailCompose") {?>class="active"<?php }?>><a href="email_compose.php">Compose</a></li>
					<li <?php if($page=="app_admin_emailDetail") {?>class="active"<?php }?>><a href="email_detail.php">Detail</a></li>
				</ul>
			</li>
			<?php if($rightsUser=="Administrator_") {// off?>	
			<li <?php if($page=="app_calendar") {?>class="active"<?php }?>><a href="calendar.php"><i class="ti-calendar"></i> <span>Calendar</span></a></li>
			<?php }?>	
			<li class="nav-divider"></li>
			
			
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret caret-right pull-right"></b>
					<i class="fas fa-brain"></i> 
					<span>Modular</span>
				</a>
				<ul class="sub-menu">
					<!--<li class="has-sub">
						<a href="javascript:;">
							<b class="caret caret-right pull-right"></b>
							Modular 1.1
						</a>
						<ul class="sub-menu">
							<li class="has-sub">
								<a href="javascript:;">
									<b class="caret caret-right pull-right"></b>
									Modular 2.1
								</a>
								<ul class="sub-menu">
									<li><a href="javascript:;">Modular 3.1</a></li>
									<li><a href="javascript:;">Modular 3.2</a></li>
								</ul>
							</li>
							<li><a href="javascript:;">Modular 2.2</a></li>
							<li><a href="javascript:;">Modular 2.3</a></li>
						</ul>
					</li>-->
					<?php if($rightsUser=="Administrator") {?>
					<li><a href="modular.php?">The Brain</a></li>
					<?php }?>
					<!--<li><a href="javascript:;">Modular 1.3</a></li>-->
				</ul>
			</li>
			<li class="nav-divider"></li>		
			<li class="nav-header">Users</li>
			<?php if($app_ifMembersUseKnowledges=="yes") {?>
			<li class="has-sub <?php if($page=="app_knowledges") {?>active<?php }?>">
				<a href="javascript:;">
					<b class="caret caret-right pull-right"></b>
					<i class="fas fa-graduation-cap"></i>
					<span>Knowledges</span>
				</a>
				<ul class="sub-menu">
					<!--<li class="has-sub">
						<a href="knowledge.php">
							<b class="caret caret-right pull-right"></b>
							Home
						</a>
						<ul class="sub-menu">
							<li class="has-sub">
								<a href="javascript:;">
									<b class="caret caret-right pull-right"></b>
									Menu 2.1
								</a>
								<ul class="sub-menu">
									<li><a href="javascript:;">Menu 3.1</a></li>
									<li><a href="javascript:;">Menu 3.2</a></li>
								</ul>
							</li>
							<li><a href="javascript:;">Menu 2.2</a></li>
							<li><a href="javascript:;">Menu 2.3</a></li>
						</ul>
					</li>-->
					<li><a href="knowledges.php"><button type="txt" class="btn bg-theme btn-block btn-xs">Add Infos</button></a></li>
					<li><a href="knowledges.php">Search Infos</a></li>
					
				</ul>
			</li>
			<?php }?>	
			<?php if($app_ifMembersUseLabel=="yes") {?>	
			<li class="has-sub <?php if(($page=="app_labels") || ($page=="app_products")) {?>active<?php }?>">
				<a href="javascript:;">
					<b class="caret caret-right pull-right"></b>
					<i class="fas fa-leaf"></i>
					<span>Labels</span>
				</a>
				<ul class="sub-menu">
					<!--<li class="has-sub">
						<a href="knowledge.php">
							<b class="caret caret-right pull-right"></b>
							Home
						</a>
						<ul class="sub-menu">
							<li class="has-sub">
								<a href="javascript:;">
									<b class="caret caret-right pull-right"></b>
									Menu 2.1
								</a>
								<ul class="sub-menu">
									<li><a href="javascript:;">Menu 3.1</a></li>
									<li><a href="javascript:;">Menu 3.2</a></li>
								</ul>
							</li>
							<li><a href="javascript:;">Menu 2.2</a></li>
							<li><a href="javascript:;">Menu 2.3</a></li>
						</ul>
					</li>-->
					<li <?php if($page=="app_labels") {?>class="active"<?php }?>><a href="labels.php">Presentation</a></li>
					
					<li <?php if($page=="app_products") {?>class="active"<?php }?>><a href="products.php">Products</a></li>
				</ul>
			</li>
			<?php }?>
					
			<li <?php if($page=="app_profile") {?>class="active"<?php }?>><a href="profile.php"><i class="ti-id-badge"></i><span>Profile</span></a></li>
			
				
			
					
			<?php if($app_ifMembersUseMyFolder=="yes") {?>
				<li <?php if($page=="app_myFolder") {?>class="active"<?php }?>><a href="myFolder.php"><i class="ti-folder"></i><span>My Folder</span></a></li>
			<?php }?>
			
			<?php if($app_ifMembersUseWallet=="yes") {?>
			<li class="has-sub <?php if($page=="app_wallet") {?>active<?php }?>">
				<a href="javascript:;">
					<b class="caret caret-right pull-right"></b>
					<i class="fas fa-wallet"></i> 
					<span>Wallet</span>
				</a>
				<ul class="sub-menu">
					<li <?php if(($page=="app_wallet") && (!isset($_GET['in'])) && (!isset($_GET['out']))) {?>class="active"<?php }?>><a href="wallet.php?">Statut</a></li>
					<li class="has-sub <?php if((isset($_GET['out'])) || (isset($_GET['in']))) {?>active<?php }?>">
						<a href="javascript:;">
							<b class="caret caret-right pull-right"></b>
							Transactions
						</a>
						<ul class="sub-menu">
							
							<li <?php if(isset($_GET['out'])) {?>class="active"<?php }?>><a href="wallet.php?out=1">Out</a></li>
							<li <?php if(isset($_GET['in'])) {?>class="active"<?php }?>><a href="wallet.php?in=1">In</a></li>
						</ul>
					</li>
					<!--<li><a href="javascript:;">Fill</a></li>
					<li><a href="javascript:;">Don</a></li>-->
				</ul>
			</li>
			<?php }?>	
			<!--<li <?php //if($page=="app_settings") {?>class="active"<?php //}?>><a href="settings.php"><i class="ti-settings"></i><span>Settings</span></a></li>-->
			<!--<li class="has-sub">
				<a href="javascript:;">
					<b class="caret caret-right pull-right"></b>
					<i class="ti-align-left"></i> 
					<span>Menu Level</span>
				</a>
				<ul class="sub-menu">
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret caret-right pull-right"></b>
							Menu 1.1
						</a>
						<ul class="sub-menu">
							<li class="has-sub">
								<a href="javascript:;">
									<b class="caret caret-right pull-right"></b>
									Menu 2.1
								</a>
								<ul class="sub-menu">
									<li><a href="javascript:;">Menu 3.1</a></li>
									<li><a href="javascript:;">Menu 3.2</a></li>
								</ul>
							</li>
							<li><a href="javascript:;">Menu 2.2</a></li>
							<li><a href="javascript:;">Menu 2.3</a></li>
						</ul>
					</li>
					<li><a href="javascript:;">Menu 1.2</a></li>
					<li><a href="javascript:;">Menu 1.3</a></li>
				</ul>
			</li>-->
			<li <?php if($page=="app_helper") {?>class="active"<?php }?>><a href="helper.php"><i class="ti-help-alt"></i><span>Helper</span></a></li>
			
			<li class="nav-divider"></li>
			<li class="nav-header">Alpha Projects</li>
			<li class="nav-project">
				<a href="#">
					<div class="project-icon">
						<i class="fas fa-cogs"></i>
					</div>	
					<div class="project-info">
						<span class="pull-right project-percentage">77%</span>
						<h4 class="project-title">App Dev</h4>
						<div class="progress progress-xs">
							<div class="progress-bar bg-theme" style="width: 77%;" role="progressbar"></div>
						</div>
					</div>
				</a>
			</li>
			<!--<li class="nav-project">
				<a href="#">
					<div class="project-icon">
						<i class="ti-headphone"></i>
					</div>	
					<div class="project-info">
						<span class="pull-right project-percentage">40%</span>
						<h4 class="project-title">New Audio Project</h4>
						<div class="progress progress-xs">
							<div class="progress-bar bg-theme" style="width: 40%;" role="progressbar"></div>
						</div>
					</div>
				</a>
			</li>
			<li class="nav-project">
				<a href="#">
					<div class="project-icon">
						<i class="ti-github"></i>
					</div>	
					<div class="project-info">
						<span class="pull-right project-percentage">50%</span>
						<h4 class="project-title">Repository Settings</h4>
						<div class="progress progress-xs">
							<div class="progress-bar bg-theme" style="width: 50%;" role="progressbar"></div>
						</div>
					</div>
				</a>
			</li>-->
			<li class="nav-divider"></li>
			<li class="nav-copyright"><?php //echo($tr_text_workInProgress);?><br><?php //echo($tr_text_bugReport);?><!--<br>--><!--<a href="mailto:<?php //echo($emailContactProject);?>"><?php //echo($app_emailContactProject);?></a>--><?php //echo($tr_text_copyRights);?></li>
		</ul>
		<!-- END nav -->
	</div>
	<!-- END scrollbar -->
	<!-- BEGIN sidebar-minify-btn -->
	<a href="#" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="ti-arrow-left"></i></a>
	<!-- END sidebar-minify-btn -->
</div>