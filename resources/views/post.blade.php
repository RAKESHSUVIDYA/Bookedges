@extends('layouts.app')

@section('meta-tags')
<meta name="title" content="{{$post->seo_title}}">
<meta name="description" content="{{$post->meta_description}}">
<meta name="keywords" content="{{$post->meta_keywords}}">
@endSection

@section('title', $post->title)

@section('content')
  
<!-- Hero -->
<div class="best_mn">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1>Blog Detail</h1>
                 
               </div>
            </div>
         </div>
      </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 text-center">
                <h1 class="display-2 mb-3">{{$post->title}}</h1>
                <p class="lead">by {{is_null($post->authorId)?'Admin':$post->authorId->name}} | {{$post->created_at->diffForHumans()}} | {{is_null($post->category_id)?'Uncategorized':$post->category->name}}</p>
            </div>
        </div>
    </div>

<section>
    <center><img class="img-responsive" src="{{is_null($post->image)?'/frontend/img/default.png':Voyager::image($post->image)}}"></center>
    <div class="container p-4">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-lg-12 p-0">
                    
                {!!clean($post->body)!!}
                <!-- <h2 class="mt-5 mb-3">Comments</h2>
                <div id="disqus_thread"></div> -->
                    
            </div>
        </div>
    </div>
</section>
@endSection