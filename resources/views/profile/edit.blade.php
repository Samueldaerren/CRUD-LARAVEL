@extends('layouts.app')

@section('title', 'Profile')

@section('contents')
    <h1 class="mb-0">Profile</h1>
    <hr />

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="{{ route('profile.update') }}">
        @csrf <!-- Tambahkan token CSRF -->
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row" id="res"></div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="first name" value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input type="text" name="email" disabled class="form-control" value="{{ auth()->user()->email }}" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="New Password">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <button id="btn" class="btn btn-primary profile-button" type="submit">Save Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
