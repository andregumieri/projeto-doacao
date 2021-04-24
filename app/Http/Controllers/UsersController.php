<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Creates a new user
     *
     * @route POST /v1/users
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'cpf' => 'required|regex:/\d{11}/|unique:users', // @todo Validate CPF
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required',
            'password_confirmation' => 'same:password'
        ]);

        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->name = $request->input('name');
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
    public function view(int $id)
    {
        $user = User::findOrFail($id);

        return [
            'name' => $user->name
        ];
    }
}
