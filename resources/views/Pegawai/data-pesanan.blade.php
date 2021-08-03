@extends('pegawai.template')
@section('title','Data Pesanan' )
@section('content') 
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pesanan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Pesanan</a></li>
                            <li><a href="#">Tabel</a></li>
                            <li class="active">Data Pesanan</li>
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
                        <strong class="card-title">Data Pesanan</strong>
                        <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Pesanan</button></div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th>No</th>
                                    <th>Client</th>
                                    <th>No Hp</th>
                                    <th>Alamat</th>
                                    <th>Paket</th>
                                    <th width = "13%">Tanggal</th>
                                    <th width = "13%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pesanan as $p)
                            @if($p->id_pegawai==auth()->user()->id_pegawai)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$p->konsumen->nama}}</td>
                                    <td><a href="https://wa.me/+62{{$p->konsumen->no_hp}}" style="text-decoration: none; color: #292b35;">{{$p->konsumen->no_hp}}</td>
                                    <td>{{$p->konsumen->alamat}}</td>
                                    <td>{{$p->paket->deskripsi}}</td>
                                    <td>{{$p->tgl}}</td>
                                    <td>  
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$p->id_pesanan}}" >Edit</button>    
                                    <div style="float:right;">
                                    <form action="{{route('pesanan-pegawai.destroy', $p->id_pesanan)}}" method="POST">
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
                <h5 class="modal-title" id="mediumModalLabel">Tambah Pesanan</h5>
               
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
                <form action="{{route('pesanan-pegawai.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                
        
                <div class="row form-group">
                <label class="col-sm-4 control-label">Paket</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_paket" require>
                          <option disabled="" selected="" value="">--Pilih Paket--</option>
                          @foreach($paket as $p)
                          <option value="{{$p->id_paket}} ">{{$p->deskripsi}} </option>
                          @endforeach
                          </select>
                    </div>
                </div>
                <div class="row form-group">
                <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_konsumen" require>
                          <option disabled="" selected="" value="">--Pilih Nama--</option>
                          @foreach($konsumen as $k)
                          <option value="{{$k->id_konsumen}} ">{{$k->nama}} </option>
                          @endforeach
                          </select>
                    </div>
                </div>
                
                <div class="row form-group">
                <label class="col-sm-4 control-label">Kecamatan</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_transportasi" require>
                          <option disabled="" selected="" value="">--Pilih Kecamatan--</option>
                          @foreach($transportasi as $t)
                          <option value="{{$t->id_transportasi}} ">{{$t->nama_kec}} </option>
                          @endforeach
                          </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" required >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" name="tgl" class="form-control" required >
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Pesanan</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /akhir tambah -->


@foreach ($pesanan as $p)
<!-- Modal Ubah Data  -->
<div id="edit{{$p->id_pesanan}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('pesanan-pegawai.update', $p->id_pesanan)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row form-group">
                <label class="col-sm-4 control-label">Paket</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_paket" require>
                          <option disabled="" selected="" value="">--Pilih Paket--</option>
                          @foreach($paket as $pak)
                          <option value="{{$pak->id_paket}} ">{{$pak->deskripsi}} </option>
                          @endforeach
                          </select>
                    </div>
                </div>

                <div class="row form-group">
                <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_konsumen" require>
                          <option disabled="" selected="" value="">--Pilih Nama--</option>
                          @foreach($konsumen as $k)
                          <option value="{{$k->id_konsumen}} ">{{$k->nama}} </option>
                          @endforeach
                          </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" name="tgl" class="form-control" value="{{$p->tgl}}" >
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