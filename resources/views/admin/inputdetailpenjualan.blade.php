@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Input Detail Penjualan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
</section>
<div class="content">
    <div class="panel panel-flat border-top-lg border-top-primary">
    <form action="{{(isset($DetailPenjualan))?route('detailpenjualan.update',$DetailPenjualan->id_detailpenjualan):route('detailpenjualan.store')}}" method="POST">
        @csrf
        @if(isset($Penjualan))?@method('PUT')@endif
        <div class="panel-body">

                <label class="control-label col-lg-2">Nama Obat</label>
                <div class="col-lg-10">
                    
                     <select class="form-control" name="id_obat">
                            <option value="" holder>Pilih Nama Obat</option>
                            @foreach($obat as $result)
                            <option value="{{ $result->id_obat }}">{{  $result->nama_obat }}</option>
                            @endforeach
                          </select>
                    @error('id_obat')<small style="color:red">{{$message}}</small>@enderror
             
                </div>
            <br>
            <br>

                <label class="control-label col-lg-2">Nama Pelanggan</label>
                <div class="col-lg-10">
                    
                     <select class="form-control" name="id_penjualan">
                            <option value="" holder>Pilih Nama Pelanggan</option>
                            @foreach($penjualan as $result)
                            <option value="{{ $result->id_penjualan }}">{{  $result->namapelanggan }}</option>
                            @endforeach
                          </select>
                    @error('id_penjualan')<small style="color:red">{{$message}}</small>@enderror
             
                </div>
            <br>
            <br>
             <label class="control-label col-lg-2">Jumlah</label>
                <div class="col-lg-10">
                    <input type="number" value="{{(isset($DetailPenjualan))?$DetailPenjualan->jumlah:old('jumlah')}}" name="jumlah" class="form-control">
                    @error('jumlah')<small style="color:red">{{$message}}</small>@enderror
                </div>
            <br>
            <br>

            <label class="control-label col-lg-2">Harga</label>
                <div class="col-lg-10">
                    <input type="number" value="{{(isset($DetailPenjualan))?$DetailPenjualan->harga:old('harga')}}" name="harga" class="form-control">
                    @error('harga')<small style="color:red">{{$message}}</small>@enderror
                </div>
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