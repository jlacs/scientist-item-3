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
Route::post('update', [ScientistController::class, 'edit']);
Route::post('addScientist', [ScientistController::class, 'addScientist']);
Route::post('deleteScientist', [ScientistController::class, 'deleteScientist']);
Route::post('addTheory', [ScientistController::class, 'addTheory']);
Route::post('deleteTheory', [TheoriesController::class, 'deleteTheory']);

Route::get('add-scientist', function (\Doctrine\ORM\EntityManagerInterface $em) {
    $scientist = new Scientist('Albert', 'Einstein');
    $scientist->addTheory(
        new Theories('Theory of Relativity')
    );

    $em->persist($scientist);
    $em->flush();

    return 'added!';
});