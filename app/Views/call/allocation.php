<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Customer</li>
    <li class="breadcrumb-item">Call</li>
    <li class="breadcrumb-item active">Allocation</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h5 class="card-title"><strong><?= $pageTitle; ?></strong></h5>
                    <div class="float-right">
                        <a href="<?= url_to('customer.call.list', $customer->id) ?>" class="btn btn-info">
                            <i class="fa fa-arrow-left mr-1"></i>Back</a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <form>
                        <div class="row">
                            <table class="table table-bordered table-stiped">
                                <thead>
                                    <tr>
                                        <td>Call Number</td>
                                        <td>Call Date</td>
                                        <td>Customer</td>
                                        <td>Nature of Complaint</td>
                                        <td>Contact Number</td>
                                        <td>#</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="#">GFI/CAL/1212/2022/077</a></td>
                                        <td>17-03-2023</td>
                                        <td>Tamil Nadu e-Governance </td>
                                        <td>Machine burned</td>
                                        <td>8344381139</td>
                                        <td><input type="submit" class="btn btn-success" value="Submit"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>