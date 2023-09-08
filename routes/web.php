<?php

use App\Http\Controllers\AffectationController;
use App\Http\Controllers\AffectationprofsController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfessorController;
use App\Models\AffectationProfs;
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
    //Route::get('/allstudent', 'allstudent')->name('allStudent');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/signin', 'login')->name('signin');
    Route::get('/signout', 'logout')->name('signout');
    Route::get('/signup', 'register')->name('signup');
    Route::get('/verify_email/{email}', 'verify')->name('verifyEmail');
    Route::post('/signin/store', 'store')->name('userStore');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/forgot-password', 'forgot')->name('forgotPassword');
    Route::get('/reset-password/{email}', 'reset')->name('resetPassword');
    Route::post('/set-password', 'setpassword')->name('setPassword');
    Route::post('/update-password/{email}', 'updatepassword')->name('updatePassword');
});

Route::controller(ClassController::class)->middleware("auth")->group(function(){
    Route::get('/class', 'classlist')->name('classList');
    Route::get('/addclass-form', 'addclassform')->name('addClassForm');
    Route::post('/addclass/store', 'addclassStore')->name('addClassStore');
    Route::get('/delete-class/{id}', 'deleteclass')->name('deleteClass');
    Route::get('/update-class/{id}', 'updateclass')->name('updateClass');
    Route::post('/update-class/store/{id}', 'updateclassStore')->name('updateClassStore');
    
});

Route::controller(CategoryController::class)->middleware("auth")->group(function(){
    Route::post('/addcategorie/store', 'addcategorieStore')->name('addCategory');
});

Route::controller(AffectationController::class)->middleware("auth")->group(function(){
    Route::get('/affectation', 'affectcourses')->name('affectCourses');
    Route::post('/affectation/store', 'affectstore')->name('affectStore');
    Route::get('/attribute-note/{idE}/{idC}', 'attributenote')->name('attributeNote');
    Route::post('/attribute-note/store/{idE}/{idC}', 'attributenotestore')->name('attributeNoteStore');
});

Route::controller(ProfessorController::class)->middleware("auth")->group(function(){
    Route::get('professor-list', 'professorlist')->name('professorList');
    Route::get('addprofessor-form', 'addprofessor')->name('addProfessor');
    Route::post('addprofessor/store','addprofessorStore')->name('addProfessorStore');
    Route::get('professor-course/{id}', 'professorcourse')->name('professorCourse');
});

Route::controller(AffectationprofsController::class)->middleware('auth')->group(function(){
    Route::post('/save/affectationprofs/{id}', 'saveaffectation')->name('saveAffectationProfs');
    Route::get('/delete/affectationprofs/{id}', 'deleteaffectation')->name('deleteAffectation');
});

