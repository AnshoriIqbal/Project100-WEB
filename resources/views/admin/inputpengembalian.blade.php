@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Input Pengembalian
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
</section>
<div class="content">
    <div class="panel panel-flat border-top-lg border-top-primary">
    <form action="{{(isset($Pengembalian))?route('pengembalian.update',$Pengembalian->id_pengembalian):route('pengembalian.store')}}" method="POST">
        @csrf
        @if(isset($Pengembalian))?@method('PUT')@endif
        <div class="panel-body">
            <div class="form-group">
                <label class="control-label col-lg-2">Nama Karyawan</label>
                
               
                         

                <div class="col-lg-10">
                    
                     <select class="form-control" name="id_karyawan">
                            <option value="" holder>Pilih Nama Karyawan</option>
                            @foreach($karyawan as $result)
                            <option value="{{ $result->id_karyawan }}">{{  $result->namaKaryawan }}</option>
                            @endforeach
                          </select>
                    @error('id_karyawan')<small style="color:red">{{$message}}</small>@enderror
                </div>
                <br>
                 <br>

                <label class="control-label col-lg-2">Tanggal Pengembalian</label>
                <div class="col-lg-10">
                    <input type="date" value="{{(isset($Pengembalian))?$Pengembalian->tanggalPengembalian:old('tanggalPengembalian')}}" name="tanggalPengembalian" class="form-control">
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