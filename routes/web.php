<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\authController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\staffController;
use App\Models\User;

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
//     return view('welcome');
// });


Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/add_user', function(){
// 	$user = new User;
// 	$user->id = '123123';
// 	$user->l_name = 'Yusaff';
// 	$user->f_name = 'Celine'; 
// 	// $user->m_name = 'Makafefe';
// 	$user->gender  = 'Female';
// 	$user->address = 'Quezon city, idk';
// 	$user->email  = 'staff@yahoo.com';
// 	$user->password = bcrypt('admin');
// 	$user->role_id = 1;
// 	$user->save();
// });


Route::post('/loginVerify', [authController::class,'loginVerify'])->name('loginVerify');
Route::get('/logout', [authController::class,'logout'])->name('logout');

Route::controller(adminController::class)->group(function(){
	Route::get('/admin-panel','index')->name('admin');
	Route::get('/admin-student', 'student')->name('admin-student');
	Route::get('/admin-pc','pc')->name('admin-pc');
	Route::get('/admin-staff','admin_staff')->name('admin_staff');
	Route::post('/admin-add-studentCheck','studentCheck')->name('studentCheck');
	Route::post('/admin-add-pc','addPc')->name('addPc');
	Route::post('/admin-add-staff','add_staff')->name('add_staff');
	Route::get('/admin-student-info/{student_id}','student_info')->name('student_info');
	Route::get('/admin-pc-info/{pc_id}','pc_info')->name('pc_info');
	Route::get('/monitoring','monitoring')->name('monitoring');
});



Route::controller(staffController::class)->group(function(){
	Route::get('/staff-panel', 'index')->name('staff');
	Route::get('/staff-login', 'staff_login')->name('staff_login');
	Route::get('/staff-change-password', 'change_password')->name('change_password');
	Route::get('/staff-check-balance', 'check_balance')->name('check_balance');
	Route::get('/staff-report', 'staff_report')->name('staff_report');
	Route::get('/staff-logout', 'staff_logout')->name('staff_logout');
});


Route::post('/staff-student-check', function(Illuminate\Http\Request $request){
	
	$student = Student::where('barcode', $request['barcode'])->first();
	if(!$student){
		return response()->json(['profile_path'=>'error.jpg', 'lname'=> '', 'fname'=> '', 'mname'=> '']);
	}
	return response()->json($student);
})->name('student_check');


Route::controller(staffController::class)->group(function(){
	Route::post('staff-login-student','login_student')->name('login_student');
	Route::post('staff-logout-student','logout_student')->name('logout_student');
	Route::get('/staff-settings','settings')->name('settings');
	Route::post('/staff-change-settings','staff_change_settings')->name('staff_change_settings');
	Route::post('/staff-change-info','staff_change_info')->name('staff_change_info');
});



Route::post('/staff-student-balance', function(Illuminate\Http\Request $request){
	$student = Student::where('barcode', $request['barcode'])->first();
	if(!$student){
		return response()->json(false);
	}
	$balance = $student->time->time;
	return response()->json($balance);
})->name('student_balance');





Route::controller(adminController::class)->group(function(){
	Route::get('/admin-report', 'admin_report')->name('admin_report');
	Route::get('/admin-pc/{pc_id}/{room}', 'pc_delete')->name('pc_delete');
	Route::get('/admin-student/{student_id}', 'student_delete')->name('student_delete');
	Route::get('/admin-staff/{staff_id}', 'staff_delete')->name('staff_delete');
	Route::get('/admin-student/edit/{student_id}', 'admin_edit_student')->name('admin_edit_student');
	Route::post('/admin-student/update/{student_id}','admin_update_student')->name('admin_update_student');
	Route::get('/admin-pc/edit/{pc_id}/{room}','admin_pc_edit')->name('admin_pc_edit');
	Route::post('/admin-pc/update/{pc_id}/{room}','admin_pc_update')->name('admin_pc_update');
	Route::get('/admin-settings','admin_settings')->name('admin_settings');
	Route::post('/admin-update-settings','admin_update_settings')->name('admin_update_settings');	
});

