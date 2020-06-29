@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Data Penjualan
        </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
</section>
<div class="content">
    <div class="panel panel-flat border-top-lg border-top-primary">
        <div class="panel-body">
            
            <div class="col-lg-12">
            <a href="{{route('penjualan.create')}}">Tambah Data</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                           
                            <th>Tanggal Penjualan</th>
                            <th>Nama Karyawan</th>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Penjualan as $in=>$val)
                        <tr>
                            <td>{{($in+1)}}</td>
                       
                            <td>{{$val->tanggalPenjualan}}</td>
                            <td>{{$val->namaKaryawan}}</td>
                            <td>{{$val->namapelanggan}}</td>
                            <td>{{$val->status}}</td>
                            
                        <td>
                        <a href="{{route('penjualan.edit',$val->id_penjualan)}}" class="btn btn-success" style="margin-right: 10px"> Bayar

            

                        <a href="{{route('penjualan.print',$val->id_penjualan)}}" class="btn btn-danger" style="margin-right: 10px"> Print

                        </td></tr>
                        @endforeach
                    </tbody>
                </table>
            
            </div>
        </div>
    </div>
</div>
@endsection