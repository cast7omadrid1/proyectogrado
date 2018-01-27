<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use Illuminate\Support\Facades\Auth;
/*********************/

 
class UserController extends Controller
{
 

  public function __construct() {
    $this->middleware('auth')->only('profile', 'update_profile');
  }
 
 //Envia los datos del usuario logueado a la vista
  public function profile() {
    $user = Auth::user();
    return view('profile', ['user' => $user]);
  }
 
 //metodo para actualizar una imagen del perfil del usuario
  public function update_profile(Request $request) {
    
    //valida que sea una imagen lo que subamos
    //posibilidad de limitar el tamaño con size:
    $this->validate($request, [
      'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);
 
    $filename = Auth::id().'_'.time().'.'.$request->avatar->getClientOriginalExtension();
    $request->avatar->move(public_path('uploads/avatars'), $filename);//carpeta donde se almacenan las imagenes de avatar
    
    //obtenemos el usuario , cambiamos su avatar por el archivo subido y guardamos
    $user = Auth::user();
    $user->avatar = $filename;
    $user->save();
    
    //redirigimos a la vista del user
    return redirect()->route('user.profile');

    
  }
}