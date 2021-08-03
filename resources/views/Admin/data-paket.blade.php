@extends('admin.template')
@section('title','Data Paket' )
@section('content') 
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Paket</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Paket</a></li>
                            <li><a href="#">Tabel</a></li>
                            <li class="active">Data Paket</li>
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
                        <strong class="card-title">Data Paket</strong>
                        <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Paket</button></div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Paket</th>
                                    <th>Nama Paket</th>
                                    <th>Harga</th>
                                    <th>Deskripsi Foto</th>
                                    <th width = "14%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($paket as $p)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$p->jenis}}</td>
                                    <td>{{$p->deskripsi}}</td>
                                    <td><?PHP echo "Rp. " . number_format($p->harga, 0, ".", "."); ?></td>
                                    <td>
                                    <a href="detail/{{$p->id_paket}} "  style="text-decoration: none; color: #292b35;" data-toggle="modal" data-target="#detail{{$p->id_paket}}" >    
                                    <img  align:center; src="{{URL::to('/')}}/foto/{{$p->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$p->foto}}" >
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$p->id_paket}}" >Edit</button>
                                    <div style="float:right;">
                                    <form action="{{route('paket.destroy', $p->id_paket)}}" method="POST">
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
                <h5 class="modal-title" id="mediumModalLabel">Tambah Paket</h5>
               
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
                        <form action="{{route('paket.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                
        
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Paket</label>
                    <div class="col-sm-8">        
                        <input type="text" name="jenis" class="form-control" required >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Paket</label>
                    <div class="col-sm-8">
                    <input type="text" name="deskripsi" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Harga</label>
                    <div class="col-sm-8">        
                        <input type="text" name="harga" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto"  class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Paket</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /akhir tambah -->

@foreach ($paket as $pak)
<!-- Modal Detail Data  -->
<div id="detail{{$pak->id_paket}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Preview Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="#" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">                
                
                 
                <img  align:center; src="{{URL::to('/')}}/foto/{{$pak->foto}}" style="margin: center;" width="500px" href="URL::to('/')}}/foto/{{$pak->foto}}" readonly> 
                    
            
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach

@foreach ($paket as $p)
<!-- Modal Ubah Data  -->
<div id="edit{{$p->id_paket}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Paket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('paket.update', $p->id_paket)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Paket</label>
                    <div class="col-sm-8">        
                        <input type="text" name="jenis" class="form-control" value ="{{$p->jenis}}" >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama Paket</label>
                    <div class="col-sm-8">        
                        <input type="text" name="deskripsi" class="form-control" value ="{{$p->deskripsi}}" >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Harga</label>
                    <div class="col-sm-8">        
                        <input type="text" name="harga" class="form-control" value ="{{$p->harga}}" >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi Foto</label>
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