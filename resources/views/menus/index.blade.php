@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Menu</h1>
        <a href="{{ route('menus.create') }}" class="btn btn-primary">Tambah Menu</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
    <tr>
        <td>{{ $menu->id }}</td>
        <td>{{ $menu->description }}</td>
        <td>{{ $menu->price }}</td>
        <td><img src="{{ asset('images/' . $menu->image) }}" width="100"></td>
        <td>
            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>
    </div>
@endsection
