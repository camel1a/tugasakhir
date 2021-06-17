@extends('konsumen.template')
@section('title','Testimoni' )
@section('content') 
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Testimoni</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Testimoni</a></li>
                            <li><a href="#">Tabel</a></li>
                            <li class="active">Data Testimoni</li>
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
                        <strong class="card-title">Data Testimoni</strong>
                        <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Testimoni</button></div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Caption</th>
                                    <th>Foto</th>
                                    <th width = "15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($testimoni as $t)
                            @if($t->id_konsumen==auth()->user()->id_konsumen)

                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$t->konsumen->email}}</td>
                                    <td>{{$t->caption}}</td>
                                    <td><img  align:center; src="{{URL::to('/')}}/foto/{{$t->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$t->foto}}" ></td>
                                    <td>   
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$t->id_testimoni}}">Edit</button>
                                    <div style="float:right;">
                                    <form action="{{route('testimoni-konsumen.destroy', $t->id_testimoni)}}" method="POST">
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
                <h5 class="modal-title" id="mediumModalLabel">Tambah Testimoni</h5>
               
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
              <form action="{{route('testimoni-konsumen.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
        

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Caption</label>
                    <div class="col-sm-8">
                        <input type="text" name="caption" class="form-control" required >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">
                        <input type="file" name="foto" class="form-control" required >
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Testimoni</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /akhir tambah -->

@foreach ($testimoni as $t)
<!-- Modal Ubah Data  -->
<div id="edit{{$t->id_testimoni}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Testimoni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('testimoni-konsumen.update', $t->id_testimoni)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Caption</label>
                    <div class="col-sm-8">        
                        <input type="text" name="caption" class="form-control" value ="{{$t->caption}}" >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" class="form-control" >
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Edit Testimoni</button>
                </div>   
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach
@endsection