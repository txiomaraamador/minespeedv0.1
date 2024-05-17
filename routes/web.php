<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AreasController;
use App\Http\Controllers\PositionsController;
use App\Http\Controllers\TypevehiclesController;
use App\Http\Controllers\TypeequipmentsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\EquipmentsController;
use App\Http\Controllers\Employee_vehicleController;
use App\Http\Controllers\Vehicle_areaController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HistoriesController;

use App\Mail\CorreosMailable;


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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/areas',AreasController::class);
Route::get('/areas/show/{id}',[AreasController::class, 'show']);
Route::post('/areas/create',[AreasController::class, 'create']);
Route::get('/areas/edit/{id}',[AreasController::class, 'edit']);
Route::put('/areas/{id}',[AreasController::class, 'update']);
Route::delete('/areas/delete/{id}',[AreasController::class, 'destroy'])->name('areas.destroy');

Route::resource('/positions',PositionsController::class);
Route::post('/positions/create',[PositionsController::class, 'create']);
Route::get('/positions/edit/{id}',[PositionsController::class, 'edit']);
Route::put('/positions/{id}',[PositionsController::class, 'update']);
Route::delete('/positions/delete/{id}',[PositionsController::class, 'destroy'])->name('positions.destroy');

Route::resource('/typevehicles',TypevehiclesController::class);
Route::post('/typevehicles/create',[TypevehiclesController::class, 'create']);
Route::get('/typevehicles/edit/{id}',[TypevehiclesController::class, 'edit']);
Route::put('/typevehicles/{id}',[TypevehiclesController::class, 'update']);
Route::delete('/typevehicles/delete/{id}',[TypevehiclesController::class, 'destroy'])->name('typevehicles.destroy');

Route::resource('/typeequipments',TypeequipmentsController::class);
Route::post('/typeequipments/create',[TypeequipmentsController::class, 'create']);
Route::get('/typeequipments/edit/{id}',[TypeequipmentsController::class, 'edit']);
Route::put('/typeequipments/{id}',[TypeequipmentsController::class, 'update']);
Route::delete('/typeequipments/delete/{id}',[TypeequipmentsController::class, 'destroy'])->name('typeequipments.destroy');

Route::resource('/employees',EmployeesController::class);
Route::post('/employees/create',[EmployeesController::class, 'create']);
Route::get('/employees/edit/{id}',[EmployeesController::class, 'edit']);
Route::put('/employees/{id}',[EmployeesController::class, 'update']);
Route::delete('/employees/delete/{id}',[EmployeesController::class, 'destroy'])->name('employees.destroy');

Route::resource('/vehicles',VehiclesController::class);
Route::get('/vehicles/show/{id}',[VehiclesController::class, 'show']);
Route::post('/vehicles/create',[VehiclesController::class, 'create']);
Route::get('/vehicles/edit/{id}',[VehiclesController::class, 'edit']);
Route::put('/vehicles/{id}',[VehiclesController::class, 'update']);
Route::delete('/vehicles/delete/{id}',[VehiclesController::class, 'destroy'])->name('vehicles.destroy');

Route::resource('/equipments',EquipmentsController::class);
Route::get('/equipments/show/{id}',[EquipmentsController::class, 'show']);
Route::post('/equipments/create',[EquipmentsController::class, 'create']);
Route::get('/equipments/edit/{id}',[EquipmentsController::class, 'edit']);
Route::put('/equipments/{id}',[EquipmentsController::class, 'update']);
Route::delete('/equipments/delete/{id}',[EquipmentsController::class, 'destroy'])->name('equipments.destroy');

Route::resource('/employee_vehicles',Employee_vehicleController::class);
Route::post('/employee_vehicles/create',[Employee_vehicleController::class, 'create']);
Route::get('/employee_vehicles/edit/{id}',[Employee_vehicleController::class, 'edit']);
Route::put('/employee_vehicles/{id}',[Employee_vehicleController::class, 'update']);
Route::delete('/employee_vehicles/delete/{id}',[Employee_vehicleController::class, 'destroy'])->name('employee_vehicles.destroy');


Route::resource('/vehicle_areas',Vehicle_areaController::class);
Route::post('/vehicle_areas/create',[Vehicle_areaController::class, 'create']);
Route::get('/vehicle_area/edit/{id}',[Vehicle_areaController::class, 'edit']);
Route::put('/vehicle_area/{id}',[Vehicle_areaController::class, 'update']);
Route::delete('/vehicle_area/delete/{id}',[Vehicle_areaController::class, 'destroy'])->name('vehicle_area.destroy');

Route::resource('/emails',EmailsController::class);
Route::get('/emails/show/{id}',[EmailsController::class, 'show']);
Route::post('/emails/create',[EmailsController::class, 'create']);
Route::get('/emails/edit/{id}',[EmailsController::class, 'edit']);
Route::put('/emails/{id}',[EmailsController::class, 'update']);
Route::delete('/emails/delete/{id}',[EmailsController::class, 'destroy'])->name('emails.destroy');

Route::get('/getEmployeeDetails/{id}', [Employee_vehicleController::class, 'getEmployeeDetails']);
Route::get('/getEmployeeDetailsIdent/{id}', [Employee_vehicleController::class, 'getEmployeeDetailsIdent']);
Route::get('/getVehicleDetails/{id}', [Employee_vehicleController::class, 'getVehicleDetails']);
Route::get('/getAreaDetails/{id}', [Vehicle_areaController::class, 'getAreaDetails']);

Route::resource('/users',UserController::class);

use App\Http\Controllers\CorreosController;

Route::get('correos', [CorreosController::class, 'getMail'])->name('correos');

Route::resource('/histories',HistoriesController::class);
Route::get('/histories/show/{id}',[HistoriesController::class, 'show']);
Route::post('/histories/create',[HistoriesController::class, 'create']);
Route::delete('/histories/delete/{id}',[EmailsController::class, 'destroy'])->name('histories.destroy');

Route::get('/getVechileDetails/{plate}',[HistoriesController::class, 'getVechileDetails']);

