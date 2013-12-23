<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Georestriction extends My_Module
{
	public function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		echo 'Georestriction Module > Index()';
	}
}
