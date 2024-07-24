@extends('layouts.app')

@section('title', 'Edit Menu')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Menu</h1>
    <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="description">description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $menu->description }}" required>
        </div>
        <div class="form-group">
            <label for="price">price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $menu->price }}" required>
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <small>Current image: <img src="{{ asset('images/' . $menu->image) }}" width="100"></small>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
