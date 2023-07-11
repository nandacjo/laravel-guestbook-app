<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pesawat Ku</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link
      rel="shortcut icon"
      href="{{ asset('assets/images/pesawat.png') }}"
      type="image/x-icon"
    />
  </head>
  <body>
    <!-- section home page -->
    <section id="homepage">
      <div class="text">
        <div class="text1">Selamat datang di</div>
        <div class="text2">pesawat ku</div>
        <div class="text3">nikmatnya perjalanan dengan nyaman</div>
        <div class="link">
          <a class="masuk" href="/login">masuk</a>
          <a class="daftar" href="/register">daftar</a>
        </div>
      </div>
      <div class="gambar">
        <img class="lingkaran" src="{{ asset('assets/images/Ellipse 6.svg') }}" alt="" />
        <img class="pswt" src="{{ asset('assets/images/pesawat.png') }}" alt="" />
      </div>
    </section>

    <!-- script icon -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
