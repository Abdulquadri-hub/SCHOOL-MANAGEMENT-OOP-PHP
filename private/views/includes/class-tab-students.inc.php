<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
    <div class="input-group">
    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search">&nbsp</i></span>
    <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" >
    </div>
    </form>
    <div>
    <?php if(Auth::access('lecturer')): ?>
        <a href="<?=ROOT?>/single_class/student_add/<?=$row->class_id?>/?select=true">
            <button class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Add New Students</button>
        </a>

        <a href="<?=ROOT?>/single_class/student_remove/<?=$row->class_id?>/?select=true">
            <button class="btn btn-sm btn-primary"><i class="fa fa-minus"></i>Remove Students</button>
        </a>
        <?php endif; ?>

    </div>
</nav>

<div class="card-group justify-content-center">
<?php if(is_array($students)): ?>
    <?php foreach($students as $student):?>
        <?php $row = $student->user ?>
        <?php include(views_path('user')) ?>
    <?php endforeach;?>
    <?php else :?>
    <center><h4>No student were found in this class</h4></center>
<?php endif; ?>
</div>

<?php $pager->display(); ?>