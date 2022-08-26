<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>


    <div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
    <?php $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>

        <?php if($row):?>

        <div class="row">

            <center><h5><?=esc(ucwords($row->class))?></h5></center>
                <table class="table table-hover table-striped table-bordered">
                <tr><th>Class Name:</th><td><?=esc($row->class)?></td></tr>
                <tr><th>Created by:</th><td><?=esc($row->user->firstname)?> <?=esc($row->user->lastname)?></td></tr>
                <tr><th>Date Created:</th><td><?=get_date($row->date)?></td></tr>

                </table>
            
        </div>
        <br>
        <div class="container-fluid">
        <ul class="nav nav-tabs">
        <li class="nav-item">
    <li class="nav-item">
    <a class="nav-link <?=$page_tab=='lecturers'?'active':'';?> "  href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=lecturers">Lecturers</a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?=$page_tab=='students'?'active':'';?> " href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=students">Students</a>
    </li>
    <a class="nav-link <?=$page_tab=='Tests'?'active':'';?> " href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">Tests</a>
    </li>
    </ul>
        
    <nav class="navbar navbar-light bg-light">
    <form class="form-inline">
    <div class="input-group">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search">&nbsp</i></span>
    <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" >
    </div>
    </form>
</nav>

    </div>
    <?php else: ?>
        <center><h6>That class was not found!</h6></center>
    <?php endif; ?>
    </div>

    <?php $this->view('includes/footer'); ?>