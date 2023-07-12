<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Models</a></li>
    <li class="breadcrumb-item active">List</li>
</ol>
<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<?php $validation = \Config\Services::validation(); ?>

<!-- Main content -->
<section class="content">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h5 class="card-title"><strong>Add Product Model</strong></h5>
            <div class="float-right">
                <a href="<?= url_to('productmodel.list') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="<?= url_to('productmodel.add')?>" method="post" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product" class="required">Product</label>
                            <select name="product" id="product" class="form-control">
                                <option value="0">Select product</option>
                                <?php foreach($product as $p): ?>
                                 <option value="<?= $p->id; ?>"><?= $p->name; ?></option>   
                                <?php endforeach; ?>    
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product-model">Product Model</label>
                            <input type="text" class="form-control <?php if ($validation->getError('model')) : ?>is-invalid<?php endif ?>" 
                                value="<?= set_value('model'); ?>" id="product-model" name="model" />
                            <div class=" invalid-feedback">
                                <?= $validation->getError('model') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="2" 
                                class="form-control <?php if ($validation->getError('description')) : ?>is-invalid<?php endif ?>">
                                    <?= set_value('description'); ?>
                            </textarea>
                            <div class=" invalid-feedback">
                                <?= $validation->getError('description') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="specification">Specification</label>
                            <textarea name="specification" id="specification" rows="2" class="form-control">
                                <?= set_value('specification'); ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dimension">Dimension</label>
                            <input type="text" class="form-control" id="dimension" name="dimension" placeholder="L x B x H" value="<?= set_value('dimension');?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="text" class="form-control" id="weight" name="weight" value="<?= set_value('weight'); ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="product_image">Product image</label>
                            <input type="file" class="form-control <?php if ($validation->getError('product_image')) : ?>is-invalid<?php endif ?>" 
                                id="product_image" name="product_image" value="<?= set_value('product_image'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('product_image'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="supplier">Supplier</label>
                            <select name="supplier" id="supplier" class="form-control">
                                <option value="0">Select supplier</option>
                                <?php foreach($supplier as $s): ?>
                                <option value="<?= $s->id; ?>"><?= $s->name; ?></option>
                                <?php endforeach; ?>    
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="related">Related Model</label>
                            <div class="select2-purple">
                                <select id="customer-department" class="select2" multiple="multiple"
                                    name="department[]" style="width: 100%;"
                                    data-dropdown-css-class="select2-purple" value="">
                                    <?php foreach($model as $m): ?>
                                        <option value="<?= $m->id; ?>"><?= $m->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-success" value="Save">
                        <input type="reset" class="btn btn-warning" value="Reset">
                    </div>
                </div>
            </form>    
        </div>
    </div>
    <?= $this->endSection(); ?>