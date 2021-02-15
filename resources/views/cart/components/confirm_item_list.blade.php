<table class="table">
  <thead>
    <tr>
      <th></th>
      <th>{{ __('Item Name') }}</th>
      <th>{{ __('Price') }}</th>
      <th>{{ __('Amount') }}</th>
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
      <td>{{ $user_items[$item->id]->amount }}</td>
    </tr>
  </tbody>
  @endforeach
  @endif
</table>

<div>
  <label for="">{{ __('Total Price') }}:</label>
  {{ $total_price }}
</div>