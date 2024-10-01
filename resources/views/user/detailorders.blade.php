@include('user.head')

     <div class="container" style="padding: 100px;" align="center">
            <table class="table" >
                <tr><h1>Детали заказа #{{ $order->id }}</h1> </td>

       <p><strong>Дата заказа:</strong> {{ $order->created_at }}</p>
        <p><strong>Общая стоимость:</strong> {{ $order->total }} ₽</p>
        <p><strong>Статус:</strong> {{ $order->status }}</p>

        <h2>Содержимое заказа</h2>
        <ul>
            @foreach ($order->cart_items as $item)
                <li>
                    {{ $item['name'] }} (ID: {{ $item['id'] }}), Количество: {{ $item['quantity'] }}, Цена: {{ number_format($item['price'], 2, '.', '') }} руб.
                </li>
            @endforeach
        </ul>

        <a href="{{ route('orders') }}" class="btn btn-primary">Назад к списку заказов</a>
    </tr>
    </table>
    </div>

@include('user.script')