<?php

namespace App\Http\Controllers;

use App\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagenes = File::all();

        return view('files.admin', compact('imagenes'));
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
    public function store()
    {
        $data = request()->validate([
            'image.*' => ['required', 'image'],
        ]);

        $imagenes = request('image');

        foreach ($imagenes as $imagen){
           $imagePath = $imagen->store('uploads', 'public');

           $file = new File();
           $file->path = $imagePath;
           $file->save();
        }

        return back();

        //$image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //dd($file->path);
       // Storage::disk('public')->delete($file->path);
       $file->delete();

       return redirect()->route('file.index');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //Storage::delete($file->path);
        //File::delete($file->path);
        $file->delete();
        return back();
    }
}
