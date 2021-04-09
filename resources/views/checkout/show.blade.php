@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary mb-2" href="/checkout">Riwayat Transaksi</a>
    <a class="btn btn-primary mb-2" href="/">Buat Transaksi Baru</a>
    <div class="card text-light shadow" style="background-color: #344675;">
        <div class="card-body">
            <h3 class="mb-3">Pembelian Berhasil</h3>
            <table class="mb-3">
                <tr>
                    <th>Nama Customer</th>
                    <th>:</th>
                    <td>{{ $transaction->customer_name }}</td>
                </tr>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <th>:</th>
                    <td>{{ $transaction->created_at }}</td>
                </tr>
            </table>
            <table class="table text-light mb-0">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Item</th>
                        <th>Quantity</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaction->details as $detail)
                    <tr>
                        <td class="fit">
                            @if (strlen($detail->product->image_url) > 0)
                            <img src="{{ asset('storage/' . $detail->product->image_url) }}" alt="">
                            @else
                            -
                            @endif
                        </td>
                        <td>{{ $detail->product->name }}</td>
                        <td >{{ $detail->quantity }}</td>
                        <td class="text-left">{{ number_format($detail->price) }}</td>
                        <td class="text-left">{{ number_format($detail->quantity * $detail->price) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="h4">
                        <td class="text-left" colspan="2">Total Pembelian</td>
                        <td class="text-right" colspan="2">:</td>
                        <td class="text-left">{{ number_format($transaction->total) }}</td>
                    </tr>
                    <tr>
                        <td class="text-left" colspan="2">Total Pembayaran</td>
                        <td class="text-right" colspan="2">:</td>
                        <td class="text-left">{{ number_format($transaction->payment) }}</td>
                    </tr>
                    <tr>
                        <td class="text-left" colspan="2">Total Kembalian</td>
                        <td class="text-right" colspan="2">:</td>
                        <td class="text-left">{{ number_format($transaction->payment - $transaction->total) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection