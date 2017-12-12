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
$route['default_controller'] = 'homepage';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['admin'] = 'admin/dashboard';
$route['lien-he'] = 'contact/index';

$route['trang-chu'] = 'homepage';
$route['gioi-thieu'] = 'introduce/index';
$route['gioi-thieu/(:any)'] = 'introduce/show_list/(:any)';
$route['gioi-thieu/(:any)/(:num)'] = 'introduce/show_list/(:any)/(:num)';
$route['bai-viet/(:any)/(:any)'] = 'introduce/detail/(:any)';
// $route['(:any)'] = 'introduce/index/(:any)';


$route['phoi-hop-cung-phu-huynh/(:any)'] = 'parental/activity/(:any)';
$route['phoi-hop-cung-phu-huynh/danh-sach/(:any)'] = 'parental/show_list/(:any)';
$route['phoi-hop-cung-phu-huynh/(:any)/(:any)'] = 'parental/detail/(:any)';
$route['phoi-hop-cung-phu-huynh/danh-sach/(:any)/(:num)'] = 'parental/show_list/(:any)/(:num)';

$route['hoat-dong/(:any)'] = 'activity/index/(:any)';
$route['hoat-dong/(:any)/(:num)'] = 'activity/index/(:any)/(:num)';
$route['hoat-dong/(:any)/(:any)'] = 'activity/detail/(:any)';

$route['thong-tin-nhap-hoc/(:any)'] = 'admission/admission_procedure/(:any)';
$route['thong-tin-nhap-hoc/danh-sach/(:any)'] = 'admission/show_list/(:any)';
$route['thong-tin-nhap-hoc/danh-sach/(:any)/(:num)'] = 'admission/show_list/(:any)/(:num)';

$route['thong-tin-nhap-hoc/(:any)/(:any)'] = 'admission/detail/(:any)';

$route['thu-vien/thu-vien-anh'] = 'image/index';
$route['thu-vien/thu-vien-anh/(:num)'] = 'image/index/(:num)';
$route['thu-vien/thu-vien-anh/(:any)'] = 'image/detail/(:any)';

$route['thu-vien/video'] = 'video/index';
$route['thu-vien/video/(:num)'] = 'video/index/(:num)';
$route['nhap-hoc/dang-ky-nhap-hoc'] = 'register/index';