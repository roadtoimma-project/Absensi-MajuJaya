@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    
    <div class="card shadow p-4" style="width: 350px; border-radius: 12px;">
        
        <h3 class="text-center mb-4">Login</h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <button class="btn btn-primary w-100">Login</button>
        </form>

    </div>

</div>

@endsection