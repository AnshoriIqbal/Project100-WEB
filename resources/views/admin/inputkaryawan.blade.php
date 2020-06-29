@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Input Karyawan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
</section>
<div class="content">
    <div class="panel panel-flat border-top-lg border-top-primary">
    <form action="{{(isset($Karyawan))?route('karyawan.update',$Karyawan->id_karyawan):route('karyawan.store')}}" method="POST">
        @csrf
        @if(isset($Karyawan))?@method('PUT')@endif
        <div class="panel-body">
            <div class="form-group">
                <label class="control-label col-lg-2">Nama Karyawan</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($Karyawan))?$Karyawan->namaKaryawan:old('namaKaryawan')}}" name="namaKaryawan" class="form-control">
                    @error('namaKaryawan')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <br>
                <label class="control-label col-lg-2">Alamat</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($Karyawan))?$Karyawan->alamat:old('alamat')}}" name="alamat" class="form-control">
                    @error('alamat')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <br>
                <label class="control-label col-lg-2">Jenis Kelamin</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($Karyawan))?$Karyawan->jenisKelamin:old('jenisKelamin')}}" name="jenisKelamin" class="form-control">
                    @error('jenisKelamin')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <br>
                <label class="control-label col-lg-2">No Telepon</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($Karyawan))?$Karyawan->noTelp:old('noTelp')}}" name="noTelp" class="form-control">
                    @error('noTelp')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <br>
                
            </div>
            
            
            <div class="form-group">
                <button type="submit">SIMPAN</button>
            </div>
        </div>

    </form>    
    </div>
</div>    
@endsection