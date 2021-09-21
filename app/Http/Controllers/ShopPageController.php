<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use TCG\Voyager\Models\Category;

class ShopPageController extends Controller
{
    public function index(){
        $products=Product::all();
        $productsLatest=Product::all();
        $categories=Category::all();
        /*echo "<pre>";
        var_dump($products);
        exit;*/
        return view('shop',compact('products','categories','productsLatest'));
    }
    public function search(Request $request){
        $validator=Validator::make($request->all(),[
            'query'=>'nullable|min:3'
        ]);

        if($validator->fails()){
            notify()->error('Search requires minimum 3 characters');
            return back();
        }

        $query=$request->input('query');
        
        $products=Product::query()
        ->where('title', 'LIKE', "%{$query}%")
        ->orWhere('slug', 'LIKE', "%{$query}%")
        ->orWhere('small_description', 'LIKE', "%{$query}%")
        ->orWhere('large_description', 'LIKE', "%{$query}%")
        ->orWhere('sku', 'LIKE', "%{$query}%") 
        ->orWhere('ISBN', 'LIKE', "%{$query}%")
        ->orWhere('author', 'LIKE', "%{$query}%")
        ->orWhere('Edition', 'LIKE', "%{$query}%")
        ->orWhere('Publisher', 'LIKE', "%{$query}%")->get();
        $productsLatest=Product::query()
        ->where('title', 'LIKE', "%{$query}%")->get();
        
        $categories=Category::all();
        return view('shop',compact('products','categories','productsLatest'));
    }
    public function category(Request $request){
        $category=Category::where('slug',$request->category)->first();

        $query=$request->input('query');
        if($query){
            $products=Product::query()
            ->where('category_id',$category->id)
            ->orWhere('title', 'LIKE', "%{$query}%")
            ->orWhere('slug', 'LIKE', "%{$query}%")
            ->orWhere('small_description', 'LIKE', "%{$query}%")
            ->orWhere('large_description', 'LIKE', "%{$query}%")
            ->orWhere('sku', 'LIKE', "%{$query}%") 
            ->orWhere('ISBN', 'LIKE', "%{$query}%")
            ->orWhere('author', 'LIKE', "%{$query}%")
            ->orWhere('Edition', 'LIKE', "%{$query}%")
            ->orWhere('Publisher', 'LIKE', "%{$query}%")->get();
            $productsLatest=Product::query()
        ->where('title', 'LIKE', "%{$query}%")->get();
        }
        else{
            $products=Product::where('category_id',$category->id)->paginate(10);
            $productsLatest=Product::where('category_id',$category->id)->get();
        }
        $categories=Category::all();

        $cat_name=$category->name;
        return view('shop',compact('products','categories','cat_name','productsLatest'));
    }
}
