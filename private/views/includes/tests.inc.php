<div class="card-group justify-content-center">

    <table class="table table-striped table-hover">
        <tr>
            <th></th>
            <th>Test Name</th>
            <th>Created by</th>
            <th>Active</th>
            <th>Date</th>
            <th>Action</th>
            <th>Answered</th>
        </tr>

    <?php if(isset($test_rows) && $test_rows):?>
        <!-- echo the user -->
    <?php foreach($test_rows as $test_row):?>
        <tr style=" <?= (in_array($test_row->test_id, $unsubmitted)) ? 'background-color: #e87575;' : ''?>">
        <td>
            <?php if(Auth::access('lecturer') ): ?>
            <a href="<?=ROOT?>/single_test/<?=$test_row->test_id?>"> 
                <button class="btn btn-sm btn-primary"><i class="fa fa-chevron-right"></i></button>
            </a>
            <?php endif; ?>
        </td>

        <?php
            $disabled = $test_row->disabled ? "No" : "Yes";
        ?>
            <td><?=$test_row->test?></td>
            <td><?=$test_row->user->firstname?> <?=$test_row->user->lastname?></td>
            <td><?=$disabled?></td>
            <td><?=get_date($test_row->date)?></td>
            <td>
            <?php if(can_take_test($test_row->test_id)): ?>
            <a href="<?=ROOT?>/take_test/<?=$test_row->test_id?>"> 
                <button type="button" class="btn btn-sm btn-primary">Take Test</button>
            </a>
            <?php endif;?>
            </td>
            <td>
                <?php $my_id =  strtolower($this::class) == 'profile' ? $row->user_id : Auth::getUser_id()?>
                <?php $percentage = get_answer_percentage($test_row->test_id, $my_id); ?>
                <?=$percentage?>%
            </td>
        </tr>

    <?php endforeach;?>
    <?php else:?>
        <tr><td colspan="6"><center>No test found at this time</center></td></tr>
        <?php endif;?>
        </table>
    </div>