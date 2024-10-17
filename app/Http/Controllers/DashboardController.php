<?php

namespace App\Http\Controllers;

use App\Models\User; // Model untuk akun
use App\Models\Product; // Model untuk produk
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah akun dengan role 'admin' dan 'cashier'
        $totalAccounts = User::whereIn('role', ['admin', 'Cashier'])->count(); // Menghitung total admin dan cashier

        // Hitung jumlah produk
        $totalProducts = Product::count(); // Menghitung total produk

        // Mengirim data ke view
        return view('dashboard', compact('totalAccounts', 'totalProducts'));
    }
}
