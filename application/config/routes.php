<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route["profile/(:any)"] = "profile/index/$1";
$route["edit_profile/delete_photo/(:any)"] = "edit_profile/delete_photo/$1";
$route["post/(:any)"] = "posts/view/$1";
$route["login"]= "login/index";
$route["forgot_pass"]= "forgot_password/verify";
$route["pages/dashboard/(:any)"]="pages/dashboard/$1";
$route["dashboard"]= "pages/dashboard";
$route["register"]= "registration/register";
$route['default_controller'] = 'pages/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
