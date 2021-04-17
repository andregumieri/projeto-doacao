<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{
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

    public function view(int $userId)
    {
        $user = User::findOrFail($userId);

        return [
            'name' => $user->name
        ];
    }
}
