<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
    <?php $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>

    <div class="card-group justify-content-center">

        <form method="post">
            <h3>Edit School</h3>

            <!-- get errors -->
            <?php if($row):?>
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-warning alert-dismissible fade show p-2" role="alert">
        <strong>Errors</strong>
        <?php foreach($errors as $error):?>
        <br> <?=$error?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <input autofocus class="form-control" value="<?=get_var('school',$row[0]->school)?>" type="text" name="school" placeholder="School Name"><br><br>
        <input class="btn btn-primary float-end" type="submit" value="Save">

        <a href="<?=ROOT?>/schools">
        <input class="btn btn-danger text-white" type="button" value="Cancel">
        </a>
        </form>
        <?php else:?>
            <h4>That school was not found!</h4>
            <a href="<?=ROOT?>/schools">
        <input class="btn btn-danger text-white" type="button" value="Cancel">
        </a>
        <?php endif;?>
    </div>


    </div>

    <?php $this->view('includes/footer'); ?>