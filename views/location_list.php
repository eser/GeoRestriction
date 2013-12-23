<?php
/**
 * Ionize Georestriction Module
 * Frontend Locations List view
 *
 * Receives :
 * $locations :	Array of locations
 */
?>

<ul>
	<?php foreach($locations as $location): ?>
		<li>
			<?php echo $location['name'] ?>
		</li>
	<?php endforeach ;?>
</ul>