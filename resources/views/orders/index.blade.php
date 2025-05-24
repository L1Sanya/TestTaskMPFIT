@extends('layout')

@section('title', 'Список заказов')

@section('content')
    <h1>Список заказов</h1>
    <a href="{{ route('orders.create') }}">Создать заказ</a>
    <ul>
        @foreach ($orders as $order)
            <li>
                <a href="{{ route('orders.show', $order) }}">#{{ $order->id }}</a> - {{ $order->customer_name }} ({{ $order->status }}) - {{ $order->created_at->format('d.m.Y') }}
            </li>
        @endforeach
    </ul>
@endsection