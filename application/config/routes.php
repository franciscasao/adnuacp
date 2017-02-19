<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['course/major_option'] = 'course/major_option';
$route['course/course_option'] = 'course/course_option';
$route['course/department_option'] = 'course/department_option';

$route['student/download'] = 'student/download_ticket';
$route['student/join/(:any)'] = 'student/join/$1';
$route['student/switch/(:any)'] = 'student/switch_type/$1';

$route['officer/edit/(:any)'] = 'officer/edit_student/$1';
$route['officer/topic/(:any)'] = 'officer/topic_item/$1';
$route['officer/topic'] = 'officer/list_topic';
$route['officer/switch/(:any)'] = 'officer/switch_type/$1';
$route['officer/student'] = 'officer/list_student';
$route['officer'] = 'officer';

$route['reset/(:any)/(:any)'] = 'home/change_pass/$1/$2';
$route['verify/(:any)/(:any)'] = 'home/verify/$1/$2';
$route['success'] = 'home/success_register';
$route['register'] = 'home/register';
$route['reset'] = 'home/reset';
$route['logout'] = 'home/logout';

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

