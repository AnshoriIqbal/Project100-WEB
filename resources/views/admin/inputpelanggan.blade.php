@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Input Pelangan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
</section>
<div class="content">
    <div class="panel panel-flat border-top-lg border-top-primary">
    <form action="{{(isset($Pelanggan))?route('pelanggan.update',$Pelanggan->id_pelanggan):route('pelanggan.store')}}" method="POST">
        @csrf
        @if(isset($Pelanggan))?@method('PUT')@endif
        <div class="panel-body">
            <div class="form-group">
                <label class="control-label col-lg-2">Nama Pelanggan</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($Pelanggan))?$Pelanggan->namapelanggan:old('namapelanggan')}}" name="namapelanggan" class="form-control">
                    @error('namapelanggan')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <label class="control-label col-lg-2">Alamat</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($Pelanggan))?$Pelanggan->alamat:old('alamat')}}" name="alamat" class="form-control">
                    @error('alamat')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <label class="control-label col-lg-2">Jenis Kelamin</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($Pelanggan))?$Pelanggan->jenisKelamin:old('jenisKelamin')}}" name="jenisKelamin" class="form-control">
                    @error('jenisKelamin')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <label class="control-label col-lg-2">No Telepon</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($Pelanggan))?$Pelanggan->noTelp:old('noTelp')}}" name="noTelp" class="form-control">
                    @error('noTelp')<small style="color:red">{{$message}}</small>@enderror
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