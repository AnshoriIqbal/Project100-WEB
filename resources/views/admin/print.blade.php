@extends('layouts.masterlaporan')

@section('content')

       <div class="row">
        <div class="col-xs-12">
         
          <!-- /.box -->

          <div class="box">
          

            <!-- /.box-header -->
            <div class="box-body">
           <div class="col-md-12">
              <center>
                  <h3><b>Apotek Laksamana</b></h3>
                    <h5>Jalan Raya Singaraja No 68</h5>
                    <h2><u>Faktur Penjualan</u></h2>
                </center>
                <br>
              </div>


               <div class="col-md-12">
               </div>

               <div class="col-md-6" style="width: 45%; float: left;" >
	                <table class="table">
	                @foreach ($penjualan as $result => $hasil)
	                  @endforeach
	                  <tr>
	                    <td>Id Penjualan</td>
	                    <td>:</td>
	                  	<td>{{$hasil->id_penjualan}} </td>
	                  </tr>

	                   <tr>
	                    <td>Nama Pelanggan</td>
	                    <td>:</td>
	                  	<td>{{$hasil->namapelanggan}}</td>
	                  </tr>

	                  <tr>
	                    <td>Nama Karyawan</td>
	                    <td>:</td>
	                 	<td>{{$hasil->namaKaryawan}} </td>
	                  </tr>
	              </table>

          		</div>

          		 <div class="col-md-6" style="width: 45%; float: left ; margin-left: 10%">
	                <table class="table">
	             
	                  <tr>
	                    <td>Tanggal Penjualan</td>
	                    <td>:</td>
	                  	<td>{{$hasil->tanggalPenjualan}} </td>
	                  </tr>

	                   <tr>
	                    <td>Status Bayar</td>
	                    <td>:</td>
	                  	<td>{{$hasil->status}}</td>
	                  </tr>
	              </table>

          		</div>

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
                    
 				@foreach ($penjualan as $result => $hasil)
	            @endforeach
                        <tr>
                            <td colspan="3"> <b> Total </b> </td>
                            <td> <b> Rp. {{ number_format($hasil->hargatotal) }}</b> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"> <b> Cash </b> </td>
                            <td> <b> Rp. {{ number_format($hasil->cash) }}</b> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"> <b> Kembalian </b> </td>
                            <td> <b> Rp. {{ number_format($hasil->kembalian) }}</b> 
                            </td>
                        </tr>
                    </tbody>
                </table>
@endsection
<script type="text/javascript">
      window.print();
     
    </script>

