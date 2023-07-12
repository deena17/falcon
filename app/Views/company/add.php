<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Company</li>
    <li class="breadcrumb-item active">New</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<?php $validation = \Config\Services::validation(); ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h5 class="card-title"><strong>New Contact</strong></h5>
        <a href="<?= url_to('company.list'); ?>" class="btn btn-info float-right">
            <i class="fa fa-arrow-left mr-2"></i>Back
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="<?= url_to('company.add'); ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="<?= set_value('name'); ?>"
                            class="form-control <?php if ($validation->getError('name')) : ?>is-invalid<?php endif ?>" />
                        <?php if ($validation->getError('name')) : ?>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('name') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" value="<?= set_value('phone'); ?>" id="phone"
                            name="phone"
                            class=" form-control <?php if ($validation->getError('phone')) : ?>is-invalid<?php endif ?>" />
                        <?php if ($validation->getError('phone')) : ?>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('phone') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="landline">Landline Number</label>
                        <input type="text" value="<?= set_value('landline'); ?>"
                            class="form-control <?php if ($validation->getError('landline')) : ?>is-invalid<?php endif ?>"
                            id="landline" name="landline">
                        <?php if ($validation->getError('landline')) : ?>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('landline') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="street">Address</label>
                        <input type="text" class="form-control <?php if ($validation->getError('street')) : ?>is-invalid<?php endif ?>"
                            id="street" name="street" value="<?= set_value('street'); ?>" />
                        <?php if ($validation->getError('street')) : ?>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('street') ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?= set_value('city'); ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="district">District</label>
                        <input type="text" class="form-control" name="district" id="district" value="<?= set_value('district'); ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" name="state" id="state" value="<?= set_value('state'); ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control" name="pincode" id="pincode" value="<?= set_value('pincode'); ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" name="website" id="website" value="<?= set_value('website'); ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pan_number">Pan Number</label>
                        <input type="text" class="form-control" name="pan_number" id="pan_number" value="<?= set_value('pan_number'); ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="gst_number">GST Number</label>
                        <input type="text" class="form-control" name="gst_number" id="gst_number" value="<?= set_value('gst_number'); ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control" name="logo" id="logo" value="<?= set_value('logo'); ?>">
                    </div>
                </div>
                <div class="col-md-3 mt-4 pt-3">
                    <div class="form-group">
                        <label for="is_active" class="mr-2">Is Active</label>
                        <input type="checkbox" name="is_active" id="is_active" value="<?= set_value('is_active'); ?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>