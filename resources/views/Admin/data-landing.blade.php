@extends('admin.template')
@section('title','Data landing' )
@section('content') 
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Landing</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Landing Page</a></li>
                            <li><a href="#">Tabel</a></li>
                            <li class="active">Data Landing</li>
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
                        <strong class="card-title">Data Background</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th width = "20%">Foto</th>
                                    <th width = "14%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($landing as $l)
                            @if($l->bagian=="Background")
                                <tr>
                                    <td>{{$l->judul}}</td>
                                    <td><img  align:center; src="{{URL::to('/')}}/foto/{{$l->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$l->foto}}" ></td>
                                    <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$l->id_landing}}" >Edit</button>
                                    <!-- <div style="float:right;">
                                    <form action="{{route('landing.destroy', $l->id_landing)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                    </form>
                                    </div> -->
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
                        <strong class="card-title">Data Dokumentasi</strong>
                        <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Dokumentasi</button></div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th width = "20%">Foto</th>
                                    <th width = "14%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($landing as $l)
                            @if($l->bagian=="Dokumentasi")
                                <tr>
                                    <td>{{$l->judul}}</td>
                                    <td><img  align:center; src="{{URL::to('/')}}/foto/{{$l->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$l->foto}}" ></td>
                                    <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$l->id_landing}}" >Edit</button>
                                    <div style="float:right;">
                                    <form action="{{route('landing.destroy', $l->id_landing)}}" method="POST">
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
                        <strong class="card-title">Data Tentang Kami</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width = "20%">Judul</th>
                                    <th>Deskripsi</th>
                                    <th width = "20%">foto</th>
                                    <th width = "14%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($landing as $l)
                            @if($l->bagian=="Tentang Kami")
                                <tr>
                                    <td>{{$l->judul}}</td>
                                    <td>{{$l->deskripsi}}</td>
                                    <td><img  align:center; src="{{URL::to('/')}}/foto/{{$l->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$l->foto}}" ></td>
                                    <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$l->id_landing}}" >Edit</button>
                                    <!-- <div style="float:right;">
                                    <form action="{{route('landing.destroy', $l->id_landing)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                    </form>
                                    </div> -->
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
                        <strong class="card-title">Data Our Services</strong>
                        <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahservices" >Tambah Our Services</button></div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width = "20%">Judul</th>
                                    <th>Deskripsi</th>
                                    <th width = "14%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($landing as $l)
                            @if($l->bagian=="Services")
                                <tr>
                                    <td>{{$l->judul}}</td>
                                    <td>{{$l->deskripsi}}</td>
                                    <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$l->id_landing}}" >Edit</button>
                                    <div style="float:right;">
                                    <form action="{{route('landing.destroy', $l->id_landing)}}" method="POST">
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
                        <strong class="card-title">Data Question and Answer</strong>
                        <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahqna" >Tambah Question and Answer</button></div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width = "20%">Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th width = "14%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($landing as $l)
                            @if($l->bagian=="QnA")
                                <tr>
                                    <td>{{$l->pertanyaan}}</td>
                                    <td>{{$l->jawaban}}</td>
                                    <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$l->id_landing}}" >Edit</button>
                                    <div style="float:right;">
                                    <form action="{{route('landing.destroy', $l->id_landing)}}" method="POST">
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
                        <strong class="card-title">Data Contact</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th width = "14%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($landing as $l)
                            @if($l->bagian=="Contact")
                                <tr>
                                    <td>{{$l->alamat}}</td>
                                    <td>{{$l->email}}</td>
                                    <td>{{$l->no_hp}}</td>
                                    <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$l->id_landing}}" >Edit</button>
                                    <!-- <div style="float:right;">
                                    <form action="{{route('landing.destroy', $l->id_landing)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</i></a>
                                    </form>
                                    </div> -->
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
                <h5 class="modal-title" id="mediumModalLabel">Tambah Dokumentasi</h5>
               
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
                        <form action="{{route('landing.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Judul</label>
                    <div class="col-sm-8">        
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" class="form-control" required>
                    </div>
                </div>

                <input type="hidden" name="bagian" value="Dokumentasi">

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Dokumentasi</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- Modal tambah -->
<div id="tambahservices" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Our Services</h5>
               
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
                        <form action="{{route('landing.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Judul</label>
                    <div class="col-sm-8">        
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi</label>
                    <div class="col-sm-8">        
                        <input type="text" name="deskripsi" class="form-control" required>
                    </div>
                </div>

                <input type="hidden" name="bagian" value="Services">

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Our Services</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- Modal tambah -->
<div id="tambahqna" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Question and Answer</h5>
               
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
                        <form action="{{route('landing.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Pertanyaan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="pertanyaan" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jawaban</label>
                    <div class="col-sm-8">        
                        <input type="text" name="jawaban" class="form-control" required>
                    </div>
                </div>

                <input type="hidden" name="bagian" value="QnA">

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Question and Answer</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /akhir tambah -->



<!-- Modal Ubah Data  -->
@foreach ($landing as $l)
<div id="edit{{$l->id_landing}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Landing Page</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            @if($l->bagian=="Background")
            <form action="{{route('landing.update', $l->id_landing)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Judul</label>
                    <div class="col-sm-8">        
                        <input type="text" name="judul" class="form-control" value ="{{$l->judul}}" >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" class="form-control" value ="{{$l->foto}}" >
                    </div>
                </div>
                
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>   
            </form>
            @endif
            
            @if($l->bagian=="Dokumentasi")
            <form action="{{route('landing.update', $l->id_landing)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Judul</label>
                    <div class="col-sm-8">        
                        <input type="text" name="judul" class="form-control" value ="{{$l->judul}}" >
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" class="form-control" value ="{{$l->foto}}" >
                    </div>
                </div>
               
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>   
            </form>
            @endif

            @if($l->bagian=="Tentang Kami")
            <form action="{{route('landing.update', $l->id_landing)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Judul</label>
                    <div class="col-sm-8">        
                        <input type="text" name="judul" class="form-control" value ="{{$l->judul}}" >
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi</label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi" >{{$l->deskripsi}}</textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto" class="form-control" value ="{{$l->foto}}" >
                    </div>
                </div>
                
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>   
            </form>
            @endif

            @if($l->bagian=="Services")
            <form action="{{route('landing.update', $l->id_landing)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Judul</label>
                    <div class="col-sm-8">        
                        <input type="text" name="judul" class="form-control" value ="{{$l->judul}}" >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Deskripsi</label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi">{{$l->deskripsi}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>   
            </form>
            @endif

            @if($l->bagian=="QnA")
            <form action="{{route('landing.update', $l->id_landing)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Pertanyaan</label>
                    <div class="col-sm-8">        
                    <textarea class="form-control"name="pertanyaan">{{$l->pertanyaan}}</textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jawaban</label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="jawaban">{{$l->jawaban}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>   
            </form>
            @endif

            @if($l->bagian=="Contact")
            <form action="{{route('landing.update', $l->id_landing)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">        
                        <input type="text" name="alamat" class="form-control" value ="{{$l->alamat}}" >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">        
                        <input type="text" name="email" class="form-control" value ="{{$l->email}}" >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">NO Hp</label>
                    <div class="col-sm-8">        
                        <input type="text" name="no_hp" class="form-control" value ="{{$l->no_hp}}" >
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>   
            </form>
            @endif
            </div>        
        </div>
    </div>
</div>
@endforeach


@endsection