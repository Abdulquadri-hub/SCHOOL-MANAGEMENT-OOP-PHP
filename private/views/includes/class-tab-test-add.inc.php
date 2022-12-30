<form action="" method="POST" class="form mx-auto" style="width: 100%; max-width:400px">
    <br><h4>Add Test</h4>

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

    <input value="<?= get_var('test')?>" class="form-control" type="text" name="test" placeholder="Test title">
    <br>
    <textarea class="form-control" name="description" placeholder="Test description here"><?= get_var('description')?></textarea>
    <br>
    <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
        <button class="btn btn-danger" type="button">Cancel</button>
    </a>
    <button class="btn btn-primary float-end" name="create">create</button>
    <div class="clearfix"></div><br>
</form>