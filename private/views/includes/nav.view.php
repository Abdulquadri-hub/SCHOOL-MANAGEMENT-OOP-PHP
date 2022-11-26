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
        <a class="nav-link active" aria-current="page" href="<?=ROOT?>">DASHBOARD</a>
        </li>

        <?php if(Auth::access('super_admin')): ?>
        <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/Schools">SCHOOLS</a>
        </li>
        <?php endif; ?>

        <?php if(Auth::access('admin')): ?>
        <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/Users">STAFF</a>
        </li>
        <?php endif; ?>

        <?php if(Auth::access('reception')): ?>
        <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/Students">STUDENTS</a>
        </li>
        <?php endif; ?>

        <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/classes">CLASSES</a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/tests">TESTS</a>
        </li>
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
    </div>
</div>
</nav> 
