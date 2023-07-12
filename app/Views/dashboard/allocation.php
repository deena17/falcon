<?= $this->extend("layout/admin") ?>

<?= $this->section('breadcrumb'); ?>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
	    <li class="breadcrumb-item active">Question Allocation</li>
    </ol>
<?= $this->endSection(); ?>

<?= $this->section('header'); ?>
   Question Allocation
<?= $this->endSection(); ?>

<?= $this->section("content") ?>

<!-- Main content -->
<section class="content">
    <form action="">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <select name="subject" id="subject" class="form-control">
                      <?php if($subjects): ?>
                        <option value="0">Select subject</option>
                        <?php foreach($subjects as $s): ?>
                            <option value="<?= $s['id']; ?>"><?= $s['subject']; ?></option>
                        <?php endforeach; ?>  
                      <?php endif; ?>  
                    </select>
                </div>
            </div>    
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sme">Professor / SME</label>
                    <select name="sme" id="sme" class="form-control">
                      <?php if($users): ?>
                        <option value="0">Select SME</option>
                        <?php foreach($users as $u): ?>
                          <option value="<?= $u->id; ?>"><?= $u->username; ?></option>
                        <?php endforeach; ?>  
                      <?php endif; ?>  
                    </select>
                </div>
            </div>
        </div>
    <div class="table-responsive">
        <table class="table table-bordered table-responsive">
            <thead class="bg-dark">
                <tr>
                    <td>Q.&nbsp;No</td>
                    <td>Question Body</td>
                    <td>Subject</td>
                    <td>Allocate</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($questions as $q): ?>
                <tr>
                    <td><?= $q->question_id; ?></td>
                    <td><?= $q->question_text; ?></td>
                    <td><?= $q->exam_subject; ?></td>
                    <td>
                        <input type="checkbox" name="check" id="check">
                    </td>
                </tr>   
                <?php endforeach; ?> 
            </tbody>
        </table>
    </div>
    <input type="submit" value="Submit" class="btn btn-success">
    </form>
</section>
<?= $this->endSection(); ?>