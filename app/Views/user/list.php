<?= $this->extend('layout/base'); ?>

<?= $this->section('body'); ?>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">List users</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Modified At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($users): ?>
                        <?php foreach($users as $u): ?>
                            <?php static $i=1; ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $u['username']; ?></td>
                                <td><?= $u['role']; ?></td>
                                <td><?= $u['created_at']; ?></td>
                                <td><?= $u['updated_at']; ?></td>
                                <td>
                                    <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                    <a href="<?= base_url(); ?>/user/reset/<?= $u['id'] ?>" class="btn btn-outline-success btn-sm">Reset Password</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>       
                        <?php endif; ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>