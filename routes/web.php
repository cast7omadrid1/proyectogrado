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

Route::get('/admin','AdminController@admin')->name('admin');
Route::get('/inicioadmin','InicioadminController@index')->name('inicio.admin');

//ruta para el inicio
Route::get('/inicio', 'InicioController@inicio')->name('inicio');;

//ruta para el userlogin
Route::get('/userlogin','UserloginController@userlogin');

//ruta para el eventospena
//Route::get('/eventospena','EventospenaController@index');


//ruta para articulos
Route::resource('eventospena','EventospenaController');


/*ruta para almacenar comentario*/
Route::put('storecomentarios/{id}/store',[

	'uses'=>'EventospenaController@store',
	'as' => 'eventospena.store',

]);

//ruta para el noticias
Route::get('/noticias','NoticiasController@noticias');

//ruta para el noticias
Route::get('/organigrama','OrganigramaController@organigrama');

//ruta para el zona multimedia
//Route::get('/zonamultimedia','ZonaMultimediaController@zonamultimedia')->name('zonamultimedia');
//reuta para el contacto
Route::get('/contacto', 'ContactoController@contacto')->name('contacto');

//ruta para el contacto
Route::get('/plantillamaster', 'PlantillaMasterController@plantillamaster');

//ruta editar foto perfil usuario
Route::get('/profile', 'UserController@profile')->name('user.profile');
Route::patch('/profile', 'UserController@update_profile')->name('user.profile.update');



//ruta para listado de usuarios
Route::resource('listausuarios','ListausuariosController');

Route::get('/createuser','ListausuariosController@create')->name('admin.createuser');



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
Route::get('editcategoryone/{id}/editcategoryone',[

	'uses'=>'ArticlesController@editcategoryone',
	'as' => 'admin.articles.editcategoryone',

]);

/*ruta para editar un articulo*/
Route::put('updateifuser/{id}/updateifuser',[

	'uses'=>'ArticlesController@updateifuser',
	'as' => 'admin.articles.updateifuser',

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

/*Ruta prueba exportar tabla excel*/
Route::get('/create', 'ArticlesController@eventos')->name('admin.articles.eventos');


//Route::get('/addimage','ArticulosController@addimage')->name('admin.articulos.addimage');


/*Ruta  exportar tabla excel*/
Route::get('/excel_users', 'ExcelController@exportUsers')->name('admin.excel_users');

/*Ruta  exportar tabla excel*/
Route::get('/excel_articles', 'ExcelController@exportArticles')->name('admin.excel_articles');


//ruta para mostrar la galeria en zonamultimedia
Route::get('/zonamultimedia', 'ImagenesController@index');



//filtro categorias
Route::get('categorias/{name}',[

	'uses' => 'ImagenesController@searchCategory',
	'as'   => 'search.category'

]);

//filtro tags
Route::get('tags/{name}',[

	'uses' => 'ImagenesController@searchTag',
	'as'   => 'search.tag'

]);

/*ruta para almacenar comentario*/
Route::put('guardarcomentarios/{id}/store',[

	'uses'=>'ImagenesController@store',
	'as' => 'imagepena.store',

]);

//ruta para mostrar la galeria en zonamultimedia
Route::get('/imagenesusuario', 'ImagenesusuarioController@index')->name('imagenesusuario');


//envio mail contacto
Route::post('send', ['as' => 'send', 'uses' => 'ContactoController@send'] );
//Route::get('contact', ['as' => 'contact', 'uses' => 'ContactoController@index'] );


/*								
*
*RUTA PARA LAS CATEGORIAS
*
*/
Route::resource('categories','CategoriesController');

//ruta para el listado de articulos en panel admin
Route::get('/listacategorias','CategoriesController@index')->name('categories.listacategorias');


//ruta para eliminar un articulo
Route::get('eliminarcategories/{id}/destroy',[

	'uses'=>'CategoriesController@destroy',
	'as' => 'admin.categories.destroy'

]);


/*ruta para editar un usuario*/
Route::get('editarcategorias/{id}/edit',[

	'uses'=>'CategoriesController@edit',
	'as' => 'admin.categories.edit',

]);

/*ruta para editar un articulo*/
Route::put('updatecategorias/{id}/update',[

	'uses'=>'CategoriesController@update',
	'as' => 'admin.categories.update',

]);


/*Ruta exportar tabla excel*/
Route::get('/excel_categories', 'ExcelController@excelcategories')->name('admin.excel_categories');

/*								
*
*RUTA PARA LOS TAGS
*
*/
/*tengo que poner tag y no tags para que no entre en conflicto con otras rutas*/
Route::resource('tag','TagsController');

//ruta para el listado de articulos en panel admin
Route::get('/listatags','TagsController@index')->name('tags.listatags');


//ruta para eliminar un tags
Route::get('eliminartags/{id}/destroy',[

	'uses'=>'TagsController@destroy',
	'as' => 'admin.tags.destroy'

]);


/*ruta para editar un tags*/
Route::get('editartags/{id}/edit',[

	'uses'=>'TagsController@edit',
	'as' => 'admin.tags.edit',

]);

/*ruta para editar un tags*/
Route::put('updatetags/{id}/update',[

	'uses'=>'TagsController@update',
	'as' => 'admin.tags.update',

]);

/*Ruta exportar tabla excel*/
Route::get('/excel_tags', 'ExcelController@exportTags')->name('admin.excel_tags');


//ruta para listado de usuarios
Route::resource('comentarios','ListacomentariosController');


//ruta para el listado de comentarios en panel admin
Route::get('/listacomentarios','ListacomentariosController@index')->name('comentarios.listacomentarios');


/*ruta para editar un comentario*/
Route::get('editarcomentario/{id}/edit',[

	'uses'=>'ListacomentariosController@edit',
	'as' => 'admin.comentarios.edit',

]);

/*ruta para editar un comentario*/
Route::put('updatecomentarios/{id}/update',[

	'uses'=>'ListacomentariosController@update',
	'as' => 'admin.comentarios.update',

]);

//ruta para eliminar un comentarios
Route::get('eliminarcomentarios/{id}/destroy',[

	'uses'=>'ListacomentariosController@destroy',
	'as' => 'admin.comentarios.destroy'

]);


/*Ruta exportar tabla excel*/
Route::get('/excel_comentarios', 'ExcelController@exportcomentarios')->name('admin.excel_comentarios');



//ruta para listado de usuarios
Route::resource('pagos','ListapagosController');

//ruta para el listado de pagos en panel admin
Route::get('/listapagos','ListapagosController@index')->name('pagos.listapagos');