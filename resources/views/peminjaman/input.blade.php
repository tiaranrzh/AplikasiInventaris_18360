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
            <h5 class="card-title">Peminjaman</h5> <!-- Mengurangi ukuran judul -->
          </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <form action="storepeminjaman" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inventaris" class="form-label">Inventaris</label>
                            <select name="id_inventaris" class="form-control" id="">
                                <option value="">-- Inventaris --</option>
                                @foreach ($inventaris as $item)
                                <option value="{{ $item['id_inventaris'] }}">{{ $item['nama'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                          <label for="jumlah" class="form-label">Jumlah</label>
                          <input type="number" name="jumlah" class="form-control" id="jumlah" required>
                        </div>

                        <div class="form-group">
                            <label for="pegawai" class="form-label">Pegawai</label>
                            <select name="id_pegawai" class="form-control" id="">
                                <option value="">-- Pegawai --</option>
                                @foreach ($pegawai as $item)
                                <option value="{{ $item['id_pegawai'] }}">{{ $item['nama_pegawai'] }}</option>
                                @endforeach
                            </select>
                        </div>
                      
                        <div class="form-group">
                            <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman</label>
                            <input type="date" name="tanggal_pinjam" class="form-control" id="tanggal_pinjam" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_kembali" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" name="tanggal_kembali" class="form-control" id="tanggal_kembali" required>
                        </div>

                        <div class="form-group">
                            <label for="status_peminjaman" class="form-label">Status</label>
                            <select name="status_peminjaman" class="form-select" id="status_peminjaman" required>
                                <option value="Dipinjam">Dipinjam</option>
                                <option value="Proses Dipinjam">Proses dipinjam</option>
                                <option value="Dikembalikan">Dikembalikan</option>
                                <option value="Proses Dikembalikan">Proses Dikembalikan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </thead>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
       </div>
       <!-- /.col-md-6 -->
   
       <!-- /.col-md-6 -->
     </div>
     <!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>

@endsection