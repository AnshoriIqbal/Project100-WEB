<?php

namespace App\Http\Controllers;

use App\DetailPenjualan;
use App\Obat;
use App\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;


class DetailPenjualanController extends Controller
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
        $title='detailpenjualan';
        $DetailPenjualan = DB::table('detail_penjualan')
            ->join('obat', 'obat.id_obat', '=', 'detail_penjualan.id_obat')
            ->get();

        return view('admin.detailpenjualan',compact('title','DetailPenjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input Detail Penjualan';
        $obat = Obat::all();
        $penjualan = DB::table('penjualan')
            ->join('pelanggan', 'pelanggan.id_pelanggan', '=', 'penjualan.id_pelanggan')
            ->get();

        return view('admin.inputdetailpenjualan',compact('title','obat','penjualan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validasi = ([ 
            'id_obat'       => $request->id_obat,
            'id_penjualan'  => $request->id_penjualan,
            'jumlah'        => $request->jumlah,
            'harga'         => $request->harga,
            'total'         => $request->jumlah * $request->harga ,
            
        ]);
        

        DetailPenjualan::create($validasi);
        return redirect('detailpenjualan')->with('succes','data berhasil di update');
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
        $title='Input detailpenjualan';
        $Obat = Obat::all();
        $DetailPenjualan=DetailPenjualan::find($id);
        return view('admin.inputdetailpenjualan',compact('title','DetailPenjualan','Obat'));
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
        $db = DB::table('obat')->where('id_obat', '$id');
        $harga = $db->harga;
        $total = $harga * $request->jumlah;

        
        $validasi = ([ 
            'id_obat'       => $request->id_obat,
            'id_penjualan'  => $request->$id,
            'jumlah'        => $request->jumlah,
            'total'         => $total,
            
        ]);

        DetailPenjualan::create($validasi);
        return redirect('detailpenjualan')->with('succes','data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailPenjualan::whereid_detailpenjualan($id)->delete();
        return redirect('detailpenjualan')->with('succes','data berhasil di update'); 
    }
}
