@extends('layouts.app')

@section('title', 'Shop')

@section('content')

    <!-- Hero -->
                   
    <div class="best_mn">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                    @if (request()->input('query') && !request()->input('category'))
                        <h1 class="display-2 mb-3"> Search results for: {{request()->input('query')}}</h1>
                    @elseif(!request()->input('query') && request()->input('category'))
                        <h1 class="display-2 mb-3"> Category: {{$cat_name}}</h1>
                    @elseif(request()->input('query') && request()->input('category'))
                        <h1 class="display-2 mb-3"> Category: {{$cat_name}}</h1>
                        <h2>Search results for: {{request()->input('query')}}</h2>
                    @else
                    <h1>All Products</h1>
                     @endif                             
               </div>
            </div>
        </div>
    </div>

    <section class="bg-soft py-5">
        <div class="container">

            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>	
                <strong>{{ $message }}</strong>
            </div>
            @endif
            
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <?php $currency=get_current_currency()['symbol'];?>
            
            <div class="prod_mn2">
             <div class="container">
                <div class="row">

                  @if(count($products)>0)
                  @foreach ($products as $product)
                   <div class="prod_ln">
                      <div class="prod_pic"><a class="noBack" href="/product/{{$product->slug}}"><img src="{{is_null($product->primary_image)?'/frontend/assets/img/default.png':Voyager::image($product->primary_image)}}" alt=""></a></div>
                      <div class="prod_tex">
                        <?php $sum=0; ?>
                            @foreach ($product->reviews as $review)
                                <?php $sum=$sum+1;?>
                            @endforeach
                         <a class="noBack" href="/product/{{$product->slug}}"><h3>{{$product->title}} || {{$product->Edition}} || {{$product->Publisher}}</h3></a>
                         <p>by {{$product->author}}</p>
                          <?php 
                            if(count($product->reviews)>0){
                                $average=$sum/count($product->reviews);
                            }
                            else{
                                $average=0;
                            }
                            ?>
                            <?php $review_rate=$average; ?>
                            
                            {{--Start Rating--}}
                            @for ($i = 0; $i < 5; $i++)
                            @if (floor($review_rate) - $i >= 1)
                                {{--Full Start--}}
                                <button class="str" type="button" class="btnrating btn btn-default btn-lg" data-attr="{{$i}}" id="rating-star-{{$i}}">
                                 <i class="fa fa-star" aria-hidden="true"> </i>
                                 </button>
                            @elseif ($review_rate - $i > 0)
                                {{--Half Start--}}
                                <button class="str" type="button" class="btnrating btn btn-default btn-lg" data-attr="{{$i}}" id="rating-star-{{$i}}">
                                 <i class="fa fa-star" aria-hidden="true"> </i>
                             </button>
                             
                            @else
                                {{--Empty Start--}}
                                <button class="str" type="button" class="btnrating btn btn-default btn-lg" data-attr="{{$i}}" id="rating-star-{{$i}}">
                                 <i class="fa fa-star" aria-hidden="true"> </i>
                             </button>
                             
                            @endif
                            @endfor
                            {{--End Rating--}}
                            @if ($product->discounted_price>0)
                                                        <del><span aria-hidden="true"><span class="a-price-symbol">{{$currency}}</span><span class="a-price-whole">{{$product->regular_price}}</span></del>
                                                        <span aria-hidden="true"><span class="a-price-symbol">{{$currency}}</span><span class="a-price-whole">{{$product->discounted_price}}</span>    
                                                    @else
                                                        <span aria-hidden="true"><span class="a-price-symbol">{{$currency}}</span><span class="a-price-whole">{{$product->regular_price}}</span>
                                                    @endif</strong>
                         <!-- <span aria-hidden="true"><span class="a-price-symbol">{{$currency}}</span><span class="a-price-whole">{{$product->author}}<span class="a-price-decimal">.</span></span>
                         <a class="" href="#"><span >$185.89</span></a> -->
                         <form class="d-flex justify-content-left" action="{{route('product.add')}}" method="get">
                            <input type="hidden" value="1" name="quantity"  class="form-control w-25">   
                            <input type="hidden" value="{{$product->id}}" name="id">
                            <button class="btn btn-primary btn-md my-0 ml-2 p" type="submit">Add to cart
                                <i class="fa fa-shopping-cart ml-1"></i>
                            </button>
                        </form>
                         
                      </div>
                   </div>                   
                  @endforeach
                  @endif
                </div>
             </div>
          </div>
            

            
        
             
             
             
    
    
      <!-- <div class="lgsld">
         <h2>As Featured On</h2>
         <hr>
         <div class="container">
            <div class="brand-carousel section-padding owl-carousel">
               <div class="single-logo">
                  <img src="images/l1.jpg" alt="">
               </div>
               <div class="single-logo">
                  <img src="images/l2.jpg" alt="">
               </div>
               <div class="single-logo">
                  <img src="images/l3.jpg" alt="">
               </div>
               <div class="single-logo">
                  <img src="images/l4.jpg" alt="">
               </div>
               <div class="single-logo">
                  <img src="images/l1.jpg" alt="">
               </div>
               <div class="single-logo">
                  <img src="images/l2.jpg" alt="">
               </div>
            </div>
         </div>
      </div> -->

            
        </div>
    </section>
@stop
