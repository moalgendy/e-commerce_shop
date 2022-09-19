<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    public function index()
    {
        $products = Product::paginate(9);
        $comments = Comment::all();
        // لو عملت الريبلي ضيفها تحت في البحث في البرودكت
        $total_comment = Comment::count();

        return view('home.userpage',compact('products','comments','total_comment'));
    }
    public function redirect()
    {
        // COUNT
        $usertype = optional(Auth::user())->usertype;
        if ($usertype == '1') {

        $users = User::all();    
        $count_product = Product::count();
        $count_category = Category::count();
        $count_users = User::count();
        $count_orders = Order::count();
        $count_delivered = Order::where('delivery_status','delivered')->get()->count();
        $count_processing = Order::where('delivery_status','processing')->get()->count();

        $order = Order::all();
        $total_revenue = 0;

        foreach ($order as $order) {

            $total_revenue=$total_revenue + $order->price;
        
        }
        
 
            
            return view('admin.home',compact('count_product','count_category','count_users','users','count_orders','total_revenue','count_delivered','count_processing'));

        }else {
            $products = Product::paginate(9);
            $comments = Comment::all();
            $total_comment = Comment::count();


        $total_comment = Comment::count();
            return view('home.userpage',compact('products','comments','total_comment'));
        }
    }


    public function product_details($id)
    {
        $details = Product::find($id);
        return view('home.product_details',compact('details'));
    }


    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            

            $user = Auth::user();
            $userid = $user->id;
            $product = Product::find($id);

            $product_exist_id = Cart::where('product_id',$id)->where('user_id',$userid)->get('id')->first();

            if ($product_exist_id) {
                
                $cart = Cart::find($product_exist_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;


                    if ($product->discount_price != null) {

                        //  علشان نجيب الاجمالي للكميه لو زادت عن واحد هنضرب في الريكويست بتاع الكوانتيتي اللي العميل محدده وهنا بنجيب بتاع الديسكونت

                        $cart->total_price=$product->discount_price * $cart->quantity;
                        $cart->price=$product->discount_price ;
                        
                    }else {

                        //  علشان نجيب الاجمالي للكميه لو زادت عن واحد هنضرب في الريكويست بتاع الكوانتيتي اللي العميل محدده

                        $cart->total_price=$product->price * $cart->quantity;
                        $cart->price=$product->price;

                    }

                $cart->save();
                return redirect()->back();


            }else {
                $cart = new Cart();
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;
                $cart->product_title=$product->title;

                if ($product->discount_price != null) {

                    //  علشان نجيب الاجمالي للكميه لو زادت عن واحد هنضرب في الريكويست بتاع الكوانتيتي اللي العميل محدده وهنا بنجيب بتاع الديسكونت

                    $cart->total_price=$product->discount_price * $request->quantity;
                    $cart->price=$product->discount_price ;
                    
                }else {

                    //  علشان نجيب الاجمالي للكميه لو زادت عن واحد هنضرب في الريكويست بتاع الكوانتيتي اللي العميل محدده

                    $cart->total_price=$product->price * $request->quantity;
                    $cart->price=$product->price;

                }

                $cart->image=$product->image;
                $cart->product_id=$product->id;
                $cart->quantity=$request->quantity;
                $cart->save();


                Alert::success('Product Added Successfully','We have added product to the cart');


                return redirect()->back();
                }
                
                

        }else {
            return redirect('login');
        }
    }



    public function show_cart()
    {

        if (Auth::id()) {
        $id = Auth::user()->id;
        $carts = Cart::where('user_id',$id)->get();
        return view('home.cart',compact('carts'));

        }else {
            return redirect('login');
        }

        
    }


    public function delete_cart($id)
    {
        Cart::destroy($id);
        return redirect()->back()->with('message','Product Deleted Successfully');

    }


    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;

        $data = Cart::where('user_id',$userid)->get();

        foreach ($data as $data) {
            $order = new Order();

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            
            $order->product_title = $data->product_title;
            $order->price = $data->total_price;
            $order->guantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Pay cash on Delivery';
            $order->delivery_status = 'processing';
            $order->save();

            // حذف البيانات من السلة بعد حفظها في الاوردر

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();

        }

        return redirect()->back()->with('message','We have Received Your Order. We will connect with you soon...');

    }



    public function stripe($totalprice)
    {
        

        return view('home.stripe',compact('totalprice'));
    }



    public function stripePost(Request $request,$totalprice)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => $totalprice * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Thanks for payment." 

        ]);



        $user = Auth::user();
        $userid = $user->id;

        $data = Cart::where('user_id',$userid)->get();

        foreach ($data as $data) {
            $order = new Order();

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            
            $order->product_title = $data->product_title;
            $order->price = $data->total_price;
            $order->guantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status  = 'Paid';
            $order->delivery_status = 'processing';
            $order->save();

            // حذف البيانات من السلة بعد حفظها في الاوردر

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();

        }



        session::flash('success', 'Payment successful!');


        return back();
    }


    // add comment
    public function add_comment(Request $request)
    {
        if (Auth::id()) {

            $comment = new Comment();
            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->comment = $request->comment;

            $comment->save();

            return redirect()->back();

            
        }else {
            
            return redirect('login');
        }
    }


    // search for products
    public function product_search(Request $request)
    {
        
        $comments = Comment::all();

        $searchText = $request->search;
        $products = Product::where('title','LIKE',"%$searchText%")->orWhere('category','LIKE',"%$searchText%")->paginate(9);

        return view('home.userpage',compact('products','comments'));
    }



    // show all products
    public function show_all_products()
    {
        $products = Product::paginate(9);
        return view('home.show_all_products',compact('products'));
    }


    // search for products
    public function search_product(Request $request)
    {
        
        $comments = Comment::all();

        $searchText = $request->search;
        $products = Product::where('title','LIKE',"%$searchText%")->orWhere('category','LIKE',"%$searchText%")->paginate(9);

        return view('home.show_all_products',compact('products','comments'));
    }


}
