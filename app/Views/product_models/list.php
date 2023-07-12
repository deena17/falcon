<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Models</a></li>
    <li class="breadcrumb-item active">List</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<!-- Main content -->
<section class="content">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h5 class="card-title"><strong>List Models</strong></h5>
            <div class="float-right">
                <a href="<?= url_to('productmodel.add') ?>" class="btn btn-success"><i class="fa fa-plus"></i> New
                    Model</a>
            </div>
        </div>
        <div class="card-body">
            <?php if(!empty($models)): ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Model</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($models as $m) : ?>
                        <tr>
                            <td><?= $m->id; ?></td>
                            <td><?= $m->product_id; ?></td>
                            <td><?= $m->name; ?></td>
                            <td><?= $m->description; ?></td>
                            <td>
                                <a href="<?= url_to('productmodel.edit', $m->id); ?>" class="btn btn-primary"><i
                                        class="fa fa-pencil-alt"></i> Edit</a>
                                <a href="<?= url_to('productmodel.delete', $m->id); ?>" class="btn btn-danger"><i
                                        class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fas fa-ban"></i> No models found
                </div>
            <?php endif; ?>    
        </div>
    </div>
    <?= $this->endSection(); ?>