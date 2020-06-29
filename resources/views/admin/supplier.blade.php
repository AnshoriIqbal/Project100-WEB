@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Data Supplier
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
            <a href="{{route('supplier.create')}}">Tambah Data</a>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>No</th><th>Nama Supplier</th><th>Alamat</th><th>No Telp</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($supplier as $in=>$val)
                        <tr><td>{{($in+1)}}</td><td>{{$val->namaSupplier}}</td><td>{{$val->alamat}}</td><td>{{$val->noTelp}}</td>
                        <td>
                        <a href="{{route('supplier.edit',$val->id_supplier)}}"><button type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <form action="{{route('supplier.destroy', $val->id_supplier)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                        </td></tr>
                        @endforeach
                    </tbody>
                </table>
                {{$supplier->links()}}
            </div>
        </div>
    </div>
</div>
@endsection