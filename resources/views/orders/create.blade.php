@extends('layout')

@section('title', 'Создать заказ')

@section('content')
    <h1>Создать заказ</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        <label>ФИО покупателя:
            <input type="text" name="customer_name" value="{{ old('customer_name') }}" required>
        </label><br><br>

        <h3>Выберите товары и укажите количество:</h3>

        @foreach ($products as $product)
            <label>
                {{ $product->name }} ({{ $product->price / 100 }} руб.) &nbsp;
                Количество: <input type="number" name="products[{{ $product->id }}]" value="{{ old('products.' . $product->id, 0) }}" min="0">
            </label><br>
        @endforeach

        <br>
        <label>Комментарий:
            <textarea name="comment">{{ old('comment') }}</textarea>
        </label><br><br>

        <button type="submit">Сохранить</button>
    </form>
@endsection