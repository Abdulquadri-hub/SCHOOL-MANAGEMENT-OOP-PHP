<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
    <div class="input-group">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search">&nbsp</i></span>
    <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" >
    </div>
    </form>

</nav>

<table class="table table-striped table-hover">
        <tr><th></th><th>Test Name</th><th>Created by</th><th>Taken</th><th>Active</th><th>Date</th>
        <th>
        <?php if(Auth::access('lecturer')):?>
                <a href="<?=ROOT?>/single_class/test_add/<?=$row->class_id?>?tab=test-add">
        <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Add A Test</button>
    </a>
            <?php endif;?>
        </th></tr>

    <?php if(isset($tests) && $tests):?>
        <!-- echo the user -->
    <?php foreach($tests as $row):?>

        <tr>
            <td>
            <?php if(Auth::access('lecturer') ): ?>
            <a href="<?=ROOT?>/single_test/<?=$row->test_id?>"> 
                <button class="btn btn-sm btn-primary"><i class="fa fa-chevron-right"></i></button>
            </a>
            <?php endif; ?>
        </td>

            
        <?php $taken = taken_test($row->test_id) ? "Yes" : "No"?>
        <?php $active = $row->disabled ? "No" : "Yes" ?>
            <td><?=$row->test?></td>
            <td><?=$row->user->firstname?> <?=$row->user->lastname?></td>
            <td><?=$taken?></td>
            <td><?=$active?></td>
            <td><?=get_date($row->date)?></td>
        <td>



    <?php if(Auth::access('lecturer')):?>
        <a href="<?=ROOT?>/single_class/test_edit/<?=$row->class_id?>/<?=$row->test_id?>?tab=test-edit"> 
            <button class="btn btn-sm btn-info text-white"><i class="fa fa-edit"></i></button>
        </a>

        <a href="<?=ROOT?>/single_class/test_delete/<?=$row->class_id?>/<?=$row->test_id?>?tab=test-delete">
            <button class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
        </a>
    <?php endif;?>

        </td>
    </tr>

    <?php endforeach;?>
    <?php else:?>
        <tr><td colspan="6"><center>No tests found at this time</center></td></tr>
        <?php endif;?>
        </table>