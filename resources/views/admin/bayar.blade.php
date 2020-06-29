@extends('layouts.master')

@section('content')
<section class="content-header">
      <h1>
        Bayar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
</section>
<div class="content">
    <div class="panel panel-flat border-top-lg border-top-primary">
    @foreach ($penjualan as $result => $hasil)
    <form action="{{route('penjualan.update',$hasil->id_penjualan )}}" method="POST">
    @endforeach
        @csrf
       @method('PUT')
        <div class="panel-body">
     
                 
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label"> ID Penjualan </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="Tanggal Bayar" name="no_transaksi" value="{{$hasil->id_penjualan}}" readonly>
                  </div>
                </div>

                <br>
                <br>

                   <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label"> Tanggal Penjualan </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPassword3" name="nama" value="{{$hasil->tanggalPenjualan}}" readonly>
                  </div>
                </div>

                <br>
                <br>

               <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label"> Nama Karyawan  </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPassword3" name="telepon" value="{{$hasil->namaKaryawan}}" readonly>
                  </div>
                </div>

                <br>
                <br>

            <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label"> Nama Pelanggan  </label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputPassword3" name="telepon" value="{{$hasil->namapelanggan}}" readonly>
                  </div>
                </div>

                <br>
                <br>
         
             <table class="table table-bordered">
                
                    <thead>
                        <tr>
                            <th>Nama Obat</th> 
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                  @foreach ($obat as $result => $hasil)
                        <tr>
                            <td>{{ $hasil->nama_obat }}</td>
                            <td>{{ $hasil->jumlah }}</td>
                            <td>Rp. {{ number_format($hasil->harga) }}</td>
                            <td>Rp. {{ number_format($hasil->total) }}</td>
                          
                        </tr>
                @endforeach
                    

                        <tr>
                            <td colspan="3"> <b> Total </b> </td>
                            <td> <b> Rp. {{ number_format($sub_total) }}</b>
                                  <input type="hidden" name="hargatotal" value="{{$sub_total}}">  
                            </td>
                        </tr>
                    </tbody>
                </table>


                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label"> Cash </label>
                  <div class="col-sm-9">
                    <input type="text"  class="form-control" id="inputPassword3" placeholder="Cash" name="cash">
                  </div>
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