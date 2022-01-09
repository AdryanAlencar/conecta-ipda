<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('site.home');
        }

        return redirect()->back()->withErrors(['email' => 'Usuário ou senha inválidos']);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('site.home');
    }

    public function register()
    {
        $states = \App\Models\State::all();

        return view('site.auth.register', [
            'states' => $states,
        ]);
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'city_id' => 'required|integer',
        ]);

        $user = new \App\Models\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->city_id = $request->city_id;
        $user->is_businessperson = $request->is_businessperson;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('site.auth.login');
    }

}
