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
                    <h4 class="card-title">All Category</h4>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>category name</th>
                            {{-- <th>Edit</th> --}}
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->category_name }}</td>
                                {{-- <td>
                                    <a href="" class="btn btn-outline-primary btn">edit</a>
                                </td> --}}
                                <td>
                                    <a onclick="return confirm('Are You Sure To Delete This!')" href="{{ url('delete_category' , $category->id) }}" class="btn btn-outline-danger btn">delete</a>
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