<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*ACCOUNTS ROUTES - STARTS*/
$route['admin'] = "accounts/login_redirect";
$route['login'] = "accounts/login";
$route['logout'] = "accounts/logout";
$route['registration/(:any)'] = "accounts/registration/$1";
/*ACCOUNTS ROUTES - ENDS*/

/*AJAX ROUTES - STARTS*/

$route['ajax/timing/(:any)/(:num)'] = "ajax/timing_ajax/$1";
$route['ajax/timing/(:any)'] = "ajax/timing_ajax/$1";
$route['ajax/deletes/(:any)'] = "ajax/delete_ajax/$1";
$route['ajax/delete/(:any)'] = "ajax/delete_ajax/$1";

$route['ajax/ajax_product/(:any)/(:num)']  = "admins/ajax/frondend_product_ajax/$1";
$route['ajax/ajax_product/(:any)']  = "admins/ajax/frondend_product_ajax/$1";
/*AJAX ROUTES - ENDS*/

/*WEB ROUTES - ADMIN - STARTS*/
$route['admin/product/(:any)/(:any)/(:num)'] = "admins/admin/product_views/$1/$2/$3";
$route['admin/product/(:any)/(:any)'] = "admins/admin/product_views/$1/$2";

$route['admin/service/(:any)/(:any)/(:num)'] = "admins/admin/service_views/$1/$2/$3";
$route['admin/service/(:any)/(:any)'] = "admins/admin/service_views/$1/$2";

$route['admin/staff/(:any)/(:any)/(:num)'] = "admins/admin/staff_views/$1/$2/$3";
$route['admin/staff/(:any)/(:any)'] = "admins/admin/staff_views/$1/$2";

$route['admin/order/(:any)/(:any)/(:num)'] = "admins/admin/sales_view/$1/$2/$3";

$route['admin/price/(:any)/(:any)'] = "admins/admin/price_views/$1/$2";




$route['admin/gallery/(:any)/(:any)/(:num)'] = "admins/admin/gallery_views/$1/$2/$3";
$route['admin/gallery/(:any)/(:any)'] = "admins/admin/gallery_views/$1/$2";

$route['admin/staff/(:any)/(:any)/(:num)'] = "admins/admin/staff_views/$1/$2/$3";
$route['admin/staff/(:any)/(:any)'] = "admins/admin/staff_views/$1/$2";

$route['admin/service/(:any)/(:any)/(:num)/(:num)'] = "admins/admin/service_views/$1/$2/$3/$4";
$route['admin/service/sub/(:any)/(:any)/(:num)'] = "admins/admin/service_views/$1/$2/$3";
$route['admin/service/(:any)/(:any)/(:num)'] = "admins/admin/service_views/$1/$2/$3";
$route['admin/service/(:any)/(:any)'] = "admins/admin/service_views/$1/$2";

$route['admin/(:any)/(:any)'] = "admins/admin/views/$1/$2";
/*WEB ROUTES - ADMIN - ENDS*/

/*WEB ROUTES - USER - STARTS*/
$route['user/(:any)'] = "user/views/$1";
/*WEB ROUTES - USER - ENDS*/ 

/*WEB ROUTES - CHECKOUT - STARTS*/
$route['checkout/(:any)/(:num)'] = "sales/checkout_views/$1/$2";
$route['checkout'] = "sales";
/*WEB ROUTES - CHECKOUT - ENDS*/

/*WEB ROUTES - SERVICE- STARTS*/
$route['service/(:any)/(:num)'] = "home/service_views/$1/".WEB."/$2";
$route['service/(:any)'] = "home/service_views/$1";
/*WEB ROUTES - SERVICE - ENDS*/

$route['search/(:num)'] = "home/search_views/$1";
$route['search'] = "home/search_views";


$route['testimonials/(:num)'] = "home/gallery_views/$1";

/*WEB ROUTES - CART - STARTS*/
$route['product/(:any)/(:num)'] = "home/product_views/$1/$2";
$route['product/(:any)'] = "home/product_views/$1";

/*WEB ROUTES - CART - ENDS*/

/*WEB ROUTES - COMMON - STARTS*/

$route['default_controller'] = "accounts/login";
$route['(:any)/(:num)/(:num)'] = 'home/views/$1/$2/$3';
$route['(:any)/(:num)'] = 'home/views/$1/$2';
$route['(:any)/(:any)'] = "product/views/$1/".WEB."/$2";
$route['(:any)'] = 'home/views/$1';
$route['404_override'] = '';
/*WEB ROUTES - COMMON - ENDS*/

/* End of file routes.php */
/* Location: ./application/config/routes.php */