<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\RegisterRequest;
use App\Product;
use App\Slider;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    private $slider, $category, $product, $user;
    public function __construct(Slider $slider, Category $category, Product $product, User $user){
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
        $this->user = $user;
    }
    public function login(){
        $categorys = $this->category->where('parent_id', '=', 0)->get();
        return view('login.index',  ['categorys'=>$categorys]);
    }

    public function postLogin(Request $request){
        if (auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->pass
        ])){
            session()->forget('cart');
            return redirect()->route('home');
        }
        else{
            return redirect()->route('login.index')->with('mess', 'Sai thông tin đăng nhập');
        }
    }

    public function postRegister(RegisterRequest $request){
        $this->user->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->pass)
        ]);
        if (auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->pass
        ])){
            session()->forget('cart');
            return redirect()->route('home');
        }
        else{
            return redirect()->route('login.index')->with('mess', 'Sai thông tin đăng nhập');
        }
    }

    public function logout(){
        auth()->logout();
        session()->forget('cart');
        return redirect()->route('home');
    }
}
