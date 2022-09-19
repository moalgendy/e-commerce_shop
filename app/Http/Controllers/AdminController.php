<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{

    // category

    public function view_category()
    {
        $usertype = optional(Auth::user())->usertype;
        
        if (Auth::id() && $usertype == '1') {
            return view('admin.category');
        }else {
            return redirect('login');
        }

        
    }

    public function add_category(Request $request)
    {
        Category::create([
            'category_name'=>$request->name,
        ]);
        return redirect()->back()->with('message','Category Adedd Successfully');
    }


    public function all_category()
    {
        $categories = Category::all();
        return view('admin.all_category' , compact('categories'));
    }


    public function delete_category($id)
    {
        Category::destroy($id);
        return redirect()->back()->with('message','Category Deleted Successfully');
    }




// product

    public function view_product()
    {
        $usertype = optional(Auth::user())->usertype;

        if (Auth::id() && $usertype == '1') {
            $categories = Category::all();
            return view('admin.product' , compact('categories'));
        }else {
            return redirect('login');
        }

    }


    public function add_product(Request $request)
    {
            $product = new Product();
            $product->title=$request->title;
            $product->description=$request->description;
            $product->category=$request->category;
            $product->quantity=$request->quantity;
            $product->price=$request->price;
            $product->discount_price=$request->dis_price;
            $image=$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;
            $product->save();


        
            return redirect()->back()->with('message','Product Added Successfully');
    }


    public function all_product()
    {
        $products = Product::all();
        return view('admin.all_product' , compact('products'));
    }


    public function delete_product($id)
    {
        Product::destroy($id);
        return redirect()->back()->with('message','Product Deleted Successfully');
    }


    public function update_product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.update__product' , compact('product','categories'));
    }


    public function edit_product(Request $request, $id)
    {

            $product = Product::find($id);
            $product->title=$request->title;
            $product->description=$request->description;
            $product->category=$request->category;
            $product->quantity=$request->quantity;
            $product->price=$request->price;
            $product->discount_price=$request->dis_price;
            $image=$request->image;
            if ($image) {
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->image->move('product',$imagename);
                $product->image=$imagename;
            }

            $product->save();
            return redirect()->route('all_product');
    }





public function delete_user($id)
{
    User::destroy($id);

    return redirect()->back()->with('message','User Deleted Successfully');
}



public function order()
{
    $orders = Order::all();
    // $orders_pag = Order::paginate(4);

    return view('admin.order',compact('orders'));
}


public function delivered($id)
{
    $order = Order::find($id);
    $order->delivery_status="delivered";
    $order->payment_status="Paid";
    $order->save();
    return redirect()->back();
}


// print pdf
public function print_pdf($id)
{
    $order = Order::find($id);
    $pdf = PDF::loadView('admin.pdf', compact('order'));

    return $pdf->download('order_details.pdf');
}

// send email
public function send_email($id)
{
    $order = Order::find($id);
    return view('admin.email_info',compact('order'));
}

public function send_user_email(Request $request , $id)
{
    $order = order::find($id);

    $details = [

        'greeting'=>$request->greeting,
        'firstline'=>$request->firstline,
        'body'=>$request->body,
        'button'=>$request->button,
        'url'=>$request->url,
        'lastline'=>$request->lastline,

    ];

    Notification::send($order,new SendEmailNotification($details));

    return redirect()->back();
}


// search
public function searchdata(Request $request)
{
    $searchText = $request->search;
    $orders=order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->get();


    return view('admin.order',compact('orders'));
}


}
