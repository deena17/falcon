<?= $this->extend('layout/base'); ?>
<?= $this->section('body'); ?>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">SME Workflow</h5>
            </div>
            <div class="card-body">
                <form action="" method="post">
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
                    </div>
                    <div class="mb-3 row">
                        <label for="question_text" class="col-sm-2 col-form-label">Question Text</label>
                        <div class="col-sm-10">
                            <textarea name="question_text" id="question_text" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="question_text" class="col-sm-2 col-form-label">Answer</label>
                        <?php for($i=1; $i<5; $i++): ?>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="option" id="option">
                                <label class="form-check-label" for="option">
                                    option <?= $i; ?>
                                </label>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                    <div class="mb-3 row">
                        <label for="authorized_answer" class="col-sm-2 form-label">Authorized Answer</label>
                        <div class="col-md-2">
                            <input type="text" name="authorized_answer" class="form-control">
                        </div>   
                        <label for="objection_type" class="col-sm-2 form-label">Objection Type</label> 
                        <div class="col-sm-6">
                            <select name="objection_type" id="objection_type" class="form-select">
                                <option value="0">Select Objection type</option>
                                <option value="">No Answer</option>
                                <option value="">Multiple Answers</option>
                                <option value="">Wrong Question</option>
                                <option value="">Answer Change</option>
                            </select>
                        </div>    
                    </div>
                    <div class="mb-3 row">
                        <label for="objection_text" class="col-sm-2 form-label">Objection Text</label>
                        <div class="col-sm-10">
                            <input type="text" name="objection_text" class="form-control" id="objection_text">
                        </div>    
                    </div>
                    <div class="mb-3 row">
                        <label for="standard" class="col-sm-2 form-label">Standard</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="standard" id="standard">
                        </div>
                        <label for="subject" class="col-sm-2 form-label">Subject</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="subject" id="subject">
                        </div>
                        <label for="page_number" class="col-sm-2 form-label">Page Number</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="page_number" id="page_number">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="uploaded_documents">Uploaded Documents</label>
                    </div>
                    <hr class="mt-5">
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
    </div>
</div>
<?= $this->endSection(); ?>