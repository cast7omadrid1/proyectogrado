<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class ListausuariosController extends Controller
{
    
    public function listausuarios(Request $request){
        //return View('admin.listausuarios');

        //dd("test");

        $users=User::Search($request->name)->orderBy("id","ASC")->paginate(2);
        return View('admin.listausuarios')->with('users',$users);

    }

    /*metodo para eliminar usuarios*/
    public function destroy($id){
    	/*buscamos todos los datos del usuario*/
    	$user=user::find($id);
    	$user->delete();

    	Flash::error('El usuario '. $user->name. 'ha sido eliminado');
    	return redirect()->route('admin.listausuarios');
	}


    /*Metodo para la edición de usuarios*/
    public function edit($id){

        //obtenemos los datos que queremos editar
        $user = User::find($id);
        //le pasamos a la vista los datos del usuario a editar
        return view('admin.edit')->with('user',$user);

        //return redirect()->route('admin.edit')->with('user',$user);
    }

    /*metodo para actualizar los datos del usuario*/
    public function update (UserRequest $request, $id){


        $user=User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user = $request->user;
        $user->save();

        Flash::warning('El usuario '.$user->name. 'ha sido editado'); /*Solucionar problemas mensaje flash*/
        return redirect()->route('admin.listausuarios');

    }


}