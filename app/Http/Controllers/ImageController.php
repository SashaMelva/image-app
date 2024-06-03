<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Exception;

class ImageController extends Controller
{
    public function add(Request $request) {
        Log::info("add image");

        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $results = [[]];

        foreach ($request->file('images') as $key => $value) {
    
            $fileNameWithEextention = $value->getClientOriginalName();
            $filename = pathinfo($fileNameWithEextention, PATHINFO_FILENAME);
            $extention = pathinfo($fileNameWithEextention, PATHINFO_EXTENSION);
            $results[$key]["file_name"] =  $filename;
            $newName = str_replace(' ', '_', strtolower($filename))  . '.' . $extention;
        
            try {
                $path = $value->storeAs('public/image', $newName);
                $results[$key]["path"] =  $path;
            } catch (Exception $e) {
                $results[$key]["path"] =  "";
                Log::error($e);
            }
            
            Log::info($filename);
        }

        Log::info($results);
        return redirect()->back()->with('images_result', $results)  ;
        // view('form', ['images_result' => $results] );
        // redirect()->route('form')->with('images_result', $results);
    }

    public function showById(int $id) {
        Log::info("get image by" . $id);
        $images = Image::Find($id);
    }

    public function show() {
        Log::info("get all image");
        $images = Image::where('id', 1)
        ->orderBy('file_name')
        ->get();
    }
}
