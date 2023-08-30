<?php
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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

Route::controller(StudentController::class)->middleware('auth')->group(function(){
    //route pour la page d'acceuil
    Route::get('/','studentData')->name('index');
    //route pour les details
    Route::get('/student-infos/{id?}','studentDetails')->name('studentId');
    //route pour ouvrir le formulaire de mise à jour
    Route::get('/student-update/{id?}','updateInfos')->name('updateInfos');
    //route d'ajout des étudiants
    Route::post('/student/addStudent','addStudent')->name('addStudent');
    //route pour supprimer un étudiant
    Route::get('/student-delete/{id?}', 'deleteStudent')->name('deleteStudent');
    //route de la mise à jour
    Route::post('/student/updateStudent/{id}', 'updateStudent')->name('updateStudent');
    //route pour activer un utilisateur
    Route::put('/activer/{id}', 'enable')->name('activer');
    //route pour désactiver un utilisateur
    Route::put('/desactiver/{id}', 'disable')->name('desactiver');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/signin', 'login')->name('signin');
    Route::get('/signout', 'logout')->name('signout');
    Route::get('/signup', 'register')->name('signup');
    Route::get('/verify_email/{email}', 'verify')->name('verifyEmail');
    Route::post('/signin/store', 'store')->name('userStore');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
});
