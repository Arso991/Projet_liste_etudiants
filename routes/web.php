<?php
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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
//route pour la page d'acceuil
Route::get('/', [StudentController::class, 'studentData'])->name('index');

//route pour les details
Route::get('/student-infos/{id?}', [StudentController::class, 'studentDetails'])->name('studentId');

//route pour ouvrir le formulaire de mise à jour
Route::get('/student-update/{id?}', [StudentController::class, 'updateInfos'])->name('updateInfos');

//route d'ajout des étudiants
Route::post('/student/addStudent', [StudentController::class, 'addStudent'])->name('addStudent');

//route pour supprimer un étudiant
Route::get('/student-delete/{id?}', [StudentController::class, 'deleteStudent'])->name('deleteStudent');

//route de la mise à jour
Route::post('/student/updateStudent/{id}', [StudentController::class, 'updateStudent'])->name('updateStudent');
