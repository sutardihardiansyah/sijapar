<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

// Auth Admin
$route['auth'] = 'admin/auth';
$route['auth/register'] = 'admin/auth/register';
$route['auth/logout'] = 'admin/auth/logout';
$route['dashboard'] = 'admin/dashboard';

// Engineer Admin
$route['engineer'] = 'admin/engineer';
$route['engineer/create'] = 'admin/engineer/create';
$route['engineer/save'] = 'admin/engineer/save';
$route['engineer/edit/(:any)'] = 'admin/engineer/edit/$1';
$route['engineer/update'] = 'admin/engineer/update';
$route['engineer/delete/(:any)'] = 'admin/engineer/delete/$1';

// Customer Admin
$route['customer'] = 'admin/customer';
$route['customer/create'] = 'admin/customer/create';
$route['customer/save'] = 'admin/customer/save';
$route['customer/edit/(:any)'] = 'admin/customer/edit/$1';
$route['customer/update'] = 'admin/customer/update';
$route['customer/delete/(:any)'] = 'admin/customer/delete/$1';

// Booking Admin
$route['booking'] = 'admin/booking';
$route['booking/create'] = 'admin/booking/create';
$route['booking/save'] = 'admin/booking/save';
$route['booking/edit/(:any)'] = 'admin/booking/edit/$1';
$route['booking/update'] = 'admin/booking/update';
$route['booking/detail/(:any)'] = 'admin/booking/detail/$1';
$route['booking/delete/(:any)'] = 'admin/booking/delete/$1';

// Booking Admin
$route['paket'] = 'admin/paket';
$route['paket/create'] = 'admin/paket/create';
$route['paket/save'] = 'admin/paket/save';
$route['paket/edit/(:any)'] = 'admin/paket/edit/$1';
$route['paket/update'] = 'admin/paket/update';
$route['paket/detail/(:any)'] = 'admin/paket/detail/$1';
$route['paket/delete/(:any)'] = 'admin/paket/delete/$1';

// Laporan Admin
$route['lap-booking'] = 'admin/laporan/lap-booking';
$route['lap-booking/create'] = 'admin/laporan/lap-booking/create';
$route['lap-booking/save'] = 'admin/laporan/lap-booking/save';
$route['lap-booking/get_list'] = 'admin/laporan/lap-booking/get_list';


// Task Engineer
$route['task'] = 'admin/task';
$route['task/get_data'] = 'admin/task/get_data';
$route['task/create'] = 'admin/task/create';
$route['task/save'] = 'admin/task/save';
$route['task/edit/(:any)'] = 'admin/task/edit/$1';
$route['task/update'] = 'admin/task/update';
$route['task/update_ajax'] = 'admin/task/update_ajax';
$route['task/detail/(:any)'] = 'admin/task/detail/$1';
$route['task/delete/(:any)'] = 'admin/task/delete/$1';

// Pdf 
$route['pdf/booking/(:any)/(:any)'] = 'pdf/pdf/booking/$1/$1';

// Auth Customer
$route['register'] = 'auth/register';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
