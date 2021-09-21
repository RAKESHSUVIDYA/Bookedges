@extends('layouts.app')

@section('title','Home')

@section('content')

<section class="jk-slider">
         <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
               <li data-target="#carousel-example" data-slide-to="1"></li>
               <li data-target="#carousel-example" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
               <div class="item active">
                  <a href=javascript:void(0);><img src="images/slider2.jpg" alt=""></a>
                  <div class="hero">
                     <hgroup>
                        <h1>Your bright is our<br><span>future</span> mission</h1>
                        <p>Through technology solutions, timely research, and community , Bookedges libraries to meet changing needs.</p>
                     </hgroup>
                  </div>
               </div>
               <div class="item">
                  <a href=javascript:void(0);><img src="images/slider1.jpg" alt=""></a>
                  <div class="hero">
                    <hgroup>
                        <h1>Your bright is our<br><span>future</span> mission</h1>
                        <p>Through technology solutions, timely research, and community , Bookedges libraries to meet changing needs.</p>
                     </hgroup>
                  </div>
               </div>
               <div class="item">
                  <a href=javascript:void(0);><img src="images/slider3.jpg" alt=""></a>
                  <div class="hero">
                     <hgroup>
                        <h1>Your bright is our<br><span>future</span> mission</h1>
                        <p>Through technology solutions, timely research, and community , Bookedges libraries to meet changing needs.</p>
                     </hgroup>
                  </div>
               </div>
            </div>
            <a class="left carousel-control" href="#carousel-example" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left artp"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right artp"></span>
            </a>
         </div>
      </section>
      <div class="unlock_mn">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="col-md-6 unlock1">
                     <h1>About <span>Bookedges.</span>
                     </h1>
                     <p>Library staff and volunteers can access free, live webinars through WebJunction, and on‑demand courses and webinars in our Course Catalog.
					 Our products, services, programs, and research help every type of library
					 work smarter, collaborate better, and meet.
                     </p>
                     <a href="">View More</a>
                  </div>
                  <div class="col-md-6 gl_pic">
                     <img src="images/girl-hir.png" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tb_mn">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <!--home-content-top starts from here-->
                  <section class="home-content-top">
                     <!--our-quality-shadow-->
                     <div class="clearfix"></div>
                     <div class="tabbable-panel margin-tops4 ">
                        <div class="tabbable-line">
                           <!--<ul class="nav nav-tabs tabtop  tabsetting">
                              <li class="active"> <a href="#tab_default_1" data-toggle="tab"><img src="images/t1.jpg" alt=""> Natural <br>ingredients </a> </li>
                              <li> <a href="#tab_default_2" data-toggle="tab"><img src="images/t2.jpg" alt=""> Himalayan<br>
                                 born</a> 
                              </li>
                              <li> <a href="#tab_default_3" data-toggle="tab"><img src="images/t3.jpg" alt=""> No harsh<br>
                                 chemical</a> 
                              </li>
                              <li> <a href="#tab_default_4" data-toggle="tab"><img src="images/t4.jpg" alt=""> Women Made,<br>
                                 Women Powered</a> 
                              </li>
                              <li> <a href="#tab_default_5" data-toggle="tab" class="thbada"><img src="images/t5.jpg" alt=""> Eco-friendly<br>
                                 packagin</a> 
                              </li>
                           </ul>-->
                           <div class="tab-content margin-tops">
                              <div class="tab-pane active fade in" id="tab_default_1">
                                 <div class="bg-sld">
                                    <div class="col-md-12 heading4_mn">
                                       <h4 class="heading4">Get the tools <br>your library</h4>
                                       <span>Inform your institution’s plans </span>
                                       <p>Through technology solutions, timely research, and community<br>Bookedges libraries to meet changing needs </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab_default_2">
                                 <div class="bg-sld">
                                    <div class="col-md-12 heading4_mn">
                                       <h4 class="heading4">Natural<br>Ingredients</h4>
                                       <span>Holistic beauty is what we're all about.  </span>
                                       <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus. </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab_default_3">
                                 <div class="bg-sld">
                                    <div class="col-md-12 heading4_mn">
                                       <h4 class="heading4">Natural<br>Ingredients</h4>
                                       <span>Holistic beauty is what we're all about.  </span>
                                       <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus. </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab_default_4">
                                 <div class="bg-sld">
                                    <div class="col-md-12 heading4_mn">
                                       <h4 class="heading4">Natural<br>Ingredients</h4>
                                       <span>Holistic beauty is what we're all about.  </span>
                                       <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus. </p>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="tab_default_5">
                                 <div class="bg-sld">
                                    <div class="col-md-12 heading4_mn">
                                       <h4 class="heading4">Natural<br>Ingredients</h4>
                                       <span>Holistic beauty is what we're all about.  </span>
                                       <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus. </p>
                                    </div>
                                 </div>
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <!--home-content-top ends here--> 
               </div>
            </div>
         </div>
      </div>
      <div class="owl_mn">
         <div class="container">
            <div class="get1">
            <?php $products=$featured_products;?>
            <?php $currency=get_current_currency()['symbol'];?>
           
               <h2>Featured Products</h2>
               <a href=javascript:void(0);>View All</a>
               <hr>
            </div>
            <div class="owl-carousel">
                @foreach ($products as $product)
               <div class="item">
                  <div class="products_mn2 prohit">
                 
                     <a class="noBack" href="/product/{{$product->slug}}"><img src="{{is_null($product->primary_image)?'/frontend/assets/img/default.png':Voyager::image($product->primary_image)}}" alt=""></a>
                     
                     <?php $sum=0; ?>
                    @foreach ($product->reviews as $review)
                        <?php $sum=$sum+$review->rating;?>
                    @endforeach
                    <?php 
                    if(count($product->reviews)>0){
                        $average=$sum/count($product->reviews);
                    }
                    else{
                        $average=0;
                    }
                    ?>
                    <?php $review_rate=$average; ?>
                    <?php get_star_rating($review_rate);?>                                                                                  
                     
                     <a class="noBack" href="/product/{{$product->slug}}"><p>{{$product->title}}</p></a>
                     <strong>
                     @if ($product->discounted_price>0)
                        <del>{{$currency}}{{$product->regular_price}}</del> {{$currency}}{{$product->discounted_price}}   
                    @else
                        {{$currency}}{{$product->regular_price}} 
                    @endif
                     </strong>
                     <form class="d-flex justify-content-left" action="{{route('product.add')}}" method="get">
                        <input type="hidden" value="1" name="quantity"  class="form-control w-25">   
                        <input type="hidden" value="{{$product->id}}" name="id">
                        <button class="btn btn-primary btn-md my-0 ml-2 p" type="submit">Add to cart
                            <i class="fa fa-shopping-cart ml-1"></i>
                        </button>
                    </form>
                     <!-- <a href=javascript:void(0);>Add to Cart</a> -->
                  </div>
               </div>
               @endforeach               
            </div>
         </div>
      </div>
      <div class="owl_mn">
         <div class="container">
            <div class="get1">
               <h2>New Releases</h2>
               <a href=javascript:void(0);>View All</a>
               <hr>
            </div>
            <div class="owl-carousel">
            @foreach ($products as $product)
               <div class="item">
                  <div class="products_mn2 prohit">
                 
                     <img src="{{is_null($product->primary_image)?'/frontend/assets/img/default.png':Voyager::image($product->primary_image)}}" alt="">
                     
                     <?php $sum=0; ?>
                    @foreach ($product->reviews as $review)
                        <?php $sum=$sum+$review->rating;?>
                    @endforeach
                    <?php 
                    if(count($product->reviews)>0){
                        $average=$sum/count($product->reviews);
                    }
                    else{
                        $average=0;
                    }
                    ?>
                    <?php $review_rate=$average; ?>
                    <?php get_star_rating($review_rate);?>                                                                                  
                     
                     <p>{{$product->title}}</p>
                     <strong>
                     @if ($product->discounted_price>0)
                        <del>{{$currency}}{{$product->regular_price}}</del> {{$currency}}{{$product->discounted_price}}   
                    @else
                        {{$currency}}{{$product->regular_price}} 
                    @endif
                     </strong>
                     <form class="d-flex justify-content-left" action="{{route('product.add')}}" method="get">
                        <input type="hidden" value="1" name="quantity"  class="form-control w-25">   
                        <input type="hidden" value="{{$product->id}}" name="id">
                        <button class="btn btn-primary btn-md my-0 ml-2 p" type="submit">Add to cart
                            <i class="fa fa-shopping-cart ml-1"></i>
                        </button>
                    </form>
                     <!-- <a href=javascript:void(0);>Add to Cart</a> -->
                  </div>
               </div>
               @endforeach               
            </div>
         </div>
      </div>
      <div class="owl_mn" style="background: #fff;">
         <div class="container">
            <div class="get1">
               <h2>Recent Blog</h2>
               <a href=javascript:void(0);>View All</a>
               <hr>
            </div>
            <div class="blog_mn2">
                @foreach ($featured_blog as $post)   
               <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="products_mn2">
                     <a href="/post/{{$post->slug}}" class="noBack"><img src="{{is_null($post->image)?'/frontend/img/default.png':Voyager::image($post->image)}}" alt=""></a>
                     <span><time datetime="2019-04-25">{{$post->created_at->diffForHumans()}}</time></span>
                     <h4><a href="/post/{{$post->slug}}" class="noBack">{{$post->title}}</a>
                     </h4>
                     <p>{!! Str::words($post->body,50)!!} </p>
                  </div>
               </div>
               @endforeach
               
            </div>
         </div>
      </div>
      <div class="lgsld">
         <h2>As Featured On</h2>
         <hr>
         <div class="container">
            <div class="brand-carousel section-padding owl-carousel">
                @foreach ($brands as $brand)
                <div class="single-logo">
                    <img src="{{is_null($brand->image)?'/frontend/img/default.png':Voyager::image($brand->image)}}" alt="">
                </div>
                @endforeach
               
            </div>
         </div>
      </div>



@endsection
