<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignationsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PreRegisterController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:employee')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/check-in/create_step',[CheckInController::class, 'index'])->name('check-in.create_step');



Route::post('/check-in/store', [CheckInController::class, 'store'])->name('check-in.store');
Route::get('/check-in/photo/{id}', [CheckInController::class, 'showPhotoPage'])->name('check-in.photo');
Route::post('/check-in/{id}/store-photo', [CheckInController::class, 'storePhoto'])->name('check-in.storePhoto');
Route::get('/check-in/id-card/{id}', [CheckInController::class, 'showIdCard'])->name('check-in.id-Card');



Route::post('/visitor/{id}/store-info', [VisitorController::class, 'storeInfo'])->name('visitor.storeInfo');
Route::get('/visitor/{id}/capture-photo', [VisitorController::class, 'capturePhoto'])->name('visitor.capturePhoto');
Route::post('/visitor/{id}/store-photo', [VisitorController::class, 'storePhoto'])->name('visitor.storePhoto');
Route::get('/visitor/havebeenhere', [VisitorController::class, 'showsearch'])->name('visitor.havebeenhere');
Route::get('/visitor/{id}/update-info', [VisitorController::class, 'showedit'])->name('visitor.update-info');
Route::post('/visitor/checkToken', [VisitorController::class, 'checkToken'])->name('visitor.checkToken');


Route::resource('employees', EmployeeController::class);


Route::get('/designations/create', [DesignationsController::class, 'create'])->name('designations.create');
Route::post('/designations', [DesignationsController::class, 'store'])->name('designations.store');
Route::get('/designations', [DesignationsController::class, 'index'])->name('designations.index');
Route::get('/designations/{id}/edit', [DesignationsController::class, 'edit'])->name('designations.edit');
Route::put('/designations/{id}', [DesignationsController::class, 'update'])->name('designations.update');
Route::delete('/designations/{id}', [DesignationsController::class, 'destroy'])->name('designations.destroy');


Route::get('/departments/create', [DepartmentsController::class, 'create'])->name('departments.create');
Route::post('/departments', [DepartmentsController::class, 'store'])->name('departments.store');
Route::get('/departments', [DepartmentsController::class, 'index'])->name('departments.index');
Route::get('/departments/{id}/edit', [DepartmentsController::class, 'edit'])->name('departments.edit');
Route::put('/departments/{id}', [DepartmentsController::class, 'update'])->name('departments.update');
Route::delete('/departments/{id}', [DepartmentsController::class, 'destroy'])->name('departments.destroy');

Route::get('pre-registers', [PreRegisterController::class, 'index'])->name('pre-registers.index');
Route::get('pre-registers/create', [PreRegisterController::class, 'create'])->name('pre-registers.create');
Route::post('pre-registers', [PreRegisterController::class, 'store'])->name('pre-registers.store');
Route::get('pre-registers/{id}', [PreRegisterController::class, 'show'])->name('pre-registers.show');
Route::get('pre-registers/{id}/edit', [PreRegisterController::class, 'edit'])->name('pre-registers.edit');
Route::put('pre-registers/{id}', [PreRegisterController::class, 'update'])->name('pre-registers.update');
Route::delete('pre-registers/{id}', [PreRegisterController::class, 'destroy'])->name('pre-registers.destroy');



Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

Route::middleware(['guest'])->group(function () {

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/password/request', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/password/request', [AuthController::class, 'sendPasswordResetLink']);

Route::get('/employees/create', [EmployeeController::class,'create'])->name('employees.create');
Route::get('/employees', [EmployeeController::class,'index'])->name('employees.index');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');
