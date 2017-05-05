<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link href="<?php echo e(asset('/css/roboto.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('/css/materialicon.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('/plugins/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/plugins/node-waves/waves.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('/plugins/animate-css/animate.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('/plugins/morrisjs/morris.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('/css/style.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/themes/all-themes.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('/css/sweetalert.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/bootstrap-select.min.css')); ?>" rel="stylesheet">

    <script src="<?php echo e(asset('/plugins/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/jquery.numeric.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/bootstrap/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/bootstrap-select/js/bootstrap-select.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/moment.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/node-waves/waves.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/jquery-datatable/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/jquery-countto/jquery.countTo.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/raphael/raphael.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/morrisjs/morris.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/sweetalert-dev.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/bootstrap-filestyle.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/jquery-inputmask/jquery.inputmask.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/admin.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/demo.js')); ?>"></script>
    


   <!-- <script src="<?php echo e(asset('/plugins/chartjs/Chart.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/flot-charts/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/flot-charts/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/flot-charts/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/flot-charts/jquery.flot.categories.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/flot-charts/jquery.flot.time.js')); ?>"></script>
    <script src="<?php echo e(asset('/plugins/jquery-sparkline/jquery.sparkline.js')); ?>"></script> -->

    <!-- Scripts -->
    <script>
        window.Laravel = {
            !!json_encode([
            'csrfToken' => csrf_token(),
        ]) !!
        };
    </script>
</head>

<body class="theme-red">

    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Por favor, espere ... </p>
        </div>
    </div>

    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
   
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">Consola</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Make new buttons
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Create new dashboard
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Solve transition issue
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Answer GitHub questions
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                <?php if(Auth::user()->imagen != null): ?>
                    <img src="<?php echo e(asset('/pictures/usuarios/' . Auth::user()->imagen)); ?>" width="60" height="60" alt="User" />
                <?php else: ?>
                    <img src="<?php echo e(asset('images/user.png')); ?>" width="60" height="60" alt="User" />
                <?php endif; ?>
                </div>
                <div class="info-container" style="margin-top: -10px">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?></div>
                    <div class="email"><?php echo e(Auth::user()->idcargo); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons" aria-expanded="true">exit_to_app</i> Logout</a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header align-center">Menu</li>
                    <li class="active">
                        <a href="<?php echo e(url('/home')); ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">account_balance</i>
                            <span>Almacen</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo e(url('almacen/categoria')); ?>">
                                 <i class="material-icons">event_note</i>
                                <span>Categoria</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('almacen/marca')); ?>">
                                <i class="material-icons">style</i>
                                <span> Marca</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('almacen/producto')); ?>">
                                <i class="material-icons">local_parking</i>
                                <span> Producto</span>
                                </a>
                            </li>

                            <li>
                                 <a href="<?php echo e(url('almacen/inventario')); ?>">
                                <i class="material-icons">store_mall_directory</i>
                                <span> Inventario</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">shopping_basket</i>
                            <span>Compra</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo e(url('compra/compra')); ?>">
                                <i class="material-icons">shop</i>
                                <span> Registrar Compra</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('compra/cuentas')); ?>">
                                <i class="material-icons">event_note</i>
                                <span> Cuentas por Pagar</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('compra/proveedor')); ?>">
                                <i class="material-icons">supervisor_account</i>
                                <span> Gestionar Proveedores</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('compra/reporte')); ?>">
                                <i class="material-icons">library_books</i>
                                <span> Reportes de Compra</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">shopping_cart</i>
                            <span>Venta</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo e(url('venta/venta')); ?>">
                                <i class="material-icons">add_shopping_cart</i>
                                <span> Registrar Venta</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('venta/cuentas')); ?>">
                                <i class="material-icons">description</i>
                                <span> Cuentas por Cobrar</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('venta/cliente')); ?>">
                                <i class="material-icons">perm_identity</i>
                                <span> Gestionar Cliente</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('venta/reporte')); ?>">
                                <i class="material-icons">library_books</i>
                                <span> Reportes de Venta</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">insert_chart</i>
                            <span>Estadisticas</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo e(url('estadisticas/compra')); ?>">
                                <i class="material-icons">pie_chart</i>
                                <span> Estadisticas de compra</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('estadisticas/venta')); ?>">
                                <i class="material-icons">show_chart</i>
                                <span> Estadisticas de venta</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('estadisticas/producto')); ?>">
                                <i class="material-icons">equalizer</i>
                                <span> Productos mas Vendidos</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">lock</i>
                            <span> Seguridad </span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo e(url('seguridad/usuario')); ?>">
                                <i class="material-icons">account_circle</i>
                                <span>Usuarios</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('seguridad/cargo')); ?>">
                                <i class="material-icons">accessibility</i>
                                <span>Gestionar Roles</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('seguridad/permiso')); ?>">
                                <i class="material-icons">vpn_key</i>
                                <span>Permisos</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('seguridad/backup')); ?>">
                                <i class="material-icons">backup</i>
                                <span>Respaldar BD</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; Admin Console <a href="javascript:void(0);"> Ricardo Martinez 2017</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 2.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </section>


</body>

</html>