<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class KaryawanController extends Controller
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
        $title='karyawan';
        $Karyawan=Karyawan::paginate(3);
        return view('admin.karyawan',compact('title','Karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input Karyawan';
        return view('admin.inputkaryawan',compact('title'));
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
            'numeric' =>'Kolom :attribute harus Angka'
        ];
        $validasi = $request->validate([ 
            'namaKaryawan'=>'required',
            'alamat'=>'required',
            'jenisKelamin'=>'required',
            'noTelp'=>'numeric'     
        ],$messages);

        Karyawan::create($validasi);
        return redirect('karyawan')->with('succes','data berhasil di update');
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
        $title='Input karyawan';
        $Karyawan=Karyawan::find($id);
        return view('admin.inputkaryawan',compact('title','Karyawan'));
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
            'numeric' =>'Kolom :attribute harus Angka'
        ];
        $validasi = $request->validate([ 
            'namaKaryawan'=>'required',
            'alamat'=>'required',
            'jenisKelamin'=>'required',
            'noTelp'=>'numeric'     
        ],$messages);

        Karyawan::whereid_karyawan($id)->update($validasi);
        return redirect('karyawan')->with('succes','data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::whereid_karyawan($id)->delete();
        return redirect('karyawan')->with('succes','data berhasil di update'); 
    }
}
