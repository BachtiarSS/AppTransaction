<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AboutController extends Controller
{
    public function index()
    {
        $about = User::where('user_id', Auth::user()->id)->latest();
        return view('about.index', [
            'about' => $about
        ]);
    }
}
