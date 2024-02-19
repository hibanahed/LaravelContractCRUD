<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Models\Affectation;
use App\Models\Numero;
use App\Models\Employee;
//use App\Http\Controllers\EmployeeController;
// use App\Http\Controllers\NumeroController;
// use App\Http\Controllers\ContratController;
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



//Route Affectation:
Route::get('tests/showAffectation', [TestController::class,'showAffectation']);
Route::get('tests/affectation2', [TestController::class,'affectation2']);
Route::get('tests/createAffectation', [TestController::class,'createAffectation']);
// Route::get('tests/deleteAffectation/{id}', [TestController::class,'deleteAffectation']);
Route::delete('tests/showAffectation/{id}',function($id){
    $affectation = Affectation::findOrFail($id);
    $affectation->delete();
    return redirect('tests/showAffectation'); 
    })->name('delete-tutorial');
Route::get('tests/editAffectation/{id}', [TestController::class,'editAffectation']);
Route::post('tests/updateAffectation', [TestController::class,'updateAffectation']);
    
//Route Numero:
Route::get('tests/showAll', [TestController::class,'showAll']);
Route::delete('tests/showAll/{id}',function($id){
    $numero = Numero::findOrFail($id);
    $numero->delete();
    return redirect()->back(); 
    })->name('delete-tutorial3');

 //Route Contrat:
Route::get('tests/edit', [TestController::class,'edit']);
Route::post('tests/update', [TestController::class,'update']);
// Route::get('tests/delete', [TestController::class,'delete']);
Route::delete('tests/show/{id}',function($id){
    $numero = Numero::findOrFail($id);
    $numero->delete();
    return redirect()->back(); 
    })->name('delete-tutorial2');
Route::get("/tests/search" , [TestController::class,'Search']);
Route::get("/tests/search2" , [TestController::class,'Search2']);

//Route Employee
Route::get('tests/indexEmployee', [TestController::class,'indexEmployee']);
Route::get('tests/createEmployee', [TestController::class,'createEmployee']);
Route::get('tests/storeEmployee', [TestController::class,'storeEmployee']);
Route::delete('tests/indexEmployee/{id}',function($id){
    $employee = Employee::findOrFail($id);
    $employee->delete();
    return redirect()->back(); 
    })->name('delete-tutorial4');
Route::get('tests/editEmployee/{id}', [TestController::class,'editEmployee']);
Route::post('tests/updateEmployee', [TestController::class,'updateEmployee']);


// Route::get("/contrats/search" , [ContratController::class,'Search']);
// Route::get("/numeros/search" , [NumeroController::class,'Search']);
// Route::resource("/employees",EmployeeController::class);
// Route::resource("/numeros",NumeroController::class);
// Route::resource("/contrats",ContratController::class);
 Route::resource("/tests", TestController::class);


