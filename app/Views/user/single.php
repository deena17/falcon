<?= $this->extend("layout/base") ?>
<?= $this->section("body") ?>
    <div class="row mt-5">
        <?php $session = \Config\Services::session() ?>
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header bg-white">User Registration</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="smeNumber" class="form-label">SME Number</label>
                        <input type="text" class="form-control" id="smeNumber" name="smeNumber">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">SME Name</label>
                        <input type="text" class="form-control" id="name" name="name" />
                    </div>
                    <div class="mb-3">
                        <label for="userName" class="form-label">SME Username</label>
                        <input type="text" class="form-control" id="userName" name="userName" />
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <select name="subject" id="subject" class="form-select">

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="validUpto" class="form-label">Valid Upto</label>
                        <input type="text" class="form-control" id="validUpto" name="validUpto" />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" />
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="text" class="form-control" id="confirmPassword" name="confirmPassword" />
                    </div>
                    <div class="mt-2">
                        <input type="submit" class="btn btn-outline-success" value="Register" />
                        <input type="reset" class="btn btn-outline-warning" value="Cancel">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>