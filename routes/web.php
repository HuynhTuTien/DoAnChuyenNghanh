<?php

use App\Exports\PromotionsExport;
use App\Exports\CategoriesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Promotion\PromotionController;
use App\Http\Controllers\Admin\Statistical\StatisticalController;
use App\Http\Controllers\Admin\DishController as AdminDishController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Comment\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\UserController as AuthUserController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ErrorController;
use App\Http\Controllers\Client\Cart\CartController;
use App\Http\Controllers\Client\Checkout\CheckoutController;
use App\Http\Controllers\Client\About\AboutController;
use App\Http\Controllers\Client\Auth\AccountController;
use App\Http\Controllers\Client\Auth\LoginController;
use App\Http\Controllers\Client\Auth\ForgotPasswordController;
use App\Http\Controllers\Client\Dish\DishController;
use App\Http\Controllers\Client\Review\ReviewController;
use App\Http\Controllers\Client\Contact\ContactController;
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

Route::get('gio-hang', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::post('them-gio-hang', [CartController::class, 'addToCart'])->name('cartAdd')->middleware('auth');

Route::delete('/gio-hang/{itemId}', [CartController::class, 'removeFromCart'])->name('cart.remove')->middleware('auth');

Route::delete('cart/clear', [CartController::class, 'clear'])->name('cart.clear')->middleware('auth');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::post('nhap-ma-uu-dai', [CartController::class, 'applyDiscountCode'])->name('applyDiscountCode')->middleware('auth');

Route::get('/vnpay/return', [PaymentController::class, 'vnpayReturn'])->name('vnpay.return');
Route::post('/check-table-availability', [CartController::class, 'checkTableAvailability'])->name('check.table.availability');

//account
Route::middleware(['auth'])->group(function () {
    Route::name('account.')->middleware('auth')->group(function () {
        Route::get('account', [AccountController::class, 'index'])->name('index');
        Route::put('account/update/{id}', [AccountController::class, 'update'])->name('update');
        Route::get('account/show/{id}', [AccountController::class, 'show'])->name('show');
        Route::post('account/orders/cancel/{id}', [AccountController::class, 'cancelOrder'])->name('orders.cancel');
        // Add the route to show user's orders
        Route::get('account/orders', [AccountController::class, 'showOrders'])->name('orders');
    });
});

Route::post('payment/store', [PaymentController::class, 'store'])->name('payment.store');



// Promotion
Route::name('promotion.')->middleware(['auth:admin', 'role:admin,staff'])->group(function () {
    Route::get('promotion/list', [PromotionController::class, 'list'])->name('list');  // Danh sách khuyến mãi
    Route::get('promotion/add', [PromotionController::class, 'add'])->name('add');    // Form thêm khuyến mãi
    Route::post('promotion/store', [PromotionController::class, 'store'])->name('store');  // Lưu khuyến mãi
    Route::get('/promotion/edit/{id}', [PromotionController::class, 'update'])->name('update');  // Form sửa khuyến mãi
    Route::post('/promotion/update/{id}', [PromotionController::class, 'processUpdate'])->name('processUpdate');  // Cập nhật khuyến mãi
    Route::delete('promotion/{id}', [PromotionController::class, 'delete'])->name('delete');  // Xóa khuyến mãi
});

// Order
Route::middleware(['auth:admin', 'role:admin,staff'])->group(function () {
    Route::get('order', [OrderController::class, 'index'])->name('order.list');  // Danh sách đơn hàng
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.detail');  // Chi tiết đơn hàng
    Route::get('/orders/{id}/pdf', [OrderController::class, 'generatePdf'])->name('order.pdf');  // Tạo PDF đơn hàng
});

// Payment
Route::middleware(['auth:admin', 'role:admin,staff'])->group(function () {
    Route::get('payment', [PaymentController::class, 'index'])->name('payment.list');  // Danh sách thanh toán
});

//comment
Route::get('comment', [CommentController::class, 'index'])->name('comment.list')->middleware(['auth:admin', 'role:admin,staff']);

Route::name('supplier.')->prefix('supplier')->middleware(['auth:admin', 'role:admin,staff'])->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('list'); // Hiển thị danh sách nhà cung cấp
    Route::get('/create', [SupplierController::class, 'create'])->name('create'); // Hiển thị form tạo nhà cung cấp mới
    Route::post('/', [SupplierController::class, 'store'])->name('store'); // Lưu nhà cung cấp mới
    Route::get('/{supplier}', [SupplierController::class, 'show'])->name('show'); // Hiển thị chi tiết một nhà cung cấp
    Route::get('/{supplier}/edit', [SupplierController::class, 'edit'])->name('edit'); // Hiển thị form chỉnh sửa nhà cung cấp
    Route::put('/{supplier}', [SupplierController::class, 'update'])->name('update'); // Cập nhật thông tin nhà cung cấp
    Route::delete('/delete/{id}', action: [SupplierController::class, 'destroy'])->name('destroy'); // Xóa nhà cung cấp
});


Route::name('ingredient.')->prefix('ingredient')->middleware(['auth:admin', 'role:admin,staff'])->group(function () {
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



//Tiến hành thanh toán
Route::get('thanh-toan', [CheckoutController::class, 'index'])->name('checkout');
Route::get('thanh-toan', [CheckoutController::class, 'index'])->name('checkout');
Route::post('thanh-toan', [CheckoutController::class, 'checkout'])->name('checkout.store');
Route::get('thanh-toan', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('thanh-toan/tien-hanh', [CheckoutController::class, 'processPayment'])->name('payment.process');
Route::post('/checkout', [CheckoutController::class, 'processPayment'])->name('payment.process');
Route::get('/order-success', [CheckoutController::class, 'orderSuccess'])->name('order.success');

//----------------------------------------------------------------------------------------------------
Route::get('payment/vnpay', [PaymentController::class, 'vnpay'])->name('payment.vnpay');
Route::post('payment/vnpay/return', [PaymentController::class, 'vnpayReturn'])->name('payment.vnpay.return');
Route::post('payment/checkout', [CheckoutController::class, 'processPayment'])->name('payment.checkout');
Route::get('payment/return', [CheckoutController::class, 'paymentReturn'])->name('payment.return');

Route::get('/checkout/vnpay-callback', [CheckoutController::class, 'vnpayCallback'])->name('vnpay.callback');


// Route hiển thị chi tiết đơn hàng
Route::get('/admin/order/{id}', [OrderController::class, 'show'])->name('admin.order.show');

// Route cập nhật trạng thái đơn hàng
Route::post('/admin/order/{id}/update-status', [OrderController::class, 'updateStatus'])->name('admin.order.updateStatus');


Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminLoginController::class, 'logoutAdmin'])->name('admin.logout');
});


Route::middleware('auth:admin')->get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
//Category
Route::name('category.')->group(function () {
    Route::get('category', [CategoryController::class, 'list'])->name('list')
        ->middleware(['auth:admin', 'role:admin,staff']);
    Route::get('category/add', [CategoryController::class, 'add'])->name('add')
        ->middleware(['auth:admin', 'role:admin,staff']);
    Route::post('category/store', [CategoryController::class, 'store'])->name('store')
        ->middleware(['auth:admin', 'role:admin,staff']);
    Route::get('/categories/edit/{id}', [CategoryController::class, 'update'])->name('update')
        ->middleware(['auth:admin', 'role:admin,staff']);
    Route::post('/categories/update/{id}', [CategoryController::class, 'processUpdate'])->name('processUpdate')
        ->middleware(['auth:admin', 'role:admin,staff']);
    Route::delete('category/{id}', [CategoryController::class, 'delete'])->name('delete')
        ->middleware(['auth:admin', 'role:admin,staff']);
});


Route::middleware(['auth:admin', 'role:admin,staff'])->name('dish.')->group(function () {
    Route::get('dish', [AdminDishController::class, 'list'])->name('list');
    Route::get('dish/add', [AdminDishController::class, 'add'])->name('add');
    Route::post('dish/store', [AdminDishController::class, 'store'])->name('store');
    Route::get('dish/edit/{slug}', [AdminDishController::class, 'edit'])->name('edit');
    Route::put('dish/update/{slug}', [AdminDishController::class, 'update'])->name('update');
    Route::delete('dish/delete/{slug}', [AdminDishController::class, 'delete'])->name('delete');

    Route::get('dish/ingredients/{slug}', [AdminDishController::class, 'manageIngredients'])->name('ingredients');
    Route::post('dish/ingredients/{slug}/add', [AdminDishController::class, 'storeIngredient'])->name('addIngredient');
    Route::post('dish/ingredients/{slug}/{ingredientId}/update', [AdminDishController::class, 'updateIngredientQuantity'])->name('updateIngredientQuantity');
    Route::delete('dish/ingredients/{slug}/{ingredientId}', [AdminDishController::class, 'deleteIngredient'])->name('deleteIngredient');

    Route::post('dish/update-quantities', [AdminDishController::class, 'updateDishQuantities'])->name('updateQuantities');
});

Route::middleware(['auth:admin', 'role:admin'])->group(function () {
    Route::get('admin', [StatisticalController::class, 'index'])->name('statistical.index');
    Route::get('statistical/revenue-chart', [StatisticalController::class, 'revenueChart'])->name('statistical.revenue.chart');
    Route::get('admin/statistical/export', [StatisticalController::class, 'export'])->name('statistical.export');
    Route::get('admin/statistical/export-dates', [StatisticalController::class, 'exportStatisticalDates'])->name('statistical.export.dates');
    Route::get('admin/statistical/export-monthly', [StatisticalController::class, 'exportStatisticalMonths'])->name('statistical.export.monthly');
});

// User routes
Route::middleware(['auth:admin', 'role:admin'])->name('user.')->group(function () {
    Route::get('user/list', [UserController::class, 'index'])->name('list');
    Route::get('user/create', [UserController::class, 'create'])->name('create');
    Route::post('user/store', [UserController::class, 'store'])->name('store');

    Route::delete('user/delete/{id}', [UserController::class, 'destroy'])->name('destroy');

    // Xóa nhân viên
    Route::delete('staff/delete/{id}', [UserController::class, 'destroyStaff'])->name('destroyStaff');

    //Sửa staff và admin
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::put('user/update/{id}', [UserController::class, 'update'])->name('update');
});
