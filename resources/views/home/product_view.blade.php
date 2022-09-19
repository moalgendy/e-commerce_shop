   <section class="product_section layout_padding">
      <div class="container">
         <div class="heading_container heading_center">
            {{-- <h2>
               Our <span>products</span>
            </h2> --}}

            {{-- <br><br> --}}

            <div>

               <form action="{{ url('search_product') }}" method="GET">
                  @csrf
                  <input style="width: 500px;" type="text" name="search" placeholder="Search for Products">
                  <input type="submit" value="Search">
               </form>

            </div>



         </div>
         <div class="row">
            @foreach ($products as $product)
               
            
            <div class="col-sm-6 col-md-4 col-lg-4">
               <div class="box">
                  <div class="option_container">
                     <div class="options">
                        <a href="{{ url('product_details',$product->id) }}" class="option1">
                        Product Details
                        </a>
                        {{-- <a href="" class="option2">
                        Buy Now
                        </a> --}}
                     </div>
                  </div>
                  <div class="img-box">
                     <img src="product/{{ $product->image }}">
                  </div>
                  <div class="detail-box">
                     <h5>
                        {{ $product->title }}
                     </h5>

                     @if ($product->discount_price !=null)
                     <h6 style="font-size: 17px;">
                        ${{ $product->discount_price }}
                     </h6>

                     <h6 style="text-decoration: line-through;">
                        ${{ $product->price }}
                     </h6>
                     @else

                     <h6>
                        ${{ $product->price }}
                     </h6>
                     @endif

                  </div>
               </div>
            </div>
         
            @endforeach
                  <span style="padding-top: 20px;">
                     
                  
            {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
</span>
            {{-- دى طريقة تانيه --}}
            {{-- {!! $products->appends(Request::all())->links() !!} --}}


         
         </div>
         {{-- <div class="btn-box">
            <a href="">
            View All products
            </a>
         </div> --}}
      </div>
   </section>



   {{-- بيعمل اسكرول وبيرجع لنفس المكان تاني بعد الريفريش --}}
<script>
   document.addEventListener("DOMContentLoaded", function(event) { 
       var scrollpos = localStorage.getItem('scrollpos');
       if (scrollpos) window.scrollTo(0, scrollpos);
   });

   window.onbeforeunload = function(e) {
       localStorage.setItem('scrollpos', window.scrollY);
   };
</script>