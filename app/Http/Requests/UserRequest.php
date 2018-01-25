<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\User;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * Conseguimos la validación de formulario según las reglas que nosotros creamos
     * @return array
     */
    public function rules(Request $request)
    {
        //obtenemos usuario a validar
        //$user = User::find($this->id);
        //dd($user);
        return [
            'name'=>'min:4|max:15|required',
            //'email' => 'min:4|max:40|required|email|string|unique:users'.$user->id,
            'email' => 'min:4|max:40|required|email|string|unique:users,id,'.$request->get('id'),
            //'email'=> Rule::unique('users')->ignore('$user->id'),

            'user' =>'boolean',
        ];
    }
}
