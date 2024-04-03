<?php

// use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Models\Experience;
use App\Models\Portofolio;
use App\Models\SectionProfile;
use App\Models\Skill;
use App\Models\Social;
use App\Models\Titleexperience;
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

// Index Route (Landing Page)
Route::get('/', function () {
    $socials = Social::all();
    $sectionprofiles = SectionProfile::all();
    $skills = Skill::all();
    $experiences = Experience::all();
    $titleexperiences = Titleexperience::all();
    $column1skills = $skills->chunk(ceil($skills->count() / 2))->first(); //split skills data into two array
    $column2skills = $skills->chunk(ceil($skills->count() / 2))->last();
    $portofolios = Portofolio::all();
    return view('index', [
        'title' => 'Home',
        'socials' => $socials,
        'sectionprofiles' => $sectionprofiles,
        'experiences' => $experiences,
        'titleexperiences' => $titleexperiences,
        'column1skills' => $column1skills,
        'column2skills' => $column2skills,
        'portofolio' => $portofolios,
        'skill' => $skills,
    ]);
})->name('index');

Route::post('/send-email', [AdminController::class, 'sendemail'])->name('send.email');

// profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->name('admin.')->prefix('admin')->group(function(){
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');

    Route::name('campur.')->prefix('campur')->group(function(){
        Route::get('aboutme', [AdminController::class, 'aboutme'])->name('aboutme');
        Route::patch('updateaboutme/{id}', [AdminController::class, 'updateaboutme'])->name('aboutme.update');
        
        Route::get('skills', [AdminController::class, 'skills'])->name('skills');
        Route::get('skills/create', [AdminController::class, 'createskills'])->name('skills.create');
        Route::post('skills/create-proses', [AdminController::class, 'storeskills'])->name('skills.store');
        Route::delete('skills/destroy/{id}', [AdminController::class, 'destroyskills'])->name('skills.destroy');
        Route::get('skills/{id}/edit', [AdminController::class, 'editskills'])->name('skills.edit');
        Route::patch('skills/{id}', [AdminController::class, 'updateskills'])->name('skills.update');

        Route::get('portofolio', [AdminController::class, 'portofolio'])->name('portofolio');
        Route::get('portofolio/create', [AdminController::class, 'createportofolio'])->name('portofolio.create');
        Route::post('portofolio/create-proses', [AdminController::class, 'storeportofolio'])->name('portofolio.store');
        Route::delete('portofolio/destroy{id}', [AdminController::class, 'destroyportofolio'])->name('portofolio.destroy');
        Route::get('portofolio/{id}/edit', [AdminController::class, 'editportofolio'])->name('portofolio.edit');
        Route::patch('portofolio/{id}', [AdminController::class, 'updateportofolio'])->name('portofolio.update');

        Route::get('experience', [AdminController::class, 'experience'])->name('experience');
        Route::get('experience/create', [AdminController::class, 'createexperience'])->name('experience.create');
        Route::post('experience/create-proses', [AdminController::class, 'storeexperience'])->name('experience.store');
        Route::delete('experience/{id}', [AdminController::class, 'destroyexperience'])->name('experience.destroy');
        Route::get('experience/{id}/edit', [AdminController::class, 'editexperience'])->name('experience.edit');
        Route::patch('experience/{id}', [AdminController::class, 'updateexperience'])->name('experience.update');

    });

    // Exclude 'edit-section' route from Route::resource()
    Route::resource('edit-section', AdminController::class)->except(['show']);
});

require __DIR__.'/auth.php';