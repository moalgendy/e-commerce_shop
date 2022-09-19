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



        <div class="col-lg-16 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Orders</h4>
                    {{-- <form action="{{ url('search') }}" method="GET" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                        @csrf
                        <input style="color: gray;" type="text" name="search" class="form-control" placeholder="Search products">
                        <input type="submit" class="btn btn-outline-primary" value="Search">
                    </form>
                     --}}
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Product_title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Payment staus</th>
                            <th>Delevery staus</th>
                            <th>Delivered</th>
                            <th>Print PDF</th>
                            <th>Send Email</th>

                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->product_title }}</td>
                                <td>{{ $order->guantity }}</td>
                                <td>{{ $order->price }}</td>
                                <td><img style="width: 60px;height: 60px;" src="product/{{ $order->image }}"></td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->delivery_status }}</td>

                                <td>
                                    @if ($order->delivery_status == 'processing')
                                    <a onclick="return confirm('Are You Sure This Product is delivered!')" href="{{ url('delivered',$order->id) }}" class="btn btn-outline-primary btn">Delivered</a>
                                        @else
                                        <p style="color: green">Delivered</p>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ url('print_pdf',$order->id) }}" class="btn btn-outline-danger btn">Print PDF</a>
                                </td>
                                <td>
                                    <a href="{{ url('send_email',$order->id) }}" class="btn btn-outline-info btn">Send Email</a>
                                </td>

                            </tr>


                        {{-- if empty get that --}}
                            @empty

                            <tr>
                                <td style="text-align: center;" colspan="16">
                                    No Data Found
                                </td>
                            </tr>





                            @endforelse

                        {{-- <span style="padding-top: 20px;">
                        {!! $orders_pag->withQueryString()->links('pagination::bootstrap-5') !!}
                        </span> --}}

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