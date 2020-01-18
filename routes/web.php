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
Route::get('/', 'WebController@index')->name('home');
Route::get('/tienda', 'WebController@shop')->name('tienda');
Route::get('/categorias', 'WebController@categories')->name('categorias');
Route::get('/categoria/{slugCategory}/{slugSubcategory?}', 'WebController@category')->name('categoria');
Route::get('/carrito', 'WebController@cart')->name('carrito');
Route::get('/carrito/{slug}', 'WebController@addCart')->name('carrito.add');
Route::get('/producto/{slug}', 'WebController@productSingle')->name('web.producto');
Route::get('/blog', 'WebBlogController@index')->name('web.blog.index');
Route::get('/blog/{slug}', 'WebBlogController@show')->name('web.blog.show');
Route::get('/perfil', 'WebController@profile')->name('web.profile');
Route::get('/pedidos', 'WebController@order')->name('web.order');

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
Route::get('/misterfix/perfil', 'UserController@profile')->name('usuarios.profile');

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

// Marcas
Route::get('/misterfix/marcas', 'BrandController@index')->name('marcas.index');
Route::get('/misterfix/marcas/registrar', 'BrandController@create')->name('marcas.create');
Route::post('/misterfix/marcas', 'BrandController@store')->name('marcas.store');
Route::get('/misterfix/marcas/{slug}', 'BrandController@show')->name('marcas.show');
Route::get('/misterfix/marcas/{slug}/editar', 'BrandController@edit')->name('marcas.edit');
Route::put('/misterfix/marcas/{slug}', 'BrandController@update')->name('marcas.update');
Route::delete('/misterfix/marcas/{slug}', 'BrandController@destroy')->name('marcas.destroy');

// Blog
Route::get('/misterfix/blog', 'BlogController@index')->name('blog.index');
Route::get('/misterfix/blog/registrar', 'BlogController@create')->name('blog.create');
Route::post('/misterfix/blog', 'BlogController@store')->name('blog.store');
Route::get('/misterfix/blog/{slug}/editar', 'BlogController@edit')->name('blog.edit');
Route::put('/misterfix/blog/{slug}', 'BlogController@update')->name('blog.update');
Route::delete('/misterfix/blog/{slug}', 'BlogController@destroy')->name('blog.destroy');

// Ventas
Route::get('/misterfix/ventas', 'SaleController@index')->name('ventas.index');
Route::get('/misterfix/ventas/{slug}', 'SaleController@show')->name('ventas.show');
