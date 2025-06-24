<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ChurchEventController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('logout');
});

// Public Routes
Route::get('/departments', [DepartmentController::class, 'publicIndex'])->name('departments.index');

// Public Attendance Routes
Route::prefix('attendance')->name('attendance.')->group(function () {
    Route::get('/', [AttendanceController::class, 'index'])->name('index');
    Route::get('/member-growth', [AttendanceController::class, 'getMemberGrowth'])->name('member-growth');
    Route::get('/demographics', [AttendanceController::class, 'getDemographics'])->name('demographics');
});

// Public Visitor Routes
Route::prefix('visitors')->name('visitors.')->group(function () {
    Route::get('/', [VisitorController::class, 'index'])->name('index');
    Route::get('/recent', [VisitorController::class, 'recent'])->name('recent');
});

// Protected Routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user', fn () => auth()->user())->name('user.profile');

    // Admin and Senior Pastor Routes
    Route::middleware(['role:admin,senior_pastor'])->group(function () {
        // Members
        Route::controller(MemberController::class)->prefix('members')->name('members.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{member}', 'show')->name('show');
            Route::get('/{member}/edit', 'edit')->name('edit');
            Route::put('/{member}', 'update')->name('update');
            Route::delete('/{member}', 'destroy')->name('destroy');
            Route::get('/birthdays', 'getBirthdays')->name('birthdays');
            Route::post('/import', 'importMembers')->name('import');
        });

        // Attendance Admin Routes
        Route::controller(AttendanceController::class)->prefix('attendances')->name('attendances.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/analytics', 'analytics')->name('analytics');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{attendance}', 'show')->name('show');
            Route::get('/{attendance}/edit', 'edit')->name('edit');
            Route::put('/{attendance}', 'update')->name('update');
            Route::delete('/{attendance}', 'destroy')->name('destroy');
        });

        // Visitors Admin Routes
        Route::controller(VisitorController::class)->prefix('admin/visitors')->name('visitors.admin.')->group(function () {
            Route::get('/', 'adminIndex')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{visitor}', 'show')->name('show');
            Route::get('/{visitor}/edit', 'edit')->name('edit');
            Route::put('/{visitor}', 'update')->name('update');
            Route::delete('/{visitor}', 'destroy')->name('destroy');
        });

        // Events
        Route::resource('events', ChurchEventController::class)->except(['show']);

        // Admin Department Routes
        Route::controller(DepartmentController::class)->prefix('admin/departments')->name('departments.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{department}', 'show')->name('show');
            Route::get('/{department}/edit', 'edit')->name('edit');
            Route::put('/{department}', 'update')->name('update');
            Route::delete('/{department}', 'destroy')->name('destroy');
        });

        // Financials
        Route::resources([
            'incomes' => IncomeController::class,
            'expenses' => ExpenseController::class,
        ]);

        // Users
        Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{user}', 'show')->name('show');
            Route::get('/{user}/edit', 'edit')->name('edit');
            Route::put('/{user}', 'update')->name('update');
            Route::delete('/{user}', 'destroy')->name('destroy');
            Route::post('/{user}/assign-role', 'assignRole')->name('assign-role');
            Route::post('/{user}/remove-role', 'removeRole')->name('remove-role');
        });
    });
});