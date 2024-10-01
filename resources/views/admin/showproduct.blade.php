<!DOCTYPE html>
<html lang="en">
  <head>

  	@include('admin.css')

  </head>
  <body>
    
      
      	@include('admin.sidebar')
      	@include('admin.navbar')
     

        
        <div style="padding-bottom: 30px;" class="container-fluid page-body-wrapper">

          <div class="container" align="center">

            @if(session()->has('message'))

              <div class="alert alert-success">

                {{session()->get('message')}}

                <button type="button" class ="close" data-bs-dismiss="alert">       X</button>

            </div>

            @endif
<div class="main-panel">
          <div class="content-wrapper">
            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h1 style="color: white; font-size: 30px;" class="card-title">Товары</h1>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
      
                            <th style="color: white; font-size: 20px;" > Название </th>
                            <th style="color: white; font-size: 20px;"> Категория </th>
                            <th style="color: white; font-size: 20px;"> Описание </th>
                            <th style="color: white; font-size: 20px;"> Количество </th>
                            <th style="color: white; font-size: 20px;"> Цена </th>
                            <th style="color: white; font-size: 20px;"> Image </th>
                            <th>  </th>
                            <th>  </th>
                          </tr>
                        </thead>

                        @foreach($data as $product)

                        <tbody>
                          <tr>
                            <td style="color: white; font-size: 15px;">{{$product->title}}</td>
                            <td style="color: white; font-size: 15px;">{{$product->category_id}}</td>
                            <td style="color: white; font-size: 15px;">{{$product->description}}</td>
                            <td style="color: white; font-size: 15px;">{{$product->quantity}}</td>
                            <td style="color: white; font-size: 15px;">{{$product->price}}</td>
                            <td><img height="100 px" width="100 px" src="productimage/{{$product->image}}"></td>

                            <td> 
                              <a class="btn btn-primary" href="{{url('updateview', $product->id)}}"> Update </a>
                            </td>

                            
                            <td> 
                              <a class="btn btn-danger" href="{{url('deleteproduct', $product->id)}}"> Delete </a>
                            </td>

                             
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



          </div>

        </div>
    
        @include('admin.script')
  </body>
</html>