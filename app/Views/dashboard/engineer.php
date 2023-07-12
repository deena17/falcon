<?php helper('form'); ?>

<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Engineer</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section('title'); ?>
    Dashboard
<?= $this->endSection(); ?>


<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header">
        <h5 class="card-title"><?= $pageTitle; ?></h5>
        <div class="row text-right">
        <div class="col-md-3">
                <input type="text" class="form-control">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row my-3">
            
            <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>760</h3>
                <p>Calls Received</p>
              </div>
              <a href="/crm/service/list-call-register/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>735</h3>
                <p>Calls Processed</p>
              </div>
              <a href="/crm/service/list-call-register/?department=&customer=&status=6" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>0</h3>
                <p>Work in Process</p>
              </div>
              <a href="/crm/service/list-call-register/?department=&customer=&status=8" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>25</h3>
                <p>Call Pending</p>
              </div>
              <a href="/crm/service/list-call-register/?department=&customer=&status=7" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-danger">
              <div class="card-header">
                Call Register
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-olive">
                Recent Activity
              </div>
              <div class="card-body p-0">
                
                <div class="table-responsive">
                  <table class="table">
                    <tr class="text-primary">
                      <th>Date</th>
                      <th>Employee</th>
                      <th>Type</th>
                    </tr>
                    
                    <tr>
                      <td>08-04-2023</td>
                      <td>mohamed</td>
                      <td>Service</td>
                    </tr>
                    
                    <tr>
                      <td>08-04-2023</td>
                      <td>mohamed</td>
                      <td>Service</td>
                    </tr>
                    
                    <tr>
                      <td>08-04-2023</td>
                      <td>mohamed</td>
                      <td>Service</td>
                    </tr>
                    
                    <tr>
                      <td>08-04-2023</td>
                      <td>mohamed</td>
                      <td>Service</td>
                    </tr>
                    
                    <tr>
                      <td>08-04-2023</td>
                      <td>mohamed</td>
                      <td>Service</td>
                    </tr>
                    
                  </table>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <div class="col-md-6">
    <div class="card">
      <div class="card-header bg-maroon">
        Recent Calls
      </div>
      <div class="card-body p-0">
        
        <div class="table-responsive">
          <table class="table">
            <tr class="text-primary">
              <th>Date</th>
              <th>Assigned To</th>
              <th>Status</th>
            </tr>
            
              <tr>
                <td>18-04-2023</td>
                <td>mohamed</td>
                <td>
                  
                  <span class="badge badge-primary">
                  
                  Pending
                  </span>
                </td>
              </tr>
            
              <tr>
                <td>18-04-2023</td>
                <td>mohamed</td>
                <td>
                  
                  <span class="badge badge-primary">
                  
                  Pending
                  </span>
                </td>
              </tr>
            
              <tr>
                <td>18-04-2023</td>
                <td>mohamed</td>
                <td>
                  
                  <span class="badge badge-primary">
                  
                  Pending
                  </span>
                </td>
              </tr>
            
              <tr>
                <td>18-04-2023</td>
                <td>mohamed</td>
                <td>
                  
                  <span class="badge badge-primary">
                  
                  Pending
                  </span>
                </td>
              </tr>
            
              <tr>
                <td>18-04-2023</td>
                <td>mohamed</td>
                <td>
                  
                  <span class="badge badge-primary">
                  
                  Pending
                  </span>
                </td>
              </tr>
            
              <tr>
                <td>17-04-2023</td>
                <td>mohamed</td>
                <td>
                  
                  <span class="badge badge-primary">
                  
                  Pending
                  </span>
                </td>
              </tr>
            
              <tr>
                <td>17-04-2023</td>
                <td>mohamed</td>
                <td>
                  
                  <span class="badge badge-primary">
                  
                  Pending
                  </span>
                </td>
              </tr>
            
              <tr>
                <td>17-04-2023</td>
                <td>mohamed</td>
                <td>
                  
                  <span class="badge badge-primary">
                  
                  Pending
                  </span>
                </td>
              </tr>
            
              <tr>
                <td>17-04-2023</td>
                <td>mohamed</td>
                <td>
                  
                  <span class="badge badge-primary">
                  
                  Pending
                  </span>
                </td>
              </tr>
            
              <tr>
                <td>17-04-2023</td>
                <td>mohamed</td>
                <td>
                  
                  <span class="badge badge-primary">
                  
                  Pending
                  </span>
                </td>
              </tr>
            
          </table>
        </div>
        
      </div>
    </div>
  </div>



  <div class="col-md-6">
    <div class="card">
      <div class="card-header bg-olive">
        Service
      </div>
      <div class="card-body p-0">
        
        <div class="table-responsive">
          <table class="table">
            <tr class="text-primary">
              <th>Date</th>
              <th>Customer</th>
              <th>Amount</th>
            </tr>
            
            <tr>
              <td>08-04-2023</td>
              <td>A.P.Yarn &amp; Textile</td>
              <td>Completed</td>
            </tr>
            
            <tr>
              <td>08-04-2023</td>
              <td>Sushil Fabrics</td>
              <td>Completed</td>
            </tr>
            
            <tr>
              <td>08-04-2023</td>
              <td>Sushil Fabrics</td>
              <td>Completed</td>
            </tr>
            
            <tr>
              <td>08-04-2023</td>
              <td>Sri Karthick Tex</td>
              <td>Completed</td>
            </tr>
            
            <tr>
              <td>08-04-2023</td>
              <td>Alax Fab</td>
              <td>Completed</td>
            </tr>
            
            <tr>
              <td>08-04-2023</td>
              <td>A.P.Yarn &amp; Textile</td>
              <td>Completed</td>
            </tr>
            
            <tr>
              <td>07-04-2023</td>
              <td>Nataraja Textiles</td>
              <td>Completed</td>
            </tr>
            
            <tr>
              <td>06-04-2023</td>
              <td>J.M.Collar</td>
              <td>Completed</td>
            </tr>
            
            <tr>
              <td>06-04-2023</td>
              <td>Swati Knit Fabs</td>
              <td>Completed</td>
            </tr>
            
            <tr>
              <td>06-04-2023</td>
              <td>Saam Tex</td>
              <td>Completed</td>
            </tr>
            
          </table>
        </div>
        
      </div>
    </div>
  </div>

        </div>
        <div class="row">
            
        </div>
    </div>
</div>
<?= $this->endSection(); ?>