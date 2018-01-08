<?php
  $logo = get_field('logo', 'options');
  $logoInverted = get_field('logo_inverted', 'options');
  
  $params = array(
      'menu' => 'Main'
  );
  
?>

<nav class="Header">
  <div class="Container">
    <div class="row">
      <div class="column column-25 u-aL">
        <a href="/">
          <img class="Header-logo" src="<?php echo e($logo); ?>">
        </a>
      </div>
      <div class="column column-75 u-aR">
        <?php (wp_nav_menu($params)); ?>
        
        <div class="toggle-button u-mobile">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
        </div>

      </div>
    </div>
  </div>
</nav>


