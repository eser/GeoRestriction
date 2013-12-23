/**
 * Declare and create the GEORESTRICTION_MODULE object
 *
 */
var GEORESTRICTION_MODULE = (GEORESTRICTION_MODULE || {});

GEORESTRICTION_MODULE.append = function(hash){
	Object.append(GEORESTRICTION_MODULE, hash);
}.bind(GEORESTRICTION_MODULE);

GEORESTRICTION_MODULE.append(
{
	baseUrl: base_url,
	adminUrl: admin_url,
	moduleUrl: admin_url + 'module/georestriction/',

	/**
	 * Called when one location is dropped to one droppable element
	 * This method receives :
	 *
	 * @param DOM element   Dragged clone of the element
	 * @param DOM element   DOM Element on which the element is dropped
	 * @param event         The event
	 *
	 */
	dropLocationOnParent: function(element, droppable, event)
	{
		ION.JSON(
			this.moduleUrl + 'location/add_link',
			{
				'parent': droppable.getProperty('data-parent'),
				'id_parent': droppable.getProperty('data-parent-id'),
				'id_location': element.getProperty('data-id')
			}
		);
	}

});
