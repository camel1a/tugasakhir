@extends('konsumen.template')
@section('title','Data Profile' )
@section('content') 
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Tabel</a></li>
                            <li class="active">Data Profile</li>
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

        <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">From Profile</div>
                        <div class="card-body card-block">
                            <form action="#" method="post" class="">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="nama" name="nama" value="{{auth()->user()->nama}}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                        <input type="email" id="email" name="email" value="{{auth()->user()->email}}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input type="password" id="password" name="password" value="{{auth()->user()->password}}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text" id="no_hp" name="no_hp" value="{{auth()->user()->no_hp}}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                        <input type="text" id="alamat" name="alamat" value="{{auth()->user()->alamat}}" class="form-control">
                                    </div>
                                </div>
                                <!-- <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Submit</button></div> -->
                            </form>
                        </div>
                    </div>
                </div>
                

           
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection