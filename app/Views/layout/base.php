<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TRB - Objection Tracking System</title>
    <?php helper('html'); ?>
    <?php $this->ionAuth    = new \App\Libraries\IonAuth(); ?>
    <?= link_tag('public/css/bootstrap.min.css') ?>
    <?= link_tag('public/select2/select2.min.css') ?>
    <?= link_tag('public/jquery-ui/jquery-ui.min.css') ?>
    <?= link_tag('public/css/custom-style.css') ?>
    <?= link_tag('public/datatables/dataTables.bootstrap5.min.css') ?>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/public/images/logo.png">
  </head>
  <body>
   <div class="container my-3">
        <div class="d-flex justify-content-center">
            <?= img('public/images/logo.png', false,['class' =>'logo']); ?>
            <div style="text-align:center; padding-left:15px;padding-top:10px">
              <h3>Teachers Recruitment Board</h3>
              <h4>Objection Tracking System</h4>
            </div>
        </div>
   </div> 
  <nav class="navbar navbar-expand-lg navbar-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Teachers Recruitment Board</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Dashboard</a>
        </li>
        <?php if($this->ionAuth->isAdmin()): ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            User Management
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url(); ?>/auth">List Users</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= base_url(); ?>/auth/create-user">Create Single User</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?= base_url(); ?>/user/bulk-create">Create Bulk Users</a></li>
          </ul>
        </li>

        <?php endif; ?>  
        <li class="nav-item">
          <a class="nav-link" href="#">Reports</a>
        </li>
      </ul>
      
      <ul class="navbar-nav">
        <?php if($this->ionAuth->loggedIn()): ?>
        <li class="nav-item">
            <a href="<?= base_url(); ?>/auth/logout" class="nav-link">Logout</a>
        </li>
        <?php else: ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/auth/login" class="nav-link">Login</a>
        </li>
        <?php endif; ?>
      </ul>  
    </div>
  </div>
</nav>

        <div class="container-fluid px-5" style="min-height:400px">
            <?= $this->renderSection("body") ?>
        </div>
        <footer class="mt-5">
          <nav class="navbar navbar-expand-lg navbar-primary" style="height:30px">
            <div class="container">
              <!-- <a class="text-white" href="#" style="text-aling:center">Teachers Recruitment Board</a> -->
            </div>
        </nav>
        </footer>
        <?= script_tag('public/jquery/jquery.min.js') ?>
        <?= script_tag('public/js/bootstrap.bundle.min.js') ?>
        <?= script_tag('public/jquery-ui/jquery-ui.min.js') ?>
        <?= script_tag('public/select2/select2.min.js') ?>
        <?= script_tag('public/datatables/jquery.dataTables.min.js') ?>
        <?= script_tag('public/datatables/dataTables.bootstrap5.min.js') ?>
  <script>
  $(function() {
    $(".datepicker").datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: 'yy-mm-dd'
    });
  });
  </script>
  <script>
    $(document).ready(function() {
        $('.select2').select2();
    });
    $(document).ready( function () {
    $('#dataTable').DataTable();
});
  </script>
  <script>
    $('#question_number').change(function(){
      var question = $(this).val();
      $.ajax({
        method: 'POST',
        url: '<?= base_url()."/question/details/"?>'+question,
        data: { question : question},
        success: function (data) {
          var objection_text = '';
          // $('#court-name').find('option').not(':first').remove()
          $.each(JSON.parse(data), function(index,value){
            objection_text = value['objection_text'];
          });
          $('#objection_text').val(objection_text);
        }
    });
  });
  </script>
  </body>
</html>
