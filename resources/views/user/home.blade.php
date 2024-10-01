@include('user.head')


    

<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Товары</h2>
              
              <form action="{{url('search')}}" method="get" class="form-inline" style="float: right; padding: 10px;">

                @csrf

                <input class="form-control" type="search" name="search" placeholder="поиск">

                <input type="submit" value="Поиск" class="btn btn-success">

               </form>


            </div>
          </div>

            @foreach($data as $product)


          <div class="col-md-4">
            <div class="product-item">
              <a href="#"><img height="200" width="150" src="productimage/{{$product->image}}" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}}</h4></a>
                <h6>{{$product->price}} руб.</h6>
                <p>Категория: {{$product->category_id}}</p>
                <p>{{$product->description}}</p>
                <p>Количество: {{$product->quantity}}</p>

                <form action="{{route('addToCart', $product)}}" method="POST">

                  @csrf

                  <input type="number" value="1" min="1" class="form-conrol" style=" width: 100px" name="quantity">

               

                  <br>


                    <input class="btn btn-primary" type="submit" value="В корзину">

                </form>

              </div>
            </div>
          </div>

          @endforeach

          @if(method_exists($data, 'links'))

          <div class="d-flex justify-content-center">

            {!! $data->links() !!}

          </div>

          @endif

        </div>
      </div>
    </div>

 

    
    


@include('user.script')