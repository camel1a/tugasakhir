@extends('admin.template')
@section('title','Data Pegawai' )
@section('content') 
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pegawai</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Pegawai</a></li>
                            <li><a href="#">Tabel</a></li>
                            <li class="active">Data Pegawai</li>
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
                        <strong class="card-title">Data Pegawai</strong>
                        <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Pegawai</button></div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Job Deskripsion</th>
                                    <th>Kontrak Kerja</th>
                                    <th>No Hp</th>
                                    <th width = "20%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pegawai as $p)
                            @if($p->id_pegawai != 1)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$p->nama}}</td>
                                    <td>{{$p->jobdesk}}</td>
                                    <td>{{$p->kontrak}}</td>
                                    <td><a href="https://wa.me/+62{{$p->no_hp}}" style="text-decoration: none; color: #292b35;">{{$p->no_hp}}</td>
                                    <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$p->id_pegawai}}" >Edit</button>
                                    <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$p->id_pegawai}}" >Detail</button>
                                    <div style="float:right;">
                                    <form action="{{route('pegawai.destroy', $p->id_pegawai)}}" method="POST">
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
                <h5 class="modal-title" id="mediumModalLabel">Tambah Pegawai</h5>
               
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
              <form action="{{route('pegawai.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                
      
               
        
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-8">        
                        <input type="text" name="username" class="form-control" required >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">        
                        <input type="password" name="password" class="form-control" required >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" required >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">        
                        <input type="email" name="email" class="form-control" required >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">No Hp</label>
                    <div class="col-sm-8">
                        <input type="text" name="no_hp" class="form-control" required >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Job Deskripsion</label>
                    <div class="col-sm-8">
                        <input type="text" name="jobdesk" class="form-control" required >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kontrak Kerja</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="kontrak" required>
                        <option disabled="" selected="" value="">Pilih Jenis Kontrak Kerja</option>
                        <option>Pegawai Tetap</option>
                        <option>Pegawai Tidak Tetap</option>
                      </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="jk" required>
                        <option disabled="" selected="" value="">Pilih Jenis Kelamin</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                      </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">        
                        <input type="file" name="foto"  class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="alamat" type="text" required ></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Pegawai</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /akhir tambah -->

@foreach ($pegawai as $p)
<!-- Modal Detail Data  -->
<div id="detail{{$p->id_pegawai}}" class="modal fade" role="dialog">
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
                    <label class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-8">        
                        <input type="text" name="username" class="form-control" value="{{ $p->username}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="{{ $p->password }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" name="website" class="form-control" value="{{ $p->nama }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Email </label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $p->email }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">No Hp</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $p->no_hp }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Job Deskripsion</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $p->jobdesk }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kontrak Kerja</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat" class="form-control" value="{{ $p->kontrak }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                        <input type="text" name="jk" class="form-control" value="{{ $p->jk }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="deskripsi" readonly>{{$p->alamat}}</textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Foto</label>
                    <div class="col-sm-8">
                       <img  align:center; src="{{URL::to('/')}}/foto/{{$p->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$p->foto}}" readonly> 
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

@foreach ($pegawai as $p)
<!-- Modal Ubah Data  -->
<div id="edit{{$p->id_pegawai}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('pegawai.update', $p->id_pegawai)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Username</label>
                    <div class="col-sm-8">        
                        <input type="text" name="username" class="form-control" value ="{{$p->username}}" >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">        
                        <input type="text" name="password" class="form-control" value ="{{$p->password}}" >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control" value="{{ $p->nama }}" >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Email </label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="{{ $p->email }}" >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">No Hp</label>
                    <div class="col-sm-8">
                        <input type="text" name="no_hp" class="form-control" value="{{ $p->no_hp }}" >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Job Deskripsion</label>
                    <div class="col-sm-8">
                        <input type="text" name="jobdesk" class="form-control" value="{{ $p->jobdesk }}" >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kontrak Kerja</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="kontrak">
                        <option disabled="" selected="" value="">Pilih Jenis Kontrak Kerja</option>
                        <option>Pegawai Tetap</option>
                        <option>Pegawai Tidak Tetap</option>
                      </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="jk">
                        <option disabled="" selected="" value="">Pilih Jenis Kelamin</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                      </select>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">
                    <textarea class="form-control"name="alamat" >{{$p->alamat}}</textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">foto</label>
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