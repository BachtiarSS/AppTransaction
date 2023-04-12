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
            'dateBirth' => 'required',
            'Domisili' => 'required',
            'Job' => 'required',
            'email' => 'required',
            'image' => 'required|image'
        ]);


        $validateData['image'] = $request->file('image')->store('post-images');

        $validateData['password'] = Hash::make($validateData['password']);
        // dd($validateData);
        User::create($validateData);

        // username : kirito
        // password : asuna

        return redirect()->route('login.index');
    }
}
