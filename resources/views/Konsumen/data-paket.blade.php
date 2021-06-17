@extends('konsumen.template')
@section('title','Daftar Paket' )
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
                            <li class="active">Daftar Paket</li>
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
                        <strong class="card-title">Daftar Paket</strong>
                        
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Paket</th>
                                    <th>Deskripsi Paket</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($paket as $p)

                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$p->jenis}}</td>
                                    <td>{{$p->deskripsi}}</td>
                                    <td><?PHP echo "Rp. " . number_format($p->harga, 0, ".", "."); ?></td>
                                    <td><img  align:center; src="{{URL::to('/')}}/foto/{{$p->foto}}" class="fa-image" width="100px" href="URL::to('/')}}/foto/{{$p->foto}}" ></td>
                                    
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




@endsection