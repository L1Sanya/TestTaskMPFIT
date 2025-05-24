@extends('layout')

@section('title', 'Добавить товар')

@section('content')
    <h1>Добавить товар</h1>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <label>Название: <input type="text" name="name"></label><br>
        <label>Категория:
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </label><br>
        <label>Цена (в копейках): <input type="number" name="price"></label><br>
        <label>Описание: <textarea name="description"></textarea></label><br>
        <button type="submit">Сохранить</button>
    </form>
@endsection