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
Route::get('test', function () {
   	 Artisan::call('config:cache');
});
Route::get('/', function () {
	return view('welcome');
});
Route::get('thank-you', function () {
	return view('thank-you');
});

Route::get('privacy-policy', function () {
	return view('privacy-policy');
});

Route::get('terms-conditions', function () {
	return view('terms-conditions');
});

Route::get('support', function () {return view('support');});
// Route::get('help-for-seller', function () {});
// Route::get('faq-for-seller', function () {});
// Route::get('faq-for-buyer', function () {});
// Route::get('help-for-buyer', function () {});
//matul use of subscribe

Route::post('/subscribed_email','SubscriptionController@index');
Route::get('/verified_email/{email}/{token}','SubscriptionController@verified_email')->name('verified_email');
//end of matul

// user homepage main.......... 
Route::get('help-for-buyer', 'CommonController@helpforbuyer');
Route::get('faq-for-buyer', 'CommonController@faqforbuyer');
Route::get('faq-for-seller', 'CommonController@faqforseller');
Route::get('help-for-seller','CommonController@helpforseller');
Route::get('sellersinglepage','CommonController@seller_single_page');
Route::get('buyersinglepage','CommonController@buyer_single_page');
Route::get('sallersafety','CommonController@sallersafety');
Route::get('buyersafety','CommonController@buyersafety');

Route::get('verify-account/{id}', 'HomeController@VerifyAccount');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('seller-register', 'HomeController@SellerRegister');
Route::get('buyer-register', 'HomeController@BuyerRegister');
Route::post('seller-store', 'HomeController@SellerStore');
Route::post('buyer-store', 'HomeController@BuyerStore');
Route::get('privacy-policy', 'HomeController@PrivacyPolicy');
Route::get('terms-conditions', 'HomeController@TearmsCondition');
Route::get('login_view', 'HomeController@Login');
Route::get('view-product/{slug}/{id}', 'HomeController@ViewDetail');
Route::get('supplier-category/{slug}/{id}', 'SupplierController@CategoryView');
Route::get('supplier/{slug}/{id}', 'SupplierController@SupplierView');
Route::get('search', 'CommonController@search');
Route::get('searchfor', 'CommonController@searchfor');

Route::get('featured-products', 'FeatureController@FeatureProduct');
Route::get('featured-products/$slug', 'FeatureController@FeatureProductCategory');
Route::get('featured-suppliers', 'FeatureController@FeatureSupplier');
Route::get('featured-suppliers/$slug', 'FeatureController@FeatureSupplierCategory');
//Directory
Route::get('sectors-directory/{slug}', 'DirectoryController@SectorDirectory');
Route::get('countries-directory/{slug}', 'DirectoryController@CountryDirectory');
Route::get('diretory-list', 'DirectoryController@DirectoryList');
//purchase Sectory Ditectory
Route::post('download-sector-directory/{id}', 'DirectoryController@DownloadSectorDirectory');
Route::get('sector-diretory-purchase/payment-success', 'DirectoryController@SuccessPaymentSectorDirectory');
Route::get('sector-diretory-purchase/purchase-cancel', 'DirectoryController@CancelPaymentSectorDirectory');
Route::get('downalodfile-sector', 'DirectoryController@DownlfileSector');
//purchase Country Ditectory
Route::post('download-country-directory/{id}', 'DirectoryController@DownloadCountryDirectory');
Route::get('country-diretory-purchase/payment-success', 'DirectoryController@SuccessPaymentCountryDirectory');
Route::get('country-diretory-purchase/purchase-cancel', 'DirectoryController@CancelPaymentCountryDirectory');
Route::get('downalodfile-country', 'DirectoryController@DownlfileCountry');



Route::get('business-news', 'NewsController@News');
Route::get('business-news-detail/{slug}/{unique_code}', 'NewsController@NewsDetail');
Route::get('blogs', 'BlogController@index');
Route::get('blog-detail/{slug}/{unique_code}', 'BlogController@Detail');

Route::get('about-us', 'AboutUsController@index');
Route::get('contact-us', 'ContactUsController@index');
Route::post('enquiry', 'ContactUsController@store');



Route::group(['middleware' =>['role:admin','auth'],'namespace' => 'admin','prefix' => 'admin'], function (){
	Route::get('/home', 'HomeController@index');
	Route::get('profile', 'HomeController@profile');
	Route::post('updateprofile', 'HomeController@updateprofile');
	Route::post('changepassword', 'HomeController@changepassword');

    //matul.....
	Route::get('/userlist','AdminHomeMatulController@list');
	Route::get('/useractivity','AdminHomeMatulController@useractivity');

	Route::get('/subscriberlist','SubscriptionController@subscriberlist');
	Route::get('/subscribersendmessage','SubscriptionController@subscribersendmessage');
	Route::post('/subscribersendmessage','SubscriptionController@sendmessage');

	Route::get('/partnerlist','PartnerController@index');
	Route::get('/addpartner','PartnerController@showpartnerform');
	Route::post('/addpartner','PartnerController@addpartner');
	Route::get('/partner_delete/{id}','PartnerController@delete');
	Route::get('/partner_edit/{id}','PartnerController@edit');
	Route::post('/partner_edit/{id}','PartnerController@edit_save');
	Route::get('/stylecontrol','AdminHomeMatulController@style');
	//matul..

	//matul..
	Route::get('/featured_product_array','AdminHomeMatulController@details');
	Route::get('/set_new_plan_frontend','AdminHomeMatulController@set_new_plan_frontend');
	Route::post('/priority_save_to_db/{id}','AdminHomeMatulController@priority_save_to_db');

	//matul
	Route::get('country/getData', 'CountryController@getData');
	Route::resource('country', 'CountryController');
	
	Route::get('city/getData', 'CityController@getData');
	Route::resource('city', 'CityController');

	Route::get('sellerlist/getData', 'SellerListController@getData');
	Route::resource('sellerlist', 'SellerListController');
	//matul..
	Route::get('/get_featured_seller','SellerListController@get_featured_seller');
	Route::get('/get_test','SellerListController@get_featured_seller2');
	//matull..

	Route::get('product/getData', 'ProductController@getData');
	Route::resource('product', 'ProductController');
	//matul ..
	Route::get('featured_product','ProductController@featured');

	Route::get('buyerlist/getData', 'BuyerListController@getData');
	Route::resource('buyerlist', 'BuyerListController');

	Route::get('buyerpost/getData', 'BuyerPostController@getData');
	Route::resource('buyerpost', 'BuyerPostController');

	Route::get('category/getData', 'CategoryController@getData');
	Route::resource('category', 'CategoryController');

	Route::get('subcategory/getData', 'SubCategoryController@getData');
	Route::resource('subcategory', 'SubCategoryController');

	Route::resource('sellerplan', 'SellerPlanController');
	//matul
	Route::get('/newplanform','SellerPlanController@newplanform');
	//matul

	Route::get('listing/getData', 'SectorCategoryController@getData');
	Route::resource('listing', 'SectorCategoryController');

	Route::get('countrywise/getData', 'CountryListingController@getData');
	Route::get('countrywise/deletefeature/{id}', 'CountryListingController@deletefeature');
	Route::resource('countrywise', 'CountryListingController');

	Route::resource('community', 'JoinCommunityController');

	Route::get('sectorwise/deletefeature/{id}', 'SectorListingController@deletefeature');
	Route::get('sectorwise/getData', 'SectorListingController@getData');
	Route::resource('sectorwise', 'SectorListingController');
	//News
	Route::get('news-category/getData', 'NewsCategoryController@getData');
	Route::resource('news-category', 'NewsCategoryController');
	Route::get('news/getData', 'NewsController@getData');
	Route::resource('news', 'NewsController');

	//Blog
	Route::get('blogs-category/getData', 'BlogCategoryController@getData');
	Route::resource('blogs-category', 'BlogCategoryController');
	Route::get('blogs/getData', 'BlogController@getData');
	Route::resource('blogs', 'BlogController');

	Route::get('website-enquiry/getData', 'WebsiteEnquiryController@getData');
	Route::resource('website-enquiry', 'WebsiteEnquiryController');
	
	Route::resource('website-profile', 'WebsiteProfileController');

//Advertimsent
	Route::get('advertisement/topbanner', 'AdvertisementController@topbanner');
	Route::get('advertisement/bottombanner', 'AdvertisementController@bottombanner');
	Route::get('advertisement/sidebarbanner', 'AdvertisementController@sidebarbanner');


	Route::get('advertisement/getData', 'AdvertisementController@getData');
	Route::get('advertisement/changeStatus/{id}/{status}', 'AdvertisementController@changeStatus');
	Route::resource('advertisement', 'AdvertisementController');

	//Purchasing 
	Route::get('sellerpurchase-list', 'SellerPurchase@list');
	Route::get('sellerpurchase-getdata', 'SellerPurchase@getData');
	Route::get('sectorpurchase-list', 'DirectoryPurchase@Sectorlist');
	Route::get('sectorpurchase-getdata', 'DirectoryPurchase@SectorgetData');
	Route::get('countrypurchase-list', 'DirectoryPurchase@Countrylist');
	Route::get('countrypurchase-getdata', 'DirectoryPurchase@CountrygetData');
	
// Seller.....help ..faq../safety...
	Route::get('sellerhelp/getData', 'seller\HelpController@getData');
	Route::get('sellersafety/getData', 'seller\SafetyController@getData');
	Route::get('sellerfaq/getData', 'seller\FQAController@getData');
	Route::resource('sellerhelp', 'seller\HelpController'); 
	Route::resource('sellerfaq', 'seller\FQAController');
	Route::resource('sellersafety', 'seller\SafetyController');

// Buyer.....help ..faq../safety...
	Route::get('buyerhelp/getData', 'buyer\HelpController@getData');
	Route::get('buyerfaq/getData', 'buyer\FAQController@getData');
	Route::get('buyersafety/getData', 'buyer\SafetyController@getData');
	Route::resource('buyerhelp', 'buyer\HelpController'); 
	Route::resource('buyerfaq', 'buyer\FAQController');
	Route::resource('buyersafety', 'buyer\SafetyController');



});




Route::group(['middleware' =>['role:seller','auth'],'namespace' => 'seller','prefix' => 'seller'], function (){
	Route::get('profile', 'SellerProfileController@profile')->name('sellerprofile');
	Route::post('updateprofile', 'SellerProfileController@profileupdate');
	//Check k bad
	Route::group(["middleware"=>['checkisProfile']], function(){
		Route::get('/home', 'HomeController@index');

		Route::get('sell/getData', 'ProductController@getData');
		Route::resource('sell', 'ProductController');

		

		Route::resource('sellercommunity', 'JoinCommunityController');

		Route::resource('sellerprofile', 'SellerProfileController');
		Route::get('password', 'SellerProfileController@password');
		
		Route::post('updatepassword', 'SellerProfileController@updatepassword');

		Route::resource('topbanner', 'TopBannerController');
		Route::resource('bottombanner', 'BottomBannerController');
		Route::resource('sidebarbanner', 'SidebarBannerController');
		Route::resource('business-matchmatching', 'BusinessMatchMatchingController');
		Route::post('purchase-seller-plan', 'HomeController@PurchasePlan');
		Route::get('payment-success', 'HomeController@PlanSuccess');
		Route::get('plan-purchase-cancel', 'HomeController@PlanCancel');
		Route::get('enquiry', 'HomeController@Enquiry');
	});
});

Route::group(['middleware' =>['role:buyer','auth'],'namespace' => 'buyer','prefix' => 'buyer'], function (){
	Route::get('profile', 'ProfileController@profile')->name('buyerprofile');
	Route::post('update', 'ProfileController@update');
	Route::group(["middleware"=>['buyerProfile']], function(){
		
		Route::get('/home', 'HomeController@index');
		
		Route::get('post/getData', 'BuyerPostController@getData');
		Route::resource('post', 'BuyerPostController');

	//
		
		Route::get('password', 'ProfileController@password');
		Route::post('updatepassword', 'ProfileController@updatepassword');
		Route::resource('buyerprofile', 'BuyerProfileController');

		Route::resource('buyerbusiness-matchmatching', 'BusinessMatchMatchingController');
		Route::get('enquiry', 'HomeController@Enquiry');
	});
	
});

//Route::group(['middleware' =>'auth'], function (){
Route::get('buyer-post/{slug}/{uid}','CommonController@buyerPostSingle');
Route::get('buyer/{slug}/{uid}','CommonController@buyerProfile');
Route::get('seller-product/{slug}/{uni_code}','SupplierController@sellerProductSingle');
//});
Route::group(['middleware' =>'auth'], function (){
	Route::post('enquiry-for-seller/{id}','ContactUsController@sellerEnquiry');
	Route::post('enquiry-for-buyer/{id}','ContactUsController@buyerEnquiry');
});
