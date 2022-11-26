<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>

<style>
    h1{
        font-size: 80px;
        color: orange;
    }
    a{
        text-decoration: none;
    }
    .card-header{
        font-weight: bold;
    }
    .card-footer{
        font-weight: bold;
    }
    .card{
        min-width: 250px;
    }
</style>

<div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
        <div class="row justify-content-center">

        <!-- Schools -->
            <div class="card col-3 shadow rounded m-4 p-0 border">
            <a href="<?=ROOT?>/schools">
                <div class="card-header">SCHOOLS</div>
                <h1 class="text-center">
                    <i class="fa fa-graduation-cap"></i>
                </h1>
                <div class="card-footer">View all schools</div>
            </a>
            </div>

            <!-- Staff -->
            <div class="card col-3 shadow rounded m-4 p-0 border">
            <a href="<?=ROOT?>/users">
                <div class="card-header">STAFF</div>
                <h1 class="text-center">
                    <i class="fa fa-chalkboard-teacher"></i>
                </h1>
                <div class="card-footer">View all staff member</div>
            </a>
            </div>

            <!-- Students -->
            <div class="card col-3 shadow rounded m-4 p-0 border">
            <a href="<?=ROOT?>/students">
                <div class="card-header">STUDENTS</div>
                <h1 class="text-center">
                    <i class="fa fa-user-graduate"></i>
                </h1>
                <div class="card-footer">View all students</div>
            </a>
            </div>

            <!-- Classes -->
            <div class="card col-3 shadow rounded m-4 p-0 border">
            <a href="<?=ROOT?>/classes">
                <div class="card-header">CLASSES</div>
                <h1 class="text-center">
                    <i class="fa fa-university"></i>
                </h1>
                <div class="card-footer">View all classes</div>
            </a>
            </div>

            <!-- Tests -->
            <div class="card col-3 shadow rounded m-4 p-0 border">
            <a href="<?=ROOT?>/tests">
                <div class="card-header">Tests</div>
                <h1 class="text-center">
                    <i class="fa fa-file-signature"></i>
                </h1>
                <div class="card-footer">View all tests</div>
            </a>
            </div>

            <!-- Statitics -->
            <div class="card col-3 shadow rounded m-4 p-0 border">
            <a href="<?=ROOT?>/statistcs">
                <div class="card-header">STATISTICS</div>
                <h1 class="text-center">
                    <i class="fa fa-chart-pie"></i>
                </h1>
                <div class="card-footer">View Statitics</div>
            </a>
            </div>

            <!-- Settings -->
            <div class="card col-3 shadow rounded m-4 p-0 border">
            <a href="<?=ROOT?>/settings">
                <div class="card-header">SETTINGS</div>
                <h1 class="text-center">
                    <i class="fa fa-cogs"></i>
                </h1>
                <div class="card-footer">View settings</div>
            </a>
            </div>

            <!-- Logout -->
            <div class="card col-3 shadow rounded m-4 p-0 border">
            <a href="<?=ROOT?>/logout">
                <div class="card-header">LOGOUT</div>
                <h1 class="text-center">
                    <i class="fa fa-sign-out-alt"></i>
                </h1>
                <div class="card-footer">Logout</div>
            </a>
            </div>

            <!-- Tests -->
            <div class="card col-3 shadow rounded m-4 p-0 border">
            <a href="<?=ROOT?>/profile">
                <div class="card-header">PROFILE</div>
                <h1 class="text-center">
                    <i class="fa fa-id-card"></i>
                </h1>
                <div class="card-footer">View profile</div>
            </a>
            </div>

        </div>
</div>

    <?php $this->view('includes/footer'); ?>