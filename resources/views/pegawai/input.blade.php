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
              <form action="storepegawai" method="POST">
                {{ csrf_field() }}
                <div class="mb-3"> <!-- Menambah margin bottom untuk setiap form-group -->
                  <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                  <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai">
                </div>
                <div class="mb-3">
                  <label for="nip" class="form-label">No Pegawai</label>
                  <input type="number" class="form-control" id="nip" name="nip">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat">
                </div>
        
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 

@endsection