<?= $this->extend("layout/admin") ?>
<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
	    <li class="breadcrumb-item active">Access Denied</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
    <section class="content">
        <div class="error-page">
            <h1 class="headline text-danger"><strong> 403</strong></h1>
            <div class="error-content">
                <h3 class="text-danger"><i class="fas fa-exclamation-triangle text-danger"></i> <strong>Oops! Access Denied.</strong></h3>
                <p> You don't have permission to access this resource. Please contact site adminstrator for further support.
                    Meanwhile, you may <a href="<?= base_url(); ?>">return to dashboard</a> or try using the search form.
                </p>
                <!-- <form class="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form> -->
            </div>
        </div>
    </section>
<?= $this->endSection(); ?>    