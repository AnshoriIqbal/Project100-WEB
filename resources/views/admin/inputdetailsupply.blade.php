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
    <form action="{{(isset($DetailSupply))?route('detailsupply.update',$etailSupply->id_detailsupply):route('detailsupply.store')}}" method="POST">
        @csrf
        @if(isset($DetailSupply))?@method('PUT')@endif
        <div class="panel-body">
            <div class="form-group">
                <label class="control-label col-lg-2">ID Supply</label>
                 <div class="col-lg-10"> 
                <select class="form-control" name="id_supply">
                            <option value="" holder>Pilih Nama Supply</option>
                            @foreach($supply as $result)
                            <option value="{{ $result->id_supply }}">{{  $result->id_supply }}</option>
                            @endforeach
                          </select>
                    @error('id_supply')<small style="color:red">{{$message}}</small>@enderror
                    </div>
                <br>
                <br>
              
                <label class="control-label col-lg-2">ID Obat</label>
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


                <label class="control-label col-lg-2">ID Detail Penjualan</label>
                <div class="col-lg-10">
                     <select class="form-control" name="id_detailpenjualan">
                            <option value="" holder>Pilih Id Detail Penjualan</option>
                            @foreach($detailpenjualan as $result)
                            <option value="{{ $result->id_detailpenjualan }}">{{  $result->id_detailpenjualan }}</option>
                            @endforeach
                          </select>
                    @error('id_obat')<small style="color:red">{{$message}}</small>@enderror
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