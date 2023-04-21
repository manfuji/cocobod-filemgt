<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MedicalController;
use App\Http\Controllers\AppraisalController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PromotionTransferController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('dashboard', function () {
    return view('pages.dashboard');
});

Route::get('generals', function () {
    return view('pages.generals');
});

// Route::get('medicals', function () {
    
// });return view('pages.medicals');

Route::get('trial', function () {
    return view('try');
});

Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'athenticate'])->name('login.user');

Route::middleware(['auth'])->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('logout',[AuthController::class,'logout'])->name('logout_user');
Route::get('employees',[EmployeeController::class,'index'])->name('index');
Route::post('employees',[EmployeeController::class,'store'])->name('employee.store');
Route::get('employees/{id}/edit',[EmployeeController::class,'edit'])->name('employee.edit')->middleware('can:manage_users');
Route::post('employees/{id}/edit',[EmployeeController::class,'update'])->name('employee.update');
Route::get('employees/all',[EmployeeController::class,'fetchEmployees'])->name('fetch.employees');
Route::get('employees/{id}/show',[EmployeeController::class,'show'])->name('show.employees');

Route::get('medicals',[MedicalController::class,'index'])->name('index');
Route::get('medicals/all',[MedicalController::class,'fetchMedicals'])->name('fetch.medicals');
Route::post('medicals',[MedicalController::class,'store'])->name('medical.store');
Route::get('medical/{id}/edit',[MedicalController::class,'edit'])->name('medical.edit')->middleware('can:manage_users');;
Route::post('medical/{id}/edit',[MedicalController::class,'update'])->name('medical.update');
Route::get('medical/{id}/delete',[MedicalController::class,'destroy'])->name('medical.update')->middleware('can:manage_users');;

Route::get('appraisal',[AppraisalController::class,'index'])->name('index');
Route::get('appraisal/all',[AppraisalController::class,'fetchAppraisal'])->name('fetch.appraisal');
Route::post('appraisal',[AppraisalController::class,'store'])->name('appraisal.store');
Route::get('appraisal/{id}/edit',[AppraisalController::class,'edit'])->name('appraisal.edit')->middleware('can:manage_users');
Route::post('appraisal/{id}/edit',[AppraisalController::class,'update'])->name('appraisal.update');
Route::get('appraisal/{id}/delete',[AppraisalController::class,'destroy'])->name('appraisal.delete')->middleware('can:manage_users');;

Route::get('qualification',[QualificationController::class,'index'])->name('index');
Route::post('qualification',[QualificationController::class,'store'])->name('qualification.store');
Route::get('qualification/all',[QualificationController::class,'fetchQualification'])->name('fetch.qualification');
Route::get('qualification/{id}/edit',[QualificationController::class,'edit'])->name('qualification.edit')->middleware('can:manage_users');;
Route::post('qualification/{id}/edit',[QualificationController::class,'update'])->name('qualification.update');
Route::get('qualification/{id}/delete',[QualificationController::class,'destroy'])->name('qualification.delete')->middleware('can:manage_users');;


Route::get('appointment',[AppointmentController::class,'index'])->name('index');
Route::get('appointment/all',[AppointmentController::class,'fetchAppointments'])->name('fetch.appointment');
Route::post('appointment',[AppointmentController::class,'store'])->name('appointment.store');
Route::get('appointment/{id}/edit',[AppointmentController::class,'edit'])->name('appointment.edit')->middleware('can:manage_users');;
Route::post('appointment/{id}/edit',[AppointmentController::class,'update'])->name('appointment.update');
Route::get('appointment/{id}/delete',[AppointmentController::class,'destroy'])->name('appointment.update')->middleware('can:manage_users');;

Route::get('promtrans',[PromotionTransferController::class,'index'])->name('index');
Route::get('promtrans/all',[PromotionTransferController::class,'fetchpromo'])->name('fetch.promo');
Route::post('promtrans',[PromotionTransferController::class,'store'])->name('promotrans.store');
Route::get('promtrans/{id}/edit',[PromotionTransferController::class,'edit'])->name('promotrans.edit')->middleware('can:manage_users');;
Route::post('promtrans/{id}/edit',[PromotionTransferController::class,'update'])->name('promotrans.update');
Route::get('promtrans/{id}/delete',[PromotionTransferController::class,'destroy'])->name('promotrans.delete')->middleware('can:manage_users');;

Route::get('training',[TrainingController::class,'index'])->name('index');
Route::get('training/all',[TrainingController::class,'fetchTrainings'])->name('fetch.training');
Route::post('training',[TrainingController::class,'store'])->name('training.store');
Route::get('training/{id}/edit',[TrainingController::class,'edit'])->name('training.edit')->middleware('can:manage_users');;
Route::post('training/{id}/edit',[TrainingController::class,'update'])->name('training.update');
Route::get('training/{id}/delete',[TrainingController::class,'destroy'])->name('training.delete')->middleware('can:manage_users');;


Route::get('application',[ApplicationController::class,'index'])->name('index');
Route::get('application/all',[ApplicationController::class,'fetchApplication'])->name('fetch.applic');
Route::post('application',[ApplicationController::class,'store'])->name('application.store');
Route::get('application/{id}/edit',[ApplicationController::class,'edit'])->name('application.edit')->middleware('can:manage_users');;
Route::post('application/{id}/edit',[ApplicationController::class,'update'])->name('application.edit');
Route::get('application/{id}/delete',[ApplicationController::class,'destroy'])->name('application.delete')->middleware('can:manage_users');;

Route::get('department',[DepartmentController::class,'index'])->name('department');
Route::post('department',[DepartmentController::class,'store'])->name('department.store');
Route::get('department/all',[DepartmentController::class,'fetchDepartments'])->name('department.fetch')->middleware('can:manage_users');;
Route::get('department/{id}/edit',[DepartmentController::class,'edit'])->name('department.edit');

Route::get('user',[UserController::class,'index'])->name('user.index');
Route::post('user',[UserController::class,'store'])->name('user.store');
Route::get('user/all',[UserController::class,'fetchUsers'])->name('user.fetch');
Route::get('user/{id}/edit',[UserController::class,'show'])->name('user.show');

Route::get('profile',[UserController::class,'profile'])->name('profile.show');
Route::post('profile/{id}/update',[UserController::class,'updateProfile'])->name('profile.update');
});
