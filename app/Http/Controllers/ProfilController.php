<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profil.index', [
            'title' => 'Halaman Profil',
            'pageTitle' => ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        return view('profil.edit', [
            'title' => 'Edit Profil',
            'pageTitle' => 'Edit Profil',
            'user' => User::findOrFail($user_id),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'registered_ninja' => 'required',
            'email' => 'required',
            'village' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'ninja_rank' => 'required',
            'date_birth' => 'required',
            'age' => 'required',
            'mission_succes' => 'required',
            'image' => 'file|image'
        ]);


        if ($request->file('image') !== null) {
            $image = $request->file('image');
            $image->storeAs('public/profil', $image->hashName());


            $user = User::findOrFail($user_id);
            $user->update([
                'name' => $request->name,
                'registered_ninja' => $request->registered_ninja,
                'email' => $request->email,
                'village' => $request->village,
                'height' => $request->height,
                'weight' => $request->weight,
                'ninja_rank' => $request->ninja_rank,
                'date_birth' => $request->date_birth,
                'age' => $request->age,
                'mission_succes' => $request->mission_succes,
                'image' => $image->hashName(),
            ]);
        } else {
            $user = User::findOrFail($user_id);
            $user->update([
                'name' => $request->name,
                'registered_ninja' => $request->registered_ninja,
                'email' => $request->email,
                'village' => $request->village,
                'height' => $request->height,
                'weight' => $request->weight,
                'ninja_rank' => $request->ninja_rank,
                'date_birth' => $request->date_birth,
                'age' => $request->age,
                'mission_succes' => $request->mission_succes,
            ]);
        }




        return redirect()->route('profil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
