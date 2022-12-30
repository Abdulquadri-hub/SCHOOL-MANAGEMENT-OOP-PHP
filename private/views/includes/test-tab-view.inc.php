<?php if($row->disabled): ?>
  <nav class="navbar">
<center>
    <h4>Test Questions</h4>
    <p><b>Total Questions: </b><?=$total_questions?></p>
</center>

<div class="dropdown">
    <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa fa-bars"></i>Add
</button>
<ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item" href="<?=ROOT?>/single_test/addquestion/<?=$row->test_id?>">Add Subjective Question</a></li>
        <li><a class="dropdown-item" href="<?=ROOT?>/single_test/addquestion/<?=$row->test_id?>?type=multiple">
        Add Multiple choice Question</a></li>
        <li><a class="dropdown-item" href="<?=ROOT?>/single_test/addquestion/<?=$row->test_id?>?type=objective">Add Objective Question</a></li>
    </ul>
</div>
</nav>
<hr>
<?php endif; ?>

<?php if(isset($questions) && $questions): ?>
<?php foreach($questions as $key => $question_row): ?>
<div class="card mb-4 shadow">
  <div class="card-header">
    <span class="badge bg-info p-1">Question #<?=$key + 1?></span> 
    <span class="badge bg-primary float-end"><?=get_date($question_row->date)?></span>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?=esc($question_row->question)?></h5>

    <?php if(file_exists($question_row->image)): ?>
    <img src="<?=ROOT?>/<?=$question_row->image?>" alt="" srcset="" style="width:50%;">
    <?php endif; ?>

    <?php $type = ''; ?>

    <?php if($question_row->question_type == 'objective'):
      $type = '?type=objective';
      ?>
    <p class="card-text"><b>Answer |</b> <?=esc($question_row->correct_answer)?></p>
    <?php endif; ?>

    <?php if($question_row->question_type == 'multiple'):
      $type = '?type=multiple';
      ?>
  <div class="card mb-2">
  <div class="card-header text-white bg-primary">
    Multiple choice question
  </div>
  <ul class="list-group list-group-flush">
    
    <?php $choices = json_decode($question_row->choices)?>
    <?php foreach($choices as $letter => $answer):?>
    <li class="list-group-item"><?=$letter?> : <?=$answer?>
    <?= (trim($letter) == trim($question_row->correct_answer)) ? '<i class ="fa fa-check float-end"></i>' : false?>
    </li>
    <?php endforeach; ?>
  </ul>
  </div>
    <p class="card-text"><b>Answer: </b> <?=esc($question_row->correct_answer)?></p>
    <?php endif; ?>

    <p class="card-text my-2"><b>Comment: </b> <?=esc($question_row->comment)?></p>
    <p class="card-text float-end">

    <?php if($row->edited):?>
      <a href="<?=ROOT?>/single_test/editquestion/<?=$question_row->test_id?>/<?=$question_row->question_id?><?=$type?>">
        <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i>
      </button>
      </a>
      <a href="<?=ROOT?>/single_test/deletequestion/<?=$question_row->test_id?>/<?=$question_row->question_id?><?=$type?><?=$type?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
      <?php endif; ?>

    </p>
  </div>
</div>
<?php endforeach; ?>
<?php else: ?>
    <center>No question found at this time</center>
<?php endif; ?>