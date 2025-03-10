<?php

use App\Http\Controllers\Admin\BanksController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Admin\ComboController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TicketsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/set_language/{lang}', [Controller::class, 'set_language'])->name('set_language');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // CRUD PERFIL
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // CRUD ROLES
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/update/{role}', [RoleController::class, 'update'])->name('roles.update');
    // CRUD PERMISOS
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    // CRUD USERS
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    //SETTINGS
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::get('/settings/companies', [SettingController::class, 'company'])->name('settings.company');
    Route::get('/settings/banks', [SettingController::class, 'banks'])->name('settings.banks');
    Route::post('/settings-companies', [SettingController::class, 'store_companies'])->name('settings.company.store');
    // CRUD BANKS
    Route::get('/banks', [BanksController::class, 'index'])->name('banks');
    Route::post('/banks/store', [BanksController::class, 'store'])->name('banks.store');
    Route::get('/banks/{bank}/edit', [BanksController::class, 'edit'])->name('banks.edit');
    Route::put('/banks/update/{bank}', [BanksController::class, 'update'])->name('banks.update');
    Route::delete('/banks/destroy/{bank}', [BanksController::class, 'destroy'])->name('banks.destroy');
    // CRUD TICKETS
    Route::get('/tickets/{id}', [TicketsController::class, 'index'])->name('tickets');
    Route::post('/tickets/store', [TicketsController::class, 'store'])->name('tickets.store');
    Route::get('/tickets/{ticket}/edit', [TicketsController::class, 'edit'])->name('tickets.edit');
    Route::put('/tickets/update/{ticket}', [TicketsController::class, 'update'])->name('tickets.update');
    Route::delete('/tickets/destroy/{ticket}', [TicketsController::class, 'destroy'])->name('tickets.destroy');
    // COMENTARIOS
    Route::post('/tickets/comment', [CommentController::class, 'store'])->name('tickets.comment');
    Route::get('/tickets/{ticket}/img', [CommentController::class, 'img'])->name('tickets.img');
    Route::delete('/tickets/{images}/destroy_img', [CommentController::class, 'destroy_img'])->name('tickets.destroy_img');
    // CRUD CUSTOMER
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::get('/customers/{customer}/show', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/customers/{customer}/activar', [CustomerController::class, 'activar'])->name('customers.activar');
    Route::get('/customers/{customer}/desactivar', [CustomerController::class, 'desactivar'])->name('customers.desactivar');
    Route::put('/customers/update/{customer}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/destroy/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    // CRUD PORDUCTS / SERVICES
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/update/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/destroy/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    // COMBOS
    Route::controller(ComboController::class)->prefix('combo')->group(function () {
        Route::match(['get', 'post'], '/{country}/state', 'state');
        Route::match(['get', 'post'], '/{state}/city', 'city');
        Route::match(['get', 'post'], '/{idUser}/user', 'user');
    });
});

require __DIR__ . '/auth.php';