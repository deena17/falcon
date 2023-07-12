<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Currency</li>
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
                <h5 class="card-title">Create/Edit Currency</h5>
            </div>
            <div class="card-body">
                <form action="" id="myForm">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" id="code" class="form-control" name="code">
                        <div class="invalid-feedback">
                            Currency code required
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" id="description" class="form-control" name="description">
                        <div class="invalid-feedback">
                            Currency description required
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="symbol">Symbol</label>
                        <input type="text" id="symbol" class="form-control" name="symbol">
                        <div class="invalid-feedback">
                            Currency symbol required
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
        function loadCurrency(){
            $.get("<?= site_url(); ?>api/currency", function(response, status){
                var listItems = '';
                for(i=0; i<response.data.length; i++){
                    listItems += `
                        <li class="list-group-item">
                            ${response.data[i].symbol} - ${response.data[i].code} - ${response.data[i].description}
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
            $("#code").val('');
            $("#description").val('');
            $("#symbol").val('');
            if($(".btn-info")){
                $(".btn-info").removeClass("btn-info").addClass("btn-success").text("Save");
            }
        }

        function validateForm(){
            var code = $("#code").val();
            var description = $("#description").val();
            var symbol = $("#symbol").val();
            if(code == ''){
                $("#code").addClass("is-invalid");
                $("#code").focus();
                return false;
            }
            else{
                $("#code").removeClass("is-invalid");
            }
            if(description == ''){
                $("#description").addClass("is-invalid");
                $("#description").focus();
                return false;
            }
            else{
                $("#description").removeClass("is-invalid");
            }
            if(symbol == ''){
                $("#symbol").addClass("is-invalid");
                $("#symbol").focus();
                return false;
            }
            else{
                $("#symbol").removeClass("is-invalid");
            }
            
            return [ code, description, symbol];
        }

        loadCurrency();

        $("#reset-button").click(function(e){
            e.preventDefault();
            resetForm();  
        });

        $(".list-group").on('click', '.btn-primary', function(){
            var {id} = $(this).data(id);
            resetForm();
            $.get(`<?= site_url(); ?>api/currency/${id}`, function(response, status){
                $("#code").val(response.code);
                $("#description").val(response.description);
                $("#symbol").val(response.symbol);
                $(".btn-success").removeClass("btn-success").addClass("btn-info").text("Update");
            });
            $(".form-group").on('click', '.btn-info', function(){
                const [ code, description, symbol ] = validateForm();
                $.ajax({
                url: `<?= site_url(); ?>api/currency/${id}`,
                type: 'PUT',
                dataType: 'json',
                data:{id:id, code:code, description:description, symbol:symbol },
                success: function(result) {
                    alert("Currency details updated successfully");
                    resetForm();
                    loadCurrency();
                }
            });
            })
        });

        $(".list-group").on('click', '.btn-danger', function(){
            var {id} = $(this).data(id);
            if(confirm("Are you sure want to delete the currency?")){
                $.ajax({
                    url: `<?= site_url(); ?>api/currency/${id}`,
                    type: 'DELETE',
                    success: function(result) {
                        loadCurrency();
                    }
                });
            }
            return false;
        });

        
        $(".form-group").on('click', '.btn-success', function(){
            const [code, description, symbol] = validateForm();
            $.ajax({
                url: `<?= site_url(); ?>api/currency`,
                type: 'POST',
                dataType: 'json',
                data:{ code:code, description:description, symbol:symbol },
                success: function(result) {
                    alert("Currency details added successfully");
                    resetForm();
                    loadCurrency();
                }
            });
        });
    }); 
</script>


<?= $this->endSection(); ?>