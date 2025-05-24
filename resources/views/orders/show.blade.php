@extends('layout')

@section('title', 'Инфо о заказе')

@section('content')
    <h1>Заказ #{{ $order->id }}</h1>
    <p>ФИО: {{ $order->customer_name }}</p>
    <p>Дата: {{ $order->created_at->format('d.m.Y') }}</p>
    <p>Статус: {{ $order->status }}</p>
    <p>Комментарий: {{ $order->comment }}</p>
    <h3>Товары:</h3>
    <ul>
        @foreach ($order->items as $item)
            <li>{{ $item->product->name }} x {{ $item->quantity }} = {{ ($item->product->price * $item->quantity) / 100 }} руб.</li>
        @endforeach
    </ul>
    @if ($order->status == 'новый')
        <form method="POST" action="{{ route('orders.complete', $order) }}">
            @csrf @method('PATCH')
            <button type="submit">Отметить как выполненный</button>
        </form>
    @endif
@endsection