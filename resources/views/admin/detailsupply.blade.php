@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Data Detail Supply
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
            <a href="{{route('detailsupply.create')}}">Tambah Data</a>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>No</th><th>ID Supply</th><th>ID Obat</th><th>ID Detail Penjualan</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($DetailSupply as $in=>$val)
                        <tr><td>{{($in+1)}}</td><td>{{$val->id_supply}}</td><td>{{$val->id_obat}}</td><td>{{$val->id_detailpenjualan}}</td>
                        <td>
                        <a href="{{route('detailsupply.edit',$val->id_detailsupply)}}"><button type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <form action="{{route('detailsupply.destroy', $val->id_detailsupply)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                        </td></tr>
                        @endforeach
                    </tbody>
                </table>
                {{$DetailSupply->links()}}
            </div>
        </div>
    </div>
</div>
@endsection