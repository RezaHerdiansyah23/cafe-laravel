@extends('layouts.user')

@section('content')
<div class="container">
    <h1>Place Order</h1>

    <form method="POST" action="{{ route('order.store') }}">
    <div class="d-flex justify-content-end mb-4">
            <button type="submit" class="btn btn-primary">Place Order</button>
        </div>
        @csrf
        <div class="row">
            @foreach($menus as $menu)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ asset('images/' . $menu->image) }}" class="card-img-top" alt="{{ $menu->description }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->description }}</h5>
                            <p class="card-text">${{ $menu->price }}</p>
                            <div class="form-group">
                                <label for="quantity_{{ $menu->id }}">Quantity:</label>
                                <input type="number" id="quantity_{{ $menu->id }}" name="quantities[{{ $menu->id }}]" class="form-control" min="0" value="0">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </form>
</div>
@endsection
