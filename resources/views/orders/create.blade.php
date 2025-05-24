@extends('layout')

@section('title', 'Создать заказ')

@section('content')
    <h1>Создать заказ</h1>
    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        <label>ФИО покупателя: <input type="text" name="customer_name"></label><br>
        <label>Товар:
            <select name="product_id">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->price / 100 }} руб.</option>
                @endforeach
            </select>
        </label><br>
        <label>Количество: <input type="number" name="quantity" min="1" value="1"></label><br>
        <label>Комментарий: <textarea name="comment"></textarea></label><br>
        <button type="submit">Сохранить</button>
    </form>
@endsection