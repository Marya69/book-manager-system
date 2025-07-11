<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\expenses;
use App\Http\Controllers\money;
use App\Http\Controllers\MuchdanController;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\prodectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user_of_system;
use App\Http\Controllers\usercontroller;
use App\Models\employee;
use App\Models\prodect;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::match(['get', 'post'], '/', function () {
    return view('auth.login');
});
Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/', function () {
//     return view('auth.login');
// });



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::get('/user/logout', [usercontroller::class, 'userlogout'])->name('user.logout');
//uses
Route::middleware('auth')->group(function () {
    // this route just for login
    Route::get('/sell/dashboard', [user_of_system::class, 'sell'])->name('sell.dashboard');
    // this is for user_of_system
    Route::get('/Account', [user_of_system::class, 'users'])->name('Users');
    Route::get('/Add/User', [user_of_system::class, 'adduser'])->name('adduser');
    Route::post('/User/Store', [user_of_system::class, 'adduserondatabase'])->name('add.user');
    Route::get('/User/edite/{id}', [user_of_system::class, 'editeuserondatabase'])->name('edite.user');
    Route::post('/User/update/{id}', [user_of_system::class, 'updateuserondatabase'])->name('update.user');
    Route::get('/User/Delete/{id}', [user_of_system::class, 'deleteuserondatabase'])->name('delete.user');
    //update.password.user
    Route::post('/User/update/password/{id}', [user_of_system::class, 'updateuserpasswordondatabase'])->name('update.password.user');
    //employee
      // this route just for login
      Route::get('/User/Employee', [EmployeeController::class, 'employee'])->name('Employee');
      Route::get('/Add/Employee', [EmployeeController::class, 'addemployes'])->name('addemployee');
      Route::post('/Employee/Store', [EmployeeController::class, 'addemployondatabase'])->name('add.employee');
      Route::get('/Employee/edite/{id}', [EmployeeController::class, 'editeemployondatabase'])->name('edite.employee');
      Route::post('/Employee/Update/{id}', [EmployeeController::class, 'updateemployondatabase'])->name('update.employee');
      Route::get('/Employee/Delete/{id}', [EmployeeController::class, 'deleteemployondatabase'])->name('delete.employee');


      // muchadan route
      Route::get('/List/Salaries', [MuchdanController::class, 'showmucha'])->name('Muchadrawakn');
      Route::get('/Get/Salaries', [MuchdanController::class, 'addmucha'])->name('add.mucha');

      Route::post('/Get/Salaries/Store', [MuchdanController::class, 'addmuchadan'])->name('add.muchadan');
      Route::get('/Salaries/edite/{id}', [MuchdanController::class, 'editemuchada'])->name('edite.muchadan');
      Route::post('/Employee/Salaries/Update/{id}', [MuchdanController::class, 'updatemucha'])->name('update.mucha');
      Route::get('/Employee/Salaries/Delete/{id}', [MuchdanController::class, 'deletemucha'])->name('delete.mucha');

  //prodect

  Route::get('/Prodect', [prodectController::class, 'prodect'])->name('Prodect');
  Route::get('/Add/Prodect', [prodectController::class, 'addbook'])->name('add.book');
  Route::post('/Book/Store', [prodectController::class, 'addbookondatabase'])->name('add.books');
  Route::get('/Book/edite/{id}', [prodectController::class, 'editbook'])->name('edit.book');
  Route::post('/Book/Update/{id}', [prodectController::class, 'updatebook'])->name('update.book');
  Route::get('/Book/Delete/{id}', [prodectController::class, 'deletebook'])->name('delete.book');
  // Employee Expenses
  Route::get('/Employee/Expenses', [expenses::class, 'emexpensesshow'])->name('Employee.Expenses');
  Route::get('/Add/Employee/Expenses', [expenses::class, 'emexpensesadd'])->name('Add.Employee');
  Route::post('/Store/Employee/Expenses', [expenses::class, 'emexpensestore'])->name('Store.Employee');
  Route::get('/edite/Employee/Expenses/{id}', [expenses::class, 'emexpensesedite'])->name('edite.Employee');
  Route::post('/update/Employee/Expenses/{id}', [expenses::class, 'emexpensesupdate'])->name('update.Employee');
  Route::get('/delete/Employee/Expenses/{id}', [expenses::class, 'emexpensesdelete'])->name('delete.Employee');
  // Rental expenses
  Route::get('/Rental/Expenses', [expenses::class, 'renexpensesshow'])->name('Rental.Expenses');
  Route::get('/Add/Rental/Expenses', [expenses::class, 'renxpensesadd'])->name('Add.Rental');
  Route::post('/Store/Rental/Expenses', [expenses::class, 'renexpensestore'])->name('Store.Rental');
  Route::get('/edite/Rental/Expenses/{id}', [expenses::class, 'renexpensesedite'])->name('edite.Rental');
  Route::post('/update/Rental/Expenses/{id}', [expenses::class, 'renexpensesupdate'])->name('update.Rental');
  Route::get('/delete/Rental/Expenses/{id}', [expenses::class, 'renxpensesdelete'])->name('delete.Rental');
  // book expenses
  Route::get('/Book/Expenses', [expenses::class, 'bookxpensesshow'])->name('Book.Expenses');
  Route::get('/Add/Book/Expenses', [expenses::class, 'Booknxpensesadd'])->name('Add.book.Expenses');
  Route::post('/Store/Book/Expenses', [expenses::class, 'booknexpensestore'])->name('Store.Book.Expenses');
  Route::get('/edite/Book/Expenses/{id}', [expenses::class, 'booknexpensesedite'])->name('edite.Book.Expenses');
  Route::post('/update/Book/Expenses/{id}', [expenses::class, 'bookexpensesupdate'])->name('update.Book.Expenses');
  Route::get('/delete/book/Expenses/{id}', [expenses::class, 'booknxpensesdelete'])->name('delete.Book.Expenses');
  // balance expenses
  Route::get('/Balance/Expenses', [expenses::class, 'Balancexpensesshow'])->name('Balance.Expenses');
  Route::get('/Add/Balance/Expenses', [expenses::class, 'Balanceexpensadd'])->name('Add.Balance.Expenses');
  Route::post('/Store/Balance/Expenses', [expenses::class, 'Balancenexpensestore'])->name('Store.Balance.Expenses');
  Route::get('/edite/Balance/Expenses/{id}', [expenses::class, 'Balancenexpensesedite'])->name('edite.Balance.Expenses');
  Route::post('/update/Balance/Expenses/{id}', [expenses::class, 'Balanceexpensesupdate'])->name('update.Balance.Expenses');
  Route::get('/delete/Balance/Expenses/{id}', [expenses::class, 'Balancenxpensesdelete'])->name('delete.Balance.Expenses');

  //Learning expenses
  Route::get('/Learning/Expenses', [expenses::class, 'learncexpensesshow'])->name('Learning.Expenses');
  Route::get('/Add/Learning/Expenses', [expenses::class, 'learnceexpensadd'])->name('Add.Learning.Expenses');
  Route::post('/Store/Learning/Expenses', [expenses::class, 'learnenexpensestore'])->name('Store.Learning.Expenses');
  Route::get('/edite/Learning/Expenses/{id}', [expenses::class, 'learnenexpensesedite'])->name('edite.Learning.Expenses');
  Route::post('/update/Learning/Expenses/{id}', [expenses::class, 'learnceexpensesupdate'])->name('update.Learning.Expenses');
  Route::get('/delete/Learning/Expenses/{id}', [expenses::class, 'learncenxpensesdelete'])->name('delete.Learning.Expenses');

  // reklam expenses
  Route::get('/Reklam/Expenses', [expenses::class, 'reklamcexpensesshow'])->name('Reklam.Expenses');
  Route::get('/Add/Reklam/Expenses', [expenses::class, 'reklamceexpensadd'])->name('Add.Reklam.Expenses');
  Route::post('/Store/Reklam/Expenses', [expenses::class, 'reklamenexpensestore'])->name('Store.Reklam.Expenses');
  Route::get('/edite/Reklam/Expenses/{id}', [expenses::class, 'reklamenexpensesedite'])->name('edite.Reklam.Expenses');
  Route::post('/update/Reklam/Expenses/{id}', [expenses::class, 'reklamceexpensesupdate'])->name('update.Reklam.Expenses');
  Route::get('/delete/Reklam/Expenses/{id}', [expenses::class, 'reklamcenxpensesdelete'])->name('delete.Reklam.Expenses');
  // Course expenses
  Route::get('/Course/Expenses', [expenses::class, 'Coursecexpensesshow'])->name('Course.Expenses');
  Route::get('/Add/Course/Expenses', [expenses::class, 'Courseceexpensadd'])->name('Add.Course.Expenses');
  Route::post('/Store/Course/Expenses', [expenses::class, 'Courseenexpensestore'])->name('Store.Course.Expenses');
  Route::get('/edite/Course/Expenses/{id}', [expenses::class, 'Courseenexpensesedite'])->name('edite.Course.Expenses');
  Route::post('/update/Course/Expenses/{id}', [expenses::class, 'Courseeexpensesupdate'])->name('update.Course.Expenses');
  Route::get('/delete/Course/Expenses/{id}', [expenses::class, 'Courseenxpensesdelete'])->name('delete.Course.Expenses');


  // Office expenses
  Route::get('/Office/Expenses', [expenses::class, 'Officecexpensesshow'])->name('Office.Expenses');
  Route::get('/Add/Office/Expenses', [expenses::class, 'Officeceexpensadd'])->name('Add.Office.Expenses');
  Route::post('/Store/Office/Expenses', [expenses::class, 'Officeenexpensestore'])->name('Store.Office.Expenses');
  Route::get('/edite/Office/Expenses/{id}', [expenses::class, 'Officeenexpensesedite'])->name('edite.Office.Expenses');
  Route::post('/update/Office/Expenses/{id}', [expenses::class, 'Officeeexpensesupdate'])->name('update.Office.Expenses');
  Route::get('/delete/Office/Expenses/{id}', [expenses::class, 'Officeenxpensesdelete'])->name('delete.Office.Expenses');
  // Technological expenses
  Route::get('/Technological/Expenses', [expenses::class, 'technocexpensesshow'])->name('Technological.Expenses');
  Route::get('/Add/Technological/Expenses', [expenses::class, 'technoceexpensadd'])->name('Add.Technological.Expenses');
  Route::post('/Store/Technological/Expenses', [expenses::class, 'technoenexpensestore'])->name('Store.Technological.Expenses');
  Route::get('/edite/Technological/Expenses/{id}', [expenses::class, 'technoenexpensesedite'])->name('edite.Technological.Expenses');
  Route::post('/update/Technological/Expenses/{id}', [expenses::class, 'technoexpensesupdate'])->name('update.Technological.Expenses');
  Route::get('/delete/Technological/Expenses/{id}', [expenses::class, 'technoenxpensesdelete'])->name('delete.Technological.Expenses');


  // Exhibition expenses
  Route::get('/Exhibition/Expenses', [expenses::class, 'exhibocexpensesshow'])->name('Exhibition.Expenses');
  Route::get('/Add/Exhibition/Expenses', [expenses::class, 'Exhceexpensadd'])->name('Add.Exhibition.Expenses');
  Route::post('/Store/Exhibition/Expenses', [expenses::class, 'Exhenexpensestore'])->name('Store.Exhibition.Expenses');
  Route::get('/edite/Exhibition/Expenses/{id}', [expenses::class, 'Exhenexpensesedite'])->name('edite.Exhibition.Expenses');
  Route::post('/update/Exhibition/Expenses/{id}', [expenses::class, 'Exhexpensesupdate'])->name('update.Exhibition.Expenses');
  Route::get('/delete/Exhibition/Expenses/{id}', [expenses::class, 'Exhenxpensesdelete'])->name('delete.Exhibition.Expenses');
  // pos route
  Route::get('/Prodect/Order', [postcontroller::class, 'show'])->name('pos');
  Route::get('/back', [postcontroller::class, 'back'])->name('back');
  // cart route
  Route::post('/Prodect/Add', [CartController::class, 'addprodect'])->name('Add.books');
  Route::post('/Prodect/Quantity/Upadte/{rowId}', [CartController::class, 'updatedq'])->name('Cart.Update');
  Route::get('/Prodect/Quantity/Delete/{rowId}', [CartController::class, 'deltedeq'])->name('Cart.Delete');
  // Route::post('/Prodect/Quantity/Upadte/dis', [CartController::class, 'updatedqdis'])->name('Cartdis.Update');
  Route::get('/Prodect/All/Add', [CartController::class, 'alladd'])->name('all.book');
  Route::post('/Create/Invoice', [CartController::class, 'addinvoice'])->name('create.invoice');
  Route::get('/Prodect/Send', [CartController::class, 'finalinvoice'])->name('final');
Route::get('/notifications/products', [CartController::class, 'getProductNotifications'])->name('notifications.products');
// Route::get('/prodects', [ProdectController::class, 'prodect'])->name('prodects.index');
Route::get('/prodects/zero-qty-count', [CartController::class, 'getZeroQuantityCount'])->name('prodects.zeroQtyCount');
  // sold out
  Route::get('/Sold/Prodect', [postcontroller::class, 'allsold'])->name('all.Sold');
  Route::get('/View/OrderDetail/{id}', [postcontroller::class,'viewOrder'])->name('View.Order');

  Route::get('undo/{id}', [postcontroller::class, 'undo'])->name('undo');
  // dashboard
  Route::get('dashboard', [postcontroller::class, 'showing'])->name('showing');

  // gift

  Route::get('/Gift/Prodect', [postcontroller::class, 'allsoldgift'])->name('all.Sold.gift');
  Route::get('/View/OrderDetail/Gift/{id}', [postcontroller::class,'viewOrdergift'])->name('View.Order.gift');

  Route::get('Gift/undo/{id}', [postcontroller::class, 'undogift'])->name('undogift');
  // Exhibition expenses
  Route::get('/Personal/Expenses', [expenses::class, 'personalexpensesshow'])->name('personal.Expenses');
  Route::get('/Add/Personal/Expenses', [expenses::class, 'Personaladd'])->name('Add.Personal.Expenses');
  Route::post('/Store/Personal/Expenses', [expenses::class, 'persolastore'])->name('Store.Personal.Expenses');
  Route::get('/edite/Personal/Expenses/{id}', [expenses::class, 'Personaldite'])->name('edite.Personal.Expenses');
  Route::post('/update/Personal/Expenses/{id}', [expenses::class, 'Personalupdate'])->name('update.Personal.Expenses');
  Route::get('/delete/Personal/Expenses/{id}', [expenses::class, 'personalsdelete'])->name('delete.Personal.Expenses');

  // expenses detail
  Route::get('get/month/expenses', [expenses::class, 'detail'])->name('Expensesthismonth');

  // list  expenses detail month
 // routes/web.php

Route::post('/update-e-values', [user_of_system::class, 'detail1'])->name('update.e1.values');
Route::post('/update-e-values1', [user_of_system::class, 'detail2'])->name('update.e2.values');
Route::post('/update-e-values2', [user_of_system::class, 'detail3'])->name('update.e3.values');
Route::post('/update-e-values3', [user_of_system::class, 'detail4'])->name('update.e4.values');
Route::post('/update-e-values4', [user_of_system::class, 'detail5'])->name('update.e5.values');
Route::post('/update-e-values5', [user_of_system::class, 'detail6'])->name('update.e6.values');

Route::post('/update-e-values6', [user_of_system::class, 'detail7'])->name('update.e7.values');
Route::post('/update-e-values7', [user_of_system::class, 'detail8'])->name('update.e8.values');
Route::post('/update-e-values8', [user_of_system::class, 'detail9'])->name('update.e9.values');
Route::post('/update-e-values9', [user_of_system::class, 'detail10'])->name('update.e10.values');
Route::post('/update-e-values10', [user_of_system::class, 'detail11'])->name('update.e11.values');
Route::post('/update-e-values11', [user_of_system::class, 'detail12'])->name('update.e12.values');

// add money

Route::get('/Page/Money', [money::class, 'Moneyshow'])->name('Page.Money');
Route::get('/Add/Page/Money', [money::class, 'Moneyshowadd'])->name('Add.Page.Money');
Route::post('/Store/Page/Money', [money::class, 'Moneystore'])->name('Store.Page.Money');
Route::get('/edite/Page/Money/{id}', [money::class, 'Moneyedite'])->name('edite.Page.Money');
Route::post('/update/Page/Money/{id}', [money::class, 'Moneyeupdate'])->name('update.Page.Money');
Route::get('/delete/Page/Money/{id}', [money::class, 'Moneyedelete'])->name('delete.Page.Money');

// In routes/web.php
// Route::get('/notifications', [user_of_system::class, 'checkProductQuantities']);

});