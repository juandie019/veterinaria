<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function edit(User $user)
    {
        //
    }


    public function update($imagen_id)
    {
       auth()->user()->file_id = $imagen_id;
       auth()->user()->save();
       return back();
       //dd($imagen_id);
    }

    public function destroy(User $user)
    {
        //
    }
}
