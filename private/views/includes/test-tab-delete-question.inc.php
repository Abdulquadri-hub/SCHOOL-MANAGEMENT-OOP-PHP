
<?php if(is_object($question_row)): ?>
<center><h4>Delete Question</h4></center> 

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

    <textarea readonly class="form-control  mb-3" name="question" placeholder="Type your question here"><?=get_var('question',$question_row->question)?></textarea>

    <div class="input-group mb-3 pt-2">
        <label class="input-group-text" for="comment"></i>Comment(optional)</label>
        <input type="text" readonly name="comment" value="<?=get_var('comment',$question_row->comment)?>" placeholder="Comment" class="form-control" id="comment">
    </div>

    <div>
    <?php if(file_exists($question_row->image)): ?>
        <img src="<?=ROOT. '/'. $question_row->image?>" class="d-block mx-auto w-50" alt="">
    <?php endif; ?>
    </div>

    <a href="<?=ROOT?>/single_test/<?=$row->test_id?>">
        <button type="button" class="btn btn-primary"><i class="fa fa-chevron-left">
        </i>Back</button>
    </a>
    <button type="submit" class="btn btn-success float-end">Delete Question</button>
</form>
<?php else:?>
    <center>This question does not exists</center> 
<?php endif; ?>