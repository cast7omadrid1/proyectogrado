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

//Route para la página de bienvenida
Route::get('/', function () {
    return view('welcome');
});



//como hacer consulta de datos de una tabla
/*Route::get('/producto', function(){
		
		//mostrar todos los datos de la tabla 'Producto' (eliminada)
		$productos = App\Productos::all();
		return $productos;

});*/


Auth::routes();

//ruta para el home de login / voy a mostrar la info que sea para usuarios logueados
Route::get('/home', 'HomeController@index')->name('home');

//route para admin- DESCOMENTAR RUTA PARA USARLO

//Route::match(['get', 'post'], 'admin/createadmin', 'AdminController@createAdmin');

//route para panel admin

Route::get('/admin','AdminController@admin');


//ruta para el inicio
Route::get('/inicio', 'InicioController@inicio')->name('inicio');;

//ruta para el userlogin
Route::get('/userlogin','UserloginController@userlogin');

//ruta para el eventospena
Route::get('/eventospena','EventospenaController@eventospena');

//ruta para el noticias
Route::get('/noticias','NoticiasController@noticias');

//ruta para el noticias
Route::get('/organigrama','OrganigramaController@organigrama');

//ruta para el zona multimedia
Route::get('/zonamultimedia','ZonaMultimediaController@zonamultimedia')->name('zonamultimedia');
//reuta para el contacto
Route::get('/contacto', 'PaginasController@contacto');

//ruta para el contacto
Route::get('/plantillamaster', 'PlantillaMasterController@plantillamaster');




//ruta editar foto perfil usuario
Route::get('/profile', 'UserController@profile')->name('user.profile');
Route::patch('/profile', 'UserController@update_profile')->name('user.profile.update');

//ruta para el listado de usuarios en panel admin
Route::get('/listausuarios','ListausuariosController@listausuarios')->name('admin.listausuarios');


/*ruta para eliminar un usuario*/
Route::get('listausuarios/{id}/destroy',[

	'uses'=>'ListausuariosController@destroy',
	'as' => 'admin.listausuarios.destroy',

]);


/*ruta para editar un usuario*/
Route::get('editarusuarios/{id}/edit',[

	'uses'=>'ListausuariosController@edit',
	'as' => 'admin.edit',

]);

/*ruta para editar un usuario*/
Route::put('updateusers/{id}/update',[

	'uses'=>'ListausuariosController@update',
	'as' => 'admin.listausuarios.update',

]);

//ruta para articulos
Route::resource('articles','ArticlesController');



//ruta para el listado de articulos en panel admin
Route::get('/listaarticulos','ArticlesController@index')->name('admin.listaarticulos');


/*ruta para editar un articulo*/
Route::get('editarticle/{id}/edit',[

	'uses'=>'ArticlesController@edit',
	'as' => 'admin.articles.edit',

]);


/*ruta para editar un articulo*/
Route::put('updatearticles/{id}/update',[

	'uses'=>'ArticlesController@update',
	'as' => 'admin.articles.update',

]);

//ruta para eliminar un articulo
Route::get('eliminararticulo/{id}/destroy',[

	'uses'=>'ArticlesController@destroy',
	'as' => 'admin.articles.destroy'

]);


//ruta para mostrar la galeria en zonamultimedia
Route::get('/zonamultimedia', 'ImagenesController@index');

//Route::get('/addimage','ArticulosController@addimage')->name('admin.articulos.addimage');


/*Ruta prueba exportar tabla excel*/
Route::get('/excel_users', 'ExcelController@exportUsers')->name('admin.excel_users');

/*Ruta prueba exportar tabla excel*/
Route::get('/excel_articles', 'ExcelController@exportArticles')->name('admin.excel_articles');