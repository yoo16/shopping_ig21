@extends('layouts.app')

@section('content')
<div class="container">

  <form action="{{ route('cart.order') }}" method="post">
    @csrf
    @include('cart.components.confirm_item_list')
    @include('cart.components.confirm_control')
  </form>

</div>
@endsection