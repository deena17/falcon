<?= $this->extend("layout/base") ?>
<?= $this->section("body") ?>
    <div class="row mt-5">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header bg-white">Upload user details</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="userName" class="form-label">Upload File</label>
                        <input type="file" class="form-control" id="userName" name="userName">
                    </div>
                    <div class="mt-2">
                        <input type="submit" class="btn btn-outline-success" value="Upload" />
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>