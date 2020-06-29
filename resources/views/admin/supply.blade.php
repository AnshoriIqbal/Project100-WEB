@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Data Supply
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
            <a href="{{route('supply.create')}}">Tambah Data</a>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>No</th><th>ID Supplier</th><th>ID Obat</th><th>Jumlah Barang</th><th>Tanggal Order</th><th>Tanggal Penerimaan Barang</th><th>Tanggal Bayar</th><th>Harga Total</th><th>ID Karyawan</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($Supply as $in=>$val)
                        <tr><td>{{($in+1)}}</td><td>{{$val->id_supplier}}</td><td>{{$val->id_obat}}</td><td>{{$val->quantity}}</td><td>{{$val->tanggalOrder}}</td><td>{{$val->tanggalPenerimaan}}</td><td>{{$val->tanggalBayar}}</td><td>{{$val->hargatotal}}</td><td>{{$val->id_karyawan}}</td>
                        <td>
                        <a href="{{route('supply.edit',$val->id_supply)}}"><button type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <form action="{{route('supply.destroy', $val->id_supply)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                        </td></tr>
                        @endforeach
                    </tbody>
                </table>
                {{$Supply->links()}}
            </div>
        </div>
    </div>
</div>
@endsection