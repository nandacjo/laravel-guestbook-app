{{-- @extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            <h2>Selamat data user pada hari: {{ now()->formatLocalized('%A, %d %B %Y %H:%M:%S') }}</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>pesawat ku</title>

  <!-- my css -->
  <link rel="stylesheet" href="{{ asset('css/utama.css') }}" />
  <!-- link icon title -->
  <link rel="shortcut icon" href="{{ asset('assets/images/pesawat.png') }}" type="image/x-icon" />
  <!-- link sweetalert2 -->
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
  <section id="halUtama">
    <nav>
      <div class="user">
        <div class="namaUser">{{ auth()->user()->username }}</div>

        <iconify-icon class="iconUser" icon="mingcute:user-4-fill"></iconify-icon>
        <button type="button" class="out" onclick="muncul()">
          <iconify-icon class="iconOut" icon="ep:arrow-down-bold"></iconify-icon>
        </button>
      </div>
      <!-- setelah keluar data login akan ke reset dan memasukkan login ulang -->
      <a class="keluar" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </nav>
    <main>
      <!-- text ini di ambil dari database -->
      <div class="text">
        <div class="t1 text-capitalize">selamat datang</div>
        <div class="t2">{{ auth()->user()->username }}</div>
        {{-- <div class="t3">{{ now()->formatLocalized('%A, %d %B %Y') }}</div> --}}
        <div class="t3">{{ now()->translatedFormat('l, d M Y') }}</div>
      </div>
      <div class="gambar">
        <img class="g" src="{{ asset('assets/images/pesawat.png') }}" alt="" />
      </div>
    </main>
    <div class="guesbook">
      <div class="guesbookTitle">Goesbook</div>
      <div class="guesbookTambah">
        <a class="tambah" href="#">tambahkan daftar tamu
          <iconify-icon class="iconCreate" icon="gridicons:create"></iconify-icon>
        </a>
      </div>
    </div>

    <!-- semua data di tampilkan berdasarkan database -->
    <table class="tbl">
      <thead>
        <tr>
          <th>id</th>
          <th>di posting</th>
          <th>nama lengkap</th>
          <th>email</th>
          <th>alamat</th>
          <th>kota</th>
          <th class="psn">pesan</th>
          <th>edit / hapus</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($data as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->posted->translatedFormat('l, d-M-Y') }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->city }}</td>
            <td>
              {{ $item->message }}
            </td>
            <td>
              <a class="edit edit" data-id={{ $item->id }} href="#">
                <iconify-icon icon="bx:edit"></iconify-icon>
              </a>
              <form action="{{ route('guest-book.destroy', $item->id) }}" method="POST"
                style="display: inline-block; ">
                @csrf
                @method('DELETE')
                <button type="submit" class="hapus" style="display: inline-block; outline: none; border:none;"
                  onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                  <iconify-icon icon="mi:delete"></iconify-icon>
                </button>
              </form>
            </td>
          </tr>
        @empty
          <td colspan="8"> Data guest book belum ada</td>
        @endforelse
      </tbody>
    </table>
  </section>

  <section id="tambahkan">
    <form method="post" action="{{ route('guest-book.store') }}" class="container">
      @csrf
      <div class="textTitle">tambahkan daftar tamu</div>

      <!-- tombol cancel -->
      <a class="cancel" href="">
        <iconify-icon class="iconCancel" icon="lucide:x"></iconify-icon>
      </a>
      <div class="form-group">
        <label for="name">Nama lengkap</label>
        <input type="text" name="name" />
      </div>

      <div class="form-group">
        <label for="email">email</label>
        <input type="email" name="email" />
      </div>

      <div class="form-group">
        <label for="address">address</label>
        <input type="text" name="address" />
      </div>

      <div class="form-group">
        <label for="city">city</label>
        <input type="text" name="city" />
      </div>

      <div class="form-group">
        <label for="message">message</label>
        <textarea name="message" cols="50" rows="5"></textarea>
      </div>

      <button class="btn" type="submit">kirim</button>
    </form>
  </section>

  <section id="tambahkan">
    <form method="post" action="/guest-book/update" id="editGuestbook" class="container">
      @csrf
      <div class="textTitle">edit daftar tamu</div>

      <!-- tombol cancel -->
      <a class="cancel" href="">
        <iconify-icon class="iconCancel" icon="lucide:x"></iconify-icon>
      </a>
      <div class="form-group">
        <label for="name">Nama lengkap</label>
        <input type="text" id="name" name="name" />
        <input type="hidden" id="id" name="id">
      </div>

      <div class="form-group">
        <label for="email">email</label>
        <input type="email" id="email" name="email" />
      </div>

      <div class="form-group">
        <label for="address">address</label>
        <input type="text" id="address" name="address" />
      </div>

      <div class="form-group">
        <label for="city">city</label>
        <input type="text" id="city" name="city" />
      </div>

      <div class="form-group">
        <label for="message">message</label>
        <textarea name="message" id="message" cols="50" rows="5"></textarea>
      </div>

      <button class="btn" type="submit">kirim</button>
    </form>
  </section>
  <!-- script iconify -->
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <!-- script sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <!--  my js -->
  <script src="{{ asset('js/main.js') }}"></script>

  <script>
    $(document).ready(function() {

      var successMessage = `{{ Session::get('success') }}`;
      if (successMessage) {
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: successMessage,
          showConfirmButton: false,
          timer: 1500
        })
      }

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $(document).on('click', '.edit', function(e) {
        e.preventDefault();

        let id = $(this).data('id');

        $.get(`guest-book/edit/`, {
          id: id
        }, function(data) {
          $('#halUtama').css({
            "opacity": 0.5
          });

          $('.container').css({
            "display": "grid"
          })

          $('#name').val(data.guestbook.name);
          $('#email').val(data.guestbook.email);
          $('#address').val(data.guestbook.address);
          $('#city').val(data.guestbook.city);
          $('#message').val(data.guestbook.message);
          $('#id').val(data.guestbook.id);
        }, "json");
      });


    });
  </script>
</body>


</html>
