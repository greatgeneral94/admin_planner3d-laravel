<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\FileUploadController;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/admin/{page}', [App\Http\Controllers\HomeController::class, 'page']);
Route::get('/b1/{page1}', [App\Http\Controllers\HomeController::class, 'page1']);
Route::get('/c1/{page1}', [App\Http\Controllers\HomeController::class, 'page2']);

// Admin 
Route::get('/users/{id}/impersonat', [App\Http\Controllers\Admin\UserController::class, 'impersonate'])->name('impersonate');
Route::group(['middleware' => 'user_type'], function () {

    
    // Admin Links 
    Route::get('/admins/index', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
    Route::get('/admins/create', [App\Http\Controllers\Admin\AdminController::class, 'create'])->name('admin.create');
    Route::post('/admins/store', [App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admin.store');
    Route::get('/admins/edit/{id}', [App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admins/update/{id}', [App\Http\Controllers\Admin\AdminController::class, 'update'])->name('admin.update');
    Route::get('/admins/delete/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete'])->name('admin.delete');
    
    Route::group(['middleware' => ['auth']], function() {
        Route::get('/roles/destroy/{id}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->name('roles.delete');
        Route::resource('roles', RoleController::class);
    });
    
    // Users Links 
    Route::get('/admins/user/index', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user-list');
    Route::get('/admins/user/edit/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/admins/user/update/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
    Route::get('/chatifys/{id}', [App\Http\Controllers\Admin\UserController::class, 'chatify'])->name('admin.message.chatify');
    
    // Project Link 
    Route::get('/admins/planner/index', [App\Http\Controllers\Admin\PlannerController::class, 'index'])->name('admin.planner.index');
    Route::get('/admins/planner/create', [App\Http\Controllers\Admin\PlannerController::class, 'create'])->name('admin.planner.create');
    Route::post('/admins/planner/store', [App\Http\Controllers\Admin\PlannerController::class, 'store'])->name('admin.planner.store');
    Route::get('/admins/planner/delete/{id}', [App\Http\Controllers\Admin\PlannerController::class, 'delete'])->name('admin.planner.delete');
    Route::get('/admins/planner/edit/{id}', [App\Http\Controllers\Admin\PlannerController::class, 'edit'])->name('admin.planner.edit');
    Route::post('/admins/planner/update/{id}', [App\Http\Controllers\Admin\PlannerController::class, 'update'])->name('admin.planner.update');
    Route::get('file-upload', [FileUploadController::class, 'index'])->name('files.index');
    Route::post('file-upload/upload-large-files', [FileUploadController::class, 'uploadLargeFiles'])->name('files.upload.large');
    
    // Trail Links
    Route::get('/admins/trail/index', [App\Http\Controllers\Admin\TrailController::class, 'index'])->name('admin.trail.index');
    Route::post('/admins/trail/store', [App\Http\Controllers\Admin\TrailController::class, 'store'])->name('admin.trail.post');
    
    // Free Days Links
    Route::get('/admins/gift_days/index', [App\Http\Controllers\Admin\GiftDaysController::class, 'index'])->name('admin.gift_days.index');
    Route::get('/admins/gift_days/create', [App\Http\Controllers\Admin\GiftDaysController::class, 'create'])->name('admin.gift_days.create');
    Route::post('/admins/gift_days/store', [App\Http\Controllers\Admin\GiftDaysController::class, 'store'])->name('admin.gift_days.store');
    Route::get('/admins/gift_days/edit/{id}', [App\Http\Controllers\Admin\GiftDaysController::class, 'edit'])->name('admin.gift_days.edit');
    Route::post('/admins/gift_days/update/{id}', [App\Http\Controllers\Admin\GiftDaysController::class, 'update'])->name('admin.gift_days.update');
    Route::get('/admins/gift_days/delete/{id}', [App\Http\Controllers\Admin\GiftDaysController::class, 'delete'])->name('admin.gift_days.delete');

    
    // Profile  links
    Route::post('admin/profile/edit/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profile.update');
    
    
    // Todo Links 
    Route::get('admin/todo/index', [App\Http\Controllers\Admin\TodoController::class, 'index'])->name('admin.todo.index');
    Route::post('admin/todo/insert', [App\Http\Controllers\Admin\TodoController::class, 'insert'])->name('admin.todo.insert');
    Route::get('admin/todo/favorite/{id}', [App\Http\Controllers\Admin\TodoController::class, 'favorite'])->name('admin.todo.favorite');
    Route::get('admin/todo/trash/{id}', [App\Http\Controllers\Admin\TodoController::class, 'trash'])->name('admin.todo.trash');
    Route::get('admin/todo/completed/{id}', [App\Http\Controllers\Admin\TodoController::class, 'completed'])->name('admin.todo.completed');
    Route::post('admin/todo/update', [App\Http\Controllers\Admin\TodoController::class, 'update'])->name('admin.todo.update');
    Route::post('admin/todo/getfavorite', [App\Http\Controllers\Admin\TodoController::class, 'getfavorite'])->name('admin.todo.getfavorite');

    
});
Route::get('/profile/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile.edit');

Route::get('/users/stop', [App\Http\Controllers\Admin\UserController::class, 'stopImpersonate'])->name('impersonate.logout');






Route::get('/{id}', [App\Http\Controllers\B1\Planner3DController::class, 'index'])->name('planner.show');

// B1 Links 
Route::get('/b1/user/index', [App\Http\Controllers\B1\UserController::class, 'index'])->name('b1.user.index');
Route::get('/b1/user/create', [App\Http\Controllers\B1\UserController::class, 'create'])->name('b1.user.create');
Route::post('/b1/user/store', [App\Http\Controllers\B1\UserController::class, 'store1'])->name('b1.user.store');
Route::get('/b1/user/edit/{id}', [App\Http\Controllers\B1\UserController::class, 'edit'])->name('b1.user.edit');
Route::post('/b1/user/update/{id}', [App\Http\Controllers\B1\UserController::class, 'update'])->name('b1.user.update');
Route::get('/b1/user/delete/{id}', [App\Http\Controllers\B1\UserController::class, 'delete'])->name('b1.user.delete');

// Update Planner 
Route::get('/b1/planner/update', [App\Http\Controllers\B1\PlannerUpdateController::class, 'index'])->name('b1.planner.update');

Route::get('b1/version/index', [App\Http\Controllers\B1\PlannerUpdateController::class, 'version'])->name('b1.version.index');
Route::post('b1/version/update', [App\Http\Controllers\B1\PlannerUpdateController::class, 'update'])->name('b1.version.update');

// Upgrade Planner Plan 
Route::get('upgrade/planner/plan', [App\Http\Controllers\B1\PlannerUpdateController::class, 'plan'])->name('upgrade.planner.plan');
Route::post('upgrade/planner/plan_submit', [App\Http\Controllers\B1\PlannerUpdateController::class, 'plan_submit'])->name('upgrade.planner.plan.submit');
Route::get('upgrade/planner/code', [App\Http\Controllers\B1\PlannerUpdateController::class, 'code'])->name('planner.code');
Route::post('upgrade/planner/plan', [App\Http\Controllers\B1\PlannerUpdateController::class, 'send_code'])->name('subscription.code.submit');

// Subscriptions

Route::get('b1/subscription/index', [App\Http\Controllers\B1\SubscriptionHistoryController::class, 'index'])->name('b1.subscription.index');


// Profile  link 
Route::post('b1/profile/edit/{id}', [App\Http\Controllers\B1\ProfileController::class, 'update'])->name('b1.profile.update');


// Todo Links 
Route::get('b1/todo/index', [App\Http\Controllers\B1\TodoController::class, 'index'])->name('b1.todo.index');
Route::post('b1/todo/insert', [App\Http\Controllers\B1\TodoController::class, 'insert'])->name('b1.todo.insert');
Route::get('b1/todo/favorites/{id}', [App\Http\Controllers\B1\TodoController::class, 'favorite'])->name('b1.todo.favorite');
Route::get('b1/todo/trashs/{id}', [App\Http\Controllers\B1\TodoController::class, 'trash'])->name('b1.todo.trash');
Route::get('b1/todo/completeds/{id}', [App\Http\Controllers\B1\TodoController::class, 'completed'])->name('b1.todo.completed');
Route::post('b1/todo/update', [App\Http\Controllers\B1\TodoController::class, 'update'])->name('b1.todo.update');




// C1 Links
Route::get('/c/project/index', [App\Http\Controllers\C1\ProjectController::class, 'index'])->name('c.project.index');
Route::get('/c/project/create', [App\Http\Controllers\C1\ProjectController::class, 'create'])->name('c.project.create');
Route::post('/c/project/store', [App\Http\Controllers\C1\ProjectController::class, 'store'])->name('c.project.store');
Route::get('/c/project/delete/{id}', [App\Http\Controllers\C1\ProjectController::class, 'delete'])->name('c.project.delete');

// login 
Route::post('/c/login', [App\Http\Controllers\C1\AuthController ::class, 'login'])->name('c.user.login');
Route::post('/c/audio', [App\Http\Controllers\C1\AuthController ::class, 'audio'])->name('audio');
Route::post('/c/store', [App\Http\Controllers\C1\AuthController ::class, 'store'])->name('c.user.store');


// Chat Link 
Route::get('/chat/index', [App\Http\Controllers\ChatController::class, 'index'])->name('chat.index');
Route::get('/chat/avatar', [App\Http\Controllers\ChatController::class, 'avatar'])->name('remove.avatar');

// Profile  link 
Route::post('c1/profile/edit/{id}', [App\Http\Controllers\C1\ProfileController::class, 'update'])->name('c1.profile.update');









Route::group(['namespace'=>'App\Http\Controllers'],function(){
    Route::get('event','EventController@index')->name('event');  
    Route::get('event-list','EventController@event_list');  
    Route::post('event','EventController@save_event');  
    Route::get('all-event','EventController@all_event')->name('all-event');
    Route::get('single-event/{id}','EventController@single_event');
    Route::post('update-event','EventController@update_event');
    Route::post('delete-event','EventController@delete_event')->name('delete_event');
  });
  
