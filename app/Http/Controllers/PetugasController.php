<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Level;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Petugas::with('level')->get();$data = DB::table('petugas')
        ->join('levels','petugas.id_level', '=', 'levels.id_level')
        ->select('petugas.*', 'levels.nama_level')
        ->get();
        return view('petugas.tampil',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        $level = Level::all();
        $data = $level->map(function ($item){
            return [
                'id_level' => $item->id_level,
                'nama_level' => $item->nama_level
            ];
        });
        return view('petugas.input', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('petugas')->insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_petugas' => $request->nama_petugas,
            'id_level' => $request->id_level,
        ]);
        return redirect('/petugas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data =  DB::table('petugas')->where('id_petugas',$id)->get();
        $level = Level::all();
        $detail_level = $level->map(function ($item){
            return [
                'id_level' => $item->id_level,
                'nama_level' => $item->nama_level
            ];
        });
        return view('petugas.edit',['petugas' => $data], compact('detail_level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('petugas')->where('id_petugas',$request->id_petugas)->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama_petugas' => $request->nama_petugas,
            'id_level' => $request->id_level,
        ]);
        return redirect('/petugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('petugas')->where('id_petugas',$id)->delete();
        
        // alihkan halaman ke halaman pegawai
        return redirect('/petugas');
    }
}