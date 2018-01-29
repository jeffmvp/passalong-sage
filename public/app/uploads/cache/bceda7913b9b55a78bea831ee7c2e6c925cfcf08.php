<?php 
/**
 * The template for displaying the footer.
 *
 * @package  WordPress
 * @subpackage  MVP
 */


$logoInverted = get_field('logo_inverted', 'options');

 ?>
</div>
<?php $mobile = array(
  'menu' => 'Mobile'
); ?>
<nav class="MobileMenu"><?php (wp_nav_menu($mobile)); ?></nav>
<section class="Footer">
    <div class="Container Container--footer">
        <div class="row">
            <div class="column column-25">
                <img class="Footer-logo" src="<?php echo $logoInverted ?>">
            </div>
            <div class="column column-25">
                <ul>
                    <li><a href="/my-account">Account</a></li>
                    <li><a href="/cart">Cart</a></li>
                    <li><a href="/checkout">Checkout</a></li>
                    <li><a href="/terms-of-use">Terms of Use</a></li>
                </ul>
            </div>
            <div class="column column-25">
                
            </div>
            <div class="column column-25">
                
            </div>
        </div>
    </div>
    <div class="Container Container--sub">
        <div class="row">
            <div class="column column-25">
                <span>Copyright &copy; <?php echo date("Y"); ?> PassAlongGifts<br/>
                <span>Copyright &copy; <?php echo date("Y"); ?> PassAlongBouquets<br/>All rights reserved</span>
            </div>
            <div class="column column-empty column-25">
                
            </div>
            <div class="column column-empty column-25">
                
            </div>
            <div class="column column-25">
                <span>Website by JL</a></span>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>

</body>
</html>

