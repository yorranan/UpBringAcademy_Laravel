<?php


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GratificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionsController;
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

//Soft-ui
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', [DashboardController::class, 'create'])->name('dashboard');
	Route::get('dashboardTask', [DashboardController::class, 'geTask'])->name('dashboardGetTask');
	Route::get('profile', function () {return view('profile');})->name('profile');
	Route::get('user-management', [InfoUserController::class, 'create'])->name('user-management');
	Route::get('tables', function () {return view('tables');})->name('tables');
    Route::get('static-sign-in', function () {return view('static-sign-in');})->name('sign-in');
    Route::get('static-sign-up', function () {return view('static-sign-up');})->name('sign-up');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {return view('dashboard');})->name('sign-up');
	
	Route::get('/create-task', [TaskController::class, 'create'])->name('create-task');
	Route::get('/add-task', [TaskController::class, 'add'])->name('add-task');
	Route::get('/edit-task/{id}', [TaskController::class, 'edit'])->name('edit-task');
	Route::post('/update-task/{id}', [TaskController::class, 'update'])->name('update-task');
	Route::get('/delete-task/{id}', [TaskController::class, 'delete'])->name('delete-task');
	Route::post('/task-store', [TaskController::class, 'store'])->name('task-store');
	
	Route::get('/create-gratification', [GratificationController::class, 'create'])->name('create-gratification');
	Route::post('/gratification-store', [GratificationController::class, 'store'])->name('gratification-store');
    Route::get('/add-gratification', [GratificationController::class, 'add'])->name('add-gratification');
	Route::get('/edit-gratification/{id}', [GratificationController::class, 'edit'])->name('edit-gratification');
	Route::post('/update-gratification/{id}', [GratificationController::class, 'update'])->name('update-gratification');
	Route::get('/delete-gratification/{id}', [GratificationController::class, 'delete'])->name('delete-gratification');

	Route::get('/new-user', [CreateTaskController::class, 'store'])->name('new-user'); //mudar
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store'])->name('session');
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {return view('session/login-session');})->name('login');
