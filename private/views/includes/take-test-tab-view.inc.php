<?php $percentage = get_answer_percentage($row->test_id, Auth::getUser_id()) ?>
<div class="container-fluid text-center">
  <div class="text-danger"><?=$percentage?>% answered</div>
  <div class="bg-primary" style="width: <?=$percentage?>%; height:5px;"></div>

  <?php if($answered_test_row): ?>
    
  <?php if($answered_test_row->submitted): ?>
    <div class="text-success" s>This test has been submitted</div>
  <?php else: ?>
    <div class="text-danger">This test has not yet been submitted</div><br>
    <a onclick="submit_test(event)" href="<?=ROOT?>/take_test/<?=$row->test_id?>/?submit=true">
      <button class="btn btn-danger float-end">Submit Test</button>
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
    <?php if(!$submitted):?>
      <input type="radio" class="float-end" <?= $Myanswer ==  $letter ? ' checked ' : '' ?>  name="<?=$question_row->question_id?>" value="<?=$letter?>" style="transform: scale(1.5);">
    <?php else:?>
      <?= (trim($Myanswer) == trim($letter)) ? '<i class ="fa fa-check float-end"></i>' : false?>
    <?php endif;?>
    </li>
    <?php endforeach; ?>
    
  </ul>
  </div>
    <?php else: ?>

      <?php if(!$submitted):?>
        <p>
          <input type="text" value="<?=$Myanswer?>" class="form-control" name="<?=$question_row->question_id?>" placeholder="Type your answer here">
        </p>
      <?php else:?>
        <div>Answer: <?=$Myanswer?></div>
      <?php endif;?>


    <?php endif; ?>
  </div>
</div>
<?php endforeach; ?>

<?php if(!$submitted):?>
<center>
  <h6>Save your anwsers before going to the next question</h6><br>
  <button type="submit" class="btn btn-primary">Save your answers</button>
</center>
<?php endif; ?>

</form>
<?php else: ?>
    <center>No question found at this time</center>
<?php endif; ?>

<?php $pager->display() ?>

<script>
  function submit_test(e)
  {
    var percent = <?=$percentage?>;

    // use the confirm event
    if (!confirm("Are you sure you want to submit this test ?")) {
      // prevent refreshing before execution
      e.preventDefault();
      return;
    }

    if (percent < 100) {
      if (!confirm("You have only answered " +percent+ "% of the test. Are you sure you still want to submit this test ?")) {
      // prevent refreshing before execution
      e.preventDefault();
      return;
    }
    }

  }
</script>