@extends('layouts.app')

@section('title', 'Create Akun')

@section('contents')
    <h1 class="mb-0">Add Akun</h1>
    <hr />
    <form action="{{ route('akun.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Nama" required>
            </div>
            <div class="col">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="col">
                <select name="role" class="form-control" required>
                    <option value="" disabled selected>Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="cashier">Cashier</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
