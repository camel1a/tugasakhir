@extends('admin.template')
@section('title','Data Pengeluaran' )
@section('content') 
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pengeluaran</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Pengeluaran</a></li>
                            <li><a href="#">Tabel</a></li>
                            <li class="active">Data Pengeluaran</li>
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
                        <strong class="card-title">Data Pengeluaran</strong>
                        <div style="float:right;"><button type="danger" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambah" >Tambah Pengeluaran</button></div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Pengeluaran</th>
                                    <th>Nominal Pengeluaran</th>
                                    <th>Tanggal</th>
                                    <th width = "15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pengeluaran as $p)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$p->jenis}}</td>
                                    <td><?PHP echo "Rp. " . number_format($p->nominal, 0, ".", "."); ?></td>
                                    <td>{{$p->tgl}}</td>
                                    <td>      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$p->id_pengeluaran}}" >Edit</button>
                                    <div style="float:right;">
                                    <form action="{{route('pengeluaran.destroy', $p->id_pengeluaran)}}" method="POST">
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
                <h5 class="modal-title" id="mediumModalLabel">Tambah Pengeluaran</h5>
               
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
                        <form action="{{route('pengeluaran.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Pengeluaran</label>
                    <div class="col-sm-8">        
                        <input type="text" name="jenis" class="form-control" required >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nominal Pengeluaran</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nominal" class="form-control" required >
                    </div>
                </div>

                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" name="tgl" class="form-control" required >
                    </div>
                </div>


                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tambah Pengeluaran</button>
                </div>
              </form>
            </div>        
        </div>
    </div>
</div>
<!-- /akhir tambah -->

@foreach ($pengeluaran as $p)
<!-- Modal Ubah Data  -->
<div id="edit{{$p->id_pengeluaran}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- body modal -->
            <div class="modal-body">
            <form action="{{route('pengeluaran.update', $p->id_pengeluaran)}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Jenis Pengeluaran</label>
                    <div class="col-sm-8">        
                        <input type="text" name="jenis" class="form-control" value ="{{$p->jenis}}" >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Nominal Pengeluaran</label>
                    <div class="col-sm-8">        
                        <input type="text" name="nominal" class="form-control" value ="{{$p->nominal}}" >
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-4 control-label">Tanggal</label>
                    <div class="col-sm-8">        
                        <input type="date" name="tgl" class="form-control" value ="{{$p->tgl}}" >
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Edit Pengeluaran</button>
                </div>   
            </form>
            </div>        
        </div>
    </div>
</div>
@endforeach
@endsection