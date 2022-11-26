<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>


    <div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
    <?php $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>

        <?php if($row):?>


            <?php 
                    $image = get_image($row->image,$row->gender);
                ?>

        <div class="row">
            <div class="col-sm-4 col-md-3">
    <img src="<?=$image?>" alt="Image" class="d-block mx-auto rounded-circle" style="width:160px">
                <h5 class="text-center"><?=esc($row->firstname)?> <?=esc($row->lastname)?></h5>
                <div class="text-center">
                <?php if(Auth::access('lecturer') || Auth::i_own_content($row)):?>
                <a class="text-decoration-none" href="<?=ROOT?>/profile/edit/<?=$row->user_id?>">
                    <button class="btn-sm btn-success">Edit</button>
                </a>

                <a  href="<?=ROOT?>/profile/delete/<?=$row->user_id?>">
                    <button class="btn-sm btn-danger">Delete </button>
                </a>
                <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-3 col-md-9 bg-light p-2">
                <table class="table table-hover table-striped table-bordered">

                <tr><th>First Name:</th><td><?=esc($row->firstname)?></td></tr>
                <tr><th>Last Name:</th><td><?=esc($row->lastname)?></td></tr>
                <tr><th>E-mail:</th><td><?=esc($row->email)?></td></tr>
                <tr><th>Gender:</th><td><?=esc($row->gender)?></td></tr>
                <tr><th>Rank:</th><td><?=ucwords(str_replace("_"," ",$row->rank))?></td></tr>
                <tr><th>Date Created:</th><td><?=get_date($row->date)?></td></tr>

                </table>
            </div>
        </div>
        <br>
<div class="container-fluid">
    <ul class="nav nav-tabs">


    <li class="nav-item">
    <a class="nav-link <?=$page_tab =='info'?'active':'' ?> " aria-current="page" href="<?=ROOT?>/profile/<?=$row->user_id?>/?tab=info">Basic Info</a>
    </li>

    <!--  -->
    <?php if(Auth::access('lecturer') || Auth::i_own_content($row)):?>
    <li class="nav-item">
        <a class="nav-link <?=$page_tab=='classes'?'active':''?> " href="<?=ROOT?>/profile/<?=$row->user_id?>/?tab=classes">Classes</a>
    </li>
    
    <li class="nav-item">
    <a class="nav-link <?=$page_tab=='tests'?'active':''?> " href="<?=ROOT?>/profile/<?=$row->user_id?>/?tab=tests">Tests</a>
    </li>
    <?php endif; ?>
    </ul>
        

    <?php

    switch ($page_tab) {
        case 'info':
            include(views_path('profile-tab-info'));
            break;

        case 'classes':
            if(Auth::access('lecturer') || Auth::i_own_content($row)){
                include(views_path('profile-tab-classes'));
            }else {
                include(views_path('access-denied'));
            }
            break;

        case 'tests':
            include(views_path('profile-tab-tests'));
            break;
        
        default:
            # code...
            break;
    }

    ?>

    </div>
    <?php else: ?>
        <center><h6>That profile was not found!</h6></center>
    <?php endif; ?>
    </div>

    <?php $this->view('includes/footer'); ?>