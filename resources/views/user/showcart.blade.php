@include('user.head')



@if(count($cart) > 0)
        <div style="padding: 100px;" align="center">

            <table class="table" >
                <thead>
                    <tr>
                        <th>Название товара</th>
                        <th>Количество</th>
                        <th>Цена</th>
                        <th>Общая стоимость</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $details)
                        <tr>
                            <td>{{ $details['name'] }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>{{ $details['price'] }} руб.</td>
                            <td>{{ $details['price'] * $details['quantity'] }} руб.</td>
                            <td>

                                <div class="row" >
                                <form action="{{ route('cartdecrease', $details['id']) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-warning">-</button>
                                </form>

                                <form action="{{ route('cartincrease', $details['id']) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">+</button>
                                </form>
                                <form action="{{route ('cartremove', $id)}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Удалить</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            
      <table>
         <tr > 
          <td style="padding:20px; color: black; font-size: 20px;"> 
            <h3> Итого:  {{$total}} руб. </h3>
            
            </td>
        </tr>
      </table>

            <form action="{{route('cartcheckout')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Оформить заказ</button>
            </form>
        @else
            <div style="padding: 100px;" align="center">

    <table>
         <tr > 
          <td > 
            <p style="padding:20px; color: black; font-size: 30px; "> <b>Ваша корзина пуста</b> </p>
            </td>
        </tr>
      </table>
  </div>
        @endif
    </div>

    <h2 style=" font-size: 20px; text-align: center;"> Баланс: {{$balance}} руб.</h2>


@include('user.script')