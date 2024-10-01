@include('user.head')


            @foreach($data as $product)

    <div class="latest-products">
      <div class="container">
            <div class="section-heading">
              <h1>{{$product -> title}}</h1>
                </div>

              <div class="section-heading">
                <h3>  Описание: {{ $product -> description}}</h3>
              </div>
                <div class="section-heading">
                <h3> Цена: {{$product -> price}} руб. </h3>
              </div>
               <div class="section-heading">
                <h3> Количество: {{$product -> quantity}} </h3>
              </div>
                
          @endforeach

          @if(method_exists($data, 'links'))

          <div class="d-flex justify-content-center">

            {!! $data->links() !!}

          </div>

          @endif

              </div>
          </div>

@include('user.script')