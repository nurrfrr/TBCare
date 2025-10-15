@extends('layout')

@section('title', 'Login / Register')

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
<div class="d-flex justify-content-center">
    <div class="auth-container shadow-lg p-4 rounded-4">
        <!-- Toggle Buttons -->
        <div class="d-flex justify-content-center mb-4">
            <button id="loginBtn" class="toggle-btn active">Login</button>
            <button id="registerBtn" class="toggle-btn">Daftar</button>
        </div>

        <!-- LOGIN FORM -->
        <form id="loginForm" class="auth-form">
            <h3 class="text-center text-success mb-3">Login</h3>
            <input type="text" class="form-control mb-3" placeholder="Username" required>
            <input type="password" class="form-control mb-3" placeholder="Password" required>

            <button type="submit" class="btn btn-success w-100">Masuk</button>
            <p class="mt-3 text-center">
                Belum punya akun? <span class="text-success switch-link" id="toRegister">Daftar</span>
            </p>
        </form>

        <!-- REGISTER FORM -->
        <form id="registerForm" class="auth-form d-none">
            <h3 class="text-center text-success mb-3">Daftar Akun</h3>
            <input type="email" class="form-control mb-3" placeholder="Email" required>
            <input type="text" class="form-control mb-3" placeholder="Username" required>
            <input type="password" class="form-control mb-3" placeholder="Password" required>
            <input type="password" class="form-control mb-3" placeholder="Confirm Password" required>

            <button type="submit" class="btn btn-success w-100">Buat Akun</button>
            <p class="mt-3 text-center">
                Sudah punya akun? <span class="text-success switch-link" id="toLogin">Login</span>
            </p>
        </form>
    </div>
</div>

<!-- Script Toggle -->
<script>
    const loginBtn = document.getElementById('loginBtn');
    const registerBtn = document.getElementById('registerBtn');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const toRegister = document.getElementById('toRegister');
    const toLogin = document.getElementById('toLogin');

    loginBtn.addEventListener('click', () => {
        loginForm.classList.remove('d-none');
        registerForm.classList.add('d-none');
        loginBtn.classList.add('active');
        registerBtn.classList.remove('active');
    });

    registerBtn.addEventListener('click', () => {
        registerForm.classList.remove('d-none');
        loginForm.classList.add('d-none');
        registerBtn.classList.add('active');
        loginBtn.classList.remove('active');
    });

    toRegister.addEventListener('click', () => registerBtn.click());
    toLogin.addEventListener('click', () => loginBtn.click());
</script>
@endsection
