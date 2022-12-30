<div class="card-group justify-content-center">
    <table class="table table-striped table-hover">
        <tr>
            <th>Test Name</th>
            <th>Student</th>
            <th>Submitted Date</th>
            <th>Marked by</th>
            <th>Marked Date</th>
            <th>Answered</th>
            <th>Score</th>
            <th></th>
        </tr>

    <?php if(isset($test_rows) && $test_rows):?>
        <!-- echo the user -->
    <?php foreach($test_rows as $test_row):?>
        <tr>
        <?php
            $test_row->marked_by = (new user())->first('user_id',$test_row->marked_by);
        ?>  

            <td><?=$test_row->details->test?></td>
            <td><?=$test_row->user->firstname?> <?=$test_row->user->lastname?></td>
            <td><?=get_date($test_row->submitted_date)?></td>
            <td><?=$test_row->marked_by->firstname?> <?=$test_row->marked_by->lastname?></td>
            <td><?=get_date($test_row->marked_date)?></td>
            <td>
                
                <?php $percentage = get_answer_percentage($test_row->test_id,$test_row->user_id); ?>
                <?=$percentage?>%
            </td>
            <td>
                <?=$test_row->score?>%
            </td>
            <td>
            <?php if(Auth::access('lecturer')): ?>
            <a href="<?=ROOT?>/marked_single_test/<?=$test_row->details->test_id?>/<?=$test_row->user->user_id?>"> 
            <button class="btn btn-sm btn-primary">View <i class="fa fa-chevron-right"></i>
            </button>
            </a>
            <?php endif; ?>
        </td>
        </tr>

    <?php endforeach;?>
    <?php else:?>
        <tr><td colspan="6"><center>No test found at this time</center></td></tr>
        <?php endif;?>
        </table>
    </div>