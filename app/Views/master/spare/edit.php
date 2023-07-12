<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item">Spare</li>
    <li class="breadcrumb-item active">Add</li>
</ol>
<?= $this->endSection(); ?>


<?= $this->section('title'); ?>
<?= $pageTitle; ?>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="card card-outline card-primary">
    <div class="card-header">
        <h5 class="card-title"><?= $pageTitle; ?></h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="product">Product</label>
                    <select name="product" id="product" class="form-control">
                        <option value="0">Select Product</option>
                        <?php foreach($products as $p): ?>
                        <option value="<?= $p->id; ?>"><?= $p->name; ?></option>
                        <?php endforeach; ?>    
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="item-code">Item Code</label>
                    <input type="text" class="form-control" name="item_code" id="item-code">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="item-name">Item Name</label>
                    <input type="text" class="form-control" name="item_name" id="item-name">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="2" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="basic-unit">Basic Unit</label>
                    <input type="text" class="form-control" name="basic_unit" id="basic-unit">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="unit-rate">Unit Rate</label>
                    <input type="text" class="form-control" name="unit_rate" id="unit-rate">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="rack-number">Rack Number</label>
                    <input type="text" class="form-control" name="rack_number" id="rack-number">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="shelf-number">Shelf Number</label>
                    <input type="text" class="form-control" name="shelf_number" id="shelf-number">
                </div>
            </div>
            <div class="col-md-3 pt-4">
                <div class="form-group">
                    <input type="checkbox" name="critical_spare"> Critical Spare
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="item-image">Item Image</label>
                    <input type="file" name="item_image" id="item-image" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success px-4" value="Save">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>


<?= $this->section('scripts'); ?>

<?= $this->endSection(); ?>