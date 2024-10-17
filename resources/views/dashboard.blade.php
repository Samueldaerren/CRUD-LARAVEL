@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
<div class="container mt-4">
    <div class="row">
        <!-- Section Title -->
        <div class="col-md-12">
            <h2 class="text-center mb-4">Admin Dashboard</h2>
        </div>

        <!-- Statistic Cards -->
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Accounts</h5>
                    <p class="card-text">{{ $totalAccounts }}</p> <!-- Menampilkan jumlah akun -->
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text">{{ $totalProducts }}</p> <!-- Menampilkan jumlah produk -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
