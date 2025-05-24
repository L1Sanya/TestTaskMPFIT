@extends('layout')

@section('title', 'Инфо о товаре')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>Категория: {{ $product->category->name }}</p>
    <p>Цена: {{ $product->price / 100 }} руб.</p>
    <p>Описание: {{ $product->description }}</p>
    <a href="{{ route('products.edit', $product) }}">Редактировать</a>
    <form method="POST" action="{{ route('products.destroy', $product) }}">
        @csrf @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
@endsection