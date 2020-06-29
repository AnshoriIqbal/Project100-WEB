@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Input Penjualan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
</section>
<div class="content">
    <div class="panel panel-flat border-top-lg border-top-primary">
    <form action="{{(isset($Penjualan))?route('penjualan.update',$Penjualan->id_penjualan):route('penjualan.store')}}" method="POST">
        @csrf
        @if(isset($Penjualan))?@method('PUT')@endif
        <div class="panel-body">

             
            </div>
             <div class="form-group">
                <label class="control-label col-lg-2">Nama Karyawan</label>
                <div class="col-lg-10">
                     <select class="form-control" name="id_karyawan">
                            <option value="" holder>Pilih Nama Karyawan</option>
                            @foreach($Karyawan as $result)
                            <option value="{{ $result->id_karyawan }}">{{  $result->namaKaryawan }}</option>
                            @endforeach
                          </select>
                    @error('id_karyawan')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <br>
                <br>
                <label class="control-label col-lg-2">Tanggal Penjualan</label>
                <div class="col-lg-10">
                    <input type="date" value="{{(isset($Penjualan))?$Penjualan->tanggalPenjualan:old('tanggalPenjualan')}}" name="tanggalPenjualan" class="form-control">
                    @error('tanggalPenjualan')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <br>
                <br>
                <label class="control-label col-lg-2">Nama Pelanggan</label>
                <div class="col-lg-10">
                    
                     <select class="form-control" name="id_pelanggan">
                            <option value="" holder>Pilih Nama Pelanggan</option>
                            @foreach($Pelanggan as $result)
                            <option value="{{ $result->id_pelanggan }}">{{  $result->namapelanggan }}</option>
                            @endforeach
                          </select>
                    @error('id_Pelangan')<small style="color:red">{{$message}}</small>@enderror
             
                </div>

                <input type="hidden" name="status" value="Belum Lunas">

            
            <br>
            <br>
            <div class="form-group">
                <button type="submit">SIMPAN</button>
            </div>
        </div>

    </form>    
    </div>
</div>    
@endsection