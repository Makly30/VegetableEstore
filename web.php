<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\customer\MyDataProcessController;
use App\Http\Controllers\deliver\DataprocessController as DeliverDataprocessController;
use App\Http\Controllers\DeliverListController;
use App\Http\Controllers\DeliverServiceController;
use App\Http\Controllers\OrderVController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\seller\DataProcessController;
use App\Http\Controllers\TrackingController;
use App\Models\DeliverList;
use App\Models\DeliverService;
use App\Models\OrderV;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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
    return view('pages.home');
})->name('home');
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('register.store');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login.on');
Route::get('/vegetable',[ProductController::class,'index'])->name('vegetable');
Route::get('/ownproduct',[ProductController::class,'showonlyown'])->name('ownproduct');
Route::get('/addproduct',[ProductController::class,'add'])->name('addproduct');
Route::post('/storeproduct',[ProductController::class,'store'])->name('product.store');
Route::get('/ordervegetable/{product}',[OrderVController::class,'index'])->name('order');
Route::post('/order/process/{p}/{cus}',[OrderVController::class,'store'])->name('add.order');
Route::get('/myorder/{id}',[OrderVController::class,'show'])->name('myordershow');

Route::get('/myproductorder/{id}',[OrderVController::class,'showowner'])->name('customer.order');

Route::get('/adddelivery/{id}',[DeliverServiceController::class,'index1'])->name('addform');

Route::get('/adddeliveryform',[DeliverServiceController::class,'index'])->name('adddelivery');
Route::post('/adddelivery/{id}',[DeliverServiceController::class,'store'])->name('adddelivery.add');
Route::get('/deliverservice',[DeliverServiceController::class,'show'])->name('showdeliver');
Route::get('/adddeliver/{id}/{owner}',[DeliverListController::class,'index'])->name('adddeliver');
Route::post('/adddeliver/{deliver_service}/{seller}/{deliver}',[DeliverListController::class,'add'])->name('adddeliver.add');
Route::get('/myorderservice/{id}',[DeliverListController::class,'show'])->name('deliverservice.showcustomer');
Route::get('/mycustomerorderservice/{id}',[DeliverListController::class,'showorder'])->name('deliverservice.showorder');
Route::get('/tracking/add',[TrackingController::class,'add'])->name('add.tracking');
Route::get('/myordervegetdetail/{orp}',[OrderVController::class,'showdetail'])->name('myorderdetail');
Route::get('/edit/vegetable/{orp}',[OrderVController::class,'editorder'])->name('editveget');
Route::put('/edit/vegetable/{orp}',[OrderVController::class,'editorderpost'])->name('editveget.put');
Route::get('/mydataprocess/{id}',[DataProcessController::class,'mydata'])->name('mydata.income');
Route::get('/mydataexpense/{id}',[DataProcessController::class,'expense'])->name('mydata.expense');
Route::get('/mydataorder/{id}',[DataProcessController::class,'order'])->name('mydata.order');
Route::get('/customerorderdetail/{orp}',[OrderVController::class,'showdetailsell'])->name('customerorderdetail');
Route::get('/deliverservicedetail/{dlist}',[DeliverListController::class,'showdetailcus'])->name('showdetailservice');
Route::get('/mydatapayment/{id}',[MyDataProcessController::class,'index'])->name('mydatainsite');
Route::get('/mydataincome/{id}',[DeliverDataprocessController::class,'index'])->name('mydataprocess');
Route::get('/myinfo/{id}',[LoginController::class,'myinfo'])->name('myinfo');
Route::get('/deliverydetail/{dlist}',[DeliverListController::class,'showdetaildeliver'])->name('showdetaildeliver');
Route::get('/updatelocatoin/{id}',[DeliverListController::class,'updatelocation'])->name('updatelocation');
Route::put('/update/{id}',[DeliverListController::class,'updatelocal'])->name('updatelocal');
Route::delete('/delete/product/{id}',[ProductController::class,'destroy'])->name('vegetable.delete');
Route::delete('/delivery/delete/{id}',[DeliverServiceController::class,'destory'])->name('service.delete');
Route::delete('/delete/order/{orp}',[OrderVController::class,'destroy'])->name('vegetab.delete');
Route::get('/edit/info/{id}',[LoginController::class,'edit'])->name('edit.info');
Route::put('/update/info/{id}',[LoginController::class,'update'])->name('update.info');