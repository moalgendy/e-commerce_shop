<section class="subscribe_section">
      <div class="container-fuild">
         <div class="box">
            <div class="row">
               <div class="col-md-6 offset-md-3">
                  <div class="subscribe_form ">
                     <div class="heading_container heading_center">
                        <h3>Comments</h3>
                     </div>
                     <form action="{{ url('add_comment') }}" method="post">
                        @csrf
                        <textarea name="comment" placeholder="Comment Something Here...."></textarea>
                        <button type="submit">Send</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>




{{-- 

<section class="client_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Customer's Comments
         </h2>
      </div>
         
      
         
         

         
      

               
                  <div class="box col-lg-10 mx-auto">
                     
                     
<!-- Comment List Start -->
   <div class="bg-light mb-3" style="padding: 30px;">
      <h3 class="mb-4">{{ $total_comment }} Comments</h3>

      @foreach ($comments as $comment)
         <div class="media mb-4"> --}}
            {{-- <img class="img-xs rounded-circle " style="width: 60px;height: 60px;" src="/storage/{{Auth::user()->profile_photo_path }}" alt="{{Auth::user()->profile_photo_path }}"> --}}
         {{-- <div class="media-body">
               <h6>{{ $comment->name }} <small><i>01 Jan 2045</i></small></h6>
               <p>{{ $comment->comment }}</p>
               <button class="btn btn-sm btn-outline-secondary">Reply</button>
         </div>
      </div>
      @endforeach
      
      
   </div>
<!-- Comment List End -->
                  </div>
               
               </div> 
            
         
         
      
      
   </div>

</section> --}}