<?php
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminCheckMiddleware;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/',[HomepageController::class,'index']);

Route::view('/about','about');

Route::get('/shop',[ShopController::class,'index']);

Route::get('/contact',[ContactController::class,'index'])
    ->name('contact');

Route::middleware(['auth',AdminCheckMiddleware::class])->prefix('admin')->group(function() {

    Route::controller(ContactController::class)->group(function() {
        Route::get('/all-contacts','allContacts')
            ->name('all_contacts');
        Route::post('/send-contact','sendContact')
            ->name('addContact');
        Route::get('/edit-contacts/{contactId}','editContactPage')
            ->name('changeContactPage');
        Route::patch('/edit_contacts/{contact}','editContact')
            ->name('changeContact');
        Route::get('/delete-contact/{contact}','delete')
            ->name("contactDelete");
    });
    
    Route::controller(ProductController::class)->group(function() {
        Route::get('/all-products','index')
            ->middleware('auth')
            ->name('allProducts');
        Route::get('/delete-product/{product}','delete')
            ->name("productDelete");
        Route::get('/edit-products/{product}','editProductPage')
            ->name('changeProductPage');
        Route::patch('/edit_product/{product}','editProduct')
            ->name('changeProduct');
    });
    
    Route::controller(ShopController::class)->group(function() {
        Route::get('/add-product','addProductPage');
        Route::post('/add_product','addProduct')
            ->name("productSave");
        Route::get('/products','allProducts');
    });
    
});