@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @if(have_rows('flexible'))
      @while(have_rows('flexible')) @php(the_row())
        @include('components.' . get_row_layout())
      @endwhile
    @endif
  @endwhile
@endsection
