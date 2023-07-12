<?= $this->extend("layout/base") ?>
<?= $this->section("body") ?>
<?php $validation = \Config\Services::validation(); ?>
    <div class="row mt-5">
        <div class="col-md-6 offset-3">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header bg-white">
                    <h5 class="card-title">Reset Password</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url(); ?>/user/reset" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input 
                                type="text" 
                                class="form-control<?php if($validation->getError('username')): ?> is-invalid<?php endif; ?>" 
                                id="username" 
                                name="username" 
                                value="<?= $user['username'] ?>"
                                disabled="disabled"
                            />
                            <div class="invalid-feedback">
                                <?= $validation->getError('username');?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="npassword" class="form-label">New Password</label>
                            <input 
                                type="npassword" 
                                class="form-control<?php if($validation->getError('npassword')): ?> is-invalid<?php endif; ?>" 
                                id="npassword" 
                                name="npassword"
                            />
                            <div class="invalid-feedback">
                                <?= $validation->getError('npassword');?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="cpassword" class="form-label">Confirm Password</label>
                            <input 
                                type="cpassword" 
                                class="form-control<?php if($validation->getError('cpassword')): ?> is-invalid<?php endif; ?>" 
                                id="cpassword" 
                                name="cpassword"
                            />
                            <div class="invalid-feedback">
                                <?= $validation->getError('password');?>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input type="submit" class="btn btn-outline-success" value="Update" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>