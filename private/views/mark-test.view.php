<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>


    <div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
    <?php $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>
        
        <?php
        if($row && $answered_test_row && $answered_test_row->submitted && ($row->disabled == 0) && Auth::access('lecturer')):?>

        <div class="row">

            <center><h5><?=esc(ucwords($row->test))?></h5></center>
            <center class="row">
                <h6 class="col">Class :  <?=esc(ucwords($row->class->class))?></h6>
                <h6 class="col">Student : <?=esc(ucwords($student->firstname))?> <?=esc(ucwords($student->lastname))?></h6>
            </center>

                <table class="table table-hover table-striped table-bordered">
                <tr>
                    <th>Created by: <td><?=esc($row->user->firstname)?> <?=esc($row->user->lastname)?></td></th>
                    <th>Date Created:
                    <td><?=get_date($row->date)?></td>
                    <td>
                    <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=students">
                            <button type="button" class="btn btn-sm btn-primary float-end">
                                <i class="fa fa-chevron-left"></i> Test class
                            </button>
                        </a>
                    </td>
                    </th>
                </tr>

                <?php 
                $disabled = $row->disabled ? "No" : "Yes";
                ?>
                <tr>
                    <th>Description : <td><?=esc(ucfirst($row->description))?></td></th>
                    <th>Active : <td><?=$disabled?></td><td>  <b>class</b> :  <?=esc(ucfirst($row->class->class))?></td></th>
                    <!-- <th></th> -->
                </tr>

                </table>
            
        </div>

        <?php
        
        switch ($page_tab) {
            case 'view':
                # code...
                include(views_path('mark-test-tab-view'));
                break;

            default:
                # code...
                break;
        }
        
        ?>

    <?php else: ?>
        <tr><td colspan="6"><center>This test have not been submitted !</center></td></tr>
    <?php endif; ?>
    </div>

    <?php $this->view('includes/footer'); ?>