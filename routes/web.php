<?php

use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
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
route::get('/cart', CartComponent::class)->name('product.cart');
route::get('/checkout', CheckoutComponent::class);
route::get('/product/{slug}', DetailsComponent::class)->name('product.details');
route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category');

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
    route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.categories');
    route::get('/admin/category/add', AdminAddCategoryComponent::class)->name('admin.addcategory');
    route::get('/admin/category/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.editcategory');
    route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
    route::get('/admin/product/add', AdminAddProductComponent::class)->name('admin.addproduct');
    route::get('/admin/product/edit/{product_slug}', AdminEditProductComponent::class)->name('admin.editproduct');
});
