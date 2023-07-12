<?= $this->extend("layout/customer") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Document</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("main") ?>

<!-- Main content -->
<section class="content">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h5 class="card-title"><strong>New Document</strong></h5>
            <a href="<?= url_to('customer.document.list', $customer->id); ?>" class="btn btn-info float-right">
                <i class="fa fa-arrow-left mr-2"></i>Back
            </a>
        </div>
        <div class="card-body">
            <form action="<?= url_to('customer.document.add', $customer->id) ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="document-date" class="col-sm-3 col-form-label">Document Date</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="document-date" name="document_date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="document_title" class="col-sm-3 col-form-label">Document Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="document_title" name="document_title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="document-description" class="col-sm-3 col-form-label">Remarks</label>
                    <div class="col-sm-9">
                        <textarea name="document_description" id="document-description" rows="3"
                            class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="document-file" class="col-sm-3 col-form-label">Upload</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="document-file" name="document_file">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?= $this->endSection(); ?>