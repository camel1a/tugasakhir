<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="../../images/logo2.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{URL('admin/dashboard')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>

                   <li class="menu-title">Navigasi Admin</li><!-- /.menu-title -->

                    <li>
                        <a href="{{URL('admin/pegawai')}}"> <i class="menu-icon fa fa-users"></i>Data Pegawai </a>
                    </li>

                    <li>
                        <a href="{{URL('admin/konsumen')}}"> <i class="menu-icon fa fa-id-card-o"></i>Data Client </a>
                    </li>

                    <li>
                        <a href="{{URL('admin/pesanan')}}"> <i class="menu-icon ti-pencil-alt"></i>Data Pesanan </a>
                    </li>

                    <li>
                        <a href="{{URL('admin/paket')}}"> <i class="menu-icon ti-package"></i>Data Paket </a>
                    </li>

                    <li>
                        <a href="{{URL('admin/transportasi')}}"> <i class="menu-icon ti-car"></i>Data Transportasi</a>
                    </li>

                    <li>
                        <a href="{{URL('admin/jadwal')}}"> <i class="menu-icon fa fa-calendar"></i>Data Jadwal </a>
                    </li>

                    <li>
                        <a href="{{URL('admin/testimoni')}}"> <i class="menu-icon ti-comment-alt"></i>Data Testimoni </a>
                    </li>

                    <li>
                        <a href="{{URL('admin/pemasukan')}}"> <i class="menu-icon ti-wallet"></i>Data Pemasukan </a>
                    </li>

                    <li>
                        <a href="{{URL('admin/pengeluaran')}}"> <i class="menu-icon ti-wallet"></i>Data Pengeluaran </a>
                    </li>

                    <li>
                        <a href="{{URL('admin/landing')}}"> <i class="menu-icon ti-layers"></i>Data Landing Page</a>
                    </li>

                    <!-- <li>
                        <a href="{{URL('admin/pertanyaan')}}"> <i class="menu-icon ti-comments"></i>Data Pertanyaan</a>
                    </li> -->

                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="../../images/logo.png" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="../../images/logo2.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <!-- <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div> -->

                        

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../../images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{URL('/keluar')}}"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->


<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Detail Pesanan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Detail Pesanan</a></li>
                            <li><a href="#">Tabel</a></li>
                            <li class="active">Data Detail Pesanan</li>
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
                        <div class="card-header">From Detail Pesanan</div>
                        <div class="card-body card-block">
                            <form action="#" method="post" class="">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input type="text" id="nama" name="nama" value="{{$data1->konsumen->nama}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input type="text" id="no_hp" name="no_hp" value="{{$data1->konsumen->no_hp}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-id-badge"></i></div>
                                        <input type="text" id="nama" name="nama" value="{{$data1->pegawai->nama}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon ti-package"></i></div>
                                        <input type="text" id="deskripsi" name="deskripsi" value="{{$data1->paket->deskripsi}}" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                        <input type="text" id="nama_kec" name="nama_kec" value="{{$data1->transportasi->nama_kec}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                        <textarea class="form-control"name="alamat" >{{$data1->alamat}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        @php
                                        $potal=$data1->paket->harga+$data1->transportasi->harga;
                                        @endphp
                                        <div class="input-group-addon"><i class="fa fa-money"></i></div>
                                        <input type="text" id="" name="" value="<?PHP echo "Rp. " . number_format($potal, 0, ".", "."); ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="date" id="tgl" name="tgl" value="{{$data1->tgl}}" class="form-control">
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
<div class="clearfix"></div>
        <footer class="site-footer">
            <!-- <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div> -->
        </footer>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../../assets/js/main.js"></script>


    <script src="../assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../assets/js/init/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>


</body>
</html>
