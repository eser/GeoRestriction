<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

$route['default_controller'] = "georestriction";
$route[''] = 'georestriction/index';
# $route['(.*)'] = "georestriction/index/$1";

// To be able to add customs controllers
// 1. Comment the previous line : $route['(.*)'] = "georestriction/index/$1";
// 2. Uncomment these lines
$route['404_override'] = 'georestriction';
$route['(.*)'] = "/$1";
