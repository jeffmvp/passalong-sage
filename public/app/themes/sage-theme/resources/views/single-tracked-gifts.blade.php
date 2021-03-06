@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())
<?php 
$meta = get_field('story_meta');
$title = get_the_title();
$addons = get_field('story_addons');
$giftStartedBy = get_field('your_name');
$giftStartedByEmail = get_field('your_email');
$giftStartedByDate = get_field('story_meta');
$giftStartedWish = get_field('my_wish');
$giftImage = get_field('product_image');

$code = get_field('secret_code');

?>
<?php 

if ($code == $_GET['code'] || get_current_user_id() == get_the_author_id() ) {
  ?>
  <section class="TrackedGift">
      <div class="row">
        <div class="column column-50 TrackedGift-story">
          <div class="TrackedGift-container">
            <h1><span>Important: Enter the following on the bottom of your gift:</span></br>Gift Tracking ID#:{{get_the_ID()}}</br><span>Secret Code: {{$code}}</span></h1>
            <h4>Started by: {{$giftStartedBy}}</h4>
            <h4>Date Gift was Purchased: {{$giftStartedByDate}}</h4>
            <h4>My wish for the journey this gift will make:</h4>
            {!!$giftStartedWish!!}<br/><br/><br/>
            <img src="{{$giftImage}}">
  
            <?php
  
  
            $settings = array(
  
            /* (string) Unique identifier for the form. Defaults to 'acf-form' */
            'id' => 'acf-form',
            
            /* (int|string) The post ID to load data from and save data to. Defaults to the current post ID. 
            Can also be set to 'new_post' to create a new post on submit */
            'post_id' => false,
            
            /* (array) An array of post data used to create a post. See wp_insert_post for available parameters.
            The above 'post_id' setting must contain a value of 'new_post' */
            'new_post' => false,
            
            /* (array) An array of field group IDs/keys to override the fields displayed in this form */
            'field_groups' => false,
            
            /* (array) An array of field IDs/keys to override the fields displayed in this form */
            'fields' => false,
            
            /* (boolean) Whether or not to show the post title text field. Defaults to false */
            'post_title' => false,
            
            /* (boolean) Whether or not to show the post content editor field. Defaults to false */
            'post_content' => false,
            
            /* (boolean) Whether or not to create a form element. Useful when a adding to an existing form. Defaults to true */
            'form' => true,
            
            /* (array) An array or HTML attributes for the form element */
            'form_attributes' => array(),
            
            /* (string) The URL to be redirected to after the form is submit. Defaults to the current URL with a GET parameter '?updated=true'.
            A special placeholder '%post_url%' will be converted to post's permalink (handy if creating a new post)
            A special placeholder '%post_id%' will be converted to post's ID (handy if creating a new post) */
            'return' => '%post_url%',
            
            /* (string) Extra HTML to add before the fields */
            'html_before_fields' => '',
            
            /* (string) Extra HTML to add after the fields */
            'html_after_fields' => '',
            
            /* (string) The text displayed on the submit button */
            'submit_value' => __("Update", 'acf'),
            
            /* (string) A message displayed above the form after being redirected. Can also be set to false for no message */
            'updated_message' => __("Post updated", 'acf'),
            
            /* (string) Determines where field labels are places in relation to fields. Defaults to 'top'. 
            Choices of 'top' (Above fields) or 'left' (Beside fields) */
            'label_placement' => 'top',
            
            /* (string) Determines where field instructions are places in relation to fields. Defaults to 'label'. 
            Choices of 'label' (Below labels) or 'field' (Below fields) */
            'instruction_placement' => 'label',
            
            /* (string) Determines element used to wrap a field. Defaults to 'div' 
            Choices of 'div', 'tr', 'td', 'ul', 'ol', 'dl' */
            'field_el' => 'div',
            
            /* (string) Whether to use the WP uploader or a basic input for image and file fields. Defaults to 'wp' 
            Choices of 'wp' or 'basic'. Added in v5.2.4 */
            'uploader' => 'wp',
            
            /* (boolean) Whether to include a hidden input field to capture non human form submission. Defaults to true. Added in v5.3.4 */
            'honeypot' => true,
            
            /* (string) HTML used to render the updated message. Added in v5.5.10 */
            'html_updated_message'	=> '<div id="message" class="updated"><p>%s</p></div>',
            
            /* (string) HTML used to render the submit button. Added in v5.5.10 */
            'html_submit_button'	=> '<input type="submit" class="acf-button button button-primary button-large" value="%s" />',
            
            /* (string) HTML used to render the submit button loading spinner. Added in v5.5.10 */
            'html_submit_spinner'	=> '<span class="acf-spinner"></span>',
            
            /* (boolean) Whether or not to sanitize all $_POST data with the wp_kses_post() function. Defaults to true. Added in v5.6.5 */
            'kses'	=> true
                
          );
          acf_form_head(); 
          if (get_current_user_id() == get_the_author_id()) {
            //acf_form($settings);
          }
          
  
            ?>
          </div>
        </div>
        <div class="column column-50 TrackedGift-addon">
          <div class="TrackedGift-container">
            <h4>Story History</h4>
            <div class="TrackedGift-extra">
              <?php
              $giftTo = get_field('i_passed_along_this_gift_to');
              $giftDate = get_field('on_this_date');
              $giftMessage = get_field('my_message_is');
              ?>
                <div class="TrackedGift-name">
                
                  Passed Along to: <?php echo $giftTo; ?>
                </div>
                <div class="TrackedGift-date">
                  On: <?php echo $giftDate; ?>
                </div>
                <?php if ($giftMessage != '') : ?>
                <div class="TrackedGift-message">
                  
                  <strong>My Message is:</strong><br/>
                  <?php echo $giftMessage; ?>
                  
          
                </div>
                <?php endif; ?>
              </div>
            <?php
                  $defaults = array(
                      'callback'          => 'my_comment_template',
                      
                      'page'              => get_the_ID()
                  );
                  wp_list_comments ( $defaults );
                  
                  ?>
  
                  
  
  
            <div class="TrackedGift-form">
                <?php
                $comments_args = array(
                  // Change the title of send button 
                  'label_submit' => __( 'Send', 'textdomain' ),
                  // Change the title of the reply section
                  'title_reply' => __( 'Follow Along', 'textdomain' ),
                  // Remove "Text or HTML to be displayed after the set of comment fields".
                   'comment_notes_after' => '',
                   'comment_field' => '<p style="display:none" class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' . rand(10,2000000) . '</textarea></p>'
  
  
          );
          comment_form( $comments_args );
  
         
          ?>
                
          </div>
        </div>
      </div>
    </section>
  <?php
}
else {

  ?>
  <section class="Content">
    <div class="Container Container--small">
      <div class="row">
        <div class="column-100">
          <h2>There was a problem...</h2>
          The secret code that was entered does not match this Product ID.
          <br/><br/>
          <a href="/track">Click here to go Back to the Main Tracking Page</a>

        </div>
      </div>
    </div>
  </section>
  <?php
}
?>

    
@endwhile

@endsection
