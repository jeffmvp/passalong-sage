@extends('layouts.app')
@section('content')
  <div class="Container Container--small">
    @php(woocommerce_content())
  </div>
@endsection