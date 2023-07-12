<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Supplier</li>
    <li class="breadcrumb-item active">Detail</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section('title'); ?>
Contact Detail
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h5 class="card-title"><strong>Supplier Detail</strong></h5>
        <a href="<?= url_to('supplier.list'); ?>" class="btn btn-info float-right">
            <i class="fa fa-arrow-left mr-2"></i>Back
        </a>
    </div>
    <div class="card-body">
        <p><strong><?= $supplier->vendor_code; ?> - <?= $supplier->name; ?></strong></p>
        <p>
            <?= $supplier->address; ?> <br>
            <?= $supplier->city; ?> <br>
            <?= $supplier->country; ?> <br>
            <?= $supplier->zipcode; ?> <br>
            <?= $supplier->website; ?>
        </p>
        <p>
            <i class="fa fa-phone mr-2"></i> Office Number: <?= $supplier->office_number; ?> <br>
            <i class="fa fa-fax mr-2"></i> Fax Number: <?= $supplier->fax_number; ?>
        </p>
        <div class="card">
            <div class="card-body p-2">
                <p><a href="<?= url_to('supplier.contact.add', $supplier->id);?>" class="btn btn-success"><i class="fa fa-plus mr-2"></i>Add Contact</a></p>
                <?php if($contacts): ?>
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <?php foreach($contacts as $c): ?>
                                <tr>
                                    <td><?= $c->name; ?></td>
                                    <td><?= $c->designation; ?></td>
                                    <td><?= $c->contact_number; ?></td>
                                    <td><?= $c->email; ?></td>
                                    <td>
                                        <a href="<?= url_to('supplier.contact.edit', $supplier->id, $c->id); ?>"><i class="fa fa-pencil-alt mr-3 text-primary"></i></a>
                                        <a href="<?= url_to('supplier.contact.delete', $supplier->id, $c->id); ?>"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>    
                        </tbody>
                    </table>
                <?php endif; ?>    
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>