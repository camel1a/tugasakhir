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
                                    <th>Nama Paket</th>
                                    <th>Harga</th>
                                    <th>Deskripsi Foto</th>
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




@endsection