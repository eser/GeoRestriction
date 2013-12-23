<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['module']['georestriction'] = array
(
	'module' => "Georestriction",
    'name' => "Georestriction Module",
	'description' => "Georestriction module. Manage articles's geographical availability.<br/>Source code available on: http://github.com/larukedi",
	'author' => "Eser Ozvataf",
	'version' => "1.0",

	/*
	'install' => 'install.php',
	'migrate' => 'migrate.php',
	'uninstall' => 'uninstall.php',
	*/

	'uri' => 'georestriction',
	'has_admin'=> TRUE,
	'has_frontend'=> TRUE,

	// Array of resources
	// These resources will be added to the role's management panel
	// to allow / deny actions on them.
	'resources' => array(),
);

return $config['module']['georestriction'];
