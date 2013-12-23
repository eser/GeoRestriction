<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Module Admin controller
*
*
*/
class Location extends Module_Admin
{
	/**
	* Constructor
	*
	* @access	public
	* @return	void
	*/
	public function construct()
	{
        // Models
        $this->load->model(
            array(
                'georestriction_location_model' => 'location_model',
                'page_model'
            ), '', TRUE);
	}


	/**
	 * Outputs the locations list
	 *
	 */
	public function get_list()
	{
		$conds = array(
			'order_by' => 'name ASC'
		);

		$this->template['locations'] = $this->location_model->get_list($conds);

		$this->output('admin/location_list');
	}





	/**
	 * Outputs the detail of one location
	 *
	 * @param	int		ID of the location
	 *
	 */
	public function get($id)
	{
		$where = array(
			'id_location' => $id
		);
		$this->template = $this->location_model->get($where);

		// $this->location_model->feed_lang_template($id, $this->template);

		$this->output('admin/location_detail');
	}


	/**
	 * Displays the location form
	 *
	 */
	public function create()
	{
		$this->location_model->feed_blank_template($this->template);

		// $this->location_model->feed_blank_lang_template($this->template);

		$this->output('admin/location_detail');
	}


	/**
	 * Saves one location
	 *
	 */
	public function save()
	{
		// The name must be set
		if ($this->input->post('name') != '')
		{
			$id_location = $this->location_model->save($this->input->post());

			// Update the locations list
			$this->update[] = array(
				'element' => 'moduleGeorestrictionLocationsList, #wgeorestrictionLocations .mochaContent',
				'url' => admin_url() . 'module/georestriction/location/get_list'
			);

			// Send the user a message
			$this->success(lang('ionize_message_operation_ok'));
		}
		else
		{
			// Send the user a message
			$this->error(lang('ionize_message_operation_nok'));
		}
	}

	/**
	 * Delete one location
	 *
	 */
	public function delete($id)
	{
		if ($this->location_model->delete($id) > 0)
		{
			// Update the locations list
			$this->update[] = array(
				'element' => 'moduleGeorestrictionLocationsList, #wgeorestrictionLocations .mochaContent',
				'url' => admin_url() . 'module/georestriction/location/get_list'
			);

			// Send the user a message
			$this->success(lang('ionize_message_operation_ok'));
		}
		else
		{
			// Send the user a message
			$this->error(lang('ionize_message_operation_nok'));
		}
	}


	/**
	 * Displays the list of linked locations
	 *
	 */
	public function get_linked_locations()
	{
		$parent = $this->input->post('parent');
		$id_parent = $this->input->post('id_parent');

		$this->template['locations'] = array();
		$this->template['parent'] = $parent;
		$this->template['id_parent'] = $id_parent;

		if ($parent && $id_parent)
		{
			$this->template['locations'] = $this->location_model->get_linked_location($parent, $id_parent);
		}
		$this->output('admin/addons/article/locations');
	}


	/**
	 * Links one location with one parent
	 *
	 */
	public function add_link()
	{
		$parent = $this->input->post('parent');
		$id_parent = $this->input->post('id_parent');
		$id_location = $this->input->post('id_location');

		if ($this->location_model->link_location_to_parent($parent, $id_parent, $id_location))
		{
			// Set the callbacks
			$this->update_dom_linked_locations($parent, $id_parent, $id_location);

			// Send the user a message
			$this->success(lang('ionize_message_operation_ok'));
		}
		else
		{
			// Send the user a message
			$this->error(lang('module_georestriction_message_location_already_linked'));
		}
	}

	public function unlink()
	{
		$parent = $this->input->post('parent');
		$id_parent = $this->input->post('id_parent');
		$id_location = $this->input->post('id_location');

		$this->location_model->unlink_location_from_parent($parent, $id_parent, $id_location);

		// Set the callbacks
		$this->update_dom_linked_locations($parent, $id_parent, $id_location);

		// Direct output, without message
		$this->response();
	}



	/**
	 * Send the callback to update the linked locations list
	 *
	 * @param string	Parent code
	 * @param int 		Parent ID
	 *
	 */
	protected function update_dom_linked_locations($parent, $id_parent)
	{
		$this->callback = array(
			array(
				'fn' => 'ION.HTML',
				'args' => array(
					'module/georestriction/location/get_linked_locations',
					array('parent' => $parent,'id_parent' => $id_parent),
					array('update' => 'georestrictionLocationsContainer')
				)
			)
		);
	}

}
