<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->

    <base href="/public">
    
    @include('admin.css')


    <style>
        .div_center
        {
            text-align: center;
            padding-top:40px; 
        }

        
    </style>
    
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->

        @include('admin.sidebar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->

        @include('admin.header')

        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

                {{-- @if (session()->has('message'))
                    
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>

                @endif --}}


                {{-- <div class="div_center"> --}}

                    {{-- <h4 class="card-title">Add Products</h4> --}}
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Update Product</h4>
                                        <form action="{{ url('edit_product',$product->id) }}" method="Post" class="forms-sample" enctype="multipart/form-data">
                                                @csrf
                                            <div class="form-group">
                                                <label for="exampleInputName1">* Title</label>
                                                <input name="title" type="text" value="{{ $product->title }}" class="form-control" style="background-color: #2A3038;" id="exampleInputName1" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputName1">* Description</label>
                                                <input name="description" type="text" value="{{ $product->description }}" class="form-control" style="background-color: #2A3038;" id="exampleInputName1" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputName1">* Price</label>
                                                <input name="price" type="number" value="{{ $product->price }}" class="form-control" style="background-color: #2A3038;" id="exampleInputName1" required>
                                            </div>
                                                    
                                            <div class="form-group">
                                                <label for="exampleInputName1">Discount Price</label>
                                                <input name="dis_price" type="number" value="{{ $product->discount_price }}" class="form-control" style="background-color: #2A3038;" id="exampleInputName1" >
                                            </div>
                                                        
                                            <div class="form-group">
                                                <label for="exampleInputName1">* Quantity</label>
                                                <input name="quantity" type="number" value="{{ $product->quantity }}" min="0" class="form-control" style="background-color: #2A3038;" id="exampleInputName1" required>
                                            </div>    

                                            <div class="form-group">
                                            <label for="exampleSelectGender">* Category</label>
                                            <select name="category" class="form-control" id="exampleFormControlSelect2" required>
                                                <option>{{ $product->category }}</option>
                                                    
                                                @foreach ($categories as $category)
                                                    <option>{{ $category->category_name }}</option>
                                                @endforeach

                                            </select>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label>Change Image</label>
                                                {{-- <input type="file" value="{{ $product->image }}" name="image" class="file-upload-default"> --}}
                                                <div class="input-group col-xs-12">
                                                <img style="width: 60px;height: 60px;border-radius: 100%;margin-right: 40px;" src="product/{{ $product->image }}">
                                                <input style="margin-top: 20px;" type="file" value="{{ $product->image }}" name="image" >

                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-outline-primary btn-icon-text">
                                                <i class="mdi mdi-file-check btn-icon-prepend"></i>Update
                                            </button>
                                        </form>
                                        </div>
                                    </div>
                                </div>

                    {{-- <form class="forms-sample" action="{{ url('add_category') }}" method="POST">
                        @csrf --}}
                        {{-- <input style="color: black" type="text" name="name" placeholder="Write category name"> --}}
                        {{-- <input class="btn btn-danger" type="submit" name="submit" value="Add Category"> --}}
                        {{-- <div class="form-group">
                            <label for="exampleInputUsername1">Category Name</label>
                            <input class="form-control" style="background-color: #2A3038;" id="exampleInputUsername1" type="text" name="name" placeholder="Write category name">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mr-2">Add Category</button>
                    </form> --}}
                            </div>
                            </div>
                            </div>
                            </div>
                        
                    </div>
                {{-- </div> --}}

            </div>
        </div>
    
        <!-- container-scroller -->
    <!-- plugins:js -->

    @include('admin.script')
    
    <!-- End custom js for this page -->
  </body>
</html>