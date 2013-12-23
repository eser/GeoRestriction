<?php
/**
 * Locations linked to one parent
 * Called by : /modules/georestriction/controllers/admin/location.php
 *
 * This view receives :
 * - $locations : 	Array of locations linked to the current edited parent
 * - $parent : 		Parent code ('article', 'page')
 * - $id_parent : 	Parent's ID
 *
 */
?>

<?php if ( ! empty($locations)) :?>

	<ul id="georestrictionLocationsList">

		<?php foreach($locations as $location) :?>

			<li class="sortme">
				<a class="title"><?php echo $location['name'] ;?></a>
				<!-- Unlink icon -->
				<a class="icon unlink right" data-id="<?php echo $location['id_location'] ;?>"></a>
			</li>

		<?php endforeach; ?>

	</ul>

	<script type="text/javascript">

		$$('#georestrictionLocationsList li').each(function(item)
		{
			var unlinkIcon = item.getElement('.unlink');

			ION.initRequestEvent(
				// Element to add the request on
				unlinkIcon,
				// URL to send the data
				'<?= admin_url() ?>/module/georestriction/location/unlink',
				// Data send by POST to the URL
				{
					'parent': '<?php echo $parent ?>',
					'id_parent': '<?= $id_parent ?>',
					'id_location': unlinkIcon.getProperty('data-id')
				}
			);
		});

	</script>

<?php endif; ?>