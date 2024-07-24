@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Place Order</h1>
    <form method="POST" action="{{ route('order.store') }}">
        @csrf

        <div class="form-group">
            <label for="menu_id">Menu:</label>
            <select id="menu_id" name="menu_id" class="form-control" required>
                @foreach($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->description }} - ${{ $menu->price }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Place Order</button>
    </form>
</div>
@endsection
