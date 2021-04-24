<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsuariosController extends Controller
{
    /**
     * Creates a new user
     *
     * @route POST /v1/users
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function criar(Request $request)
    {
        $this->validate($request, [
            'cpf' => 'required|regex:/\d{11}/|unique:usuarios', // @todo Validar CPF
            'email' => 'required|email|unique:usuarios',
            'nome' => 'required',
            'senha' => 'required',
            'senha_confirmation' => 'same:senha'
        ]);

        $user = new Usuario();
        $user->email = $request->input('email');
        $user->senha = $request->input('senha');
        $user->nome = $request->input('nome');
        $user->cpf = $request->input('cpf');
        $user->save();
    }

    /**
     * Shows public information of a user
     *
     * @route POST /v1/users/{id}
     * @param int $id
     * @return array
     */
    public function ver(int $id)
    {
        $user = Usuario::findOrFail($id);

        return [
            'nome' => $user->nome
        ];
    }
}
