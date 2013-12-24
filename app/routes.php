<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*START: Comming soon login*/
/*Route::get('/',function(){
    return View::make('comming-soon');
});

Route::post('/',function(){
    $logincreds = array(
			'email'=>Input::get('em'),
			'password'=>Input::get('pwd'),
			'usertype'=>'admin'
		);

	$url = URL::to('admin');

	if( Auth::attempt( $logincreds ) )
		return Redirect::to($url);

    Session::flash('msg','<p style="color: white; text-align: center;">Account does not exist!</p>');
	return Redirect::to('/');
});*/
/*END: Comming soon login*/

Route::get('fudge', 'FacebookController@fbcheck');

Route::get('fblogin', 'FacebookController@fbregistration');

Route::get('/', 'HomeController@index');
Route::post('add-newsletter','HomeController@addEmailNewsletter');

Route::get('how-it-works',function(){
	$content = Page::find(1);

	return View::make('howworks')
			->with('ptitle','How It Works')
			->with('content',$content->content);
});

Route::group(array('prefix'=>'shop'), function(){
	Route::get('/', 'ShopController@index');

	Route::get('{id}', 'ShopController@product_datails');
	Route::post('addreview','ShopController@addRate');
});
Route::controller('gift-certificates','GiftcertController');

Route::get('shop_create_query', 'ShopController@create_query');
Route::get('shop_update_query', 'ShopController@update_query');

Route::controller('the-registry','RegcontributeController');
Route::get('registry','RegistryController@index');
Route::group(array('prefix'=>'registry','before'=>'auth'), function(){
	Route::get('create-registry-personal', 'RegistryController@create_personal');
	Route::post('createrpersonal', 'RegistryController@createpersonal');

	Route::get('create-registry-marriage', 'RegistryController@create_marriage');
	Route::post('createmarriage', 'RegistryController@createmarriage');

	Route::get('create-registry-others', 'RegistryController@create_others');
	Route::post('createothers', 'RegistryController@createothers');

	Route::get('setup', 'RegistryController@setupReg');
	Route::get('add-gift', 'RegistryController@addGift');
	Route::get('add-gift/{id}', 'ShopController@product_datails');
	Route::post('updateregistry', 'RegistryController@updateReg');
	Route::controller('wishing-well','WishingwellController');

	Route::get('additem','RegistryController@addItemReg');
	Route::post('addmanyproducts','RegistryController@addItemRegPost');
	Route::get('removeitem','RegistryController@removeprodreg');

	Route::post('check-code', 'RegistryController@checkcode');
	Route::get('the-registry', 'RegistryController@theregistry');

	Route::controller('contributors','ContributorsController');
});

Route::controller('contact-us','ContactController');

Route::controller('signup','SignupController');
Route::controller('login','LoginController');

Route::when('cart/*', 'auth');
Route::controller('cart','CartController');

/*My Account*/

Route::group(array('prefix'=>'my-account','before'=>'auth'), function(){
	Route::get('/', 'MyaccountController@index');
	Route::post('/', 'MyaccountController@update_personinfo');

	Route::get('payment-information', 'MyaccountController@paymentinfo');
	Route::post('payment-information', 'MyaccountController@update_paymentinfo');

	Route::get('order-history', 'MyaccountController@orderhistory');
	Route::get('order-detail/{id}', 'MyaccountController@orderdetail');

	Route::get('registry', 'MyaccountController@registry');
	Route::get('registry/{id}', 'MyaccountController@registrydetail');
	Route::get('registry-gotosetup', 'MyaccountController@gotosetup');

	Route::get('bye', 'MyaccountController@bye');
});

/*end:My Account*/

/*Footer Link*/
Route::get('about-us',function(){
	$content = Page::find(2);

	return View::make('about')
			->with('ptitle','About Us')
			->with('content',$content->content);
});

Route::get('help','HelpController@index');

Route::get('founder',function(){
	return View::make('founder')
			->with('ptitle','Founder');
});

Route::get('privacy-policy', function(){
	$content = Page::find(3);

	return View::make('privacy')
			->with('ptitle','Privacy Policy')
			->with('content',$content->content);
});

Route::get('terms-and-conditions', function(){
	$content = Page::find(4);

	return View::make('terms')
			->with('ptitle','Terms and Conditions')
			->with('content',$content->content);
});

Route::get('suppliers', function(){
	$content = Page::find(5);

	return View::make('suppliers')
			->with('ptitle','Suppliers')
			->with('content',$content->content);
});

Route::resource('blog','BlogController');
/*end:Footer Link*/

/*ADMIN PORTAL*/
Route::get('admin/login', 'AdminController@login');
Route::post('admin/gologin','AdminController@goLogin');
Route::post('admin/forgpass', 'AdminController@forgpass');
Route::group(array('prefix'=>'admin','before'=>'admin-auth'), function(){

	Route::get('/','AdminController@index');
	Route::get('bye-now', 'AdminController@adminlogout');

	Route::controller('users','AdminUserController');

	/*NOTES function*/
	Route::post('addnote', 'AdminController@addNote');
	Route::get('deletenote', 'AdminController@deleteNote');
	Route::get('changenotest', 'AdminController@changestNote');

	/*MESSAGE function*/
	Route::get('chat-room', 'AdminMessage@chatroom');

	/*CMS*/
	Route::controller('cms','AdminCMS');

	/*PRODUCTS*/
	Route::post('products/delete-multiple', 'AdminProductsController@destroy_multiple');
	Route::resource('products', 'AdminProductsController');
	Route::controller('gift-certs', 'AdminGcController');
	Route::controller('recipient', 'AdminRecipientController');

	/*Occassion*/
	Route::controller('occasions','AdminOccasionController');

	/*Blog*/
	Route::controller('blog','AdminBlogController');

	/*Registry*/
	Route::controller('registry','AdminRegistryController');

	/*Orders*/
	Route::controller('orders','AdminOrdersController');	

});
/*end:ADMIN PORTAL*/