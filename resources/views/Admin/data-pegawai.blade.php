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
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Job Deskripsion</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pegawai as $p)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$p->nama}}</td>
                                    <td>{{$p->email}}</td>
                                    <td>{{$p->no_hp}}</td>
                                    <td>{{$p->jobdesk}}</td>
                                    <td>{{$p->jk}}</td>
                                    <td>{{$p->alamat}}</td>
                                    <td>Edit dan Hapus</td>
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
@endsection