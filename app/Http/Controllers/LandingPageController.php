<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Testimonial;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class LandingPageController extends Controller
{
    public function index(){

        $categories=Category::latest()->take(3)->get();
        $testimonials=Testimonial::where('status','active')->latest()->take(4)->get();
        $brands=Brand::latest()->take(5)->get();
        $products=Product::latest()->take(3)->get();
        $featured_products=Product::where('featured',1)->latest()->take(3)->get();
        $featured_blog=Post::where('status','published')->where('featured','1')->orderBy('created_at','DESC')->take(2)->get();

        return view('landing-page',compact('testimonials','brands','categories','products','featured_products','featured_blog'));
    }

}
