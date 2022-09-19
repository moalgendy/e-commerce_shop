<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    
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

<!---- alert ----->
<div class="main-panel">
    <div class="content-wrapper">

        @if (session()->has('message'))
                    
        <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}
        </div>

        @endif



        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Products</h4>

                    
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product title</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount price</th>
                            <th>Product image</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td><img style="width: 60px;height: 60px;" src="product/{{ $product->image }}"></td>
                                <td>
                                    <a href="{{ url('update_product' , $product->id) }}" class="btn btn-outline-primary btn">edit</a>
                                </td>
                                <td>
                                    <a onclick="return confirm('Are You Sure To Delete This!')" href="{{ url('delete_product' , $product->id) }}" class="btn btn-outline-danger btn">delete</a>
                                </td>
                                {{-- <td><label class="badge badge-danger">Pending</label></td> --}}
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

<!-- container-scroller -->
<!-- plugins:js -->

@include('admin.script')

<!-- End custom js for this page -->
</body>
</html>        