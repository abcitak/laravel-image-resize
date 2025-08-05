<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Galleries;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class FormController extends Controller
{
    function index()
    {
        $galleries = Galleries::all();
        return view('form',compact('galleries'));
    }

    function send(Request $request)
    {
        $request->validate([
            'image' => 'image|required|mimes:jpeg,jpg,png,webp'
        ]);

        $image = new Galleries;
        if ($request->hasFile('image'))
        {
            $savePath = public_path('uploads/');
            if(!file_exists($savePath))
            {
                mkdir($savePath,0755,true);
            }

            $fileName = uniqid().'.webp';

            Image::make($request->image)
                ->fit(840,840) // width : 840, height : 840
                ->encode('webp',90) // webp format converter,quality : 90
                ->save($savePath.$fileName);

            $image->path = 'uploads/'.$fileName;
        }
        $image->save();
        return redirect()->route('form');
    }
}
