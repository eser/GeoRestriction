<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Georestriction module's Location Model
 * To avoid models collision, the models should be named like this :
 * <Module>_<Model name>_model
 *
 */

class Georestriction_location_model extends Base_model
{
	// Location tables
	protected $_location_table = 'module_georestriction_location';

	// Link table between locations and parents (page, article)
	protected $_link_table = 'module_georestriction_links';


	/**
	 * Model Constructor
	 *
	 * @access	public
	 */
	public function __construct()
	{
		$this->set_table($this->_location_table);
		$this->set_pk_name('id_location');
		
		parent::__construct();
	}


	public function save($inputs)
	{
		// Arrays of data which will be saved
		$data = array();

		// Fields of the location table
		$fields = $this->list_fields();

		// Set the data to the posted value.
		foreach ($fields as $field)
			$data[$field] = $inputs[$field];

		return parent::save($data);
	}


	/**
	 * Deletes one location
	 *
	 * @param int 	$id
	 *
	 * @return int	Number of delete items in main table
	 *
	 */
	public function delete($id)
	{
		$nb_rows = parent::delete($id, $this->_location_table);

		return $nb_rows;
	}


	public function get_linked_location($parent, $id_parent)
	{
		// Returned data
		$data = array();

		// Conditions
		$where = array(
			'parent' => $parent,
			'id_parent' => $id_parent
		);

		$query = $this->{$this->db_group}
			->where($where)
			->order_by('ordering ASC')
			->join(
				$this->_location_table,
				$this->_location_table.'.id_location = ' . $this->_link_table.'.id_location',
				'left'
			)
			->get($this->_link_table)
		;

		if ( $query->num_rows() > 0 )
			$data = $query->result_array();

		return $data;
	}


	/**
	 * Creates one link between one parent and one location
	 *
	 * @param string		Parent code (article, page)
	 * @param int			Parent ID
	 * @param int			Location ID
	 *
	 * @return bool			TRUE if inserted, FALSE if the link already exists
	 *
	 */
	public function link_location_to_parent($parent, $id_parent, $id_location)
	{
		$data = array(
			'parent' => $parent,
			'id_parent' => $id_parent,
			'id_location' => $id_location
		);
		$this->db->where($data);

		$query = $this->{$this->db_group}
			->where($data)
			->get($this->_link_table);

		if ($query->num_rows() == 0)
		{
			$this->{$this->db_group}->insert($this->_link_table, $data);
			return TRUE;
		}
		return FALSE;
	}


	/**
	 * Deletes on link between one location and one parent
	 *
	 * @param string		Parent code (article, page)
	 * @param int			Parent ID
	 * @param int			Location ID
	 *
	 * @return int			Number of affected rows (1 or 0)
	 *
	 */
	public function unlink_location_from_parent($parent, $id_parent, $id_location)
	{
		$where = array(
			'parent' => $parent,
			'id_parent' => $id_parent,
			'id_location' => $id_location
		);

		return $this->{$this->db_group}->delete($this->_link_table, $where);
	}
}