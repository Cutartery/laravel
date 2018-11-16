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
//登录
Route::get('/','Admin\AdminController@user')->name('user');
Route::post('/douser','Admin\AdminController@douser')->name('douser');
Route::get('/index','Admin\IndexController@index')->name('index');

Route::get('/home','Admin\IndexController@home')->name('home');

Route::group(['middleware' => 'sign'], function(){


//主页系统首页









//主页产品管理
//产品类表删除
Route::post('/delproducts_List','Admin\ProductController@delproducts_List')->name('delproducts_List');
Route::post('/delproducts_Lists','Admin\ProductController@delproducts_Lists')->name('delproducts_Lists');
Route::get('/Products_List','Admin\ProductController@Products_List')->name('Products_List');
//商品修改
Route::get('/member_add/{id}','Admin\ProductController@member_add')->name('member_add');
Route::post('/domember_add/{id}','Admin\ProductController@domember_add')->name('domember_add');
//商品添加
Route::get('/picture_add','Admin\ProductController@picture_add')->name('picture_add');
Route::post('/dopicture_add','Admin\ProductController@dopicture_add')->name('dopicture_add');
//商品添加分类ajax
Route::post('/ajaxpicture_add','Admin\ProductController@ajaxpicture_add')->name('ajaxpicture_add');
//商品添加品牌ajax
Route::post('/ajaxbrpicture_add','Admin\ProductController@ajaxbrpicture_add')->name('ajaxbrpicture_add');





//品牌管理
//品牌添加
Route::get('/Add_Brand','Admin\ProductController@Add_Brand')->name('Add_Brand');
Route::post('/doAdd_Brand','Admin\ProductController@doAdd_Brand')->name('doAdd_Brand');
//品牌首页
Route::get('/Brand_Manage','Admin\ProductController@Brand_Manage')->name('Brand_Manage');
//品牌修改
Route::get('/Add_Brand_update/{id}','Admin\ProductController@Add_Brand_update')->name('Add_Brand_update');
Route::post('/doAdd_Brand_update/{id}','Admin\ProductController@doAdd_Brand_update')->name('doAdd_Brand_update');
//品牌删除
Route::post('/delAdd_Brand_update','Admin\ProductController@delAdd_Brand_update')->name('delAdd_Brand_update');




//分类管理
Route::get('/product_category_add','Admin\ProductController@product_category_add')->name('product_category_add');
Route::post('/doproduct_category_add','Admin\ProductController@doproduct_category_add')->name('doproduct_category_add');
//分类
Route::get('/product_category_index','Admin\ProductController@product_category_index')->name('product_category_index');
Route::post('/doproduct_category_index','Admin\ProductController@doproduct_category_index')->name('doproduct_category_index');
//分类修改
Route::get('/product_category_insert/{id}','Admin\ProductController@product_category_insert')->name('product_category_insert');
Route::post('/doproduct_category_insert/{id}','Admin\ProductController@doproduct_category_insert')->name('doproduct_category_insert');


Route::get('/Category_Manage','Admin\ProductController@Category_Manage')->name('Category_Manage');
Route::get('/Brand_detailed','Admin\ProductController@Brand_detailed')->name('Brand_detailed');
Route::get('/member_show','Admin\ProductController@member_show')->name('member_show');









//图片管理
Route::get('/advertising','Admin\PictureController@advertising')->name('advertising');
Route::get('/Sort_ads','Admin\PictureController@Sort_ads')->name('Sort_ads');
Route::get('/Ads_list','Admin\PictureController@Ads_list')->name('Ads_list');
//交易管理
Route::get('/transaction','Admin\TransactionController@transaction')->name('transaction');
Route::get('/Order_Chart','Admin\TransactionController@Order_Chart')->name('Order_Chart');
Route::get('/Orderform','Admin\TransactionController@Orderform')->name('Orderform');
Route::get('/Amounts','Admin\TransactionController@Amounts')->name('Amounts');
Route::get('/Order_handling','Admin\TransactionController@Order_handling')->name('Order_handling');
Route::get('/Refund','Admin\TransactionController@Refund')->name('Refund');
Route::get('/order_detailed','Admin\TransactionController@order_detailed')->name('order_detailed');
Route::get('/Refund_detailed','Admin\TransactionController@Refund_detailed')->name('Refund_detailed');
//支付管理
Route::get('/Cover_management','Admin\PaymentController@Cover_management')->name('Cover_management');
Route::get('/payment_method','Admin\PaymentController@payment_method')->name('payment_method');
Route::get('/Payment_Configure','Admin\PaymentController@Payment_Configure')->name('Payment_Configure');
Route::get('/Account_Details','Admin\PaymentController@Account_Details')->name('Account_Details');
Route::get('/Payment_details','Admin\PaymentController@Payment_details')->name('Payment_details');
//会员管理
Route::get('/user_list','Admin\VipController@user_list')->name('user_list');
Route::get('/member_Grading','Admin\VipController@member_Grading')->name('member_Grading');
Route::get('/integration','Admin\VipController@integration')->name('integration');
//店铺管理
Route::get('/Shop_list','Admin\ShopController@Shop_list')->name('Shop_list');
Route::get('/Shops_Audit','Admin\ShopController@Shops_Audit')->name('Shops_Audit');
Route::get('/shopping_detailed','Admin\ShopController@shopping_detailed')->name('shopping_detailed');
//消息管理
Route::get('/Guestbook','Admin\NewsController@Guestbook')->name('Guestbook');
Route::get('/Feedback','Admin\NewsController@Feedback')->name('Feedback');
//文章管理
Route::get('/article_list','Admin\ArticleController@article_list')->name('article_list');
Route::get('/article_Sort','Admin\ArticleController@article_Sort')->name('article_Sort');
Route::get('/article_add','Admin\ArticleController@article_add')->name('article_add');
//系统管理
Route::get('/Systems','Admin\SystemController@Systems')->name('Systems');
Route::get('/System_section','Admin\SystemController@System_section')->name('System_section');
Route::get('/System_Logs','Admin\SystemController@System_Logs')->name('System_Logs');
//管理员管理
Route::get('/admin_Competence','Admin\ManageController@admin_Competence')->name('admin_Competence');
Route::get('/administrator','Admin\ManageController@administrator')->name('administrator');
Route::get('/admin_info','Admin\ManageController@admin_info')->name('admin_info');
//添加权限
Route::get('/Competence','Admin\ManageController@Competence')->name('Competence');
Route::post('/doCompetence','Admin\ManageController@doCompetence')->name('doCompetence');

Route::get('/Competence_update','Admin\ManageController@Competence_update')->name('Competence_update');  //修改
Route::post('/doCompetence_update','Admin\ManageController@doCompetence_update')->name('doCompetence_update');
Route::post('/ajaxCompetence','Admin\ManageController@ajaxCompetence')->name('ajaxCompetence');//添加修改权限不重复ajax
Route::post('/deleteCompetence','Admin\ManageController@deleteCompetence')->name('deleteCompetence');//删除



});