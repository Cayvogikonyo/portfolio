<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\GeneralController;

Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    // Route::domain('admin.thebrainerke.co.ke')->group(function () {

        Route::get('/', [AdminController::class, 'admin'])->name('dashboard');
        Route::get('/manage', [AdminController::class, 'manage'])->name('manage');
        Route::get('/manage/site', [AdminController::class, 'manageSite'])->name('manage-site');
        Route::post('/author/save-article', [AdminController::class, 'saveArticle']);
        Route::post('/author/edit-article/{id}', [AdminController::class, 'editArticle']);
        Route::get('/edit/article/{id}', [AdminController::class, 'articleEdit']);
        Route::get('/ticketread/{id}', [AdminController::class, 'ticketRead']);
        Route::post('/delete-article/{id}', [AdminController::class, 'deleteArticle']);
        Route::get('/getarticles', [AdminController::class, 'getArticles']);
        Route::post('/publish-article/{id}', [AdminController::class, 'publishArticle']);
        Route::get('/admin/article/{id}', [AdminController::class, 'getArticle']);
        Route::get('/gettickets', [AdminController::class, 'getTickets'])->name('gettickets');
        Route::get('/getstats', [AdminController::class, 'getStats'])->name('getstats');
        Route::get('/new/article', [AdminController::class, 'newArticle'])->name('new/article');
        
        //Manage portofolio
        Route::get('/manage/portofolio', [AdminController::class, 'managePortofolio'])->name('manage-portofolio');
        Route::get('/edit/portofolio/{id}', [AdminController::class, 'editPortofolio'])->name('edit-portofolio');
        Route::get('/create/portofolio', [AdminController::class, 'editPortofolio'])->name('new-portofolio');
        Route::delete('/delete/portofolio', [AdminController::class, 'deletePortofolio'])->name('destroy-portofolio');
        Route::put('/delete/portofolio/avatar', [AdminController::class, 'portofolioBio'])->name('destroy-bio-avatar');
        Route::put('/edit/portofolio/bio', [AdminController::class, 'portofolioBio'])->name('update-bio');
        Route::put('/edit/portofolio/client', [AdminController::class, 'portofolioClient'])->name('update-client');
        Route::put('/edit/portofolio/service', [AdminController::class, 'portofolioService'])->name('update-service');
        Route::put('/edit/portofolio/skill', [AdminController::class, 'portofolioSkill'])->name('update-skill');
        Route::put('/edit/portofolio/experience', [AdminController::class, 'portofolioExperience'])->name('update-experience');
        Route::put('/delete/portofolio/client/{id}', [AdminController::class, 'deleteClient'])->name('delete-client');
        Route::put('/delete/portofolio/service/{id}', [AdminController::class, 'deleteService'])->name('delete-service');
        Route::put('/delete/portofolio/skill/{id}', [AdminController::class, 'deleteSkill'])->name('delete-skill');
        Route::put('/delete/portofolio/experience/{id}', [AdminController::class, 'deleteExperience'])->name('delete-experience');


        //Work management links
        Route::get('/manage/works', [AdminController::class, 'manageWork'])->name('manage-works');
        Route::get('/create/work', [AdminController::class, 'createWork'])->name('new-work');
        Route::get('/update/work/{id}', [AdminController::class, 'updateWork'])->name('update-work');
        Route::put('/update/work', [AdminController::class, 'storeWork'])->name('store-work');
        Route::delete('/delete/work', [AdminController::class, 'deleteWork'])->name('destroy-work');
        Route::delete('/delete/work-icon', [AdminController::class, 'deleteWorkIcon'])->name('destroy-work-icon');
        Route::delete('/delete/work-header', [AdminController::class, 'deleteWorkHeader'])->name('destroy-work-header');

        //Site management links
        Route::post('/update/site', [AdminController::class, 'updateSite'])->name('update-site');
        Route::post('/update/layout', [AdminController::class, 'updateLayout'])->name('update-layout');
        Route::get('manage-categories', [AdminController::class, 'manageCategories'])->name('manage-categories');
        Route::post('save-categories', [AdminController::class, 'saveCategories'])->name('save-category');

    // });

});


// Route::get('/', function () {
//     \App\Models\SiteStat::incrementVisit();
//     return view('layout1');
// })->name('dashboard');
Route::get('/', [GeneralController::class, 'home'])->name('dashboard');
Route::get('/blog', [GeneralController::class, 'blog'])->name('blog');
Route::get('/blog/{category}', [GeneralController::class, 'blogCategory'])->name('blog-category');
Route::get('/portofolio', [GeneralController::class, 'portofolio'])->name('portofolio');
Route::get('/portofolio/{id}', [GeneralController::class, 'portofolio'])->name('portofolio');
Route::get('/work-portofolio', [GeneralController::class, 'workPortofolio'])->name('work-portofolio');
Route::get('/work/{id}', [GeneralController::class, 'viewWork'])->name('view-work');
Route::get('/articles/{id}', [GeneralController::class, 'getArticle'])->name('articles');
Route::post('/contactus', [GeneralController::class, 'newTicket'])->name('contactus');
