<?php

namespace App\Http\Controllers;

use App\Supply;
use App\Supplier;
use App\Obat;
use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class SupplyController extends Controller
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
        $title    ='Supply';
        $supplier = Supplier::all();
        $obat     = Obat::all();
        $karyawan = Karyawan::all();
        $Supply   = Supply::paginate(3);
        return view('admin.supply',compact('title','Supply','supplier','obat', 'karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input supply';
        $supplier = Supplier::all();
        $obat     = Obat::all();
        $karyawan = Karyawan::all();
        return view('admin.inputsupply',compact('title','supplier','obat','karyawan'));
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
            'quantity'=>'required',
            'hargatotal'=>'required',
            'tanggalOrder'=>'date',
            'tanggalPenerimaan'=>'date',
            'tanggalBayar'=>'date',
            'id_karyawan'=>'required',
            'id_supplier'=>'required',
            'id_obat'=>'required',
            
            
        ],$messages);

        Supply::create($validasi);
        return redirect('supply')->with('succes','data berhasil di update');
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
        $title='Input supply';
        $supplier = Supplier::all();
        $obat     = Obat::all();
        $karyawan = Karyawan::all();
        $Supply=Supply::find($id);
        return view('admin.inputsupply',compact('title','Supply','supplier','obat','karyawan'));
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
            'quantity'=>'required',
            'hargatotal'=>'required',
            'tanggalOrder'=>'date',
            'tanggalPenerimaan'=>'date',
            'tanggalBayar'=>'date',
            'id_karyawan'=>'required',
            'id_supplier'=>'required',
            'id_obat'=>'required',
            
        ],$messages);

        Supply::whereid_supply($id)->update($validasi);
        return redirect('supply')->with('succes','data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supply::whereid_supply($id)->delete();
        return redirect('supply')->with('succes','data berhasil di update'); 
    }
}


