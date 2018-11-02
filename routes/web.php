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
Route::group(['middleware' => 'sign'], function(){});

//登录
Route::get('/','AdminController@user')->name('user');
Route::post('/douser','AdminController@douser')->name('douser');
//主页系统首页
Route::get('/index','IndexController@index')->name('index');
Route::get('/home','IndexController@home')->name('home');









//主页产品管理
//产品类表删除
Route::post('/delproducts_List','ProductController@delproducts_List')->name('delproducts_List');
Route::post('/delproducts_Lists','ProductController@delproducts_Lists')->name('delproducts_Lists');
Route::get('/Products_List','ProductController@Products_List')->name('Products_List');
//商品修改
Route::get('/member_add/{id}','ProductController@member_add')->name('member_add');
Route::post('/domember_add/{id}','ProductController@domember_add')->name('domember_add');
//商品添加
Route::get('/picture_add','ProductController@picture_add')->name('picture_add');
Route::post('/dopicture_add','ProductController@dopicture_add')->name('dopicture_add');

//品牌管理
//品牌添加
Route::get('/Add_Brand','ProductController@Add_Brand')->name('Add_Brand');
Route::post('/doAdd_Brand','ProductController@doAdd_Brand')->name('doAdd_Brand');
//品牌首页
Route::get('/Brand_Manage','ProductController@Brand_Manage')->name('Brand_Manage');
//品牌修改
Route::get('/Add_Brand_update/{id}','ProductController@Add_Brand_update')->name('Add_Brand_update');
Route::post('/doAdd_Brand_update/{id}','ProductController@doAdd_Brand_update')->name('doAdd_Brand_update');
//品牌删除
Route::post('/delAdd_Brand_update','ProductController@delAdd_Brand_update')->name('delAdd_Brand_update');




//分类管理
Route::get('/product_category_add','ProductController@product_category_add')->name('product_category_add');
Route::post('/doproduct_category_add','ProductController@doproduct_category_add')->name('doproduct_category_add');
//分类
Route::get('/product_category_index','ProductController@product_category_index')->name('product_category_index');
Route::post('/doproduct_category_index','ProductController@doproduct_category_index')->name('doproduct_category_index');
//分类修改
Route::get('/product_category_insert/{id}','ProductController@product_category_insert')->name('product_category_insert');
Route::post('/doproduct_category_insert/{id}','ProductController@doproduct_category_insert')->name('doproduct_category_insert');


Route::get('/Category_Manage','ProductController@Category_Manage')->name('Category_Manage');
Route::get('/Brand_detailed','ProductController@Brand_detailed')->name('Brand_detailed');
Route::get('/member_show','ProductController@member_show')->name('member_show');









//图片管理
Route::get('/advertising','PictureController@advertising')->name('advertising');
Route::get('/Sort_ads','PictureController@Sort_ads')->name('Sort_ads');
Route::get('/Ads_list','PictureController@Ads_list')->name('Ads_list');
//交易管理
Route::get('/transaction','TransactionController@transaction')->name('transaction');
Route::get('/Order_Chart','TransactionController@Order_Chart')->name('Order_Chart');
Route::get('/Orderform','TransactionController@Orderform')->name('Orderform');
Route::get('/Amounts','TransactionController@Amounts')->name('Amounts');
Route::get('/Order_handling','TransactionController@Order_handling')->name('Order_handling');
Route::get('/Refund','TransactionController@Refund')->name('Refund');
Route::get('/order_detailed','TransactionController@order_detailed')->name('order_detailed');
Route::get('/Refund_detailed','TransactionController@Refund_detailed')->name('Refund_detailed');
//支付管理
Route::get('/Cover_management','PaymentController@Cover_management')->name('Cover_management');
Route::get('/payment_method','PaymentController@payment_method')->name('payment_method');
Route::get('/Payment_Configure','PaymentController@Payment_Configure')->name('Payment_Configure');
Route::get('/Account_Details','PaymentController@Account_Details')->name('Account_Details');
Route::get('/Payment_details','PaymentController@Payment_details')->name('Payment_details');
//会员管理
Route::get('/user_list','VipController@user_list')->name('user_list');
Route::get('/member_Grading','VipController@member_Grading')->name('member_Grading');
Route::get('/integration','VipController@integration')->name('integration');
//店铺管理
Route::get('/Shop_list','ShopController@Shop_list')->name('Shop_list');
Route::get('/Shops_Audit','ShopController@Shops_Audit')->name('Shops_Audit');
Route::get('/shopping_detailed','ShopController@shopping_detailed')->name('shopping_detailed');
//消息管理
Route::get('/Guestbook','NewsController@Guestbook')->name('Guestbook');
Route::get('/Feedback','NewsController@Feedback')->name('Feedback');
//文章管理
Route::get('/article_list','ArticleController@article_list')->name('article_list');
Route::get('/article_Sort','ArticleController@article_Sort')->name('article_Sort');
Route::get('/article_add','ArticleController@article_add')->name('article_add');
//系统管理
Route::get('/Systems','SystemController@Systems')->name('Systems');
Route::get('/System_section','SystemController@System_section')->name('System_section');
Route::get('/System_Logs','SystemController@System_Logs')->name('System_Logs');
//管理员管理
Route::get('/admin_Competence','ManageController@admin_Competence')->name('admin_Competence');
Route::get('/administrator','ManageController@administrator')->name('administrator');
Route::get('/admin_info','ManageController@admin_info')->name('admin_info');
Route::get('/Competence','ManageController@Competence')->name('Competence');

