<?= $this->extend("layout/admin") ?>
<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
	    <li class="breadcrumb-item active">Not found</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
    <section class="content">
        <div class="error-page">
            <h1 class="headline text-warning"><strong> 404</strong></h1>
            <div class="error-content">
                <h3 class="text-warning"><i class="fas fa-exclamation-triangle text-warning"></i> <strong>Oops! Not found.</strong></h3>
                <p> The requested URL was not found on this server.</p>
                <form class="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?= $this->endSection(); ?>    