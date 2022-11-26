<center>
    <h4>My Classes</h4>
</center>
<nav class="navbar navbar-light bg-light">
<form class="form-inline">
<div class="input-group">
<span class="input-group-text" id="basic-addon1"><i class="fa fa-search">&nbsp</i></span>
<input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" >
</div>
</form>
</nav>

<?php $rows = $stud_class?>
<?php include(views_path('classes')); ?>