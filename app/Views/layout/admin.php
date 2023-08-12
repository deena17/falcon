<?php helper('html'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($page_title) ? $page_title : '' ?> - Golden Falcon International</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <?= link_tag('public/plugins/fontawesome-free/css/all.min.css') ?>
    <!-- DataTables -->
    <?= link_tag('public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>
    <?= link_tag('public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>
    <?= link_tag('public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>
    <!-- Theme style -->
    <?= link_tag('public/dist/css/adminlte.min.css'); ?>
    <?= link_tag('public/dist/css/custom-style.css'); ?>
    <?= link_tag('public/plugins/select2/css/select2.min.css'); ?>
    <?= link_tag('public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>
    <?= link_tag('public/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css'); ?>
    <?= link_tag('public/plugins/jquery-ui/jquery-ui.min.css'); ?>
    <?= link_tag('public/plugins/timepicker/jquery.timepicker.min.css'); ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Customer</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Side MenuBar -->
        <?php require_once('navbar.php'); ?>
        <!-- End Side MenuBar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid py-0">
                    <div class="row">
                        <div class="col-sm-12">
                            <?= $this->renderSection('breadcrumb'); ?>
                        </div>
                        <div class="col-md-6">
                            <?= $this->renderSection('top-right-menu'); ?>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <?= $this->renderSection('content'); ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?= script_tag('public/plugins/jquery/jquery.min.js'); ?>
    <?= script_tag('public/plugins/jquery-ui/jquery-ui.min.js'); ?>
    <!-- Bootstrap 4 -->
    <?= script_tag('public/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>
    <!-- DataTable -->
    <?= script_tag('public/plugins/datatables/jquery.dataTables.min.js'); ?>
    <?= script_tag('public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>
    <?= script_tag('public/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>
    <?= script_tag('public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>
    <?= script_tag('public/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>
    <?= script_tag('public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>
    <?= script_tag('public/plugins/select2/js/select2.full.min.js'); ?>
    <?= script_tag('public/plugins/jszip/jszip.min.js'); ?>
    <?= script_tag('public/plugins/pdfmake/pdfmake.min.js'); ?>
    <?= script_tag('public/plugins/pdfmake/vfs_fonts.js'); ?>
    <?= script_tag('public/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>
    <?= script_tag('public/plugins/datatables-buttons/js/buttons.print.min.js'); ?>
    <?= script_tag('public/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>
    <?= script_tag('public/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js'); ?>
    <!-- ChartJS -->
    <?= script_tag('public/plugins/chart.js/Chart.min.js'); ?>
    <!-- AdminLTE App -->
    <?= script_tag('public/dist/js/adminlte.min.js'); ?>
    <?= script_tag('public/js/custom-script.js'); ?>
    <?= script_tag('public/plugins/timepicker/jquery.timepicker.min.js'); ?>

    <?= $this->renderSection('scripts'); ?>
    <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();
        $(".datepicker").datepicker({
          dateFormat:'dd/mm/yy',
          changeMonth: true,
          changeYear: true,
          maxDate: 0,
          yearRange: "-90:+00"
        });
        $('.duallistbox').bootstrapDualListbox();
        $('.timepicker').timepicker({
          'timeFormat': 'H:i ',
          show2400: true
        });
    })
    </script>
    <!-- <script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Electronics',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })

    //---------------------
    //- STACKED BAR CHART -
    //---------------------
    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = $.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    new Chart(stackedBarChartCanvas, {
      type: 'bar',
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script> -->

</body>

</html>