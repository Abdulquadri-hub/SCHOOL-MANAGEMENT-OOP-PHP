<?php
$que_type = 'subjective';
if (isset($_GET['type']) && $_GET['type'] == 'objective') {
    $que_type = 'objective';
}elseif (isset($_GET['type']) && $_GET['type'] == 'multiple') {
    $que_type = 'multiple';
}
?>
<center><h4>Add <?=ucfirst($que_type)?> Question</h4></center> 

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
        
    <textarea autofocus class="form-control" name="question" placeholder="Type your question here"><?=get_var('question')?></textarea>

    <div class="input-group mb-3 pt-2">
        <label class="input-group-text" for="inputGroupFile01"><i class="fa fa-image"></i>Browser(optional)</label>
        <input type="file" name="image" class="form-control" id="inputGroupFile01">
    </div>
    
    <?php if(isset($_GET['type']) && $_GET['type'] == "objective"): ?>
    <div class="input-group mb-3 pt-1">
        <label class="input-group-text" for="correct_answer"></i>Answer</label>
        <input type="text" name="correct_answer" placeholder="Enter the correct answer" class="form-control" value="<?=get_var('correct_answer')?>" id="correct_answer">
    </div>
    <?php endif; ?>

    <div class="input-group mb-3 pt-1">
        <label class="input-group-text" for="comment"></i>Comment(optional)</label>
        <input type="text" name="comment" value="<?=get_var('comment')?>" placeholder="Comment" class="form-control" id="comment">
    </div>

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
            <li class="list-group-item ">
                <label for="">A:</label>
                <input class="form-control" type="text" name="choice0" placeholder="Type answer here">
                <label style="cursor: pointer;"><input type="radio" value="A" name="correct_answer" id="">  Correct answer: </label>
            </li>
            <li class="list-group-item">
                <label for="">B:</label>
                <input class="form-control" type="text" name="choice1" placeholder="Type answer here">
                <label style="cursor: pointer;"><input type="radio" value="B" name="correct_answer" id="">  Correct answer</label>
            </li>
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

<script>

    var letters = ['A','B','C','D','E'];

    function add_choices()
    {  
        choices = document.querySelector(".choice-list");
        if(choices.children.length < letters.length)
        {
            choices.innerHTML += `<li class="list-group-item">
                <label for="">${letters[choices.children.length]}</label>
                <input class="form-control" type="text" name="choice${choices.children.length}" placeholder="Type answer here">
                <label style="cursor: pointer;"><input type="radio" value = "${letters[choices.children.length]}" name="correct_answer" id=""> Correct answer </label>
            </li>`;
        }

    }
</script>