@extends('layout')

@section('title', 'Список заказов')

@section('content')
    <<h1>Список заказов</h1>
    <a href="{{ route('orders.create') }}">Создать заказ</a>
    <ul>
        @foreach ($orders as $order)
            <li>
                <a href="{{ route('orders.show', $order) }}">#{{ $order->id }}</a> -
                {{ $order->customer_name }}
                <strong>({{ $order->status }}) </strong>-
                {{ $order->created_at->format('d.m.Y') }} -
                <strong>{{ $order->total_price / 100 }} руб.</strong>
            </li>
        @endforeach
    </ul>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

@endsection