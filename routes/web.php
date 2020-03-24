<?php

        //---------Socialite----------
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

        //-------get sub cate by ajax---------
Route::get('get/subcategory/{category_id}','Admin\ProductController@GetSubcat');

        //-------------Wishlists-------------
Route::get('add/wishlist/{id}','WishlistController@AddWishlist');

        //------------Cart------------------
Route::get('add/to/cart/{id}','CartController@AddCart');
Route::get('check','CartController@check');

Route::get('products/cart','CartController@showCart')->name('show.cart');
Route::get('remove/cart/{rowId}','CartController@removeCart');
Route::post('update/cart/item','CartController@UpdateCart')->name('update.cartitem');
Route::get('cart/product/view/{id}','CartController@ViewProduct');
Route::post('insert/into/cart/','CartController@InsertCart')->name('insert.into.cart');

Route::get('user/checkout/','CartController@Checkout')->name('user.checkout');
Route::get('user/wishlist/','CartController@Wishlist')->name('user.wishlist');
Route::post('user/apply/coupon/','CartController@Coupon')->name('apply.coupon');
Route::get('coupon/remove/','CartController@CouponRemove')->name('coupon.remove');
Route::get('payment/page/','CartController@PymentPage')->name('payment.step');

        //---------payment methods----------------
Route::post('user/payment/process/','PaymentController@payment')->name('payment.process');
Route::post('user/stripe/charge/','PaymentController@STripeCharge')->name('stripe.charge');
        //--------return order-------------
Route::get('success/list/','PaymentController@SuccessList')->name('success.orderlist');    //return order
Route::get('request/return/{id}','PaymentController@RequestReturn');

        //------------blog routes-------------------
Route::get('blog/post','BlogController@blog')->name('blog.post');
Route::get('language/bangla','BlogController@Bangla')->name('language.bangla');
Route::get('language/english','BlogController@English')->name('language.english');



    //----home or single auth routes-----------------
Route::get('/', function(){
    return view('pages.index');
});
            //-------auth & user----------
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

            //-------admin---------------
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');

            //-------Password Reset Routes------------
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


                        //--------admin section-------------
        //-----categories------------
Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@Storecategory')->name('store.category');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@deleteCategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@editCategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@updatecategory');
        //-------brands--------------------
Route::get('admin/brands','Admin\Category\BrandController@brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\BrandController@Storebrand')->name('store.brand');
Route::get('delete/brand/{id}', 'Admin\Category\BrandController@deleteBrand');
Route::get('edit/brand/{id}', 'Admin\Category\BrandController@editBrand');
Route::post('update/brand/{id}', 'Admin\Category\BrandController@updateBrand');
        //------subcategories-------------
Route::get('admin/sub/categories','Admin\Category\SubcategoryController@subcategory')->name('subcategories');
Route::post('admin/store/subcategory','Admin\Category\SubcategoryController@Storesubcategory')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'Admin\Category\SubcategoryController@deletesubcategory');
Route::get('edit/subcategory/{id}', 'Admin\Category\SubcategoryController@editsubcategory');
Route::post('update/subcategory/{id}', 'Admin\Category\SubcategoryController@updatesubcategory');
        //---------coupon-------------
Route::get('admin/coupon','Admin\CouponController@coupon')->name('coupons');
Route::post('admin/store/coupon', 'Admin\CouponController@storeCoupon')->name('store.coupon');
Route::get('delete/coupon/{id}', 'Admin\CouponController@deleteCoupon');
Route::get('edit/coupon/{id}', 'Admin\CouponController@editCoupon');
Route::post('update/coupon/{id}', 'Admin\CouponController@updateCoupon');
        //--------newsletter--------
Route::get('admin/newsletter','Admin\CouponController@newsletter')->name('admin.newsletter');
Route::get('delete/newsletter/{id}', 'Admin\CouponController@deletenewsletter');
    //--------seo------
Route::get('admin/seo', 'Admin\CouponController@Seo')->name('admin.seo');
Route::post('admin/update/seo', 'Admin\CouponController@UpdateSeo')->name('update.seo');
        //----------product-----------
Route::get('admin/product/all', 'Admin\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\ProductController@store')->name('store.product');
Route::get('inactive/product/{id}','Admin\ProductController@Inactive');
Route::get('active/product/{id}','Admin\ProductController@Active');
Route::get('delete/product/{id}','Admin\ProductController@DeleteProduct');
Route::get('view/product/{id}','Admin\ProductController@ViewProduct');
Route::get('edit/product/{id}','Admin\ProductController@EditProduct');
Route::post('update/product/withoutphoto/{id}','Admin\ProductController@UpdateProductWithoutPhoto');
Route::post('update/product/photo/{id}','Admin\ProductController@UpdateProductPhoto');
        //--------blog routes(en/bn)---------------
Route::get('admin/post/categoryName','Admin\PostController@postCategory')->name('postCategory.name');
Route::get('admin/post/add/categoryName','Admin\PostController@addCategory')->name('add.categoryName');
Route::post('admin/post/store/categoryName','Admin\PostController@storeCategory')->name('store.categoryName');
Route::get('delete/category/name/{id}','Admin\PostController@deleteCat');
Route::get('edit/category/name/{id}','Admin\PostController@editCat');
Route::post('update/categoryName/{id}','Admin\PostController@updateCat');
//----------------------
Route::get('admin/add/post', 'Admin\PostController@create')->name('add.blogpost');
Route::post('admin/store/post', 'Admin\PostController@store')->name('store.post');
Route::get('admin/all/post', 'Admin\PostController@index')->name('all.blogpost');
Route::get('delete/post/{id}','Admin\PostController@destroy');
Route::get('edit/post/{id}','Admin\PostController@edit');
Route::post('update/post/{id}','Admin\PostController@update');
        //-----------admin Order routes------------
Route::get('admin/pending/order', 'Admin\OrderController@NewOrder')->name('admin.neworder');
Route::get('admin/view/order/{id}', 'Admin\OrderController@ViewOrder');
Route::get('admin/payment/accept/{id}', 'Admin\OrderController@PaymentAccept');
Route::get('admin/payment/cancel/{id}', 'Admin\OrderController@PaymentCancel');
Route::get('admin/accept/payment', 'Admin\OrderController@AcceptPaymentOrder')->name('admin.accept.payment');
Route::get('admin/progress/payment', 'Admin\OrderController@ProgressPaymentOrder')->name('admin.progress.payment');
Route::get('admin/success/payment', 'Admin\OrderController@SuccessPaymentOrder')->name('admin.success.payment');
Route::get('admin/cancel/payment', 'Admin\OrderController@CancelPaymentOrder')->name('admin.cancel.order');
Route::get('admin/delevery/progress/{id}', 'Admin\OrderController@DeleveryProgress');
Route::get('admin/delevery/done/{id}', 'Admin\OrderController@DeleveryDone');
        //---------orders routes-------------
Route::get('admin/today/order', 'Admin\ReportController@TodayOrder')->name('today.order');
Route::get('admin/today/deleverd', 'Admin\ReportController@TodayDelevered')->name('today.delevered');
Route::get('admin/this/month', 'Admin\ReportController@ThisMonth')->name('this.month');
Route::get('admin/search/report', 'Admin\ReportController@search')->name('search.report');
Route::post('admin/search/byyear', 'Admin\ReportController@searchByYear')->name('search.by.year');
Route::post('admin/search/bymonth', 'Admin\ReportController@searchByMonth')->name('search.by.month');
Route::post('admin/search/bydate', 'Admin\ReportController@searchByDate')->name('search.by.date');
        //----------user role(add_admin_(child))----------------
Route::get('admin/create/role', 'Admin\ReportController@UserRole')->name('create.user.role');
Route::get('admin/create/admin', 'Admin\ReportController@UserCreate')->name('create.admin');
Route::post('admin/store/admin', 'Admin\ReportController@UserStore')->name('store.admin');
Route::get('delete/admin/{id}', 'Admin\ReportController@UserDelete');
Route::get('edit/admin/{id}', 'Admin\ReportController@UserEdit');
Route::post('admin/update/admin', 'Admin\ReportController@UserUpdate')->name('update.admin');
        //---------return products admin panel----------
Route::get('admin/return/request', 'Admin\ReturnController@request')->name('admin.return.request');
Route::get('/admin/approve/return/{id}', 'Admin\ReturnController@ApproveReturn');
Route::get('admin/all/return', 'Admin\ReturnController@AllReturn')->name('admin.all.return');
        //--------------stock--------------------
Route::get('admin/product/stock', 'Admin\ReturnController@Stock')->name('admin.product.stock');
        //-----------site setting----------------
Route::get('admin/site/setting', 'Admin\SettingController@SiteSetting')->name('admin.site.setting');
Route::post('admin/update/sitesetting', 'Admin\SettingController@UpdateSetting')->name('update.sitesetting');
        //-----------database backup---------------
Route::get('admin/database/backup', 'Admin\SettingController@DatabaseBackup')->name('admin.database.backup');
Route::get('admin/database/backup/now', 'Admin\SettingController@BackupNow')->name('admin.backup.now');
Route::get('delete/database/{getFilename}', 'Admin\SettingController@DeleteDatabase');


//=============================================================================
//=============================================================================


        //---------Frontend All Routes are here:---------------
Route::post('store/newsletters','FrontController@storeNewsletter')->name('store.newsletters');

Route::get('/product/details/{id}/{product_name}', 'ProductController@ProductView');
Route::post('/cart/product/add/{id}', 'ProductController@AddCart');

        //for subcategory productShowing
Route::get('/products/{id}', 'ProductController@productsView');
        //---------Order Tracking----------
Route::post('order/tracking', 'FrontController@OrderTracking')->name('order.tracking');
        //---------UserOrderView-----------
Route::get('user/view/order/{id}', 'FrontController@UserOrderView');
        //----------Search-----------
Route::post('product/search', 'FrontController@ProductSearch')->name('product.search');

//------------Customer profile related routes-----------


