<?php

use App\Exports\PromotionsExport;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Promotion\PromotionController;
use App\Http\Controllers\Admin\Statistical\StatisticalController;
use App\Http\Controllers\Admin\DishController as AdminDishController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Comment\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\UserController as AuthUserController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Table\TableController as TableTableController;
use App\Http\Controllers\Admin\Table\TableBookController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ErrorController;
use App\Http\Controllers\Client\Cart\CartController;
use App\Http\Controllers\Client\Checkout\CheckoutController;
use App\Http\Controllers\Client\About\AboutController;
use App\Http\Controllers\Client\Auth\AccountController;
use App\Http\Controllers\Client\Auth\LoginController;
use App\Http\Controllers\Client\Dish\DishController;
use App\Http\Controllers\Client\Review\ReviewController;
use App\Http\Controllers\Client\Blog\BlogController;
use App\Http\Controllers\Client\Blog\BlogDetailController;
use App\Http\Controllers\Client\Contact\ContactController;
use App\Http\Controllers\Client\Gallery\GalleryController;
use App\Http\Controllers\Client\Table\TableController as ClientTableController;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Supplier\SupplierController;
use App\Http\Controllers\Admin\Ingredient\IngredientController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;

Route::get('/promotions/export', function () {
    return Excel::download(new PromotionsExport, 'promotions.xlsx');
})->name('promotions.export');
Route::get('/categories/export', function () {
    return Excel::download(new CategoriesExport, 'categories.xlsx');
})->name('categories.export');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('chi-tiet-mon-an/{id}', [DishController::class, 'dishDetail'])->name('dishDetail');
Route::post('/dish/{id}/review', [ReviewController::class, 'store'])->name('reviews.store');
Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
Route::get('menu', [DishController::class, 'menu'])->name('menu');
Route::get('gioi-thieu', [AboutController::class, 'index'])->name('about');
Route::get('404', [ErrorController::class, 'index']);

Route::get('tai-khoan', [AccountController::class, 'index'])->name('account');
Route::get('lien-he', [ContactController::class, 'index'])->name('contact');

Route::get('thanh-toan', [CheckoutController::class, 'index'])->name('checkout');
Route::get('gio-hang', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::post('them-gio-hang', [CartController::class, 'addToCart'])->name('cartAdd')->middleware('auth');
Route::delete('gio-hang/{id}', [CartController::class, 'remove'])->name('cartRemove')->middleware('auth');
Route::delete('cart/clear', [CartController::class, 'clear'])->name('cart.clear')->middleware('auth');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::post('nhap-ma-uu-dai', [CartController::class, 'applyDiscountCode'])->name('applyDiscountCode')->middleware('auth');
Route::get('thanh-toan', [CheckoutController::class, 'index'])->name('checkout');
Route::post('thanh-toan', [CheckoutController::class, 'checkout'])->name('checkout.store');
Route::post('thanh-toan/tien-hanh', [CheckoutController::class, 'processPayment'])->name('payment.process');
Route::get('/vnpay/return', [PaymentController::class, 'vnpayReturn'])->name('vnpay.return');
Route::post('/check-table-availability', [CartController::class, 'checkTableAvailability'])->name('check.table.availability');

//account
Route::middleware(['auth'])->group(function () {
    Route::name('account.')->middleware('auth')->group(function () {
        Route::get('account', [AccountController::class, 'index'])->name('index');
        Route::put('account/update/{id}', [AccountController::class, 'update'])->name('update');
        Route::get('account/show/{id}', [AccountController::class, 'show'])->name('show');
        Route::post('account/orders/cancel/{id}', [AccountController::class, 'cancelOrder'])->name('orders.cancel');
    });
});

Route::get('dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');
Route::middleware(['auth'])->group(function () {
    Route::get('admin', [StatisticalController::class, 'index'])->name('statistical.index')->middleware(['auth', 'role:admin']);
    Route::get('statistical/revenue-chart', [StatisticalController::class, 'revenueChart'])->name('statistical.revenue.chart');
    Route::get('admin/statistical/export', [StatisticalController::class, 'export'])->name('statistical.export');
    Route::get('admin/statistical/export-dates', [StatisticalController::class, 'exportStatisticalDates'])->name('statistical.export.dates');
    Route::get('admin/statistical/export-monthly', [StatisticalController::class, 'exportStatisticalMonths'])->name('statistical.export.monthly');
})->middleware(['auth', 'role:admin']);
// login
Route::get('admin/login', [AuthUserController::class, 'login'])->name('admin.login');
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('auth.google.callback');

Route::name('dish.')->group(function () {
    Route::get('dish', [AdminDishController::class, 'list'])->name('list')->middleware(['auth', 'role:admin,staff']);
    Route::get('dish/add', [AdminDishController::class, 'add'])->name('add')->middleware(['auth', 'role:admin,staff']);
    Route::post('dish/store', [AdminDishController::class, 'store'])->name('store')->middleware(['auth', 'role:admin,staff']);
    Route::get('dish/edit/{slug}', [AdminDishController::class, 'edit'])->name('edit')->middleware(['auth', 'role:admin,staff']);
    Route::put('dish/update/{slug}', [AdminDishController::class, 'update'])->name('update')->middleware(['auth', 'role:admin,staff']);
    Route::delete('dish/delete/{slug}', [AdminDishController::class, 'delete'])->name('delete')->middleware(['auth', 'role:admin,staff']);


    Route::get('dish/ingredients/{slug}', [AdminDishController::class, 'manageIngredients'])->name('ingredients')->middleware(['auth', 'role:admin,staff']);

    Route::post('dish/ingredients/{slug}/add', [AdminDishController::class, 'storeIngredient'])->name('addIngredient')->middleware(['auth', 'role:admin,staff']);
    Route::post('dish/ingredients/{slug}/{ingredientId}/update', [AdminDishController::class, 'updateIngredientQuantity'])->name('updateIngredientQuantity')->middleware(['auth', 'role:admin,staff']);
    Route::delete('dish/ingredients/{slug}/{ingredientId}', [AdminDishController::class, 'deleteIngredient'])->name('deleteIngredient')->middleware(['auth', 'role:admin,staff']);
})->middleware(['auth', 'role:admin,staff']);


Route::post('payment/store', [PaymentController::class, 'store'])->name('payment.store');


// Order
Route::get('order', [OrderController::class, 'index'])->name('order.list')->middleware(['auth', 'role:admin,staff']);
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.detail')->middleware(['auth', 'role:admin,staff']);
Route::get('/orders/{id}/pdf', [OrderController::class, 'generatePdf'])->name('order.pdf')->middleware(['auth', 'role:admin,staff']);

Route::get('payment', [PaymentController::class, 'index'])->name('payment.list')->middleware(['auth', 'role:admin,staff']);



//user
Route::name('user.')->group(function () {
    Route::get('user/list', [UserController::class, 'index'])->name('list')->middleware(['auth', 'role:admin']);
    Route::get('user/create', [UserController::class, 'create'])->name('create')->middleware(['auth', 'role:admin']);
    Route::post('user/store', [UserController::class, 'store'])->name('store')->middleware(['auth', 'role:admin']);
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('edit')->middleware(['auth', 'role:admin']);
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('update')->middleware(['auth', 'role:admin']);
    Route::delete('user/delete/{id}', [UserController::class, 'destroy'])->name('destroy')->middleware(['auth', 'role:admin']);
})->middleware(['auth', 'role:admin']);



// // post
// Route::name('post.')->group(function () {
//     Route::get('post/list', [PostController::class, 'index'])->name('list')->middleware(['auth', 'role:admin,staff']);
//     Route::get('post/create', [PostController::class, 'create'])->name('create')->middleware(['auth', 'role:admin,staff']);
//     Route::post('post/store', [PostController::class, 'store'])->name('store')->middleware(['auth', 'role:admin,staff']);
//     Route::get('post/edit/{id}', [PostController::class, 'edit'])->name('edit')->middleware(['auth', 'role:admin,staff']);
//     Route::put('post/update/{id}', [PostController::class, 'update'])->name('update')->middleware(['auth', 'role:admin,staff']);
//     Route::delete('post/delete/{id}', [PostController::class, 'destroy'])->name('destroy')->middleware(['auth', 'role:admin,staff']);
// })->middleware(['auth', 'role:admin,staff']);



//Category
Route::name('category.')->group(function () {
    Route::get('category', [CategoryController::class, 'list'])->name('list')->middleware(['auth', 'role:admin,staff']);
    Route::get('category/add', [CategoryController::class, 'add'])->name('add')->middleware(['auth', 'role:admin,staff']);
    Route::post('category/store', [CategoryController::class, 'store'])->name('store')->middleware(['auth', 'role:admin,staff']);
    Route::get('/categories/edit/{id}', [CategoryController::class, 'update'])->name('update')->middleware(['auth', 'role:admin,staff']);
    Route::post('/categories/update/{id}', [CategoryController::class, 'processUpdate'])->name('processUpdate')->middleware(['auth', 'role:admin,staff']);
    Route::delete('category/{id}', [CategoryController::class, 'delete'])->name('delete')->middleware(['auth', 'role:admin,staff']);
})->middleware(['auth', 'role:admin,staff']);


//Promotion
Route::name('promotion.')->group(function () {
    Route::get('promotion/list', [PromotionController::class, 'list'])->name('list')->middleware(['auth', 'role:admin']);
    Route::get('promotion/add', [PromotionController::class, 'add'])->name('add')->middleware(['auth', 'role:admin']);
    Route::post('promotion/store', [PromotionController::class, 'store'])->name('store')->middleware(['auth', 'role:admin']);
    Route::get('/promotion/edit/{id}', [PromotionController::class, 'update'])->name('update')->middleware(['auth', 'role:admin']);
    Route::post('/promotion/update/{id}', [PromotionController::class, 'processUpdate'])->name('processUpdate')->middleware(['auth', 'role:admin']);
    Route::delete('promotion/{id}', [PromotionController::class, 'delete'])->name('delete')->middleware(['auth', 'role:admin']);
})->middleware(['auth', 'role:admin']);


//comment
Route::get('comment', [CommentController::class, 'index'])->name('comment.list')->middleware(['auth', 'role:admin']);


Route::name('supplier.')->prefix('supplier')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('list'); // Hiển thị danh sách nhà cung cấp
    Route::get('/create', [SupplierController::class, 'create'])->name('create'); // Hiển thị form tạo nhà cung cấp mới
    Route::post('/', [SupplierController::class, 'store'])->name('store'); // Lưu nhà cung cấp mới
    Route::get('/{supplier}', [SupplierController::class, 'show'])->name('show'); // Hiển thị chi tiết một nhà cung cấp
    Route::get('/{supplier}/edit', [SupplierController::class, 'edit'])->name('edit'); // Hiển thị form chỉnh sửa nhà cung cấp
    Route::put('/{supplier}', [SupplierController::class, 'update'])->name('update'); // Cập nhật thông tin nhà cung cấp
    Route::delete('/delete/{id}', [SupplierController::class, 'destroy'])->name('destroy'); // Xóa nhà cung cấp
});


Route::name('ingredient.')->prefix('ingredient')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [IngredientController::class, 'index'])->name('list'); // Danh sách nguyên liệu
    Route::get('/create', [IngredientController::class, 'create'])->name('create'); // Hiển thị form tạo nguyên liệu mới
    Route::post('/store', [IngredientController::class, 'store'])->name('store'); // Lưu nguyên liệu mới
    Route::get('/{ingredient}/edit', [IngredientController::class, 'edit'])->name('edit'); // Hiển thị form chỉnh sửa nguyên liệu
    Route::put('/{ingredient}', [IngredientController::class, 'update'])->name('update'); // Cập nhật thông tin nguyên liệu
    Route::delete('/delete/{id}', [IngredientController::class, 'destroy'])->name('destroy'); // Xóa nguyên liệu


    // Route cho việc nhập nguyên liệu từ nhà cung cấp
    Route::get('/entry', [IngredientController::class, 'showEntryForm'])->name('entryForm'); // Hiển thị form nhập nguyên liệu
    Route::post('/entry', [IngredientController::class, 'storeEntry'])->name('storeEntry'); // Lưu nhập nguyên liệu

    Route::get('/entry/list', [IngredientController::class, 'showEntryList'])->name('entry.list'); // Danh sách lịch sử nhập nguyên liệu

});



// Route::middleware(['web'])->group(function () {
//     Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
//     Route::post('/store-checkout-details', [CartController::class, 'storeCheckoutDetails'])->name('storeCheckoutDetails');
// });

Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'processPayment'])->name('payment.process');




// Route hiển thị chi tiết đơn hàng
Route::get('/admin/order/{id}', [OrderController::class, 'show'])->name('admin.order.show');

// Route cập nhật trạng thái đơn hàng
Route::post('/admin/order/{id}/update-status', [OrderController::class, 'updateStatus'])->name('admin.order.updateStatus');





Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('admin', [AdminLoginController::class, 'admin'])->name('admin.index')->middleware('auth');


    Route::post('/logout', [AdminLoginController::class, 'logoutAdmin'])->name('admin.logout');
});


// Route::get('/dashboard', [AdminLoginController::class, 'dashboard'])
//     ->name('admin.dashboard')
//     ->middleware(['auth', 'check.admin']);