<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return redirect('index');
});

Route::middleware(['AlreadyLoggedIn'])->group(function () {
    Route::get('/login', [UserController::class, 'showLoginPage'])->name('loginPage');
    Route::get('/register', [UserController::class, 'showRegisterPage'])->name('registerPage');
});
Route::middleware(['isLoggedIn'])->group(function () {
    Route::get('/dashboard-page', [UserController::class, 'dashboardPage'])->name('dashboard.page');
    Route::Post('/addbrand', [UserController::class, 'addBrand'])->name('add.brand');
    Route::Post('/addcategory', [UserController::class, 'addCategory'])->name('add.category');
    Route::post('/addproducts', [UserController::class, 'addProduct'])->name('add.product');
    Route::post('addtocart', [UserController::class, 'addToCart'])->name('add-to-cart');
    Route::put('updateproduct/{id}', [UserController::class, 'editProduct'])->name('edit-product');
Route::delete('updateproduct/{id}', [UserController::class, 'deleteProduct'])->name('delete-product');
Route::put('/{id}', [UserController::class, 'updateUser'])->name('update.user');
Route::delete('/{id}', [UserController::class, 'deleteUser'])->name('delete.user');
Route::get('shoppingcart',[UserController::class,'shoppingCart'])->name('shoppingcart');
});

Route::get('/index', [UserController::class, 'showHomePage'])->name('home');
Route::post('/loginuser', [UserController::class, 'validateLogin'])->name('login.user');
Route::Post('/newuser', [UserController::class, 'register'])->name('register.user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout.user');
Route::get('/getBrand/{id}', [UserController::class, 'categorySelected']);
Route::get('/getproduct/{id}', [UserController::class, 'showProduct']);
Route::get('editproduct{id}', [UserController::class, 'editProductPage'])->name('edit.product');
Route::get('showCart/{id}', [UserController::class, 'showCart'])->name('show.cart');
Route::post('updatecart/{id}',[UserController::class,'moderatorCartUpdate'])->name('update.cart');
route::post('deletecart/{id}',[UserController::class,'deleteCart'])->name('delete.cart');
Route::post('editcart/{id}',[UserController::class,'adminCartUpdate'])->name('cart.update');
Route::post('removecart/{id}',[UserController::class,'adminCartDelete'])->name('cart.delete');
Route::get('/searchproducts',[UserController::class,'search'])->name('search');
Route::post('/displaySearchResult/{id}',[UserController::class,'searchAjax']);
Route::post('deletefromcart/{id}',[UserController::class,'deleteShoppingCart'])->name('deleteshoppingcart');
Route::post('searchresults/{searchName}',[UserController::class,'searchResults']);