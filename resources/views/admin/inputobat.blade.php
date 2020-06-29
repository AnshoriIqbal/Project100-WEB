@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Input Obat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
</section>
<div class="content">
    <div class="panel panel-flat border-top-lg border-top-primary">
    <form action="{{(isset($Obat))?route('obat.update',$Obat->id_obat):route('obat.store')}}" method="POST">
        @csrf
        @if(isset($Obat))?@method('PUT')@endif
        <div class="panel-body">
            <div class="form-group">
                <label class="control-label col-lg-2">Nama Obat</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($Obat))?$Obat->nama_obat:old('nama_obat')}}" name="nama_obat" class="form-control" placeholder="Nama Obat....">
                    @error('nama_obat')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <br>
                <br>
                <br>
                <label class="control-label col-lg-2">Jenis Obat</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($Obat))?$Obat->jenis_obat:old('jenis_obat')}}" name="jenis_obat" class="form-control" placeholder="Jenis Obat....">
                    @error('jenis_obat')<small style="color:red">{{$message}}</small>@enderror
                </div>
                
                <br>
                <br>
                <br>
                <label class="control-label col-lg-2">Stock</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($Obat))?$Obat->stock:old('stock')}}" name="stock" class="form-control" placeholder="Stock Obat....">
                    @error('stock')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <br>
                <br>
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