@extends('layouts.app')

@section('meta-tags')
<meta name="title" content="{{$page->title}}">
<meta name="description" content="{{$page->meta_description}}">
<meta name="keywords" content="{{$page->meta_keywords}}">
@stop

@section('title', $page->title)

@section('content')

<!-- Hero -->
<style>
p{
  color:#000 !important;
}
</style>
<div class="best_mn">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1>{{$page->title}}</h1>
                 
               </div>
            </div>
         </div>
      </div>

<div class="container mt-5 mb-5 pt-5">

  @if(!is_null($page->image))
    <figure class="figure">
      <img src="{{Voyager::image($page->image)}}" class="figure-img img-fluid z-depth-1" alt="page image">
    </figure>
  @endif  
  <!--Section: Content-->
  <section class="text-justify">
    {!!clean($page->body)!!}
  </section>
  <!--Section: Content-->

</div>

@stop