@extends('konsumen.template')
@section('title','Pemesanan' )
@section('content') 
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pemesanan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Pemesanan</a></li>
                            <li><a href="#">Tabel</a></li>
                            <li class="active">Data Pemesanan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Pemesanan</strong>
                        <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Pemesanan</button></div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Paket</th>
                                    <th>Alamat</th>
                                    <th width = "15%">Total Harga</th>
                                    <th width = "26%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pesanan as $p)
                            @if($p->id_konsumen==auth()->user()->id_konsumen)
                            @php
                            $potal=$p->paket->harga+$p->transportasi->harga;
                            @endphp
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$p->konsumen->nama}}</td>
                                    <td>{{$p->paket->deskripsi}}</td>
                                    <td>{{$p->alamat}}</td>
                                    <td><?PHP echo "Rp. " . number_format($potal, 0, ".", "."); ?></td>
                                    <td>     
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#bayar{{$p->id_pesanan}}" >Bayar</button> 
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$p->id_pesanan}}" >Edit</button>
                                    <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$p->id_pesanan}}" >Detail</button>
                                    <div style="float:right;" > 
                                    <form action="{{route('pesan-konsumen.destroy', $p->id_pesanan)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                    </form>
                                    </div>
                                    </td>
                                </tr>
                                
                                @endif  
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Pembayaran</strong>
                        <div style="float:right;">
                         </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th>No</th>
                                    <th>Nama</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Nominal</th>
                                    <th>Bukti Pembayaran</th>
                                    <th width = "26%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                            $i=0;
                            @endphp
                            @foreach($transaksi as $t)
                            @if($t->pesanan->id_konsumen==auth()->user()->id_konsumen)
                                <tr>
                                <td>{{++$i}}</td>
                                    <td>{{$t->pesanan->konsumen->nama}}</td>
                                    <td>{{$t->metode}}</td>
                                    <td><?PHP echo "Rp. " . number_format($t->nominal, 0, ".", "."); ?></td>
                                    <td><img  align:center; src="{{URL::to('/')}}/foto/{{$t->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$t->foto}}" ></td>
                                    <td> 
                                    <a href="{{route('cetak', $t->id_transaksi)}}" target="_blank" class="btn btn-info btn-sm">Cetak</a>   
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edittransaksi{{$t->id_transaksi}}" >Edit</button>
                                    <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detailtransaksi{{$t->id_transaksi}}" >Detail</button>
                                    <div style="float:right;">
                                    <form action="{{route('transaksi-konsumen.destroy', $t->id_transaksi)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                    </form>
                                    </div>
                                    </td>
                                </tr>  
                                @endif
                                @endforeach                                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<!-- Modal tambah -->
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Pesan Paket</h5>
               
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>        
            </div>
   
            <!-- body modal -->
            <div class="modal-body">
            @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif
              <form action="{{route('pesan-konsumen.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Paket</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_paket" require>
                          <option disabled="" selected="" value="">Pilih Paket</option>
                          @foreach($paket as $p)
                          <option value="{{$p->id_paket}} ">{{$p->deskripsi}} </option>
                          @endforeach
                          </select>
                    </div>
                </div>

                <div class="row form-group">
                <label class="col-sm-4 control-label">Kecamatan</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_transportasi" required>
                          <option disabled="" selected="" value="">Pilih Lokasi</option>
                          @foreach($transportasi as $t)
                          
                          <option value="{{$t->id_transportasi}} ">{{$t->nama_kec}} </option>
                          
                          @endforeach
                          </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" name="tgl" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                </div>


                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Pemesanan</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>

@foreach($pesanan as $p)
<div id="bayar{{$p->id_pesanan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Pembayaran</h5>
               
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>        
            </div>
   
            <!-- body modal -->
            <div class="modal-body">
            @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif
              <form action="{{route('transaksi-konsumen.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                

                

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nomor Rekening BCA</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="3030728647 (a.n Makhrus)" readonly  >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nominal</label>
                    <div class="col-sm-8">
                        <input type="text" name="nominal" class="form-control" required >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Pembayaran</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="pembayaran" required>
                        <option disabled="" selected="" value="">Pilih Pembayaran</option>
                        <option>DP 1 Untuk Blok Tanggal</option>
                        <option>DP 2 10 Hari Sebelum Hari H</option>
                        <option>Pelunasan</option>
                      </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Status Pembayaran</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="status" required>
                        <option disabled="" selected="" value="">Pilih Status Pembayaran</option>
                        <option>Belum Terkonfirmasi</option>
                        <option>Sudah Terkonfirmasi</option>
                      </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" name="tgl" class="form-control" required >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Bukti Pembayaran</label>
                    <div class="col-sm-8">
                        <input type="file" name="foto" class="form-control" required >
                    </div>
                </div>

                <input type="hidden" name="id_pesanan" value="{{$p->id_pesanan}}">


                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Pembayaran</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
@endforeach
<!-- /akhir tambah -->

@foreach ($pesanan as $p)
<!-- Modal Detail Data  -->
<div id="detail{{$p->id_pesanan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="#" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">        
                        <input type="text" name="id_konsumen" class="form-control" value="{{$p->konsumen->nama}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Paket</label>
                    <div class="col-sm-8">
                        <input type="text" name="id_paket" class="form-control" value="{{$p->paket->deskripsi}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kecamatan</label>
                    <div class="col-sm-8">
                        <input type="text" name="id_transportasi" class="form-control" value="{{$p->transportasi->nama_kec}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{$p->alamat}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" name="tgl" class="form-control" value="{{ $p->tgl }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Total Harga</label>
                    <div class="col-sm-8">
                            @php
                            $potal=$p->paket->harga+$p->transportasi->harga;
                            @endphp
                            <input type="text" name="" class="form-control" value="<?PHP echo "Rp. " . number_format($potal, 0, ".", "."); ?>" readonly>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>             
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach

@foreach ($transaksi as $t)
<!-- Modal Detail Data  -->
<div id="detailtransaksi{{$t->id_transaksi}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
              
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="#" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">        
                        <input type="text" name="id_konsumen" class="form-control" value="{{$t->pesanan->konsumen->nama}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Paket</label>
                    <div class="col-sm-8">        
                        <input type="text" name="id_konsumen" class="form-control" value="{{$t->pesanan->paket->deskripsi}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Metode Pembayaran</label>
                    <div class="col-sm-8">
                        <input type="text" name="metode" class="form-control" value="{{$t->metode}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nominal</label>
                    <div class="col-sm-8">
                        <input type="text" name="nominal" class="form-control" value="<?PHP echo "Rp. " . number_format($t->nominal, 0, ".", "."); ?>" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Pembayaran </label>
                    <div class="col-sm-8">
                        <input type="text" name="pembayaran" class="form-control" value="{{$t->pembayaran}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Status Pembayaran</label>
                    <div class="col-sm-8">
                        <input type="text" name="status" class="form-control" value="{{$t->status}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" name="tgl" class="form-control" value="{{ $t->tgl }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Bukti Pembayaran</label>
                    <div class="col-sm-8">
                       <img  align:center; src="{{URL::to('/')}}/foto/{{$t->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$t->foto}}" readonly> 
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>             
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach

@foreach ($pesanan as $p)
<!-- Modal Ubah Data  -->
<div id="edit{{$p->id_pesanan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Pemesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('pesan-konsumen.update', $p->id_pesanan)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                <label class="col-sm-4 control-label">Paket</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_paket" require>
                          <option disabled="" selected="" value="">Pilih Paket</option>
                          @foreach($paket as $pak)
                          
                          <option value="{{$pak->id_paket}} ">{{$pak->deskripsi}} </option>
                          
                          @endforeach
                          </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kecamatan</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="id_transportasi" require>
                        <option disabled="" selected="" value="">Pilih Lokasi Kecamatan</option>
                        @foreach($transportasi as $t)
                        <option value="{{$t->id_transportasi}} ">{{$t->nama_kec}} </option>
                        @endforeach
                      </select>
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">        
                        <input type="text" name="alamat" class="form-control" value ="{{$p->alamat}}" >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">        
                        <input type="date" name="tgl" class="form-control" value ="{{$p->tgl}}" >
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>   
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach

@foreach ($transaksi as $transaksi)
<!-- Modal Ubah Data  -->
<div id="edittransaksi{{$transaksi->id_transaksi}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('transaksi-konsumen.update', $transaksi->id_transaksi)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')



                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nomor Rekening BCA</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="3030728647 (a.n Makhrus)" readonly  >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nominal</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nominal" class="form-control" value ="{{$transaksi->nominal}}" >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Pembayaran</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="pembayaran" >
                        <option disabled="" selected="" value="">Pilih Pembayaran</option>
                        <option>DP 1 Untuk Blok Tanggal</option>
                        <option>DP 2 10 Hari Sebelum Hari H</option>
                        <option>Pelunasan</option>
                      </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="status" >
                        <option disabled="" selected="" value="">Pilih Status Pembayaran</option>
                        <option>Belum Terkonfirmasi</option>
                        <option>Sudah Terkonfirmasi</option>
                      </select>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">        
                        <input type="date" name="tgl" class="form-control" value ="{{$transaksi->tgl}}" >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Bukti Pembayaran</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" class="form-control" >
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div> 
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach
@endsection