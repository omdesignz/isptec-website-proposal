<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AcademicCategoryController;
use App\Http\Controllers\AcademicFootprintCategoryController;
use App\Http\Controllers\AcademicFootprintController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\ShortDurationCourseController;
use App\Http\Controllers\ShortDurationCourseClassController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\RecruitmentPublicationController;
use App\Http\Controllers\RecruitmentCategoryController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\PartnershipCategoryController;
use App\Http\Controllers\PageSliderController;
use App\Http\Controllers\PageSectionController;
use App\Http\Controllers\NewsletterCategoryController;
use App\Http\Controllers\MediaPublicationController;
use App\Http\Controllers\MediaCategoryController;
use App\Http\Controllers\LTCSessionController;
use App\Http\Controllers\LTCMembershipController;
use App\Http\Controllers\LTCMembershipCategoryController;
use App\Http\Controllers\JournalPublicationController;
use App\Http\Controllers\JournalCategoryController;
use App\Http\Controllers\FileCategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CoursePlanController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModelPermissionController;


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

Route::prefix('admin')->middleware(['auth'])->group(function () {
    
    Route::controller(TopicController::class)->group(function () {
        Route::get('/topics','index')->name('topics.index');
        Route::get('/topics/create','create')->name('topics.create');
        Route::post('/topics','store')->name('topics.store');
        Route::get('/topics/{topic}/edit','edit')->name('topics.edit');
        Route::get('/topics/{topic}/show','show')->name('topics.show');
        Route::put('/topics/{topic}','update')->name('topics.update');
        Route::delete('/topics/{topic}','destroy')->name('topics.destroy');
        Route::put('/topics/{topic}/restore','restore')->name('topics.restore');
        Route::get('/topics/{topic}/{lang}','lang')->name('topics.getlang');
        Route::put('/topics/{topic}/settranslation','settranslation')->name('topics.settranslation');
    });

    Route::controller(TagController::class)->group(function () {
        Route::get('/tags','index')->name('tags.index');
        Route::get('/tags/create','create')->name('tags.create');
        Route::post('/tags','store')->name('tags.store');
        Route::get('/tags/{tag}/edit','edit')->name('tags.edit');
        Route::get('/tags/{tag}/show','show')->name('tags.show');
        Route::put('/tags/{tag}','update')->name('tags.update');
        Route::delete('/tags/{tag}','destroy')->name('tags.destroy');
        Route::put('/tags/{tag}/restore','restore')->name('tags.restore');
        Route::get('/tags/{tag}/{lang}','lang')->name('tags.getlang');
        Route::put('/tags/{tag}/settranslation','settranslation')->name('tags.settranslation');
    });

    Route::controller(PostController::class)->group(function () {
        Route::get('/posts','index')->name('posts.index');
        Route::get('/posts/create','create')->name('posts.create');
        Route::post('/posts','store')->name('posts.store');
        Route::get('/posts/{post}/edit','edit')->name('posts.edit');
        Route::get('/posts/{post}/show','show')->name('posts.show');
        Route::put('/posts/{post}','update')->name('posts.update');
        Route::delete('/posts/{post}','destroy')->name('posts.destroy');
        Route::put('/posts/{post}/restore','restore')->name('posts.restore');
        Route::get('/posts/{post}/{lang}','lang')->name('posts.getlang');
        Route::put('/posts/{post}/settranslation','settranslation')->name('posts.settranslation');
        Route::get('/posts/downloadsingleattachment','downloadsingleattachment')->name('posts.downloadsingleattachment');
        Route::get('/posts/deletesingleattachment','deletesingleattachment')->name('posts.deletesingleattachment');
        Route::get('/posts/downloadallattachments','downloadallattachments')->name('posts.downloadallattachments');
    });

    Route::controller(MediaPublicationController::class)->group(function () {
        Route::get('/mediapublications','index')->name('mediapublications.index');
        Route::get('/mediapublications/create','create')->name('mediapublications.create');
        Route::post('/mediapublications','store')->name('mediapublications.store');
        Route::get('/mediapublications/{publication}/edit','edit')->name('mediapublications.edit');
        Route::get('/mediapublications/{publication}/show','show')->name('mediapublications.show');
        Route::put('/mediapublications/{publication}','update')->name('mediapublications.update');
        Route::delete('/mediapublications/{publication}','destroy')->name('mediapublications.destroy');
        Route::put('/mediapublications/{publication}/restore','restore')->name('mediapublications.restore');
        Route::get('/mediapublications/{publication}/{lang}','lang')->name('mediapublications.getlang');
        Route::put('/mediapublications/{publication}/settranslation','settranslation')->name('mediapublications.settranslation');
        Route::get('/mediapublications/downloadsingleattachment','downloadsingleattachment')->name('mediapublications.downloadsingleattachment');
        Route::get('/mediapublications/deletesingleattachment','deletesingleattachment')->name('mediapublications.deletesingleattachment');
        Route::get('/mediapublications/downloadallattachments','downloadallattachments')->name('posts.downloadallattachments');
    });

    Route::controller(DepartmentController::class)->group(function () {
        Route::get('/departments','index')->name('departments.index');
        Route::get('/departments/create','create')->name('departments.create');
        Route::post('/departments','store')->name('departments.store');
        Route::get('/departments/{department}/edit','edit')->name('departments.edit');
        Route::get('/departments/{department}/show','show')->name('departments.show');
        Route::put('/departments/{department}','update')->name('departments.update');
        Route::delete('/departments/{department}','destroy')->name('departments.destroy');
        Route::put('/departments/{department}/restore','restore')->name('departments.restore');
        Route::get('/departments/{department}/{lang}','lang')->name('departments.getlang');
        Route::put('/departments/{department}/settranslation','settranslation')->name('departments.settranslation');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users','index')->name('users.index');
        Route::get('/users/create','create')->name('users.create');
        Route::post('/users','store')->name('users.store');
        Route::get('/users/{user}/edit','edit')->name('users.edit');
        Route::get('/users/{user}/show','show')->name('users.show');
        Route::put('/users/{user}','update')->name('users.update');
        Route::delete('/users/{user}','destroy')->name('users.destroy');
        Route::put('/users/{user}/restore','restore')->name('users.restore');
        Route::get('/users/{user}/{lang}','lang')->name('users.getlang');
        Route::put('/users/{user}/settranslation','settranslation')->name('users.settranslation');
    });

    Route::controller(AcademicCategoryController::class)->group(function () {
        Route::get('/academiccategories','index')->name('academiccategories.index');
        Route::get('/academiccategories/create','create')->name('academiccategories.create');
        Route::post('/academiccategories','store')->name('academiccategories.store');
        Route::get('/academiccategories/{category}/edit','edit')->name('academiccategories.edit');
        Route::get('/academiccategories/{category}/show','show')->name('academiccategories.show');
        Route::put('/academiccategories/{category}','update')->name('academiccategories.update');
        Route::delete('/academiccategories/{category}','destroy')->name('academiccategories.destroy');
        Route::put('/academiccategories/{category}/restore','restore')->name('academiccategories.restore');
        Route::get('/academiccategories/{category}/{lang}','lang')->name('academiccategories.getlang');
        Route::put('/academiccategories/{category}/settranslation','settranslation')->name('academiccategories.settranslation');
    });

    Route::controller(CourseCategoryController::class)->group(function () {
        Route::get('/coursecategories','index')->name('coursecategories.index');
        Route::get('/coursecategories/create','create')->name('coursecategories.create');
        Route::post('/coursecategories','store')->name('coursecategories.store');
        Route::get('/coursecategories/{category}/edit','edit')->name('coursecategories.edit');
        Route::get('/coursecategories/{category}/show','show')->name('coursecategories.show');
        Route::put('/coursecategories/{category}','update')->name('coursecategories.update');
        Route::delete('/coursecategories/{category}','destroy')->name('coursecategories.destroy');
        Route::put('/coursecategories/{category}/restore','restore')->name('coursecategories.restore');
        Route::get('/coursecategories/{category}/{lang}','lang')->name('coursecategories.getlang');
        Route::put('/coursecategories/{category}/settranslation','settranslation')->name('coursecategories.settranslation');
    });

    Route::controller(MediaCategoryController::class)->group(function () {
        Route::get('/mediacategories','index')->name('mediacategories.index');
        Route::get('/mediacategories/create','create')->name('mediacategories.create');
        Route::post('/mediacategories','store')->name('mediacategories.store');
        Route::get('/mediacategories/{category}/edit','edit')->name('mediacategories.edit');
        Route::get('/mediacategories/{category}/show','show')->name('mediacategories.show');
        Route::put('/mediacategories/{category}','update')->name('mediacategories.update');
        Route::delete('/mediacategories/{category}','destroy')->name('mediacategories.destroy');
        Route::put('/mediacategories/{category}/restore','restore')->name('mediacategories.restore');
        Route::get('/mediacategories/{category}/{lang}','lang')->name('mediacategories.getlang');
        Route::put('/mediacategories/{category}/settranslation','settranslation')->name('mediacategories.settranslation');
    });

    Route::controller(RecruitmentCategoryController::class)->group(function () {
        Route::get('/recruitmentcategories','index')->name('recruitmentcategories.index');
        Route::get('/recruitmentcategories/create','create')->name('recruitmentcategories.create');
        Route::post('/recruitmentcategories','store')->name('recruitmentcategories.store');
        Route::get('/recruitmentcategories/{category}/edit','edit')->name('recruitmentcategories.edit');
        Route::get('/recruitmentcategories/{category}/show','show')->name('recruitmentcategories.show');
        Route::put('/recruitmentcategories/{category}','update')->name('recruitmentcategories.update');
        Route::delete('/recruitmentcategories/{category}','destroy')->name('recruitmentcategories.destroy');
        Route::put('/recruitmentcategories/{category}/restore','restore')->name('recruitmentcategories.restore');
        Route::get('/recruitmentcategories/{category}/{lang}','lang')->name('recruitmentcategories.getlang');
        Route::put('/recruitmentcategories/{category}/settranslation','settranslation')->name('recruitmentcategories.settranslation');
    });

    Route::controller(ServiceCategoryController::class)->group(function () {
        Route::get('/servicecategories','index')->name('servicecategories.index');
        Route::get('/servicecategories/create','create')->name('servicecategories.create');
        Route::post('/servicecategories','store')->name('servicecategories.store');
        Route::get('/servicecategories/{category}/edit','edit')->name('servicecategories.edit');
        Route::get('/servicecategories/{category}/show','show')->name('servicecategories.show');
        Route::put('/servicecategories/{category}','update')->name('servicecategories.update');
        Route::delete('/servicecategories/{category}','destroy')->name('servicecategories.destroy');
        Route::put('/servicecategories/{category}/restore','restore')->name('servicecategories.restore');
        Route::get('/servicecategories/{category}/{lang}','lang')->name('servicecategories.getlang');
        Route::put('/servicecategories/{category}/settranslation','settranslation')->name('servicecategories.settranslation');
    });

    Route::controller(PageController::class)->group(function () {
        Route::get('/pages','index')->name('pages.index');
        Route::get('/pages/create','create')->name('pages.create');
        Route::post('/pages','store')->name('pages.store');
        Route::get('/pages/{page}/edit','edit')->name('pages.edit');
        Route::get('/pages/{page}/show','show')->name('pages.show');
        Route::put('/pages/{page}','update')->name('pages.update');
        Route::delete('/pages/{page}','destroy')->name('pages.destroy');
        Route::put('/pages/{page}/restore','restore')->name('pages.restore');
        Route::get('/pages/{page}/{lang}','lang')->name('pages.getlang');
        Route::put('/pages/{page}/settranslation','settranslation')->name('pages.settranslation');
        Route::get('/pages/downloadsingleattachment','downloadsingleattachment')->name('pages.downloadsingleattachment');
        Route::get('/pages/deletesingleattachment','deletesingleattachment')->name('pages.deletesingleattachment');
        Route::get('/pages/downloadallattachments','downloadallattachments')->name('pages.downloadallattachments');
    });

    Route::controller(PageSectionController::class)->group(function () {
        Route::get('/pagesections','index')->name('pagesections.index');
        Route::get('/pagesections/create','create')->name('pagesections.create');
        Route::post('/pagesections','store')->name('pagesections.store');
        Route::get('/pagesections/{section}/edit','edit')->name('pagesections.edit');
        Route::get('/pagesections/{section}/show','show')->name('pagesections.show');
        Route::put('/pagesections/{section}','update')->name('pagesections.update');
        Route::delete('/pagesections/{section}','destroy')->name('pagesections.destroy');
        Route::put('/pagesections/{section}/restore','restore')->name('pagesections.restore');
        Route::get('/pagesections/{section}/{lang}','lang')->name('pagesections.getlang');
        Route::put('/pagesections/{section}/settranslation','settranslation')->name('pagesections.settranslation');
    });

    Route::controller(PageSliderController::class)->group(function () {
        Route::get('/pagesliders','index')->name('pagesliders.index');
        Route::get('/pagesliders/create','create')->name('pagesliders.create');
        Route::post('/pagesliders','store')->name('pagesliders.store');
        Route::get('/pagesliders/{slider}/edit','edit')->name('pagesliders.edit');
        Route::get('/pagesliders/{slider}/show','show')->name('pagesliders.show');
        Route::put('/pagesliders/{slider}','update')->name('pagesliders.update');
        Route::delete('/pagesliders/{slider}','destroy')->name('pagesliders.destroy');
        Route::put('/pagesliders/{slider}/restore','restore')->name('pagesliders.restore');
        Route::get('/pagesliders/{slider}/{lang}','lang')->name('pagesliders.getlang');
        Route::put('/pagesliders/{slider}/settranslation','settranslation')->name('pagesliders.settranslation');
        Route::get('/pagesliders/downloadsingleattachment','downloadsingleattachment')->name('pagesliders.downloadsingleattachment');
        Route::get('/pagesliders/deletesingleattachment','deletesingleattachment')->name('pagesliders.deletesingleattachment');
    });

    Route::controller(SubjectController::class)->group(function () {
        Route::get('/subjects','index')->name('subjects.index');
        Route::get('/subjects/create','create')->name('subjects.create');
        Route::post('/subjects','store')->name('subjects.store');
        Route::get('/subjects/{subject}/edit','edit')->name('subjects.edit');
        Route::get('/subjects/{subject}/show','show')->name('subjects.show');
        Route::put('/subjects/{subject}','update')->name('subjects.update');
        Route::delete('/subjects/{subject}','destroy')->name('subjects.destroy');
        Route::put('/subjects/{subject}/restore','restore')->name('subjects.restore');
        Route::get('/subjects/{subject}/{lang}','lang')->name('subjects.getlang');
        Route::put('/subjects/{subject}/settranslation','settranslation')->name('subjects.settranslation');
    });

    Route::controller(ServiceController::class)->group(function () {
        Route::get('/services','index')->name('services.index');
        Route::get('/services/create','create')->name('services.create');
        Route::post('/services','store')->name('services.store');
        Route::get('/services/{service}/edit','edit')->name('services.edit');
        Route::get('/services/{service}/show','show')->name('services.show');
        Route::put('/services/{service}','update')->name('services.update');
        Route::delete('/services/{service}','destroy')->name('services.destroy');
        Route::put('/services/{service}/restore','restore')->name('services.restore');
        Route::get('/services/{service}/{lang}','lang')->name('services.getlang');
        Route::put('/services/{service}/settranslation','settranslation')->name('services.settranslation');
    });

    Route::controller(SemesterController::class)->group(function () {
        Route::get('/semesters','index')->name('semesters.index');
        Route::get('/semesters/create','create')->name('semesters.create');
        Route::post('/semesters','store')->name('semesters.store');
        Route::get('/semesters/{semester}/edit','edit')->name('semesters.edit');
        Route::get('/semesters/{semester}/show','show')->name('semesters.show');
        Route::put('/semesters/{semester}','update')->name('semesters.update');
        Route::delete('/semesters/{semester}','destroy')->name('semesters.destroy');
        Route::put('/semesters/{semester}/restore','restore')->name('semesters.restore');
        Route::get('/semesters/{semester}/{lang}','lang')->name('semesters.getlang');
        Route::put('/semesters/{semester}/settranslation','settranslation')->name('semesters.settranslation');
    });

    Route::controller(RecruitmentPublicationController::class)->group(function () {
        Route::get('/recruitmentpublications','index')->name('recruitmentpublications.index');
        Route::get('/recruitmentpublications/create','create')->name('recruitmentpublications.create');
        Route::post('/recruitmentpublications','store')->name('recruitmentpublications.store');
        Route::get('/recruitmentpublications/{publication}/edit','edit')->name('recruitmentpublications.edit');
        Route::get('/recruitmentpublications/{publication}/show','show')->name('recruitmentpublications.show');
        Route::put('/recruitmentpublications/{publication}','update')->name('recruitmentpublications.update');
        Route::delete('/recruitmentpublications/{publication}','destroy')->name('recruitmentpublications.destroy');
        Route::put('/recruitmentpublications/{publication}/restore','restore')->name('recruitmentpublications.restore');
        Route::get('/recruitmentpublications/{publication}/{lang}','lang')->name('recruitmentpublications.getlang');
        Route::put('/recruitmentpublications/{publication}/settranslation','settranslation')->name('recruitmentpublications.settranslation');
        Route::get('/recruitmentpublications/downloadsingleattachment','downloadsingleattachment')->name('recruitmentpublications.downloadsingleattachment');
        Route::get('/recruitmentpublications/deletesingleattachment','deletesingleattachment')->name('recruitmentpublications.deletesingleattachment');
        Route::get('/recruitmentpublications/downloadallattachments','downloadallattachments')->name('recruitmentpublications.downloadallattachments');
    });

    Route::controller(CoursePlanController::class)->group(function () {
        Route::get('/courseplans','index')->name('courseplans.index');
        Route::get('/courseplans/create','create')->name('courseplans.create');
        Route::post('/courseplans','store')->name('courseplans.store');
        Route::get('/courseplans/{plan}/edit','edit')->name('courseplans.edit');
        Route::get('/courseplans/{plan}/show','show')->name('courseplans.show');
        Route::put('/courseplans/{plan}','update')->name('courseplans.update');
        Route::delete('/courseplans/{plan}','destroy')->name('courseplans.destroy');
        Route::put('/courseplans/{plan}/restore','restore')->name('courseplans.restore');
        Route::get('/courseplans/{plan}/{lang}','lang')->name('courseplans.getlang');
        Route::put('/courseplans/{plan}/settranslation','settranslation')->name('courseplans.settranslation');
        Route::get('/courseplans/downloadsingleattachment','downloadsingleattachment')->name('courseplans.downloadsingleattachment');
        Route::get('/courseplans/deletesingleattachment','deletesingleattachment')->name('courseplans.deletesingleattachment');
        Route::get('/courseplans/downloadallattachments','downloadallattachments')->name('courseplans.downloadallattachments');
        Route::get('/courseplans/deleteplan','deleteplan')->name('courseplans.deleteplan');
    });

    Route::controller(EventController::class)->group(function () {
        Route::get('/events','index')->name('events.index');
        Route::get('/events/create','create')->name('events.create');
        Route::post('/events','store')->name('events.store');
        Route::get('/events/{event}/edit','edit')->name('events.edit');
        Route::get('/events/{event}/show','show')->name('events.show');
        Route::put('/events/{event}','update')->name('events.update');
        Route::delete('/events/{event}','destroy')->name('events.destroy');
        Route::put('/events/{event}/restore','restore')->name('events.restore');
        Route::get('/events/{event}/{lang}','lang')->name('events.getlang');
        Route::put('/events/{event}/settranslation','settranslation')->name('events.settranslation');
        Route::get('/events/downloadsingleattachment','downloadsingleattachment')->name('events.downloadsingleattachment');
        Route::get('/events/deletesingleattachment','deletesingleattachment')->name('events.deletesingleattachment');
        Route::get('/events/downloadallattachments','downloadallattachments')->name('events.downloadallattachments');
    });

    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/employees','index')->name('employees.index');
        Route::get('/employees/create','create')->name('employees.create');
        Route::post('/employees','store')->name('employees.store');
        Route::get('/employees/{employee}/edit','edit')->name('employees.edit');
        Route::get('/employees/{employee}/show','show')->name('employees.show');
        Route::put('/employees/{employee}','update')->name('employees.update');
        Route::delete('/employees/{employee}','destroy')->name('employees.destroy');
        Route::put('/employees/{employee}/restore','restore')->name('employees.restore');
        Route::get('/employees/{employee}/{lang}','lang')->name('employees.getlang');
        Route::put('/employees/{employee}/settranslation','settranslation')->name('employees.settranslation');
        Route::get('/employees/downloadsingleattachment','downloadsingleattachment')->name('employees.downloadsingleattachment');
        Route::get('/employees/deletesingleattachment','deletesingleattachment')->name('employees.deletesingleattachment');
        Route::get('/employees/downloadallattachments','downloadallattachments')->name('employees.downloadallattachments');
        Route::post('/employees/togglenotification', 'togglenotification')->name('employees.togglenotification');
    });

    Route::controller(JournalCategoryController::class)->group(function () {
        Route::get('/journalcategories','index')->name('journalcategories.index');
        Route::get('/journalcategories/create','create')->name('journalcategories.create');
        Route::post('/journalcategories','store')->name('journalcategories.store');
        Route::get('/journalcategories/{category}/edit','edit')->name('journalcategories.edit');
        Route::get('/journalcategories/{category}/show','show')->name('journalcategories.show');
        Route::put('/journalcategories/{category}','update')->name('journalcategories.update');
        Route::delete('/journalcategories/{category}','destroy')->name('journalcategories.destroy');
        Route::put('/journalcategories/{category}/restore','restore')->name('journalcategories.restore');
        Route::get('/journalcategories/{category}/{lang}','lang')->name('journalcategories.getlang');
        Route::put('/journalcategories/{category}/settranslation','settranslation')->name('journalcategories.settranslation');
    });

    Route::controller(JournalPublicationController::class)->group(function () {
        Route::get('/journalpublications','index')->name('journalpublications.index');
        Route::get('/journalpublications/create','create')->name('journalpublications.create');
        Route::post('/journalpublications','store')->name('journalpublications.store');
        Route::get('/journalpublications/{publication}/edit','edit')->name('journalpublications.edit');
        Route::get('/journalpublications/{publication}/show','show')->name('journalpublications.show');
        Route::put('/journalpublications/{publication}','update')->name('journalpublications.update');
        Route::delete('/journalpublications/{publication}','destroy')->name('journalpublications.destroy');
        Route::put('/journalpublications/{publication}/restore','restore')->name('journalpublications.restore');
        Route::get('/journalpublications/{publication}/{lang}','lang')->name('journalpublications.getlang');
        Route::put('/journalpublications/{publication}/settranslation','settranslation')->name('journalpublications.settranslation');
        Route::get('/journalpublications/downloadsingleattachment','downloadsingleattachment')->name('journalpublications.downloadsingleattachment');
        Route::get('/journalpublications/deletesingleattachment','deletesingleattachment')->name('journalpublications.deletesingleattachment');
        Route::get('/journalpublications/downloadallattachments','downloadallattachments')->name('journalpublications.downloadallattachments');
    });

    Route::controller(AlumniController::class)->group(function () {
        Route::get('/alumnis','index')->name('alumnis.index');
        Route::get('/alumnis/create','create')->name('alumnis.create');
        Route::post('/alumnis','store')->name('alumnis.store');
        Route::get('/alumnis/{alumni}/edit','edit')->name('alumnis.edit');
        Route::get('/alumnis/{alumni}/show','show')->name('alumnis.show');
        Route::put('/alumnis/{alumni}','update')->name('alumnis.update');
        Route::delete('/alumnis/{alumni}','destroy')->name('alumnis.destroy');
        Route::put('/alumnis/{alumni}/restore','restore')->name('alumnis.restore');
        Route::get('/alumnis/{alumni}/{lang}','lang')->name('alumnis.getlang');
        Route::put('/alumnis/{alumni}/settranslation','settranslation')->name('alumnis.settranslation');
        Route::get('/alumnis/downloadsingleattachment','downloadsingleattachment')->name('alumnis.downloadsingleattachment');
        Route::get('/alumnis/deletesingleattachment','deletesingleattachment')->name('alumnis.deletesingleattachment');
        Route::get('/alumnis/downloadallattachments','downloadallattachments')->name('alumnis.downloadallattachments');
    });

    Route::controller(CourseController::class)->group(function () {
        Route::get('/courses','index')->name('courses.index');
        Route::get('/courses/create','create')->name('courses.create');
        Route::post('/courses','store')->name('courses.store');
        Route::get('/courses/{course}/edit','edit')->name('courses.edit');
        Route::get('/courses/{course}/show','show')->name('courses.show');
        Route::put('/courses/{course}','update')->name('courses.update');
        Route::delete('/courses/{course}','destroy')->name('courses.destroy');
        Route::put('/courses/{course}/restore','restore')->name('courses.restore');
        Route::get('/courses/{course}/{lang}','lang')->name('courses.getlang');
        Route::put('/courses/{course}/settranslation','settranslation')->name('courses.settranslation');
        Route::get('/courses/downloadsingleattachment','downloadsingleattachment')->name('courses.downloadsingleattachment');
        Route::get('/courses/deletesingleattachment','deletesingleattachment')->name('courses.deletesingleattachment');
        Route::get('/courses/downloadallattachments','downloadallattachments')->name('courses.downloadallattachments');
    });

    Route::controller(SettingController::class)->group(function () {
        Route::get('/settings','index')->name('settings.index');
        Route::get('/settings/create','create')->name('settings.create');
        Route::post('/settings','store')->name('settings.store');
        Route::get('/settings/{setting}/edit','edit')->name('settings.edit');
        Route::get('/settings/{setting}/show','show')->name('settings.show');
        Route::put('/settings/{setting}','update')->name('settings.update');
        Route::delete('/settings/{setting}','destroy')->name('settings.destroy');
        Route::put('/settings/{setting}/restore','restore')->name('settings.restore');
        Route::get('/settings/{setting}/{lang}','lang')->name('settings.getlang');
        Route::put('/settings/{setting}/settranslation','settranslation')->name('settings.settranslation');
    });

    Route::controller(LTCMembershipCategoryController::class)->group(function () {
        Route::get('/ltcmembershipcategories','index')->name('ltcmembershipcategories.index');
        Route::get('/ltcmembershipcategories/create','create')->name('ltcmembershipcategories.create');
        Route::post('/ltcmembershipcategories','store')->name('ltcmembershipcategories.store');
        Route::get('/ltcmembershipcategories/{category}/edit','edit')->name('ltcmembershipcategories.edit');
        Route::get('/ltcmembershipcategories/{category}/show','show')->name('ltcmembershipcategories.show');
        Route::put('/ltcmembershipcategories/{category}','update')->name('ltcmembershipcategories.update');
        Route::delete('/ltcmembershipcategories/{category}','destroy')->name('ltcmembershipcategories.destroy');
        Route::put('/ltcmembershipcategories/{category}/restore','restore')->name('ltcmembershipcategories.restore');
        Route::get('/ltcmembershipcategories/{category}/{lang}','lang')->name('ltcmembershipcategories.getlang');
        Route::put('/ltcmembershipcategories/{category}/settranslation','settranslation')->name('ltcmembershipcategories.settranslation');
    });

    Route::controller(FileCategoryController::class)->group(function () {
        Route::get('/filecategories','index')->name('filecategories.index');
        Route::get('/filecategories/create','create')->name('filecategories.create');
        Route::post('/filecategories','store')->name('filecategories.store');
        Route::get('/filecategories/{category}/edit','edit')->name('filecategories.edit');
        Route::get('/filecategories/{category}/show','show')->name('filecategories.show');
        Route::put('/filecategories/{category}','update')->name('filecategories.update');
        Route::delete('/filecategories/{category}','destroy')->name('filecategories.destroy');
        Route::put('/filecategories/{category}/restore','restore')->name('filecategories.restore');
        Route::get('/filecategories/{category}/{lang}','lang')->name('filecategories.getlang');
        Route::put('/filecategories/{category}/settranslation','settranslation')->name('filecategories.settranslation');
    });

    Route::controller(PartnershipCategoryController::class)->group(function () {
        Route::get('/partnershipcategories','index')->name('partnershipcategories.index');
        Route::get('/partnershipcategories/create','create')->name('partnershipcategories.create');
        Route::post('/partnershipcategories','store')->name('partnershipcategories.store');
        Route::get('/partnershipcategories/{category}/edit','edit')->name('partnershipcategories.edit');
        Route::get('/partnershipcategories/{category}/show','show')->name('partnershipcategories.show');
        Route::put('/partnershipcategories/{category}','update')->name('partnershipcategories.update');
        Route::delete('/partnershipcategories/{category}','destroy')->name('partnershipcategories.destroy');
        Route::put('/partnershipcategories/{category}/restore','restore')->name('partnershipcategories.restore');
        Route::get('/partnershipcategories/{category}/{lang}','lang')->name('partnershipcategories.getlang');
        Route::put('/partnershipcategories/{category}/settranslation','settranslation')->name('partnershipcategories.settranslation');
    });

    Route::controller(AcademicFootprintCategoryController::class)->group(function () {
        Route::get('/academicfootprintcategories','index')->name('academicfootprintcategories.index');
        Route::get('/academicfootprintcategories/create','create')->name('academicfootprintcategories.create');
        Route::post('/academicfootprintcategories','store')->name('academicfootprintcategories.store');
        Route::get('/academicfootprintcategories/{category}/edit','edit')->name('academicfootprintcategories.edit');
        Route::get('/academicfootprintcategories/{category}/show','show')->name('academicfootprintcategories.show');
        Route::put('/academicfootprintcategories/{category}','update')->name('academicfootprintcategories.update');
        Route::delete('/academicfootprintcategories/{category}','destroy')->name('academicfootprintcategories.destroy');
        Route::put('/academicfootprintcategories/{category}/restore','restore')->name('academicfootprintcategories.restore');
        Route::get('/academicfootprintcategories/{category}/{lang}','lang')->name('academicfootprintcategories.getlang');
        Route::put('/academicfootprintcategories/{category}/settranslation','settranslation')->name('academicfootprintcategories.settranslation');
    });

    Route::controller(AcademicFootprintController::class)->group(function () {
        Route::get('/academicfootprints','index')->name('academicfootprints.index');
        Route::get('/academicfootprints/create','create')->name('academicfootprints.create');
        Route::post('/academicfootprints','store')->name('academicfootprints.store');
        Route::get('/academicfootprints/{footprint}/edit','edit')->name('academicfootprints.edit');
        Route::get('/academicfootprints/{footprint}/show','show')->name('academicfootprints.show');
        Route::put('/academicfootprints/{footprint}','update')->name('academicfootprints.update');
        Route::delete('/academicfootprints/{footprint}','destroy')->name('academicfootprints.destroy');
        Route::put('/academicfootprints/{footprint}/restore','restore')->name('academicfootprints.restore');
        Route::get('/academicfootprints/{footprint}/{lang}','lang')->name('academicfootprints.getlang');
        Route::put('/academicfootprints/{footprint}/settranslation','settranslation')->name('academicfootprints.settranslation');
    });

    Route::controller(NewsletterCategoryController::class)->group(function () {
        Route::get('/newslettercategories','index')->name('newslettercategories.index');
        Route::get('/newslettercategories/create','create')->name('newslettercategories.create');
        Route::post('/newslettercategories','store')->name('newslettercategories.store');
        Route::get('/newslettercategories/{category}/edit','edit')->name('newslettercategories.edit');
        Route::get('/newslettercategories/{category}/show','show')->name('newslettercategories.show');
        Route::put('/newslettercategories/{category}','update')->name('newslettercategories.update');
        Route::delete('/newslettercategories/{category}','destroy')->name('newslettercategories.destroy');
        Route::put('/newslettercategories/{category}/restore','restore')->name('newslettercategories.restore');
        Route::get('/newslettercategories/{category}/{lang}','lang')->name('newslettercategories.getlang');
        Route::put('/newslettercategories/{category}/settranslation','settranslation')->name('newslettercategories.settranslation');
    });

    Route::controller(PartnershipController::class)->group(function () {
        Route::get('/partnerships','index')->name('partnerships.index');
        Route::get('/partnerships/create','create')->name('partnerships.create');
        Route::post('/partnerships','store')->name('partnerships.store');
        Route::get('/partnerships/{partnership}/edit','edit')->name('partnerships.edit');
        Route::get('/partnerships/{partnership}/show','show')->name('partnerships.show');
        Route::put('/partnerships/{partnership}','update')->name('partnerships.update');
        Route::delete('/partnerships/{partnership}','destroy')->name('partnerships.destroy');
        Route::put('/partnerships/{partnership}/restore','restore')->name('partnerships.restore');
        Route::get('/partnerships/{partnership}/{lang}','lang')->name('partnerships.getlang');
        Route::put('/partnerships/{partnership}/settranslation','settranslation')->name('partnerships.settranslation');
        Route::get('/partnerships/downloadsingleattachment','downloadsingleattachment')->name('partnerships.downloadsingleattachment');
        Route::get('/partnerships/deletesingleattachment','deletesingleattachment')->name('partnerships.deletesingleattachment');
        Route::get('/partnerships/downloadallattachments','downloadallattachments')->name('posts.downloadallattachments');
    });

    Route::controller(LTCMembershipController::class)->group(function () {
        Route::get('/ltcmemberships','index')->name('ltcmemberships.index');
        Route::get('/ltcmemberships/create','create')->name('ltcmemberships.create');
        Route::post('/ltcmemberships','store')->name('ltcmemberships.store');
        Route::get('/ltcmemberships/{membership}/edit','edit')->name('ltcmemberships.edit');
        Route::get('/ltcmemberships/{membership}/show','show')->name('ltcmemberships.show');
        Route::put('/ltcmemberships/{membership}','update')->name('ltcmemberships.update');
        Route::delete('/ltcmemberships/{membership}','destroy')->name('ltcmemberships.destroy');
        Route::put('/ltcmemberships/{membership}/restore','restore')->name('ltcmemberships.restore');
        Route::get('/ltcmemberships/{membership}/{lang}','lang')->name('ltcmemberships.getlang');
        Route::put('/ltcmemberships/{membership}/settranslation','settranslation')->name('ltcmemberships.settranslation');
    });

    Route::controller(LTCSessionController::class)->group(function () {
        Route::get('/ltcsessions','index')->name('ltcsessions.index');
        Route::get('/ltcsessions/create','create')->name('ltcsessions.create');
        Route::post('/ltcsessions','store')->name('ltcsessions.store');
        Route::get('/ltcsessions/{session}/edit','edit')->name('ltcsessions.edit');
        Route::get('/ltcsessions/{session}/show','show')->name('ltcsessions.show');
        Route::put('/ltcsessions/{session}','update')->name('ltcsessions.update');
        Route::delete('/ltcsessions/{session}','destroy')->name('ltcsessions.destroy');
        Route::put('/ltcsessions/{session}/restore','restore')->name('ltcsessions.restore');
        Route::get('/ltcsessions/{session}/{lang}','lang')->name('ltcsessions.getlang');
        Route::put('/ltcsessions/{session}/settranslation','settranslation')->name('ltcsessions.settranslation');
    });

    Route::controller(FileController::class)->group(function () {
        Route::get('/files','index')->name('files.index');
        Route::get('/files/create','create')->name('files.create');
        Route::post('/files','store')->name('files.store');
        Route::get('/files/{file}/edit','edit')->name('files.edit');
        Route::get('/files/{file}/show','show')->name('files.show');
        Route::put('/files/{file}','update')->name('files.update');
        Route::delete('/files/{file}','destroy')->name('files.destroy');
        Route::put('/files/{file}/restore','restore')->name('files.restore');
        Route::get('/files/{file}/{lang}','lang')->name('files.getlang');
        Route::put('/files/{file}/settranslation','settranslation')->name('files.settranslation');
        Route::get('/files/downloadsingleattachment','downloadsingleattachment')->name('files.downloadsingleattachment');
        Route::get('/files/deletesingleattachment','deletesingleattachment')->name('files.deletesingleattachment');
    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/roles','index')->name('roles.index');
        Route::get('/roles/create','create')->name('roles.create');
        Route::post('/roles','store')->name('roles.store');
        Route::get('/roles/{role}/edit','edit')->name('roles.edit');
        Route::get('/roles/{role}/show','show')->name('roles.show');
        Route::put('/roles/{role}','update')->name('roles.update');
        Route::delete('/roles/{role}','destroy')->name('roles.destroy');
        Route::get('/roles/{role}/{lang}','lang')->name('roles.getlang');
        Route::put('/roles/{role}/settranslation','settranslation')->name('roles.settranslation');
    });

    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permissions','index')->name('permissions.index');
        Route::get('/permissions/create','create')->name('permissions.create');
        Route::post('/permissions','store')->name('permissions.store');
        Route::get('/permissions/{permission}/edit','edit')->name('permissions.edit');
        Route::get('/permissions/{permission}/show','show')->name('permissions.show');
        Route::put('/permissions/{permission}','update')->name('permissions.update');
        Route::delete('/permissions/{permission}','destroy')->name('permissions.destroy');
        Route::get('/permissions/{permission}/{lang}','lang')->name('permissions.getlang');
        Route::put('/permissions/{permission}/settranslation','settranslation')->name('permissions.settranslation');
    });

    Route::controller(ShortDurationCourseController::class)->group(function () {
        Route::get('/shortdurationcourses','index')->name('shortdurationcourses.index');
        Route::get('/shortdurationcourses/create','create')->name('shortdurationcourses.create');
        Route::post('/shortdurationcourses','store')->name('shortdurationcourses.store');
        Route::get('/shortdurationcourses/{course}/edit','edit')->name('shortdurationcourses.edit');
        Route::get('/shortdurationcourses/{course}/show','show')->name('shortdurationcourses.show');
        Route::put('/shortdurationcourses/{course}','update')->name('shortdurationcourses.update');
        Route::delete('/shortdurationcourses/{course}','destroy')->name('shortdurationcourses.destroy');
        Route::put('/shortdurationcourses/{course}/restore','restore')->name('shortdurationcourses.restore');
        Route::get('/shortdurationcourses/{course}/{lang}','lang')->name('shortdurationcourses.getlang');
        Route::put('/shortdurationcourses/{course}/settranslation','settranslation')->name('shortdurationcourses.settranslation');
        Route::get('/shortdurationcourses/downloadsingleattachment','downloadsingleattachment')->name('shortdurationcourses.downloadsingleattachment');
        Route::get('/shortdurationcourses/deletesingleattachment','deletesingleattachment')->name('shortdurationcourses.deletesingleattachment');
    });

    Route::controller(ShortDurationCourseClassController::class)->group(function () {
        Route::get('/shortdurationcourseclasses','index')->name('shortdurationcourseclasses.index');
        Route::get('/shortdurationcourseclasses/create','create')->name('shortdurationcourseclasses.create');
        Route::post('/shortdurationcourseclasses','store')->name('shortdurationcourseclasses.store');
        Route::get('/shortdurationcourseclasses/{class}/edit','edit')->name('shortdurationcourseclasses.edit');
        Route::get('/shortdurationcourseclasses/{class}/show','show')->name('shortdurationcourseclasses.show');
        Route::put('/shortdurationcourseclasses/{class}','update')->name('shortdurationcourseclasses.update');
        Route::delete('/shortdurationcourseclasses/{class}','destroy')->name('shortdurationcourseclasses.destroy');
        Route::put('/shortdurationcourseclasses/{class}/restore','restore')->name('shortdurationcourseclasses.restore');
        Route::get('/shortdurationcourseclasses/{class}/{lang}','lang')->name('shortdurationcourseclasses.getlang');
        Route::put('/shortdurationcourseclasses/{class}/settranslation','settranslation')->name('shortdurationcourseclasses.settranslation');
        Route::get('/shortdurationcourseclasses/downloadsingleattachment','downloadsingleattachment')->name('shortdurationcourseclasses.downloadsingleattachment');
        Route::get('/shortdurationcourseclasses/deletesingleattachment','deletesingleattachment')->name('shortdurationcourseclasses.deletesingleattachment');
    });

    Route::controller(ModelPermissionController::class)->group(function () {
        Route::get('/modelpermissions','index')->name('modelpermissions.index');
        Route::get('/modelpermissions/create','create')->name('modelpermissions.create');
        Route::post('/modelpermissions','store')->name('modelpermissions.store');
        Route::get('/modelpermissions/{permission}/edit','edit')->name('modelpermissions.edit');
        Route::get('/modelpermissions/{permission}/show','show')->name('modelpermissions.show');
        Route::put('/modelpermissions/{permission}','update')->name('modelpermissions.update');
        Route::delete('/modelpermissions/{permission}','destroy')->name('modelpermissions.destroy');
        Route::put('/modelpermissions/{permission}/restore','restore')->name('modelpermissions.restore');
        Route::get('/modelpermissions/{permission}/{lang}','lang')->name('modelpermissions.getlang');
        Route::put('/modelpermissions/{permission}/settranslation','settranslation')->name('modelpermissions.settranslation');
    });

});

Route::group(['middleware' => 'language'], function () {

    Route::get('/', function () {
        return view('main');
    })->name('home');

    Route::get('/ccd', function () {
        return view('ccd');
    });
    
    Route::get('/create-post', function () {
        // return view('create_post');
        return view('layouts.backend');
    });
    
    Route::get('/edicts', function () {
        return view('edicts');
    });
    
    Route::get('/recruitment', function () {
        return view('recruitment');
    });
    
    Route::get('/regulations', function () {
        return view('regulations');
    });
    
    Route::get('/academic-calendar', function () {
        return view('academic_calendar');
    });
    
    Route::get('/lang-center', function () {
        return view('lang_center');
    });
    
    Route::get('/privacy-policy', function () {
        return view('privacy_policy');
    });
    
    Route::get('/research-policy', function () {
        return view('research_policy');
    });
    
    Route::get('/research-impact-journal', function () {
        return view('research_impact_journal');
    });
    
    Route::get('/research-non-impact-journal', function () {
        return view('research_non_impact_journal');
    });
    
    Route::get('/research-cicsa', function () {
        return view('research_cicsa');
    });
    
    Route::get('/research-cieg', function () {
        return view('research_cieg');
    });
    
    Route::get('/project-guide', function () {
        return view('project_guide');
    });
    
    Route::get('/extension-programmes', function () {
        return view('extension_programmes');
    });
    
    Route::get('/research-programmes', function () {
        return view('research_programmes');
    });
    
    Route::get('/extension-career', function () {
        return view('extension_career');
    });
    
    Route::get('/extension-policy', function () {
        return view('extension_policy');
    });
    
    Route::get('/help', function () {
        return view('help');
    });
    
    Route::get('/contact', function () {
        return view('contact');
    });
    
    Route::get('/donations', function () {
        return view('donations');
    });
    
    Route::get('/donations-single', function () {
        return view('donations_single');
    });
    
    Route::get('/labs', function () {
        return view('labs');
    });
    
    Route::get('/library', function () {
        return view('library');
    });
    
    // Route::get('/lecturers', function () {
    //     return view('lecturers');
    // });
    
    Route::get('/lecturers-all', function () {
        return view('lecturers');
    });
    
    Route::get('/lecturers-single', function () {
        return view('lecturers_single');
    });
    
    Route::get('/lecturers-single-new-ms', function () {
        return view('lecturers_single_new_ms');
    });
    
    Route::get('/lecturers-single-new-js', function () {
        return view('lecturers_single_new_js');
    });
    
    Route::get('/lecturers-single-new-am', function () {
        return view('lecturers_single_new_am');
    });
    
    Route::get('/newsletters', function () {
        return view('boletim');
    });
    
    Route::get('/news', function () {
        return view('news');
    });
    
    Route::get('/news-single', function () {
        return view('news_single');
    });
    
    Route::get('/lect-pro', function () {
        return view('lec_pro');
    });
    
    Route::get('/events', function () {
        return view('events');
    });
    
    Route::get('/events-single', function () {
        return view('events_single');
    });
    
    Route::get('/board-msg', function () {
        return view('board_msg');
    });
    
    Route::get('/institutional-presentation', function () {
        return view('institutional_presentation');
    });
    
    Route::get('/mvv', function () {
        return view('mvv');
    });
    
    Route::get('/history', function () {
        return view('history');
    });
    
    Route::get('/infrastructure', function () { 
        return view('infrastructure');
    });
    
    Route::get('/protocols', function () {
        return view('protocols');
    });
    
    Route::get('/social-welfare', function () {
        return view('social_welfare');
    });
    
    Route::get('/extra-activities', function () {
        return view('extra_activities');
    });
    
    Route::get('/health', function () {
        return view('health');
    });
    
    Route::get('/det', function () {
        return view('det');
    });
    
    Route::get('/dcsa', function () {
        return view('dcsa');
    });
    
    Route::get('/dgc', function () {
        return view('dgc');
    });
    
    Route::get('/student-mobility', function () {
        return view('student_mobility');
    });
    
    Route::get('/alumni', function () {
        return view('alumni');
    });

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
