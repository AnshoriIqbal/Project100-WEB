@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Data Pengembalian
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
            <a href="{{route('pengembalian.create')}}">Tambah Data</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Pengembalian as $in=>$val)
                        <tr>
                            <td>{{($in+1)}}</td>
                            <td>{{$val->namaKaryawan}}</td>
                            <td>{{$val->tanggalPengembalian}}</td>
                        <td>
                        <a href="{{route('pengembalian.edit',$val->id_pengembalian)}}"><button type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                        <form action="{{route('pengembalian.destroy', $val->id_pengembalian)}}" method="POST">
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