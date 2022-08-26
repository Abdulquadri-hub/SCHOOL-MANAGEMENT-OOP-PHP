<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
<?php $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>

    <?php if($row):?>
    <div class="card-group justify-content-center">

        <form method="post">
            <h6>Are you sure you want to delete this class?!</h6>


        <input disabled class="form-control" value="<?=get_var('schclassool',$row[0]->class)?>" type="text" name="class" placeholder="class Name"><br><br>
        <input type="hidden" name="id">
        <input class="btn btn-danger float-end" type="submit" value="Delete">

        <a href="<?=ROOT?>/classes">
        <input class="btn btn-success text-white" type="button" value="Cancel">
        </a>
        </form>
        <?php else:?>
            <h4>That school was not found!</h4>
            <a href="<?=ROOT?>/classes">
        <input class="btn btn-danger text-white" type="button" value="Cancel">
        </a>
        <?php endif;?>
    </div>


    </div>

    <?php $this->view('includes/footer'); ?>