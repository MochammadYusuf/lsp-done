@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary mb-2" href="/">Kembali</a>
    <div class="card text-light shadow" style="background-color: #344675;">
        <div class="card-body">
            <div class="d-flex mb-2">
                <h3 class="my-auto">Master Produk</h3>
                <a class="btn btn-primary ml-auto" href="/products/create">Tambah</a>
            </div>
            
            @if (session('errorMessage'))
            <span class="text-danger">{{ session('errorMessage') }}</span>
            @endif
            <table class="table text-light mb-0">
                <thead>
                    <tr>
                        <th>Nama Item</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td class="fit">
                            @if (strlen($product->image_url) > 0)
                            <img src="{{ asset('storage/' . $product->image_url) }}" alt="">
                            @else
                            -
                            @endif
                        </td>
                        <td class="text-left">{{ number_format($product->price) }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td class="fit">
                            <form method="POST" action="/products/{{ $product->id }}">
                                @method('DELETE')
                                @csrf
                                <a class="btn btn-primary" href="/products/{{ $product->id }}/edit">Edit</a>
                                <button class="btn btn-danger" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection