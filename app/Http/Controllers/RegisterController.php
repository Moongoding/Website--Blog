<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:20'],
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => ['required', 'min:5', 'max:20'],
        ]);
        // Hash
        // $validateData['password'] = bcrypt($validateData['password']);

        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        // $request->session()->flash('success', 'Registration Succsessfull! Please login');
        return redirect('/login')->with('success', 'Registrasi berhasil!');
    }
}
