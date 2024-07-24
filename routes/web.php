<?php

use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ChangelogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CheckoutController;



// Route::get('/', function () {
//     return view('welcome');
// });

// Ensure that the route from the layout
Route::get('/', [AppController::class,'index'])->name('app.index');
Route::get('/about',[AboutController::class,'index'])->name('about.index');
Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/product/{slug}',[ShopController::class,'productDetails'])->name('shop.product.details');
Route::get('/cart-wishlist-count',[ShopController::class,'getCartAndWishlistCount'])->name('shop.cart.wishlist.count');
Route::get('/credits', function () {
    return view('credits');
});


//CART
Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::post('/cart/store',[CartController::class,'addToCart'])->name('cart.store'); // Add to Cart from details page
Route::put('/cart/update',[CartController::class,'updateCart'])->name('cart.update'); // Updating product quantity
// Delete and clear Cart item
Route::delete('/cart/remove', [CartController::class, 'removeItem'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

// WISHLIST
// Get all wishlist list
Route::get('/wishlist',[WishlistController::class,'getWishlistedProducts'])->name('wishlist.list');
// Add product to wishlist
Route::post('/wishlist/add',[WishlistController::class,'addProductToWishlist'])->name('wishlist.store');
// Delete and clearthe product from the wishlist items
Route::delete('/wishlist/remove',[WishlistController::class,'removeProductFromWishlist'])->name('wishlist.remove');
Route::delete('/wishlist/clear',[WishlistController::class,'clearWishlist'])->name('wishlist.clear');
// Move wishlist product to cart 
Route::post('/wishlist/move-to-cart', [WishlistController::class,'moveToCart'])->name('wishlist.move.to.cart');

// Redirect to the Index page once the user is login/register.
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Default user(customer) access
Route::middleware('auth')->group(function(){
    Route::get('/my-account',[UserController::class,'index'])->name('user.index');
    Route::get('/profile', [UserController::class,'showProfile'])->name('profile.detail')->middleware('auth');


});

// ADMIN access
Route::middleware(['auth','auth.admin'])->group(function(){
    // GET the admin dashboard
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');

    // CATEGORY CRUD operations
    Route::get('/admin/categories/create', [CategoryController::class, 'createCategory'])->name('admin.categories.create'); // GET the create form
    Route::post('/admin/categories', [CategoryController::class, 'storeNewCategory'])->name('admin.categories.store'); // ADD new category
    Route::get('/admin/categories', [CategoryController::class, 'listCategories'])->name('admin.categories.index'); // GET all the lists
    Route::get('/admin/categories/{category}', [CategoryController::class, 'detailCategory'])->name('admin.categories.detail'); // GET category details
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'editCategory'])->name('admin.categories.edit'); // GET the edit form
    Route::put('/admin/categories/{category}', [CategoryController::class, 'updateCategory'])->name('admin.categories.update'); // UPDATE the category details
    Route::get('/admin/categories/{category}/delete', [CategoryController::class, 'showDeleteConfirmation'])->name('admin.categories.delete'); // DELETE confirmation page
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'deleteCategory'])->name('admin.categories.destroy'); // DELETE category

    // BRAND CRUD operations
    Route::get('/admin/brands/create', [BrandController::class, 'createBrand'])->name('admin.brands.create'); // GET the brand create form
    Route::post('/admin/brands', [BrandController::class, 'storeNewBrand'])->name('admin.brands.store'); // ADD new brand
    Route::get('/admin/brands', [BrandController::class, 'listBrands'])->name('admin.brands.index'); // GET all the lists
    Route::get('/admin/brands/{brand}', [BrandController::class, 'detailBrand'])->name('admin.brands.detail'); // GET brand details
    Route::get('/admin/brands/{brand}/edit', [BrandController::class, 'editBrand'])->name('admin.brands.edit'); // GET the edit form
    Route::put('/admin/brands/{brand}', [BrandController::class, 'updateBrand'])->name('admin.brands.update'); // UPDATE the brand detail
    Route::get('/admin/brands/{brand}/delete', [BrandController::class, 'showDeleteConfirmation'])->name('admin.brands.delete'); // DELETE confirmation page
    Route::delete('/admin/brands/{brand}', [BrandController::class, 'deleteBrand'])->name('admin.brands.destroy'); // DELETE brand

    // FEATURE CRUD operations
    Route::get('/admin/features/create', [FeatureController::class, 'createFeature'])->name('admin.features.create'); // GET the create form
    Route::post('/admin/features', [FeatureController::class, 'storeNewFeature'])->name('admin.features.storeNewFeature'); // ADD new feature
    Route::get('/admin/features', [FeatureController::class, 'listFeatures'])->name('admin.features.index'); // GET all the lists
    Route::get('/admin/features/{feature}', [FeatureController::class, 'detailFeature'])->name('admin.features.detail'); // GET feature details
    Route::get('/admin/features/{feature}/edit', [FeatureController::class, 'editFeature'])->name('admin.features.edit'); // GET the edit form
    Route::put('/admin/features/{feature}', [FeatureController::class, 'updateFeature'])->name('admin.features.update'); // UPDATE the feature details
    Route::get('/admin/features/{feature}/delete', [FeatureController::class, 'showDeleteConfirmation'])->name('admin.features.delete'); // DELETE confirmation page
    Route::delete('/admin/features/{feature}', [FeatureController::class, 'deleteFeature'])->name('admin.features.destroy'); // DELETE feature

    // PRODUCT CRUD operations
    Route::get('/admin/products/create', [ProductController::class, 'createProduct'])->name('admin.products.create'); // GET the create product form
    Route::post('/admin/products', [ProductController::class, 'storeNewProduct'])->name('admin.products.storeNewProduct'); // ADD new product
    Route::get('/admin/products', [ProductController::class, 'listProducts'])->name('admin.products.index'); // GET all products
    Route::get('/admin/products/{slug}', [ProductController::class, 'detailProduct'])->name('admin.products.detail'); // GET product details
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'editProduct'])->name('admin.products.edit'); // GET the edit product form
    Route::put('/admin/products/{product}', [ProductController::class, 'updateProduct'])->name('admin.products.update'); // UPDATE the product detail
    Route::get('/admin/products/{product}/delete', 
    [ProductController::class, 'showDeleteConfirmation'])->name('admin.products.delete'); // DELETE product confirmation page
    Route::delete('/admin/products/{product}', [ProductController::class, 'deleteProduct'])->name('admin.products.destroy'); // DELETE product

    // CHANGELOG operations for displaying and deleting the changelogs for admin only
    Route::get('/admin/changelogs', [ChangelogController::class, 'index'])->name('admin.changelogs.index'); // GET all the lists
    Route::get('/admin/changelogs/{changelog}', [ChangelogController::class, 'changelogDetails'])->name('admin.changelogs.detail'); // GET changelog details
    Route::get('/admin/changelogs/{changelog}/delete', 
    [ChangelogController::class, 'showDeleteConfirmation'])->name('admin.changelogs.delete'); // DELETE confirmation page
    Route::delete('/admin/changelogs/{changelog}', [ChangelogController::class, 'deleteChangelog'])->name('admin.changelogs.destroy'); // DELETE changelog
    

    // ORDER views and delete
    Route::get('/admin/brands/create', [BrandController::class, 'createBrand'])->name('admin.brands.create'); // GET the brand create form
    Route::post('/admin/brands', [BrandController::class, 'storeNewBrand'])->name('admin.brands.store'); // ADD new brand
    Route::get('/admin/brands', [BrandController::class, 'listBrands'])->name('admin.brands.index'); // GET all the lists
    Route::get('/admin/brands/{brand}', [BrandController::class, 'detailBrand'])->name('admin.brands.detail'); // GET brand details
    Route::get('/admin/brands/{brand}/edit', [BrandController::class, 'editBrand'])->name('admin.brands.edit'); // GET the edit form
    Route::put('/admin/brands/{brand}', [BrandController::class, 'updateBrand'])->name('admin.brands.update'); // UPDATE the brand detail
    Route::get('/admin/brands/{brand}/delete', [BrandController::class, 'showDeleteConfirmation'])->name('admin.brands.delete'); // DELETE confirmation page
    Route::delete('/admin/brands/{brand}', [BrandController::class, 'deleteBrand'])->name('admin.brands.destroy'); // DELETE brand


});


// Manager access
Route::middleware(['auth.manager'])->group(function(){
    Route::get('/manager',[ManagerController::class,'index'])->name('manager.index');

    // CRUD operations for managing admin users 
    Route::get('/manager/admins/create', [ManagerController::class, 'createAdmin'])->name('manager.admins.create'); // Create form
    Route::post('/manager/admins', [ManagerController::class, 'storeNewAdmin'])->name('manager.admins.storeNewAdmin'); // Add new admin
    Route::get('/manager/admins/index', [ManagerController::class, 'listAdmins'])->name('manager.admins.index'); // List admins
    Route::get('/manager/admins/{id}', [ManagerController::class, 'showAdmin'])->name('manager.admins.view'); // Show admin details
    Route::get('/manager/admins/edit/{id}', [ManagerController::class, 'editAdmin'])->name('manager.admins.edit'); // Display edit form
    Route::put('/manager/admins/{id}', [ManagerController::class, 'updateAdmin'])->name('manager.admins.update'); // Edit admin
    Route::get('/manager/admins/{id}/delete', [ManagerController::class, 'showDeleteConfirmation'])->name('manager.admins.delete_confirmation'); // Show delete confirmation
    Route::delete('/manager/admins/delete/{id}', [ManagerController::class, 'deleteAdmin'])->name('manager.admins.delete'); // Delete admin
});

