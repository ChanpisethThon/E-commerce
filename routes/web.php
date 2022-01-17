<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboardComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/', HomeComponent::class);
route::get('/shop', ShopComponent::class);
route::get('/cart', CartComponent::class);
route::get('/checkout', CheckoutComponent::class);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//For user or customer
route::middleware(['auth:sanctum', 'verified'])->group(function () {
    route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});

//For Admin
route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
});
