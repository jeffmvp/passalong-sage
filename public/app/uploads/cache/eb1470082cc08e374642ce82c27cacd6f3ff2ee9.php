<?php
  $logo = get_field('logo', 'options');
  $logoInverted = get_field('logo_inverted', 'options');
  
  $params = array(
      'menu' => 'Main'
  )
?>

<nav class="Header">
  <div class="Container">
    <div class="grid">
      <div class="grid__col grid__col--1-of-4 u-aL">
        <a href="/">
          <img class="Header-logo" src="<?php echo e($logo); ?>">
        </a>
      </div>
      <div class="grid__col grid__col--3-of-4 u-aR">
        <?php (wp_nav_menu($params)); ?>
      </div>
    </div>
  </div>
</nav>
