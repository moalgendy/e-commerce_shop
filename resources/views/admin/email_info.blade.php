<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <!-- Required meta tags -->
    
    @include('admin.css')
    
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


                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h3 style="text-transform: none;" class="card-title">Send Email To :  {{ $order->email }}</h3>
                                <form action="{{ url('send_user_email' , $order->id) }}" method="Post" class="forms-sample" enctype="multipart/form-data">
                                        @csrf
                                    <div class="form-group">
                                        <label for="exampleInputName1">Email Greeting</label>
                                        <input name="greeting" type="text" class="form-control" style="background-color: #2A3038;" id="exampleInputName1" placeholder="Write Email Greeting" >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Email Firstling</label>
                                        <input name="firstline" type="text" class="form-control" style="background-color: #2A3038;" id="exampleInputName1" placeholder="Write Email Firstling" >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Email Body</label>
                                        <input name="body" type="text" class="form-control" style="background-color: #2A3038;" id="exampleInputName1" placeholder="Write Email Body" >
                                    </div>
                                            
                                    <div class="form-group">
                                        <label for="exampleInputName1">Email Button Name</label>
                                        <input name="button" type="text" class="form-control" style="background-color: #2A3038;" id="exampleInputName1" placeholder="Write Email Button Name">
                                    </div>
                                                
                                    <div class="form-group">
                                        <label for="exampleInputName1">Email URL</label>
                                        <input name="url" type="text" class="form-control" style="background-color: #2A3038;" id="exampleInputName1" placeholder="Write Email URL" >
                                    </div>    

                                    <div class="form-group">
                                        <label for="exampleInputName1">Email Last Line</label>
                                        <input name="lastline" type="text" class="form-control" style="background-color: #2A3038;" id="exampleInputName1" placeholder="Write Email Last Line" >
                                    </div>
                                
                                    

                                    <button type="submit" class="btn btn-outline-primary btn-icon-text">
                                        <i class="mdi mdi-file-check btn-icon-prepend"></i>Send
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

    
        <!-- container-scroller -->
    <!-- plugins:js -->

    @include('admin.script')
    
    <!-- End custom js for this page -->
  </body>
</html>