<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'patronymic' => 'nullable',
            'login' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->surname = $validatedData['surname'];
        $user->patronymic = $validatedData['patronymic'];
        $user->login = $validatedData['login'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        
        if (Auth::check() && Auth::user()->is_admin) {
            $user->is_admin = $request->has('is_admin');
        }

        $user->save();

        return redirect()->route('login')->with('success', 'Регистрация прошла успешно!');
    }
}