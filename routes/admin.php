<?php

//use App\Http\Controllers\Admin\MembersController;
use Illuminate\Support\Facades\Route;




Route::get('/admin-login', [\App\Http\Controllers\Admin\AdminController::class,'loginpage'])->name('admin.login');
Route::post('/admin-check', [\App\Http\Controllers\Admin\AdminController::class,'login'])->name('admin.checklogin');


Route::middleware('admin')->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class,'index'])->name('home');
    Route::resources([
        'abouts' => \App\Http\Controllers\Admin\AboutController::class,
        'branches' => \App\Http\Controllers\Admin\BranchController::class,
        'sliders' => \App\Http\Controllers\Admin\SliderController::class,
        'blogs' => \App\Http\Controllers\Admin\BlogController::class,
        'categories' => \App\Http\Controllers\Admin\CategoriesController::class,
        'settings' => \App\Http\Controllers\Admin\SettingController::class,
        'references' => \App\Http\Controllers\Admin\ReferencesController::class,
        'products' => \App\Http\Controllers\Admin\ProductsController::class,
        'agreements' => \App\Http\Controllers\Admin\AgreementsController::class,
        'team_members' => \App\Http\Controllers\Admin\TeamMembersController::class,
        'services' => \App\Http\Controllers\Admin\ServicesController::class,
        'catalogs' => \App\Http\Controllers\Admin\CatalogsController::class,
    ]);

    // routes/admin.php veya web.php

    Route::get('/branches/change-current-branch/{id}', [App\Http\Controllers\Admin\BranchController::class, 'changeCurrentBranch'])
        ->name('admin.branches.changeCurrentBranch');


    Route::get('/cikis', [\App\Http\Controllers\Admin\AdminController::class,'logout'])->name('admin.logout');
});


