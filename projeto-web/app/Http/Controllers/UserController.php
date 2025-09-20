<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('home');
            }

            return redirect()->back()->withErrors(['error' => 'Credenciais inválidas']);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Dados inválidos']);
        }
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('login')->with('success', 'Usuário registrado com sucesso!');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro ao registrar usuário']);
        }
    }
}
