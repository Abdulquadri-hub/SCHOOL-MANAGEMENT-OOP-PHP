<?php $this->view('includes/header'); ?>
<?php $this->view('includes/nav'); ?>


    <div class="container-fluid p-4 shadow mx-auto" style="max-width:1000px;">
    <center><h4>Edit Profile</h4></center>

        <?php if($row):?>


            <?php 
                    $image = get_image($row->image,$row->gender);
                ?>

        <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-4 col-md-3">
    <img src="<?=$image?>" alt="Image" class="d-block mx-auto rounded-circle" style="width:160px">

                <div class="text-center mt-4">
                <?php if(Auth::access('admin') || (Auth::access('reception') && $row->rank == "student")):?>
                    <label for="browse_image" class="btn-sm btn-info">
                    <input onchange="display_image_name(this.files[0].name)" type="file" id="browse_image" name="image" style="display: none;">
                    Browse image
                    </label>
                    <small class="text-muted" id="file_info"></small>
                <?php endif; ?>
                </div>

            </div>
            <div class="col-sm-3 col-md-9 bg-light p-2">
            
        <div class="p-4 mx-auto shadow rounded">
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


        <input class="my-2 form-control" value="<?=get_var('firstname', $row->firstname)?>" type="text" name="firstname" placeholder="First-Name" id="">
        <input class="my-2 form-control" value="<?=get_var('lastname',$row->lastname)?>" type="text" name="lastname" placeholder="Last-Name" id="">
        <input class="my-2 form-control" value="<?=get_var('email',$row->email)?>" type="email" name="email" placeholder="E-mail" id="">

        <select class="my-2 form-control"  name="gender" id="">
            <option <?=get_select('gender', '')?> value="<?=$row->gender?>"><?=$row->gender?></option>
            <option <?=get_select('gender','male')?> value="male">Male</option>
            <option <?=get_select('gender','female')?> value="female">Female</option>
        </select>

        <select class="my-2 form-control"  name="rank" id="">
            <option <?=get_select('rank', '')?> value="<?=$row->rank?>"><?=$row->rank?></option>
            <option <?=get_select('rank','student')?> value="student">Student</option>
            <option <?=get_select('rank', 'reception')?> value="reception">Reception</option>
            <option <?=get_select('rank','lecturer')?> value="lecturer">Lecturer</option>
            <option <?=get_select('rank','admin')?> value="admin">Admin</option>

            <?php if($school_id = Auth::getRank() == 'super_admin'):?>
            <option <?=get_select('rank','super_admin')?> value="super_admin">Super Admin</option>
            <?php endif; ?>
        </select>

        <input class="my-2 form-control" value="<?=get_var('password')?>"  type="text" name="password" placeholder="Password" id="">
        <input class="my-2 form-control" value="<?=get_var('password2')?>" type="text" name="password2" placeholder="Retype Password" id="">
        <br>
        <a  href="<?=ROOT?>/profile/<?=$row->user_id?>">
            <button type="button" class="btn btn-danger">Go back to profile</button>
        </a>

        <button class="btn btn-primary float-end" type="submit">Save changes</button>


        </div>

            </div>
        </div>
            </form>
        <br>
    <?php else: ?>
        <center><h6>That profile was not found!</h6></center>
    <?php endif; ?>
    </div>

    <script>
        function display_image_name(file_name)
        {
            document.querySelector("#file_info").innerHTML = "<b><br>Selected image: <b><br>" + file_name;
        }
    </script>
    <?php $this->view('includes/footer'); ?>