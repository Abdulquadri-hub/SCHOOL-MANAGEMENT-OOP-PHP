<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
<?php $this->view('includes/crumbs',['crumbs'=>$crumbs]);?>
<!-- search -->
<nav class="navbar navbar-light bg-light">
    <form class="form-inline" method="GET">
        <div class="input-group">
            <button class="input-group-text" id="basic-addon1">
                <i class="fa fa-search">&nbsp</i>
            </button>
            <input type="text" value="" name="find" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" >
            
        </div>
    </form>

    <a href="<?=ROOT?>/signup">
            <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Add New</button>
    </a>
</nav>

    <div class="card-group justify-content-center">

    <?php if($rows):?>
    <?php foreach($rows as $row):?> 

        <?php include(views_path('user')) ?>

    <?php endforeach;?>
    <?php else:?>
        <h6>No staff members were found at this time!</h6>
    <?php endif;?>
    
    </div>

    <?php $pager->display() ?>

    </div>

    <?php $this->view('includes/footer'); ?>