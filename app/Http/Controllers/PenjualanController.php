<?php

namespace App\Http\Controllers;

use App\Penjualan;
use App\Karyawan;
use App\Pelanggan;
use App\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;


class PenjualanController extends Controller
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
        $title='penjualan';
        $Penjualan = DB::table('penjualan')
            ->join('karyawan', 'karyawan.id_karyawan', '=', 'penjualan.id_karyawan')
            ->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'penjualan.id_pelanggan')
            ->get();
        return view('admin.penjualan',compact('title','Penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input Penjualan';
        $Karyawan = Karyawan::all();
        $Pelanggan = Pelanggan::all();
        $Obat = Obat::all();
        return view('admin.inputpenjualan',compact('title','Karyawan', 'Pelanggan','Obat'));
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
            'tanggalPenjualan' =>'date',
            'id_karyawan'      =>'required',
            'id_pelanggan'     =>'required',   
            'status'           =>'',  
        ],$messages);

        Penjualan::create($validasi);
        return redirect('penjualan')->with('succes','data berhasil di update');
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
        $title='Bayar';
        $penjualan = DB::table('penjualan')
            ->join('karyawan', 'karyawan.id_karyawan', '=', 'penjualan.id_karyawan')
            ->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'penjualan.id_pelanggan')
            ->join('detail_penjualan', 'detail_penjualan.id_penjualan', '=', 'penjualan.id_penjualan')
            ->where('detail_penjualan.id_penjualan', $id)
            ->get();

         $obat = DB::table('detail_penjualan')
            ->join('obat', 'obat.id_obat', '=', 'detail_penjualan.id_obat')
            ->where('detail_penjualan.id_penjualan', $id)
            ->get(); 

         $sub_total= DB::table('detail_penjualan')
           ->where('detail_penjualan.id_penjualan', $id)
            ->sum ('detail_penjualan.total');

        return view('admin.bayar',compact('title','penjualan', 'obat', 'sub_total'));
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
        
        DB::table('penjualan')->where('id_penjualan',$id)->update([
        'hargatotal' => $request->hargatotal,
        'cash'       => $request->cash,
        'kembalian'  => $request->cash - $request->hargatotal,
        'status' => 'Lunas'
         ]);

        return redirect('penjualan')->with('succes','data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penjualan::whereid_pelanggan($id)->delete();
        return redirect('penjualan')->with('succes','data berhasil di update'); 
    }

    public function print($id)
    {
        $title = 'Print';

        $penjualan = DB::table('penjualan')
            ->join('karyawan', 'karyawan.id_karyawan', '=', 'penjualan.id_karyawan')
            ->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'penjualan.id_pelanggan')
            ->join('detail_penjualan', 'detail_penjualan.id_penjualan', '=', 'penjualan.id_penjualan')
            ->where('detail_penjualan.id_penjualan', $id)
            ->get();

         $obat = DB::table('detail_penjualan')
            ->join('obat', 'obat.id_obat', '=', 'detail_penjualan.id_obat')
            ->where('detail_penjualan.id_penjualan', $id)
            ->get(); 
        
        return view('admin.print',compact('title','penjualan', 'obat'));

    }
}
