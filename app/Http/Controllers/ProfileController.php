<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Method untuk menampilkan halaman edit profil
    public function edit()
    {
        return view('profile.edit');
    }

    // Method untuk memperbarui profil
    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user = auth()->user();
    $user->name = $request->input('name');

    // Update password hanya jika diisi
    if ($request->input('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    $user->save();

    return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
}
}
