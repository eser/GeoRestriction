<?php
/**
 * Ionize Georestriction Module
 * Frontend Main view
 *
 * Loaded by the tag : <ion:georestriction:main />
 *
 * Receives : no vars
 */
?>

<!-- Container for the Locations List -->
<div id="moduleGeorestrictionLocationList"></div>


<script type="text/javascript">

	// Controller URL to call
	var url = 'georestriction/location/get_list';

	// Ajax request
	jQuery.ajax(
		url,
		{
			type:'post',
			// Get the result (the view HTML string)
			// and display it in the Locations List container
			success: function(result)
			{
				$('#moduleGeorestrictionLocationList').html(result);
			}
		}
	);

</script>