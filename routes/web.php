<?php

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

///// AUTH /////
Auth::routes();

///// WEB /////
// Inicio
Route::get('/', 'WebController@index')->name('home');
Route::get('/tienda', 'WebController@shop')->name('tienda');
Route::get('/carrito', 'WebController@cart')->name('carrito');
Route::get('/carrito/{slug}', 'WebController@addCart')->name('carrito.add');
Route::get('/producto/{slug}', 'WebController@productSingle')->name('web.producto');

///// ADMIN /////
// Inicio
Route::get('/misterfix', 'AdminController@index')->name('admin');

// Usuarios
Route::get('/misterfix/usuarios', 'UserController@index')->name('usuarios.index');
Route::get('/misterfix/usuarios/registrar', 'UserController@create')->name('usuarios.create');
Route::post('/misterfix/usuarios', 'UserController@store')->name('usuarios.store');
Route::get('/misterfix/usuarios/{slug}', 'UserController@show')->name('usuarios.show');
Route::get('/misterfix/usuarios/{slug}/editar', 'UserController@edit')->name('usuarios.edit');
Route::put('/misterfix/usuarios/{slug}', 'UserController@update')->name('usuarios.update');
Route::delete('/misterfix/usuarios/{slug}', 'UserController@destroy')->name('usuarios.destroy');
// Route::get('/misterfix/perfil', 'UserController@profile')->name('usuarios.profile');

// Categorias
Route::get('/misterfix/categorias', 'CategoryController@index')->name('categorias.index');
Route::get('/misterfix/categorias/registrar', 'CategoryController@create')->name('categorias.create');
Route::post('/misterfix/categorias', 'CategoryController@store')->name('categorias.store');
Route::get('/misterfix/categorias/{slug}', 'CategoryController@show')->name('categorias.show');
Route::get('/misterfix/categorias/{slug}/editar', 'CategoryController@edit')->name('categorias.edit');
Route::put('/misterfix/categorias/{slug}', 'CategoryController@update')->name('categorias.update');
Route::delete('/misterfix/categorias/{slug}', 'CategoryController@destroy')->name('categorias.destroy');

// Subcategorias
Route::get('/misterfix/subcategorias', 'SubcategoryController@index')->name('subcategorias.index');
Route::get('/misterfix/subcategorias/registrar', 'SubcategoryController@create')->name('subcategorias.create');
Route::post('/misterfix/subcategorias', 'SubcategoryController@store')->name('subcategorias.store');
Route::get('/misterfix/subcategorias/{slug}', 'SubcategoryController@show')->name('subcategorias.show');
Route::get('/misterfix/subcategorias/{slug}/editar', 'SubcategoryController@edit')->name('subcategorias.edit');
Route::put('/misterfix/subcategorias/{slug}', 'SubcategoryController@update')->name('subcategorias.update');
Route::delete('/misterfix/subcategorias/{slug}', 'SubcategoryController@destroy')->name('subcategorias.destroy');
Route::get('/misterfix/subcategorias/{slug}/agregar', 'SubcategoryController@addSubcategories')->name('subcategorias.add');

// Tiendas
Route::get('/misterfix/tiendas', 'StoreController@index')->name('tiendas.index');
Route::get('/misterfix/tiendas/registrar', 'StoreController@create')->name('tiendas.create');
Route::post('/misterfix/tiendas', 'StoreController@store')->name('tiendas.store');
Route::get('/misterfix/tiendas/{slug}', 'StoreController@show')->name('tiendas.show');
Route::get('/misterfix/tiendas/{slug}/editar', 'StoreController@edit')->name('tiendas.edit');
Route::put('/misterfix/tiendas/{slug}', 'StoreController@update')->name('tiendas.update');
Route::delete('/misterfix/tiendas/{slug}', 'StoreController@destroy')->name('tiendas.destroy');

// Productos
Route::get('/misterfix/productos', 'ProductController@index')->name('productos.index');
Route::get('/misterfix/productos/registrar', 'ProductController@create')->name('productos.create');
Route::post('/misterfix/productos', 'ProductController@store')->name('productos.store');
Route::get('/misterfix/productos/{slug}', 'ProductController@show')->name('productos.show');
Route::get('/misterfix/productos/{slug}/editar', 'ProductController@edit')->name('productos.edit');
Route::put('/misterfix/productos/{slug}', 'ProductController@update')->name('productos.update');
Route::delete('/misterfix/productos/{slug}', 'ProductController@destroy')->name('productos.destroy');
Route::post('/misterfix/imagenes/productos', 'ProductController@image')->name('productos.store.images');
Route::post('/misterfix/imagenes/productos/{slug}', 'ProductController@imageEdit')->name('productos.edit.images');
Route::get('/misterfix/imagenes/productos/{slug}/{url}', 'ProductController@imageDestroy')->name('productos.destroy.images');