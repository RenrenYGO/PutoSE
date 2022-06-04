<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route["pages/dashboard/(:any)"]="pages/dashboard/$1";
$route["dashboard"]= "pages/dashboard";
$route["register"]= "registration/register";
$route['default_controller'] = 'pages/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
