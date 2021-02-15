@extends('layouts.app')

@section('content')
<div class="container">

  @if (empty($items))
  {{ __('Cart is empty.') }}
  @else
  <form action="{{ route('cart.updates') }}" method="post">
    @csrf
    @include('cart.components.index_nav')
    @include('cart.components.index_item_list')
  </form>
  @endif

  @if (isset($items)):
  @include('cart.components.index_control')
  @endif

</div>
@endsection