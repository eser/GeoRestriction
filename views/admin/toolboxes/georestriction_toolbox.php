
<div class="divider">
	<a class="button light" id="newLocationToolbarButton">
		<i class="icon-plus"></i><?= lang('module_georestriction_button_create_location') ?>
	</a>
</div>

<script type="text/javascript">

	$('newLocationToolbarButton').addEvent('click', function(e)
	{
		ION.formWindow(
			'location',
			'locationForm',
			Lang.get('module_georestriction_label_new_location'),
			admin_url + 'module/georestriction/location/create',
			{
				'width':350,
				'height':200
			}
		);
	});

</script>
