@extends('layouts.app')

@section('title','About')

@section('content')
<!-- Hero -->
<div class="best_mn">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1>About Us</h1>
                 
               </div>
            </div>
         </div>
      </div>
  


<section class="col-md-12 who-we gap" id="who_we_are">
    <div class="container">
        <div class="row">
            <div class="col-md-7 pull-right col-sm-12 wow  fadeInLeft animated" data-wow-duration="1s" data-wow-delay="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 1s; animation-name: fadeInLeft;">
                <img class="img-responsive" src="images/about_pic.jpg">
            </div>
            <div class="who-we-overlap wow  fadeInRight animated" data-wow-duration="1s" data-wow-delay="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 1s; animation-name: fadeInRight;">
                <h2>Library on‑demand: Anything, anytime, anywhere</h2>
               
<p>Learn about our vision to help libraries meet changing expectations through technology, tools, and capacity to create impactful end‑user experiences.</p>

<p>Library staff and volunteers can access free, live webinars through WebJunction, and on‑demand courses and webinars in our Course Catalog.</p>

<p>And we deliver tools and data that member libraries need to fulfill their commitments</p>
            </div>
        </div>
    </div>
</section>
@include('sections.member')
@include('sections.testimonial')
@include('sections.brand')
@endsection
