
                <?php 
                    $image = get_image($row->image,$row->gender);
                ?>

    <div class="card m-2 shadow" style="max-width: 12rem; min-width:12rem;">
    <div class="card-header">User Profile</div>
    <img src="<?=$image?>" alt="card-img-top" class="card-img-top" style=" ">
    <div class="card-body">
    <h5 class="card-title"><?=$row->firstname?> <?=$row->lastname?></h5>
    <p class="card-text"><?=str_replace("_", " ", $row->rank)?></p>
    <a href="<?=ROOT?>/profile/<?=$row->user_id?>" class="btn btn-primary">Profile</a>

    <?php if(isset($_GET['select'])):?>
    <button name="selected" value= "<?=$row->user_id?>" href="" class="btn btn-danger float-end">Select</button>
    <?php endif; ?>
    </div>
    </div>