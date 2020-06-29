@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Input Return
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
</section>
<div class="content">
    <div class="panel panel-flat border-top-lg border-top-primary">
    <form action="{{(isset($return))?route('return.update',$return->id_return):route('return.store')}}" method="POST">
        @csrf
        @if(isset($return))?@method('PUT')@endif
        <div class="panel-body">
            <div class="form-group">
                <label class="control-label col-lg-2">ID Karyawan</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($return))?$return->id_karyawan:old('id_karyawan')}}" name="id_karyawan" class="form-control">
                    @error('id_karyawan')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <label class="control-label col-lg-2">Tanggal Pengembalian</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($return))?$return->tanggalPengembalian:old('tanggalPengembalian')}}" name="tanggalPengembalian" class="form-control">
                    @error('tanggalPengembalian')<small style="color:red">{{$message}}</small>@enderror
                </div>
               
            </div>
            
            
            <div class="form-group">
                <button type="submit">SIMPAN</button>
            </div>
        </div>

    </form>    
    </div>
</div>    
@endsection