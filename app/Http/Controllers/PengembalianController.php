<?php

namespace App\Http\Controllers;

use App\Pengembalian;
use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;


class PengembalianController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('admin')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup akses');
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='pengembalian';
        $Pengembalian = DB::table('pengembalian')
            ->join('karyawan', 'karyawan.id_karyawan', '=', 'pengembalian.id_karyawan')
            ->get();
        
        return view('admin.pengembalian',compact('title','Pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input pengembalian';
        $karyawan = Karyawan::all();
        return view('admin.inputpengembalian',compact('title','karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required'=>'Kolom :attribute harus lengkap',
            'date'    =>'Kolom :attribute harus Tanggal',
            'numeric' =>'Kolom :attribute harus Angka',
        ];
        $validasi = $request->validate([ 
            'id_karyawan'=>'numeric',
            'tanggalPengembalian'=>'date',        
        ],$messages);

        Pengembalian::create($validasi);
        return redirect('pengembalian')->with('succes','data berhasil di update');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title='Input pelanggan';
        $Pengembalian=Pengembalian::find($id);
        return view('admin.inputpengembalian',compact('title','Pengembalian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required'=>'Kolom :attribute harus lengkap',
            'date'    =>'Kolom :attribute harus Tanggal',
            'numeric' =>'Kolom :attribute harus Angka',
        ];
        $validasi = $request->validate([ 
            'id_karyawan'=>'numeric',
            'tanggalPengembalian'=>'date',
            
        ],$messages);

        Pengembalian::whereid_pengembalian($id)->update($validasi);
        return redirect('pengembalian')->with('succes','data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengembalian::whereid_pengembalian($id)->delete();
        return redirect('pengembalian')->with('succes','data berhasil di update'); 
    }
}
