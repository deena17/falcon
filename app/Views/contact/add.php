<?= $this->extend("layout/customer") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Customer</li>
    <li class="breadcrumb-item">Contact</li>
    <li class="breadcrumb-item active">New</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("main") ?>
<?php $validation = \Config\Services::validation(); ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h5 class="card-title"><strong><?= $page_title; ?></strong></h5>
        <a href="<?= url_to('customer.contact.list', $customer->id); ?>" class="btn btn-info float-right">
            <i class="fa fa-arrow-left mr-2"></i>Back
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="<?= url_to('customer.contact.add', $customer->id); ?>">
            <div class="form-group row">
                <label for="contact-name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" id="contact_name" name="contact_name" value="<?= set_value('contact_name'); ?>"
                        class="form-control <?php if ($validation->getError('contact_name')) : ?>is-invalid<?php endif ?>" />
                    <?php if ($validation->getError('contact_name')) : ?>
                    <div class=" invalid-feedback">
                        <?= $validation->getError('contact_name') ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="contact-mobile" class="col-sm-3 col-form-label">Mobile Number</label>
                <div class="col-sm-9">
                    <input type="text" value="<?= set_value('contact_name'); ?>" id="contact-mobile"
                        name="contact_mobile"
                        class=" form-control <?php if ($validation->getError('contact_mobile')) : ?>is-invalid<?php endif ?>" />
                    <?php if ($validation->getError('contact_mobile')) : ?>
                    <div class=" invalid-feedback">
                        <?= $validation->getError('contact_mobile') ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="contact-alternate" class="col-sm-3 col-form-label">Alternate Number</label>
                <div class="col-sm-9">
                    <input type="text" value="<?= set_value('contact_alternate'); ?>"
                        class="form-control <?php if ($validation->getError('contact_alternate')) : ?>is-invalid<?php endif ?>"
                        id="contact-alternate" name="contact_alternate">
                    <?php if ($validation->getError('contact_alternate')) : ?>
                    <div class=" invalid-feedback">
                        <?= $validation->getError('contact_alternate') ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="contact-email" class="col-sm-3 col-form-label">E-Mail Id</label>
                <div class="col-sm-9">
                    <input type="text"
                        class="form-control <?php if ($validation->getError('contact_designation')) : ?>is-invalid<?php endif ?>"
                        id="contact-email" name="contact_email" value="<?= set_value('contact_email'); ?>" />
                    <?php if ($validation->getError('contact_alternate')) : ?>
                    <div class=" invalid-feedback">
                        <?= $validation->getError('contact_alternate') ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="contact-designation" class="col-sm-3 col-form-label">Designation</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="contact-designation" name="contact_designation"
                        value="<?= set_value('contact_designation'); ?>">
                </div>
            </div>
            <div class=" form-group row">
                <label for="contact_remarks" class="col-sm-3 col-form-label">Remarks</label>
                <div class="col-sm-9">
                    <textarea name="contact_remarks" id="contact-remarks" rows="5"
                        class="form-control"><?= set_value('contact_remarks'); ?></textarea>
                </div>
            </div>
            <fieldset class="form-group row">
                <legend class="col-form-label col-sm-3 float-sm-left pt-0">Primary Contact?</legend>
                <div class="col-sm-9">
                    <input type="radio" name="is_primary" id="gridRadios1" value="0" checked>
                    No
                    <input class="ml-3" type="radio" name="is_primary" id="gridRadios2" value="1">
                    Yes
                </div>
            </fieldset>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>