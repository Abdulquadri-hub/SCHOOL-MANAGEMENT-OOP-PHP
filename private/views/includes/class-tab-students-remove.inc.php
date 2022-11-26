<form action="" method="POST" class="form mx-auto" style="width: 100%; max-width:400px">
    <br><h4>Remove Student</h4>

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

    <input value="<?= get_var('name')?>" class="form-control" type="text" name="name" placeholder="Student Name">
    <br>
    <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=students">
        <button class="btn btn-danger" type="button">Cancel</button>
    </a>

    <button class="btn btn-primary float-end" name="search">Search</button>
    <div class="clearfix"></div><br>
</form>

<div class="container-fluid">
<?php if(isset($results) && $results):?>
    <form method="post">
        <?php foreach($results as $row):?> 

            <div class="card-group justify-content-center">
                <?php include(views_path('user')) ?>
            </div>

        <?php endforeach;?>
    </form>
<?php else:?>
    <?php if(count($_POST) > 0):?>
        
        <center><hr><h6>No students Were Found!</h6></center>
    <?php endif ?>
<?php endif;?>
    
</div>