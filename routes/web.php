<?php

use App\Entities\Scientist;
use App\Entities\Theories;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TheoriesController;
use App\Http\Controllers\ScientistController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('scientist', [ScientistController::class, 'index']);
Route::get('get-scientist', [ScientistController::class, 'getScientist']);
Route::post('save-scientist', [ScientistController::class, 'saveScientist']);
Route::post('delete-scientist', [ScientistController::class, 'deleteScientist']);
Route::post('edit-theory', [TheoriesController::class, 'editTheory']);
Route::post('save-theory', [TheoriesController::class, 'saveTheory']);
Route::post('delete-theory', [TheoriesController::class, 'deleteTheory']);

Route::get('add-scientist', function (\Doctrine\ORM\EntityManagerInterface $em) {
    $scientist = new Scientist('Albert', 'Einstein');
    $scientist->addTheory(
        new Theories('Theory of Relativity')
    );

    $em->persist($scientist);
    $em->flush();

    return 'added!';
});