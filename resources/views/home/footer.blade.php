   <footer>
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <div class="full">
                  <div class="logo_footer">
                     <h2 style="color: crimson;font-weight: 900;">SSU SHOP</h2>
                  </div>
                  <div class="information_f">
                     <p><strong>ADDRESS:</strong> Alblashone , Alsharqia , EGY</p>
                     <p><strong>TELEPHONE:</strong> +20 101 767 8379</p>
                     <p><strong>EMAIL:</strong> mhmad.algendy123@gmail.com</p>
                  </div>
               </div>
            </div>
            <div class="col-md-8">
               <div class="row">
               <div class="col-md-7">
                  <div class="row">
                     <div class="col-md-6">
                  <div class="widget_menu">
                     <h3>Menu</h3>
                     <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/show_all_products') }}">Products</a></li>
                        <li><a href="{{ url('/show_cart') }}">Cart</a></li>
                        {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}
                        {{-- <li><a href="#">Contact</a></li> --}}
                     </ul>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="widget_menu">
                     <h3>Account</h3>
                     <ul>
                        <li><a href="{{ url('user/profile') }}">Account</a></li>
                        {{-- <li><a href="#">Checkout</a></li> --}}
                        {{-- <li><a href="#">Login</a></li> --}}
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="{{ route('login') }}">login</a></li>
                        {{-- <li><a href="#">Shopping</a></li> --}}
                        {{-- <li><a href="#">Widget</a></li> --}}
                     </ul>
                  </div>
               </div>
                  </div>
               </div>     
               <div class="col-md-5">
                  <div class="widget_menu">
                     <h3>Newsletter</h3>
                     <div class="information_f">
                        <p>Subscribe by our newsletter and get update protidin.</p>
                     </div>
                     <div class="form_sub">
                        <form>
                           <fieldset>
                              <div class="field">
                                 <input type="email" placeholder="Enter Your Mail" name="email" />
                                 <input type="submit" value="Subscribe" />
                              </div>
                           </fieldset>
                        </form>
                     </div>
                  </div>
               </div>
               </div>
            </div>
         </div>
      </div>
   </footer>