<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//------------------------BACK END--------------------------------------


Route::group(['middleware'=>'admin_logged'],function(){
	Route::get('admin_login','backend\controller_login@get_login');
	Route::post("admin_login",'backend\controller_login@post_login');
	Route::get('admin_register_account','backend\controller_user@register_account');
	Route::post('admin_register_account','backend\controller_user@post_register_account');
	Route::get('admin_forgot_password','backend\controller_user@forgot_password');
	Route::post('admin_forgot_password','backend\controller_user@post_forgot_account');
});
Route::group(['middleware'=>'admin_not_logged'],function(){
	Route::get('admin','backend\controller_product@main');
	Route::get('admin_logout','backend\controller_user@logout');
	Route::get('admin_profile/{id}','backend\controller_user@admin_profile');
	Route::post('update_admin/{id}','backend\controller_user@update_admin');
Route::group(['middleware'=>'admin_dont_have_permission'],function(){
	Route::get('admin_account','backend\controller_user@admin_account');
	Route::get('list_user','backend\controller_user@list_user');
	Route::get('delete_admin/{id}','backend\controller_user@delete_admin');
	Route::get('add_admin','backend\controller_user@add_admin');
	Route::post('add_admin','backend\controller_user@post_add_admin');

	Route::get('list_guest','backend\controller_guest@list_guest');
	Route::get('update_guest/{id}','backend\controller_guest@update_guest');
	Route::post('update_guest/{id}','backend\controller_guest@post_update_guest');
	Route::get('delete_guest/{id}','backend\controller_guest@delete_guest');

	
	Route::get('list_checkout','backend\controller_checkout@list_checkout');
	Route::get('delete_checkout/{id}','backend\controller_checkout@delete_checkout');
	Route::get('list_checkout_detail/{id}','backend\controller_checkout@list_checkout_detail');
	Route::get('delete_checkout_detail/{id}','backend\controller_checkout@delete_checkout_detail');
	Route::get('checkout_status_change','backend\controller_checkout@checkout_status_change');

	Route::get('delete_product/{id}','backend\controller_product@delete_product');
});
	

	Route::get('list_products','backend\controller_product@list_product');
	Route::get('add_product','backend\controller_product@add_product');
	Route::post('add_product','backend\controller_product@post_add_product');
	Route::get('update_product/{id}','backend\controller_product@update_product');
	Route::post('update_product/{id}','backend\controller_product@post_update_product');
	Route::get('add_product_category','backend\controller_product@add_product_category');
	// Route::post('add_product_category','backend\controller_product@post_add_product_category');

	Route::get('list_category','backend\controller_category@list_category');
	Route::get('add_category','backend\controller_category@add_category');
	Route::post('add_category','backend\controller_category@post_add_category');
	Route::get('delete_category/{id}','backend\controller_category@delete_category');
	Route::get('update_category/{id}','backend\controller_category@update_category');
	Route::post('update_category/{id}','backend\controller_category@post_update_category');
	Route::get('view_product_category/{id}','backend\controller_category@view_product_category');

	Route::get('list_brand','backend\controller_brand@list_brand');
	Route::get('add_brand','backend\controller_brand@add_brand');
	Route::post('add_brand','backend\controller_brand@post_add_brand');
	Route::get('delete_brand/{id}','backend\controller_brand@delete_brand');
	Route::get('update_brand/{id}','backend\controller_brand@update_brand');
	Route::post('update_brand/{id}','backend\controller_brand@post_update_brand');

	Route::get('list_product_material','backend\controller_product_material@list_material');
	Route::get('add_product_material','backend\controller_product_material@add_material');
	Route::post('add_product_material','backend\controller_product_material@post_add_material');
	Route::get('delete_product_material/{id}','backend\controller_product_material@delete_material');
	Route::get('update_product_material/{id}','backend\controller_product_material@update_material');
	Route::post('update_product_material/{id}','backend\controller_product_material@post_update_material');

	Route::get('list_product_color','backend\controller_product_color@list_color');
	Route::get('add_product_color','backend\controller_product_color@add_color');
	Route::post('add_product_color','backend\controller_product_color@post_add_color');
	Route::get('delete_product_color/{id}','backend\controller_product_color@delete_color');
	Route::get('update_product_color/{id}','backend\controller_product_color@update_color');
	Route::post('update_product_color/{id}','backend\controller_product_color@post_update_color');

	Route::get('search','backend\controller_search@search_choose');

	Route::get('list_count','backend\controller_count_access@list_count');
	Route::get('delete_count_access/{page}/{visitor}','backend\controller_count_access@delete_count_access');
});






//------------------------FRONT END--------------------------------------
Route::group(['middleware'=>'guests_not_logged'],function(){
	Route::get('guest_accout','frontend\controller_guest@guest_accout');
	Route::post('guest_update_account','frontend\controller_guest@guest_update_accout');
	Route::get('logout','frontend\controller_guest_login@logout');
});
Route::get('/','frontend\controller_main@adv_and_products');

Route::group(['middleware'=>'guests_logged'],function(){
	Route::get('guest_register_account','frontend\controller_guest@guest_register_account');
	Route::post('guest_register_account','frontend\controller_guest@post_guest_register_account');
	Route::post('guest_register_account_small','frontend\controller_guest@post_guest_register_account_small');
	Route::get('guest_login','frontend\controller_guest_login@guest_login');
	Route::post('guest_login','frontend\controller_guest_login@post_guest_login');
});


Route::get('guest_forgot_password','frontend\controller_guest@forgot_password');
Route::post('guest_forgot_password','frontend\controller_guest@post_forgot_password');
Route::get('guest_reset_password','frontend\controller_guest@reset_password');
Route::post('guest_reset_password','frontend\controller_guest@post_reset_password');

Route::get('guest_checkout','frontend\controller_guest@guest_checkout');
Route::get('guest_checkout_detail/{id}','frontend\controller_guest@guest_checkout_detail');

Route::get('list_view','frontend\controller_product@list_view');
Route::get('three_col','frontend\controller_product@three_col');
Route::get('four_col','frontend\controller_product@four_col');

Route::get('category_detail/{id}','frontend\controller_category@category_detail');

Route::get('products','frontend\controller_product@list_products');
Route::get('product_details/{id}','frontend\controller_product@product_details');
Route::get('product_common','frontend\controller_product@product_common');
Route::get('featured_product','frontend\controller_product@featured_product');
Route::get('product_bestsell','frontend\controller_product@product_bestsell');

Route::get('comming_products','frontend\controller_product@product_comming');
Route::get('comming_product_details/{id}','frontend\controller_product@comming_product_details');

Route::get('cart','frontend\controller_cart@list_cart');
Route::get('add_to_cart/{id}','frontend\controller_cart@add_to_cart');
Route::post('add_to_cart/{id}','frontend\controller_cart@add_to_cart');
Route::get('add_to_cart_comming_product/{id}','frontend\controller_cart@add_to_cart_comming_product');
Route::post('add_to_cart_comming_product/{id}','frontend\controller_cart@add_to_cart_comming_product');
Route::get('update_cart','frontend\controller_cart@update_cart');
Route::get('delete_cart/{id}','frontend\controller_cart@delete_cart');
Route::get('add_to_cart_ajax','frontend\controller_cart@add_to_cart_ajax');
Route::get('delete_cart_ajax','frontend\controller_cart@delete_cart_ajax');
Route::get('ajax_remove_all_cart','frontend\controller_cart@ajax_remove_all_cart');

Route::get('compair','frontend\controller_compair@compair');
Route::get('add_to_compair/{id}','frontend\controller_compair@add_to_compair');
Route::get('add_to_compair_ajax','frontend\controller_compair@add_to_compair_ajax');
Route::get('ajax_remove_all_compair','frontend\controller_compair@ajax_remove_all_compair');
Route::get('remove_one_compair_ajax','frontend\controller_compair@remove_one_compair_ajax');
Route::get('remove_one_compair_by_checked_ajax','frontend\controller_compair@remove_one_compair_by_checked_ajax');

Route::get('contact_us','frontend\controller_main@contact_us');
Route::post('post_contact_us','frontend\controller_main@post_contact_us');

Route::get('about_us','frontend\controller_main@about_us');

Route::get('search_frontend','frontend\controller_product@search_frontend');

Route::group(['middleware'=>'cart_not_found'],function(){
		// Route::get('checkout','frontend\controller_cart@checkout');
		Route::get('normal_checkout','frontend\controller_cart@post_checkout');
		Route::get('checkout_method','frontend\controller_cart@checkout_method');
		Route::get('info','frontend\controller_cart@post_info');
		Route::get('county','frontend\controller_cart@county');

		Route::get('checkout_method/paypal','frontend\controller_paypal@index');
		Route::get('checkout_method/paypal/success','frontend\controller_paypal@success');
		// Route::get('checkout_method/pay-with-paypal','frontend\controller_payment@paywithPaypal');
		// Route::get('payment','frontend\controller_payment@index');

		Route::get('voucher_use','frontend\controller_voucher@voucher_use');
		Route::post('ship_calculate','frontend\controller_voucher@ship_calculate');
});






