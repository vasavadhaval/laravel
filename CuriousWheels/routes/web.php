<?php
use App\Http\Middleware\CheckUserRole;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\loginUserController;
use App\Http\Controllers\UserDocumentController;


use App\Http\Controllers\VehicleLocationController;



use App\Http\Controllers\frontend\UserHomeController;
use App\Http\Controllers\frontend\StripeController;
use App\Http\Controllers\frontend\VehiclesController as PublicVehicleController;


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

// Route::get('/', function () {
//     return view('frontend.home');
// });
Route::get('/', [UserHomeController::class, 'index'])->name('user.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::post('/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');
Route::get('/success', [StripeController::class, 'success'])->name('stripe.success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');

Route::post('/create-order', [PaymentController::class, 'createOrder'])->name('create.order');
Route::post('/handle-callback', [PaymentController::class, 'handleCallback'])->name('handle.callback');

Route::get('/vehicles', [PublicVehicleController::class, 'index'])->name('public.vehicles.index');
Route::get('/vehicles/{id}', [PublicVehicleController::class, 'show'])->name('public.vehicles.show');
Route::get('/vehicle-types/{id}', [PublicVehicleController::class, 'vehicle_types'])->name('public.vehicle_types.show');
Route::get('/search', [PublicVehicleController::class, 'search'])->name('public.vehicles.search');

Route::get('/checkout/{vehicle}', [CheckoutController::class, 'show'])->name('checkout.show');



// Route for displaying the booking form
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');

// Route for storing the booking data
// Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/user-documents', [UserDocumentController::class, 'store']);
    Route::get('/user-documents', [UserDocumentController::class, 'index']);

});

Route::middleware(['auth', 'role:admin'])->group(function () {


    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/bookings/today', [AdminController::class, 'todayBookings'])->name('admin.bookings.today');

    Route::get('admin/all-documents', [UserDocumentController::class, 'allDocuments']);
    Route::put('admin/documents/{documentId}/approval-status', [UserDocumentController::class, 'updateApprovalStatus']);

    Route::prefix('admin/vehicles')->name('admin.vehicles.')->group(function () {
        Route::get('/', [VehicleController::class, 'index'])->name('index');
        Route::post('/store', [VehicleController::class, 'store'])->name('store');
        Route::get('/create', [VehicleController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [VehicleController::class, 'edit'])->name('edit'); // Edit route
        Route::put('/{id}', [VehicleController::class, 'update'])->name('update'); // Update route
        Route::delete('/{id}', [VehicleController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [VehicleController::class, 'show'])->name('show');
    });
    Route::prefix('admin/vehicle-types')->name('admin.vehicle_types.')->group(function () {
        Route::get('/', [VehicleTypeController::class, 'index'])->name('index');
        Route::get('/create', [VehicleTypeController::class, 'create'])->name('create');
        Route::post('/store', [VehicleTypeController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [VehicleTypeController::class, 'edit'])->name('edit');
        Route::put('/{id}', [VehicleTypeController::class, 'update'])->name('update');
        Route::delete('/{id}', [VehicleTypeController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [VehicleTypeController::class, 'show'])->name('show');
    });

    Route::prefix('admin/vehicle-locations')->name('admin.vehicle_locations.')->group(function () {
        Route::get('/', [VehicleLocationController::class, 'index'])->name('index');
        Route::get('/create', [VehicleLocationController::class, 'create'])->name('create');
        Route::post('/store', [VehicleLocationController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [VehicleLocationController::class, 'edit'])->name('edit');
        Route::put('/{id}', [VehicleLocationController::class, 'update'])->name('update');
        Route::delete('/{id}', [VehicleLocationController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [VehicleLocationController::class, 'show'])->name('show');
    });


    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
        Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    });
    Route::prefix('admin/blogs')->name('admin.blogs.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::get('/create', [BlogController::class, 'create'])->name('create');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('edit');
        Route::put('/{id}', [BlogController::class, 'update'])->name('update');
        Route::delete('/{id}', [BlogController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [BlogController::class, 'show'])->name('show');
    });
    Route::prefix('admin/document-types')->name('admin.document_types.')->group(function () {
        Route::get('/', [DocumentTypeController::class, 'index'])->name('index');
        Route::get('/create', [DocumentTypeController::class, 'create'])->name('create');
        Route::post('/store', [DocumentTypeController::class, 'store'])->name('store');
        Route::get('/{documentType}/edit', [DocumentTypeController::class, 'edit'])->name('edit');
        Route::put('/{documentType}', [DocumentTypeController::class, 'update'])->name('update');
        Route::delete('/{documentType}', [DocumentTypeController::class, 'destroy'])->name('destroy');
        // Optional route for showing a document type (if needed)
        // Route::get('/{documentType}', [DocumentTypeController::class, 'show'])->name('show');
    });

    Route::prefix('admin/user-documents')->name('admin.user_documents.')->group(function () {
        Route::get('/', [UserDocumentController::class, 'index'])->name('index');
        Route::get('/create', [UserDocumentController::class, 'create'])->name('create');
        Route::post('/store', [UserDocumentController::class, 'store'])->name('store');
        Route::get('/{user_document}/edit', [UserDocumentController::class, 'edit'])->name('edit');
        Route::put('/{user_document}', [UserDocumentController::class, 'update'])->name('update');
        Route::delete('/{user_document}', [UserDocumentController::class, 'destroy'])->name('destroy');
        // Optional route for showing a user document (if needed)
        // Route::get('/{user_document}', [UserDocumentController::class, 'show'])->name('show');
    });
    Route::prefix('admin/bookings')->name('admin.bookings.')->group(function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::delete('/{id}', [BookingController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [BookingController::class, 'show'])->name('show');
        Route::put('/{booking}/change-status', [BookingController::class, 'changeStatus'])->name('changeStatus');

    });
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [loginUserController::class, 'index'])->name('user.dashboard');

    Route::prefix('user/bookings')->name('user.bookings.')->group(function () {
        Route::get('/', [BookingController::class, 'userindex'])->name('index');
        Route::delete('/{id}', [BookingController::class, 'userdestroy'])->name('destroy');
        Route::get('/{id}', [BookingController::class, 'usershow'])->name('show');
    });
    Route::prefix('user/documents')->name('user.documents.')->group(function () {
        Route::get('/', [UserDocumentController::class, 'user_index'])->name('index');
        Route::get('/create', [UserDocumentController::class, 'user_create'])->name('create');
        Route::post('/store', [UserDocumentController::class, 'user_store'])->name('store');
        Route::get('/{user_document}/edit', [UserDocumentController::class, 'user_edit'])->name('edit');
        Route::put('/{user_document}', [UserDocumentController::class, 'user_update'])->name('update');
        Route::delete('/{user_document}', [UserDocumentController::class, 'user_destroy'])->name('destroy');
    });

});
Route::get('bookings/{booking}/download-invoice', [BookingController::class, 'downloadInvoice'])->name('bookings.downloadInvoice');

Route::middleware(['auth', 'role:driver'])->group(function () {
    Route::get('/driver/dashboard', [loginriverController::class, 'index'])->name('driver.dashboard');
});

require __DIR__.'/auth.php';
