<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Spare</li>
    <li class="breadcrumb-item active">List</li>
</ol>
<?= $this->endSection(); ?>


<?= $this->section('title'); ?>
<?= $pageTitle; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h5 class="card-title">Spare List</h5>
            <a href="<?= url_to('spare.add'); ?>" class="btn btn-success float-right"><i class="fa fa-plus mr-1"></i>New Spare</a>
        </div>
        <div class="card-body p-2">
          <div class="row">
              <?php foreach($spares as $s): ?>
              <div class="col-md-3">
                  <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_187ead42f20%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_187ead42f20%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.18333435058594%22%20y%3D%2296%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title"><?= $s->item_name; ?></h5>
                      <p class="card-text"><?= $s->description; ?></p>
                      <p>Location: <?= $s->rack_number .' / '. $s->shelf_number; ?></p>
                      <div class="text-center">
                          <a href="<?= url_to('spare.edit', $s->id); ?>" class="btn btn-info px-4">Edit</a>
                          <a href="<?= url_to('spare.delete', $s->id); ?>" class="btn btn-danger px-4">Delete</a>
                      </div>
                    </div>
                  </div>
              </div>    
              <?php endforeach; ?>    
          </div>
        </div>
    </div>
<?= $this->endSection(); ?>


<?= $this->section('scripts'); ?>

<?= $this->endSection(); ?>