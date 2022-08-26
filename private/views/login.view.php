<?php $this->view('includes/header'); ?>

    <div class="container-fluid">
        <form action="" method="post">
        <div class="p-4 mx-auto shadow rounded" style="width:100%;margin-top:50px;max-width:340px;">
        <h2 class="text-center">My school</h2>
        <img src="<?=ROOT?>/asset/logo2.png" alt="Image" class="d-block mx-auto" style="width:100px">
        <h3>Login</h3>

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

        <input class="form-control" value="<?=get_var('email')?>" type="email"  name="email" placeholder="E-mail" id="">
        <br>
        <input class="form-control" value="<?=get_var('password')?>" type="password"  name="password" placeholder="Password" id="">
        <br>
        <button class="btn btn-primary">Login</button>
        </div>
        </form>
    </div>

<?php $this->view('includes/footer'); ?>
