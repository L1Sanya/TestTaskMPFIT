<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Управление')</title>
</head>
<body>
<nav>
    <a href="{{ route('products.index') }}">Товары</a> |
    <a href="{{ route('orders.index') }}">Заказы</a> |
    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
        @csrf
        <button type="submit">Выйти</button>
    </form>
</nav>
<hr>
<div>
    @yield('content')
</div>
</body>
</html>