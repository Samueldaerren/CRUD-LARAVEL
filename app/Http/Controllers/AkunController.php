<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data akun dari database
        $akun = Akun::orderBy('created_at', 'DESC')->get();

        // Mengirim data ke view 'akun.index'
        return view('akun.index', compact('akun'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambahkan akun baru
        return view('akun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:akuns',
            'password' => 'required|string|min:3', // Validasi untuk password
            'role' => 'required|string|in:admin,cashier', // Validasi role
        ]);

        // Hash password sebelum disimpan
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Menyimpan akun baru ke database
        Akun::create($validatedData);
        
        // Redirect kembali ke halaman daftar akun dengan pesan sukses
        return redirect()->route('akun.index')->with('success', 'Akun berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mencari akun berdasarkan ID
        $akun = Akun::findOrFail($id);

        // Menampilkan view detail akun
        return view('akun.show', compact('akun'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mencari akun berdasarkan ID
        $akun = Akun::findOrFail($id);

        // Menampilkan form edit akun
        return view('akun.edit', compact('akun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:akuns,email,' . $id, // Menghindari kesalahan unique pada email yang sama
            'role' => 'required|string|in:admin,cashier', // Validasi role
        ]);

        // Jika password diinputkan, hash dan update
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->input('password'));
        }

        // Mencari akun berdasarkan ID dan mengupdate data
        $akun = Akun::findOrFail($id);
        $akun->update($validatedData);
    
        // Redirect kembali ke halaman daftar akun dengan pesan sukses
        return redirect()->route('akun.index')->with('success', 'Akun berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mencari akun berdasarkan ID dan menghapus data
        $akun = Akun::findOrFail($id);
        $akun->delete();

        // Redirect kembali ke halaman daftar akun dengan pesan sukses
        return redirect()->route('akun.index')->with('success', 'Akun berhasil dihapus');
    }
}
