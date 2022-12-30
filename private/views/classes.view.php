<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
    <?php $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>

    <h5>Classes</h5>
    <nav class="navbar navbar-light">
    <form class="form-inline" method="GET">
        <div class="input-group">
            <button class="input-group-text" id="basic-addon1">
                <i class="fa fa-search">&nbsp</i>
            </button>
            <input type="text" value="" name="find" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" >
        </div>
    </form>
    <form class="form-inline" method="GET">
        <div class="input-group">
        <?php $semesters = get_semesters(); show($semesters);?>
        <select name="semester" id="" class="form-select" style="width: 200px;">
        <option>
        <?=get_var('semester', isset($_SESSION['USER']->semester) ? $_SESSION['USER']->semester : date("M",time()),'get')?>
        </option>
            <!--  -->
        </select>

        <div class="input-group-prepend">
        <button class="input-group-text" id="basic-addon1">&nbsp;<i class="fa fa-chevron-right"></i></button>
        </div>
        </div>
    </form>
    </nav>

    <?php include(views_path('classes')); ?>

    </div>

    <?php $this->view('includes/footer'); ?>