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
$route['default_controller'] = 'frontend/path/index';
$route['backend'] = 'login/backend/index';
/*$route['([a-zA-Zก-ฮ0-9-]+)/(\d+)'] = function($product_name_en, $product_id)
{
    return 'frontend/path/product_detail/'.$product_id.'/';
};
$route['collection/([a-zA-Zก-ฮ0-9-]+)/(\d+)'] = function($collection_name_en, $collection_id)
{
    return 'frontend/path/product/collection/'.$collection_id.'/';
};
$route['product/([a-zA-Zก-ฮ0-9-]+)/(\d+)'] = function($collection_name_en, $category_id)
{
    return 'frontend/path/product/category/'.$category_id.'/';
};*/
$route['index'] = 'frontend/path/index';
$route['article_detail/(:num)'] = 'frontend/path/article_detail/$1';
$route['article'] = 'frontend/path/article';
$route['cart'] = 'frontend/path/cart';
$route['confirm_payment'] = 'frontend/path/confirm_payment';
$route['confirm_payment/(:num)'] = 'frontend/path/confirm_payment/$1';
$route['customer_group/(:num)'] = 'frontend/path/customer_group/$1';
$route['contact'] = 'frontend/path/contact';
$route['login'] = 'frontend/path/login';
$route['member_address'] = 'frontend/path/member_address';
$route['member_order_detail/(:num)'] = 'frontend/path/member_order_detail/$1';
$route['member_order'] = 'frontend/path/member_order';
$route['member_payment'] = 'frontend/path/member_payment';
$route['member_point'] = 'frontend/path/member_point';
$route['member_profile'] = 'frontend/path/member_profile';
$route['order_status'] = 'frontend/path/order_status';
$route['order_summary/(:num)'] = 'frontend/path/order_summary/$1';
$route['product_category/(:num)'] = 'frontend/path/product_category/$1';
$route['product_category/(:num)/(:num)'] = 'frontend/path/product_category/$1/$2';
//$route['product_category/(:num)/(:num)/(:num)'] = 'frontend/path/product_category/$1/$2/$3';
$route['product_detail/(:num)'] = 'frontend/path/product_detail/$1';
$route['get_set_detail/(:num)'] = 'frontend/path/get_set_detail/$1';
$route['search'] = 'frontend/path/search';
$route['shipping_payment_method'] = 'frontend/path/shipping_payment_method';
$route['shipping_payment'] = 'frontend/path/shipping_payment';

$route['promotion'] = 'frontend/path/promotion';
$route['bundles'] = 'frontend/path/bundles';
$route['flexi_combo'] = 'frontend/path/flexi_combo';
$route['recommended'] = 'frontend/path/recommended';
$route['new_arrivals'] = 'frontend/path/new_arrivals';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
