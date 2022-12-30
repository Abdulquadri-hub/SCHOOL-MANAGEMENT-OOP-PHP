<div class="card-group justify-content-center">

    <table class="table table-striped table-hover">
        <tr>
            <th></th>
            <th>Test Name</th>
            <th>Student</th>
            <th>Submitted Date</th>
            <th>Answered</th>
            <th>Mark</th>
        </tr>

    <?php if(isset($test_rows) && $test_rows):?>
        <!-- echo the user -->
    <?php foreach($test_rows as $test_row):?>
        <tr>
        <td>
            <?php if(Auth::access('lecturer') ): ?>
            <a href="<?=ROOT?>/mark_test/<?=$test_row->test_id?>/<?=$test_row->user_id?>"> 
                <button class="btn btn-sm btn-primary">Mark <i class="fa fa-chevron-right"></i></button>
            </a>
            <?php endif; ?>
        </td>

            <td><?=$test_row->details->test?></td>
            <td><?=$test_row->user->firstname?> <?=$test_row->user->lastname?></td>
            <td><?=get_date($test_row->submitted_date)?></td>
            <td>
                
            <?php 
            $percentage = get_answer_percentage($test_row->test_id,$test_row->user_id); ?>
            <?=$percentage?>%
            </td>
            <td>
                
            <?php 
            $percentage = get_mark_percentage($test_row->test_id,$test_row->user_id); ?>
            <?=$percentage?>%
            </td>
        </tr>

    <?php endforeach;?>
    <?php else:?>
        <tr><td colspan="6"><center>No test found at this time</center></td></tr>
        <?php endif;?>
        </table>
    </div>