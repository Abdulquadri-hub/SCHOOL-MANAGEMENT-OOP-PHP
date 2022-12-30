<?php $percentage = get_answer_percentage($row->test_id,$answered_test_row->user_id) ?>
<?php $mark_percentage = get_mark_percentage($row->test_id,$answered_test_row->user_id) ?>
<?php $score_percentage = get_score_percentage($row->test_id,$answered_test_row->user_id) ?>

<div class="container-fluid text-center">
  <div class="text-danger"><?=$percentage?>% answered</div>
  <div class="bg-primary" style="width: <?=$percentage?>%; height:5px;"></div>

  <!-- mark percentage-->
  <div class="text-danger"><?=$mark_percentage ?>% marked</div>
  <div class="bg-primary" style="width: <?=$mark_percentage?>%; height:5px;"></div>

<?php if($answered_test_row): ?>
    
<?php if($answered_test_row->submitted == 1 && !$marked): ?>
    <div class="text-success">This test has been submitted</div>
    <div><small style="font-size: 23px;">Score : <?=$score_percentage?>%</small> <br> </div>
    
    <a onclick="unsubmit_test(event)" href="<?=ROOT?>/mark_test/<?=$row->test_id?>/<?=$answered_test_row->user_id?>/?un_submit=true">
        <button class="btn btn-success btn-sm float-end mx-1">Unsubmit Test</button>
    </a>

    <a onclick="set_as_marked(event)" href="<?=ROOT?>/mark_test/<?=$row->test_id?>/<?=$answered_test_row->user_id?>/?set_as_marked=true">
        <button class="btn btn-secondary btn-sm float-end mx-1">Set test as marked</button>
    </a>

    <a onclick="auto_mark(event)" href="<?=ROOT?>/mark_test/<?=$row->test_id?>/<?=$answered_test_row->user_id?>/?auto_mark=true">
        <button class="btn btn-warning btn-sm float-end mx-1">Auto Mark</button>
    </a>


<?php endif; ?>
<?php endif; ?>
</div>

<nav class="navbar">
<center>
    <h4>Test Questions</h4>
    <p><b>Total Questions: </b><?=$total_questions?></p>
</center>
</nav>

<hr>
<?php if(isset($questions) && $questions): ?>
  <form action="" method="post">
  <?php $num = $pager->offset?>
<?php foreach($questions as $key => $question_row):$num++ ?>

  
  <?php
        $myMark = get_marks($saved_answers,$question_row->question_id);
        $Myanswer = get_answers($saved_answers,$question_row->question_id);
      ?>

<div class="card mb-4">
  <div class="card-header">
    <span class="badge bg-info p-1">Question #<?=$num?></span> 
    <span class="badge bg-primary float-end"><?=get_date($question_row->date)?></span>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?=esc($question_row->question)?></h5>

    <?php if(file_exists($question_row->image)): ?>
    <img src="<?=ROOT?>/<?=$question_row->image?>" alt="" srcset="" style="width:50%;">
    <?php endif; ?>

    <p class="card-text my-2"><b>Comment |</b> <?=esc($question_row->comment)?></p>

    <?php $type = ''; ?>

    <?php if($question_row->question_type == 'objective'):
      $type = '?type=objective';
      
      ?>
    <?php endif; ?>

    <?php if($question_row->question_type == 'multiple'):
      $type = '?type=multiple';
      ?>
  <div class="card mb-2" style="width: 18rem;">
  <div class="card-header text-white bg-primary">
    Anwser Question
  </div>
  <ul class="list-group list-group-flush">
    
  
    <?php $choices = json_decode($question_row->choices)?>
    <?php foreach($choices as $letter => $answer):?>
      <li class="list-group-item"><?=$letter?> : <?=$answer?>

    <?php if($submitted):?>
      <?= (trim($Myanswer) == trim($letter)) ? '<i class ="fa fa-check float-end"></i>' : false?>
    <?php endif;?>
    
    </li>
    <?php endforeach; ?>
    
  </ul>
  </div>
  <?php if(!$marked):?>
      <div class="my-2">
        <input style="transform: scale(1.3);" <?=($myMark === 1) ? ' checked ' : ''?>   type="radio"  name="<?=$question_row->question_id?>"  id="correct<?=$num?>" value="1">
        <label  for="correct" id="correct"> Correct</label>
        <br>
        <input style="transform: scale(1.3);" <?=($myMark === 2) ? ' checked ' : ''?>   type="radio" name="<?=$question_row->question_id?>"  id="wrong<?=$num?>" value="2">
        <label  for="wrong" id="wrong"> Wrong</label>
      </div>
    <?php else: ?>
    <div style="font-size: 40px;">
        <?=
        trim($myMark) == 1 ? '<i class ="fa fa-check float-end"></i>' : '<i class ="fa fa-times float-end"></i>' 
        ?>
      </div>
    <?php endif; ?>

    <?php else: ?>

      <?php if($submitted):?>
        <div>Answer: <?=$Myanswer?></div>
      <?php endif;?>

      <?php if(!$marked):?>
      <div class="my-2">
        <input type="radio" style="transform: scale(1.3);" <?=($myMark === 1) ? ' checked ' : ''?>  name="<?=$question_row->question_id?>"  id="correct<?=$num?>" value="1">
        <label for="correct" id="correct"> Correct</label>
        <br>
        <input type="radio" style="transform: scale(1.3);" <?=($myMark === 2) ? ' checked ' : ''?> name="<?=$question_row->question_id?>"  id="wrong<?=$num?>" value="2">
        <label for="wrong" id="wrong"> Wrong</label>
      </div>
      <?php else: ?>
    <div style="font-size: 40px;">
        <?=
        trim($myMark) == 1 ? '<i class ="fa fa-check float-end"></i>' : '<i class ="fa fa-times float-end"></i>' 
        ?>
      </div>
    <?php endif; ?>

    <?php endif; ?>
    
  </div>
</div>
<?php endforeach; ?>

<?php if(!$marked):?>
<center>
  <small style="font-size: 16px;">Save your marks before going to the next question</small style="font-size: 16px;"><br>
  <button type="submit" class="btn btn-primary">Save Marks</button>
</center>
<?php endif; ?>

</form>
<?php else: ?>
    <center>No question found at this time</center>
<?php endif; ?>

<?php $pager->display() ?>

<script>
function unsubmit_test(e)
{
    // use the confirm event
    if (!confirm("This action we unsubmit this test.Are you sure you want to unsubmit this test ?")) {
      // prevent refreshing before execution
    e.preventDefault();
    return;
    }
}
function auto_mark(e)
{
    // use the confirm event
    if (!confirm("This action we takeover the existing marked test. Are you sure you want to run this action?")) {
      // prevent refreshing before execution
    e.preventDefault();
    return;
    }
}
function set_as_marked(e)
{
    // use the confirm event
    if (!confirm("This action will set this test as marked ?")) {
      // prevent refreshing before execution
    e.preventDefault();
    return;
    }
}
</script>