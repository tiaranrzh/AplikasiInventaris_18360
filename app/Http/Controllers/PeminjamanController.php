<?php

namespace App\Http\Controllers;

use App\Models\detail_pinjams;
use App\Models\Pegawai;
use App\Models\Inventaris;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = peminjaman::with('inventaris')->get();$data = DB::table('peminjamen')
         ->join('inventaris', 'peminjamen.id_inventaris', '=', 'inventaris.id_inventaris')
         ->select('peminjamen.*', 'inventaris.nama')
         ->get();
 
         return view('peminjaman.tampil', compact('data'));
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        $inventaris = Inventaris::all();
        return view("peminjaman.input",compact('pegawai','inventaris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_inventaris' => 'required',
            'id_pegawai' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'status_peminjaman' => 'required',  
            'jumlah' => 'required'

        ]);
      
      Peminjaman::create([
        'id_inventaris' => $request->id_inventaris,
        'id_pegawai' => $request->id_pegawai,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'status_peminjaman' => $request->status_peminjaman,
        'jumlah' => $request->jumlah
        
      ]);

      return redirect('/peminjaman')->with('succes','peminjaman succes');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(peminjaman $peminjaman)
    {
        
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}