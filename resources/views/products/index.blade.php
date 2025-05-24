@extends('layout')

@section('title', 'Список товаров')

@section('content')
    <h1>Список товаров</h1>
    <a href="{{ route('products.create') }}">Добавить товар</a>
    <ul>
        @foreach ($products as $product)
            <li>
                <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a> - {{ $product->price / 100 }} руб. ({{ $product->category->name }})
            </li>
        @endforeach
    </ul>
@endsection