<style>
    nav ul li a {
        width: 110px;
        text-align: center;
        border-left: solid thin #eee;
        border-left: solid thin #fff;
    }
        nav ul li a:hover {
        background-color: grey;
        color: white !important;
    }
    .active {
        background-color: orange !important;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
<div class="container-fluid">
    <a class="navbar-brand" href="<?=ROOT?>">
    <img src="<?=ROOT?>/asset/logo2.png" alt="Image" class="" style="width:50px">
    <?=Auth::getschool_name()?> 
    </a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav"> 
        <li class="nav-item">
        <a class="nav-link <?= $this->get_controllers() == "home" ? ' active ' : ''?>" aria-current="page" href="<?=ROOT?>">DASHBOARD</a>
        </li>

        <?php if(Auth::access('super_admin')): ?>
        <li class="nav-item">
        <a class="nav-link <?= $this->get_controllers() == "schools" ? ' active ' : ''?>" href="<?=ROOT?>/Schools">SCHOOLS</a>
        </li>
        <?php endif; ?>

        <?php if(Auth::access('admin')): ?>
        <li class="nav-item">
        <a class="nav-link <?= $this->get_controllers() == "users" ? ' active ' : ''?>" href="<?=ROOT?>/Users">STAFF</a>
        </li>
        <?php endif; ?>

        <?php if(Auth::access('reception')): ?>
        <li class="nav-item">
        <a class="nav-link <?= $this->get_controllers() == "students" ? ' active ' : ''?>" href="<?=ROOT?>/Students">STUDENTS</a>
        </li>
        <?php endif; ?>

        <li class="nav-item">
        <a class="nav-link <?= $this->get_controllers() == "classes" ? ' active ' : ''?>" href="<?=ROOT?>/classes">CLASSES</a>
        </li>
        
        <li class="nav-item" style="position: relative;">
            <?php
            $un_submitted_test = get_unsubmitted_test();
            ?>
        <a class="nav-link <?= $this->get_controllers() == "tests" ? ' active ' : ''?>" href="<?=ROOT?>/tests">TESTS</a>
            <?php if(!empty($un_submitted_test)):?>
            <sup class="badge bg-danger" style="position: absolute;top:0px;right:0px;"><?=$un_submitted_test?></sup>
            <?php endif; ?>
        </a>
        </li>


        <?php if(Auth::access('lecturer')): ?>

        <li class="nav-item" style="position: relative;">
            <?php
            $to_mark_count = (new Test())->get_to_mark_count();
            ?>
        <a class="nav-link  <?= $this->get_controllers() == "to_mark" ? ' active ' : ''?>" href="<?=ROOT?>/to_mark">
            TO_MARK 
            <?php if(!empty($to_mark_count)):?>
            <sup class="badge bg-danger" style="position: absolute;top:0px;right:0px;"><?=$to_mark_count?></sup>
            <?php endif; ?>
        </a>
        </li>

        <li class="nav-item">
        <a class="nav-link <?= $this->get_controllers() == "marked" ? ' active ' : ''?>" href="<?=ROOT?>/marked">MARKED</a>
        </li>

        <?php endif; ?>
        </ul>


        <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown dropdown-menu-end">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?=Auth::getlastname()?>    
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?=ROOT?>/profile">Profile</a></li>
            <li><a class="dropdown-item" href="<?=ROOT?>">Dashboard</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?=ROOT?>/logout">Logout</a></li>
        </ul>
        </li>
    </ul>
    
    <form class="form-inline" >
        <div class="input-group">

        <?php $years = get_years()?>
        <select name="school_year" id="" class="form-select" style="width: 200px;">
        <option>
        <?=get_var('school_year', isset($_SESSION['USER']->year) ? $_SESSION['USER']->year : date("Y",time()),'get')?>
        </option>
            <?php foreach($years  as $year): ?>
                <option ><?=$year?></option>
            <?php endforeach; ?>
        </select>

        
        
        <div class="input-group-prepend">
        <button class="input-group-text" id="basic-addon1">&nbsp;<i class="fa fa-chevron-right"></i></button>
        </div>
        </div>
    </form>
    </div>
</div>
</nav> 
