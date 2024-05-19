<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\GinasiosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscricaoController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VisitasController;
use Illuminate\Support\Facades\Auth;
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
    return view('site.home');
})->name('index')->middleware(['auth']);

Route::middleware(['auth'])->group(
    function () {
        Route::resources([
            'ginasios' => GinasiosController::class,
            'utilizadores' => UsersController::class,
            'categorias' => CategoriasController::class,
            'inscricoes' => InscricaoController::class,
        ]);
    }
);

Route::prefix('site')->name('site.')->group(function () {
    // Aqui vão as rotas do grupo "admin"
    Route::get('detalhes/{id}',  [GinasiosController::class, 'show'])->name('detalhes');
    Route::get('utilizador/{utilizador}', [UsersController::class, 'site'])->name('user');
});

Route::middleware(['auth'])->group(
    function () {
        Route::prefix('admin')->name('admin.')->group(function () {
            // Aqui vão as rotas do grupo "admin"
            Route::get('/', [HomeController::class, 'index'])->name('dashboard');
            Route::get('ginasios', [GinasiosController::class, 'index'])->name('ginasios');
            Route::put('ginasios/{ginasio}', [GinasiosController::class, 'hours'])->name('ginasios.hours');
            Route::get('ginasios/perfil/{ginasio}', [GinasiosController::class, 'edit'])->name('ginasios.perfil');
            Route::view('ginasios/adicionar', 'admin.ginasios.adicionar')->name('ginasios.adicionar');

            Route::get('categorias', [CategoriasController::class, 'index'])->name('categorias');
            
            Route::get('utilizador/{utilizador}', [UsersController::class, 'admin'])->name('user');
        });
    }
);



/* 
    Routas para login
*/
Route::view('login', 'auth.login')->name('login');
Route::prefix('auth')->name('auth.')->group(function () {
    Route::view('resistar', 'auth.resistrar')->name('resistrar');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/visita', [VisitasController::class, 'store'])->name('visita')->middleware('auth');
