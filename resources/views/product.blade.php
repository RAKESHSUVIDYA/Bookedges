@extends('layouts.app')

@section('title', 'Product')

@section('content')
<style type="text/css">
    .rating {
    float:left;
    width:300px;
}
.rating span { float:right; position:relative; }
.rating span input {
    position:absolute;
    top:0px;
    left:0px;
    opacity:0;
}
.rating span label {
    display:inline-block;
    width:30px;
    height:30px;
    text-align:center;
    color:#FFF;
    background:#ccc;
    font-size:30px;
    margin-right:2px;
    line-height:30px;
    border-radius:50%;
    -webkit-border-radius:50%;
}
.rating span:hover ~ span label,
.rating span:hover label,
.rating span.checked label,
.rating span.checked ~ span label {
    background:#F90;
    color:#FFF;
}


.carousel-inner {
  position: relative;
  width: 100%;
  min-height: 300px;
  }
 
 .carousel-control.right {
  right: 0;
  left: auto;
  top: 175px;
  background-image: none !important;
  background-repeat: repeat-x;
}
 .carousel-control.left {
  left: 0;
  right: auto;
  background-image: none !important;
  background-repeat: repeat-x;
  top: 175px;
}
#carousel-example-generic {
    margin: 20px auto;
    width: 100%;
}

#carousel-custom {
    margin: 20px auto;
    width: 250px;
}
#carousel-custom .carousel-indicators {
    margin: 10px 0 0;
    overflow: auto;
    position: static;
    text-align: left;
    white-space: nowrap;
    width: 100%;
    overflow:hidden;
}
#carousel-custom .carousel-indicators li {
    background-color: transparent;
    -webkit-border-radius: 0;
    border-radius: 0;
    display: inline-block;
    height: auto;
    margin: 0 !important;
    width: auto;
}
#carousel-custom .carousel-indicators li img {
    display: block;
    opacity: 0.5;
}
#carousel-custom .carousel-indicators li.active img {
    opacity: 1;
}
#carousel-custom .carousel-indicators li:hover img {
    opacity: 0.75;
}
#carousel-custom .carousel-outer {
    position: relative;
}
.carousel-indicators li img {
  height: 66px;
  width: 52px;}
  .hideData{
    display: none !important;
  }
</style>
    <!-- Hero -->
    <div class="best_mn">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1>Product Details</h1>
                 
               </div>
            </div>
         </div>
      </div>
    <div class="Product_mn2">
         <div class="container">
            <div class="heading-section">
            </div>
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
            <div class="tb_mn2">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <!--home-content-top starts from here-->
                        <div class="col-md-3">
                           <div class="oter_mn">
                              <h4>{{$product->title}} || {{$product->Edition}} || {{$product->Publisher}}</h4>
                              <?php
                              if(count($productCategory)>0){
                                  foreach($productCategory as $category){
                                  echo getCategoryName($category->category_id)." ,";
                                  
                                  }
                              }
                              ?>
                              <a href=""></a>
                              <p>by {{$product->author}} (Author)</p>
                              <?php $sum=0;?>
                              @foreach ($reviews as $review)
                                  <?php $sum=$sum+$review->rating;?>
                              @endforeach
                              <?php 
                              if(count($reviews)==0){
                                  $average=0;
                              }
                              else{
                                  $average=$sum/count($reviews);
                              }
                              ?>
                                <?php $review_rate=$average; ?>
                                      <?php get_star_rating($review_rate);?>
                              <a  class="link-normal" href="#">
                              <span>{{count($reviews)}} Reviews</span>
                              </a>
                              <?php
                                  if(!is_null($product->other_image)){
                                      $images=json_decode($product->other_image);
                                  } 
                                  else{
                                      $images=collect([]);
                                  }
                                  
                              ?>
                              @if (count($images)==0)
                                      <img  src="{{is_null($product->primary_image)?asset('frontend/img/default.png'):Voyager::image($product->primary_image)}}" class="img-fluid" alt="product">
                              @else
                              <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                                <div class='carousel-outer'>
                                    <!-- me art lab slider -->
                                    <div class='carousel-inner '>
                                      @for ($i = 0; $i < count($images)+1; $i++)
                                        @if($i ==0)
                                        <div class='item active'>
                                            <img src="{{is_null($product->primary_image)?asset('frontend/img/default.png'):Voyager::image($product->primary_image)}}" alt=''id="zoom_05"  data-zoom-image="{{is_null($product->primary_image)?asset('frontend/img/default.png'):Voyager::image($product->primary_image)}}"/>
                                        </div>
                                        @else
                                        <div class='item'  id="zoom_05">
                                            <img src="{{is_null($images[$i-1])?'/frontend/assets/img/default.png':Voyager::image($images[$i-1])}}" alt='' data-zoom-image="{{is_null($images[$i-1])?'/frontend/assets/img/default.png':Voyager::image($images[$i-1])}}" />
                                        </div>
                                        @endif
                                        @endfor
                                        
                                        
                                    </div>
                                        
                                    <!-- sag sol -->
                                    <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                                        <span class='glyphicon glyphicon-chevron-left'></span>
                                    </a>
                                    <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                                        <span class='glyphicon glyphicon-chevron-right'></span>
                                    </a>
                                </div>
                                
                                <!-- thumb -->
                                <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                  @for ($i = 0; $i < count($images)+1; $i++)
                                    @if($i ==0)
                                    <li data-target='#carousel-custom' data-slide-to='{{$i}}' class='active'><img src="{{is_null($product->primary_image)?asset('frontend/img/default.png'):Voyager::image($product->primary_image)}}" alt='' /></li>
                                    @else
                                    <li data-target='#carousel-custom' data-slide-to='{{$i}}'><img src=
                                    "{{is_null($images[$i-1])?'/frontend/assets/img/default.png':Voyager::image($images[$i-1])}}" alt='' /></li>
                                    @endif
                                    @endfor
                                    

                                </ol>
                            </div>
                              @endif
                              <div class="bn_mn">
                                  <span><b>ISBN-10:</b></span>
                                 <span class="a-size-base a-color-base"> {{$product->sku}}</span><br>
                                 <span><b>ISBN-13:</b></span>
                                 <span class="a-size-base a-color-base"> {{$product->ISBN}}</span><br>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="col-md-9">
                           <section class="home-content-top">
                              <!--our-quality-shadow-->
                              <div class="clearfix"></div>
                              <div class="tabbable-panel margin-tops4 ">
                                 <div class="tabbable-line">
                                    <ul class="nav nav-tabs tabtop  tabsetting tbbbee">
                                       <li class=""> <a href="#tab_default_1" data-toggle="tab" aria-expanded="false">{{$product->book_type}}
                                          <!-- <span>$103.75</span> -->
                                          </a> 
                                       </li>
                                       
                                    </ul>
                                    <div class="tab-content">
                                       <div class="tab-pane fade active in" id="tab_default_1">
                                          <div class="bg-sld2">
                                             <div class="col-md-9 heading4_mn2">
                                                <h4 class="heading4">Buy:</h4><span>{{$product->condition}}</span>
                                                <p>{!! $product->small_description !!}</p>
												
												
												
												
												
                                                <div class="readless">{!! Str::words($product->large_description,150)!!} <a class="lssbtn" onclick="ReadMore();" href="javascript:void(0)">Read More</a></div>
                                                <div class="readmore">{!! $product->large_description!!}<a class="lssbtn" onclick="ReadLess();" href="javascript:void(0)">Read Less</a></div>
												
												
												
												
                                             </div>
                                             <div class="col-md-3">
                                                <form class="d-flex justify-content-left" action="{{route('product.add')}}" method="get">
                                                <div class="list_mn3">

                                                        
                                                    @if ($product->discounted_price>0)
                                                    <span class="spclr"><del>{{$currency}}{{$product->regular_price}}</del></span>
                                                   <span class="spclr">{{$currency}}{{$product->discounted_price}}</span>
                                                   @else
                                                   <span class="spclr">{{$currency}}{{$product->regular_price}}</span>
                                                   @endif
                                                   <!-- <span>List Price:</span>
                                                   <span id="listPrice" class="a-color-secondary a-text-strike">$120.00</span>
                                                   <span><a  href="#">Details</a></span><br>
                                                   <span class="">Save: </span>
                                                   <span class="">$16.25</span>
                                                   <span class="">(14%)</span><br> -->
                                                   <div class="spacing-base">
                                                      <div class="a-column a-span12 a-text-left">
                                                         <span class="a-dropdown-container">
                                                            <label for="quantity" class="a-native-dropdown">Qty:</label>
                                                            <select name="quantity" autocomplete="off" id="quantity" tabindex="0" data-action="a-dropdown-select" 
                                                               class="a-native-dropdown a-declarative drpp" aria-pressed="false">
                                                               <option value="1" selected="">1</option>
                                                               <option value="2">2</option>
                                                               <option value="3">3</option>
                                                               <option value="4">4</option>
                                                               <option value="5">5</option>
                                                               <option value="6">6</option>
                                                               <option value="7">7</option>
                                                               <option value="8">8</option>
                                                               <option value="9">9</option>
                                                               <option value="10">10</option>
                                                               <option value="11">11</option>
                                                               <option value="12">12</option>
                                                               <option value="13">13</option>
                                                               <option value="14">14</option>
                                                               <option value="15">15</option>
                                                               <option value="16">16</option>
                                                               <option value="17">17</option>
                                                               <option value="18">18</option>
                                                               <option value="19">19</option>
                                                               <option value="20">20</option>
                                                               <option value="21">21</option>
                                                               <option value="22">22</option>
                                                               <option value="23">23</option>
                                                               <option value="24">24</option>
                                                               <option value="25">25</option>
                                                               <option value="26">26</option>
                                                               <option value="27">27</option>
                                                               <option value="28">28</option>
                                                               <option value="29">29</option>
                                                               <option value="30">30</option>
                                                            </select>
                                                         </span>
                                                      </div>
                                                   </div>
                                                   <input id="add-to-cart-button" name="submit.add-to-cart" title="Add to Shopping Cart" data-hover="Select <b>__dims__</b> from the left<br> to add to Shopping Cart" class="button-inp" type="submit" value="Add to Cart" aria-labelledby="submit.add-to-cart-announce">
												   
												     
                        												  <input type="hidden" value="{{$product->id}}" name="id"> 
                        												  </form>
                        												  <form action="{{route('product.book')}}" method="get">
                                                <input type="hidden" name="quantity1" value="1" class="qty">
                                                <input type="hidden" value="{{$product->id}}" name="id1">
                                                <button class="btn btn-primary btn-md my-0 ml-2 p" type="submit"> Buy Now
                                                  <!-- <i class="fa fa-shopping-cart ml-1"></i> -->
                                              </button>
                                              </form>
                                              @if($product->dispatch_time != null)
                                              <div>

                                                <strong>Estimated Delivery : </strong><span>@php echo date('Y-m-d', strtotime('+'.$product->dispatch_time.' days')); @endphp</span>
                                              </div>
                                              @endif
                                                   <!-- <input id="add-to-cart-button" name="submit.add-to-cart" title="Add to Shopping Cart" data-hover="Select <b>__dims__</b> from the left<br> to add to Shopping Cart" class="button-inp2" type="submit" value="Buy Now" aria-labelledby="submit.add-to-cart-announce"> -->
                                                </div>
                                                
                                              
                                              
                                             </div>
                                          </div>
                                       </div>
                                       
                                    </div>
                                 </div>
                              </div>
                           </section>
                        </div>
                        <!--home-content-top ends here--> 
                     </div>
                  </div>
               </div>
            </div>
                        
         </div>
      </div>
      <div class="reviews_mn">
         <div class="container">
            <div class="row">
               <div class="col-md-12 reviews1">
                  <h2>Customer Reviews </h2>
                  <span>of Carpenter</span>
                  <?php $sum=0;?>
                            @foreach ($reviews as $review)
                                <?php $sum=$sum+$review->rating;?>
                            @endforeach
                            <?php 
                            if(count($reviews)==0){
                                $average=0;
                            }
                            else{
                                $average=$sum/count($reviews);
                            }
                            ?>
                 
                  <span class="nbrr2">{{count($reviews)}} reviews</span>
                  @foreach ($reviews as $review)
                  <div class="reviews2_mn">
                     <div class="reviews2_nm"><span><img src="{{is_null($review->user)?'/frontend/img/default.png':Voyager::image($review->user->avatar)}}" class="image image-sm mr-3 rounded-circle shadow" alt="user" style="height: 50px; width: 50px"></span></div>
                     <div class="reviews2_tex">
                        <p>{{$review->user->name}}</p>
                        
                        <strong>
                            <span class="glyphicon .glyphicon-star-empty glyphicon-star sttrree"></span>
                        

                            <?php $review_rate=$review->rating; ?>
                            {{$review_rate}}
                            <!-- <span class="dtt1">  October, 2020</span></strong> -->
                            </strong>
                            <p>{{$review->description}}</p>
                     </div>
                  </div>
                  @endforeach
                  <!-- <div class="">
                     <nav class="pagination-outer" aria-label="Page navigation">
                        <ul class="pagination">
                           <li class="page-item">
                              <a href="#" class="page-link" aria-label="Previous">
                              <span aria-hidden="true">«</span>
                              </a>
                           </li>
                           <li class="page-item"><a class="page-link" href="#">1</a></li>
                           <li class="page-item"><a class="page-link" href="#">2</a></li>
                           <li class="page-item active"><a class="page-link" href="#">3</a></li>
                           <li class="page-item"><a class="page-link" href="#">4</a></li>
                           <li class="page-item"><a class="page-link" href="#">5</a></li>
                           <li class="page-item">
                              <a href="#" class="page-link" aria-label="Next">
                              <span aria-hidden="true">»</span>
                              </a>
                           </li>
                        </ul>
                     </nav>
                  </div> -->
               </div>
            </div>
         </div>
      </div>
	  <div class="container">
      <div class="col-12 col-md-6">
        <div class="card border-light">
            <div class="card-body ebb1">
                @if (Auth::user())
                    <form id="review-form" action="{{route('product.add-review')}}" method="post">
                        <h2>Add a review</h2>
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label tbll" for="input-username">Rating</label>
                                    <div class="rating">
									
									
                                        <span><input type="radio" name="rating" id="str5" value="5"><label class="glyphicon .glyphicon-star-empty glyphicon-star-empty" for="str5"></label></span>
										
                                        <span><input type="radio" name="rating" id="str4" value="4">
										<label class="glyphicon .glyphicon-star-empty glyphicon-star-empty"										for="str4"></label></span>
                                        <span><input type="radio" name="rating" id="str3" value="3"><label class="glyphicon .glyphicon-star-empty glyphicon-star-empty" for="str3"></label></span>
                                        <span><input type="radio" name="rating" id="str2" value="2"><label class="glyphicon .glyphicon-star-empty glyphicon-star-empty" for="str2"></label></span>
                                        <span><input type="radio" name="rating" id="str1" value="1"><label class="glyphicon .glyphicon-star-empty glyphicon-star-empty" for="str1"></label></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="review">Review</label>
                                    <textarea name="review" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-md my-0 ml-2 p" type="submit">Add review
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                @else
					<div class="container">
                    <p>Please <a href="/login">login</a> to submit a review</p>
					</div>
                @endif
            </div>
        </div> 
    </div>
	</div>
	
	<div class="container">
	<div class="sid_txx">
    <div class="col-12 col-md-12">
      <h3>Product Detail</h3>
      <strong>Publisher : </strong><p>{{$product->Publisher}}</p><br>
      <strong>ISBN-10 : </strong><p>{{$product->sku}}</p><br>
      <strong>ISBN-13 : </strong><p>{{$product->ISBN}}</p><br>
      <strong>Edition : </strong><p>{{$product->Edition}}</p><br>
      <strong>Author : </strong><p>{{$product->author}}</p>
    </div>
	</div>
	</div>
    <section class="bg-soft py-5 pd_mn">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
				<div class="diss">
                    <h2 class="text-center py-4">You might like</h2>
					<hr>
					</div>
                    <div class="row">
                        @include('sections.product')
                    </div> 
                </div>
            </div>
        </div>

    </section>
@endsection



@section('javascript')
<!-- <script src="/frontend/assets/js/product.js"></script> -->
    <script type="text/javascript">
        jQuery(document).ready(function(){

          
    // Check Radio-box
    jQuery(".rating input:radio").attr("checked", false);

    jQuery('.rating input').click(function () {
        jQuery(".rating span").removeClass('checked');
        jQuery(this).parent().addClass('checked');
    });

    jQuery('input:radio').change(
      function(){
        var userRating = this.value;
        alert(userRating);
    }); 
});
    </script>
      <!-- <script>
                              $("#zoom_05").elevateZoom({ zoomType    : "inner", cursor: "crosshair" });
                            </script> -->
    <script type="text/javascript">

$(document).ready(function() {
      $('.readmore').css('display','none');
//alert("hello");
    //$(".mCustomScrollbar").mCustomScrollbar({axis:"x"});
});
function ReadMore(){
  $('.readless').hide();
  $('.readmore').show();
}
function ReadLess(){
  $('.readless').show();
  $('.readmore').hide();
}
</script>
@endsection