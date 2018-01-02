<?php
$heading = get_sub_field('heading');
$subheading = get_sub_field('subheading');
$content = get_sub_field('content');
$members = get_sub_field('members');

?>
<section class="Team">
    <div class="Container">
        <div class="row row-wrap">
            <div class="column column-25">
                <div class="Team-card Team-card--intro">
                    <h3>{{$heading}}</h3>
                    <h6>{{$subheading}}</h6>
                    <p>{{$content}}</p>
                </div>
            </div>
            @foreach ($members as $member)
            <div class="column column-25">
                <div class="Team-card" style="background-image:url({{$member['picture']}});">
                    <h3>{{$member['name']}}</h3>
                    <h5>{{$member['title']}}</h5>
                </div>
               
            </div>
            
            @endforeach
        </div>
    </div>
</section>