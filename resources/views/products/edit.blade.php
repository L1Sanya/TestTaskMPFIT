@extends('layout')

@section('title', 'Редактировать товар')

@section('content')
    <h1>Редактировать товар</h1>
    <form method="POST" action="{{ route('products.update', $product) }}">
        @csrf @method('PUT')
        <label>Название: <input type="text" name="name" value="{{ $product->name }}"></label><br>
        <label>Категория:
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($product->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </label><br>
        <label>Цена (в копейках): <input type="number" name="price" value="{{ $product->price }}"></label><br>
        <label>Описание: <textarea name="description">{{ $product->description }}</textarea></label><br>
        <button type="submit">Обновить</button>
    </form>
@endsection