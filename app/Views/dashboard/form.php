<?= $this->extend('layout/admin'); ?>

<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">DataTables</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
    SME Workflow
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">SME Workflow</h5>
            </div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="mb-3 row">
                        <label for="question_number" class="col-sm-2 col-form-label">Question Number</label>
                        <div class="col-sm-3">
                            <select name="question_number" id="question_number" class="form-select select2">
                                <option value="0">Select Question Number</option>
                                <?php foreach($questions as $q): ?>
                                <option value="<?= $q->question_id; ?>"><?= $q->question_id; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" class="btn btn-outline-success" value="Get Details">
                        </div>
                    </div>
                    <!-- <div class="mb-3 row">
                        <label for="question_text" class="col-sm-2 col-form-label">Question Text</label>
                        <div class="col-sm-10">
                            <textarea name="question_text" id="question_text" class="form-control" rows="3"></textarea>
                        </div>
                    </div> -->
                </form>    
                <?php if($objections): ?> 
                <div class="my-5">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Candidate's Objection</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsiv">
                            <table class="table table-bordered table-striped" id="dataTable">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <td>Objection Text</td>
                                        <td>Book Name</td>
                                        <td>Author Name</td>
                                        <td>Page&nbsp;No</td>
                                        <td>Document</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($objections as $o): ?>
                                    <tr>
                                        <td><?= $o->objection_text; ?></td>
                                        
                                        <td><?= $o->book_name; ?></td>
                                        <td><?= $o->author_name; ?></td>
                                        <td><?= $o->page_name; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>/dashboard/form/<?= $o->upload_document; ?>"><?= $o->upload_document; ?></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h6 class="card-title">SME Action</h6>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label for="" class="form-label">SME Action</label>
                                    <select name="action" id="action" class="form-select">
                                        <option value="">Approve</option>
                                        <option value="">Reject</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="standard" class="form-label">Standard</label>
                                    <select name="standard" id="standard" class="form-select">
                                        <option value="">6th Standard</option>
                                        <option value="">7th Standard</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <select name="subject" id="subject" class="form-select">
                                        <option value="">Tamil</option>
                                        <option value="">English</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label for="page_number" class="form-label">Page Number</label>
                                    <input type="text" name="page_number" id="page_number" class="form-control" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <label for="" class="form-label">Upload Document</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="form-label">Remarks</label>
                                    <textarea name="remarks" id="" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        <div>
                        <input type="submit" class="btn btn-outline-success" value="Submit">
                        <input type="reset" class="btn btn-outline-warning" value="Cancel">
                    </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection(); ?>