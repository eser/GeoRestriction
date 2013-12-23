
<ul class="locationPanelList list mb20 mt10">

<?php foreach($locations as $location) :?>

	<?php
		$id = $location['id_location'];
	?>

	<li class="location<?php echo $id ?> pointer" id="location_<?php echo $id ?>" data-id="<?php echo $id ?>">
		<span class="icon drag left"></span>
		<a class="icon delete right"></a>
		<a class="left pl5 edit title" data-id="<?php echo $id ?>">
			<?php echo $location['name'] ?>
		</a>
	</li>

<?php endforeach ;?>

</ul>

<script type="text/javascript">

	// Click Event to display the details of one creator
	$$('.locationPanelList li').each(function(item, idx)
	{
		var id = item.getProperty('data-id');
		var a = item.getElement('a.title');
		var del = item.getElement('a.delete');

		a.removeEvents('click');

		a.addEvent('click', function(e)
		{
			// see : /themes/admin/javascript/ionize/ionize_window.js
			// ION.formWindow : function(id, form, title, wUrl, wOptions, data)
			ION.formWindow(
				'location' + id,			// ID of the window
				'locationForm' + id,		// ID of the location form
				'module_georestriction_title_edit_location',	// lang term of the window title
				'module/georestriction/location/get/' + id,		// URL of the controller
				{
					'width':350,
					'height':200,
				}
			);
		});


		ION.initRequestEvent(
			del,
			admin_url + 'module/georestriction/location/delete/' + id,
			{},
			{
				'confirm': true,
				'message': Lang.get('ionize_confirm_element_delete')
			}
		);

		// Adds Drag'n'Drop behavior on each location name
		ION.addDragDrop(
			a,						// DOM element to drag
			'.dropGeorestrictionLocation',		// Selector of the drop areas.
			'GEORESTRICTION_MODULE.dropLocationOnParent' // Method to execute when the dragged element is dropped
		);

	});

</script>