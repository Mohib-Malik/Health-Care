<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPanelController;
use App\Http\Controllers\DoctorPanelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Models\doctors;
use App\Models\patients;
use App\Models\Appointment;
use App\Models\Department;
use App\Models\DoctorSchedule;
use App\Models\Profile;

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
//     ])->group(function () {
//         Route::get('/dashboard', function () {
//             return view('dashboard');
//         })->name('dashboard');
//     });

Route::get('/run-migrations', function () {
    Artisan::call('migrate', ['--force' => true]);
    return 'Migrations ran successfully!';
});

//////////////////////////////////// Admin Panel Routes Start ///////////////////////////////////////////

Route::middleware(['auth','admin'])->group(function () {
    route::get('/index2',[DashboardController::class,'index2'])->middleware('admin');

    Route::get('/add-appointment', [AppointmentsController::class, 'addAppointment']);
    Route::post('/submit-appointments', [AppointmentsController::class, 'submit']);
    Route::get('/appointments', [AppointmentsController::class, 'appointments']);

    
    Route::get('/edit-appointment/{id}', [AppointmentsController::class, 'editAppointment']);
    Route::get('/delete-appointment/{id}', [AppointmentsController::class, 'deleteAppointment']);
  
    
    // Doctor routes
    
    Route::get('/add-doctor', [DoctorController::class, 'addDoctor']);
    Route::get('/doctors', [DoctorController::class, 'doctors']);
    Route::get('/edit-doctor/{id}', [DoctorController::class, 'editDoctor'])->name('edit.doctor'); 
    Route::post('/submit-doctor', [DoctorController::class, 'submit']);
    Route::delete('/delete-doctor/{id}', [DoctorController::class, 'deleteDoctor']); // Correct method name
    
    // Routes for Departments (Using AdminController)
    Route::get('/add-department', [DepartmentsController::class, 'addDepartment']);
    Route::get('/departments', [DepartmentsController::class, 'departments']);
    Route::get('/edit-department', [DepartmentsController::class, 'editDepartment']);
    Route::post('/submit-department', [DepartmentsController::class, 'submit']);
    
    // Routes for Schedule
    Route::get('/add-schedule', [ScheduleController::class, 'addSchedule']); // View add schedule form
    Route::post('/submit-schedule', [ScheduleController::class, 'submit']); // Store schedule in DB
    Route::get('/schedule', [ScheduleController::class, 'schedule']); // View all schedules
    Route::get('/edit-schedule/{id}', [ScheduleController::class, 'editSchedule'])->name('edit.schedule');
    Route::post('/update-schedule/{id}', [ScheduleController::class, 'updateSchedule']);
    Route::delete('/delete-schedule/{id}', [ScheduleController::class, 'deleteSchedule'])->name('delete.schedule');
    
    // Routes for Patients (Using AdminController)

    Route::get('/patients', [PatientsController::class, 'patients']);
    Route::get('/add-patient', [PatientsController::class, 'addPatient']);
    Route::post('/submit-patient', [PatientsController::class, 'submit']);
    Route::delete('/delete-patient/{id}', [PatientsController::class, 'deletePatient']);    
    Route::get('/edit-patient/{id}', [PatientsController::class, 'editpatient']);
    Route::get('/profile', [ProfileController::class, 'profile'])->middleware('admin');
    Route::get('/edit-profile', [ProfileController::class, 'editProfile']);
});


//////////////////////////////////// Admin Panel Routes End ////////////////////////\//////////////////


//////////////////////////////////// User Panel Routes Start //////////////////////////////////////////

    Route::get('/', [UserPanelController::class, 'index'])->name('user.home');
    Route::get('/about', [UserPanelController::class, 'about'])->name('user.about');
    Route::get('/contact', [UserPanelController::class, 'contact'])->name('user.contact');
    Route::get('/details', [UserPanelController::class, 'detail'])->name('user.detail');
    Route::get('/find-doctor', [UserPanelController::class, 'findDoctor'])->name('user.find_doctor');
    Route::get('/price', [UserPanelController::class, 'price'])->name('user.price');
    Route::get('/service', [UserPanelController::class, 'service'])->name('user.service');
    Route::get('/team', [UserPanelController::class, 'team'])->name('user.team');

    // Route::get('/uappointment', [UserPanelController::class, 'uappointment'])->name('user.uappointment');


// Apply the 'auth' middleware to the uappointment route


Route::middleware(['auth'])->group(function () {
    Route::get('/uappointment', [UserPanelController::class, 'uappointment'])->name('user.uappointment');
    Route::post('/submit-uappointment', [UserPanelController::class, 'submit']); // Ensure this line exists
    Route::get('/invoice', [UserPanelController::class, 'invoice'])->name('user.invoice');
});




//////////////////////////////////// User Panel Routes End ////////////////////////////////////////////


Route::get('/dp', [DoctorPanelController::class, 'dp'])->name('doctor.dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/check-session', function () {
    return session()->all();
});
