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
              <h5 class="card-title">Tambah Data Inventaris</h5> <!-- Mengurangi ukuran judul -->
            </div>
            <div class="card-body">
              <form action="storeinventaris" method="POST">
                {{ csrf_field() }}
                <div class="mb-3"> <!-- Menambah margin bottom untuk setiap form-group -->
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                  <label for="kondisi" class="form-label">Kondisi</label>
                  <select class="form-control" id="kondisi" name="kondisi" required>
                    <option value="">-- Kondisi --</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Proses">Proses</option>
                  </select>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan">
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah">
                </div>
                <div class="mb-3">
                    <label for="nama_jenis" class="form-label">Jenis</label>
                    <select name="id_jenis" class="form-control" id="nama_jenis">
                       <option value="">-- Jenis --</option>
                       @foreach ($jenis as $item)
                       <option value="{{ $item['id_jenis'] }}">{{ $item['nama_jenis'] }}</option>
                       @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal_register" class="form-label">Tanggal Register</label>
                    <input type="date" class="form-control" id="tanggal_register" name="tanggal_register">
                </div>
                <div class="mb-3">
                    <label for="nama_ruang" class="form-label">Ruang</label>
                    <select name="id_ruang" class="form-control" id="nama_ruang">
                       <option value="">-- Ruang --</option>
                       @foreach ($ruang as $item)
                       <option value="{{ $item['id_ruang'] }}">{{ $item['nama_ruang'] }}</option>
                       @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kode_inventaris" class="form-label">Kode Inventaris</label>
                    <input type="text" class="form-control" id="kode_inventaris" name="kode_inventaris">
                </div>
                <div class="mb-3">
                    <label for="nama_petugas" class="form-label">Petugas</label>
                    <select name="id_petugas" class="form-control" id="nama_petugas">
                       <option value="">-- Petugas --</option>
                       @foreach ($petugas as $item)
                       <option value="{{ $item['id_petugas'] }}">{{ $item['nama_petugas'] }}</option>
                       @endforeach
                    </select>
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