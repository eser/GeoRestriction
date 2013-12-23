<div id="maincolumn">

	<h2 class="main georestriction"><?php echo lang('module_georestriction_title'); ?></h2>

	<div class="main subtitle">

		<!-- About this module -->
		<p class="lite">
			<?php echo lang('module_georestriction_about'); ?>
		</p>

	</div>

	<!-- Will contains the locations list -->
	<div id="moduleGeorestrictionLocationsList"></div>
</div>

<script type="text/javascript">

	// Init the panel toolbox is mandatory
	ION.initModuleToolbox('georestriction','georestriction_toolbox');

	// Update the locations list
	ION.HTML(
		'module/georestriction/location/get_list',		// URL to the controller
		{}, 								// Data send by POST. Nothing
		{'update':'moduleGeorestrictionLocationsList'}	// JS request options
	);

</script>
