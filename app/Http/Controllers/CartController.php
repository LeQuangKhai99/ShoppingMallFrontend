<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    private $slider, $category, $product, $customer, $order, $order_item;
    public function __construct(Slider $slider, Category $category, Product $product, Customer $customer, Order $order, OrderDetail $order_item){
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
        $this->customer = $customer;
        $this->order = $order;
        $this->order_item = $order_item;
    }

    public function index(){
        $categorys = $this->category->where('parent_id', '=', 0)->get();

        $cart = session()->get('cart');
        return view('cart.index', ['categorys'=>$categorys, 'cart'=>$cart]);
    }
    public function addCart(Request $request){

        $product = $this->product->find($request->product_id);

        $cart = session()->get('cart');
        if (isset($cart[$product->id])){
            $cart[$product->id]['quantity'] += $request->quantity;
        }
        else{
            $cart[$product->id] = [
                'product'=>$product,
                'quantity'=>$request->quantity
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }

    public function updateCart(Request $request){
        $cart = session()->get('cart');

        foreach ($cart as $key => $item){
            $cart[$request->product_id]['quantity'] = $request->quantity;
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }

    public function deleteCart($id){
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }

    public function checkout(){
        $cart = session()->get('cart');
        if ($cart == null){
            session()->put('mess', 'Chưa có sản phẩm nào trong giỏ hàng');
            return redirect()->route('home');
        }
        else{
            if (count($cart) == 0){
                session()->put('mess', 'Chưa có sản phẩm nào trong giỏ hàng');
                return redirect()->route('home');
            }
            else{
                $categorys = $this->category->where('parent_id', '=', 0)->get();
                return view('cart.checkout', ['categorys'=>$categorys]);
            }
        }

    }

    public function postCheckout(Request $request){
        try {
            DB::beginTransaction();
            $cart = session()->get('cart');
            $customer = $this->customer->create([
                'name'=>$request->name,
                'address'=>$request->address
            ]);

            $order = $this->order->create([
                'user_id'=>auth()->user()->id,
                'customer_id'=>$customer->id,
                'status' => 0,
                'note'=>$request->note
            ]);


            foreach ($cart as $item)
            {
                $this->order_item->create([
                    'order_id'=>$order->id,
                    'product_id'=>$item['product']->id,
                    'quantity'=>$item['quantity']
                ]);
            }

            DB::commit();
            session()->forget('cart');
            session()->put('mess', 'Đặt hàng thành công');
            return redirect()->route('home');
        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('--Message'.$exception->getMessage()." -- Line: ".$exception->getLine());
        }
    }
}
