<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
	    <li class="breadcrumb-item active">Dashboard</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
    Dashboard
<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<!-- Main content -->
<section class="content">
    <form action="">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="from_date">From Date</label>
                    <input type="text" name="from_date" id="from_date" class="datepicker form-control">
                </div>
            </div>    
            <div class="col-md-3">
                <div class="form-group">
                    <label for="to_date">To Date</label>
                    <input type="text" name="to_date" id="to_date" class="datepicker form-control">
                </div>
            </div>
            <div class="col-md-2 mt-4 pt-2">
              <button class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3></h3>
            <p>Total Objections</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3></h3>

            <p>Approved</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3></h3>

            <p>Pending</p>
            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3></h3>

                <p>Rejected</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      <div class="row">
        <div class="col-md-6">
          <div class="card card-outline card-success">
              <div class="card-header">
                <h5 class="card-title">Calls</h5>
              </div>
              <div class="card-body p-1">
                <table class="table table-bordered">
                  <tr class="bg-info">
                    <td>Department</td>
                    <td>Completed</td>
                    <td>In Process</td>
                    <td>Pending</td>
                  </tr>
                  <tr>
                    <td>Flat Knitting</td>
                    <td>100</td>
                    <td>50</td>
                    <td>10</td>
                  </tr>
                  <tr>
                    <td>Circular Knitting</td>
                    <td>100</td>
                    <td>50</td>
                    <td>10</td>
                  </tr>
                  <tr>
                    <td>Embroidery</td>
                    <td>100</td>
                    <td>50</td>
                    <td>10</td>
                  </tr>
                  <tr>
                    <td>Printing</td>
                    <td>100</td>
                    <td>50</td>
                    <td>10</td>
                  </tr>
                  <tr>
                    <td>Knitting Needle</td>
                    <td>100</td>
                    <td>50</td>
                    <td>10</td>
                  </tr>
                  <tr>
                    <td>Flat Knitting</td>
                    <td>100</td>
                    <td>50</td>
                    <td>10</td>
                  </tr>
                </table>
              </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-outline card-success">
              <div class="card-header">
                <h5 class="card-title">Enquiry</h5>
              </div>
              <div class="card-body">
                
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-6">
            <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
        <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Stacked Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>
</section>
  <?= $this->endSection(); ?>