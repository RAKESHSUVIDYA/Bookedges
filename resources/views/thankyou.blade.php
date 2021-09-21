@extends('layouts.app')

@section('title', 'Thank you')

@section('content')

    <!-- Hero -->
    <div class="container">
         <div class="row">
            <div class="thankyou-page">
               <div class="_header">
                  <h1>Thank You!</h1>
                  <img src="images/right.png" alt="">
               </div>
               <div class="_body">
                  <div class="_box">
                     <h2>Thank you for your order</h2>
                    <p>Your order number is #{{$invoice_id}}</p>
                  </div>
               </div>
               <div class="_footer">
                  <p>Having trouble? <a href="{{url('contact')}}">Contact us</a> </p>
                  <a class="btn" href="{{url()}}">Back to homepage</a>
               </div>
            </div>
         </div>
      </div>
    <section class="section-header bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 text-center">
                    <h1 class="display-2 mb-3">Order Complete</h1>
                    <p class="lead">Your order is complete</p>
                </div>
            </div>
        </div>
    </section>
    <div class="section py-7 bg-soft">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                <h2>Thank you for your order</h2>
                    <p>Your order number is #{{$invoice_id}}</p>
                <a href="/" class="btn btn-lg btn-primary">Go Home</a>
                </div>
            </div>
        </div>
    </div>
    
  
@endsection