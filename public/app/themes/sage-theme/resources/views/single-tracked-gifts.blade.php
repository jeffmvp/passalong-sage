@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())
<?php 
$meta = get_field('story_meta');
$addons = get_field('story_addons');
?>

<section class="TrackedGift">
    <div class="row">
      <div class="column column-50 TrackedGift-story">
        <div class="TrackedGift-container">
          <h2>@php(the_title())</h2>
          @if($meta)
          <h4>{{$meta}}</h4>
          @endif
          @php(the_content())
          @if(the_post_thumbnail_url())
          <img src="@php(the_post_thumbnail_url())">
          @endif
        </div>
      </div>
      <div class="column column-50 TrackedGift-addon">
        <div class="TrackedGift-container">
          <h4>Story History</h4>
          @if($addons)
            @foreach($addons as $addon)
            <div class="TrackedGift-extra">
              <div class="TrackedGift-name">
                Passed Along to: {{$addon['name']}}
              </div>

              <div class="TrackedGift-date">
                On: {{$addon['date']}}
              </div>

              <div class="TrackedGift-message">
                  {!!$addon['content']!!}
              </div>
            </div>
            @endforeach  @foreach($addons as $addon)
            <div class="TrackedGift-extra">
              <div class="TrackedGift-name">
                Passed Along to: {{$addon['name']}}
              </div>

              <div class="TrackedGift-date">
                On: {{$addon['date']}}
              </div>

              <div class="TrackedGift-message">
                  {!!$addon['content']!!}
              </div>
            </div>
            @endforeach
          @endif
          <div class="TrackedGift-form">
              <?php echo do_shortcode('[contact-form-7 id="262" title="Submit a Story Addition"]'); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
    
@endwhile

@endsection
