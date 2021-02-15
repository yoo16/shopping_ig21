<table class="table">
  <thead>
    <tr>
      <th></th>
      <th>{{ __('Item Name') }}</th>
      <th>{{ __('Price') }}</th>
      <th>{{ __('Amount') }}</th>
      <th></th>
    </tr>
  </thead>
  @if (isset($items))
  @foreach ($items as $item)
  <tbody>
    <tr>
      <td>
        <img src="{{ asset('images/now_printing.jpg') }}" alt="" width="50">
      </td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->price }}</td>
      <td>
        <input class="form-control col-3 text-right" type="number" min="0" 
        name="user_items[{{ $item->id }}]" value="{{ $user_items[$item->id]->amount }}">
      </td>
      <td>
        <a class="btn btn-danger" href="{{ route('cart.remove', ['id' => $item->id]) }}">{{ __('Delete') }}</a>
      </td>
    </tr>
  </tbody>
  @endforeach
  @endif
</table>

<div>
  <label for="">{{ __('Total Price') }}:</label>
  {{ @$total_price }}
</div>