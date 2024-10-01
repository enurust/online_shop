@include('user.head')

<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>{{$name_category[0] -> name}}</h2>
              
     


            </div>
          </div>

@foreach($data as $product)


          <div class="col-md-4">
            <div class="product-item">
              <a href="{{route('product')}}"><img height="200" width="150" src="productimage/{{$product->image}}" alt=""></a>
              <div class="down-content">
                <a href="{{route('product', $product-> id)}}"><h4>{{$product->title}}</h4></a>
                <h6>{{$product->price}} руб.</h6>
                <p>Категория: {{$product->category_id}}</p>
                <p>{{$product->description}}</p>
                <p>Количество: {{$product->quantity}}</p>

                <form action="{{url('addcart', $product->id)}}" method="POST">

                  @csrf

                  <input type="number" value="1" min="1" class="form-conrol" style=" width: 100px" name="quantity">

                  <br>


                    <input class="btn btn-primary" type="submit" value="Add Cart">

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