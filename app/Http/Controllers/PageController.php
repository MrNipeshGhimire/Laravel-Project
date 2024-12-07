<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Crud;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        $datas = Category::with('products')->get();

        return view('frontend.pages.index',compact('datas'));
    }

    public function shop(){
        $data = Product::all();
        return view("frontend.pages.shop",compact('data'));
    }

    public function detail($id){
        $data = Product::find($id);
        return view('frontend.pages.detail',compact('data'));
    }
    public function order($id){
        $data = Product::find($id);
        return view('frontend.pages.order',compact('data'));
    }

    public function place_order(Request $request){
    //   $quantity=$request->quantity;
    //   $total=$request->total;

    //   $actualPrice=Product::find($request->product_id)->pluck('price');
    //   $total=$quantity * $actualPrice;
        $this->validate($request, [
            'city' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'product_id' => 'required',
        ]);

     

        if (auth()->check()) {
            $order_data = Orders::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'total_price' => $request->total,
            ]);

            $order_data->shipping()->create([
                'city' => $request->city,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
    
            return redirect()->route('thankyou')->with('success','Order Save successfully!');
    
        }
        else{
            return redirect()->route('login');
        }
   

 
    }
    public function about(){
        return view('frontend.pages.about');
    }
    public function services(){
        return view('frontend.pages.services');
    }

    public function blog(){
        return view('frontend.pages.blog');
    }
    public function contact(){
        return view('frontend.pages.contact');
    }

    public function thankyou(){
        return view('frontend.pages.thankyou');
    }

}
