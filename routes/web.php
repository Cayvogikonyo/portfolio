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

    // Route::domain('admin.personal.test')->group(function () {

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
        
        //Manage portfolio
        Route::get('/manage/portfolio', [AdminController::class, 'managePortofolio'])->name('manage-portfolio');
        Route::get('/edit/portfolio/{id}', [AdminController::class, 'editPortofolio'])->name('edit-portfolio');
        Route::get('/create/portfolio', [AdminController::class, 'editPortofolio'])->name('new-portfolio');
        Route::delete('/delete/portfolio', [AdminController::class, 'deletePortofolio'])->name('destroy-portfolio');
        Route::put('/delete/portfolio/avatar', [AdminController::class, 'portofolioBio'])->name('destroy-bio-avatar');
        Route::put('/edit/portfolio/bio', [AdminController::class, 'portofolioBio'])->name('update-bio');
        Route::put('/edit/portfolio/client', [AdminController::class, 'portofolioClient'])->name('update-client');
        Route::put('/edit/portfolio/service', [AdminController::class, 'portofolioService'])->name('update-service');
        Route::put('/edit/portfolio/skill', [AdminController::class, 'portofolioSkill'])->name('update-skill');
        Route::put('/edit/portfolio/experience', [AdminController::class, 'portofolioExperience'])->name('update-experience');
        Route::put('/delete/portfolio/client/{id}', [AdminController::class, 'deleteClient'])->name('delete-client');
        Route::put('/delete/portfolio/service/{id}', [AdminController::class, 'deleteService'])->name('delete-service');
        Route::put('/delete/portfolio/skill/{id}', [AdminController::class, 'deleteSkill'])->name('delete-skill');
        Route::put('/delete/portfolio/experience/{id}', [AdminController::class, 'deleteExperience'])->name('delete-experience');


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
        Route::post('delete/category/{id}', [AdminController::class, 'deleteCategory'])->name('delete-category');

    // });

});


// Route::get('/', function () {
//     \App\Models\SiteStat::incrementVisit();
//     return view('layout1');
// })->name('dashboard');
// Route::get('/', [GeneralController::class, 'home'])->name('dashboard');
Route::get('/blog', [GeneralController::class, 'blog'])->name('blog');
Route::get('/blog/{category}', [GeneralController::class, 'blogCategory'])->name('blog-category');
Route::get('/portfolio', [GeneralController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{id}', [GeneralController::class, 'portfolio'])->name('portfolio');
Route::get('/work-portfolio', [GeneralController::class, 'workPortofolio'])->name('work-portfolio');
Route::get('/work/{id}', [GeneralController::class, 'viewWork'])->name('view-work');
Route::get('/articles/{id}', [GeneralController::class, 'getArticle'])->name('articles');
Route::post('/contactus', [GeneralController::class, 'newTicket'])->name('contactus');
