@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Input Pelanggan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
</section>
<div class="content">
    <div class="panel panel-flat border-top-lg border-top-primary">
    <form action="{{(isset($supplier))?route('supplier.update',$supplier->id_supplier):route('supplier.store')}}" method="POST">
        @csrf
        @if(isset($supplier))?@method('PUT')@endif
        <div class="panel-body">
            <div class="form-group">
                <label class="control-label col-lg-2">Nama Supplier</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($supplier))?$supplier->namaSupplier:old('namaSupplier')}}" name="namaSupplier" class="form-control">
                    @error('namaSupplier')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <label class="control-label col-lg-2">Alamat</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($supplier))?$supplier->alamat:old('alamat')}}" name="alamat" class="form-control">
                    @error('alamat')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <label class="control-label col-lg-2">No Telp</label>
                <div class="col-lg-10">
                    <input type="text" value="{{(isset($supplier))?$supplier->noTelp:old('noTelp')}}" name="noTelp" class="form-control">
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