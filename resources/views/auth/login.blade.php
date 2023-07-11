@extends('layouts.app')

@section('content-fe')
  <!-- Section Login End -->
  <section id="login">
    <form action="/login" method="POST">
        @csrf
      <img class="gambar" src="{{ asset('assets/images/pesawat.png') }}" alt="" />
      <img class="vector" src="{{ asset('assets/images/Rectangle 6.svg') }}" alt="" />

      <span class="us">username</span>
      <input type="text" name="username" />
      <span class="pw">password</span>
      <input id="password" name="password" type="password" required />
      <div id="icon" onclick="iconn()">
        <iconify-icon class="buka" icon="oi:eye"></iconify-icon>
        <iconify-icon class="tutup" icon="ri:eye-off-fill"></iconify-icon>
      </div>
      <button class="btn" type="submit">masuk</button>
      <a class="bma" href="/register">belum memiliki akun? <span>Daftar</span></a>
    </form>
  </section>
  <!-- Section Login End-->
@endsection
