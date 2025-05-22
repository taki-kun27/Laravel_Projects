<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function showFileUpload()
    {
        return view('create');
    }

    public function storeFile(Request $request) {
        $request->validate([
            'file' => 'required|file|max:2048'
        ]);


        $filePath = $request->file('file')->store('uploads', 'public');

        return back()->with('success', 'File uploaded to: ' . $filePath);
    }
}
