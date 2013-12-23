
<h3 class="toggler toggler-options"><?php echo lang('module_georestriction_title_locations'); ?></h3>

<div class="element element-options">

	<div class="element-content">

		<!-- Droppable area -->
		<div class="droppable dropGeorestrictionLocation" data-parent="article" data-parent-id="<?php echo $article['id_article'];?>">
			<?php echo lang('module_georestriction_label_drop_location'); ?>
		</div>

		<!-- Linked Locations container -->
		<?php if ($article['id_article'] != '') :?>

			<div id="georestrictionLocationsContainer"></div>

		<?php endif ;?>

		<!--
			Button : Link one location
		-->
		<a id="btnGeorestrictionLinkLocation" class="button light plus">
			<i class="icon-plus"></i>
			<?php echo lang('module_georestriction_button_link_locations') ?>
		</a>

	</div>
</div>

<script type="text/javascript">

	// Opens the locations window
	$('btnGeorestrictionLinkLocation').addEvent('click', function()
	{
		// See : /themes/admin/javascript/ionize/ionize_window.js
		ION.dataWindow(
			'georestrictionLocations',						// ID of the window
			'module_georestriction_title_link_locations', 		// Lang term used for window title
			ION.adminUrl + 'module/georestriction/location/get_list', 	// URL to the content of the window
			// Window options
			{
				'width':400,
				'height':250
			},
			// Data to send by POST to the called URL
			{
				'id_article': '<?php echo $article['id_article'] ?>'
			}
		);
	});

	// Linked creators : Called when this view is loaded
	if ($('georestrictionLocationsContainer'))
	{
		ION.HTML(
			admin_url + 'module/georestriction/location/get_linked_locations',
			{
				'parent': 'article',
				'id_parent': '<?= $article['id_article'] ?>'
			},
			{'update': 'georestrictionLocationsContainer'}
		);
	}

</script>