<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $slider, $category, $product;
    public function __construct(Slider $slider, Category $category, Product $product){
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
    }

    public function index(){
        $sliders = $this->slider->latest()->get();

        $categorys = $this->category->where('parent_id', '=', 0)->get();

        $latestProduct = $this->product->latest()->limit(6)->get();

        $recomendProduct = $this->product->orderByDesc('view')->take(6)->get();

        return view('home.home', [
            'sliders'=>$sliders,
            'categorys'=>$categorys,
            'latestProduct'=>$latestProduct,
            'recomendProduct'=>$recomendProduct
        ]);
    }

    public function category($slug, $id){
        $sliders = $this->slider->latest()->get();

        $categorys = $this->category->where('parent_id', '=', 0)->get();

        $cate = $this->category->where('slug', '=', $slug)
            ->where('id','=', $id)->first();
        $products = $cate->products()->paginate(6);
        return view('product.category.index', ['sliders'=>$sliders, 'categorys'=>$categorys, 'products'=>$products, 'cate'=>$cate]);
    }

    public function detail($slug, $id){
        $sliders = $this->slider->latest()->get();

        $categorys = $this->category->where('parent_id', '=', 0)->get();
        $product = $this->product->where('id', '=', $id)
        ->where('slug', '=', $slug)->first();

        $recomendProduct = $this->product->orderByDesc('view')
            ->where('id', '<>', $id)->take(6)->get();
        return view('product.detail.index', ['sliders'=>$sliders, 'categorys'=>$categorys, 'product'=>$product, 'recomendProduct'=>$recomendProduct]);
    }

    public function search(Request $request){
        $sliders = $this->slider->latest()->get();

        $categorys = $this->category->where('parent_id', '=', 0)->get();
        $products = $this->product->where('name', 'like', '%'.$request->search.'%')->paginate(6);
        return view('product.search.index', ['sliders'=>$sliders, 'categorys'=>$categorys,'products'=>$products, 'search'=>$request->search]);
    }

}
