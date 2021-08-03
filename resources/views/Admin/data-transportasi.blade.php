@extends('admin.template')
@section('title','Data Transportasi' )
@section('content') 
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Transportasi</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Transportasi</a></li>
                            <li><a href="#">Tabel</a></li>
                            <li class="active">Data Transportasi</li>
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
                        <strong class="card-title">Data Kabupaten</strong>
                        <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Kabupaten</button></div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kabupaten</th>
                                    <th width = "15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($kabupaten as $kab)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$kab->nama}}</td>
                                    <td>      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$kab->id_kabupaten}}" >Edit</button>
                                    <div style="float:right;">
                                    <form action="{{route('kabupaten.destroy', $kab->id_kabupaten)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                    </form>
                                    </div>
                                    </td>

                                </tr>    
                                @endforeach                                       
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Transportasi</strong>
                        <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahtrans" >Tambah Transportasi</button></div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kabupaten</th>
                                    <th>Kecamatan</th>
                                    <th>Harga</th>
                                    <th width = "15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i=0;
                            ?>
                            
                            @foreach($transportasi as $trans)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$trans->kabupaten->nama}}</td>
                                    <td>{{$trans->nama_kec}}</td>
                                    <td><?PHP echo "Rp. " . number_format($trans->harga, 0, ".", "."); ?></td>
                                    <td>      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edittrans{{$trans->id_transportasi}}" >Edit</button>
                                    <div style="float:right;">
                                    <form action="{{route('transportasi.destroy', $trans->id_transportasi)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                    </form>
                                    </div>
                                    </td>

                                </tr>    
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
                <h5 class="modal-title" id="mediumModalLabel">Tambah Kabupaten</h5>
               
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
                <form action="{{route('kabupaten.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Kabupaten</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control" required >
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Kabupaten</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>

<div id="tambahtrans" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Transportasi</h5>
               
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
                <form action="{{route('transportasi.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row form-group">
                <label class="col-sm-4 control-label">Kabupaten</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_kabupaten" require>
                          <option disabled="" selected="" value="">--Pilih Kabupaten--</option>
                          @foreach($kabupaten as $kab)
                          
                          <option value="{{$kab->id_kabupaten}} ">{{$kab->nama}} </option>
                          
                          @endforeach
                          </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kecamatan</label>
                    <div class="col-sm-8">
                        <input type="text" name="kecamatan" class="form-control" required >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Harga</label>
                    <div class="col-sm-8">
                        <input type="text" name="harga" class="form-control" required >
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Transportasi</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /akhir tambah -->


@foreach ($kabupaten as $kab)
<!-- Modal Ubah Data  -->
<div id="edit{{$kab->id_kabupaten}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('kabupaten.update', $kab->id_kabupaten)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control" value="{{ $kab->nama }}" >
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
@foreach ($transportasi as $trans)
<!-- Modal Ubah Data  -->
<div id="edittrans{{$trans->id_transportasi}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Transportasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('transportasi.update', $trans->id_transportasi)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row form-group">
                <label class="col-sm-4 control-label">Kabupaten</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_kabupaten" require>
                          <option disabled="" selected="" value="">--Pilih Kabupaten--</option>
                          @foreach($kabupaten as $kab)
                          <option value="{{$kab->id_kabupaten}} ">{{$kab->nama}} </option>
                          @endforeach
                          </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kecamatan</label>
                    <div class="col-sm-8">
                        <input type="text" name="kecamatan" class="form-control" value="{{ $trans->nama_kec }}" >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Harga</label>
                    <div class="col-sm-8">
                        <input type="text" name="harga" class="form-control" value="{{ $trans->harga }}" >
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