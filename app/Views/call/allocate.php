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
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td>Call Date</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Call Date</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Call Date</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Call Date</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Call Date</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Call Date</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Call Date</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Call Date</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Call Date</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <form action="">
                                <div class="form-group row">
                                    <label for="due_date" class="form-label col-sm-3">Due Date</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="due_date" name="due_date" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="due_date" class="form-label col-sm-3">Is Combined Call?</label><br>
                                    <div class="col-sm-9">
                                        <input type="radio" class="mx-2" name="is_combined" value="yes">Yes
                                        <input type="radio" class="mx-2" name="is_combined" value="no">No
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="due_date" class="form-label col-sm-3">Engineer</label>
                                    <div class="col-sm-9">
                                        <div class="select2-purple">
                                            <select name="engineer" id="engineer" class="select2" data-dropdown-css-class="select2" multiple="" style="width:100%">
                                                <option value="0">Select Engineer</option>
                                                <option value="0">One</option>
                                                <option value="0">Two</option>
                                                <option value="0">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="due_date">Remarks</label>
                                    <textarea name="" id="remarks" cols="30" rows="3" class="form-control"></textarea>
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
            $('input[type=radio][name=is_combined]').change(function() {
                if (this.value == 'yes') {
                   $("#engineer").removeClass("form-control").addClass("select2").attr("multiple", "multiple").attr("data-dropdown-css-class", "select2-purple").css("width", "100%");
                   $('.select2').select2()
                }
                else if (this.value == 'no') {
                    $("#engineer").removeClass("select2").addClass("form-control").attr("multiple", false).attr("data-dropdown-css-class", "");
                }
            });
        });
    </script>
<?= $this->endSection(); ?>