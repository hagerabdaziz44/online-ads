<?php

use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\admin\AdsController;
use App\Http\Controllers\admin\ClientsController;
use App\Http\Controllers\admin\ClientauctionController;
use App\Http\Controllers\admin\AmountsController;

use App\Http\Controllers\user\AdvertismentController;
use App\Http\Controllers\home\homeadvertismentcontroller;
use App\Http\Controllers\home\homeauctioncontroller;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\user\AuctionController;
use App\Models\Advertisment;
use Illuminate\Support\Facades\Notification;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
####################################Categories###############################




 
// Route::get('/', function () {
//     return view('home.mainhome');


// });
################################################user#########################################
// Route::get('/', function () {
//   return view('welcome');
// });
Auth::routes();


Route::prefix('user')->name('user.')->group(function () {
      //guestuser
      Route::middleware(['guest','preventBackHistory'])->group(function () {
      Route::view('/login', 'dashboard.user.login')->name('login');
      Route::view('/register', 'dashboard.user.register')->name('register');
      Route::post('/create', [UserController::class,'create'])->name('create');
      Route::post('/check', [UserController::class,'check'])->name('check');
      

     

      Route::view('/layout', 'dashboard.admin.layout');
    //end guest user
      
      
      });
      //auth user
      Route::middleware(['auth','preventBackHistory'])->group(function () {
      Route::view('/home', 'dashboard.user.home')->name('home');  
      Route::post('/logout', [UserController::class,'logout'])->name('logout');
      Route::post('/upload/{id}', [UserController::class,'upload'])->name('upload');

      //end auth
      // Advertisment CRUD
      Route::get('/advertisment/create',[AdvertismentController::class,'create'])->name('advertisment.create');
      Route::Post('/advertisment/store', [AdvertismentController::class,'store'])->name('advertisment.store');
      Route::get('/advertisment/index',[AdvertismentController::class,'index'])->name('advertisment.index');
      Route::get('/advertisment/delete/{id}',[AdvertismentController::class,'delete'])->name('advertisment.delete');
      Route::get('/advertisment/edit/{id}',[AdvertismentController::class,'edit'])->name('advertisment.edit');
      Route::post('/advertisment/update/{id}',[AdvertismentController::class,'update'])->name('advertisment.update');
      Route::post('/advertisment/wishlist',[AdvertismentController::class,'addtowishlist'])->name('advertisment.addtowishlist');
      Route::get('/advertisment/favoriets',[AdvertismentController::class,'favoriets'])->name('advertisment.favoriets');
      Route::get('/advertisment/deleteimage/{id}',[AdvertismentController::class,'deleteimage'])->name('adv.delete.imgs');
      Route::get('/advertisment/fetch-advertisment', [AdvertismentController::class, 'fetchadvertisment'])->name('adv.fetch');
      Route::get('/advertisment/search',[AdvertismentController::class,'search'])->name('ads.search');
      
      //end advertisment CRUD
      
      //Auction CRUD
       Route::get('/auction/index', [AuctionController::class,'index'])->name('auction.index');
       Route::get('/auction/create', [AuctionController::class,'create'])->name('auction.create');
       Route::post('/auction/store',[AuctionController::class,'store'])->name('auction.store');
       Route::get('auction/edit/{id}',[AuctionController::class,'edit'])->name('auction.edit');
       Route::post('auction/update/{id}',[AuctionController::class,'update'])->name('auction.update');
       Route::get('auction/delete/{id}',[AuctionController::class,'delete'])->name('auction.delete');
       Route::post('/auction/join',[AuctionController::class,'join'])->name('auction.join');
       Route::get('/auction/bidders/{id}',[AuctionController::class,'bidders_info'])->name('auction.bidders_info');
       Route::get('/auction/biddersjoin',[AuctionController::class,'bidders_jion'])->name('auction.bidders_jion'); //الاوكشن اللي الشخص اشترك فيه
       Route::get('/auction/deleteimage/{id}',[AuctionController::class,'deleteimage'])->name('auction.deleteimage');
       Route::get('/auction/fetch-auction', [AuctionController::class, 'fetchauction'])->name('auction.fetch');
       Route::get('/auction/disenroll/{id}', [AuctionController::class, 'disenroll'])->name('auction.disenroll');
       Route::get('/auction/get_precentage/{id}', [AuctionController::class, 'get_precentage'])->name('auction.get_precentage');
       Route::post('/auction/wishlist',[AuctionController::class,'addtowishlist'])->name('auction.addtowishlist');
       Route::get('/auction/favoriets',[AuctionController::class,'favoriets'])->name('auction.favoriets');
       Route::get('/auction/search',[AuctionController::class,'search'])->name('auc.search');
       
      
      
      //end Auction CRUD
      //profile
     Route::get('/profile',[UserController::class,'profile'])->name('profile');
      Route::post('/profile/update/{id}',[UserController::class,'update'])->name('profile.update');
      Route::post('/profile/storepass',[UserController::class,'storepass'])->name('profile.storepass');
      
     
      });
});
###################################################admin#################################################
Auth::routes();
Route::prefix('admin')->name('admin.')->group(function(){

  Route::middleware(['auth:admin',])->group(function(){
      Route::view('/home','dashboard.admin.home')->name('home');
      Route::post('/logout',[adminController::class,'logout'])->name('logout');
      Route::get('/index',[adminController::class,'index'])->name('index');
      Route::get('/counter',[adminController::class,'counter'])->name('counter');
      Route::get('/pendding_ad',[adminController::class,'pendding_ad'])->name('pendding_ad');
      Route::get('/pendding_auction',[adminController::class,'pendding_auction'])->name('pendding_auction');
      Route::post('/accept/{id}',[adminController::class,'accept'])->name('ads.accept');
      Route::get('/cancle/{id}',[adminController::class,'cancle'])->name('ads.cancle');
      Route::post('/accept-auction/{id}',[adminController::class,'accept_auction'])->name('accept');
      Route::get('/cancle-auction/{id}',[adminController::class,'cancle_auction'])->name('cancle');
      // auctions
     Route::get('/auction/index',[ClientauctionController::class,'index'])->name('auction.index');
     Route::get('/auction/create', [ClientauctionController::class,'create'])->name('auction.create');
     Route::post('/auction/store',[ClientauctionController::class,'store'])->name('auction.store');  
     Route::post('/auction/accept/{id}',[ClientauctionController::class,'accept'])->name('auction.accept'); 
     Route::get('auction/cancle/{id}',[ClientauctionController::class,'cancle'])->name('auction.cancle');
     Route::get('auction/edit/{id}',[ClientauctionController::class,'edit'])->name('auction.edit');
     Route::post('auction/update/{id}',[ClientauctionController::class,'update'])->name('auction.update');
     Route::get('auction/delete/{id}',[ClientauctionController::class,'delete'])->name('auction.delete');
     Route::get('/auction/bidders/{id}',[ClientauctionController::class,'bidders_info'])->name('auction.bidders_info');
     Route::get('/auction/search',[ClientauctionController::class,'search'])->name('auction.search');
     Route::get('/auction/amounts',[AmountsController::class,'index'])->name('auction.indexamount');
     Route::get('/auction/amounts/add',[AmountsController::class,'add'])->name('auction.amount.add');
     Route::post('/auction/amounts/store',[AmountsController::class,'store'])->name('auction.amount.store');
     Route::get('/auction/fetch-auction', [ClientauctionController::class, 'fetchauction'])->name('auction.fetch');

     //categories
      Route::post('/categories/store',[CategoriesController::class,'store'])->name('categories.store');
      Route::get('/categories/index',[CategoriesController::class,'index'])->name('categories.index');
      Route::view('/categories/create','dashboard.admin.categories.create')->name('categories.create');
      Route::get('/categories/delete/{id}',[CategoriesController::class,'delete'])->name('categories.delete');
      Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
      Route::post('/categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
      Route::get('/categories/search',[CategoriesController::class,'search'])->name('categories.search');
      //user ads
      Route::get('/advertisment/index',[AdsController::class,'index'])->name('ads.index');
      
      Route::get('/advertisment/cancle/{id}',[AdsController::class,'cancle'])->name('ads.cancle');
      Route::get('/advertisment/create',[AdsController::class,'create'])->name('ads.create');
      Route::post('/advertisment/store',[AdsController::class,'store'])->name('ads.store');
      Route::get('/advertisment/edit/{id}',[AdsController::class,'edit'])->name('ads.edit');
      Route::post('/advertisment/update/{id}',[AdsController::class,'update'])->name('ads.update');
      Route::get('/advertisment/delete/{id}',[AdsController::class,'delete'])->name('ads.delete');
      Route::get('/advertisment/search',[AdsController::class,'search'])->name('ads.search');
      Route::get('/advertisment/deleteimage/{id}',[AdsController::class,'deleteimage'])->name('ads.deleteimage');
      Route::get('/advertisment/fetch-advertisment', [AdsController::class, 'fetchadvertisment'])->name('adv.fetch');

      //clients
      Route::get('/users/index',[ClientsController::class,'index'])->name('user.index');
      Route::get('/users/create',[ClientsController::class,'create'])->name('user.create');
      Route::post('/users/check',[ClientsController::class,'check'])->name('user.check');
      Route::get('/users/delete/{id}',[ClientsController::class,'delete'])->name('user.delete');
      Route::get('/users/search',[ClientsController::class,'search'])->name('user.search');
      Route::get('/users/fetch-user',[ClientsController::class,'user']);

  });

 
 Route::middleware(['guest','preventBackHistory'])->group(function () {
 
    Route::view('/login', 'dashboard.admin.login')->name('login');
  
    Route::post('/check', [adminController::class,'check'])->name('check');


    Route::post('/categories/store',[CategoriesController::class,'store'])->name('categories.store');
    Route::get('/categories/index',[CategoriesController::class,'index'])->name('categories.index');
    Route::view('/categories/create','dashboard.admin.categories.create')->name('categories.create');
    Route::get('/categories/delete/{id}',[CategoriesController::class,'delete'])->name('categories.delete');
    Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
    Route::get('/categories/search',[CategoriesController::class,'search'])->name('categories.search');
    Route::get('/categories/fetch-category', [CategoriesController::class, 'fetchcategory'])->name('category.fetch');

 });
});


###################################################home#################################################

Route::prefix('home')->name('home.')->group(function(){

  Route::get('/allAds',[homeadvertismentcontroller::class,'index'])->name('index');
  Route::get('/allauctions',[homeauctioncontroller::class,'index'])->name('index');
  Route::get('/main',[HomeController::class,'index'])->name('index');
 
  Route::get('/categories/{id}',[HomeController::class,'show'])->name('show');
  Route::get('/advertisment/show/{id}',[AdvertismentController::class,'show'])->name('advertisment.show');
  // Route::get('/advertisment/show/{id}',[AdvertismentController::class,'images'])->name('advertisment.images');
  Route::get('/auction/show/{id}',[AuctionController::class,'show'])->name('auction.show');


});





