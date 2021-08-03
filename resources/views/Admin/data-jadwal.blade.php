@extends('admin.template')
@section('title','Data Jadwal' )
@section('content') 
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Jadwal</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Jadwal</a></li>
                            <li><a href="#">Tabel</a></li>
                            <li class="active">Data Jadwal</li>
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
                        <strong class="card-title">Data Jadwal</strong>
                        
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Client</th>
                                    <th>Kepentingan</th>
                                    <th>Status</th>
                                    <th>Pegawai</th>
                                    <th>Tanggal</th>
                                    <th width = "19%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($jadwal as $j)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$j->konsumen->nama}}</td>
                                    <td>{{$j->kepentingan}}</td>
                                    <td>{{$j->status}}</td>
                                    <td>{{$j->pegawai->nama}}</td>
                                    <td>{{$j->tgl}}</td>
                                    <td>      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$j->id_jadwal}}" >Edit</button>
                                    <button type="danger" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detail{{$j->id_jadwal}}" >Detail</button>
                                    <div style="float:right;">
                                    <form action="{{route('jadwal.destroy', $j->id_jadwal)}}" method="POST">
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


@foreach ($jadwal as $j)
<!-- Modal Detail Data  -->
<div id="detail{{$j->id_jadwal}}" class="modal fade" role="dialog">
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
                    <label class="col-sm-4 control-label">Client</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nama" class="form-control" value="{{ $j->konsumen->nama}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">        
                        <input type="email" name="Nama" class="form-control" value="{{ $j->konsumen->email}}" readonly>
                    </div>
                </div>


                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kepentingan</label>
                    <div class="col-sm-8">
                        <input type="text" name="email" class="form-control" value="{{ $j->kepentingan }}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Pegawai</label>
                    <div class="col-sm-8">
                        <input type="text" name="pegawai" class="form-control" value="{{ $j->pegawai->nama }}" readonly>
                    </div>
                </div>



                <div class="row form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">
                        <input type="text" name="status" class="form-control" value="{{ $j->status }}" readonly>
                    </div>
                </div>

                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="text" name="website" class="form-control" value="{{ $j->tgl }}" readonly>
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

@foreach ($jadwal as $j)
<!-- Modal Ubah Data  -->
<div id="edit{{$j->id_jadwal}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('jadwal.update', $j->id_jadwal)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Kepentingan</label>
                    <div class="col-sm-8">        
                        <input type="text" name="kepentingan" class="form-control" value ="{{$j->kepentingan}}" >
                    </div>
                </div>
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">        
                        <input type="text" name="status" class="form-control" value ="{{$j->status}}" >
                    </div>
                </div>

                <div class="row form-group">
                <label class="col-sm-4 control-label">Pegawai</label>
                    <div class="col-sm-8">        
                    <select class="form-control" type="text" name="id_pegawai" >
                          <option disabled="" selected="" value="">Pilih Pegawai</option>
                          @foreach($pegawai as $peg)
                          @if($peg->id_pegawai != 1)
                          <option value="{{$peg->id_pegawai}} ">{{$peg->nama}} </option>
                          @endif
                          @endforeach
                          </select>
                    </div>
                </div>

                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">        
                        <input type="date" name="tgl" class="form-control" value ="{{$j->tgl}}" >
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