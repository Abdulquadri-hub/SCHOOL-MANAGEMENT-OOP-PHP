<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>


    <div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
    <?php $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>

        <?php if($row):?>

        <div class="row">

            <center><h5><?=esc(ucwords($row->class))?></h5></center>
                <table class="table table-hover table-striped table-bordered">
                <tr><th>Created by:</th> <th>Date Created:</th></tr>
                <tr>
                    <td><?=esc($row->user->firstname)?> <?=esc($row->user->lastname)?></td>
                    <td><?=get_date($row->date)?></td>
                </tr>

                </table>
            
        </div>
        
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
        


        <?php
        
        switch ($page_tab) {
            case 'lecturers':
                # code...
                include(views_path('class-tab-lecturers'));
                break;

            case 'students':
                # code...
                include(views_path('class-tab-students'));
                break;

            case 'tests':
                include(views_path('class-tab-tests'));
                break;

            case 'lecturer-add':
                include(views_path('class-tab-lecturers-add'));
                break;

            case 'lecturer-remove':
                include(views_path('class-tab-lecturers-remove'));
                break;

            case 'student-add':
                include(views_path('class-tab-students-add'));
                break;

            case 'student-remove':
                include(views_path('class-tab-students-remove'));
                break;

            case 'test-add':
                include(views_path('class-tab-tests-add'));
                break;

            default:
                # code...
                break;
        }
        
        ?>

    </div>
    <?php else: ?>
        <center><h6>That class was not found!</h6></center>
    <?php endif; ?>
    </div>

    <?php $this->view('includes/footer'); ?>