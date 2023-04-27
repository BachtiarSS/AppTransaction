<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:200',
            'password' => 'required',
            'email' => 'required',
        ]);


        $validateData['password'] = Hash::make($validateData['password']);
        // dd($validateData);
        User::create($validateData);
        return redirect()->route('login');
    }
}
