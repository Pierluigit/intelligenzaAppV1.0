<div class="navbar-header">
	<a href="<?php echo($app_urlRoot);?>" class="navbar-brand">
		<?php if($app_logoHProject!="") {// check which logo?>
			<?php if(file_exists('../images/logo/'.$app_logoHProject.'')) {?>
				<img src="../images/logo/<?php echo($app_logoHProject);?>" width="190" alt=""/>
			<?php }else {?>
				<i class="ti-infinite navbar-logo text-gradient bg-gradient-blue-purple"></i>
				<b><?php //echo($app_nameProject);?></b>
			<?php }?>
		<?php }else {?>
			<i class="ti-infinite navbar-logo text-gradient bg-gradient-blue-purple"></i>
			<b><?php echo($app_nameProject);?></b>
		<?php }?>
		<?php if($smartPhone!="yes") {?>
			<?php if(is_connected()==true) {?>
				<i class="fas fa-wifi green" title="Internet Connection Active"></i>
			<?php }else {?>
				<i class="fas fa-circle green" title="No Internet"></i>
			<?php }?>
			<?php if($ifLocalApp=="yes") {?>Local<?php }?> App 
			<?php if($app_version!="") {?> 
				<?php echo($app_version);?> 
				<span style="font-size: 8px;"><?php echo($app_version_date);?></span>
			<?php }else {?>
				<span style="font-size: 8px;">Attention minimum config!</span>
			<?php }?>
		<?php }?>
	</a>
	<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
</div>