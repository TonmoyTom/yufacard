<?php

use Illuminate\Support\Facades\Route;

/*
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/pricing', function () {
    return view('user_panel.pricing');
});

Route::get('/privacy-policy', function () {
    return view('user_panel.pages.Privacy');
});

Route::get('/terms-conditions', function () {
    return view('user_panel.pages.terms');
});

Route::get('/about-us', function () {
    return view('user_panel.pages.about_us');
});

Route::get('/virtual-card', function () {
    return view('user_panel.pages.services');
});

Route::get('/contact', function () {
    return view('user_panel.pages.contact');
});

Auth::routes(['verify'=>true]);
// Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Category route start here 

Route::get('/create-category', 'CategoryController@create');

Route::get('/view-categories', 'CategoryController@index');

Route::get('/edit-categories/{id}', 'CategoryController@edit');

Route::post('/update-category', 'CategoryController@update');

Route::get('/delete-categories/{id}', 'CategoryController@destroy');

Route::post('/save-category', 'CategoryController@store');

// Category route end here 

// product route start here 

Route::get('/create-product', 'ProductController@create');

Route::post('/save-product', 'ProductController@store');

Route::get('/view-products', 'ProductController@index');

Route::get('/edit-product/{id}', 'ProductController@edit');

Route::post('/update-product', 'ProductController@update');

Route::get('/delete-product/{id}', 'ProductController@destroy');

// product route end here 

// Card Order route start here 
Route::get('/view-card-orders', 'OrderController@index');

Route::get('/edit-card/{id}', 'OrderController@edit');

Route::get('/admin/add-user/{id}', 'OrderController@AdminAddCard');

Route::post('save-user-card', 'OrderController@AdminSaveCard');


Route::post('/update-card', 'OrderController@update');

Route::get('/delete-card/{id}', 'OrderController@destroy');

// Card Order route end here 

// Credit Order route start here 
Route::get('/view-credit-orders', 'OrderController@viewCreditOrders');

Route::get('/edit-credit-orders/{id}', 'OrderController@editCreditOrders');

Route::get('/admin/add-credit/{id}', 'OrderController@AdminCreditAdd');

Route::post('/admin/update-credit', 'OrderController@AdminUpdateCredit');

Route::post('/update-credit-order', 'OrderController@updateCreditOrder');

Route::get('/delete-credit-orders/{id}', 'OrderController@deleteCreditOrders');

// Credit Order route end here

// widthdraw request route start here

Route::get('/view-withdraw-requests', 'OrderController@viewWithdrawRequests');

Route::get('/edit-withdraw-requests', 'OrderController@editWithdrawRequests');

Route::post('/update-withdraw-request', 'OrderController@updateWithdrawRequests');

Route::get('/delete-withdraw-request/{id}', 'OrderController@deleteWithdrawRequests');

// widthdraw request route end here


// load Credit request route start here

Route::get('/view-load-credit-requests', 'OrderController@viewLoadCreditRequests');

Route::get('/edit-load-credit-requests', 'OrderController@editLoadCreditRequests');

Route::post('/update-load-credit-requests', 'OrderController@updateLoadCreditRequests');
Route::get('/delete-load-credit-requests/{id}', 'OrderController@deleteLoadCreditRequests');

// load Credit request route end here

// load Card Statement Requests start here
Route::get('/view-card-statement-requests', 'OrderController@viewCardStatementRequests');

Route::get('/edit-card-statement-request', 'OrderController@editCardStatementRequests');

Route::post('/update-card-statement-request', 'OrderController@updateCardStatementRequest');
Route::get('/delete-card-statement/{id}', 'OrderController@deleteCardStatemen');

// load Card Statement Requests end here

// Statement start here
Route::get('add-statement/{id}', 'OrderController@addStatement');

Route::post('save-statement', 'OrderController@saveStatement');

Route::post('update-statement', 'OrderController@updateStatement');

Route::get('/delete-statement', 'OrderController@deleteStatement');


// Statement end here

// Delete Card Requests start here
Route::get('/view-delete-card-requests', 'OrderController@viewDeleteCardRequests');

Route::get('/delete-card-request/{id}', 'OrderController@DeleteCardRequests');

// Delete Card Requests end here


// user route start here 

Route::get('/dashboard', 'UserCardController@index');

Route::get('/settings', 'UserCardController@settings');

// document route start

Route::post('/save-document', 'UserCardController@save_document');
Route::get('/edit-documents/{id}', 'UserCardController@edit_document');
Route::post('/update-document', 'UserCardController@update_document');
Route::get('/delete-document/{id}', 'UserCardController@delete_document');
Route::get('/view-documents', 'UserCardController@view_documents');

// document route end

Route::post('/profile-update', 'UserCardController@profileUpdate');

Route::post('/update-phone-number', 'UserCardController@phoneUpdate');

Route::post('/update-password', 'UserCardController@passwordUpdate');

Route::get('/payments', 'UserCardController@payments');

Route::get('/transactions', 'UserCardController@Transactions');

// card order user start

Route::get('/cards', 'UserCardController@cards');

Route::get('/view-cards', 'UserCardController@Viewcards');

Route::get('/view-card-details', 'UserCardController@ViewcardDetails');

Route::get('/get_card_details', 'UserCardController@card_details');

Route::get('/get_card_deta', 'UserCardController@get_card_deta');

Route::post('/save_card_details', 'UserCardController@save_card_order');

// card order use end

// credit order start
Route::post('/save_credit_order', 'UserCardController@save_credit_order');

Route::get('/user-delete-card', 'UserCardController@userDeleteCard');

Route::get('/request-card-statement', 'UserCardController@userCardStatement');

// credit order end

// deposit order start
Route::get('/deposit', 'UserCardController@deposit');

Route::post('/save-deposit', 'UserCardController@savedeposit');

// deposit order end


Route::get('/load', 'UserCardController@load');

Route::post('/balance-transfer', 'UserCardController@BalanceTransfer');

Route::post('/save-send-money', 'UserCardController@SavesendMoney');
Route::get('/view-send-money', 'UserCardController@ViewsendMoney');
Route::get('/confirm-send-money/{id}', 'UserCardController@ConfirmSendMoney');
Route::get('/delete-send-money/{id}', 'UserCardController@DeleteSendMoney');


Route::get('/send', 'MailController@index');

Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::resource('page_category', PageMenuController::class);



Route::Post('parfect-money-status', 'UserCardController@perfectMoneyStatus')->name('parfect.money.status');
Route::Post('parfect-money-success', 'UserCardController@perfectMoneySuccess')->name('parfect.money.success');
Route::Post('parfect-money-error', 'UserCardController@perfectMoneyError')->name('parfect.money.error');






