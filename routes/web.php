<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BouwtypeController;
use App\Http\Controllers\IndelingController;
use App\Http\Controllers\MakelaarController;
use App\Http\Controllers\NieuwTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TechnischController;
use App\Http\Controllers\VoorziningenController;
use App\Http\Controllers\WoningController;
use App\Http\Controllers\WoningTypeController;
use App\Models\Bouwtype;
use App\Models\Makelaar;
use App\Models\NieuwType;
use App\Models\Voorziningen;
use App\Models\Woning;
use App\Models\WoningType;
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

Route::get('/', function () {
    return view('welcome' , ['woningHuis' => Woning::all() , 'woning_types'=>WoningType::all(), 'bouwtypes'=>Bouwtype::all(), 'nieuwTypes'=>NieuwType::all()]);
})->name('home');


// Route::get('', function () {
//     return view('dashboard' , ['woningHuis' => Woning::all() , 'woning_types'=>WoningType::all(), 'bouwtypes'=>Bouwtype::all(), 'nieuwTypes'=>NieuwType::all(), 'voorziningen'=>Voorziningen::all()]);
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::group(['namespase'=> 'Admin', 'prefix'=>'admin', 'middleware'=>['auth', 'admin']], function(){
//     Route::get('', function () {
//         return view('dashboard' , ['woningHuis' => Woning::all() , 'woning_types'=>WoningType::all(), 'bouwtypes'=>Bouwtype::all(), 'nieuwTypes'=>NieuwType::all(), 'voorziningen'=>Voorziningen::all()]);
//     })->name('dashboard');
// });


// Route::get('', [AdminController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::middleware(['admin'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard' , 
        ['woningHuis' => Woning::all() ,
         'woning_types'=>WoningType::all(),
          'bouwtypes'=>Bouwtype::all(),
           'nieuwTypes'=>NieuwType::all(),
            'voorziningen'=>Voorziningen::all(),
            'makelaars'=>Makelaar::all(),
        ]);
    })->name('dashboard.admin');

// Woning
    Route::resource('/woning', WoningController::class)->only(['index', 'show' , 'create', 'store']);
    Route::post('/woning/store', [WoningController::class, 'store'])->Middleware('auth');
    Route::get('/woning/edit/{woningId}', [WoningController::class, 'edit'])->middleware('auth');
    Route::put('/woning/update/{woningId}', [WoningController::class, 'update'])->middleware('auth');
    Route::delete('/{woningId}', [WoningController::class, 'destroy'])->middleware('auth')->name('woning.destroy');

    /* woningType */
Route::resource('/woningType', WoningTypeController::class)->only(['index', 'show', 'create', 'store']);
Route::post('/woningType/store', [WoningTypeController::class, 'store'])->Middleware('auth');
Route::put('/woningType/update/{woningType}', [WoningTypeController::class, 'update'])->middleware('auth');
Route::delete('/woningType/{typeId}', [WoningTypeController::class, 'destroy'])->middleware('auth');

// Bouwtype
Route::resource('/bouwtype', BouwtypeController::class)->only(['index', 'show', 'create', 'store']);
Route::post('/bouwtype/store', [BouwtypeController::class, 'store'])->Middleware('auth');
Route::put('/bouwtype/update/{bouwtype}', [BouwtypeController::class, 'update'])->middleware('auth');
Route::delete('/bouwtype/{typeId}', [BouwtypeController::class, 'destroy'])->middleware('auth');

// NieuwType
Route::resource('/nieuwtype', NieuwTypeController::class)->only(['index', 'show', 'create', 'store']);
Route::post('/nieuwtype/store', [NieuwTypeController::class, 'store'])->Middleware('auth');
Route::put('/nieuwtype/update/{nieuwType}', [NieuwTypeController::class, 'update'])->middleware('auth');
Route::delete('/nieuwtype/{typeId}', [NieuwTypeController::class, 'destroy'])->middleware('auth');

// Voorziningen
Route::resource('/voorziningen', VoorziningenController::class)->only(['index', 'show', 'create', 'store']);

Route::post('/voorziningen/store', [VoorziningenController::class, 'store'])->Middleware('auth');
Route::put('/voorziningen/update/{voorzining}', [VoorziningenController::class, 'update'])->middleware('auth');
Route::delete('/voorziningen/{voorziningId}', [VoorziningenController::class, 'destroy'])->middleware('auth');

// Technisch
Route::resource('/technisch', TechnischController::class)->only(['index', 'show', 'create', 'store']);
Route::get('/woning/{id}/addtechnisch', [TechnischController::class, 'create'])->middleware('auth');
Route::get('/woning/{id}/edittechnisch', [TechnischController::class, 'edit'])->middleware('auth');
Route::put('/technisch/{id}/update', [TechnischController::class, 'update'])->middleware('auth')->name('technisch.update');

// Indeling
Route::resource('/indeling', IndelingController::class)->only(['index', 'show', 'create', 'store']);
Route::get('/woning/{id}/addindeling' , [IndelingController::class, 'create'])->middleware('auth');
Route::get('/woning/{id}/editindeling', [IndelingController::class, 'edit'])->middleware('auth');
Route::put('/indeling/{id}/update', [IndelingController::class, 'update'])->middleware('auth')->name('indeling.update');
// Route::delete('/woning{id}/deleteindeling/', [IndelingController::class, 'destroy'])->middleware('auth')->name('indeling.destroy');


// Makelaar
Route::resource('/makelaar', MakelaarController::class)->only(['index', 'show', 'create', 'store']);
Route::post('/makelaar/store', [MakelaarController::class, 'store'])->Middleware('auth');
Route::put('/makelaar/update/{makelaar}', [MakelaarController::class, 'update'])->middleware('auth');
Route::delete('/makelaar/{makelaarId}', [MakelaarController::class, 'destroy'])->middleware('auth');


});






Route::resource('/woning', WoningController::class)->only(['index', 'show']);

require __DIR__.'/auth.php';









