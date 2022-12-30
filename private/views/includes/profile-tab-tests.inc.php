
<h4>Tests</h4>

<nav class="navbar navbar-light bg-light">
<form class="form-inline">
<div class="input-group">
<span class="input-group-text" id="basic-addon1"><i class="fa fa-search">&nbsp</i></span>
<input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" >
</div>
</form>
</nav>
<?php //echo "<pre>"; ?>
<?php if($row->rank == "student"): ?>
    <?php include(views_path('marked')); ?>
    <?php else: ?>
    <?php include(views_path('tests')); ?>
<?php endif; ?>


