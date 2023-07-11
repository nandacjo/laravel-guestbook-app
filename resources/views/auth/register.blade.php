@extends('layouts.app')

@section('content-fe')
 <!-- Section Register -->
 <section id="regist">
    <form action="{{ route('register') }}" method="POST">
        @csrf
      <img class="gambar" src="{{ asset('assets/images/pesawat.png') }}" alt="" />
      <img class="vector" src="{{ asset('assets/images/Rectangle 6.svg') }}" alt="" />

      {{-- <span class="nl">nama lengkap</span>
      <input type="text" /> --}}
      <span class="us">username</span>
      <input type="text" name="username" id="username" required />
      <span class="pw">password</span>
      <input type="password" name="password" id="password" required />
      <div id="icon" onclick="iconn()">
        <iconify-icon class="buka" icon="oi:eye"></iconify-icon>
        <iconify-icon class="tutup" icon="ri:eye-off-fill"></iconify-icon>
      </div>
      <button class="btn" type="submit">daftar</button>
      <a class="bma" href="/login"
        >sudah memiliki akun? <span>masuk</span></a
      >
    </form>
 <!-- Section Register End-->
@endsection
