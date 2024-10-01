<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">

  	@include('admin.css')

      <style type="text/css">


    .title
    {
      color:white; 
      padding-top: 25px; 
      font-size: 25px;
    }

    label
    {
      display: inline-block;
      width: 200px;

    }

  </style>

  </head>
  <body>
    
      <!-- partial -->
      	@include('admin.sidebar')
      	@include('admin.navbar')
        <!-- partial -->
        
<div class="container-fluid page-body-wrapper">

          <div class="container" align="center">

            <h1 class="title"> Update Product</h1>

            @if(session()->has('message'))

              <div class="alert alert-success">

                {{session()->get('message')}}

                <button type="button" class ="close" data-bs-dismiss="alert">x</button>

            </div>

            @endif

            <form action="{{url('updateproduct', $data->id)}}" method="POST" enctype="multipart/form-data">

              @csrf

            <form>

          <div style="padding: 15px;">
            <label> Product title </label>

            <input style="color:black;" type="text" name="title" value="{{$data -> title}}" placeholder="Give a product title" required="">
          </div>


          <div style="padding: 15px;">
            <label> Category</label>

            <input style="color:black;" type="number" name="category" value="{{$data -> category_id}}" placeholder="Give a category" required="">
          </div>


          <div style="padding: 15px;">
            <label> Price </label>

            <input style="color:black;" type="number" name="price" value="{{$data -> price}}" placeholder="Give a price" required="">
          </div>


          <div style="padding: 15px;">
            <label> Description </label>

            <input style="color:black;" type="text" name="description" value="{{$data -> description}}" placeholder="Give a description" required="">
          </div>

          <div style="padding: 15px;">
            <label> Quantity</label>

            <input style="color:black;" type="text" name="quantity" value="{{$data -> quantity}}" placeholder="Product quantity" required="">
          </div>

          <div style="padding: 15px;">
            <label> Old Image</label>
            <img height="100 px" width="100 px" src="/productimage/{{$data->image}}">
          </div>

          <div style="padding: 15px; align= center;">
            <label> Change the Image</label>
            <input type="file" name="file" value="{{$data -> image}}">
          </div>

          <div style="padding: 15px;">

            <input class="btn btn-success" type="submit" >
          </div>

        </form>
          </div>
</div>
          <!-- partial -->
        @include('admin.script')
  </body>
</html>