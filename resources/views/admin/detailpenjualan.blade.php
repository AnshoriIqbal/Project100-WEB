@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Data Detail Penjualan
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
            <a href="{{route('detailpenjualan.create')}}">Tambah Data</a>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>No</th><th>Nama Obat</th><th>Id Penjualan</th><th>Harga</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($DetailPenjualan as $in=>$val)
                        <tr><td>{{($in+1)}}</td><td>{{$val->nama_obat}}</td><td>{{$val->id_penjualan}}</td><td>{{$val->total}}</td>
                        <td>
                        <a href="{{route('detailpenjualan.edit',$val->id_detailpenjualan)}}"><button type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <form action="{{route('detailpenjualan.destroy', $val->id_detailpenjualan)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                        </td></tr>
                        @endforeach
                    </tbody>
                </table>
       
            </div>
        </div>
    </div>
</div>
@endsection