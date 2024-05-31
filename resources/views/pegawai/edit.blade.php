@extends('layout')
@section('container')

<style>
  .form-control {
    border: 1px solid #ced4da; /* Warna border default Bootstrap */
    padding: .375rem .75rem; /* Padding default Bootstrap */
    border-radius: .25rem; /* Radius border default Bootstrap */
    box-sizing: border-box; /* Pastikan padding tidak menambah ukuran elemen */
  }

  .form-group-box {
    border: 1px solid #ddd; /* Border abu-abu terang untuk kotak form group */
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 15px; /* Jarak antara form group */
    background-color: #f9f9f9; /* Warna latar belakang ringan untuk form group */
  }
</style>
 
  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row justify-content-center"> <!-- Menengahkan konten -->
        <div class="col-lg-8"> <!-- Mengurangi lebar kolom agar lebih proporsional -->
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Tambah Data Pegawai</h5> <!-- Mengurangi ukuran judul -->
            </div>
            <div class="card-body">
                @foreach($pegawai as $d)
                <form action="/pegawai/updatepegawai" method="post">
                    @csrf
                    <input type="hidden" name="id_pegawai" value="{{ $d->id_pegawai }}">
                    <div class="mb-3"> <!-- Menambah margin bottom untuk setiap form-group -->
                        <label for="nama_pegawai" class="form-label">Nama pegawai</label>
                        <input type="text" class="form-control" name="nama_pegawai" value="{{ $d->nama_pegawai }}">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">NIP</label>
                        <input type="text" class="form-control" name="nip" value="{{ $d->nip }}">
                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label">Alamat</label>
                      <input type="text" class="form-control" name="alamat" >
                  </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 

@endsection