<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Ruang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\db;
use Illuminate\Routing\Controller;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = "Ruang";
        $data = Ruang::all();
        return view("ruang.tampil",compact('data','judul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruang.input');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('ruangs')->insert([

            'nama_ruang'=> $request->nama_ruang,
            'kode_ruang'=>$request->kode_ruang,
            'keterangan'=>$request->keterangan
        
        ]);

            return redirect('/ruang');
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
        $id_ruang = DB::table('ruangs')->where('id_ruang',$id)->get();
        return view('ruang.edit',['ruangs' => $id_ruang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('ruangs')->where('id_ruang',$request->id_ruang)->update([
            'nama_ruang' => $request->nama_ruang,
            'kode_ruang' => $request->kode_ruang,
            'keterangan' => $request->keterangan,
            ]);
            
            return redirect('/ruang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('ruangs')->where('id_ruang',$id)->delete();
         return redirect('/ruang');
    }
}