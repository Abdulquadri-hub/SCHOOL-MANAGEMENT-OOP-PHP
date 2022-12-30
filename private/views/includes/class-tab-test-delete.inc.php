<?php if(isset($test_row) && $test_row): ?>
<form action="" method="POST" class="form mx-auto" style="width: 100%; max-width:400px">
    <br><h4>Delete Test</h4>

        <!-- get errors -->
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-warning alert-dismissible fade show p-2" role="alert">
        <strong>Errors</strong>
        <?php foreach($errors as $error):?>
        <br> <?=$error?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>

    <input readonly value="<?= get_var('test',$test_row->test)?>" class="form-control" type="text" name="test" placeholder="Test title">
    <br>
    <textarea readonly class="form-control" name="description" placeholder="Test description here"><?= get_var('description',$test_row->description)?></textarea>
    <br>

    <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
        <button class="btn btn-danger" type="button">Cancel</button>
    </a>
    <button class="btn btn-primary float-end" name="">Save</button>
    <div class="clearfix"></div><br>
</form>
<?php else: ?>
    <center>Sorry no test found at this time.</center>
<?php endif; ?>