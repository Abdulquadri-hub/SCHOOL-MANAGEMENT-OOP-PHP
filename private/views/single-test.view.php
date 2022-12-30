<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>


    <div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
    <?php $this->view('includes/crumbs',['crumbs'=>$crumbs]); ?>
        
        <?php if($row):?>

        <div class="row">

            <center><h5><?=esc(ucwords($row->test))?></h5></center>
                <table class="table table-hover table-striped table-bordered">
                <tr>
                    <th>Created by: <td><?=esc($row->user->firstname)?> <?=esc($row->user->lastname)?></td></th>
                    <th>Date Created:
                    <td><?=get_date($row->date)?></td>
                    <td>
                        <a href="<?=ROOT?>/single_class/<?=$row->class_id?>?tab=tests">
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
                    <th><b>Description:</b> <?=esc(ucfirst($row->description))?></th>
                    <th><b>Active:</b> <?=$disabled?></th>
                    <th>
                        <?php
                        if ($row->disabled) {
                            $btntxt = 'publish';
                            $btncolor = 'danger';
                        }else {
                            $btntxt = 'Unpublish';
                            $btncolor = 'primary';
                        }
                            
                        ?>
                        <a href="<?=ROOT?>/single_test/<?=$row->test_id?>?disable=true">
                        <button class="btn btn-<?=$btncolor?> btn-sm"><?=$btntxt?></button>
                        </a>
                        <td>
                    <a href="<?=ROOT?>/single_test/<?=$row->test_id?>?tab=scores">
                                <button type="button" class="btn btn-sm btn-primary float-end">
                                    <i class="fa fa-chevron-right"></i> Students scores
                                </button>
                            </a>
                    </td>
                    </th>
                    
                </tr>

                </table>
            
        </div>

        <?php
        
        switch ($page_tab) {
            case 'view':
                # code...
                include(views_path('test-tab-view'));
                break;

            case 'add-question':
                # code...
                include(views_path('test-tab-add-question'));
                break;

            case 'edit-question':
                    include(views_path('test-tab-edit-question'));
                    break;

            case 'delete-question':
                    include(views_path('test-tab-delete-question'));
                    break;

            // case 'add-objective':
            //     # code...
            //     include(views_path('test-tab-add-objective'));
            //     break;
            // case 'add-multiple-choice':
            //     # code...
            //     include(views_path('test-tab-add-multiple-choice'));
            //     break;


            case 'edit-objective':
                include(views_path('test-tab-edit-objective'));
                break;

            case 'edit-multiple-choice':
                include(views_path('test-tab-multiple-choice'));
                break;

            case 'delete-subjective':
                include(views_path('test-tab-delete-subjective'));
                break;

            case 'delete-objective':
                include(views_path('test-tab-delete-objective'));
                break;

            case 'delete-multiple-choice':
                include(views_path('test-tab-delete-multiple-choice'));
                break;

            case 'scores':
                include(views_path('test-tab-scores'));
                break;

            default:
                # code...
                break;
        }
        
        ?>

    <?php else: ?>
        <tr><td colspan="6"><center>No test found at this time</center></td></tr>
    <?php endif; ?>
    </div>

    <?php $this->view('includes/footer'); ?>