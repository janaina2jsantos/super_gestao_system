<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

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

Route::get('/', 'HomeController@index')->name('site.index');
Route::get('/about/{company}', 'AboutController@index')->name('site.about');
// site contact
Route::get('/contact', 'ContactController@create')->name('site.contact.create');
Route::post('/contact', 'ContactController@store')->name('site.contact.store');
// login
Route::get('/login/{error?}', 'LoginController@index')->name('site.login.index');
Route::post('/login', 'LoginController@login')->name('site.login');

// using customized middlewares created in Kernel file
Route::group(['middleware' => ['my.log', 'my.auth'], 'prefix' => '/app'], function() {
    // dashboard
    Route::get('/home', 'AppController@index')->name('app.home');

    // clients
    Route::get('/clients', 'ClientController@index')->name('app.clients.index');
    Route::get('/clients/create', 'ClientController@create')->name('app.clients.create');
    Route::post('/clients/create', 'ClientController@store')->name('app.clients.store');
    Route::get('/clients/{id}/show', 'ClientController@show')->name('app.clients.show');
    Route::get('/clients/{id}/edit', 'ClientController@edit')->name('app.clients.edit');
    Route::put('/clients/{id}/edit', 'ClientController@update')->name('app.clients.update');
    Route::delete('/clients/{id}/delete', 'ClientController@destroy')->name('app.clients.destroy');

    // providers
    Route::get('/providers', 'ProviderController@index')->name('app.providers.index');
    Route::get('/providers/list', 'ProviderController@list')->name('app.providers.list');
    Route::post('/providers/list', 'ProviderController@list')->name('app.providers.list');
    Route::get('/providers/create', 'ProviderController@create')->name('app.providers.create');
    Route::post('/providers/create', 'ProviderController@create')->name('app.providers.create');
    Route::get('/providers/{id}/show', 'ProviderController@show')->name('app.providers.show');
    Route::get('/providers/{id}/edit', 'ProviderController@edit')->name('app.providers.edit');
    Route::get('/providers/{id}/delete', 'ProviderController@destroy')->name('app.providers.destroy');

    // orders
    Route::get('/orders', 'OrderController@index')->name('app.orders.index');
    Route::get('/orders/create', 'OrderController@create')->name('app.orders.create');
    Route::post('/orders/create', 'OrderController@store')->name('app.orders.store');
    Route::get('/orders/{id}/show', 'OrderController@show')->name('app.orders.show');
    Route::get('/orders/{id}/edit', 'OrderController@edit')->name('app.orders.edit');
    Route::put('/orders/{id}/edit', 'OrderController@update')->name('app.orders.update');
    Route::delete('/orders/{id}/delete', 'OrderController@destroy')->name('app.orders.destroy');

    // order-product
    Route::get('/order-product/create/{id}', 'OrderProductController@create')->name('app.order-product.create');
    Route::post('/order-product/create/{id}', 'OrderProductController@store')->name('app.order-product.store');
    // Route::delete('/order-product/delete/{order}/{product}', 'OrderProductController@destroy')->name('app.order-product.destroy');
    Route::delete('/order-product/delete/{idOrderProduct}/{idOrder}', 'OrderProductController@destroy')->name('app.order-product.destroy');

    // products
    Route::get('/products', 'ProductController@index')->name('app.products.index');
    Route::get('/products/create', 'ProductController@create')->name('app.products.create');
    Route::post('/products/create', 'ProductController@store')->name('app.products.store');
    Route::get('/products/{id}/show', 'ProductController@show')->name('app.products.show');
    Route::get('/products/{id}/edit', 'ProductController@edit')->name('app.products.edit');
    Route::put('/products/{id}/edit', 'ProductController@update')->name('app.products.update');
    Route::delete('/products/{id}/delete', 'ProductController@destroy')->name('app.products.destroy');

    // products-details
    Route::get('/products-details', 'ProductDetailController@index')->name('app.products-details.index');
    Route::get('/products-details/create', 'ProductDetailController@create')->name('app.products-details.create');
    Route::post('/products-details/create', 'ProductDetailController@store')->name('app.products-details.store');
    Route::get('/products-details/{id}/show', 'ProductDetailController@show')->name('app.products-details.show');
    Route::get('/products-details/{id}/edit', 'ProductDetailController@edit')->name('app.products-details.edit');
    
    Route::put('/products-details/{id}/edit', 'ProductDetailController@update')->name('app.products-details.update');

    Route::delete('/products-details/{id}/delete', 'ProductDetailController@destroy')->name('app.products-details.destroy');

    // logout
    Route::get('/logout', 'LoginController@logout')->name('app.logout');

});


// ==========================================================================

// ** Redirect de rotas

// Route::get('/rota01', function() {
       
//     echo "Rota 01";

// })->name('site.rota01');

// Route::get('/rota02', function() {
      
//     return redirect()->route('site.rota01');

// })->name('site.rota02');

// Route::redirect('/rota02', '/rota01');


// ==========================================================================

// ** Rotas com parâmetros

// nome, categoria, assunto, msg
// Route::get('/contato/{nome}/{categoria}/{assunto?}', function(string $nome, string $categoria, string $assunto='default') {
//     echo "Agradecemos o contato, " . $nome . " - " . $categoria . " - " . $assunto;
// });


// Route::get('/contato/{nome}/{categoria_id}', function(string $nome, int $categoria_id = 1) {

//     echo "Agradecemos o contato, " . $nome . " - " . $categoria_id;

// })->where('nome', '[A-Za-z]+') // aceitar só caracteres
//   ->where('categoria_id', '[0-9]+'); // aceitar só números

Route::get('/teste/{p1}/{p2}', 'TesteController@index')->name('site.teste');


// ==========================================================================

// ** Rota de FallBack (customizar erro 404)
Route::fallback(function() {
    return "Essa página não existe! <a href='/'>Clique aqui para voltar.</a>";
});