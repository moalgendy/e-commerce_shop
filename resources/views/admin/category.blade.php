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

        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                    
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>

                @endif


                {{-- <div class="div_center"> --}}

                    
                            <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Category</h4>
                    <form class="forms-sample" action="{{ url('add_category') }}" method="POST">
                        @csrf
                        {{-- <input style="color: black" type="text" name="name" placeholder="Write category name"> --}}
                        {{-- <input class="btn btn-danger" type="submit" name="submit" value="Add Category"> --}}
                        <div class="form-group">
                            <label for="exampleInputUsername1">Category Name</label>
                            <input class="form-control" style="background-color: #2A3038;" id="exampleInputUsername1" type="text" name="name" placeholder="Write category name">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mr-2">Add Category</button>
                    </form>
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