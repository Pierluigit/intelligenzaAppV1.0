<div class="theme-panel">
	<a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="ti-settings"></i></a>
	<div class="theme-panel-content">
		<div class="form-group">
			<label class="control-label">Color Theme</label>
			<ul class="theme-list clearfix">
				<li class="active"><a href="javascript:;" class="bg-gradient-blue-purple" data-theme="default" data-theme-file="<?php echo($app_urlRoot);?>/admin/assets/css/theme/default.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default"></a></li>
				<li><a href="javascript:;" class="bg-gradient-red" data-theme="red" data-theme-file="<?php echo($app_urlRoot);?>/admin/assets/css/theme/red.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red"></a></li>
				<li><a href="javascript:;" class="bg-gradient-orange" data-theme="orange" data-theme-file="<?php echo($app_urlRoot);?>/admin/assets/css/theme/orange.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange"></a></li>
				<li><a href="javascript:;" class="bg-gradient-yellow" data-theme="yellow" data-theme-file="<?php echo($app_urlRoot);?>/admin/assets/css/theme/yellow.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Yellow"></a></li>
				<li><a href="javascript:;" class="bg-gradient-green" data-theme="green" data-theme-file="<?php echo($app_urlRoot);?>/admin/assets/css/theme/green.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green"></a></li>
				<li><a href="javascript:;" class="bg-gradient-aqua" data-theme="aqua" data-theme-file="<?php echo($app_urlRoot);?>/admin/assets/css/theme/aqua.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Aqua"></a></li>
				<li><a href="javascript:;" class="bg-gradient-blue" data-theme="blue" data-theme-file="<?php echo($app_urlRoot);?>/admin/assets/css/theme/blue.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue"></a></li>
				<li><a href="javascript:;" class="bg-gradient-purple" data-theme="purple" data-theme-file="<?php echo($app_urlRoot);?>/admin/assets/css/theme/purple.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple"></a></li>
				<li><a href="javascript:;" class="bg-gradient-black" data-theme="black" data-theme-file="<?php echo($app_urlRoot);?>/admin/assets/css/theme/black.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black"></a></li>
			</ul>
		</div>
		<ul class="widget widget-list">
			<li>
				<div class="widget-list-container">
					<div class="widget-list-content">
						Fixed Sidebar
					</div>
					<div class="widget-list-action">
						<div class="switcher switcher-success pull-left">
							<input type="checkbox" name="sidebar_fixed" id="sidebar_fixed" value="1" checked />
							<label for="sidebar_fixed"></label>
						</div>
					</div>
				</div>
			</li>
			<li>
				<div class="widget-list-container">
					<div class="widget-list-content">
						Light Sidebar
					</div>
					<div class="widget-list-action">
						<div class="switcher switcher-success pull-left">
							<input type="checkbox" name="sidebar_light" id="sidebar_light" value="1" />
							<label for="sidebar_light"></label>
						</div>
					</div>
				</div>
			</li>
			<li>
				<a href="#" class="widget-list-container">
					<div class="widget-list-content">
						Fixed Header
					</div>
					<div class="widget-list-action">
						<div class="switcher switcher-success pull-left">
							<input type="checkbox" name="header_fixed" id="header_fixed" value="1" checked />
							<label for="header_fixed"></label>
						</div>
					</div>
				</a>
			</li>
			<li>
				<div class="widget-list-container">
					<div class="widget-list-content">
						Dark Header
					</div>
					<div class="widget-list-action">
						<div class="switcher switcher-success pull-left">
							<input type="checkbox" name="header_dark" id="header_dark" value="1" />
							<label for="header_dark"></label>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="row m-t-10">
			<div class="col-md-12">
				<a href="javascript:;" class="btn btn-inverse btn-block btn-rounded btn-sm" data-click="reset-theme-setting"><b>Reset Setting</b></a>
			</div>
		</div>
	</div>
</div>