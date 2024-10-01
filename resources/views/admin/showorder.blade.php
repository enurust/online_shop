<!DOCTYPE html>
<html lang="en">
  <head>

  	@include('admin.css')

  </head>
  <body>
    
      <!-- partial -->
      	@include('admin.sidebar')
      	@include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Заказы</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                <td style="padding:20px; color: white; font-size: 15px;">ID заказа </td>
                <td style="padding:20px; color: white; font-size: 15px;">Пользователь </td>
                <td style="padding:20px; color: white; font-size: 15px;">Общая стоимость</td>
                <td style="padding:20px; color: white; font-size: 15px;">Статус</td>
                <td style="padding:20px; color: white; font-size: 15px;">Дата создания</td>
                <td style="padding:20px; color: white; font-size: 15px;"></td>
                <td style="padding:20px; color: white; font-size: 15px;"></td>
                <td style="padding:20px; color: white; font-size: 15px;"></td>


              </tr>
                        </thead>
                        <tbody>

                          @foreach ($orders as $order)
              <tr>

                <td style="padding:20px; color: white; font-size: 15px;">{{$order->id }} </td>
                <td style="padding:20px; color: white; font-size: 15px;">{{$order->user->name}} </td>
                <td style="padding:20px; color: white; font-size: 15px;">{{number_format($order->total, 2, '.', '') }} руб. </td>
                <td style="padding:20px; color: white; font-size: 15px;">{{$order->status }} </td>
                <td style="padding:20px; color: white; font-size: 15px;">{{$order->created_at}} </td>
                <td style="padding:20px; color: white; font-size: 15px;">
                  
                  <a class="btn btn-warnig" href="{{route('detail', $order->id)}}"> Подробнее </a>

                </td>
                <td style="padding:20px; color: white; font-size: 15px;">

                  <a class="btn btn-success" href="{{route('confirmstatus', $order->id)}}"> Подтвердить </a>

                </td>

                <td style="padding:20px; color: white; font-size: 15px;">

                  <a class="btn btn-danger" href="{{route('cancelstatus', $order->id)}}"> Отменить </a>
                </td>



              </tr>
              @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- partial -->
        @include('admin.script')
  </body>
</html>