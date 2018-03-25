@extends('layouts.app')

@section('content')
<div class="Container Container--small">
<div class="row">
  <div class="column column-100">


  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
    </div>
    <br/>
    <button onclick="goBack()">Go Back</button>

    <script>
    function goBack() {
        window.history.back();
    }
    </script>
  @endif
@endsection
</div>
</div>
</div>