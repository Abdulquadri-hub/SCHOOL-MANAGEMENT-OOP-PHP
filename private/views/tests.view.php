<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
    <?php $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>

    <h5>Tests</h5>
    <nav class="navbar navbar-light">
    <form class="form-inline" method="GET">
        <div class="input-group">
            <button class="input-group-text" id="basic-addon1">
                <i class="fa fa-search">&nbsp</i>
            </button>
            <input type="text" value="" name="find" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" >
            
        </div>
    </form>
    </nav>

    <?php include(views_path('tests')); ?>

    </div>

    <?php $this->view('includes/footer'); ?>