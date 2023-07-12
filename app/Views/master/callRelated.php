<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Call Related</li>
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
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h5 class="card-title">Create/Edit Call Related</h5>
            </div>
            <div class="card-body">
                <form action="" id="myForm" data-id="">
                    <div class="form-group">
                        <label for="department-code">Call Related</label>
                        <input type="text" id="related" class="form-control" name="code">
                        <div class="invalid-feedback">
                            Call realted required
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
        function loadCallRelated(){
            $.get("<?= site_url(); ?>api/call-related", function(response, status){
                var listItems = '';
                for(i=0; i<response.data.length; i++){
                    listItems += `
                        <li class="list-group-item">
                            ${response.data[i].related}
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
            $("#related").val('');
            if($(".btn-info")){
                $(".btn-info").removeClass("btn-info").addClass("btn-success").text("Save");
            }
        }

        function validateForm(){
            var related = $("#related").val();
            if(related == ''){
                $("#related").addClass("is-invalid");
                $("#related").focus();
                return false;
            }
            else{
                $("#related").removeClass("is-invalid");
            }
            return [related,];
        }

        loadCallRelated();

        $("#reset-button").click(function(e){
            e.preventDefault();
            resetForm();  
        });

        $(".list-group").on('click', '.btn-primary', function(){
            var {id} = $(this).data(id);
            resetForm();
            $.get(`<?= site_url(); ?>api/call-related/${id}`, function(response, status){
                $("#related").val(response.related);
                $(".btn-success").removeClass("btn-success").addClass("btn-info").text("Update");
            });
            $(".form-group").on('click', '.btn-info', function(){
                const [related] = validateForm();
                $.ajax({
                url: `<?= site_url(); ?>api/call-related/${id}`,
                type: 'PUT',
                dataType: 'json',
                data:{id:id, related:related },
                success: function(result) {
                    alert("Call related details updated successfully");
                    resetForm();
                    loadCallRelated();
                }
            });
            })
        });

        $(".list-group").on('click', '.btn-danger', function(){
            var {id} = $(this).data(id);
            if(confirm("Are you sure want to delete the call related?")){
                $.ajax({
                    url: `<?= site_url(); ?>api/call-related/${id}`,
                    type: 'DELETE',
                    success: function(result) {
                        loadCallRelated();
                    }
                });
            }
            return false;
        });

        
        $(".form-group").on('click', '.btn-success', function(){
            const [related] = validateForm();
            $.ajax({
                url: `<?= site_url(); ?>api/call-related`,
                type: 'POST',
                dataType: 'json',
                data:{related:related},
                success: function(result) {
                    alert("Related details added successfully");
                    resetForm();
                    loadCallRelated();
                }
            });
        });
    }); 
</script>


<?= $this->endSection(); ?>