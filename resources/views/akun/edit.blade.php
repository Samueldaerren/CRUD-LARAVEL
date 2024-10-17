@extends('layouts.app')

@section('title', 'Edit Akun')

@section('contents')
    <h1 class="mb-0">Edit Akun</h1>
    <hr />
    <form action="{{ route('akun.update', $akun->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ $akun->name }}" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $akun->email }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-control" required>
                    <option value="admin" {{ $akun->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="cashier" {{ $akun->role == 'cashier' ? 'selected' : '' }}>Cashier</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col mb-3">
                <label class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
