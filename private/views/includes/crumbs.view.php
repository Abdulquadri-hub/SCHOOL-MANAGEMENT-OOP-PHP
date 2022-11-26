<nav aria-label="breadcrumb">
  <ol class="breadcrumb justify-content-center">
    <?php if(isset($crumbs)):?>
    <?php foreach ($crumbs as $crumbs):?>
    <li class="breadcrumb-item">
      <a href="<?=$crumbs[1]?>">
      <?=$crumbs[0]?>
    </a>
    </li>
    <?php endforeach;?>
    <?php endif;?>
  </ol>
</nav>