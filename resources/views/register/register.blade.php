@extends('partials.mainlogin')

@section('isi_login')
<div class="form-container">
    <div class="srouce"><a title="PASTALIA" href="">PASTALIA</a></div>
    <form action="{{ route('register') }}" class="the-form" method="POST">
        @csrf
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" placeholder="Masukkan nama Anda" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Masukkan email Anda" required>

        <label for="password">Kata Sandi</label>
        <input type="password" name="password" id="password" placeholder="Masukkan kata sandi Anda" required>

        <label for="password_confirmation">Konfirmasi Kata Sandi</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi kata sandi Anda" required>

        <input type="submit" value="Daftar">
    </form>
</div><!-- FORM BODY-->
@endsection