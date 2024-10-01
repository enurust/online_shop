@include('user.head')



    

<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Категории</h2>
              
    
            </div>
          </div>

            @foreach($data as $category)


          <div class="col-md-4">
            <div class="product-item">
              <div class="down-content">
                <a href="{{route('category', $category->id)}}"><h4>{{$category->name}}</h4></a>
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
