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

    Route::post('/send-contact',[ContactController::class,'sendContact'])
        ->name('addContact');
    Route::get('/edit-contacts/{contactId}', [ContactController::class,'editContactPage'])
        ->name('changeContactPage');
    Route::patch('/edit_contacts/{contactId}', [ContactController::class,'editContact'])
        ->name('changeContact');
    Route::get('/all-contacts',[ContactController::class,'allContacts'])
        ->name('all_contacts');
    Route::get('/all-products', [ProductController::class, 'index'])
        ->middleware('auth')
        ->name('allProducts');
    Route::get('/delete-product/{product}', [ProductController::class, 'delete'])
        ->name("productDelete");
    Route::get('/delete-contact/{contact}', [ContactController::class, 'delete'])
        ->name("contactDelete");
    Route::get('/add-product',[ShopController::class,'addProductPage']);
    Route::post('/add_product',[ShopController::class,'addProduct'])
        ->name("productSave");
    Route::get('/products',[ShopController::class,'allProducts']);
    Route::get('/edit-products/{productId}', [ProductController::class,'editProductPage'])
        ->name('changeProductPage');
    Route::patch('/edit_product/{productId}', [ProductController::class,'editProduct'])
        ->name('changeProduct');

});