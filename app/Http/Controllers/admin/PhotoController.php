<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan foto ke dalam folder pages/file/galler
        $path = $request->file('photo')->store('pages/file/galler', 'public');

        // Simpan path foto ke database atau lakukan tindakan lain
        // ...

        return back()->with('success', 'Photo uploaded successfully!');
    }
}
