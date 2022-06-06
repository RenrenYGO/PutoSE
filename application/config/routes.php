<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route["login"]= "pages/dashboard/login";
$route["forgot_pass"]= "forgot_password/verify";
$route["pages/dashboard/(:any)"]="pages/dashboard/$1";
$route["dashboard"]= "pages/dashboard";
$route["register"]= "registration/register";
$route['default_controller'] = 'pages/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
