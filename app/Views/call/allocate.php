<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-right">
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
                    <h5 class="card-title"><strong><?= $page_title; ?></strong></h5>
                    <div class="float-right">
                        <a href="<?= url_to('call.allocation') ?>" class="btn btn-info">
                            <i class="fa fa-arrow-left mr-1"></i>Back</a>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td>Department</td>
                                    <td><?= $call->name; ?></td>
                                </tr>
                                <tr>
                                    <td>Call Date</td>
                                    <td><?= $call->call_date; ?></td>
                                </tr>
                                <tr>
                                    <td>Customer Name</td>
                                    <td><?= $call->customer_name; ?></td>
                                </tr>
                                <tr>
                                    <td>Contact Person</td>
                                    <td><?= $call->contact_name; ?></td>
                                </tr>
                                <tr>
                                    <td>Contact Number</td>
                                    <td><?= $call->contact_number; ?></td>
                                </tr>
                                <tr>
                                    <td>Nature of Complaint</td>
                                    <td><?= $call->complaint_nature; ?></td>
                                </tr>
                                <tr>
                                    <td>Remarks</td>
                                    <td><?= $call->remarks; ?></td>
                                </tr>
                                <tr>
                                    <td>Installation Date</td>
                                    <td><?= $call->installation_date; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <label for="due_date" class="form-label col-sm-3">Due Date</label>
                                    <div class="col-sm-9">
                                        <input 
                                            type="text" 
                                            class="form-control datepicker" 
                                            id="due_date" 
                                            name="due_date" 
                                            value="<?= set_value('due_date'); ?>"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="due_date" class="form-label col-sm-3">Is Combined Call?</label><br>
                                    <div class="col-sm-9">
                                        <input type="radio" class="mx-2" name="is_combined" value="yes">Yes
                                        <input type="radio" class="mx-2" name="is_combined" value="no" checked>No
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="due_date" class="form-label col-sm-3">Engineer</label>
                                    <div class="col-sm-9">
                                        <div class="select2-purple" id="engineer-multiple">
                                            <select id="engineer" class="select2" multiple="multiple" name="engineer[]"
                                                style="width: 100%;" data-dropdown-css-class="select2-purple" value="">
                                                <?php foreach ($engineer as $e) : ?>
                                                <option value="<?= $e->id ?>"><?= $e->first_name.' '.$e->last_name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="due_date">Remarks</label>
                                    <textarea name="remarks" id="remarks" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>
    <script>
        $('document').ready(function(){
            // $('#engineer-multiple').hide();
            // $('input[type=radio][name=is_combined]').change(function() {
            //     if (this.value == 'yes') {
            //         $("#engineer-one").hide();
            //         $("#engineer-multiple").show();
            //     }
            //     else if (this.value == 'no') {
            //         $("#engineer-one").show();
            //         $("#engineer-multiple").hide();
            //     }
            // });
        });
    </script>
<?= $this->endSection(); ?>