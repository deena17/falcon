<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">status</li>
    <li class="breadcrumb-item active">List</li>
</ol>
<?= $this->endSection(); ?>


<?= $this->section('title'); ?>
<?= $pageTitle; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-md-7">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h5 class="card-title"><?= $pageTitle; ?></h5>
            </div>
            <div class="card-body">
                <ul class="list-group">

                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h5 class="card-title">Create/Edit Invoice Status
            </div>
            <div class="card-body">
                <form action="" id="myForm">
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" id="status" class="form-control" name="status">
                        <div class="invalid-feedback">
                            Status required
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="JavaScript:void(0)" class="btn btn-success">Save</a>
                        <button class="btn btn-warning" id="reset-button">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>


<?= $this->section('scripts'); ?>
<script>
    $("document").ready(function(){
        function loadStatus(){
            $.get("<?= site_url(); ?>api/status", function(response, status){
                var listItems = '';
                for(i=0; i<response.data.length; i++){
                    listItems += `
                        <li class="list-group-item">
                            ${response.data[i].status}
                            <div class="float-right">
                                <a href="JavaScript:void(0)" class="btn btn-primary" data-id=${response.data[i].id}>
                                    <i class="fa fa-pencil-alt mr-2"></i>Edit</a>
                                <a href="JavaScript:void(0)" class="btn btn-danger" data-id=${response.data[i].id}>
                                    <i class="fa fa-trash mr-2"></i>Delete</a>
                            </div>
                        </li>
                    `
                }
                $(".list-group").html(listItems);
            });
        }

        function resetForm(){
            $("#status").val('');
            if($(".btn-info")){
                $(".btn-info").removeClass("btn-info").addClass("btn-success").text("Save");
            }
        }

        function validateForm(){
            var status = $("#status").val();
            if(status == ''){
                $("#status").addClass("is-invalid");
                $("#status").focus();
                return false;
            }
            else{
                $("#status").removeClass("is-invalid");
            }            
            return [status];
        }

        loadStatus();

        $("#reset-button").click(function(e){
            e.preventDefault();
            resetForm();  
        });

        $(".list-group").on('click', '.btn-primary', function(){
            var {id} = $(this).data(id);
            resetForm();
            $.get(`<?= site_url(); ?>api/status/${id}`, function(response, status){
                $("#status").val(response.status);
                $(".btn-success").removeClass("btn-success").addClass("btn-info").text("Update");
            });
            $(".form-group").on('click', '.btn-info', function(){
                const [ code, description, symbol ] = validateForm();
                $.ajax({
                url: `<?= site_url(); ?>api/status/${id}`,
                type: 'PUT',
                dataType: 'json',
                data:{id:id, status:status },
                success: function(result) {
                    alert("status details updated successfully");
                    resetForm();
                    loadStatus();
                }
            });
            })
        });

        $(".list-group").on('click', '.btn-danger', function(){
            var {id} = $(this).data(id);
            if(confirm("Are you sure want to delete the status?")){
                $.ajax({
                    url: `<?= site_url(); ?>api/status/${id}`,
                    type: 'DELETE',
                    success: function(result) {
                        loadStatus();
                    }
                });
            }
            return false;
        });

        
        $(".form-group").on('click', '.btn-success', function(){
            const [status] = validateForm();
            $.ajax({
                url: `<?= site_url(); ?>api/status`,
                type: 'POST',
                dataType: 'json',
                data:{ status:status },
                success: function(result) {
                    alert("Status details added successfully");
                    resetForm();
                    loadStatus();
                }
            });
        });
    }); 
</script>


<?= $this->endSection(); ?>