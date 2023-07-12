<?= $this->extend("layout/customer") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Customer</li>
    <li class="breadcrumb-item">Service Call</li>
    <li class="breadcrumb-item active">List</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section('title'); ?>
Contact List
<?= $this->endSection(); ?>

<?= $this->section("main") ?>
<div class="card">
    <div class="card-header py-2">
        <h5 class="card-title pt-2"><strong><?= $pageTitle; ?></strong></h5>
        <a href="<?= url_to('customer.servicecall.add'); ?>" class="btn btn-success float-right">
            <i class="fa fa-plus mr-2"></i>New Call
        </a>
    </div>
    <div class="card-body p-2">
        <?php for ($i = 0; $i < 10; $i++) : ?>
        <div class="card">
            <style>
            table tr>td {
                padding: 6px 10px !important;
            }
            </style>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Call Number</td>
                        <td>CAL/112022/003</td>
                        <td>Call Date</td>
                        <td>12-11-2022</td>
                    </tr>
                    <tr>
                        <td>Nature of Complaint</td>
                        <td>DOUBLE HEAD 6O INCH MACHINE SMPS PROBLEM</td>
                        <td>Service Type</td>
                        <td>Non-Warrenty</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td colspan="3"><span class="badge bg-primary" style="font-size:14px">Pending</span></td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group">
                            <label>Select Engineer</label>
                            <div class="select2-purple">
                                <select class="select2" multiple="multiple" data-dropdown-css-class="select2-purple"
                                    style="width: 100%;">
                                    <option value="2">CEO MD</option>
                                    <option value="3">ABDUL RASHEED </option>
                                    <option value="4">PALANIMURUGAN R</option>
                                    <option value="5">KARTHIKEYAN R</option>
                                    <option value="6">GOKULNATHAN G</option>
                                    <option value="7">BALAJI N.V</option>
                                    <option value="8">KANNAN M</option>
                                    <option value="9">PALANIKUMAR V</option>
                                    <option value="10" selected>MOHAMED BASHITH S</option>
                                    <option value="11">MANIKANDAN P</option>
                                    <option value="12">GOBALAKRISHNAN M</option>
                                    <option value="13">MAYAKKANNAN K</option>
                                    <option value="14">YASHIR M</option>
                                    <option value="17">CUSTOMER CARE </option>
                                    <option value="18">SUMATHI S</option>
                                    <option value="19">STORE </option>
                                    <option value="21">BDM </option>
                                    <option value="22">mohamed shamsad</option>
                                    <option value="23">GOLDEN SHARP </option>
                                    <option value="24">ANANDHARAJ A</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-4 pt-2">
                        <a href="<?= url_to('customer.servicecall.delete', $i) ?>" class="btn btn-info"><i
                                class="fa fa-arrow-right mr-2"></i>Assign Engineer</a>
                    </div>
                </div>
                <a href="<?= url_to('customer.servicecall.edit', $i) ?>" class="btn btn-primary"><i
                        class="fa fa-pencil-alt mr-2"></i>Edit</a>
                <a href="<?= url_to('customer.servicecall.delete', $i) ?>" class="btn btn-danger"><i
                        class="fa fa-trash mr-2"></i>Delete</a>

            </div>
        </div>
        <?php endfor; ?>
    </div>
</div>
<?= $this->endSection(); ?>