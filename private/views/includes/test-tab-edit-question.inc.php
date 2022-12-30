<?php
$que_type = 'subjective';
if (isset($_GET['type']) && $_GET['type'] == 'objective') {
    $que_type = 'objective';
}elseif (isset($_GET['type']) && $_GET['type'] == 'multiple') {
    $que_type = 'multiple';
}
?>

<?php if(is_object($question_row)): ?>
<center><h4>Edit <?=$que_type?> Question</h4></center> 

<form action="" method="post" enctype="multipart/form-data">

        <!-- get errors -->
        <?php if(count($errors) > 0): ?>
        <div class="alert alert-warning alert-dismissible fade show p-2" role="alert">
        <strong>Errors</strong>
        <?php foreach($errors as $error):?>
        <br> <?=$error?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <?php endforeach; ?>
        </div>
        <?php endif; ?>
        
    <textarea autofocus class="form-control  mb-3" name="question" placeholder="Type your question here"><?=get_var('question',$question_row->question)?></textarea>

    <div class="input-group mb-3 pt-2">
        <label class="input-group-text" for="comment"></i>Comment(optional)</label>
        <input type="text" name="comment" value="<?=get_var('comment',$question_row->comment)?>" placeholder="Comment" class="form-control" id="comment">
    </div>

    <div class="input-group mb-3 pt-2">
        <label class="input-group-text" for="inputGroupFile01"><i class="fa fa-image"></i>Browser(optional)</label>
        <input type="file" name="image" class="form-control" id="inputGroupFile01">
    </div>

    <div>
    <?php if(file_exists($question_row->image)): ?>
        <img src="<?=ROOT. '/'. $question_row->image?>" class="d-block mx-auto w-50" alt="">
    <?php endif; ?>
    </div>

    <?php if(isset($_GET['type']) && $_GET['type'] == "objective"): ?>
    <div class="input-group mb-3 pt-2">
        <label class="input-group-text" for="correct_answer"></i>Answer</label>
        <input type="text" name="correct_answer" placeholder="Enter the correct answer" class="form-control" value="<?=get_var('correct_answer',$question_row->correct_answer)?>" id="correct_answer">
    </div>
    <?php endif; ?>

    <?php if(isset($_GET['type']) && $_GET['type'] == "multiple"): ?>
    <div class="card mb-2">
        <div class="card-header bg-secondary text-white">
        Multiple choice question 
        <button type="button" onclick="add_choices()" class="btn btn-sm btn-warning float-end  "><i class="fa fa-plus"></i>Add Choice
        </button>
        </div>
        <ul class="list-group list-group-flush choice-list">
            <?php if(isset($_POST['choice0'])): ?>
                <?php
                $num = 0;
        $letters = ['A','B','C','D','E'];
        foreach ($_POST as $key => $value) 
        {
            if (strstr($key, 'choice')) 
            {
                ?>
                <li class="list-group-item ">
                <label for=""><?=$letters[$num]?>:</label>
                <input class="form-control" value="<?=$value?>" type="text" name="<?=$key?>" placeholder="Type answer here">
                <label style="cursor: pointer;">
                <input type="radio"  <?= ($letters[$num] == $_POST['correct_answer'] ? 'checked' : '') ?> value="<?=$letters[$num]?>" name="correct_answer" id="">  Correct answer:
                </li>
                </label>
                <?php
                $num++;
            }
        }
        ?>
            <?php else: ?>
        <?php $choices = json_decode($question_row->choices); $num = 0;?>
        <?php foreach($choices as $letter => $answer):?>
            <li class="list-group-item ">
                <label for=""><?=$letter?>:</label>
                <input class="form-control" type="text" value="<?=$answer?>" name="choice<?=$num?>" placeholder="Type answer here">
                <label style="cursor: pointer;">
                <input type="radio" name="correct_answer"  <?= ($letter == $question_row->correct_answer ? 'checked' : '') ?> value="<?=$letter?>" id="">  Correct answer: </label>
            </li>
            <?php $num++ ?>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <?php endif; ?>


    <a href="<?=ROOT?>/single_test/<?=$row->test_id?>">
        <button type="button" class="btn btn-primary"><i class="fa fa-chevron-left">
        </i>Back</button>
    </a>
    <button type="submit" class="btn btn-success float-end">Save Question</button>
</form>
<?php else:?>
    <center>This question does not exists</center> 
<?php endif; ?>