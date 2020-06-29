<?php

namespace App\Http\Controllers;

use App\Supply;
use App\DetailPenjualan;
use App\Obat;
use App\DetailSupply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class DetailSupplyController extends Controller
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
        $title='detailsupply';
        $DetailSupply=DetailSupply::paginate(3);
        return view('admin.detailsupply',compact('title','DetailSupply'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input detailsupply';
        $supply = Supply::all();
        $obat   = Obat::all();
        $detailpenjualan = DetailPenjualan::all();
        return view('admin.inputdetailsupply',compact('title','supply','obat','detailpenjualan'));
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
            'id_supply'=>'required',
            'id_obat'=>'required',
            'id_detailpenjualan'=>'numeric',
            
        ],$messages);

        DetailSupply::create($validasi);
        return redirect('detailsupply')->with('succes','data berhasil di update');
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
        $title='Input detailsupply';
        $supply = Supply::all();
        $obat   = Obat::all();
        $detailpenjualan = DetailPenjualan::all();
        return view('admin.inputdetailsupply',compact('title','supply','obat','detailpenjualan'));
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
            'id_supply'=>'required',
            'id_obat'=>'required',
            'id_detailpenjualan'=>'numeric',
        ],$messages);

        DetailSupply::whereid_detailsupply($id)->update($validasi);
        return redirect('detailsupply')->with('succes','data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailSupply::whereid_detailsupply($id)->delete();
        return redirect('detailsupply')->with('succes','data berhasil di update'); 
    }
}
