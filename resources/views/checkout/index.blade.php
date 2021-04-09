@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-primary mb-2" href="/">Kembali</a>
    <div class="card text-light shadow" style="background-color: #344675;">
        <div class="card-body">
            <div class="mb-4">
                <h3 class="my-auto mb-4">Riwayat Transaksi</h3>
            </div>
            
            <table class="table text-light mb-0">
                <thead>
                    <tr>
                        <th>Nama Pembeli</th>
                        <th>Total</th>
                        <th>Pembayaran</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->customer_name }}</td>
                        <td>{{ number_format($transaction->total) }}</td>
                        <td>{{ number_format($transaction->payment) }}</td>
                        <td class="fit">
                            <a class="btn btn-primary" href="/checkout/{{ $transaction->id }}">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection