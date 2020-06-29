@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Data Pelanggan
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
            <a href="{{route('pelanggan.create')}}">Tambah Data</a>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>No</th><th>Nama Pelanggan</th><th>Alamat</th><th>Jenis Kelamin</th><th>No Telepon</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                        @foreach ($Pelanggan as $in=>$val)
                        <tr><td>{{($in+1)}}</td><td>{{$val->namapelanggan}}</td><td>{{$val->alamat}}</td><td>{{$val->jenisKelamin}}</td><td>{{$val->noTelp}}</td>
                        <td>
                        <a href="{{route('pelanggan.edit',$val->id_pelanggan)}}"><button type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <form action="{{route('pelanggan.destroy', $val->id_pelanggan)}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                        </td></tr>
                        @endforeach
                    </tbody>
                </table>
                {{$Pelanggan->links()}}
            </div>
        </div>
    </div>
</div>
@endsection