<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Supplier</li>
    <li class="breadcrumb-item active">Edut</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<?php $validation = \Config\Services::validation(); ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h5 class="card-title"><strong>Edit Supplier</strong></h5>
        <a href="<?= url_to('supplier.list'); ?>" class="btn btn-info float-right">
            <i class="fa fa-arrow-left mr-2"></i>Back
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="<?= url_to('supplier.edit', $supplier->id); ?>">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="vendor-code">Vendor Code</label>
                        <input type="text" id="vendor-code" name="vendor_code" value="<?= $supplier->vendor_code; ?>"
                                class="form-control <?php if ($validation->getError('vendor_code')) : ?>is-invalid<?php endif ?>" />
                        <?php if ($validation->getError('vendor_code')) : ?>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('vendor_code') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?= $supplier->name; ?>"
                            class="form-control <?php if ($validation->getError('name')) : ?>is-invalid<?php endif ?>" />
                        <?php if ($validation->getError('name')) : ?>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('name') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="office-number">Office Number</label>
                        <input type="text" value="<?= $supplier->office_number; ?>" id="office-number"
                                name="office_number"
                                class=" form-control <?php if ($validation->getError('office_number')) : ?>is-invalid<?php endif ?>" />
                        <?php if ($validation->getError('office_number')) : ?>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('office_number') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fax_number">Fax Number</label>
                        <input type="text" value="<?= $supplier->fax_number; ?>"
                            class="form-control <?php if ($validation->getError('fax_number')) : ?>is-invalid<?php endif ?>"
                            id="fax_number" name="fax_number">
                        <?php if ($validation->getError('fax_number')) : ?>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('fax_number') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">E-Mail Id</label>
                        <input type="text"
                            class="form-control <?php if ($validation->getError('email')) : ?>is-invalid<?php endif ?>"
                            id="email" name="email" value="<?= $supplier->email; ?>" />
                        <?php if ($validation->getError('email')) : ?>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('email') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">Address</label>
                          <input type="text" class="form-control" id="address" name="address" value="<?= $supplier->address; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" value="<?= $supplier->city; ?>" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" name="country" id="country" class="form-control" value="<?= $supplier->country; ?>" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="zipcode">Zipcode</label>
                        <input type="text" name="zipcode" id="zipcode" class="form-control" value="<?= $supplier->zipcode; ?>" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" name="website" id="website" class="form-control" value="<?= $supplier->website; ?>" />
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>