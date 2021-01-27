<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/contato', function(){
    return view('site.contato'); // o . eh para acessar a pasta
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias/{flag}', function($flag){
    return "Testando params: {$flag}";
});

Route::get('/produtos/{idProduto?}', function($idProduto = ""){
    return "Produtos do tipo: {$idProduto}";
});

// Route::get('/redirect1', function(){
//     return redirect('/redirect2');
// });

Route::redirect('/redirect1', 'redirect2'); 

Route::get('/redirect2', function(){
    return 'redirect2';
});

Route::get('/nome-url', function(){
    return "Teste de rota nomeada";
})->name('url.name');

Route::get('/redirect3', function(){
    return redirect()->route('url.name');
});

Route::middleware([])->group(function(){
// Route::middleware(['auth'])->group(function(){
    
    Route::prefix('admin')->group(function(){
        
        Route::namespace('App\Http\Controllers\Admin')->group(function(){
            
            Route::name('admin.')->group(function(){
                Route::get('dashboard', 'TesteController@teste')->name('dashboard');
                
                Route::get('financeiro', 'TesteController@teste')->name('financeiro');
                
                Route::get('produtos', 'TesteController@teste')->name('produtos');
                
                Route::get('/', function(){
                    return redirect()->route('admin.dashboard');
                });
                
            });
            
            // Route::get('dashboard', 'App\Http\Controllers\Admin\TesteController@teste');
            // 
            // Route::get('financeiro', 'App\Http\Controllers\Admin\TesteController@teste');
            // 
            // Route::get('produtos', 'App\Http\Controllers\Admin\TesteController@teste');
            // 
            // Route::get('/', 'App\Http\Controllers\Admin\TesteController@teste');
            
        });
        
    });
});
// Route::get('/admin/dashboard', function(){
//     return 'Home Admin';
// })->middleware('auth');
// 
// Route::get('/admin/financeiro', function(){
//     return 'Financeiro Admin';
// })->middleware('auth');
// 
// Route::get('/admin/produtos', function(){
//     return 'Produtos Admin';
// })->middleware('auth');


Route::get('/login', function(){
    return 'Login';
})->name('login');