@extends('partials.mainlogin')

@section('isi_login')
<div class="form-container">
    <div class="brand"><a title="PASTALIA" href="www.PASTALIA.com">PASTALIA</a></div>
    <form action="{{ route('login.loginss') }}" method="POST" class="the-form">
        @csrf <!-- Tambahkan token CSRF untuk keamanan -->
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Masukkan email Anda" required>

        <label for="password">Kata Sandi</label>
        <input type="password" name="password" id="password" placeholder="Masukkan kata sandi Anda" required>

        <input type="submit" value="Masuk">
    </form>
</div><!-- FORM BODY-->

<div class="form-footer">
    <div>
        <span>Belum punya akun?</span> <a href="{{ route('register.register') }}">Daftar</a>
    </div>
</div><!-- FORM FOOTER -->

</div><!-- FORM CONTAINER -->
@endsection


@section('styles')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background: linear-gradient(to right, #8e9eab, #eef2f3);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .form-container {
        background: #fff;
        padding: 2em;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
    }

    .brand {
        text-align: center;
        margin-bottom: 1em;
    }

    .brand a {
        font-size: 1.5em;
        color: #333;
        text-decoration: none;
        font-weight: bold;
    }

    .the-form {
        display: flex;
        flex-direction: column;
    }

    .the-form label {
        margin: 0.5em 0 0.2em;
        font-weight: bold;
        color: #555;
    }

    .the-form input[type="email"], .the-form input[type="password"] {
        padding: 0.5em;
        margin-bottom: 1em;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1em;
    }

    .the-form input[type="submit"] {
        padding: 0.5em;
        background: #8e9eab;
        border: none;
        border-radius: 4px;
        color: #fff;
        font-size: 1em;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .the-form input[type="submit"]:hover {
        background: #697a8c;
    }

    .form-footer {
        text-align: center;
        margin-top: 1em;
    }

    .form-footer span {
        color: #555;
    }

    .form-footer a {
        color: #8e9eab;
        text-decoration: none;
        font-weight: bold;
    }

    .form-footer a:hover {
        text-decoration: underline;
    }
</style>
@endsection
