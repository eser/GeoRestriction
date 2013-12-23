<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Location extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Models
		$this->load->model('georestriction_location_model', 'location_model', TRUE);
	}

	public function index()
	{
		echo 'Location Controller > Index()';
	}

	public function get_list()
	{
		$locations = $this->location_model->get_list();

		$this->template['locations'] = $locations;

		$this->output('location_list');
	}
}

