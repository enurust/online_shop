@include('user.head')

<div class="container" style="padding-top: 100px;">
    <h1 style=" font-size: 24px; text-align: center;">Мои заказы</h1>

    <h2 style=" font-size: 20px; text-align: center;"> Баланс: {{$balance}}</h2>

@if ($orders->isEmpty())
    <p style="text-align: center;">У вас пока нет заказов.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th class="center-text">ID заказа</th>
                <th class="center-text">Дата создания</th>
                <th class="center-text">Общая стоимость</th>
                <th class="center-text">Статус</th>
                <th class="center-text">Детали</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td class="center-text">{{ $order->id }}</td>
                    <td class="center-text">{{ $order->created_at }}</td>
                    <td class="center-text">{{ $order->total }} ₽</td>
                    <td class="center-text">{{ $order->status }}</td>
                    <td class="center-text"><a href="{{ route('detailorders', $order->id) }}">Просмотр</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
</div>


@include('user.script')
