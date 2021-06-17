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
                                    <th>Jenis Paket</th>
                                    <th>Email</th>
                                    <th>Tanggal</th>
                                    <th width = "15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pesanan as $p)
                            @if($p->id_konsumen==auth()->user()->id_konsumen)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$p->paket->jenis}}</td>
                                    <td>{{$p->konsumen->email}}</td>
                                    <td>{{$p->tgl}}</td>
                                    <td>      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$p->id_pesanan}}" >Edit</button>
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
                    <label class="col-sm-4 control-label">Jenis Paket</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_paket" require>
                          <option disabled="" selected="" value="">--Pilih Jenis Paket--</option>
                          @foreach($paket as $p)
                          <option value="{{$p->id_paket}} ">{{$p->jenis}} </option>
                          @endforeach
                          </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" name="tgl" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                </div>


                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Pesan Paket</button>
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
                    <label class="col-sm-4 control-label">Jenis Paket</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_paket" require>
                          <option disabled="" selected="" value="">--Pilih Jenis Paket--</option>
                          @foreach($paket as $p)
                          <option value="{{$p->id_paket}} ">{{$p->jenis}} </option>
                          @endforeach
                          </select>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">        
                        <input type="date" name="tgl" class="form-control" value="{{ $p->tgl }}">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Edit Pemesanan</button>
                </div>   
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach
@endsection